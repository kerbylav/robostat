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

// Обрабатываем отчеты по визитам роботов
class PluginRobostat_ActionRobostat extends ActionPlugin {
	/**
	 * Текущий юзер
	 *
	 * @var ModuleUser_EntityUser
	 */
	protected $oUserCurrent=null;

	/**
	 * Инициализация
	 *
	 * @return null
	 */
	public function Init() {
		/**
		 * Проверяем авторизован ли юзер
		 */
		if (!$this->User_IsAuthorization()) {
			$this->Message_AddErrorSingle($this->Lang_Get('not_access'));
			return Router::Action('error');
		}
		/**
		 * Получаем текущего юзера
		 */
		$this->oUserCurrent=$this->User_GetUserCurrent();
		/**
		 * Проверяем является ли юзер администратором
		 */
		if (!$this->oUserCurrent->isAdministrator()) {
			$this->Message_AddErrorSingle($this->Lang_Get('not_access'));
			return Router::Action('error');
		}

		$this->Viewer_AppendStyle(Plugin::GetTemplateWebPath('robostat').'css/style.css');
		$this->SetDefaultEvent('report');
	}

	protected function RegisterEvent() {
		$this->AddEvent('report','EventReport');
	}


	/**********************************************************************************
	 ************************ РЕАЛИЗАЦИЯ ЭКШЕНА ***************************************
	 **********************************************************************************
	 */

	protected function EventReport() {
		$aRobots=$this->PluginRobostat_Robostat_GetAllRobostat();
		$this->Viewer_Assign('aRobots',$aRobots);
	}

	/**
	 * Завершение работы Action`a
	 *
	 */
	public function EventShutdown() {

	}
}
?>