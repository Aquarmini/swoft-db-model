<?php

namespace Xin\Swoft\Db\Driver\Mysql;

use Swoft\App;
use Swoft\Db\Driver\Mysql\MysqlConnection as SwoftMysqlConnection;
use Swoft\Db\Bean\Annotation\Connection;
use Xin\Swoft\Db\Event\Events\DbConnectionEventer;
use Xin\Swoft\Db\Event\MysqlConnectionEvent;

/**
 * Mysql connection
 *
 * @Connection()
 */
class MysqlConnection extends SwoftMysqlConnection
{
    /**
     * Execute
     *
     * @param array|null $params
     *
     * @return array|bool
     */
    public function execute(array $params = [])
    {
        $beforeEvent = new DbConnectionEventer(MysqlConnectionEvent::BEFORE_EXECUTE, $this);
        App::trigger($beforeEvent);

        $res = parent::execute($params);

        $beforeEvent = new DbConnectionEventer(MysqlConnectionEvent::AFTER_EXECUTE, $this);
        App::trigger($beforeEvent);

        return $res;
    }
}
