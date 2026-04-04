<?php

namespace SlapperParticle;

use pocketmine\scheduler\PluginTask;
use pocketmine\{Player, Server};
use pocketmine\plugin\{Plugin, PluginBase};
use pocketmine\level\particle\{DustParticle, CriticalParticle};
use pocketmine\math\Vector3;
use pocketmine\event\Listener;
use slapper\entities\SlapperHuman;

class Main extends PluginBase implements Listener {

public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->getServer()->getScheduler()->scheduleRepeatingTask(new Particle($this), 0);
    }
}

class Particle extends PluginTask implements Listener {

public function __construct(Main $plugin){
$this->plugin = $plugin;
$this->r = 0;
parent::__construct($plugin);
}

public function onRun($tick){
if($this->r < 0){
$this->r++;
return true;
}
$levels = $this->plugin->getServer()->getLevels();
foreach($levels as $l){
$entity = $l->getEntities();
foreach($entity as $e){
if($e instanceof SlapperHuman){
$x = $e->getX();
$y = $e->getY();
$z = $e->getZ();
$level = $this->plugin->getServer()->getDefaultLevel();
$hypo = 0.8;
$a = cos(deg2rad($this->r/0.09))* $hypo;
$b = sin(deg2rad($this->r/0.09))* $hypo;
$time = microtime(true) - \pocketmine\START_TIME;
$seconds = floor($time % 20);
$up = $seconds/5;
$p1 = new Vector3($x - $a, $y + $up, $z - $b);
$p2 = new Vector3($x - $b, $y + $up, $z - $a);
$pl1 = new DustParticle(($p1),255, 255, 255);
$pl2 = new DustParticle(($p2),255, 255, 255);
$level->addParticle($pl1);
$level->addParticle($pl2);
$this->r++;
                }
            }
        }
    }
}