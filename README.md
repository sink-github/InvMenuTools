# InvMenuTools

**InvMenuTools is a plugin made on API 4.0.0 for MCPE.**
> This was tested on API 4.0.0-BETA3 and MCPE 1.17.30! Note, warranty is not promised.

## What does this do?
> A way to make creating inventories even easier using [Muqsit's InvMenu virion](https://github.com/Muqsit/InvMenu/tree/4.0) for PocketMine-MP.
> Note that this is a developer tool, so don't expect this to anything by itself when put on a server.

## Prerequisites 

- PocketMine-MP Software
- PHP 8.0+ (Not sure if you can use PHP 7.4, go check)
- [InvMenu 4.0](https://github.com/Muqsit/InvMenu/tree/4.0)

## Usage

> You'll need to import the ``Sink\InvMenuTools\menu\BaseMenu`` class. You'll need to use this class to extend into your child class so you can use that child class to send an inventory to any player.

```php
<?php

use Sink\InvMenuTools\menu\BaseMenu;
use pocketmine\item\VanillaItems;
use muqsit\invmenu\type\InvMenuTypeIds;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;

// these functions are necessary to put in

class TestMenu extends BaseMenu {
    
    public function onUpdate(): void{
         $this->getInventory()->setItem(0, VanillaItems::DIRT());
    }

    public function getName(): string{
         return "Test";
    }

    public function getInventoryId(): string{
         return InvMenuTypeIds::TYPE_DOUBLE_CHEST;
    }

    public function getListener(InvMenuTransaction $transaction): InvMenuTransactionResult{
         return $transaction->discard();
    }

}
```

> Now, if we were using InvMenu's virion itself and not making any use of this plugin, the code above would translate to:
> 
> Note: Assume ``$scheduler`` was referring to the ``pocketmine\scheduler\TaskScheduler`` class.

```php
$menu = InvMenu::create(InvMenuTypeIds::TYPE_DOUBLE_CHEST);
$inv = $menu->getInventory();
$scheduler->scheduleRepeatingTask(new ClosureTask(function (): void{
     $inv->setItem(0, VanillaItems::DIRT());
});
$menu->setName("Test");
$menu->setListener(function (InvMenuTransaction $transaction): InvMenuTransactionResult{
     return $transaction->discard();
});
```

> If I wanted to send it to the player (Assuming ``$player`` is referring to the ``pocketmine\player\Player`` class), you would write:

```php
$menu = new TestMenu($player);
$menu->send($player);
```

## What would this be used for?

> To be honest, it would be helpful for updating your inventory on a tick in a cleaner manner.



