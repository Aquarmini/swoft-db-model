<?php

namespace Xin\Swoft\Db\Event\Events;

use Swoft\Db\AbstractDbConnection;
use Swoft\Event\Event;

/**
 * Mysql链接事件源
 *
 * @uses      DbConnectionEventer
 * @version   2018年06月27日
 * @author    limx <715557344@qq.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class DbConnectionEventer extends Event
{
    /**
     * 模型实体
     *
     * @var MysqlConnection
     */
    private $connection;

    /**
     * MysqlConnectionEventer constructor.
     * @param null|string $name
     * @param MysqlConnection $connection
     */
    public function __construct($name = null, AbstractDbConnection $connection)
    {
        parent::__construct($name);

        $this->connection = $connection;
    }

    /**
     * @return MysqlConnection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}
