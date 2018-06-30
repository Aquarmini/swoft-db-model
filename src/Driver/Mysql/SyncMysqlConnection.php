<?php

namespace Xin\Swoft\Db\Driver\Mysql;

use Swoft\App;
use Swoft\Db\Driver\Mysql\SyncMysqlConnection as SwoftSyncMysqlConnection;
use Swoft\Db\Bean\Annotation\Connection;
use Swoft\Db\Driver\DriverType;
use Xin\Swoft\Db\Event\Events\DbConnectionEventer;
use Xin\Swoft\Db\Event\MysqlConnectionEvent;

/**
 * Mysql sync connection
 *
 * @Connection(type=DriverType::SYNC)
 */
class SyncMysqlConnection extends SwoftSyncMysqlConnection
{
    /**
     * @param array|null $params
     *
     * @return bool
     */
    public function execute(array $params = null)
    {
        $beforeEvent = new DbConnectionEventer(MysqlConnectionEvent::BEFORE_EXECUTE, $this);
        App::trigger($beforeEvent);

        $res = parent::execute($params);

        $beforeEvent = new DbConnectionEventer(MysqlConnectionEvent::AFTER_EXECUTE, $this);
        App::trigger($beforeEvent);

        return $res;
    }
}
