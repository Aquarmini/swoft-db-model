<?php

namespace Xin\Swoft\Db;

use Swoft\App;
use Swoft\Core\ResultInterface;
use Swoft\Db\Model as SwoftModel;
use Xin\Swoft\Db\Event\Events\ModelEventer;
use Xin\Swoft\Db\Event\ModelEvent;

class Model extends SwoftModel
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

    public function delete(): ResultInterface
    {
        $beforeEvent = new ModelEventer(ModelEvent::BEFORE_DELETE, $this);
        App::trigger($beforeEvent);

        $result = parent::delete();

        $afterEvent = new ModelEventer(ModelEvent::AFTER_DELETE, $this);
        App::trigger($afterEvent);
        return $result;
    }

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
