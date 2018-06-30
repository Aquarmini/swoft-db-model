# swoft-db-model
基于Swoft的Model封装

[![Build Status](https://travis-ci.org/limingxinleo/swoft-db-model.svg?branch=master)](https://travis-ci.org/limingxinleo/swoft-db-model)

## Mysql Connection 事件的使用

增加事件类

~~~php
<?php 
namespace SwoftTest\Db\Testing\Listener;

use Swoft\App;
use Swoft\Bean\Annotation\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use SwoftTest\Db\Testing\Entity\User;
use Xin\Swoft\Db\Driver\Mysql\MysqlConnection;
use Xin\Swoft\Db\Event\MysqlConnectionEvent;

/**
 * Model before save handler
 *
 * @Listener(MysqlConnectionEvent::AFTER_EXECUTE)
 */
class AfterExecuteListener implements EventHandlerInterface
{
    /**
     * @param \Swoft\Event\EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        /** @var MysqlConnection $model */
        $model = $event->getConnection();

        $runtime = App::getAlias('@runtime');
        $file    = $runtime . '/sql.log';

        file_put_contents($file, $model->getSql() . PHP_EOL, FILE_APPEND);
    }
}
~~~

## 实体类增加DB连接池的Instance
~~~
此实体重写了Mysql和同步Mysql链接，但是连接池配置与default一致，可以放心使用。
注解如下

@Entity(instance="dbModel")

~~~


## 模型事件的使用

增加事件类

~~~php
<?php
namespace SwoftTest\Db\Testing\Listener;

use Swoft\Bean\Annotation\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use SwoftTest\Db\Testing\Entity\User;
use Xin\Swoft\Db\Event\ModelEvent;

/**
 * Model before save handler
 *
 * @Listener(ModelEvent::BEFORE_SAVE)
 */
class BeforeSaveListener implements EventHandlerInterface
{
    /**
     * @param \Swoft\Event\EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        /** @var User $model */
        $model = $event->getModel();
        if (method_exists($model, 'setCreatedAt') && method_exists($model, 'setUpdatedAt')) {
            $date = date('Y-m-d H:i:s');
            $model->setCreatedAt($date);
            $model->setUpdatedAt($date);
        }
    }
}
~~~

将事件类的位置放到 beanScan 中

~~~php
<?php
// config/properties
return [
    'version' => '1.0',
    'autoInitBean' => true,
    'beanScan' => [
        'SwoftTest\\Db\\Testing' => BASE_PATH . '/Testing',
        'Xin\\Swoft\\Db' => BASE_PATH . '/../src',
    ],
    'I18n' => [
        'sourceLanguage' => '@root/resources/messages/',
    ],
    'env' => 'Base',
    'user.stelin.steln' => 'fafafa',
    'Service' => [
        'user' => [
            'timeout' => 3000
        ]
    ],
    'db' => require dirname(__FILE__) . DS . 'db.php',
];
~~~
