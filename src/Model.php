<?php

namespace Xin\Swoft\Db;

use Swoft\Db\Model as SwoftModel;
use Xin\Swoft\Db\Traits\DeleteEventTrait;
use Xin\Swoft\Db\Traits\SaveEventTrait;
use Xin\Swoft\Db\Traits\UpdateEventTrait;
use Swoft\Db\Bean\Annotation\Entity;

/**
 * Class Model
 * @package Xin\Swoft\Db
 */
class Model extends SwoftModel
{
    use SaveEventTrait;
    use UpdateEventTrait;
    use DeleteEventTrait;
}
