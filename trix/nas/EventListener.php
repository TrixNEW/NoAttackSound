<?php

namespace trix\nas;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\types\LevelSoundEvent;

final class EventListener implements Listener {

    public function onDataPacket(DataPacketSendEvent $ev): void {
        $attackSounds = [
            LevelSoundEvent::ATTACK => true,
            LevelSoundEvent::ATTACK_NODAMAGE => true,
            LevelSoundEvent::ATTACK_STRONG => true
        ];

        foreach ($ev->getPackets() as $packet) {
            if ($packet instanceof LevelSoundEventPacket && isset($attackSounds[$packet->sound])) {
                $ev->cancel();
                return;
            }
        }
    }
}