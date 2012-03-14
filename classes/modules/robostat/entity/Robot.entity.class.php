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

class PluginRobostat_ModuleRobostat_EntityRobot extends Entity
{
	public function getId() {
		return $this->_aData['robot_id'];
	}
	public function getName() {
		$a=Config::Get('plugin.robostat.robots');
		if ($a[$this->getId()]) return $a[$this->getId()]['name']; else return ""; 
	}
	public function getYesterday() {
		return $this->_aData['robot_yesterday'];
	}
	public function getTodayDate() {
		return substr($this->_aData['robot_today_date'],0,10);
	}
	public function getToday() {
		return $this->_aData['robot_today'];
	}
	public function getTotal() {
		return $this->_aData['robot_total'];
	}
	public function setId($data) {
		$this->_aData['robot_id']=$data;
	}
	public function setYesterday($data) {
		$this->_aData['robot_yesterday']=$data;
	}
	public function setToday($data) {
		$this->_aData['robot_today']=$data;
	}
	public function setTodayDate($data) {
		$this->_aData['robot_today_date']=$data;
	}
	public function setTotal($data) {
		$this->_aData['robot_total']=$data;
	}
}
?>