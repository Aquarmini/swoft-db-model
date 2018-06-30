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