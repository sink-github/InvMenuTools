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

> You'll need to import the ``Sink\InvMenuTools\menu\BaseMenu`` class. You'll need to use this class to extend into your child class so you can use that child class to send an inventory to any player, like so:

```php
<?php
use Sink\InvMenuTools\menu\BaseMenu;
```




