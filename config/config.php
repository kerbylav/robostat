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
$config=array();
$config['table']['robots']                = '___db.table.prefix___robostat_robots';
$config['robots']=array(
		1=>array(
	'name'=>'Yandex',
	'agents'=>array('yandexbot')
		),
		2=>
		array(
	'name'=>'Google',
	'agents'=>array('googlebot')
		),
		3=>
		array(
	'name'=>'Rambler',
	'agents'=>array('stackrambler')
		),
		4=>
		array(
	'name'=>'MSN',
	'agents'=>array('msnbot')
		),
		5=>
		array(
	'name'=>'Yahoo!',
	'agents'=>array('slurp')
		),
		6=>
		array(
	'name'=>'Alexa',
	'agents'=>array('ia_archiver')
		),
/*		7=>
		array(
	'name'=>'Test',
	'agents'=>array('trident/4.0')
		),*/
		);

Config::Set('router.page.robostat', 'PluginRobostat_ActionRobostat');

return $config;
?>