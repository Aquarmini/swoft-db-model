# swoft-db-model
基于Swoft的Model封装

[![Build Status](https://travis-ci.org/limingxinleo/swoft-db-model.svg?branch=master)](https://travis-ci.org/limingxinleo/swoft-db-model)

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

将
