<?php

namespace Xin\Swoft\Db\Traits;

use Swoft\App;
use Swoft\Core\ResultInterface;
use Xin\Swoft\Db\Event\Events\ModelEventer;
use Xin\Swoft\Db\Event\ModelEvent;

trait UpdateEventTrait
{
    public function update(): ResultInterface
    {
        $beforeEvent = new ModelEventer(ModelEvent::BEFORE_UPDATE, $this);
        App::trigger($beforeEvent);

        $result = parent::update();

        $afterEvent = new ModelEventer(ModelEvent::AFTER_UPDATE, $this);
        App::trigger($afterEvent);
        return $result;
    }
}