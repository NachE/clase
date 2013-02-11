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



class page{


	private $objFiles=array();
	private $ThemeRootPath;

	public function __construct($ThemeRootPath){
		global $debug;
		$this->ThemeRootPath=$ThemeRootPath;
		$debug->msg("Class page, construct, ThemeRootPath=$ThemeRootPath");
		$debug->msg("Class page, construct, private ThemeRootPath=$this->ThemeRootPath");
	}

	public function loadFile($file){
		global $debug;
		$debug->msg("loadFile on page class, loading file $this->ThemeRootPath $file");
		$this->objFiles[] = new htmlLoaderClass($this->ThemeRootPath);
		$this->objFiles[count($this->objFiles)-1]->loadF($file);
		return $this->objFiles[count($this->objFiles)-1];
	}

	public function printAll(){
		$html="";
		foreach ($this->objFiles as $objFile){
			$html.=$objFile->returnHTML();
		}
		return $html;
	}


}






?>
