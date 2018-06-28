<?php

namespace SwoftTest\Db\Testing\Listener;

use Swoft\Bean\Annotation\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use SwoftTest\Db\Testing\Entity\User;
use Xin\Swoft\Db\Event\ModelEvent;

/**
 * Model before save handler
 *
 * @Listener(ModelEvent::BEFORE_SAVE)
 */
class BeforeSaveListener implements EventHandlerInterface
{
    /**
     * @param \Swoft\Event\EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        /** @var User $model */
        $model = $event->getModel();
        if (method_exists($model, 'setCreatedAt') && method_exists($model, 'setUpdatedAt')) {
            $date = date('Y-m-d H:i:s');
            $model->setCreatedAt($date);
            $model->setUpdatedAt($date);
        }
    }
}