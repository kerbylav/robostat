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
 * Регистрация хуков
 *
 */
class PluginRobostat_HookRobostat extends Hook {    

    public function RegisterHook() {    	
       	$this->AddHook('template_html_head_end', 'Robostat');
    }

    /**
     * Выводим HTML
     *
     */
    public function Robostat($aData) {
		$robots=Config::Get('plugin.robostat.robots');
		
    	$s=strtolower($_SERVER['HTTP_USER_AGENT']);
    	
    	$found=false;
    	foreach ($robots as $k=>$a)
    	{
    		foreach ($a['agents'] as $v)
    		{
    			if (strpos($s,$v)!==false)
    			{
    				$found=true;
    				break;
    			}
    		}
    		
    		if ($found) break;
    	}
    	
    	if ($found)
    	{
    		$this->PluginRobostat_Robostat_UpdateRobostat($k);
    	}
    }    
}
?>