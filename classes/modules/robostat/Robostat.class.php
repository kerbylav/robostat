<?php
/*
 *
 * Project Name : Robostat plugin
 * Copyright (C) 2011 Alexei Lukin. All rights reserved.
 * GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * $Rev: 9 $
 * $Date: 2011-01-17 17:12:16 +0300 (Mon, 17 Jan 2011) $
 * $LastChangedDate: 2011-01-17 17:12:16 +0300 (Mon, 17 Jan 2011) $
 *
 */

/**
 * Модуль роботостатистики
 *
 */
class PluginRobostat_ModuleRobostat extends Module {
	/**
	 * Меппер для сохранения логов в базу данных и формирования выборок по данным из базы
	 *
	 * @var Mapper_Profiler
	 */
	protected $oMapper;

	/**
	 * Инициализация модуля
	 */
	public function Init() {
		$this->oMapper=Engine::GetMapper(__CLASS__);
	}

	public function UpdateRobostat($sId)
	{
		return $this->oMapper->UpdateRobostat($sId);
	}
		
	public function GetRobostat($sId)
	{
		return $this->oMapper->GetRobostat($sId);
	}
	
	public function GetAllRobostat()
	{
		return $this->oMapper->GetAllRobostat();
	}
}
?>