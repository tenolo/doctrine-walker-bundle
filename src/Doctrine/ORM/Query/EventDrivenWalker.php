<?php

namespace Tenolo\Bundle\DoctrineWalkerBundle\Doctrine\ORM\Query;

use Doctrine\ORM\Query\AST;
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
    public function walkSelectStatement(AST\SelectStatement $AST)
    {
        $sql = parent::walkSelectStatement($AST);

        return $this->dispatchEvent(SqlWalkerEvent::SELECT_STATEMENT, $sql);
    }

    /**
     * @inheritDoc
     */
    public function walkUpdateStatement(AST\UpdateStatement $AST)
    {
        $sql = parent::walkUpdateStatement($AST);

        return $this->dispatchEvent(SqlWalkerEvent::UPDATE_STATEMENT, $sql);
    }

    /**
     * @inheritDoc
     */
    public function walkDeleteStatement(AST\DeleteStatement $AST)
    {
        $sql = parent::walkDeleteStatement($AST);

        return $this->dispatchEvent(SqlWalkerEvent::DELETE_STATEMENT, $sql);
    }

    /**
     * @inheritDoc
     */
    public function walkFromClause($fromClause): string
    {
        $sql = parent::walkFromClause($fromClause);

        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkEntityIdentificationVariable($identVariable)
//    {
//        $sql = parent::walkEntityIdentificationVariable($identVariable);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkIdentificationVariable($identificationVariable, $fieldName = null)
//    {
//        $sql = parent::walkIdentificationVariable($identificationVariable, $fieldName);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkPathExpression($pathExpr)
//    {
//        $sql = parent::walkPathExpression($pathExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkIdentificationVariableDeclaration($identificationVariableDecl)
//    {
//        $sql = parent::walkIdentificationVariableDeclaration($identificationVariableDecl);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkRangeVariableDeclaration($rangeVariableDeclaration)
//    {
//        $sql = parent::walkRangeVariableDeclaration($rangeVariableDeclaration);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkJoinAssociationDeclaration($joinAssociationDeclaration, $joinType = AST\Join::JOIN_TYPE_INNER, $condExpr = null)
//    {
//        $sql = parent::walkJoinAssociationDeclaration($joinAssociationDeclaration, $joinType, $condExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkFunction($function)
//    {
//        $sql = parent::walkFunction($function);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }

    /**
     * @inheritDoc
     */
    public function walkOrderByClause($orderByClause)
    {
        $sql = parent::walkOrderByClause($orderByClause);

        return $this->dispatchEvent(SqlWalkerEvent::ORDER_BY_CLAUSE, $sql);
    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkOrderByItem($orderByItem)
//    {
//        $sql = parent::walkOrderByItem($orderByItem);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }

    /**
     * @inheritDoc
     */
    public function walkHavingClause($havingClause)
    {
        $sql = parent::walkHavingClause($havingClause);

        return $this->dispatchEvent(SqlWalkerEvent::HAVING_CLAUSE, $sql);
    }

    /**
     * @inheritDoc
     */
    public function walkJoin($join)
    {
        $sql = parent::walkJoin($join);

        return $this->dispatchEvent(SqlWalkerEvent::JOIN, $sql);
    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkCoalesceExpression($coalesceExpression)
//    {
//        $sql = parent::walkCoalesceExpression($coalesceExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkNullIfExpression($nullIfExpression)
//    {
//        $sql = parent::walkNullIfExpression($nullIfExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkGeneralCaseExpression(AST\GeneralCaseExpression $generalCaseExpression)
//    {
//        $sql = parent::walkGeneralCaseExpression($generalCaseExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkSimpleCaseExpression($simpleCaseExpression)
//    {
//        $sql = parent::walkSimpleCaseExpression($simpleCaseExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkSelectExpression($selectExpression)
//    {
//        $sql = parent::walkSelectExpression($selectExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkQuantifiedExpression($qExpr)
//    {
//        $sql = parent::walkQuantifiedExpression($qExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkSubselect($subselect)
//    {
//        $sql = parent::walkSubselect($subselect);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkSubselectFromClause($subselectFromClause)
//    {
//        $sql = parent::walkSubselectFromClause($subselectFromClause);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkSimpleSelectClause($simpleSelectClause)
//    {
//        $sql = parent::walkSimpleSelectClause($simpleSelectClause);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkParenthesisExpression(AST\ParenthesisExpression $parenthesisExpression)
//    {
//        $sql = parent::walkParenthesisExpression($parenthesisExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkNewObject($newObjectExpression, $newObjectResultAlias = null)
//    {
//        $sql = parent::walkNewObject($newObjectExpression, $newObjectResultAlias);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkSimpleSelectExpression($simpleSelectExpression)
//    {
//        $sql = parent::walkSimpleSelectExpression($simpleSelectExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkAggregateExpression($aggExpression)
//    {
//        $sql = parent::walkAggregateExpression($aggExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }

    /**
     * @inheritDoc
     */
    public function walkGroupByClause($groupByClause)
    {
        $sql = parent::walkGroupByClause($groupByClause);

        return $this->dispatchEvent(SqlWalkerEvent::GROUP_BY_CLAUSE, $sql);
    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkGroupByItem($groupByItem)
//    {
//        $sql = parent::walkGroupByItem($groupByItem);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }

    /**
     * @inheritDoc
     */
    public function walkSelectClause($selectClause)
    {
        $sql = parent::walkSelectClause($selectClause);

        return $this->dispatchEvent(SqlWalkerEvent::SELECT_CLAUSE, $sql);
    }

    /**
     * @inheritDoc
     */
    public function walkDeleteClause(AST\DeleteClause $deleteClause)
    {
        $sql = parent::walkDeleteClause($deleteClause);

        return $this->dispatchEvent(SqlWalkerEvent::DELETE_CLAUSE, $sql);
    }

    /**
     * @inheritDoc
     */
    public function walkUpdateClause($updateClause)
    {
        $sql = parent::walkUpdateClause($updateClause);

        return $this->dispatchEvent(SqlWalkerEvent::UPDATE_CLAUSE, $sql);
    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkUpdateItem($updateItem)
//    {
//        $sql = parent::walkUpdateItem($updateItem);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }

    /**
     * @inheritDoc
     */
    public function walkWhereClause($whereClause)
    {
        $sql = parent::walkWhereClause($whereClause);

        return $this->dispatchEvent(SqlWalkerEvent::WHERE_CLAUSE, $sql);
    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkConditionalExpression($condExpr)
//    {
//        $sql = parent::walkConditionalExpression($condExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkConditionalTerm($condTerm)
//    {
//        $sql = parent::walkConditionalTerm($condTerm);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkConditionalFactor($factor)
//    {
//        $sql = parent::walkConditionalFactor($factor);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkConditionalPrimary($primary)
//    {
//        $sql = parent::walkConditionalPrimary($primary);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkExistsExpression($existsExpr)
//    {
//        $sql = parent::walkExistsExpression($existsExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkCollectionMemberExpression($collMemberExpr)
//    {
//        $sql = parent::walkCollectionMemberExpression($collMemberExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkEmptyCollectionComparisonExpression($emptyCollCompExpr)
//    {
//        $sql = parent::walkEmptyCollectionComparisonExpression($emptyCollCompExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkNullComparisonExpression($nullCompExpr)
//    {
//        $sql = parent::walkNullComparisonExpression($nullCompExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkInExpression($inExpr)
//    {
//        $sql = parent::walkInExpression($inExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkInstanceOfExpression($instanceOfExpr)
//    {
//        $sql = parent::walkInstanceOfExpression($instanceOfExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkInParameter($inParam)
//    {
//        $sql = parent::walkInParameter($inParam);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkLiteral($literal)
//    {
//        $sql = parent::walkLiteral($literal);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkBetweenExpression($betweenExpr)
//    {
//        $sql = parent::walkBetweenExpression($betweenExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkLikeExpression($likeExpr)
//    {
//        $sql = parent::walkLikeExpression($likeExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkStateFieldPathExpression($stateFieldPathExpression)
//    {
//        $sql = parent::walkStateFieldPathExpression($stateFieldPathExpression);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkComparisonExpression($compExpr)
//    {
//        $sql = parent::walkComparisonExpression($compExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkInputParameter($inputParam)
//    {
//        $sql = parent::walkInputParameter($inputParam);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkArithmeticExpression($arithmeticExpr)
//    {
//        $sql = parent::walkArithmeticExpression($arithmeticExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkSimpleArithmeticExpression($simpleArithmeticExpr)
//    {
//        $sql = parent::walkSimpleArithmeticExpression($simpleArithmeticExpr);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkArithmeticTerm($term)
//    {
//        $sql = parent::walkArithmeticTerm($term);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkArithmeticFactor($factor)
//    {
//        $sql = parent::walkArithmeticFactor($factor);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkArithmeticPrimary($primary)
//    {
//        $sql = parent::walkArithmeticPrimary($primary);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkStringPrimary($stringPrimary)
//    {
//        $sql = parent::walkStringPrimary($stringPrimary);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function walkResultVariable($resultVariable)
//    {
//        $sql = parent::walkResultVariable($resultVariable);
//
//        return $this->dispatchEvent(SqlWalkerEvent::FROM_CLAUSE, $sql);
//    }

    /**
     * @param $eventName
     * @param $sql
     *
     * @return string
     */
    protected function dispatchEvent($eventName, $sql): string
    {
        $eventDispatcher = $this->getEventDispatcher();

        if ($eventDispatcher !== null && $eventDispatcher->hasListeners($eventName)) {
            $event = new SqlWalkerEvent(
                $sql,
                $this->getQuery(),
                $this->getEntityManager(),
                $this->getConnection(),
                $this->getQueryComponents()
            );

            $eventDispatcher->dispatch($eventName, $event);
            $sql = $event->getSql();
        }

        return $sql;
    }
}
