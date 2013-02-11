<?php
/*
 ******************************************************************************
 *    This file is part of Clase PHP Framework.
 *
 *    Clase PHP Framework is free software: you can redistribute it and/or
 *    modify it under the terms of the GNU General Public License as
 *    published by the Free Software Foundation, either version 3 of the
 *    License, or (at your option) any later version.
 *
 *    Clase PHP Framework  is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 ******************************************************************************
 * (C)Copyright 2013 J.A. Nache <nache.nache@gmail.com>
 *
 */



class claseDebug{
	private $msg;
	public function msg($msg,$level=0){
		$this->msg.=$msg."\n";
	}

	public function rawmsg($msg,$level=0){
		$this->msg.=$msg;
	}

	public function printDebug(){
		echo $this->msg;
	}
}

$debug = new claseDebug();

class claseConfig{
/**********************
* Do not edit this
***********************/
//conf var is used to store config of the system is a private var, so use set() and get()
	private $conf = array();	
/**********************/

	/** 
	* Add new variable config or change value
	* of an existing one. 
	* @param mixed $varName, mixed $varValue 
	*/ 
	public function set($varName,$varValue){$this->conf[$varName]=$varValue;}

	/**
	* Get the value of config variable
	* @param mixed $varName
	*/
	public function get($varName){return $this->conf[$varName];}

	//__construct Only for PHP >= 5.3.3
	public function __construct($rootpath=NULL, $classpath=NULL){
		if( $rootpath == NULL ){
			$this->set(
				"ROOTPATH" , dirname(__FILE__)."/"
			);
		}else{
			$this->set(
				"ROOTPATH" , $rootpath
			);
		}

		if( $classpath == NULL ){
			$this->set(
				"CLASSPATH" , $this->get("ROOTPATH")."class/"
			);
		}else{
			$this->set(
				"CLASSPATH" , $classpath
			);
		}
	}
	/** 
	* The only way to add news files to include
	* @param none
	*/ 
	public function getIncludes(){
		$CLASSPATH=$this->get("CLASSPATH");
		return array(
				$CLASSPATH."criptclass.php",
				$CLASSPATH."dbclass.php",
				$CLASSPATH."filesclass.php",
				$CLASSPATH."mainpageclass.php",
				$CLASSPATH."htmlloaderclass.php",
				$CLASSPATH."pageclass.php",
				$CLASSPATH."themesclass.php"
			);
	}
}//end of claseConfig

$claseConfig = new claseConfig();
foreach ( $claseConfig->getIncludes() as $file ){
	include($file);
}

?>
