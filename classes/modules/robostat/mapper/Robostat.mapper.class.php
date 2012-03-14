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

Class PluginRobostat_ModuleRobostat_MapperRobostat extends Mapper {
	
	// Получаем статистику по заданому роботу
	public function GetRobostat($sId)
	{
		$sql = "SELECT * FROM ".Config::Get('plugin.robostat.table.robots')." WHERE robot_id = ?d";
		if ($aRow=$this->oDb->selectRow($sql,$sId)) {
			$r=Engine::GetEntity('PluginRobostat_ModuleRobostat_EntityRobot',$aRow);

			// Если дата поменялась, то поменять текущую дату и обновить вчерашнюю/сегодняшнюю статистику
			if ($r->getTodayDate()!=date("Y-m-d"))
			{
				$sql = "UPDATE ".Config::Get('plugin.robostat.table.robots')."
			SET
				robot_today_date = ?,
				robot_today = 0,
				robot_yesterday = ?d
			WHERE robot_id=?d";
				if ($this->oDb->query($sql,date("Y-m-d"),$r->getToday(),$r->getId()))
				{
					return $this->GetRobostat($sId);
				}
			}
			else return $r;
		}
		return null;
	}

	// Получаем статистику по всем роботам
	public function GetAllRobostat()
	{
		$sql = "SELECT robot_id FROM ".Config::Get('plugin.robostat.table.robots')." order by robot_total desc";
		$rr=array();
		$aRows=$this->oDb->select($sql);
		foreach ($aRows as $aRow) {
			$rr[]=$this->GetRobostat($aRow['robot_id']);
		}
		return $rr;
	}

	// Обновляем статистику заданого робота. Увеличиваем счетчики.
	public function UpdateRobostat($sId)
	{
		$r=$this->GetRobostat($sId);

		if (!$r)
		{
			$sql = "INSERT INTO ".Config::Get('plugin.robostat.table.robots')."
			(
				robot_id,
				robot_today_date,
				robot_today,
				robot_yesterday,
				robot_total
			)
			VALUES(?d,?,0,0,0)
		";			
			if (!($this->oDb->query($sql,$sId,date("Y-m-d"))))
			{
				return false;
			}
			else $r=$this->GetRobostat($sId);
		}

		if (!$r) return false;

		$sql = "UPDATE ".Config::Get('plugin.robostat.table.robots')."
			SET
				robot_today = ?d,
				robot_total = ?d
			WHERE robot_id=?d";
		if ($this->oDb->query($sql,$r->getToday()+1,$r->getTotal()+1,$sId))
		{
			return true;
		}

		return false;
	}
}
?>