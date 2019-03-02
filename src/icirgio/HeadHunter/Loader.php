<?php
/**
 * Created by PhpStorm.
 * User: iCirgio
 * Date: 2/16/2019
 * Time: 10:58 AM
 */
namespace icirgio\HeadHunter;

use pocketmine\utils\Config;
use pocketmine\event\Listener;
use icirgio\HeadHunter\HeadHuntingEvent;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase implements Listener {

    public function onEnable()
    {
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . 'config.yml', Config::YAML);
        $this->getServer()->getPluginManager()->registerEvents(new HeadHuntingEvent($this), $this);
        $this->getServer()->getLogger()->info("Plugin HeadHunter Enabled!");
    }

    public function onDisable()
    {
        $this->getServer()->getLogger()->info("Plugin HeadHunter Disabled!");
    }
}
