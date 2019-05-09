[![tenolo](https://tenolo.de/themes/486/img/tenolo_werbeagentur_bochum.png)](https://tenolo.de)


[![PHP Version](https://img.shields.io/packagist/php-v/tenolo/doctrine-walker-bundle.svg)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![Latest Stable Version](https://poser.pugx.org/tenolo/doctrine-walker-bundle/v/stable)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![Total Downloads](https://poser.pugx.org/tenolo/doctrine-walker-bundle/downloads)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![Latest Unstable Version](https://poser.pugx.org/tenolo/doctrine-walker-bundle/v/unstable)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)
[![License](https://poser.pugx.org/tenolo/doctrine-walker-bundle/license)](https://packagist.org/packages/tenolo/doctrine-walker-bundle)

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
