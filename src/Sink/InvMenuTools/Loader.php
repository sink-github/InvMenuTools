<?php

namespace Sink\InvMenuTools;

use pocketmine\plugin\PluginBase;

class Loader extends PluginBase {

    protected static Loader $instance;

    protected function onLoad(): void{
        self::$instance = $this;
    }

    public static function getInstance(): Loader{
        return self::$instance;
    }

}