<?php

declare(strict_types=1);

namespace SlapperParticle;

use pocketmine\color\Color;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;
use pocketmine\world\particle\DustParticle;
use slapper\entities\SlapperHuman;

final class Main extends PluginBase{
	protected function onEnable() : void{
		$this->getScheduler()->scheduleRepeatingTask(new ClosureTask(function() : void{
			$this->spawnParticles();
		}), 10);
	}

	private function spawnParticles() : void{
		foreach($this->getServer()->getWorldManager()->getWorlds() as $world){
			foreach($world->getEntities() as $entity){
				if(!$entity instanceof SlapperHuman){
					continue;
				}

				$this->spawnParticlesForEntity($entity);
			}
		}
	}

	private function spawnParticlesForEntity(SlapperHuman $entity) : void{
		$world = $entity->getWorld();
		$position = $entity->getPosition();
		$phase = $this->getServer()->getTick();
		$particle = new DustParticle(new Color(255, 255, 255));

		foreach(ParticleOrbit::positions($position->x, $position->y, $position->z, $phase) as [$x, $y, $z]){
			$world->addParticle(new Vector3($x, $y, $z), $particle);
		}
	}
}
