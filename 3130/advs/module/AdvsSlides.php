<?php

/*
	[插件名称] 图片轮播S1
	[适用范围] 全站
*/

function AdvsSlides () { 

	global $msql;

	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$apiserver=$GLOBALS["CONF"]["apiserver"];
	$apistr=base64_encode($GLOBALS["CONF"]["phpwebUser"]."|3130|advsslides|".time()."|".md5($GLOBALS["CONF"]["phpwebUser"].$GLOBALS["CONF"]["safecode"].time())."|".$GLOBALS["CONF"]["safecode"]);
	
	
	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$var=array(
		'coltitle' => $coltitle,
		'apiserver' => $apiserver,
		'apistr' => $apistr
	);


	$str.=ShowTplTemp($TempArr["start"],$var);

	$n=0;
	$msql->query("select * from {P}_advs_lb  where groupid='$groupid' order by xuhao limit 0,$shownums");
	while($msql->next_record()){
		$id=$msql->f('id');
		$src=$msql->f('src');
		$url=$msql->f('url');
		$title=$msql->f('title');
		$text=$msql->f('text');

		$src=ROOTPATH.$src;
		$var=array (
		'n' => $n, 
		'src' => $src, 
		'url' => $url
		);
		$str.=ShowTplTemp($TempArr["list"],$var);
		
		$n++;
	}

	$str.=$TempArr["end"];

	return $str;

	
}



?>