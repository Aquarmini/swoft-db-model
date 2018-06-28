<?php

namespace SwoftTest\Db\Testing\Listener;

use Swoft\Bean\Annotation\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use SwoftTest\Db\Testing\Entity\User;
use Xin\Swoft\Db\Event\ModelEvent;

/**
 * Model after save handler
 *
 * @Listener(ModelEvent::AFTER_SAVE)
 */
class AfterSaveListener implements EventHandlerInterface
{
    /**
     * @param \Swoft\Event\EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        /** @var User $model */
        $model = $event->getModel();
        if (method_exists($model, 'setRoleId') && method_exists($model, 'getRoleId')) {
            $model->setRoleId($model->getRoleId() + 1);
        }
    }
}