<?php

namespace Xin\Swoft\Db;

use Swoft\Db\Model as SwoftModel;
use Xin\Swoft\Db\Traits\DeleteEventTrait;
use Xin\Swoft\Db\Traits\SaveEventTrait;
use Xin\Swoft\Db\Traits\UpdateEventTrait;

class Model extends SwoftModel
{
    use SaveEventTrait;
    use UpdateEventTrait;
    use DeleteEventTrait;
}
