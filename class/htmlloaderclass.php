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
 * (C)Copyright 2013 Juan Antonio Nache Ramos <nache.nache@gmail.com>
 ******************************************************************************
 */

class htmlLoaderClass extends files{

	private $ThemeRootPath;
	private $html=array();	

	private function __construct($ThemeRootPath=NULL){
		if($ThemeRootPath == NULL){
			$this->__destruct();
			return FALSE;
		}else{
			$this->setThemeRootPath($ThemeRootPath);
		}
	}

	protected function setThemeRootPath($ThemeRootPath){
		//TODO: Add security here, never allow to set path out the page
		if( substr($ThemeRootPath, -1) != "/" ){
			$ThemeRootPath.="/";
		}
		$this->ThemeRootPath=$ThemeRootPath;
	}

	protected function loadF($file){
		$this->html[]=$this->readF($this->ThemeRootPath.$file);
		if($this->html != FALSE){
			//array start on index 0, we need to rest 1.
			return count($this->html)-1;
		}else{
			return FALSE;
		}
	}

	private function __destruct() {
		//AGGGG
		echo "AGGGG";
		$this->html="";
	}
}







?>
