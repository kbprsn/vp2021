<?php
$author_name = "j**nase";
//echo $author_name; //print
$full_time_now = date("d/m/Y H:i:s"); 
//vaatan n2dalap2eva
$weekday_now = date("N");
$weekday_names_et = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
//echo $weekday_names_et[$weekday_now - 1];
//küsime ainult tunde
$hour_now = date("H");
$day_category = "tavaline päev";
if($weekday_now <= 5) {	// < > <= >= == === !=
$day_category = "koolipäev";
} else { 
$day_category ="puhkepäev";
}
if($hour_now >=23 || $hour_now >8) {
	$hour_category = "aeg magama minna...";
} elseif ($hour_now >=8 && $hour_now <=18 && $day_category = "koolipäev") {
	$hour_category = "aeg t88d teha...";
} elseif ($hour_now <=18 && $hour_now <23) {
	$hour_category = "tee-mis-tahad aeg";
}

// lisan lehele juhusliku foto
$photo_dir = "photos/";
// loen kataloogi sisu
// $all_files = scandir($photo_dir);
$all_files = array_slice(scandir($photo_dir), 2);
// echo $all_files;
// var_dump($all_files)
$allowed_photo_types = ["image/jpeg", "image/png"];
$all_photos = [];
foreach ($all_files as $file)
$file_count = count($all_photos); {
	$file_info = getimagesize($photo_dir .$file);
	if(isset($file_info["mime"])) {
		if(in_array($file_info["mime"], $allowed_photo_types)) {
			array_push($all_photos, $file);
		}// if in_array lõppeb
	}// if isset lõppeb
} //foreach lõppeb
$photo_num = mt_rand(0, $file_count + 1);
//echo $photo_num;
//<img src="photos/pilt.jpg" alt="Tallinna Ülikool">
$photo_html = '<img src="' .$photo_dir .$all_files[$photo_num] . '"alt="Tallinna Ülikool">';
?>
<!DOCTYPE html>
<html lang="et">
<head>
<meta charset="utf-8"> 
<title><?php echo $author_name; ?> v2ga lahe veebileht</title>
</head>
<body>
<h1><?php echo $author_name; ?> v2ga lahe veebileht</h1>
<img src="78av.gif" alt="See pilt on konfiskeeritud ja eemaldatud Kaitsepolitseiameti poolt.">
<p>See leht on valminud õppetöö raames ja ei sisalda mingit tõsiseltvõetavat sisu. :( </p>
<p>Õppetöö toimub <a href="https://www.tlu.ee/en/dt">Tallinna Ülikooli Digitehnoloogiate instituudis</a>.</p>
<h2>miinusm2rk sulu ees muudab m2rki sulu sees</h2>
<p>k6igepealt korrutan, jagan, siis liidan ja lahutan</p>
<p>hobune liigub kappadi kappadi ja koer liigub linta-lonta</p>
<p>täna on: <span><?php echo $weekday_names_et[$weekday_now - 1] .", ". $full_time_now . ", on " .$day_category; ?></span>
<p>praegu on: <span><?php echo $hour_category; ?></span>
<h3>heiii, ls kysin et kas said sa oma fotod prinditud?</h3>
<h4>- jah, sain :)</h4>
<?php echo $photo_html; ?>
</body>
</html> 
