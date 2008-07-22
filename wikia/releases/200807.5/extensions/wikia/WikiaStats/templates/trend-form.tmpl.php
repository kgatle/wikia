<!-- s:<?= __FILE__ ?> -->
<div id="ws-main-table">
<!-- TREND's STATISTICS -->
<?php 
#--- headers with wikia
$rows = array();
$loop = 0;
$empty_row = "<td>&nbsp;</td>";
foreach ($cityOrderList as $id => $city_id)
{
	$k = ($loop % 3);
	if (!array_key_exists($k, $rows)) {
	    $rows[$k] = "";
    }
	$colspan = 3; $align="center";
	if (($loop == 0) && ($k == 0)) {
		$colspan = 2; $align="left";
	}
	#---
	$empty_row .= "<td>&nbsp;</td>";
	#---
	$dbname = (array_key_exists($city_id, $cityList)) ? $cityList[$city_id]['dbname'] : "";
	$wikiaName = ($city_id == 0) ? wfMsg('wikiastats_trend_all_wikia_text') : $dbname;
	$rows[$k] .= "<td colspan=\"$colspan\" align=\"$align\"><strong><a href=\"/index.php?title=Special:WikiaStats&action=citystats&city=$city_id\">".$wikiaName."</a></strong></td>";
	$loop++;
}

$G = 1000 * 1000 * 1000;
$M = 1000 * 1000;
$K = 1000;	
$GB = 1024 * 1024 * 1024;
$MB = 1024 * 1024;
$KB = 1024;	
?>
<div class="medium" style="float:left; width:auto;">
<?
	#--- F O R M U L A ( mean )
	$meanInfo = "<fieldset><legend>".wfMsg('wikiastats_trend_mean_info'). "</legend>";
	$meanInfo .= wfMsg('wikiastats_trend_formula'). ": ";
	#---
	$sum = 0; $meanArray = array();
	for ($i = 1; $i <= $nbr_month; $i++)
	{
		$cur_date = mktime(23, 59, 59, (date('m') + 1) - ($nbr_month - $i), 0, date('Y'));
		#---
		$day = ($i == $nbr_month) ? date("d") : date("d", $cur_date);
		$sum += $day;
		$month = substr(wfMsg(strtolower(date("F",$cur_date))), 0, 3);
		#---
		$variable = "<strong style=\"font-color:#00008B\">X" . $i . "</strong>";
		$meanArray[0][] = $variable;
		$meanArray[1][] = $variable . " = <strong>" . $day . " x " . wfMsg('wikiastats_trend_value') . "[" . $month . "]</strong>";
		$meanArray[2][] = $day;
	}
	#---
	$meanInfo .= "(" . implode(" + ", $meanArray[0]) . ") / <strong>&Sigma;1</strong> <br />" . wfMsg('wikiastats_trend_where_text') . "<br />";
	$meanInfo .= implode(",<br />", $meanArray[1]).",<br />";
	$meanInfo .= "<strong>&Sigma;1 = ".implode(" + ", $meanArray[2])." = ". $sum . "</strong>";
	$meanInfo .= "</fieldset>";
?>	
<?= $meanInfo ?>
</div>
<div class="medium" style="float:left;width:auto;margin-left: 20px;">
<?
	#--- F O R M U L A ( growth )
	$growthInfo = "<fieldset><legend>".wfMsg('wikiastats_trend_growth_info'). "</legend>";
	$growthInfo .= wfMsg('wikiastats_trend_formula'). ": ";
	#---
	$sum = 0;
	for ($i = 1; $i <= $nbr_month; $i++)
	{
		$cur_date = mktime(23, 59, 59, (date('m') + 1) - ($nbr_month - $i), 0, date('Y'));
		$next_date = mktime(23, 59, 59, (date('m') + 1) - ($nbr_month - $i - 1), 0, date('Y'));
		#---
		$day = ($i == $nbr_month) ? date("d") : date("d", $next_date);
		#---
		$month = substr(wfMsg(strtolower(date("F",$cur_date))), 0, 3);
		$next_month = substr(wfMsg(strtolower(date("F",$next_date))), 0, 3);
		#---
		if ($i < $nbr_month)
		{
			$sum += $day;
			$variable = "<strong style=\"font-color:#00008B\">G" . $i . "</strong>";
			$growthArray[0][] = $variable;
			$growthArray[1][] = $variable . " = <strong>".$day . " x (" . wfMsg('wikiastats_trend_value') . "[" . $next_month . "] - ". wfMsg('wikiastats_trend_value') . "[" . $month . "] ) / ".wfMsg('wikiastats_trend_value') . "[" . $month . "]</strong>";
			$growthArray[2][] = $day;
		}
	}
	#---
	$growthInfo .= "100% x (" . implode(" + ", $growthArray[0]) . ") / <strong>&Sigma;2</strong> <br />" . wfMsg('wikiastats_trend_where_text') . "<br />";
	$growthInfo .= implode(",<br />", $growthArray[1]).",<br />";
	$growthInfo .= "<strong>&Sigma;2 = ".implode(" + ", $growthArray[2])." = " . $sum . "</strong><br /><br />";
	$growthInfo .= "</fieldset>";
?>
<?= $growthInfo ?>
</div>
<div style="float:left; margin-left:auto;margin-right:auto;width:100%">
<?=$pager?>
</div>
<div style="float:none;clear:both;overflow-y:auto">
<table style="width:auto" class="ws-trend-table">
<?
#echo "<pre>".print_r($trend_stats, true)."</pre>";
$i = 0;
foreach ($trend_stats as $column => $dateValues)
{
	$linkText = array("wikians" => wfMsg('wikiastats_distrib_wikians'), "articles" => wfMsg('wikiastats_articles_text'), "database" => wfMsg('wikiastats_database'), "links" => wfMsg('wikiastats_links'), "usage" => wfMsg('wikiastats_daily_usage'));

	$active = "";
	if (($i >= 0) && ($i < 4)) {
		$active = $linkText["wikians"];
		$linkText["wikians"] = "";
	} elseif ( ($i >= 4) && ($i < 11) ) {
		$active = $linkText["articles"];
		$linkText["articles"] = "";
	} elseif ( ($i >= 11) && ($i < 14) ) {
		$active = $linkText["database"];
		$linkText["database"] = "";
	} elseif ( ($i >= 14) && ($i < 19) ) {
		$active = $linkText["links"];
		$linkText["links"] = "";
	} elseif ( ($i >= 19) && ($i < 21) ) {
		$active = $linkText["usage"];
		$linkText["usage"] = "";
	}
?>	
<tr>
<td colspan="<?= round(count($cityOrderList) + 3) ?>">
<table width="100%" class="ws-trend-table-nobrd">
<tr>
<td width="100%" style="height:25px;"><a name="<?=strtolower($active)?>">
<table style="width:100%;" class="ws-trend-table-wob-nobrd">
<tr>
<?
	$loop = 0;	
	$links = array();
	foreach ($linkText as $id => $name)
	{
		if (!empty($name))
		{
			$links[] = "<a href=\"/index.php?title=Special:WikiaStats&action=compare&table=1&page=$page#".$id."\">".$name."</a>";
		}
		$loop++;
	}
?>	        
<td style="width:250px" nowrap>(<?=$column?>) <?= "<strong>".implode (" - ", $links)."</strong>" ?></td>
<?
	$roundCols = round( ( (count($cityOrderList) * 5) / 100), 0);
	#---
	for ($col = 0; $col < $roundCols; $col++)
	{
?>
<td style="width:auto;text-align:center;" nowrap><strong><?= $active ?> - <a href="/index.php?title=Special:WikiaStats&action=compare&table=3"><?= wfMsg('wikiastats_mainstats_short_column_' . $column) ?></a></strong></td>
<?		
	}
?>	        
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<!-- first row with wikia -->
<tr>
<td>&nbsp;</td>
<?= $rows[0] ?>
</tr>
<!-- second row with wikia -->
<tr>
<td>&nbsp;</td>
<?= $rows[1] ?>
</tr>
<!-- third row with wikia -->
<tr>
<td colspan="2">&nbsp;</td>
<?= $rows[2] ?>
</tr>
<?	
#--- months
$loop = 0;
#echo "<pre>".print_r(array_keys($dateValues), true)."</pre>";
#exit;
foreach ($dateValues as $date => $cities)
{
	$trend = 0;
	$growth = 0;
	$backColor = "background-color: #ffffdd;";
	if ($loop == 0) #--- current date
	{
		$dateArr = explode("-", date("Y-m-d"));
		#---
		$stamp = mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]);
		$outDate = substr(wfMsg(strtolower(date("F",$stamp))), 0, 3) . " " . $dateArr[2] .", ". $dateArr[0];
	}
	else
	{
		if (!in_array($date, array('trend', 'mean', 'growth')))
		{
			$dateArr = explode("-", $date);
			#---
			$stamp = mktime(0,0,0,$dateArr[1],1,$dateArr[0]);
			$outDate = substr(wfMsg(strtolower(date("F",$stamp))), 0, 3) . " ".$dateArr[0];
		}
		else
		{
			if ($date == 'trend')
			{
				$trend = 1;
				$dateArr = explode("-", date("Y-m-f"));
				#---
				$stamp = mktime(0,0,0,$dateArr[1],1,$dateArr[0]);
				$outDate = substr(wfMsg(strtolower(date("F",$stamp))), 0, 3) . " ".$dateArr[0];
			}
			else
			{
				$outDate = ucfirst($date);
				$backColor = "background-color: #ffdead;";
				$growth = ($date == 'growth') ? 1 : 0;
			}
		}
	}
?>
<tr><td class="eb-trend" style="width: 90px;<?= $backColor ?>" nowrap><strong><?= $outDate ?></strong></td>
<?		
	foreach ($cityOrderList as $id => $city_id)
	{
        $value = (array_key_exists($city_id, $cities)) ? $cities[$city_id] : 0;
		if (empty($growth))
		{
			if ($column == 'A')
				$out = sprintf("%0d", $value);
			elseif ($column == 'H')
				$out = sprintf("%0.1f", $value);
			elseif ($column == 'I')
				$out = sprintf("%0.0f", $value);
			elseif (($column == 'J') || ($column == 'K'))
			{
				$out = sprintf("%0d%%", $value * 100);
			}
			elseif ($column == 'M')
			{
				if (intval($value) > $GB)
					$out = sprintf("%0.1f GB", $value/$GB);
				elseif (intval($value) > $MB)
					$out = sprintf("%0.1f MB", $value/$MB);
				elseif ($value > $KB)
					$out = sprintf("%0.1f KB", $value/$KB);
				else
					$out = sprintf("%0d", intval($value));
			}
			else
			{
				if (intval($value) > $G)
					$out = sprintf("%0.1f G", intval($value/$G));
				elseif (intval($value) > $M)
					$out = sprintf("%0.1f M", $value/$M);
				//elseif (intval($value) > $K)
				//	$out = sprintf("%0.1f k", intval($value)/$K);
				else
					$out = sprintf("%0d", $value);
			}
		}
		else
		{
			$out = sprintf("%0d", $value);
			if ($out < 0)
			{
				$out = "<font color=\"#800000\">".sprintf("%0.0f%%", $out)."</font>";
			}
			elseif (($out > 0) && ($out < 25))
			{
				$out = "<font color=\"#000000\">".sprintf("+%0.0f%%", $out)."</font>";
			}
			elseif (($out > 25) && ($out < 75))
			{
				$out = "<font color=\"#008000\">".sprintf("+%0.0f%%", $out)."</font>";
			}
			elseif (($out > 75) && ($out < 100))
			{
				$out = "<font color=\"#008000\"><u>".sprintf("+%0.0f%%", $out)."</u></font>";
			}
			elseif ($out >= 100)
			{
				$out = "";
			}
		}	
?>		
<td class="eb-trend" nowrap style="<?=$backColor?> width:45px;">&nbsp;<?= (($trend == 1) ? "&#177 ".$out : $out) ?><?= ((($growth == 1) && ($out !== "") && (strpos($out,"%") === false)) ? "%" : "") ?></td>
<?		
	}
?>
</tr>
<?	
	if ($loop == 0)
	{
?>
<tr style="background-color:#ffdead;font-size:1px"><?=$empty_row?></tr>
<?	
	}
	$loop++;
}
?>
<tr style="background-color:white;font-size:8pt;"><?=$empty_row?></tr>
<?
	$i++;
}
?>
</table>
</div>
<div style="float:left; margin-left:auto;margin-right:auto;width:100%">
<?=$pager?>
</div>
</div>
<!-- e:<?= __FILE__ ?> -->
