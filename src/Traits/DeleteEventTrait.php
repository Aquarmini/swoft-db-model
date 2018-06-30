<?php

namespace Xin\Swoft\Db\Traits;

use Swoft\App;
use Swoft\Core\ResultInterface;
use Xin\Swoft\Db\Event\Events\ModelEventer;
use Xin\Swoft\Db\Event\ModelEvent;

trait DeleteEventTrait
{
    public function delete(): ResultInterface
    {
        $beforeEvent = new ModelEventer(ModelEvent::BEFORE_DELETE, $this);
        App::trigger($beforeEvent);

        $result = parent::delete();

        $afterEvent = new ModelEventer(ModelEvent::AFTER_DELETE, $this);
        App::trigger($afterEvent);
        return $result;
    }
}