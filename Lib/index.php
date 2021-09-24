
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

	$fp = fopen("stock.csv", "r");
	while (($data = fgetcsv($fp, 1000, ",")) !== FALSE)
	{
		$id=$data[1];
		$name=$data[0];
		$text=file('https://tw.stock.yahoo.com/q/q?s='.$id.$time);
		foreach ($text as $line_num => $line) {
			if (strpos($line,'<span class="Fz(32px) Fw(b) Lh(1) Mend(16px) D(f) Ai(c)') !== false)
			{
				$replace_example00 = explode('<span class="Fz(32px) Fw(b) Lh(1) Mend(16px) D(f) Ai(c)',$line);
				$replace_example01 = str_replace(array(">","<"),'_',$replace_example00[1]);
				$replace_example02 = explode('_',$replace_example01);
				Printf_n($name.'['.$id.']'."\t".$replace_example02[1]);
			} 
		}
	}
	fclose($fp);
	echo '戈ㄓ方:YAHOOカ';

	?>
