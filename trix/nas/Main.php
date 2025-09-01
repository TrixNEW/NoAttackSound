<?php
declare(strict_types=1);

namespace trix\nas;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;

final class Main extends PluginBase {

    protected function onEnable(): void {
        Server::getInstance()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}