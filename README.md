[![tenolo](https://content.tenolo.com/tenolo.png)](https://tenolo.de)

[![PHP Version](https://img.shields.io/packagist/php-v/tenolo/doctrine-walker-bundle.svg)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![Latest Stable Version](https://img.shields.io/packagist/v/tenolo/doctrine-walker-bundle.svg?label=stable)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![Latest Unstable Version](https://img.shields.io/packagist/vpre/tenolo/doctrine-walker-bundle.svg?label=unstable)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![Total Downloads](https://img.shields.io/packagist/dt/tenolo/doctrine-walker-bundle.svg)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![Total Downloads](https://img.shields.io/packagist/dm/tenolo/doctrine-walker-bundle.svg)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![License](https://img.shields.io/packagist/l/tenolo/doctrine-walker-bundle.svg)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)

# Doctrine Walker Bundle

A Symfony Bundle to add a event driven sql walker in Doctrine.

## Install instructions

First you need to add `tenolo/doctrine-walker-bundle` to `composer.json`:

``` json
{
   "require": {
        "tenolo/doctrine-walker-bundle": "~1.0"
    }
}
```

or just do `composer require tenolo/doctrine-walker-bundle`

Please note that `dev-master` latest development version. 
Of course you can also use an explicit version number, e.g., `1.0.*`.

## How to use

Just register some events.

```php
<?php

namespace Some\Namespace;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Tenolo\Bundle\DoctrineWalkerBundle\Event\SqlWalkerEvent;

/**
 * Class ExampleWalkerListener
 */
class ExampleWalkerListener implements EventSubscriberInterface
{

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            SqlWalkerEvent::FROM_CLAUSE => 'walkFromClause',
        ];
    }

    /**
     * @param SqlWalkerEvent $event
     */
    public function walkFromClause(SqlWalkerEvent $event): void
    {
        $sql = $event->getSql();
        $em = $event->getEntityManager();
        $conn = $event->getConnection();
        $query = $event->getQuery();

        // manipulate sql
        $sql = 'NONSENSE';

        $event->setSql($sql);
    }

}

```
