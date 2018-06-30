<?php

namespace Xin\Swoft\Db\Traits;

use Swoft\App;
use Swoft\Core\ResultInterface;
use Xin\Swoft\Db\Event\Events\ModelEventer;
use Xin\Swoft\Db\Event\ModelEvent;

trait SaveEventTrait
{
    public function save(): ResultInterface
    {
        $beforeEvent = new ModelEventer(ModelEvent::BEFORE_SAVE, $this);
        App::trigger($beforeEvent);

        $result = parent::save();

        $afterEvent = new ModelEventer(ModelEvent::AFTER_SAVE, $this);
        App::trigger($afterEvent);
        return $result;
    }
}

