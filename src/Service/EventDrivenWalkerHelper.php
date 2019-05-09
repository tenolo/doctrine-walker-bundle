<?php

namespace Tenolo\Bundle\DoctrineWalkerBundle\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Tenolo\Bundle\DoctrineWalkerBundle\Doctrine\ORM\Query\EventDrivenWalker;

/**
 * Class EventDrivenWalkerHelper
 *
 * @package Tenolo\Bundle\DoctrineWalkerBundle\Service
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class EventDrivenWalkerHelper
{

    /**
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        EventDrivenWalker::initialize($eventDispatcher);
    }
}
