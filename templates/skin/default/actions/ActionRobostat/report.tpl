{include file='header.tpl'}
<h3>{$aLang.plugin.robostat.robostat_showstat}</h3>
{if $aRobots}
<br/>
	<table class="table">
		<thead>
			<tr>
				<td>{$aLang.plugin.robostat.robostat_robot_name}</td>	
				<td align="center" >{$aLang.plugin.robostat.robostat_robot_today}</td>												
				<td align="center" >{$aLang.plugin.robostat.robostat_robot_yesterday}</td>
				<td align="center" >{$aLang.plugin.robostat.robostat_robot_total}</td>
			</tr>
		</thead>
		
		<tbody>
		{foreach from=$aRobots item=oRobot}
			<tr>
				<td>{$oRobot->getName()}</td>														
				<td align="center">{$oRobot->getToday()}</td>
				<td align="center">{$oRobot->getYesterday()}</td>
				<td align="center">{$oRobot->getTotal()}</td>
			</tr>
		{/foreach}						
		</tbody>
	</table>
{else}
	{$aLang.plugin.robostat.robostat_no_stat}
{/if}

				

{include file='footer.tpl'}