<?php

namespace Xin\Swoft\Db\Event;

/**
 * the event of model
 *
 * @uses      ModelEvent
 * @version   2018年06月27日
 * @author    limx <715557344@qq.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class MysqlConnectionEvent
{
    /**
     * before save
     */
    const BEFORE_EXECUTE = 'beforeMysqlConnectionExecute';

    /**
     * after save
     */
    const AFTER_EXECUTE = 'afterMysqlConnectionExecute';
}