<?php

namespace Tenolo\Bundle\DoctrineWalkerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class TenoloDoctrineWalkerExtension
 *
 * @package Tenolo\Bundle\DoctrineWalkerBundle\DependencyInjection
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TenoloDoctrineWalkerExtension extends Extension
{

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
}
