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
class ModelEvent
{
    /**
     * before save
     */
    const BEFORE_SAVE = 'beforeModelSave';

    /**
     * after save
     */
    const AFTER_SAVE = 'afterModelSave';

    /**
     * before update
     */
    const BEFORE_UPDATE = 'beforeModelUpdate';

    /**
     * after update
     */
    const AFTER_UPDATE = 'afterModelUpdate';

    /**
     * before delete
     */
    const BEFORE_DELETE = 'beforeModelDelete';

    /**
     * after delete
     */
    const AFTER_DELETE = 'afterModelDelete';
}
