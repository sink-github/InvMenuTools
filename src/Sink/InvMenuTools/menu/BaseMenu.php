<?php

namespace Sink\InvMenuTools\menu;

use Closure;
use muqsit\invmenu\InvMenu;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use pocketmine\scheduler\TaskScheduler;
use Sink\InvMenuTools\Loader;
use pocketmine\player\Player;
use Sink\InvMenuTools\utils\Collection;
use pocketmine\inventory\Inventory;
use pocketmine\scheduler\ClosureTask;

abstract class BaseMenu {

    protected InvMenu $menu;
    protected Inventory $inv;
    protected Collection $collection;
    protected ClosureTask $task;

    public function __construct(protected Player $player){
        $this->menu = InvMenu::create($this->getInventoryId());
        $this->inv = $this->menu->getInventory();
        $this->menu->setListener(Closure::fromCallable([$this, "getListener"]));
        $this->collection = new Collection();
    }

    public function getCollection(): Collection{
        return $this->collection;
    }

    public function getMenu(): InvMenu{
        return $this->menu;
    }

    public function getInventory(): Inventory{
        return $this->inv;
    }

    public function send(Player $player): void{
        $this->menu->send($player, $this->getName(), Closure::fromCallable([$this, "registerTicking"]));
    }

    public function getScheduler(): TaskScheduler{
        return Loader::getInstance()->getScheduler();
    }

    public function registerTicking(): void{
        $this->getScheduler()->scheduleRepeatingTask($this->task = new ClosureTask(function(): void{
            if(!$this->player->isOnline()){
                $this->task->getHandler()->cancel();
                return;
            }
            if($this->player->getCurrentWindow() === null){
                $this->task->getHandler()->cancel();
                return;
            }
            $this->onUpdate();
        }), 1);
    }

    abstract public function onUpdate(): void;

    abstract public function getName(): string;

    abstract public function getInventoryId(): string;

    abstract public function getListener(InvMenuTransaction $transaction): InvMenuTransactionResult;

}