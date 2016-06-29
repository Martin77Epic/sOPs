<?php
namespace OPs;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\permission\ServerOperator;
class Main extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->getLogger()->info(TextFormat::AQUA . "OPs");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::AQUA . "OPs.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){
        
                 case "ops":
                
			$ops = "";
			if($sender->hasPermission("chattoolspro.ops")){
				foreach($this->getServer()->getOnlinePlayers() as $p){
					if($p->isOnline() && $p->isOp()){
						$ops = $p->getName()." , ";
						$sender->sendMessage(TextFormat::AQUA."OPs online:\n".substr($ops, 0, -2));		
						return true;
					}else{
						$sender->sendMessage(TextFormat::AQUA."OPs online: \n");
						return true;
					}
				}
			}else{
				$sender->sendMessage(TextFormat::RED."No Permission!");
				return true;
			}
			
			}
	}
}
