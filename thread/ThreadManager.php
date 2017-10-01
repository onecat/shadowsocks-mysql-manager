<?php
namespace SSMysqlManager;

class ThreadManager extends \Volatile{

	private static $instance = null;

	public static function init(){
		self::$instance = new ThreadManager();
	}

	public static function getInstance(){
		return self::$instance;
	}

	public function add($thread){
		if($thread instanceof Thread){
			$this->{spl_object_hash($thread)} = $thread;
		}
	}

	public function remove($thread){
		if($thread instanceof Thread){
			unset($this->{spl_object_hash($thread)});
		}
	}

	public function getAll(){
		$array = [];
		foreach($this as $key => $thread){
			$array[$key] = $thread;
		}

		return $array;
	}
}