
	<?php
	function Printf_n($string)//虫ゅ块传︽
	{
		echo $string."\n";
	}
	
	set_time_limit(0);//礚单
	Printf_n('jash-liao -基穝╰参:'); 

	date_default_timezone_set("Asia/Taipei");
	Printf_n('穝丁:'. date ("Y- m - d / H : i : s")); 
	$time='&t='.date ("YmdHis");

	/*
	$fp = fopen("stock.csv", "r");//local File
	while (($data = fgetcsv($fp, 1000, ",")) !== FALSE)
	{
		$id=$data[1];
		$name=$data[0];
		$text=file('https://tw.stock.yahoo.com/q/q?s='.$id.$time);
		foreach ($text as $line_num => $line) {
			if (preg_match("/><b>/i", $line))
			{
				$a='<td align="center" bgcolor="#FFFfff" nowrap><b>';
				$b='</b></td>';
				//str_replace (取代前的字串,取代後字串,要取代的字串);
				$line=str_replace ($b,'',str_replace ($a,'',$line));
				Printf_n($name.'['.$id.']'."\t".$line);
			} 
		}
	}
	fclose($fp);
	*/
	$csvData = file_get_contents('https://github.com/jash-git/TW_save_stock-windows_cmd-/blob/master/stock.csv?raw=true', true);	
	$lines = preg_split('/\n|\r\n?/', $csvData);//字串換行 分割(切割)
	//print_r($lines);//印出陣列
	foreach ($lines as $line)
	{
		$data=explode(',', $line);
		//print_r($data);
		$id=$data[1];
		$name=$data[0];
		$text=file('https://tw.stock.yahoo.com/q/q?s='.$id.$time);
		foreach ($text as $line_num => $line) {
			if (preg_match("/><b>/i", $line))
			{
				$a='<td align="center" bgcolor="#FFFfff" nowrap><b>';
				$b='</b></td>';
				//str_replace (取代前的字串,取代後字串,要取代的字串);
				$line=str_replace ($b,'',str_replace ($a,'',$line));
				Printf_n($name.'['.$id.']'."\t".$line);
			} 
		}		
	}
	echo '戈ㄓ方:YAHOOカ';

	?>
