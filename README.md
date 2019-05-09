<p align="center"><img src="https://tenolo.de/themes/486/img/tenolo_werbeagentur_bochum.png"></p>

<p align="center">
<img src="https://img.shields.io/packagist/php-v/tenolo/doctrine-walker-bundle.svg" alt="PHP Version">
<img src="https://poser.pugx.org/tenolo/doctrine-walker-bundle/downloads.svg" alt="Total Downloads">
<img src="https://poser.pugx.org/tenolo/doctrine-walker-bundle/v/stable.svg" alt="Latest Stable Version">
<img src="https://poser.pugx.org/tenolo/doctrine-walker-bundle/v/unstable.svg" alt="Latest Unstable Version">
<img src="https://poser.pugx.org/tenolo/doctrine-walker-bundle/license.svg" alt="License">
</p>

# Doctrine Walker Bundle

A Symfony Bundle to a event driven sql walker.

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
 *
 * @author  Nikita Loges
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
