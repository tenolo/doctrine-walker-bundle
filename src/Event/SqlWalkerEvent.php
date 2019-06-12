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

    public const SELECT_STATEMENT = 'doctrine.sql_walker.select_statement';
    public const UPDATE_STATEMENT = 'doctrine.sql_walker.update_statement';
    public const DELETE_STATEMENT = 'doctrine.sql_walker.delete_statement';

    public const SELECT_CLAUSE = 'doctrine.sql_walker.select_clause';
    public const UPDATE_CLAUSE = 'doctrine.sql_walker.update_clause';
    public const DELETE_CLAUSE = 'doctrine.sql_walker.delete_clause';
    public const FROM_CLAUSE = 'doctrine.sql_walker.from_clause';
    public const WHERE_CLAUSE = 'doctrine.sql_walker.where_clause';
    public const GROUP_BY_CLAUSE = 'doctrine.sql_walker.group_by_clause';
    public const HAVING_CLAUSE = 'doctrine.sql_walker.having_clause';
    public const ORDER_BY_CLAUSE = 'doctrine.sql_walker.order_by_clause';
    public const JOIN = 'doctrine.sql_walker.join';

    /** @var string */
    protected $sql;

    /** @var AbstractQuery */
    protected $query;

    /** @var EntityManager */
    protected $entityManager;

    /** @var Connection */
    protected $connection;

    /** @var array */
    protected $queryComponents;

    /**
     * @param string        $sql
     * @param AbstractQuery $query
     * @param EntityManager $entityManager
     * @param Connection    $connection
     * @param array         $queryComponents
     */
    public function __construct(string $sql, AbstractQuery $query, EntityManager $entityManager, Connection $connection, array $queryComponents)
    {
        $this->sql = $sql;
        $this->query = $query;
        $this->entityManager = $entityManager;
        $this->connection = $connection;
        $this->queryComponents = $queryComponents;
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

    /**
     * @param string $dqlAlias The DQL alias.
     *
     * @return array
     */
    public function getQueryComponent($dqlAlias)
    {
        return $this->queryComponents[$dqlAlias];
    }

    /**
     * @return array
     */
    public function getQueryComponents(): array
    {
        return $this->queryComponents;
    }
}
