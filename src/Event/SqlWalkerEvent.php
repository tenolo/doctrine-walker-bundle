<?php

namespace Tenolo\Bundle\DoctrineWalkerBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Connection;

/**
 * Class SqlWalkerEvent
 *
 * @package Tenolo\Bundle\DoctrineWalkerBundle\Event
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class SqlWalkerEvent extends Event
{

    public const FROM_CLAUSE = 'doctrine.sql_walker.from_clause';

    /** @var string */
    protected $sql;

    /** @var AbstractQuery */
    protected $query;

    /** @var EntityManager */
    protected $entityManager;

    /** @var Connection */
    protected $connection;

    /**
     * @param string        $sql
     * @param AbstractQuery $query
     * @param EntityManager $entityManager
     * @param Connection    $connection
     */
    public function __construct(string $sql, AbstractQuery $query, EntityManager $entityManager, Connection $connection)
    {
        $this->sql = $sql;
        $this->query = $query;
        $this->entityManager = $entityManager;
        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return $this->sql;
    }

    /**
     * @param string $sql
     */
    public function setSql(string $sql): void
    {
        $this->sql = $sql;
    }

    /**
     * @return AbstractQuery
     */
    public function getQuery(): AbstractQuery
    {
        return $this->query;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    /**
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return $this->connection;
    }
}
