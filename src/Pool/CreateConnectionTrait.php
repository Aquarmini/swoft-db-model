<?php

namespace Xin\Swoft\Db\Pool;

use Swoft\App;
use Swoft\Db\Driver\Driver;
use Swoft\Pool\ConnectionInterface;
use Xin\Swoft\Db\Driver\Mysql\MysqlConnection;
use Xin\Swoft\Db\Driver\Mysql\SyncMysqlConnection;

trait CreateConnectionTrait
{
    /**
     * Create connection
     *
     * @return ConnectionInterface
     */
    public function createConnection(): ConnectionInterface
    {
        $driver = $this->poolConfig->getDriver();
        if ($driver === Driver::MYSQL) {
            if (App::isCoContext()) {
                $connectClassName = MysqlConnection::class;
            } else {
                $connectClassName = SyncMysqlConnection::class;
            }

            return new $connectClassName($this);
        }
        return parent::createConnection();
    }
}