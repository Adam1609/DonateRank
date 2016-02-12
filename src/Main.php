<?php

namespace DonationRank;
//Todo:
//Rewrite Code
//Make folder Generator

use pocketmine\plugin\PluginBase; //Plugin base, without this, the plugin is F**ked
use pocketmine\command\Command; //Commands
use pocketmine\command\CommandSender; //Send Commands
use pocketmine\permission\Permission; // Get Permissions from plugin.yml
use pocketmine\event\Listener; //The heck is this....
use pocketmine\Player; //get player functions
use pocketmine\utils\Config; // Acces and creation of Config files?
use pocketmine\utils\TextFormat; // Maybe for colors

class Main extends Base implements Listener{

	public function onEnable(){
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		if(!(is_dir($this->getDataFolder()."Activated_Players/"))){
			@mkdir($this->getDataFolder()."Activated_Players/");
		$this->getLogger()->info(TextFormat::GREEN . "Folder Activated_Players Created!");
		$this->getLogger()->info(TextFormat::YELLOW . "This Folder will store activated/ranked players");
		}
			$logformat = $this->getConfig()
			if(file_exists($this->getDataFolder()."/log.".$logformat)){
			$file = $this->getDataFolder()."/log.".$logformat;
			unlink($file);
			$newFile = fopen($file, "a+");
			$this->getLogger()->info(TextFormat::GREEN."Log Created!");
			return true;
			}else{
			$this->getLogger()->info(TextFormat::RED."Could create log.".$logformat)
			$this->getLogger()->info(TextFormat::RED."IDK What happend, maybe the plugin path is protected?")
			return true;
			}
		if(!(is_dir($this->getDataFolder()."Pending_Players/"))){
			@mkdir($this->getDataFolder()."Pending_Players/");
		$this->getLogger()->info(TextFormat::GREEN . "Folder Pending_Players Created!");
		$this->getLogger()->info(TextFormat::YELLOW . "This Folder Will store Pending players");
		}
		$this->getLogger()->info(TextFormat::BLUE . "Done, Plugin Loaded.");
	}
	public function onDisable(){
		$this->getLogger()->info(TextFormat::RED . "PLUGIN UNLOADED!!");
		$this->getLogger()->info(TextFormat::RED . "Creating Backup!");
		$zip = new ZipArchive();
		$randNumber = for ($i = 0; $i<6; $i++){
		 $a .= mt_rand(0,9);
		}
		$filename = "Backups/Backup".$randNumber.".zip";

		if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
			$this->getLogger()->info(TextFormat::RED."ERROR, Could Create ".$filename."");
		}
		$zip->addFile($thisdir . "Pending_Players/","/Activated_Players/");
		echo "numfiles: " . $zip->numFiles . "\n";
		echo "status:" . $zip->status . "\n";
		$zip->close();
	}

