<?php

namespace Tenolo\Bundle\DoctrineWalkerBundle\Doctrine\ORM\Query;

use Doctrine\ORM\Query\SqlWalker;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Tenolo\Bundle\DoctrineWalkerBundle\Event\SqlWalkerEvent;

/**
 * Class EventDrivenWalker
 *
 * @package Tenolo\Bundle\DoctrineWalkerBundle\Doctrine\ORM\Query
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class EventDrivenWalker extends SqlWalker
{

    /** @var EventDispatcherInterface */
    protected static $eventDispatcher;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     */
    public static function initialize(EventDispatcherInterface $eventDispatcher): void
    {
        self::$eventDispatcher = $eventDispatcher;
    }

    /**
     * @return EventDispatcherInterface
     */
    protected function getEventDispatcher(): EventDispatcherInterface
    {
        return self::$eventDispatcher;
    }

    /**
     * @inheritDoc
     */
    public function walkFromClause($fromClause): string
    {
        $sql = parent::walkFromClause($fromClause);

        $event = $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);

        return $event->getSql();
    }

    /**
     * @param $eventName
     * @param $sql
     *
     * @return SqlWalkerEvent
     */
    protected function dispatchEvent($eventName, $sql): SqlWalkerEvent
    {
        $event = new SqlWalkerEvent(
            $sql,
            $this->getQuery(),
            $this->getEntityManager(),
            $this->getConnection()
        );

        $eventDispatcher = $this->getEventDispatcher();

        if ($eventDispatcher !== null) {
            $this->getEventDispatcher()->dispatch($eventName, $event);
        }

        return $event;
    }
}
