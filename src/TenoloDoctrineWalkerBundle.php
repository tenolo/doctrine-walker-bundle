<?php

namespace Tenolo\Bundle\DoctrineWalkerBundle;

use Doctrine\ORM\Query;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tenolo\Bundle\DoctrineWalkerBundle\Doctrine\ORM\Query\EventDrivenWalker;
use Tenolo\Bundle\DoctrineWalkerBundle\Service\EventDrivenWalkerHelper;

/**
 * Class TenoloDoctrineWalkerBundle
 *
 * @package Tenolo\Bundle\DoctrineWalkerBundle
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TenoloDoctrineWalkerBundle extends Bundle
{

    /**
     * @inheritdoc
     */
    public function boot()
    {
        parent::boot();

        $this->container->get(EventDrivenWalkerHelper::class);
        $this->container->get('doctrine.orm.entity_manager')->getConfiguration()->setDefaultQueryHint(
            Query::HINT_CUSTOM_OUTPUT_WALKER,
            EventDrivenWalker::class
        );
    }
}
