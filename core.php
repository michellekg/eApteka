<?php
	
	include ('connect.php');
	include ('core_local.php');
	
	define('DATE_FORMAT_RFC822','r');
	define ('is_adcommentplayer', false);
	
	define ('youtube_apikey', 'AIzaSyAdLZYFbPIYmlagSWW5QaXJ6suFwhVDDMU');

	$iplong=getiplong();
	
	$date_eng=array ('January','February','March','April','May','June','July','August','September','October','November', 'December');
	$date_rss=array ('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec');
	$date_rus=array ('января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября', 'декабря');
	$months_rus=array ('январь','февраль','март','апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь', 'декабрь');
	$months_pred=array ('январе','феврале','марте','апреле','мае','июне','июле','августе','сентябре','октябре','ноябре', 'декабре');
	$date_weekdays=array ('воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье');
	$timeofyear=array ('зима','весна','лето','осень');
	$timeofyear_codenames=array ('winter','spring','summer','fall');
	$timeofyear_rod=array ('зимы','весны','лета','осени');
	$timeofyear_m=array ('зимний','весенний','летний','осенний');
	$weekdays_rus=array ('понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье');
	$weekdays_rus_vp=array ('понедельник', 'вторник', 'среду', 'четверг', 'пятницу', 'субботу', 'воскресенье');
	$weekdays_rus_short=array ('Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');

	$weekdays_eng=array ('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
	$date_days=array (31,28,31,30,31,30,31,31,30,31,30,31);
	$numbers_m=array ('ноль','один','два','три','четыре','пять','шесть','семь','восемь','девять','десять');
	$numbers_s=array ('ноль','одно','два','три','четыре','пять','шесть','семь','восемь','девять','десять');
	$numbers_zh=array ('ноль','одна','две','три','четыре','пять','шесть','семь','восемь','девять','десять');
	$numbers_padezh_rod=array ('нуля','одного','двух','трех','четырех','пяти','шести','семи','восьми','девяти','десяти');
	$platforms_short=array ('na'=>'','pc'=>'PC','ps3'=>'PlayStation 3','xb360'=>'Xbox 360','wii'=>'Nintendo Wii','ps2'=>'PlayStation 2','psp'=>'PSP','mobile'=>'Телефоны','wiiware'=>'Wii Ware','ds'=>'Nintendo DS','gba'=>'GameBoy Advance','gc'=>'GameCube','snes'=>'SNES','nes'=>'NES','ps1'=>'PSOne','xbox'=>'Xbox','vcon'=>'Wii Virtual Console','xbla'=>'Xbox Live Arcade');
	
	$countries=array (
	'International',
	'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Belarus', 'Belgium', 'Bolivia', 'Bosnia and Herzegovina', 'Brazil', 'Bulgaria', 'Cambodia', 'Canada', 'Chile', 'China', 'Colombia', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Estonia', 'Finland', 'France', 'Georgia', 'Germany', 'Greece', 'Guatemala', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kuwait', 'Lebanon', 'Lithuania', 'Luxembourg', 'Malaysia', 'Mexico', 'Netherlands', 'New Zealand', 'Nicaragua', 'Norway', 'Pakistan', 'Palestinian Territory', 'Panama', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Republic of Macedonia', 'Romania', 'Russia', 'Serbia', 'Singapore', 'Slovakia', 'Slovenia', 'South Africa', 'South Korea', 'Spain', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Thailand', 'Turkey', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'USA', 'Uruguay', 'Venezuela'
	);
	
	$countries_rus = array (
	'Международный прокат',
	'Аргентина', 'Армения', 'Австралия', 'Австрия', 'Азербайджан', 'Белоруссия', 'Бельгия', 'Боливия', 'Босния и Герцеговина', 'Бразилия', 'Болгария', 'Камбоджа', 'Канада', 'Чили', 'Китай', 'Колумбия', 'Коста-Рика', 'Хорватия', 'Куба', 'Кипр', 'Чешская Республика', 'Дания', 'Доминиканская Республика', 'Эквадор', 'Египет', 'Сальвадор', 'Эстония', 'Финляндия', 'Франция', 'Джорджия', 'Германия', 'Греция', 'Гватемала', 'Гондурас', 'Гонконг', 'Венгрия', 'Исландия', 'Индия', 'Индонезия', 'Иран', 'Ирландия', 'Израиль', 'Италия', 'Ямайка', 'Япония', 'Иордания', 'Казахстан', 'Кувейт', 'Ливан', 'Литва', 'Люксембург', 'Малайзия', 'Мексика', 'Нидерланды', 'Новая Зеландия', 'Никарагуа', 'Норвегия', 'Пакистан', 'Палестинская Территория', 'Панама', 'Парагвай', 'Перу', 'Филиппины', 'Польша', 'Португалия', 'Пуэрто-Рико', 'Катар', 'Республика Македонии', 'Румыния', 'Россия', 'Сербия', 'Сингапур', 'Словакия', 'Словения', 'Южная Африка', 'Южная Корея', 'Испания', 'Швеция', 'Швейцария', 'Сирия', 'Тайвань', 'Таиланд', 'Турция', 'Украина', 'Объединенные Арабские Эмираты', 'Соединенное Королевство', 'Соединенные Штаты', 'США', 'Уругвай', 'Венесуэла'
	);
	
	$genre_eng=array ('Action and Adventure', 'Action', 'Crime', 'Fantasy', 'Drama', 'Sci-Fi', 'Science-Fiction', 'Comedy', 'Thriller', 'Romance', 'History', 'War', 'Horror', 'Mystery', 'Erotic', 'Animation', 'Family', 'Adventure', 'Documentary', 'Musical', 'Supernatural', 'Western', 'Biography', 'Sport');
	
	$genre_rus=array ('приключенческий боевик', 'боевик', 'детектив', 'фэнтэзи', 'драма', 'научная фантастика', 'научная фантастика', 'комедия', 'триллер', 'романтический', 'исторический', 'военный', 'ужастик', 'мистика', 'эротика', 'мультфильм', 'семейный', 'приключенческий',  'документальный', 'музыкальный','сверхъестественный', 'вестер', 'биография', 'спорт');

	mb_regex_encoding("UTF-8");
	mb_internal_encoding("UTF-8");

/*
	require_once 'include/mobiledetect/Mobile_Detect.php';
	$detect = new Mobile_Detect;
	
	if($detect->isMobile() && !$detect->isTablet())
		define ("ISMOBILE", TRUE);
	else
		define ("ISMOBILE", FALSE);

	if ($detect->isMobile() && $detect->isTablet())
		define ("ISTABLET", TRUE);
	else
		define ("ISTABLET", FALSE);
*/
	
function inc (&$var, $inc=1){
	$var = isset($var) ? $var += $inc : $var = $inc;
}

function concat (&$var, $inc){
	$var = isset($var) ? $var .= $inc : $var = $inc;
}


	
function str_begins ($str, $substr)
{
	if (mb_substr($str,0,mb_strlen($substr))==$substr)
		return true;
	else
		return false;		
}

function get ($s)
{
	return (isset($_GET[$s])?$_GET[$s]:'');
}

function post ($s)
{
	return (isset($_POST[$s])?$_POST[$s]:'');
}

function req ($s)
{
	return (isset($_POST[$s])?$_POST[$s]:(isset($_GET[$s])?$_GET[$s]:''));
	
}


function cookie ($s)
{
	return (isset($_COOKIE[$s])?$_COOKIE[$s]:'');
}

function mres ($s)
{
	return mysqli_real_escape_string($GLOBALS['sqlink'], $s);
}

function not_empty ($m, $index=null)
{
	if ($index!=null)
	{		
		if (isset($m[$index]))
		{
			if ($m[$index]!=='')
				return true;
			else
				return false;
		}
		else
			return false;
		
	} else
	{
		if (isset($m))
		{
			if ($m!='')
				return true;
			else
				return false;
		}
		else
			return false;
	}
}

function not_zero ($m, $index=null)
{
	if ($index!=null)
	{		
		if (isset($m[$index]))
		{
			if ($m[$index]!=0)
				return true;
			else
				return false;
		}
		else
			return false;
		
	} else
	{
		if (isset($m))
		{
			if ($m!=0)
				return true;
			else
				return false;
		}
		else
			return false;
	}
}

function notempty_index ($a, $index)
{
	if (isset($a[$index]))
	{
		if ($a[$index]!=='')
			return true;
		else
			return false;
	}
	else
		return false;
}

function delete_file ($filename)
{
	if(file_exists($filename))
	    return @unlink($filename);
	else
		return false;
}

function user_access ($type='player')
{
	global $c_member;
	
	// 1 - это я
	// 55357 - это Минский
	// 5256 - это Гринберг
	
	$rights = array (
		
		'player_ad' => array (1),
		'podcasts' => array (1, 55357,5256,74335),
		'donate' => array (1, 74335, 55357),
		'boxanime' => array (76065)
		
	);
	
	return in_array ($c_member, $rights[$type]);
		
}


function show_diff ($string1, $string2)
{
	
	$string1 = iconv('utf-8', 'windows-1251', $string1);
	$string2 = iconv('utf-8', 'windows-1251', $string2);
	
	$opcodes = FineDiff::getDiffOpcodes($string1, $string2, FineDiff::$wordGranularity);
	
	return iconv('windows-1251', 'utf-8', FineDiff::renderDiffToHTMLFromOpcodes($string1, $opcodes));

}


function hours_minutes ($timestamp)
{
	$edit_hours=0;
	$edit_minutes=floor($timestamp/60);
	if ($edit_minutes>60)
	{
		$edit_hours=floor($edit_minutes/60);
		$edit_minutes=$edit_minutes-$edit_hours*60;
	}

	return ($edit_hours>0?$edit_hours.' час'.ending($edit_hours,'','а','ов').' ':'').($edit_minutes>0?$edit_minutes.' минут'.ending($edit_minutes,'у','ы',''):'');

}

function pages ($page, $nr, $onpage=30, $max=7, $title='', $left='<', $right='>', $first='<<', $last='>>', $baseurl='', $pageurl='', $addon1='')
{

	// Для reviews это:
	// pages ($page, $nr, 30, 7, 'Страницы', '«', '»', '« Первая', 'Последняя »', '/reviews/'.$section, 'p_', '/award'
	$pages=(int)(($nr-1)/$onpage)+1;

	$middle=ceil($max/2);

	if ($nr>$onpage)
	{
		echo '<div class="pages" style="text-align:center;">'.($title!=''?'<span>'.$title.' ('.$pages.'):</span>':'');

		if ($page>=$middle+1 && $pages>$max)
		{
			echo '<a href="'.$baseurl.$pageurl.'1'.($addon1!=''?$addon1:'').'">'.$first.'</a><span>...</span>';
			$begin=$page-$middle+1;
		} else $begin=1;

		if ($page>1) echo '<a href="'.$baseurl.$pageurl.($page-1).($addon1!=''?$addon1:'').'">'.$left.'</a>';

		if ($page<=$pages-$middle && $pages>$max)
		    $end=$page+$middle-1;
		else $end=$pages;

		for ($i=$begin; $i<=$end; $i++)
			if ($i!=$page) echo ' <a href="'.$baseurl.$pageurl.$i.($addon1!=''?$addon1:'').'">'.$i.'</a>';
				else echo '<span>'.$i.'</span> ';

		if ($page<$pages) echo '<a href="'.$baseurl.$pageurl.($page+1).($addon1!=''?$addon1:'').'">'.$right.'</a>';

		if ($page<=$pages-$middle && $pages>$max)
			echo '<span>...</span><a href="'.$baseurl.$pageurl.$pages.($addon1!=''?$addon1:'').'">'.$last.'</a>';

		// echo ($page>0?'<a href="'.$baseurl.$pageurl.'0#comments">Все</a>':' Все ');

		echo '</div>';
	}
}


function page_base ($pageurl, $pagebase, $page)
{
	$pagebase=remove_head(remove_tail($pagebase,'/'),'/');
	// return $pageurl.($pagebase!='' && $page!=1 || mb_stristr($pageurl,'/comments/')?$pagebase:'').($page==1 && !mb_stristr($pageurl,'/comments/')?'':$page.'/');

	return $pageurl.($pagebase!='' && $page!=1?$pagebase:'').($page==1?'':$page.'/');
}

function pagination ($page, $nr, $onpage=30, $pageurl='/news/', $pagebase='', $addon='', $max=13)
{
	
	if (defined('ISMOBILE') && ISMOBILE)
		$max=7;
	
	$pages=(int)(($nr-1)/$onpage)+1;

	$middle=ceil($max/2+0.5);

	// $pageurl=remove_tail ($pageurl, '/');

	$txt='<div class="pagination clearfix nosel">';

	$txt.=($nr<=$onpage || $page==1?'<span>&larr;</span>':'<a href="'.page_base($pageurl, $pagebase,$page-1).$addon.'">&larr;</a>');

	if ($nr>$onpage)
	{
		// Если страниц меньше максимального количества
		if ($pages<=$max)
			for ($i=1; $i<=$max; $i++)
				if ($i<=$pages)
					$txt.='<a href="'.page_base($pageurl,$pagebase,$i).$addon.'"'.($i==$page?' class="active"':'').'>'.$i.'</a>';
				else
					$txt.='<span>&nbsp;</span>';
		else

		if ($page<=$max-3)
		{
			for ($i=1; $i<=$max-2; $i++)
				$txt.='<a href="'.page_base($pageurl,$pagebase,$i).$addon.'"'.($i==$page?' class="active"':'').'>'.$i.'</a>';
			$txt.='<span>&hellip;</span><a href="'.page_base($pageurl,$pagebase,$pages).$addon.'">'.$pages.'</a>';

		}

		else

		if ($page>=$pages-$max+4)
		{
			$txt.='<a href="'.page_base($pageurl,$pagebase,1).$addon.'">1</a><span>&hellip;</span>';

			for ($i=$pages-$max+3; $i<=$pages; $i++)
				$txt.='<a href="'.page_base($pageurl,$pagebase,$i).$addon.'"'.($i==$page?' class="active"':'').'>'.$i.'</a>';
		}

		else
		{
			$txt.='<a href="'.page_base($pageurl,$pagebase,1).$addon.'">1</a><span>&hellip;</span>';
			//+$max-5
			for ($i=$page-$middle+3; $i<=$page+$middle-3; $i++)
				$txt.='<a href="'.page_base($pageurl,$pagebase,$i).$addon.'"'.($i==$page?' class="active"':'').'>'.$i.'</a>';

			$txt.='<span>&hellip;</span><a href="'.page_base($pageurl,$pagebase,$pages).$addon.'">'.$pages.'</a>';

		}

	}

	$txt.=($nr<=$onpage || $page==$pages?'<span>&rarr;</span>':'<a href="'.page_base($pageurl,$pagebase,$page+1).$addon.'">&rarr;</a>');

	$txt.='</div>';

	$txt=str_replace('=/','=',$txt);
	return $txt;

}

function correctphone ($phone)
{
	$phone=preg_replace('/[^0-9]+/si','',$phone);
	if (mb_strlen($phone)==10) $phone='+7'.$phone;
	if (mb_strlen($phone)==11 && (mb_substr($phone,0,1)=='8' || mb_substr($phone,0,1)=='7')) $phone='+7'.mb_substr($phone,1);
	return $phone;
}

function nicephone ($phone)
{
	$nice='';
	$phone=correctphone($phone);
	if (mb_strlen($phone)>=7) $nice.=mb_substr($phone,-7,3).' '.mb_substr($phone,-4);
	if (mb_strlen($phone)>=10) $nice=mb_substr($phone,-10,3).' '.$nice;
	if (mb_strlen($phone)>=11) $nice=mb_substr($phone,0,-10).' '.$nice;
	return $nice;
}


function natural_list_to_array ($list)
// Переводит список цифр типа "1,2, 3-10" в массив
{
	$a=array ();
	//$head=preg_split('(\-|\,)',$list);
	$head=preg_split('(\,)',$list);
	foreach ($head as $h)
	{
		$li=preg_split('(\-)',$h);
		if (sizeof($li)>1)
		{
			if (mb_strpos($li[0],'x')!==FALSE)
			{
				$tempseason=mb_strstr($li[0],'x',TRUE);
				$tempa=mb_substr(mb_strstr($li[0],'x'),-1);
				if (mb_strpos($li[1],'x')!==FALSE)
					$tempb=mb_substr(mb_strstr($li[1],'x'),-1);
				else $tempb=$li[1];
				for ($i=(int)$tempa; $i<=(int)$tempb; $i++)
					$a[]=$tempseason.'x'.$i;

			} else {
				for ($i=(int)$li[0]; $i<=(int)$li[1]; $i++)
					$a[]=$i;
			}
		}
		else $a[]=(int)$h;
	}
	return $a;
}



function iscaps ($str)
{

	if (utf8_uppercase($str)==$str) return TRUE;
		else return FALSE;
}


// Закрывает теги, если не закрыты вдруг
function closehtmltags ($text, $tags=array ('<span>', '<div>', '<p>'))
{
/*
	foreach ($tags as $t)
	{
		$t=mb_trim($t,'<> ');
		$num_open=mb_substr_count(utf8_lowercase($text),utf8_lowercase('<'.$t));
		$num_close=mb_substr_count(utf8_lowercase($text),utf8_lowercase('</'.$t.'>'));
		if ($num_close>$num_open)
			$text=str_repeat('<'.$t.'>',$num_close-$num_open).$text;
		else
		if ($num_close<$num_open)
			$text.=str_repeat('</'.$t.'>',$num_open-$num_close);
	}
	*/
	return $text;
}


// Случайное число за исключением тех, что в массиве
function rand_except($min, $max, $excepting = array())
{
	if (sizeof($excepting)<$max-$min+1)
	{
    	$num = mt_rand($min, $max);
    	return in_array($num, $excepting) ? rand_except($min, $max, $excepting) : $num;
    } else return '';
}

// Ровно одна замена через str_replace

function str_replace_once ($search, $replace, $data) {
    $res = mb_strpos($data, $search);
    if($res === false) {
        return $data;
    } else {
        // There is data to be replaced
        $left_seg = mb_substr($data, 0, mb_strpos($data, $search));
        $right_seg = mb_substr($data, (mb_strpos($data, $search) + mb_strlen($search)));
        return $left_seg . $replace . $right_seg;
    }
}


// Есть ли строка в тексте?

function intext ($needle, $haystack, $case=FALSE)
{
	if ($case) // Если регистр без разницы (по умолчанию)
	{
		if (mb_strpos($haystack,$needle)!==FALSE) return TRUE;
			else return FALSE;
	} else // Если регистр важен
	{
		if (mb_strpos(utf8_lowercase($haystack),utf8_lowercase($needle))!==FALSE) return TRUE;
			else return FALSE;

	}
}


function fexists ($filename)
{
	if (str_begins ($filename, 'https://') || str_begins ($filename, 'http://'))
	{
		$file_headers = @get_headers($filename);
		
		if ($file_headers[0] == 'HTTP/1.0 404 Not Found'){
		      return false;
		} else if ($file_headers[0] == 'HTTP/1.0 302 Found' && $file_headers[7] == 'HTTP/1.0 404 Not Found'){
		    return false;
		} else {
		    return true;
		}
	} else
		return file_exists ($filename);
}


function upload_image_local ($webfile, $userfile, $thumbfile, $imagefile, $w, $h=0, $fit=FALSE, $transform=FALSE, $nearest_neighbor=FALSE)
{
	// Если $imagefile == '', то не нужно заливать на сервер $webfile или $userfile
	// Это годится для создания тамбнейлов уже залитых картинок
	
	// $imagefile - полный путь к картинке на нашем серваке, типа "img/20345_big.jpg"
	// $thumbfile - полный путь к миниатюре на нашем серваке, типа "img/20345.jpg"

	// $fit = TRUE, если нужно, чтобы совпадала одна сторона, а другая — вылезала
	// $move = left, right, top, bottom -> вырезаем с этого края, на случай, если криво обрезается
	
	if ($transform=='left' || $transform=='right' || $transform=='top' || $transform=='bottom')
	{
		$move=$transform;
		$transform=FALSE;
	} else
		$move=FALSE;
		
		//echo $webfile.'-'.$thumbfile.'<br>';

	$filter=($nearest_neighbor?Imagick::FILTER_POINT:Imagick::FILTER_LANCZOS);

	// echo ($nearest_neighbor?'near':'lanc');

	$working=TRUE;
	$fromgallery=FALSE;


	if ($userfile!='') {
        move_uploaded_file( $userfile["tmp_name"], $thumbfile);
        $thumb = new Imagick($thumbfile);

	} else
	if (fexists($webfile))
	{
		
		if (mb_substr($webfile,0,7)=='http://' || mb_substr($webfile,0,8)=='https://')
		{
			$wg=getimagesize($webfile);
			if ($wg[0]==0)
				$working=FALSE;
			else
				// @$res=copy($webfile,$thumbfile);
				$thumb = new Imagick($webfile);

		} else
		{
			// @$res=copy($webfile, $thumbfile);
			$thumb = new Imagick($webfile);
		}
	} else
		$working=false;

	if ($working)
	{
		if (file_exists($thumbfile))
			chmod ($thumbfile,0777);
			
		
		// $thumb = new Imagick($thumbfile);

		if ($transform)
		{
			if ($transform['rotate']!=0)
				$thumb->rotateImage(new ImagickPixel('#ffffff'), $transform['rotate']);
			
			$thumb = $thumb->coalesceImages();
			$thumb->cropImage($transform['width'], $transform['height'], $transform['x'], $transform['y']);
		}

		if (substr($w,0,1)=='h') {$h=substr($w,1); $w=0; }
			else if (substr($w,0,1)=='w') { $w=substr($w,1); $h=0; }

		
		if ($thumb->getImageWidth()!=$w || $thumb->getImageHeight()!=$h || $thumb->getImageFormat()!='JPEG'  || stristr($thumbfile, '.webp') || $transform)
		{
			
			if (stristr($thumbfile, '.webp'))
			{
				// $thumb->setImageFormat('webp');
				// $thumb->setOption('webp:method', '7');
			
				
			} else
			{
				$thumb->setImageCompression(imagick::COMPRESSION_JPEG);
				$thumb->setImageCompressionQuality(JPEG_QUALITY);
			}
			
			if ($w!=0 && $h!=0 && !$fit)
			{
				// Меняем размер пропорционально, но по БОЛЬШЕЙ стороне.
				// Было 1200x500, заданы 200x100 - уменьшится до 200x83 и всё.
				
				$thumb->resizeImage($w, $h, $filter, 1, false);						

			}
			else
			if ($w!=0 && $h!=0 && $fit)
			{

				// Меняем размер пропорционально, но по МЕНЬШЕЙ стороне. А потом обрезаем, чтобы совпадало с $w и $h. 
				// Было 1200x500, а надо сделать 200x100 - сначала уменьшится до 240x100, потом обрежется до 200x100
				$prop_original=$thumb->getImageWidth()/$thumb->getImageHeight();
				$prop_new=$w/$h;
				

				if ($prop_original>$prop_new)
				{

					$thumb->resizeImage(0, $h, $filter,1);

					$thumb->setImagePage(0, 0, 0, 0);
					
					$x=($move=='left'?0:($move=='right'?$thumb->getImageWidth()-$w:($thumb->getImageWidth()-$w)/2));
					
					$thumb->cropImage($w, $h, $x, 0);
					
					
				} else
				{

					$thumb->resizeImage($w, 0, $filter,1);
					$y=($thumb->getImageHeight()-$h)/2;
					
					$thumb->setImagePage(0, 0, 0, 0);

					$thumb->cropImage($w, $h, 0, $y);

				}

			}
			else {
				// Меняем размер пропорционально, но по МЕНЬШЕЙ стороне. И не обрезаем потом. 
				// Было 1200x500, а размеры заданы 200x100 - уменьшится до 240x100 и всё.

				$thumb->resizeImage($w, $h, $filter,1,FALSE);
			}
			
			

			if (stristr($thumbfile, '.webp'))
			{
				$thumb->setImageFormat('webp');
				$thumb->setImageCompressionQuality(90);
				$thumb->setOption('webp:method', '6');
				$thumb->writeImage('webp:'.$thumbfile);
				// echo 1;
				
				
			} else
			{
				
				$thumb->stripImage();
				$thumb->writeImage($thumbfile);
			}

			//echo $thumbfile.'<br>';

			if ($imagefile!='')
			{
				if ($userfile!='') @$res=copy($userfile,$imagefile);
							  else @$res=copy($webfile,$imagefile);
							  
				if (file_exists($imagefile))
					chmod ($imagefile,0777);
				if (file_exists($thumbfile))
					chmod ($thumbfile,0777);
					
			}
		}

	}

}


function mb_trim ($string, $charlist='\\\\s', $ltrim=true, $rtrim=true)
{
    $both_ends = $ltrim && $rtrim;

    $char_class_inner = preg_replace(
        array( '/[\^\-\]\\\]/S', '/\\\{4}/S' ),
        array( '\\\\\\0', '\\' ),
        $charlist
    );

    $work_horse = '[' . $char_class_inner . ']+';
    $ltrim && $left_pattern = '^' . $work_horse;
    $rtrim && $right_pattern = $work_horse . '$';

    if($both_ends)
    {
        $pattern_middle = $left_pattern . '|' . $right_pattern;
    }
    elseif($ltrim)
    {
        $pattern_middle = $left_pattern;
    }
    else
    {
        $pattern_middle = $right_pattern;
    }

    return preg_replace("/$pattern_middle/usSD", '', $string);
}

function ajax_inlink ($id, $url, $text, $functionsbefore='', $functionsafter='', $timeout=0)
{
	return ajax_link ($id, $url.' #'.$id, $text, $functionsbefore, $functionsafter, $timeout);
}

function ajax_link ($id, $url, $text, $functionsbefore='', $functionsafter='', $timeout=0)
{
	return '<span class="dotted blue" onClick="'.($functionsbefore!=''?$functionsbefore.' ':'').'$(\'#'.$id.'\').load(\''.$url.'\');'.($timeout!=0?' setTimeout('.$functionsafter.', '.$timeout.');':($functionsafter!=''?' '.$functionsafter:'')).'">'.$text.'</span>';

}

function textarea ($text, $id, $value='', $width='300', $height='20', $class='', $selectonclick=false)
{
	field ($text, $id, $value, 'textarea', '', '', (mb_substr($width,-1)!='%' && $width!=''?$width.'px':''), (mb_substr($height,-1)!='%' && $height!=''?$height.'px':''), '', $selectonclick);
}

function shortfield ($text, $id, $value='')
{
	field ($text, $id, $value, 'text', '', '', '100px;', '50px;');
}

function field ($text, $id, $value='', $type='text', $subheaders='', $subvalues='', $width='300px;', $height='50px;', $class='', $selectonclick=false)
{
		// $subheaders - для radio и checkbox, подзаголовки
		// $subvalues - для radio, чтобы знать, что делать checked

		echo ($text!='' && mb_substr($text,0,6)!='<nobr>'?'<br>'.$text:mb_substr($text,6)).(mb_substr($text,0,6)=='<nobr>'?'':'<br>').
		($type=='textarea'?'<textarea '.($selectonclick?'onClick="this.setSelectionRange(0, this.value.length)" ':'').'name="'.$id.'" id="'.$id.'" style="'.(mb_substr($text,0,6)!='<nobr>'?'margin-left: 20px; ':'').'width: '.$width.'; height: '.$height.';"'.($class!=''?' class="'.$class.'"':'').'>':'').
		($type!='textarea' && $type!='radio' && $type!='checkbox' && $type!='select'?'<input '.($selectonclick?'onClick="this.setSelectionRange(0, this.value.length)" ':'').'type="'.$type.'" value="'.$value.'" name="'.$id.'" id="'.$id.'" style="'.(mb_substr($text,0,6)!='<nobr>'?'margin-left: 20px; ':'').'width: '.$width.'"'.($class!=''?' class="'.$class.'"':'').'>':'').
		($type=='textarea'?$value.'</textarea>':'');
		$i=0;
		if ($type=='radio' || $type=='checkbox')
			foreach ($subvalues as $key=>$val)
				{
					echo '<nobr><input type="'.$type.'" name="'.$id.
					($type=='checkbox'?'['.$i.']':'').'" id="'.
					$id.($type=='radio'?$val:'').
					($type=='checkbox'?'['.$i.']':'').
					'" value="'.$val.
					'" style="margin-left: 20px;"'.
					($val==$value && $type=='radio'?' checked':'').
					(not_empty($value, $key) && $val==$value[$key] && $type=='checkbox'?' checked':'').
					'> <label for="'.
					$id.($type=='radio'?$val:'').
					($type=='checkbox'?'['.$i.']':'').
					'"> '.(isset($subheaders[$key])?$subheaders[$key]:'').'</label></nobr> ';
				$i++;
				}
}

function button ($text, $id, $class='button', $icon='', $onclick='', $tabindex='')
{
	echo '<button class="'.$class.'" style="margin-right: 10px;" name="'.$id.'" id="'.$id.'" value="'.$id.'" '.($onclick!=''?'onclick="'.$onclick.'" ':'').'type="submit"'.($tabindex!=''?' tabindex="'.$tabindex.'"':'').'>'.($icon!=''?'<span class="'.$icon.' icon"></span>':'').$text.'</button>';

}


function str_split_unicode($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

function mb_ord_old($string)
{
    if (extension_loaded('mbstring') === true)
    {
    	mb_language('Neutral');
    	mb_internal_encoding('UTF-8');
    	mb_detect_order(array('UTF-8', 'ISO-8859-15', 'ISO-8859-1', 'ASCII'));

    	$result = unpack('N', mb_convert_encoding($string, 'UCS-4BE', 'UTF-8'));

    	if (is_array($result) === true)
    	{
    		return $result[1];
    	}
    }

    return ord($string);
}


function br ($num=1)
{
	for ($i=1; $i<=$num; $i++)
		echo '<br />';
}


function str_trim ($text,$str=' ')
{
	while (mb_substr($text,0,mb_strlen($str))==$str)
		$text=mb_substr($text,mb_strlen($str));

	while (mb_substr($text,-mb_strlen($str))==$str)
		$text=mb_substr($text,0,-mb_strlen($str));

	return $text;

}

function is_tags ($str, $tags)
{
	$str=' '.mb_trim($str).' ';
	$tags=' '.mb_trim($tags).' ';
	if (mb_strpos($str, $tags)!==FALSE) return TRUE;
	else return FALSE;
}

function insert_tags ($tags_old, $tags_new, $tc=' ')
{
	$tags_old=$tc.str_trim($tags_old,$tc).$tc;
	$tags_new_array=mb_split ($tc,str_trim($tags_new,$tc));

	$tags_to_add='';

	foreach ($tags_new_array as $tna)
		if (mb_strpos($tags_old,$tc.$tna.$tc)===FALSE) $tags_to_add.=$tna.$tc;

	if (str_trim($tags_to_add,$tc)!='')
		$tags_old.=str_trim($tags_to_add,$tc).$tc;

	$ret=str_trim($tags_old,$tc);
	if ($ret!='') return $tc.$ret.$tc;
	else return $ret;
}

function delete_tags ($tags_old, $tags_new, $tc=' ')
{
	$tags_old=$tc.str_trim($tags_old,$tc).$tc;
	$tags_new_array=mb_split ($tc,str_trim($tags_new,$tc));

	foreach ($tags_new_array as $tna)
		$tags_old=$tc.str_trim(str_replace($tc.$tna.$tc, $tc ,$tags_old),$tc).$tc;

	$ret=str_trim($tags_old,$tc);
	if ($ret!='') return $tc.$ret.$tc;
	else return $ret;
}


function utf8_ord($char) # = utf8_to_unicode()
{
    static $cache = array();
    if (array_key_exists($char, $cache)) return $cache[$char]; #speed improve

    switch (strlen($char))
    {
        case 1 : return $cache[$char] = ord($char);
        case 2 : return $cache[$char] = (ord($char{1}) & 63) |
                                        ((ord($char{0}) & 31) << 6);
        case 3 : return $cache[$char] = (ord($char{2}) & 63) |
                                        ((ord($char{1}) & 63) << 6) |
                                        ((ord($char{0}) & 15) << 12);
        case 4 : return $cache[$char] = (ord($char{3}) & 63) |
                                        ((ord($char{2}) & 63) << 6) |
                                        ((ord($char{1}) & 63) << 12) |
                                        ((ord($char{0}) & 7)  << 18);
        default :
            trigger_error('Character is not UTF-8!', E_USER_WARNING);
            return false;
    }#switch
}

function utf8_chr($cp) # = utf8_from_unicode()
{
    static $cache = array();
    $cp = intval($cp);
    if (array_key_exists($cp, $cache)) return $cache[$cp]; #speed improve

    if ($cp <= 0x7f)     return $cache[$cp] = chr($cp);
    if ($cp <= 0x7ff)    return $cache[$cp] = chr(0xc0 | ($cp >> 6))  .
                                              chr(0x80 | ($cp & 0x3f));
    if ($cp <= 0xffff)   return $cache[$cp] = chr(0xe0 | ($cp >> 12)) .
                                              chr(0x80 | (($cp >> 6) & 0x3f)) .
                                              chr(0x80 | ($cp & 0x3f));
    if ($cp <= 0x10ffff) return $cache[$cp] = chr(0xf0 | ($cp >> 18)) .
                                              chr(0x80 | (($cp >> 12) & 0x3f)) .
                                              chr(0x80 | (($cp >> 6) & 0x3f)) .
                                              chr(0x80 | ($cp & 0x3f));
    #U+FFFD REPLACEMENT CHARACTER
    return $cache[$cp] = "\xEF\xBF\xBD";
}

function utf16win ($strin)  {
$strin = preg_replace("/%u0430/si","а",$strin);
$strin = preg_replace("/%u0431/si","б",$strin);
$strin = preg_replace("/%u0432/si","в",$strin);
$strin = preg_replace("/%u0433/si","г",$strin);
$strin = preg_replace("/%u0434/si","д",$strin);
$strin = preg_replace("/%u0435/si","е",$strin);
$strin = preg_replace("/%u0451/si","ё",$strin);
$strin = preg_replace("/%u0436/si","ж",$strin);
$strin = preg_replace("/%u0437/si","з",$strin);
$strin = preg_replace("/%u0438/si","и",$strin);
$strin = preg_replace("/%u0439/si","й",$strin);
$strin = preg_replace("/%u043A/si","к",$strin);
$strin = preg_replace("/%u043B/si","л",$strin);
$strin = preg_replace("/%u043C/si","м",$strin);
$strin = preg_replace("/%u043D/si","н",$strin);
$strin = preg_replace("/%u043E/si","о",$strin);
$strin = preg_replace("/%u043F/si","п",$strin);
$strin = preg_replace("/%u0440/si","р",$strin);
$strin = preg_replace("/%u0441/si","с",$strin);
$strin = preg_replace("/%u0442/si","т",$strin);
$strin = preg_replace("/%u0443/si","у",$strin);
$strin = preg_replace("/%u0444/si","ф",$strin);
$strin = preg_replace("/%u0445/si","х",$strin);
$strin = preg_replace("/%u0446/si","ц",$strin);
$strin = preg_replace("/%u0448/si","ш",$strin);
$strin = preg_replace("/%u0449/si","щ",$strin);
$strin = preg_replace("/%u044A/si","ъ",$strin);
$strin = preg_replace("/%u044C/si","ь",$strin);
$strin = preg_replace("/%u044D/si","э",$strin);
$strin = preg_replace("/%u044E/si","ю",$strin);
$strin = preg_replace("/%u044F/si","я",$strin);
$strin = preg_replace("/%u0447/si","ч",$strin);
$strin = preg_replace("/%u044B/si","ы",$strin);
$strin = preg_replace("/%u0410/si","А",$strin);
$strin = preg_replace("/%u0411/si","Б",$strin);
$strin = preg_replace("/%u0412/si","В",$strin);
$strin = preg_replace("/%u0413/si","Г",$strin);
$strin = preg_replace("/%u0414/si","Д",$strin);
$strin = preg_replace("/%u0415/si","Е",$strin);
$strin = preg_replace("/%u0416/si","Ж",$strin);
$strin = preg_replace("/%u0417/si","З",$strin);
$strin = preg_replace("/%u0418/si","И",$strin);
$strin = preg_replace("/%u0419/si","Й",$strin);
$strin = preg_replace("/%u041A/si","К",$strin);
$strin = preg_replace("/%u041B/si","Л",$strin);
$strin = preg_replace("/%u041C/si","М",$strin);
$strin = preg_replace("/%u041D/si","Н",$strin);
$strin = preg_replace("/%u041E/si","О",$strin);
$strin = preg_replace("/%u041F/si","П",$strin);
$strin = preg_replace("/%u0420/si","Р",$strin);
$strin = preg_replace("/%u0421/si","С",$strin);
$strin = preg_replace("/%u0422/si","Т",$strin);
$strin = preg_replace("/%u0423/si","У",$strin);
$strin = preg_replace("/%u0424/si","Ф",$strin);
$strin = preg_replace("/%u0425/si","Х",$strin);
$strin = preg_replace("/%u0426/si","Ц",$strin);
$strin = preg_replace("/%u0428/si","Ш",$strin);
$strin = preg_replace("/%u0429/si","Щ",$strin);
$strin = preg_replace("/%u042A/si","Ъ",$strin);
$strin = preg_replace("/%u042C/si","Ь",$strin);
$strin = preg_replace("/%u042D/si","Э",$strin);
$strin = preg_replace("/%u042E/si","Ю",$strin);
$strin = preg_replace("/%u042F/si","Я",$strin);
$strin = preg_replace("/%u0427/si","Ч",$strin);
$strin = preg_replace("/%u042B/si","Ы",$strin);
$strin = preg_replace("/%u041/si","Ё",$strin);
return $strin;
}

function lastof ($array)
{
	return $array[sizeof($array)-1];
}


function getfile ($url,$headers=false) {
    $url = parse_url($url);

    if (!isset($url['port'])) {
      if ($url['scheme'] == 'http') { $url['port']=80; }
      elseif ($url['scheme'] == 'https') { $url['port']=443; }
    }
    $url['query']=isset($url['query'])?$url['query']:'';

    $url['protocol']=$url['scheme'].'://';
    $eol="\r\n";

    $headers =  "POST ".$url['protocol'].$url['host'].$url['path']." HTTP/1.0".$eol.
                "Host: ".$url['host'].$eol.
                "Referer: ".$url['protocol'].$url['host'].$url['path'].$eol.
                "Content-Type: application/x-www-form-urlencoded".$eol.
                "Content-Length: ".strlen($url['query']).$eol.
                $eol.$url['query'];



    $fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30);
    if($fp) {
      fputs($fp, $headers);
      $result = '';
      while(!feof($fp)) { $result .= fgets($fp, 128); }
      fclose($fp);
      if (!$headers) {
        //removes headers
        $pattern="/^.*\r\n\r\n/s";
        $result=preg_replace($pattern,'',$result);
      }
      return $result;
    }
}


function utf8_convert_case($s, $mode)
{

    #таблица конвертации регистра
    static $trans = array(
        #en (английский латиница)
        #CASE_UPPER => case_lower
        "\x41" => "\x61", #A a
        "\x42" => "\x62", #B b
        "\x43" => "\x63", #C c
        "\x44" => "\x64", #D d
        "\x45" => "\x65", #E e
        "\x46" => "\x66", #F f
        "\x47" => "\x67", #G g
        "\x48" => "\x68", #H h
        "\x49" => "\x69", #I i
        "\x4a" => "\x6a", #J j
        "\x4b" => "\x6b", #K k
        "\x4c" => "\x6c", #L l
        "\x4d" => "\x6d", #M m
        "\x4e" => "\x6e", #N n
        "\x4f" => "\x6f", #O o
        "\x50" => "\x70", #P p
        "\x51" => "\x71", #Q q
        "\x52" => "\x72", #R r
        "\x53" => "\x73", #S s
        "\x54" => "\x74", #T t
        "\x55" => "\x75", #U u
        "\x56" => "\x76", #V v
        "\x57" => "\x77", #W w
        "\x58" => "\x78", #X x
        "\x59" => "\x79", #Y y
        "\x5a" => "\x7a", #Z z

        #ru (русский кириллица)
        #CASE_UPPER => case_lower
        "\xd0\x81" => "\xd1\x91", #Ё ё
        "\xd0\x90" => "\xd0\xb0", #А а
        "\xd0\x91" => "\xd0\xb1", #Б б
        "\xd0\x92" => "\xd0\xb2", #В в
        "\xd0\x93" => "\xd0\xb3", #Г г
        "\xd0\x94" => "\xd0\xb4", #Д д
        "\xd0\x95" => "\xd0\xb5", #Е е
        "\xd0\x96" => "\xd0\xb6", #Ж ж
        "\xd0\x97" => "\xd0\xb7", #З з
        "\xd0\x98" => "\xd0\xb8", #И и
        "\xd0\x99" => "\xd0\xb9", #Й й
        "\xd0\x9a" => "\xd0\xba", #К к
        "\xd0\x9b" => "\xd0\xbb", #Л л
        "\xd0\x9c" => "\xd0\xbc", #М м
        "\xd0\x9d" => "\xd0\xbd", #Н н
        "\xd0\x9e" => "\xd0\xbe", #О о
        "\xd0\x9f" => "\xd0\xbf", #П п

        #CASE_UPPER => case_lower
        "\xd0\xa0" => "\xd1\x80", #Р р
        "\xd0\xa1" => "\xd1\x81", #С с
        "\xd0\xa2" => "\xd1\x82", #Т т
        "\xd0\xa3" => "\xd1\x83", #У у
        "\xd0\xa4" => "\xd1\x84", #Ф ф
        "\xd0\xa5" => "\xd1\x85", #Х х
        "\xd0\xa6" => "\xd1\x86", #Ц ц
        "\xd0\xa7" => "\xd1\x87", #Ч ч
        "\xd0\xa8" => "\xd1\x88", #Ш ш
        "\xd0\xa9" => "\xd1\x89", #Щ щ
        "\xd0\xaa" => "\xd1\x8a", #Ъ ъ
        "\xd0\xab" => "\xd1\x8b", #Ы ы
        "\xd0\xac" => "\xd1\x8c", #Ь ь
        "\xd0\xad" => "\xd1\x8d", #Э э
        "\xd0\xae" => "\xd1\x8e", #Ю ю
        "\xd0\xaf" => "\xd1\x8f", #Я я

        #tt (татарский, башкирский кириллица)
        #CASE_UPPER => case_lower
        "\xd2\x96" => "\xd2\x97", #Ж ж с хвостиком    &#1174; => &#1175;
        "\xd2\xa2" => "\xd2\xa3", #Н н с хвостиком    &#1186; => &#1187;
        "\xd2\xae" => "\xd2\xaf", #Y y                &#1198; => &#1199;
        "\xd2\xba" => "\xd2\xbb", #h h мягкое         &#1210; => &#1211;
        "\xd3\x98" => "\xd3\x99", #Э э                &#1240; => &#1241;
    "\xd3\xa8" => "\xd3\xa9", #О o перечеркнутое  &#1256; => &#1257;

        #uk (украинский кириллица)
        #CASE_UPPER => case_lower
        "\xd2\x90" => "\xd2\x91",  #г с хвостиком
        "\xd0\x84" => "\xd1\x94",  #э зеркальное отражение
        "\xd0\x86" => "\xd1\x96",  #и с одной точкой
        "\xd0\x87" => "\xd1\x97",  #и с двумя точками

        #be (белорусский кириллица)
        #CASE_UPPER => case_lower
        "\xd0\x8e" => "\xd1\x9e",  #у с подковой над буквой

        #tr,de,es (турецкий, немецкий, испанский, французский латиница)
        #CASE_UPPER => case_lower
        "\xc3\x84" => "\xc3\xa4", #a умляут          &#196; => &#228;  (турецкий)
        "\xc3\x87" => "\xc3\xa7", #c с хвостиком     &#199; => &#231;  (турецкий, французский)
        "\xc3\x91" => "\xc3\xb1", #n с тильдой       &#209; => &#241;  (турецкий, испанский)
        "\xc3\x96" => "\xc3\xb6", #o умляут          &#214; => &#246;  (турецкий)
        "\xc3\x9c" => "\xc3\xbc", #u умляут          &#220; => &#252;  (турецкий, французский)
        "\xc4\x9e" => "\xc4\x9f", #g умляут          &#286; => &#287;  (турецкий)
        "\xc4\xb0" => "\xc4\xb1", #i c точкой и без  &#304; => &#305;  (турецкий)
        "\xc5\x9e" => "\xc5\x9f", #s с хвостиком     &#350; => &#351;  (турецкий)

        #hr (хорватский латиница)
        #CASE_UPPER => case_lower
        "\xc4\x8c" => "\xc4\x8d",  #c с подковой над буквой
        "\xc4\x86" => "\xc4\x87",  #c с ударением
        "\xc4\x90" => "\xc4\x91",  #d перечеркнутое
        "\xc5\xa0" => "\xc5\xa1",  #s с подковой над буквой
        "\xc5\xbd" => "\xc5\xbe",  #z с подковой над буквой

        #fr (французский латиница)
        #CASE_UPPER => case_lower
        "\xc3\x80" => "\xc3\xa0",  #a с ударением в др. сторону
        "\xc3\x82" => "\xc3\xa2",  #a с крышкой
        "\xc3\x86" => "\xc3\xa6",  #ae совмещенное
        "\xc3\x88" => "\xc3\xa8",  #e с ударением в др. сторону
        "\xc3\x89" => "\xc3\xa9",  #e с ударением
        "\xc3\x8a" => "\xc3\xaa",  #e с крышкой
        "\xc3\x8b" => "\xc3\xab",  #ё
        "\xc3\x8e" => "\xc3\xae",  #i с крышкой
        "\xc3\x8f" => "\xc3\xaf",  #i умляут
        "\xc3\x94" => "\xc3\xb4",  #o с крышкой
        "\xc5\x92" => "\xc5\x93",  #ce совмещенное
        "\xc3\x99" => "\xc3\xb9",  #u с ударением в др. сторону
        "\xc3\x9b" => "\xc3\xbb",  #u с крышкой
        "\xc5\xb8" => "\xc3\xbf",  #y умляут

        #xx (другой язык)
        #CASE_UPPER => case_lower
        #"" => "",  #

    );
    #d($trans);

    if ($mode == CASE_UPPER)
    {
        if (function_exists('mb_strtoupper'))   return mb_strtoupper($s, 'utf-8');
        if (preg_match('/^[\x00-\x7e]*$/', $s)) return strtoupper($s); #может, так быстрее?
        return strtr($s, array_flip($trans));
    }
    elseif ($mode == CASE_LOWER)
    {
        if (function_exists('mb_strtolower'))   return mb_strtolower($s, 'utf-8');
        if (preg_match('/^[\x00-\x7e]*$/', $s)) return strtolower($s); #может, так быстрее?
        return strtr($s, $trans);
    }
    else
    {
        trigger_error('Parameter 2 should be a constant of CASE_LOWER or CASE_UPPER!', E_USER_WARNING);
        return $s;
    }
    return $s;
}

function utf8_lowercase($s)
{
    return utf8_convert_case($s, CASE_LOWER);
}

function utf8_uppercase($s)
{
    return utf8_convert_case($s, CASE_UPPER);
}

function utf8_ucfirst($s, $is_other_to_lowercase = true)
{
    if ($s === '' or ! is_string($s)) return $s;
    if (preg_match('/^(.)(.*)$/us', $s, $m) === false) return false;
    return utf8_uppercase($m[1]) . ($is_other_to_lowercase ? utf8_lowercase($m[2]) : $m[2]);
}

function utf8_lcfirst($s)
{
    if ($s === '' or ! is_string($s)) return $s;
    if (preg_match('/^(.)(.*)$/us', $s, $m) === false) return false;
    return utf8_lowercase($m[1]) . $m[2];
}

function utf8_title ($s)
{
	$ss=explode(' ',trim($s));
	$r='';
	foreach ($ss as $k=>$s)
	{
		$r.=(($s=='and' || $s=='or' || $s=='nor' || $s=='a' || $s=='the' || $s=='an' || $s=='to') && $k!=0 && $k!=sizeof($ss)-1?utf8_lowercase($s):utf8_ucfirst($s)).' ';
	}

	return trim($r);
}

function toupper ($str, $n=-1)
{
	if ($n==-1) return utf8_convert_case($str, CASE_UPPER);
	else if ($n==0) return utf8_ucfirst($str);
	else 
	{
		$str[$n] = strtr($str[$n], 'абвгдеёжзийклмнорпстуфхцчшщъьыэюяabcdefghijklmnopqrstuvw', 'АБВГДЕЁЖЗИЙКЛМНОРПСТУФХЦЧШЩЪЬЫЭЮЯABCDEFGHIJKLMNOPQRSTUVW');
		return $str;
	}
}

function tolower ($str, $n=-1)
{
	if ($n==-1) return utf8_convert_case($str, CASE_LOWER);
	else if ($n==0) return utf8_lcfirst($str);
	else 
	{
		$str[$n] = strtr($str[$n], 'АБВГДЕЁЖЗИЙКЛМНОРПСТУФХЦЧШЩЪЬЫЭЮЯABCDEFGHIJKLMNOPQRSTUVW', 'абвгдеёжзийклмнорпстуфхцчшщъьыэюяabcdefghijklmnopqrstuvw');
		return $str;
	}
}

function spam ($text, $name='', $news_id=0)
{
	$spam=array
	(
		'\.[0-9a-z]{6}\.cn\/',
		'Buenas dias - <a href',
		'angelfire.com',
		'http://www.volny.cz',
		'http://all-about-massage',
		'http://adullt.freewebspace.net.au',
		'anyboard.net',
		'http://www.wii-uk.net',
		'This site about beautiful model',
		'mbesdura.info',
		'stoog.cn',
		'blogginnetwork.com',
		'DRT710SA',
		'http://nahalka.ru',
		'Hello i wish you healthy !!!!',
		'Voluptuous Vixens',
		'Ottenerlo',
		'\[\/url\]',
		'free-porn.blogspot.com',
		'http://carisoprodol',
		'http://www.desiurl.com',
		'ringo.blogspot.com',
		'http://rex1.org',
		'Hi! Very nice site! Thanks you very much!',
		'Interesting info about pheromones used to attract opposite sex',
		'.wapdr.info',
		'http://www.geocities.com/kimdegrella',
		'.awosv.info',
		'http://spdimon.info',
		'http://myurl.com.tw',
		'http://[0-9]{1-2}.[a-z]{10-20}.info',
		'hostingtree.org',
		'Рассылки по форумам',
		'freesite.blogspot.com',
		'http://www.ab-concept.at',
		'http://gourl.org',
		'metal-cd.ru',
		'http://phentermin',
		'http://ggoxgmwx.com',
		'viagra',
		'www.greatourdating.com',
		'www.apartments.waw.pl',
		'Interesting information you have',
		'Your site blog is interesting and has good info',
		'www.bignews.com',
		'wow gold',
		'cheap soma',
		'www.bestrxpills.com',
		'www.viagra4u.info',
		'\.blog\.free\.fr',
		'\.de\.tl',
		'The text was good, but i stil cant find the play ipdates');
	$sp=FALSE;
	for ($i=0;$i<sizeof($spam);$i++) if (preg_match ('/'.$spam[$i].'/siU',$text)) $sp=TRUE;
	if (preg_match ("/([0-9a-f]{32})/siU", substr($text,0,32))) $sp=TRUE;

	// preg_match ('/[0-9]{3,}/i',$text) &&

	if (
		(
			preg_match ('/(mommyfucktube|sexandsubmission|spankwire|bangbus|videosbang|wowsextube|tubecharm|pussy|sexy couple|masturbation|videosexe|bestporn|nudity|nymphets|cunt|ebony|anal|masturbating|boobs|sexvideo|blackass|bestiality|pedosex|preteen|girlsex|erotic|preteen|preteens|assfuck|cumfox|dwarfstube|adultvideodump|hornymatches|nude|raping|topless|lolita|Porn|Orgy|pedo|loli|naked|Blowjob|Incest|Hentai)/i',$text) && preg_match ('/^[A-Z]{1}[a-z]+$/',$name)
		)
		||
		(
			!preg_match ('/[а-яА-Я]+/i',$text) && preg_match ('/^[A-Z]{1}[a-z]+$/',$name) && $news_id==34749
		)

	) $sp=TRUE;

	return $sp;

}




function smart_date ($timestamp, $short=FALSE)
{
	$date='';
 	if (date("d.m.y")==date('d.m.y',$timestamp)) $date='Сегодня'; else
 		if (datechange(date("d.m.y"),-1)==date('d.m.y',$timestamp)) $date='Вчера'; else
 	 			if ($short) $date=date('d.m.y',$timestamp);
 					else $date=dat(date('d.m.y',$timestamp),1);
	 if (date("y")!=date("y",$timestamp) && !$short) $date.=' 20'.date('y',$timestamp).' года';
	 return $date;

}


function cyr_utf8 ($str)
{
	//return mb_convert_encoding($str, "UTF-8","UTF-8");
	return ($str);
	//return utf8_encode($str);
}

function xml_replace ($d)
{
	$d=str_replace ("<strong>", "<b>", $d);
	$d=str_replace ("</strong>", "</b>", $d);
	$d=str_replace ("<italic>", "<i>", $d);
	$d=str_replace ("</italic>", "</i>", $d);
	$d=preg_replace ("/<a([ ]+)>/siU", "<b>", $d);
	$d=str_replace ("</a>", "</b>", $d);

	$s1=array('&amp;','<br>', '<BR>','<B>','</B>','<I>','</I>','<U>','</U>','</P>','<P>','&quot;','&laquo;','&raquo;','&#151;','&minus;','&#8722;','&#8212;','&nbsp;','&#132;','&#147;','&#133;','&#146;');
	$s2=array('&','<br />', '<br />','<b>','</b>','<i>','</i>','<u>','</u>','</p>','<p>',"'","'","'",'-','-','-','-',' ',"'","'",'...',"'");
	$d=str_replace ($s1,$s2, $d);

	//$d=str_replace('&','&amp;',$d);
	$d=str_replace('"',"&quot;",$d);
	$d=str_replace('$','$$',$d);
	$d=str_replace ("</p>", "<br /><br />", $d);
	//$d=str_replace($s1,$s2,$d);

	$tags='<br>';
	$d=strip_tags($d,$tags);

	//$s1=array('>','<');
	//$s2=array('&gt;','&lt;');
	//$d=str_replace ($s1,$s2, $d);

	return ($d);
}



function imagelimit ($width,$height,$wlimit,$hlimit)
{
if ($width>$wlimit && $wlimit!=0) $wdiv=$width/$wlimit; else $wdiv=1;
if ($height>$hlimit && $hlimit!=0) $hdiv=$height/$hlimit; else $hdiv=1;
$div=max($wdiv,$hdiv);
$newwidth = round($width/$div);
$newheight = round($height/$div);
return array($newwidth,$newheight);
//header('Content-type: image/jpeg');
//$thumb = imagecreatetruecolor($newwidth, $newheight);
//$source = imagecreatefromjpeg($img);
//imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//return imagejpeg($thumb);
}


    function fsize($url) {
	    
	    if (mb_stristr($url, 'youtube.com') || mb_stristr($url, 'youtu.be'))
	    {
		    return 0;
	    } else
	    {
	        $sch = parse_url($url, PHP_URL_SCHEME);
	        if (($sch != "http") && ($sch != "https") && ($sch != "ftp") && ($sch != "ftps")) {
	            return 0;
	        }
	        if (($sch == "http") || ($sch == "https")) {
	            $headers = get_headers($url, 1);
	            if ((!array_key_exists("Content-Length", $headers))) { return 0; }
	            $head=$headers["Content-Length"];
	            if (is_array($head)) return $head[1];
	            else return $head;
	        }
	        if (($sch == "ftp") || ($sch == "ftps")) {
	            $server = parse_url($url, PHP_URL_HOST);
	            $port = parse_url($url, PHP_URL_PORT);
	            $path = parse_url($url, PHP_URL_PATH);
	            $user = parse_url($url, PHP_URL_USER);
	            $pass = parse_url($url, PHP_URL_PASS);
	            if ((!$server) || (!$path)) { return 0; }
	            if (!$port) { $port = 21; }
	            if (!$user) { $user = "anonymous"; }
	            if (!$pass) { $pass = "phpos@"; }
	            switch ($sch) {
	                case "ftp":
	                    $ftpid = ftp_connect($server, $port);
	                    break;
	                case "ftps":
	                    $ftpid = ftp_ssl_connect($server, $port);
	                    break;
	            }
	            if (!$ftpid) { return 0; }
	            $login = ftp_login($ftpid, $user, $pass);
	            if (!$login) { return 0; }
	            $ftpsize = ftp_size($ftpid, $path);
	            ftp_close($ftpid);
	            if ($ftpsize == -1) { return 0; }
	            return $ftpsize;
	        }
        }
    }


function fsize_old($url) {

$pos=TRUE;

if ($url!='')
{
	if (substr($url,0,7)=='http://')
	{
		while (!($pos===FALSE))
		{
			//echo '<b>URL:</b>'.$url.'#<br><br>';
		   $parsedUrl = parse_url($url);
		   $host = $parsedUrl['host'];
		   //$path = $parsedUrl['path'];
		   $path = substr($url,strlen($host)+7);
		   $ourhead = '';
		   $fp = fsockopen($host, 80, $errno, $errstr, 20);
		   if(!$fp) {
		   	   return 0;
		       exit("$errstr ($errno)<br />\n");
		   } else {
		       $out  = "HEAD $path HTTP/1.0\r\n";
		       $out .= "HOST: $host\r\n";
		       $out .= "Connection: close\r\n\r\n";
		       //echo '<b>OUT:</b>'.$out.'<br><br>';
		       fputs($fp,$out);

		       while (!feof($fp)) {
		           $ourhead = sprintf("%s%s", $ourhead, fgets ($fp,128));
		       }

		   }
		   fseek($fp,0);
		   fclose($fp);
		   //echo '<b>OURHEAD</b>:'.$ourhead.'<br><br>';
		   $pos=strpos($ourhead,'Location: ');
		   if (!($pos===FALSE)) $url=substr ($ourhead,$pos+10,strpos($ourhead,' ',$pos+10)-$pos-23);
	   }

	   $split1 = explode("content-length: ", strtolower($ourhead));
	   if(!@$split1[1]) $size=0; else
	   {
	   //exit('Error: No content length');
	      $split2 = explode("\r\n", $split1[1]);
	      $size = (int) $split2[0]; // size in bytes
	   }
     } else if (substr($url,0,6)=='ftp://')
     {
     	 $parsedUrl = parse_url($url);
	     $host = $parsedUrl['host'];
	     $path = $parsedUrl['path'];
	     $ftp=ftp_connect($host);
	     ftp_login ($ftp,'Anonymous','');
	     $size=ftp_size ($ftp, $path);
	 } else $size=filesize($url);

} else $size=0;

return $size;

}



// correct_english (строка) - приводит ЛЮБЫЕ английские строки к виду The Lord of the Rings: The Return of the King

function correct_english ($str)
{
	$str=trim(tolower($str));
	$s=explode(' ',$str);
	// Слова, которые надо писать БОЛЬШИМИ БУКВАМИ целиком
	$upall=array ('i', 'ii', 'iii', 'iv', 'v', 'vi', 'vii', 'viii', 'ix', 'x', 'fifa', 'gp', 'wwe', 'wwf', 'nba', 'nhl', 'thq');
	// Символы, после которых надо начинать с большой буквы
	$nextlow=array ('-', ':', '.', ',');
	// Слова, которые надо писать мелкими буквами целиком
	$lowall=array ('the' , 'a' , 'for' , 'of' , 'and' , 'in' , 'vs' , 'in' , 'on');
	$txt='';
	for ($i=0;$i<sizeof($s);$i++) {
		$p=substr($s[$i-1],-1);
		$c=$s[$i];
		if (in_array ($c, $upall)) $c=toupper($c); else
		if (!in_array ($c, $lowall)) $c=toupper($c,0);
		if (in_array ($p, $nextlow) || $i==0) $c=toupper($c,0);
		if ($c!='-')
		{
			$defis=mb_strpos ($c,'-');
			if ($defis!==FALSE) 
				$c=toupper($c,$defis+1); 
		}
		
		$txt.=' '.$c;
	}
	return trim ($txt);
}

function datechange ($date, $change)
{
	
	if ($date!='' && $change!='')
	{
		if (strpos($date,'.')===FALSE) $changed=date ('dmy',mktime(1,1,1,substr($date,2,2),substr($date,0,2),substr($date,4,2))+$change*86400);
			else $changed=date ('d.m.y',mktime(1,1,1,substr($date,3,2),substr($date,0,2),substr($date,6,2))+$change*86400);
		return $changed.mb_strstr($date,'_');
	} else
	{
		return $date;
	}
}

function boxdate ($rd, $year=0, $days=3, $lang='ru')
{

	global $date_days, $date_rus, $date_eng;
	
	if ($lang=='en') $date_rus=$date_eng;
	
	if ($days==3)
		if (strpos($rd,'_')===FALSE)
			$days=3;
		else
			$days=substr($rd,strpos($rd,'_')+1);
			
	if ($days==7)
		if (strpos($rd,'_')===FALSE)
			$days=7;
	  	else
	  		$days=substr($rd,strpos($rd,'_')+1);
	
	$curday=(int)substr($rd,0,2);
	$curmon=(int)substr($rd,2,2);
	$curyear=(int)substr($rd,4,2);
	if ($curday-$days<0)
	{
		$curmon_pr=$curmon-1;
		$year_pr='';
		if ($curmon_pr==0) {
			$curmon_pr=12;
			$curyear_pr=1999+$curyear;
			$year_pr=' '.($lang=='ru'?$curyear_pr.' г.':', '.$curyear_pr);
		}
		$curday_pr=$curday-$days+1+$date_days[$curmon_pr-1];
		$normaldate=$curday_pr.' '.$date_rus[$curmon_pr-1].$year_pr.($days>1?' — '.$curday.' '.$date_rus[$curmon-1]:'');
	}
	else {
		if ($lang=='ru')
			$normaldate=($curday-$days+1).($days>1?'–'.$curday.' ':' ').$date_rus[$curmon-1];
		else
			$normaldate=$date_rus[$curmon-1].' '.($curday-$days+1).($days>1?'–'.$curday:'');
	}
	
	if ($year==1)
	{
		if ($lang=='ru')
			return $normaldate.' '.(2000+$curyear).' г.';
		else
			return $normaldate.', '.(2000+$curyear);
	}
	     else
	     	return $normaldate;
}


function numform ($num,$point=2)
// Выдает число в нужном формате (пробелы между тысячяам, запятая в качестве десятичного знака).
// Максимальное кол-во десятичных знаков - 2. Старается обойтись вообще без них или хотя бы одним.
{
 if ($num==round($num)) return number_format($num,0,',',' '); else
   if ($num*10==round($num*10) || $point==1) return number_format($num,1,',',' '); else
                                             return number_format($num,2,',',' ');
}

function trimspaces ($str)
{
while (strpos($str,'  ')) $str=str_replace('  ',' ',$str);
return $str;
}

function htmldecode ($en)
{
 for ($i=1039;$i<=1071;$i++)
    $en=str_replace('&#'.$i.';',chr($i-848),$en);
 $name=str_replace ('&amp;','',$name);
 return $en;
}


function nametocode ($name, $dashes=0)
{
	// $dashes:
	// 0 - обычный мнемокод
	// 1 - заменяем пробелы на дефисы
	// 2 - для файлов: оставляем подчёркивания, дефисы, подчёркивания и точки, заменяем пробелы на подчёркивания
	
	$name=trim($name);
	$r=array ('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ъ', 'Э', 'Ю', 'Я');
	$rs=array ('а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ъ', 'э', 'ю', 'я');
	$e=array ('a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', '', 'y', '', 'e', 'ju', 'ja');
 	$rome=array('I', 'II', 'III', 'IV', 'V', 'VI', 'VI', 'VII', 'IX', 'X', 'XI', 'XII');

	foreach ($rome as $krom=>$rom)
		$name=preg_replace ('/ '.$rom.'$/si',$krom+1,$name);

	$strange=array ('&#xE9;','ū','ó','é','Ō','ô','Ô','é','&#xe9;','&laquo;','&raquo;');
	$normal=array ('e','u','o','e','o','o','o','e','e','«','»');

	$name=utf8_lowercase(trim($name));
	$name=str_replace ($r,$e,$name);
	$name=str_replace ($rs,$e,$name);
	$name=str_replace ($strange,$normal,$name);
	if (mb_substr($name,0,2)=='a ') $name=mb_substr ($name,2);
	if (mb_substr($name,0,3)=='an ') $name=mb_substr ($name,3);
	if (mb_substr($name,-3)==', a') $name=mb_substr ($name,0,-3);
	if (mb_substr($name,-3)==', an') $name=mb_substr ($name,0,-4);
	if (mb_substr($name,0,4)=='the ') $name=mb_substr ($name,4);
	if (mb_substr($name,-5)==', the') $name=mb_substr ($name,0,-5);
	
	if ($dashes==1)
		$name=str_replace(' ','-',trim(preg_replace('/[^a-z0-9\ ]/si','',$name)));
	else
	if ($dashes==2)
		$name=str_replace(' ','_',trim(preg_replace('/[^a-z0-9\_\.\-\ ]/si','',$name)));
	else
		$name=preg_replace('/[^a-z0-9]/si','',$name);
		
	$name=str_replace ('--','-',$name);
	return $name;
}

function strtonum ($str, $f='int')
{
// Добавление ноликов пригодится только для целых чисел. Да и то не всегда. Короче, лишь для ублюдского kinobusiness.com
	
	$str=trim($str);
	if ($f=='i')
		$f='int';
	
	$str=preg_replace('/[^0-9mM\-\-\+\,\.]+/si','',$str);

	if ($f=='int')
	{

		$str=preg_replace('/[^0-9\,\-\-]/si','',$str);
		$str=mb_trim($str);

		$pos=mb_strrpos($str,',');
		if ($pos!=0)
		{
			$z=mb_strlen($str)-$pos;
			if ($z==3) $str.='0';
			if ($z==2) $str.='00';
		}
	}


	if (strtolower(mb_substr($str,-1))=='m')
		$mln=TRUE;
	else
		$mln=false;

	$str=preg_replace('/[^0-9\.\-\-]/si','',$str);
	
	if ($str=='-0') $str='0';

	if ($mln==TRUE) $str=1000000*(float)$str;
	
	if ($f=='int')
		$str=intval($str);
	else
	if ($f=='f' || $f=='float')
		$str=floatval($str);

	return $str;

}

function between ($str, $s1, $s2='', $from=0)
// Функция выдает ту строку, что заключена в строке $str между сроками $s1 и $s2
{
if ($s1!='') $pos=mb_strpos(utf8_lowercase($str),utf8_lowercase($s1),$from);
else $pos=0;

if ($pos===FALSE) return '';
else
	{
		$pos+=mb_strlen($s1);
		if ($s2=='') $pos2=mb_strlen($str);
			else $pos2=mb_strpos(utf8_lowercase($str),utf8_lowercase($s2),$pos);
		if ($pos2==0) $pos2=mb_strlen($str);
		if ($pos===FALSE || $pos==$pos2) return ''; else
			return mb_substr($str,$pos,$pos2-$pos);
	}
}

function getiplong ()
{
	return ip2long(getip());
}

function getip() {
if (getenv("HTTP_CLIENT_IP"))
$ip = getenv("HTTP_CLIENT_IP");
else if(getenv("HTTP_X_FORWARDED_FOR"))
$ip = getenv("HTTP_X_FORWARDED_FOR");
else if(getenv("REMOTE_ADDR"))
$ip = getenv("REMOTE_ADDR");
else
$ip = "";
return $ip;

}

function tabletoarray ($html,$strip=1)
{
// Функция принимает строку $html, состоящую из таблицы "<table..... </table>" и преобразует ее в массив.
// Элементы начинаются с 1 строки (а не с 0).
// В ячейку $ar[1][0] записывается количество строк
// В ячейку $ar[0][1] записывается количество столбцов
// $strip - вырезать или не вырезать HTML-теги

$html=preg_replace ('/<colgroup>.+<\/colgroup>/siU','',$html);
$html=preg_replace ('/<!--.+-->/siU','',$html);



//
 $html= str_replace ('<TABLE','<table',$html);
 $html= str_replace ('<Table','<table',$html);
 $html= str_replace ('<TD','<td',$html);
 $html= str_replace ('<th','<td',$html);
 $html= str_replace ('<TH','<td',$html);
 $html= str_replace ('<TR','<tr',$html);
 $html= str_replace ('</TABLE','</table',$html);
 $html= str_replace ('</Table','</table',$html);
 $html= str_replace ('</TD','</td',$html);
 $html= str_replace ('</TH','</td',$html);
 $html= str_replace ('</th','</td',$html);
 $html= str_replace ('</td ','</td',$html);
 $html= str_replace ('</TR','</tr',$html);
 $html= str_replace ('<tbody>','',$html);
 $html= str_replace ('<Tbody>','',$html);
 $html= str_replace ('<TBODY>','',$html);
 $html= str_replace ('</tbody>','',$html);
 $html= str_replace ('</TBODY>','',$html);
 $html= str_replace ('</Tbody>','',$html);
 $html=str_replace("\r","",$html);
 $html=str_replace("\n","",$html);
 $html=str_replace("<br>"," ",$html);
 $html=str_replace("<BR>"," ",$html);
 $html=str_replace("&amp;","&",$html);
 $beg=mb_strpos($html,'<table');
 if ($beg===FALSE) $beg=0;
 	          else $beg=mb_strpos($html,'>',$beg)+1;
 $beg=mb_strpos($html,'<tr',$beg);
 $end=mb_strpos($html,'</table>',$beg);
 if ($end===FALSE) $end=mb_strlen ($html)-1;
 $html=trim (mb_substr ($html,$beg,$end-$beg));
 $i=1;
 $j=1;
 $p=0;
 $ar=array();

 $ar[$i][$j]='';

while ($p + 5 < mb_strlen ($html))
{

  $rowbeg=mb_strpos($html,'<tr',$p);
  $rowbeg=mb_strpos($html,'>',$rowbeg)+1;
  $rowend=mb_strpos($html,'</tr>',$rowbeg);
  $row=trim (mb_substr($html,$rowbeg,$rowend-$rowbeg));
  $j=1;
  $p=0;

  while ($p< mb_strlen ($row))
  {
   $colbeg=mb_strpos($row,'<td',$p);
   $colbeg=mb_strpos($row,'>',$colbeg)+1;
   $colend=mb_strpos($row,'</td>',$colbeg);
   if ($strip) $col= trim (strip_tags (mb_substr($row,$colbeg,$colend-$colbeg)));
          else $col= trim(mb_substr($row,$colbeg,$colend-$colbeg));
   $ar[$i][$j]=$col;
   $p=$colend+5;
   $j++;

  }

  $p=$rowend+5;
  $i++;

}

 $ar[1][0]=$i-1;
 $ar[0][1]=$j-1;

 return $ar;


}


function tabletoarraysafe ($html,$strip=1)
// Спецверсия для пидорасов с Kinobusiness. Тег </tr> теперь необязателен! 
// Функция принимает строку $html, состоящую из таблицы "<table..... </table>" и преобразует ее в массив.
// Элементы начинаются с 1 строки (а не с 0).
// В ячейку $ar[1][0] записывается количество строк
// В ячейку $ar[0][1] записывается количество столбцов
// $strip - вырезать или не вырезать HTML-теги

{


 $html= str_replace ('<TABLE','<table',$html);
 $html= str_replace ('<Table','<table',$html);
 $html= str_replace ('<TD','<td',$html);
 $html= str_replace ('<th','<td',$html);
 $html= str_replace ('<TH','<td',$html);
 $html= str_replace ('<TR','<tr',$html);
 $html= str_replace ('</TABLE','</table',$html);
 $html= str_replace ('</Table','</table',$html);
 $html= str_replace ('</TD','</td',$html);
 $html= str_replace ('</TH','</td',$html);
 $html= str_replace ('</th','</td',$html);
 $html= str_replace ('</td ','</td',$html);
 $html= str_replace ('</TR','</tr',$html);
 $html= str_replace ('<tbody>','',$html);
 $html= str_replace ('<Tbody>','',$html);
 $html= str_replace ('<TBODY>','',$html);
 $html= str_replace ('</tbody>','',$html);
 $html= str_replace ('</TBODY>','',$html);
 $html= str_replace ('</Tbody>','',$html);
 $html=str_replace("\r","",$html);
 $html=str_replace("\n","",$html);
 $html=str_replace("<br>"," ",$html);
 $html=str_replace("<BR>"," ",$html);
 $html=str_replace("&amp;","&",$html);
 $beg=strpos($html,'<table');
 if ($beg===FALSE) $beg=0;
 	          else $beg=strpos($html,'>',$beg)+1;
 $beg=strpos($html,'<tr',$beg);
 $end=strpos($html,'</table>',$beg);
 if ($end===FALSE) $end=strlen ($html)-1;
 $html=trim (substr ($html,$beg,$end-$beg));
 $i=1;
 $j=1;
 $p=0;
 $ar[$i][$j]='';
 //$out=false;
 while ($p + 5 < strlen ($html))
 //for ($t=0;$t<=12;$t++)
 {
  $rowbeg=strpos($html,'<tr',$p);
  //if ($rowbeg===false) $out=true;
  //else  {
  $rowbeg=strpos($html,'>',$rowbeg)+1;
  $rowend=strpos($html,'</td><tr',$rowbeg);
  if ($rowend===false) {
  		$rowend=strpos($html,'</tr>',$rowbeg);
  		$row=trim (substr($html,$rowbeg,$rowend-$rowbeg));
  } else $row=trim (substr($html,$rowbeg,$rowend-$rowbeg+5));
  $j=1;
  $p=0;
  while ($p< strlen ($row))
  {
   $colbeg=strpos($row,'<td',$p);
   $colbeg=strpos($row,'>',$colbeg)+1;
   $colend=strpos($row,'</td>',$colbeg);
   if ($strip) $col= trim (strip_tags (substr($row,$colbeg,$colend-$colbeg)));
          else $col= trim(substr($row,$colbeg,$colend-$colbeg));
   $ar[$i][$j]=$col;
   $p=$colend+5;
   $j++;
  }
  $p=$rowend+5;
  $i++;
 }
 $ar[1][0]=$i-1;
 $ar[0][1]=$j-1;
 return $ar;
}


function isrussian ($str)
{
	return ($str!=convert_cyr_string($str , 'w' , 'k'));
}


function betweens ($str, $arr, $trim=TRUE)
{
	$deep=sizeof ($arr);
	for ($i=0; $i<$deep; $i=$i+2)
	{
		@$str=between ($str, $arr[$i], $arr[$i+1]);
		
		//echo $str;
	}
	if ($trim) $str=trim ($str);
	return $str;
}

function normalize_date ($date)
{
	global $date_eng, $date_rus;

	if (preg_match("/^([a-zA-Z]+) ([0-9]+), ([0-9]{4})(.*)/si", $date, $dd))
	{
		$month=array_search ($dd[1],$date_eng)+1;
		$date=sprintf('%02d',$dd[2]).'.'.sprintf('%02d',$month).'.'.$dd[3];
	} else
	if (preg_match("/^([0-9]+) ([a-zA-Z]+) ([0-9]{4})(.*)/si", $date, $dd))
	{
		$month=array_search ($dd[2],$date_eng)+1;
		$date=sprintf('%02d',$dd[1]).'.'.sprintf('%02d',$month).'.'.$dd[3];
	} else
    if ($date=='TBA') $date='';
    $date=str_replace('limited','ограниченный прокат',$date);
    return $date;
}


function explode2string ($txt, $divider, $zpt=', ', $betweens='', $limit=9999)
{
	$str='';
	$i=0;
	$arr=explode ($divider, $txt);
	foreach ($arr as $a)
	{
		$a=mb_trim($betweens!=''?betweens($a,$betweens):$a);
		if ($a!='' && $i<$limit)
			$str.=$a.$zpt;
		$i++;
	}
	if (mb_substr($str,-mb_strlen($zpt))==$zpt) $str=mb_substr($str,0,-mb_strlen($zpt));
	return $str;
}


function date_sum ($day,$month,$year,$hour,$minute)
{
return $day*60*24+$month*31*60*24+$year*31*12*60*24+$hour*60+$minute;
}

function ending ($num, $e1,$e2,$e3)
// Формирует окончание в соответствии с числом
// $num - число
// $e1,$e2,$3 - окончания существительного. Например - 1 мяч (''), 2 мяча ('а'), 6 мячей ('ей')
{
if ((($num%100)>10)&&(($num%100)<20)) return $e3;
if (($num%10)==1) return $e1;
if ((($num%10)>1)&&(($num%10)<5)) return $e2;
return $e3;
}

function numending ($num, $word, $e1,$e2,$e3, $rod='zh')
	// $rod = 'm', 's', 'zh' - род мужской, средний или женский
{
	global $numbers_zh, $numbers_m,$numbers_s;
	if ($rod=='zh') $n=$numbers_zh[$num]; else
		if ($rod=='m') $n=$numbers_m[$num]; else
			if ($rod=='s') $n=$numbers_s[$num];
	return ($num>9?$num:$n).' '.$word.ending($num, $e1,$e2,$e3);
}



function dat ($d,$short=0)
{
// $rus: 0 (по умолчанию) - выводится "15 декабря 2003"
//       1 - выводится "15 декабря"
//       2,3,... - выводится 15.12.2003
// Сделаем так: если в дате нет ТОЧКИ ("."), то предполагается, что это формат timestamp. С ним и работаем.

	$mon=array('','января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	
	$a=explode('.',$d);
	if (sizeof($a)==3)
	{ // Если дата типа 01.02.08 или 01.02.2008
		if ($a[2]<100 && $a[2]>50) $a[2]=$a[2]+1000;
		if ($a[2]>=0 && $a[2]<=50) $a[2]=$a[2]+2000;
		if ($short==0) return (int)$a[0].' '.$mon[(int)$a[1]].' '.(int)$a[2];
		    else if ($short==1) return (int)$a[0].' '.$mon[(int)$a[1]];
		         else return $d;
	} else return $d;
}

/*
Константы для удобства. Коды соответствуют символам в win-кодировке, но это
"совпадение":) - на самом деле, скрипт кросскодировочный (win и koi).
*/

define("TAG1","\xAC");
define("TAG2","\xAD");
define("LAQUO","\xAB");
define("RAQUO","\xBB");
define("LDQUO","\x84");
define("RDQUO","\x93");
define("MDASH","\x97");
define("NDASH","\x96");
define("APOS","\xB4");
define("HELLIP","\x85");

// функция-заменялка для тегов

$Refs = array(); // буфер для хранения тегов
$RefsCntr = 0;   // счётчик буфера

function yyyTypo($x)
{
    global $Refs, $RefsCntr;
    $Refs[] = StripSlashes($x[0]);
    return TAG1.($RefsCntr++).TAG2;
}

function zzzTypo($x)
{
    global $Refs;
    return $Refs[$x[1]];
}




function typo ($text, $isHTML = true)
{


    global $Refs,$RefsCntr;
    if($isHTML) {
        $Refs = array(); // сбрасываем буфер
        $RefsCntr = 0;   // счётчик буфера
        /*
            Вырезаем элементы, содержимое которых мы не должны преобразовывать:
            комментарии, скрипты, стили, ещё что-нибудь - по вкусу.
            Вырезанные блоки складируем в Refs при помощи функции xxxTypo()
        */

        // комментарии
        $text = preg_replace_callback('{<!--.*?-->}s', 'yyyTypo', $text);

        $PrivateTags = "title|script|style|pre|textarea";
        $text = preg_replace_callback('{<\s*('.$PrivateTags.')[\s>].*?<\s*/\s*\1\s*>}is', 'yyyTypo', $text);

        // обычные теги
        $text = preg_replace_callback('{<(?:[^\'"\>]+|".*?"|\'.*?\')+>}s','yyyTypo',$text);
    }





    // ОК. Теперь займёмся кавычками
    /*
        ВЕЛИКОЕ ПРАВИЛО: Кавычки всегда прилегают к словам!

        Открывающиеся кавычки
        могут встречаться:
            в начале строки,
            после скобок "([{",
            дефиса
            пробелов,
            ещё одной кавычки
    */

    $prequote = '\s\(\[\{";-';
    $text = preg_replace('{^"}', LAQUO, $text);
    $text = preg_replace('{(?<=['.$prequote.'])"}', LAQUO, $text);

    // а это для тех, кто нарушает ВЕЛИКОЕ ПРАВИЛО
    $text = preg_replace('{^((?:'.TAG1.'\d+'.TAG2.')+)"}', '\1'.LAQUO, $text);
    $text = preg_replace('{(?<=['.$prequote.'])((?:'.TAG1.'\d+'.TAG2.')+)"}', '\1'.LAQUO, $text);

    /*
        Закрывающиеся кавычки - все остальные
        Вы спросите - а как же тогда ставить знак дюйма? Очень просто - &quot;!
    */
    $text = str_replace('"', RAQUO, $text);

    // исправляем ошибки в расстановке кавычек типа ""... и ...""
    // (предполагаем, что не более двух-трёх кавык подряд)
    $text = preg_replace('{'.LAQUO.RAQUO.'}', LAQUO.LAQUO, $text);
    $text = preg_replace('{'.RAQUO.LAQUO.'}', RAQUO.RAQUO, $text);

    //  вложенные кавыки
    $i=0; // - это защита от зацикливания (оно возможно в случае неправильно расставленных кавычек)
    while (($i++<10) && preg_match('{'.LAQUO.'(?:[^'.RAQUO.']*?)'.LAQUO.'}', $text))
        $text = preg_replace(
            '{'.LAQUO.'([^'.RAQUO.']*?)'.LAQUO.'(.*?)'.RAQUO.'}s',
            LAQUO.'\1'.LDQUO.'\2'.RDQUO, $text);

    $i=0;
    while (($i++<10) && preg_match('{'.RAQUO.'(?:[^'.LAQUO.']*?)'.RAQUO.'}', $text))
        $text = preg_replace(
            '{'.RAQUO.'([^'.LAQUO.']*?)'.RAQUO.'}',
            RDQUO.'\1'.RAQUO, $text);

    // с кавычками закончили, займёмся мелкой типографикой
    // тире:
    $text = preg_replace('{^-+(?=\s)}',MDASH,$text);
    $text = preg_replace('{(?<=[\s'.TAG2.'])-+(?=\s)}',MDASH,$text);
    $text = str_replace(' '.MDASH,'&nbsp;'.MDASH,$text);
    // ndash:
    $text = preg_replace('{(?<=\d)-(?=\d)}',NDASH,$text);
    // ...:
    $text = str_replace('...',HELLIP,$text);
    // апостроф:
    $text = preg_replace('{(?<=\S)\'}',APOS,$text);



    if($isHTML)
    {
        // возвращаем взятое обратно
        while (preg_match('{'.TAG1.'.+?'.TAG2.'}', $text))
            $text = preg_replace_callback('{'.TAG1.'(.+?)'.TAG2.'}', 'zzzTypo', $text);
    }

    // заменяем коды символов на HTML-entities.
    $text = str_replace(
        array(LAQUO,RAQUO,LDQUO,RDQUO,MDASH,NDASH,HELLIP,APOS),
        array('&laquo;','&raquo;','&#132;','&#147;','&#151;','&minus;','&#133;','&#146;'),
        $text
    );

    return $text;
}



function ddat ($d,$f,$today=0)

// $d - дата в виде 09.06.04 или 09.06.2004
// $f - формат даты:
// $today - 1, если надо выводить "сегодня" и "вчера" вместо всякого там
//
// dd - число типа 01
// d - число типа 1
// W - день недели, типа "Пятница"
// w - день недели, типа "пятница"
// _W - день недели, типа "Friday"
// _W3 - день недели, типа "Fri"
// _w - день недели, типа "friday"
// _w3 - день недели, типа "fri"
// mm - месяц типа 06
// m - месяц типа 6
//? M - месяц типа "июня"
//? _M - месяц типа "February"
//? _M3 - месяц типа "Feb
// yy - год типа 04
// yyyy - год типа 2004

{

if (strpos($d,'.')===false) $d=date('d',$d).'.'.date('m',$d).'.'.date('y',$d);

$a=explode('.',$d);
if (strlen($a[2])!=4) if (($a[2]<100)&&($a[2]>50)) $a[2]=$a[2]+1000; else
if (($a[2]>=0)&&($a[2]<=50)) $a[2]=$a[2]+2000;

//return date('d').'.'.date('m').'.'.date('Y').'.'.$a[0]'.'.$a[1]'.'.$a[2];

if (($today==1)&&(date('d')==$a[0])&&(date('m')==$a[1])&&(date('Y')==$a[2])) return 'Сегодня'; else
if (($today==1)&&(date('d',time()-86400)==$a[0])&&(date('m',time()-86400)==$a[1])&&(date('Y',time()-86400)==$a[2])) return 'Вчера'; else

{

$mon_days=array (31,28,31,30,31,30,31,31,30,31,30,31);
$week=array('Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота');
$week_eng=array ('Sunday', 'Monday', 'Tuesday', 'Wednsday', 'Thursday', 'Friday', 'Saturday');
$mon=array('', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
$mon_eng=array ('', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

$w=(int)(($a[2]-1)*365.25);
for ($i=0;$i<$a[1]-1;$i++) $w+=$mon_days[$i];
if (($a[1]>2)&&($a[2]%4==0)) $w+=1;
$w+=$a[0]-1;

$f=str_replace ('dd',$a[0],$f);
$f=str_replace ('d',(int)$a[0],$f);
$f=str_replace ('mm',$a[1],$f);
$f=str_replace ('m',(int)$a[1],$f);
$f=str_replace ('yyyy',$a[2],$f);
$f=str_replace ('yy',substr($a[2],-2),$f);
$f=str_replace ('_M3',substr($mon_eng[(int)$a[1]],0,3),$f);
$f=str_replace ('_M',$mon_eng[(int)$a[1]],$f);
$f=str_replace ('M',$mon[(int)$a[1]],$f);
$f=str_replace ('_w3',substr(utf8_lowercase($week_eng[$w%7]),0,3),$f);
$f=str_replace ('_w',utf8_lowercase($week_eng[$w%7]),$f);
$f=str_replace ('_W3',substr($week_eng[$w%7],0,3),$f);
$f=str_replace ('_W',$week_eng[$w%7],$f);
$f=str_replace ('w',utf8_lowercase($week[$w%7]),$f);
$f=str_replace ('W',$week[$w%7],$f);

return $f;
}

}


function rss_short ($d, $len=400)
{

	$d=preg_replace ("/<strong>/si", "<b>", $d);
	$d=preg_replace ("/<\/strong>/si", "</b>", $d);
	$d=preg_replace ("/<italic>/si", "<i>", $d);
	$d=preg_replace ("/<\/italic>/si", "</i>", $d);
	$d=preg_replace ("/<a [^>]+>/si", "<b>", $d);
	$d=preg_replace ("/<\/a>/si", "</b>", $d);

	$s1=array('<BR>','<B>','</B>','<I>','</I>','<U>','</U>','</P>','&laquo;','&raquo;','&#151;','&minus;','&#8722;','&#8212;','&nbsp;');
	$s2=array('<br>','<b>','</b>','<i>','</i>','<u>','</u>','</p>','«','»','-','-','-','-',' ');

	$d=str_replace ($s1,$s2, $d);

	$d=mb_trim($d);

	while (mb_substr($d,0,4)=='<br>') $d=mb_trim(mb_substr($d,4));
	while (mb_substr($d,0,6)=='<br />') $d=mb_trim(mb_substr($d,6));
	while (mb_substr($d,-4)=='<br>') $d=mb_trim(mb_substr($d,0,-4));
	while (mb_substr($d,-6)=='<br />') $d=mb_trim(mb_substr($d,0,-6));

	$tr=0;
	$breakword=0;

	if (!(mb_strpos($d,'<div style="text-align:center;"><div id="container')===false)) $d=mb_substr ($d,0,mb_strpos($d,'<div style="text-align:center;"><div id="container'));
	if (!(mb_strpos($d,'<script')===false)) $d=mb_substr ($d,0,mb_strpos($d,'<script'));
	if (!(mb_strpos($d,'[video=')===false)) $d=mb_substr ($d,0,mb_strpos($d,'[video='));
	if (!(mb_strpos($d,'[videobottom=')===false)) $d=mb_substr ($d,0,mb_strpos($d,'[videobottom='));
	if (!(mb_strpos($d,'[rate=')===false)) $d=mb_substr ($d,0,mb_strpos($d,'[rate='));
	if (!(mb_strpos($d,'[blogs=')===false)) $d=mb_substr ($d,0,mb_strpos($d,'[blogs='));
	if (!(mb_strpos($d,'[cut')===false)) $d=mb_substr ($d,0,mb_strpos($d,'[cut'));
	if (!(mb_strpos($d,'[spoiler')===false)) $d=mb_substr ($d,0,mb_strpos($d,'[spoiler'));
	if (!(mb_strpos($d,'[img')===false)) $d=mb_substr ($d,0,mb_strpos($d,'[img'));
	//if (!(mb_strpos($d,'[image')===false)) $d=mb_substr ($d,0,mb_strpos($d,'[image'));
	if (!(mb_strpos($d,'<table')===false)) $d=mb_substr ($d,0,mb_strpos($d,'<table'));
	if (!(mb_strpos($d,'HD-качество ')===false)) $d=mb_substr ($d,0,mb_strpos($d,'HD-качество '));

	$tags='<b><i><u><br><p>';
	$d=strip_tags($d,$tags);


	if (mb_strlen($d)>$len)
	{
		if (!(mb_strpos($d,' ',$len)===false)) $d=mb_substr($d,0,mb_strpos($d,' ',$len));
		if (mb_substr_count ($d,'<b>')>mb_substr_count ($d,'</b>')) $d.='</b>';
		if (mb_substr_count ($d,'<i>')>mb_substr_count ($d,'</i>')) $d.='</i>';
		if (mb_substr_count ($d,'<u>')>mb_substr_count ($d,'</u>')) $d.='</u>';
		// $tr=1;
		$breakword=1;
	}

//	if ($breakword==1) $d.='...';

	return $d;
}



function translate_korean ($korean)
{

	mb_internal_encoding("UTF-8");
	mb_regex_encoding("UTF-8");

$begin=array ('pyeong'=>'хён', 'byeong'=>'пён', 'cheung'=>'чхын', 'cheong'=>'чхон', 'gyeong'=>'кён', 'cheom'=>'чхом', 'cheop'=>'чхоп', 'paeng'=>'пхэн', 'pyeom'=>'пхём', 'gyeop'=>'кёп', 'ching'=>'чхин', 'pyeon'=>'пхён', 'byeon'=>'пён', 'chong'=>'чхон', 'goeng'=>'квен', 'seong'=>'сон', 'gwang'=>'кван', 'jeung'=>'чын', 'gyeom'=>'кём', 'byeol'=>'пёль', 'byeok'=>'пёк', 'gyeon'=>'кён', 'cheok'=>'чхок', 'jeong'=>'чон', 'chang'=>'чхан', 'chaek'=>'чхэк', 'deung'=>'тын', 'chung'=>'чхун', 'cheuk'=>'чхык', 'jaeng'=>'чэн', 'gyeol'=>'кёль', 'geung'=>'кын', 'cheol'=>'чхоль', 'saeng'=>'сэн', 'seung'=>'сын', 'cheon'=>'чхон', 'ssang'=>'ссан', 'taeng'=>'тхэн', 'gyeok'=>'кёк', 'chok'=>'чхок', 'bung'=>'пун', 'bing'=>'пин', 'byeo'=>'пё', 'baek'=>'пэк', 'baem'=>'пэм', 'chwi'=>'чхви', 'bang'=>'пан', 'chun'=>'чхун', 'chuk'=>'чхук', 'beon'=>'пон', 'beol'=>'поль', 'choe'=>'чхве', 'chon'=>'чхон', 'cheo'=>'чхо', 'beop'=>'поп', 'beom'=>'пом', 'bong'=>'пон', 'seok'=>'сок', 'seup'=>'сып', 'jung'=>'чун', 'sing'=>'син', 'seum'=>'сым', 'seul'=>'сыль', 'jeul'=>'чыль', 'jeuk'=>'чык', 'ssae'=>'ссэ', 'ssuk'=>'ссук', 'jeom'=>'чом', 'jeol'=>'чоль', 'jeok'=>'чок', 'jang'=>'чан', 'jeop'=>'чоп', 'sseu'=>'ссы', 'jong'=>'чон', 'sung'=>'сун', 'jeum'=>'чым', 'saek'=>'сэк', 'chak'=>'чхак', 'jeon'=>'чон', 'chan'=>'чхан', 'chal'=>'чхаль', 'cham'=>'чхам', 'sang'=>'сан', 'seon'=>'сон', 'seol'=>'соль', 'song'=>'сон', 'swae'=>'свэ', 'jeup'=>'чып', 'jing'=>'чин', 'syeo'=>'сё', 'seom'=>'сом', 'seop'=>'соп', 'chae'=>'чхэ', 'chul'=>'чхуль', 'gwol'=>'кволь', 'gaek'=>'кэк', 'gwon'=>'квон', 'gung'=>'кун', 'tung'=>'тхун', 'tong'=>'тхон', 'gyun'=>'кюн', 'gyul'=>'кюль', 'geup'=>'кып', 'taek'=>'тхэк', 'geum'=>'кым', 'geun'=>'кын', 'geuk'=>'кык', 'chum'=>'чхум', 'teuk'=>'тхык', 'geop'=>'коп', 'gwak'=>'квак', 'gyeo'=>'кё', 'gong'=>'кон', 'pyeo'=>'пхё', 'geom'=>'ком', 'gwan'=>'кван', 'teum'=>'тхым', 'geon'=>'кон', 'gwae'=>'квэ', 'geol'=>'коль', 'gwal'=>'кваль', 'gang'=>'кан', 'geul'=>'кыль', 'deok'=>'ток', 'chim'=>'чхим', 'keun'=>'кхын', 'daek'=>'тэк', 'tang'=>'тхан', 'kwae'=>'кхвэ', 'dwae'=>'твэ', 'dong'=>'тон', 'chip'=>'чхип', 'doen'=>'твен', 'dang'=>'тан', 'chik'=>'чхик', 'deuk'=>'тык', 'deul'=>'тыль', 'chin'=>'чхин', 'chil'=>'чхиль', 'gakk'=>'какк', 'pung'=>'пхун', 'jul'=>'чуль', 'jwi'=>'чви', 'pip'=>'пхип', 'jun'=>'чун', 'jeu'=>'чы', 'pil'=>'пхиль', 'jon'=>'чон', 'jok'=>'чок', 'peo'=>'пхо', 'jol'=>'чоль', 'pyo'=>'пхё', 'pok'=>'пхок', 'pum'=>'пхум', 'pye'=>'пхе', 'joe'=>'чве', 'pik'=>'пхик', 'peu'=>'пхы', 'jwa'=>'чва', 'juk'=>'чук', 'teu'=>'тхы', 'tal'=>'тхаль', 'che'=>'чхе', 'tam'=>'тхам', 'tap'=>'тхап', 'teo'=>'тхо', 'tae'=>'тхэ', 'cho'=>'чхо', 'tan'=>'тхан', 'chu'=>'чху', 'chi'=>'чхи', 'keu'=>'кхы', 'kal'=>'кхаль', 'tak'=>'тхак', 'ton'=>'тхон', 'tol'=>'тхоль', 'jin'=>'чин', 'jil'=>'чиль', 'jik'=>'чик', 'pan'=>'пхан', 'pal'=>'пхаль', 'jim'=>'чим', 'jip'=>'чип', 'twi'=>'тхви', 'toe'=>'тхве', 'cha'=>'чха', 'jom'=>'чом', 'jyo'=>'чё', 'pae'=>'пхэ', 'sul'=>'суль', 'dwi'=>'тви', 'deu'=>'ты', 'jeo'=>'чо', 'bak'=>'пак', 'dun'=>'тун', 'duk'=>'тук', 'don'=>'тон', 'dol'=>'толь', 'doe'=>'тве', 'gok'=>'кок', 'ban'=>'пан', 'bal'=>'паль', 'bon'=>'пон', 'buk'=>'пук', 'bun'=>'пун', 'gyo'=>'кё', 'bok'=>'пок', 'gye'=>'ке', 'bap'=>'пап', 'bae'=>'пэ', 'beo'=>'по', 'dok'=>'ток', 'gon'=>'кон', 'gyu'=>'кю', 'geu'=>'кы', 'gwa'=>'ква', 'gin'=>'кин', 'gwi'=>'кви', 'gut'=>'кут', 'guk'=>'кук', 'gun'=>'кун', 'goe'=>'кве', 'gul'=>'куль', 'gil'=>'киль', 'gim'=>'ким', 'got'=>'кот', 'dae'=>'тэ', 'gol'=>'коль', 'deo'=>'то', 'dap'=>'тап', 'dam'=>'там', 'got'=>'кот', 'dan'=>'тан', 'dal'=>'таль', 'geo'=>'ко', 'bul'=>'пуль', 'sum'=>'сум', 'swi'=>'сви', 'seu'=>'сы', 'gal'=>'каль', 'gam'=>'кам', 'sun'=>'сун', 'suk'=>'сук', 'gap'=>'кап', 'bin'=>'пин', 'sik'=>'сик', 'sin'=>'син', 'sso'=>'ссо', 'ssi'=>'сси', 'gan'=>'кан', 'jan'=>'чан', 'ssa'=>'сса', 'gar'=>'кар', 'sil'=>'силь', 'sim'=>'сим', 'sip'=>'сип', 'gak'=>'как', 'soe'=>'све', 'san'=>'сан', 'sal'=>'саль', 'sam'=>'сам', 'sap'=>'сап', 'sak'=>'сак', 'jap'=>'чап', 'bil'=>'пиль', 'bim'=>'пим', 'jae'=>'чэ', 'sat'=>'сат', 'sae'=>'сэ', 'son'=>'сон', 'sol'=>'соль', 'sot'=>'сот', 'sok'=>'сок', 'gat'=>'кат', 'seo'=>'со', 'gae'=>'кэ', 'jam'=>'чам', 'jak'=>'чак', 'lee'=>'ли', 'pe'=>'пхе', 'ge'=>'ке', 'po'=>'пхо', 'go'=>'ко', 'pu'=>'пху', 'pa'=>'пха', 'pi'=>'пхи', 'ti'=>'тхи', 'di'=>'ти', 'so'=>'со', 'su'=>'су', 'se'=>'сe', 'sa'=>'са', 'bi'=>'пи', 'ji'=>'чи', 'ga'=>'ка', 'jo'=>'чо', 'je'=>'че', 'ja'=>'ча', 'ju'=>'чу', 'si'=>'си', 'bu'=>'пу', 'bo'=>'по', 'gi'=>'ки', 'da'=>'та', 'te'=>'тхе', 'to'=>'тхо', 'tu'=>'тху', 'ta'=>'тха', 'ki'=>'кхи', 'ba'=>'па', 'du'=>'ту', 'ko'=>'кхо', 'do'=>'то', 'gu'=>'ку', 'g'=>'к', 'k'=>'к', 'n'=>'н', 'd'=>'т', 't'=>'т', 'r'=>'л', 'l'=>'л', 'm'=>'м', 'p'=>'п', 'b'=>'п', 's'=>'c', 'j'=>'ч', 'h'=>'х');

$ending=array ('pyeong'=>'пён', 'byeong'=>'пён', 'cheung'=>'тын', 'cheong'=>'тон', 'gyeong'=>'кён', 'cheom'=>'том', 'cheop'=>'топ', 'paeng'=>'пэн', 'pyeom'=>'пём', 'gyeop'=>'кёп', 'ching'=>'тин', 'pyeon'=>'пён', 'byeon'=>'пён', 'chong'=>'тон', 'goeng'=>'квен', 'seong'=>'тон', 'gwang'=>'кван', 'jeung'=>'тын', 'gyeom'=>'кём', 'byeol'=>'пёль', 'byeok'=>'пёк', 'gyeon'=>'кён', 'cheok'=>'ток', 'jeong'=>'тон', 'chang'=>'тан', 'chaek'=>'тэк', 'deung'=>'тын', 'chung'=>'тун', 'cheuk'=>'тык', 'jaeng'=>'тэн', 'gyeol'=>'кёль', 'geung'=>'кын', 'cheol'=>'толь', 'saeng'=>'тэн', 'seung'=>'тын', 'cheon'=>'тон', 'ssang'=>'тан', 'taeng'=>'тэн', 'gyeok'=>'кёк', 'chok'=>'ток', 'bung'=>'пун', 'bing'=>'пин', 'byeo'=>'пё', 'baek'=>'пэк', 'baem'=>'пэм', 'chwi'=>'тви', 'bang'=>'пан', 'chun'=>'тун', 'chuk'=>'тук', 'beon'=>'пон', 'beol'=>'поль', 'choe'=>'тве', 'chon'=>'тон', 'cheo'=>'то', 'beop'=>'поп', 'beom'=>'пом', 'bong'=>'пон', 'seok'=>'ток', 'seup'=>'тып', 'jung'=>'тун', 'sing'=>'тин', 'seum'=>'тым', 'seul'=>'тыль', 'jeul'=>'тыль', 'jeuk'=>'тык', 'ssae'=>'тэ', 'ssuk'=>'тук', 'jeom'=>'том', 'jeol'=>'толь', 'jeok'=>'ток', 'jang'=>'тан', 'jeop'=>'топ', 'sseu'=>'ты', 'jong'=>'тон', 'sung'=>'тун', 'jeum'=>'тым', 'saek'=>'тэк', 'chak'=>'так', 'jeon'=>'тон', 'chan'=>'тан', 'chal'=>'таль', 'cham'=>'там', 'sang'=>'тан', 'seon'=>'тон', 'seol'=>'толь', 'song'=>'тон', 'swae'=>'твэ', 'jeup'=>'тып', 'jing'=>'тин', 'syeo'=>'тё', 'seom'=>'том', 'seop'=>'топ', 'chae'=>'тэ', 'chul'=>'туль', 'gwol'=>'кволь', 'gaek'=>'кэк', 'gwon'=>'квон', 'gung'=>'кун', 'tung'=>'тун', 'tong'=>'тон', 'gyun'=>'кюн', 'gyul'=>'кюль', 'geup'=>'кып', 'taek'=>'тэк', 'geum'=>'кым', 'geun'=>'кын', 'geuk'=>'кык', 'chum'=>'тум', 'teuk'=>'тык', 'geop'=>'коп', 'gwak'=>'квак', 'gyeo'=>'кё', 'gong'=>'кон', 'pyeo'=>'пё', 'geom'=>'ком', 'gwan'=>'кван', 'teum'=>'тым', 'geon'=>'кон', 'gwae'=>'квэ', 'geol'=>'коль', 'gwal'=>'кваль', 'gang'=>'кан', 'geul'=>'кыль', 'deok'=>'ток', 'chim'=>'тим', 'keun'=>'кын', 'daek'=>'тэк', 'tang'=>'тан', 'kwae'=>'квэ', 'dwae'=>'твэ', 'dong'=>'тон', 'chip'=>'тип', 'doen'=>'твен', 'dang'=>'тан', 'chik'=>'тик', 'deuk'=>'тык', 'deul'=>'тыль', 'chin'=>'тин', 'chil'=>'тиль', 'gakk'=>'какк', 'pung'=>'пун', 'jul'=>'туль', 'jwi'=>'тви', 'pip'=>'пип', 'jun'=>'тун', 'jeu'=>'ты', 'pil'=>'пиль', 'jon'=>'тон', 'jok'=>'ток', 'peo'=>'по', 'jol'=>'толь', 'pyo'=>'пё', 'pok'=>'пок', 'pum'=>'пум', 'pye'=>'пе', 'joe'=>'тве', 'pik'=>'пик', 'peu'=>'пы', 'jwa'=>'тва', 'juk'=>'тук', 'teu'=>'ты', 'tal'=>'таль', 'che'=>'те', 'tam'=>'там', 'tap'=>'тап', 'teo'=>'то', 'tae'=>'тэ', 'cho'=>'то', 'tan'=>'тан', 'chu'=>'ту', 'chi'=>'ти', 'keu'=>'кы', 'kal'=>'каль', 'tak'=>'так', 'ton'=>'тон', 'tol'=>'толь', 'jin'=>'тин', 'jil'=>'тиль', 'jik'=>'тик', 'pan'=>'пан', 'pal'=>'паль', 'jim'=>'тим', 'jip'=>'тип', 'twi'=>'тви', 'toe'=>'тве', 'cha'=>'та', 'jom'=>'том', 'jyo'=>'тё', 'pae'=>'пэ', 'sul'=>'туль', 'dwi'=>'тви', 'deu'=>'ты', 'jeo'=>'то', 'bak'=>'пак', 'dun'=>'тун', 'duk'=>'тук', 'don'=>'тон', 'dol'=>'толь', 'doe'=>'тве', 'gok'=>'кок', 'ban'=>'пан', 'bal'=>'паль', 'bon'=>'пон', 'buk'=>'пук', 'bun'=>'пун', 'gyo'=>'кё', 'bok'=>'пок', 'gye'=>'ке', 'bap'=>'пап', 'bae'=>'пэ', 'beo'=>'по', 'dok'=>'ток', 'gon'=>'кон', 'gyu'=>'кю', 'geu'=>'кы', 'gwa'=>'ква', 'gin'=>'кин', 'gwi'=>'кви', 'gut'=>'кут', 'guk'=>'кук', 'gun'=>'кун', 'goe'=>'кве', 'gul'=>'куль', 'gil'=>'киль', 'gim'=>'ким', 'got'=>'кот', 'dae'=>'тэ', 'gol'=>'коль', 'deo'=>'то', 'dap'=>'тап', 'dam'=>'там', 'got'=>'кот', 'dan'=>'тан', 'dal'=>'таль', 'geo'=>'ко', 'bul'=>'пуль', 'sum'=>'тум', 'swi'=>'тви', 'seu'=>'ты', 'gal'=>'каль', 'gam'=>'кам', 'sun'=>'тун', 'suk'=>'тук', 'gap'=>'кап', 'bin'=>'пин', 'sik'=>'тик', 'sin'=>'тин', 'sso'=>'то', 'ssi'=>'ти', 'gan'=>'кан', 'jan'=>'тан', 'ssa'=>'та', 'gar'=>'кар', 'sil'=>'тиль', 'sim'=>'тим', 'sip'=>'тип', 'gak'=>'как', 'soe'=>'тве', 'san'=>'тан', 'sal'=>'таль', 'sam'=>'там', 'sap'=>'тап', 'sak'=>'так', 'jap'=>'тап', 'bil'=>'пиль', 'bim'=>'пим', 'jae'=>'тэ', 'sat'=>'тат', 'sae'=>'тэ', 'son'=>'тон', 'sol'=>'толь', 'sot'=>'тот', 'sok'=>'ток', 'gat'=>'кат', 'seo'=>'то', 'gae'=>'кэ', 'jam'=>'там', 'jak'=>'так', 'pe'=>'пе', 'ge'=>'ке', 'po'=>'по', 'go'=>'ко', 'pu'=>'пу', 'pa'=>'па', 'pi'=>'пи', 'ti'=>'ти', 'di'=>'ти', 'so'=>'то', 'su'=>'ту', 'se'=>'тe', 'sa'=>'та', 'bi'=>'пи', 'ji'=>'ти', 'ga'=>'ка', 'jo'=>'то', 'je'=>'те', 'ja'=>'та', 'ju'=>'ту', 'si'=>'ти', 'bu'=>'пу', 'bo'=>'по', 'gi'=>'ки', 'da'=>'та', 'te'=>'те', 'to'=>'то', 'tu'=>'ту', 'ta'=>'та', 'ki'=>'ки', 'ba'=>'па', 'du'=>'ту', 'ko'=>'ко', 'do'=>'то', 'gu'=>'ку', 'ss'=>'т', 'ng'=>'н', 'g'=>'к', 'k'=>'к', 'n'=>'н', 'd'=>'т', 't'=>'т', 'r'=>'ль', 'l'=>'ль', 'm'=>'м', 'p'=>'п', 'b'=>'п', 's'=>'т', 'j'=>'т', 'h'=>'х');

$middle=array ('kkwaeng'=>'кквэн', 'myeong'=>'мён', 'hyeong'=>'хён', 'cheung'=>'чхын', 'nyeong'=>'нён', 'cheong'=>'чхон', 'gyeong'=>'гён', 'byeong'=>'бён', 'ryeong'=>'рён', 'pyeong'=>'пхён', 'chung'=>'чхун', 'cheuk'=>'чхык', 'chong'=>'чхон', 'kkeut'=>'ккыт', 'taeng'=>'тхэн', 'ryeom'=>'рём', 'ryeop'=>'рёп', 'ryeol'=>'рёль', 'byeol'=>'бёль', 'ching'=>'чхин', 'ryeon'=>'рён', 'geung'=>'гын', 'raeng'=>'рэн', 'ryang'=>'рян', 'ryeok'=>'рёк', 'cheom'=>'чхом', 'seong'=>'сон', 'jeung'=>'чжын', 'deung'=>'дын', 'ttang'=>'ттaн', 'jeong'=>'чжон', 'neung'=>'нын', 'yeong'=>'ён', 'jaeng'=>'чжэн', 'ssang'=>'ссан', 'seung'=>'сын', 'nyeom'=>'нём', 'nyeon'=>'нён', 'cheok'=>'чхок', 'cheon'=>'чхон', 'cheol'=>'чхоль', 'byeon'=>'бён', 'saeng'=>'сэн', 'chaek'=>'чхэк', 'nyeok'=>'нёк', 'chang'=>'чхан', 'naeng'=>'нэн', 'cheop'=>'чхоп', 'reong'=>'рон', 'gyeop'=>'гёп', 'gyeom'=>'гём', 'gyeol'=>'гёль', 'hyeop'=>'хёп', 'reung'=>'рын', 'myeok'=>'мёк', 'hyeol'=>'хёль', 'hyeom'=>'хём', 'gyeon'=>'гён', 'gyeok'=>'гёк', 'hoeng'=>'хвен', 'myeon'=>'мён', 'hyung'=>'хюн', 'myeol'=>'мёль', 'hwaet'=>'хвэт', 'byeok'=>'бёк', 'hwang'=>'хван', 'ryung'=>'рюн', 'maeng'=>'мэн', 'hyeon'=>'хён', 'goeng'=>'гвен', 'pyeom'=>'пхём', 'hyang'=>'хян', 'haeng'=>'хэн', 'gwang'=>'гван', 'hyeok'=>'хёк', 'ryong'=>'рён', 'pyeon'=>'пхён', 'paeng'=>'пхэн', 'heung'=>'хын', 'song'=>'сон', 'yeok'=>'ёк', 'syeo'=>'сё', 'yeon'=>'ён', 'swae'=>'свэ', 'maek'=>'мэк', 'myeo'=>'мё', 'aeng'=>'эн', 'seup'=>'сып', 'ssae'=>'ссэ', 'meok'=>'мок', 'maen'=>'мэн', 'ssuk'=>'ссук', 'seum'=>'сым', 'yang'=>'ян', 'sing'=>'син', 'sseu'=>'ссы', 'seul'=>'сыль', 'bang'=>'бан', 'baem'=>'бэм', 'bong'=>'бон', 'bung'=>'бун', 'bing'=>'бин', 'beon'=>'бон', 'yeol'=>'ёль', 'byeo'=>'бё', 'beop'=>'боп', 'beom'=>'бом', 'beol'=>'боль', 'ppae'=>'ппэ', 'ppeo'=>'ппо', 'seok'=>'сок', 'seon'=>'сон', 'seol'=>'соль', 'seom'=>'сом', 'mong'=>'мон', 'baek'=>'бэк', 'ppeu'=>'ппы', 'sang'=>'сан', 'saek'=>'сэк', 'seop'=>'соп', 'chan'=>'чхан', 'teum'=>'тхым', 'teuk'=>'тхык', 'tung'=>'тхун', 'pyeo'=>'пхё', 'pung'=>'пхун', 'haek'=>'хэк', 'hang'=>'хан', 'tong'=>'тхон', 'taek'=>'тхэк', 'chim'=>'чхим', 'chil'=>'чхиль', 'chin'=>'чхин', 'chip'=>'чхип', 'kwae'=>'кхвэ', 'tang'=>'тхан', 'keun'=>'кхын', 'heon'=>'хон', 'heom'=>'хом', 'heun'=>'хын', 'heuk'=>'хык', 'hyul'=>'хюль', 'heul'=>'хыль', 'heum'=>'хым', 'huin'=>'хуин', 'heup'=>'хып', 'hwon'=>'хвон', 'hoek'=>'хвек', 'hong'=>'хон', 'hyeo'=>'хё', 'hwak'=>'хвак', 'hwan'=>'хван', 'hwae'=>'хвэ', 'hwal'=>'хваль', 'chik'=>'чхик', 'chum'=>'чхум', 'jeop'=>'чжоп', 'jeom'=>'чжом', 'jeol'=>'чжоль', 'jong'=>'чжон', 'jung'=>'чжун', 'jeul'=>'чжыль', 'jeuk'=>'чжык', 'jeon'=>'чжон', 'jeok'=>'чжок', 'wang'=>'ван', 'yeop'=>'ёп', 'yong'=>'ён', 'yung'=>'юн', 'jang'=>'чжан', 'eung'=>'ын', 'jeum'=>'чжым', 'jeup'=>'чжып', 'choe'=>'чхве', 'chon'=>'чхон', 'chok'=>'чхок', 'chwi'=>'чхви', 'chuk'=>'чхук', 'chul'=>'чхуль', 'chun'=>'чхун', 'cheo'=>'чхо', 'chae'=>'чхэ', 'jjae'=>'ччэ', 'jing'=>'чжин', 'chak'=>'чхак', 'mang'=>'ман', 'cham'=>'чхам', 'chal'=>'чхаль', 'yeom'=>'ём', 'sung'=>'сун', 'nyeo'=>'нё', 'neol'=>'ноль', 'nang'=>'нaн', 'kkwo'=>'ккво', 'tteu'=>'тты', 'ttuk'=>'ттук', 'nong'=>'нoн', 'deuk'=>'дык', 'deul'=>'дыль', 'kkum'=>'ккум', 'gang'=>'ган', 'ryeo'=>'рё', 'rong'=>'рoн', 'geup'=>'гып', 'kkae'=>'ккэ', 'kkok'=>'ккок', 'rang'=>'рaн', 'kkoe'=>'ккве', 'kkot'=>'ккот', 'nwae'=>'нвэ', 'gaek'=>'гэк', 'dang'=>'дан', 'daek'=>'дэк', 'deok'=>'док', 'gwae'=>'гвэ', 'gwal'=>'гваль', 'gwak'=>'гвак', 'gong'=>'гон', 'gwan'=>'гван', 'gyeo'=>'гё', 'geop'=>'гоп', 'dwae'=>'двэ', 'neuk'=>'нык', 'doen'=>'двен', 'dong'=>'дон', 'neum'=>'ным', 'geom'=>'гом', 'geol'=>'голь', 'geon'=>'гон', 'geum'=>'гым', 'ttae'=>'ттэ', 'ryul'=>'рюль', 'gwol'=>'гволь', 'gung'=>'гун', 'ryun'=>'рюн', 'gakk'=>'гакк', 'reuk'=>'рык', 'reun'=>'рын', 'reum'=>'рым', 'gwon'=>'гвон', 'ryuk'=>'рюк', 'gyun'=>'гюн', 'geuk'=>'гык', 'geun'=>'гын', 'geul'=>'гыль', 'gyul'=>'гюль', 'jeo'=>'чжо', 'nil'=>'ниль', 'nim'=>'ним', 'gul'=>'гуль', 'jap'=>'чжап', 'jam'=>'чжам', 'jae'=>'чжэ', 'nui'=>'нуи', 'jok'=>'чжок', 'pik'=>'пхик', 'jon'=>'чжон', 'jol'=>'чжоль', 'jwa'=>'чжва', 'neu'=>'ны', 'pil'=>'пхиль', 'tol'=>'тхоль', 'pip'=>'пхип', 'nik'=>'ник', 'jan'=>'чжан', 'toe'=>'тхве', 'gwi'=>'гви', 'nin'=>'нин', 'har'=>'халь', 'yuk'=>'юк', 'peo'=>'пхо', 'yun'=>'юн', 'yul'=>'юль', 'yut'=>'ют', 'dan'=>'дан', 'wol'=>'воль', 'won'=>'вон', 'pae'=>'пхэ', 'gwa'=>'гва', 'pal'=>'пхаль', 'heo'=>'хо', 'pan'=>'пхан', 'ung'=>'ун', 'hae'=>'хэ', 'eun'=>'ын', 'han'=>'хан', 'hal'=>'халь', 'hak'=>'хак', 'ton'=>'тхон', 'ing'=>'ин', 'mak'=>'мак', 'ham'=>'хам', 'hap'=>'хап', 'eum'=>'ым', 'eul'=>'ыль', 'teu'=>'тхы', 'eup'=>'ып', 'goe'=>'гве', 'twi'=>'тхви', 'jak'=>'чжак', 'jul'=>'чжуль', 'che'=>'чхе', 'pyo'=>'пхё', 'cho'=>'чхо', 'tam'=>'тхам', 'tal'=>'тхаль', 'kki'=>'кки', 'nak'=>'нак', 'nan'=>'нан', 'nae'=>'нэ', 'neo'=>'но', 'tap'=>'тхап', 'nap'=>'нап', 'nal'=>'наль', 'nam'=>'нам', 'tan'=>'тхан', 'tak'=>'тхак', 'keu'=>'кхы', 'gim'=>'гим', 'gil'=>'гиль', 'chi'=>'чхи', 'pok'=>'пхок', 'gin'=>'гин', 'kka'=>'ккa', 'kko'=>'кко', 'chu'=>'чху', 'kku'=>'кку', 'kal'=>'кхаль', 'pye'=>'пхе', 'geu'=>'гы', 'tae'=>'тхэ', 'pum'=>'пхум', 'noe'=>'нве', 'peu'=>'пхы', 'guk'=>'гук', 'gyo'=>'гё', 'jin'=>'чжин', 'jik'=>'чжик', 'nun'=>'нун', 'jeu'=>'чжы', 'juk'=>'чжук', 'joe'=>'чжве', 'jun'=>'чжун', 'nul'=>'нуль', 'jwi'=>'чжви', 'jil'=>'чжиль', 'jim'=>'чжим', 'jjo'=>'ччо', 'non'=>'нон', 'gyu'=>'гю', 'jji'=>'ччи', 'nok'=>'нок', 'cha'=>'чха', 'jja'=>'чча', 'got'=>'гот', 'teo'=>'тхо', 'jip'=>'чжип', 'nol'=>'ноль', 'jyo'=>'чжё', 'jom'=>'чжом', 'gun'=>'гун', 'gon'=>'гон', 'bin'=>'бин', 'bul'=>'буль', 'bun'=>'бун', 'bil'=>'биль', 'bim'=>'бим', 'ppa'=>'ппа', 'ram'=>'рaм', 'buk'=>'бук', 'gat'=>'гат', 'gap'=>'гап', 'rye'=>'ре', 'gam'=>'гам', 'heu'=>'хы', 'bok'=>'бок', 'rae'=>'рэ', 'bon'=>'бон', 'ran'=>'ран', 'rak'=>'рак', 'sat'=>'сат', 'tti'=>'тти', 'sap'=>'сап', 'sae'=>'сэ', 'seo'=>'со', 'tta'=>'ттa', 'ttu'=>'тту', 'sam'=>'сам', 'sal'=>'саль', 'hyu'=>'хю', 'ppu'=>'ппу', 'ppo'=>'ппо', 'ppi'=>'ппи', 'hwi'=>'хви', 'san'=>'сан', 'sak'=>'сак', 'rok'=>'рок', 'ron'=>'рон', 'mok'=>'мок', 'hui'=>'хуи', 'reu'=>'ры', 'mol'=>'моль', 'mot'=>'мот', 'myo'=>'мё', 'moe'=>'мве', 'gak'=>'гак', 'meo'=>'мо', 'him'=>'хим', 'mal'=>'маль', 'man'=>'ман', 'mae'=>'мэ', 'rip'=>'рип', 'rin'=>'рин', 'rim'=>'рим', 'muk'=>'мук', 'mun'=>'мун', 'ryu'=>'рю', 'bae'=>'бэ', 'bap'=>'бап', 'gal'=>'галь', 'beo'=>'бо', 'roe'=>'рве', 'ryo'=>'рё', 'bal'=>'баль', 'ban'=>'бан', 'gar'=>'гар', 'meu'=>'мы', 'mul'=>'муль', 'min'=>'мин', 'mil'=>'миль', 'bak'=>'бак', 'gan'=>'ган', 'hwe'=>'хве', 'tto'=>'тто', 'eol'=>'оль', 'eon'=>'он', 'eok'=>'ок', 'eom'=>'ом', 'eop'=>'оп', 'yeo'=>'ё', 'hon'=>'хон', 'hol'=>'холь', 'hop'=>'хоп', 'aek'=>'эк', 'gae'=>'гэ', 'ang'=>'ан', 'dok'=>'док', 'gye'=>'ге', 'yak'=>'як', 'yan'=>'ян', 'deo'=>'до', 'dae'=>'дэ', 'wae'=>'вэ', 'dam'=>'дам', 'wal'=>'валь', 'got'=>'гот', 'oen'=>'вен', 'dal'=>'даль', 'yok'=>'ёк', 'wan'=>'ван', 'gol'=>'голь', 'hok'=>'хок', 'dap'=>'дап', 'hye'=>'хе', 'gok'=>'гок', 'ong'=>'oн', 'gut'=>'гут', 'hoe'=>'хве', 'hwa'=>'хва', 'sul'=>'суль', 'sun'=>'сун', 'suk'=>'сук', 'sum'=>'сум', 'hyo'=>'хё', 'seu'=>'сы', 'ssi'=>'сси', 'soe'=>'све', 'dwi'=>'дви', 'sok'=>'сок', 'hun'=>'хун', 'son'=>'сон', 'sol'=>'соль', 'deu'=>'ды', 'sot'=>'сот', 'dun'=>'дун', 'swi'=>'сви', 'sim'=>'сим', 'doe'=>'две', 'don'=>'дон', 'dol'=>'доль', 'sso'=>'ссо', 'sil'=>'силь', 'sin'=>'син', 'duk'=>'дук', 'geo'=>'го', 'sik'=>'сик', 'ssa'=>'сса', 'sip'=>'сип', 'lee'=>'ли', 'ge'=>'ге', 'he'=>'хе', 'pe'=>'пхе', 'hu'=>'ху', 'go'=>'го', 'ho'=>'хо', 'gu'=>'гу', 'ha'=>'ха', 'pi'=>'пхи', 'hi'=>'хи', 'pu'=>'пху', 'po'=>'пхо', 'ip'=>'ип', 'al'=>'аль', 'am'=>'ам', 'ap'=>'ап', 'an'=>'ан', 'ak'=>'ак', 'ga'=>'га', 'du'=>'ду', 'si'=>'си', 'ap'=>'ап', 'ae'=>'э', 'ok'=>'ок', 'on'=>'он', 'ol'=>'оль', 'ye'=>'е', 'eo'=>'о', 'ya'=>'я', 'do'=>'до', 'su'=>'су', 'so'=>'со', 'mi'=>'ми', 'ba'=>'ба', 'ru'=>'ру', 'mu'=>'му', 'mo'=>'мо', 'ma'=>'ма', 'ri'=>'ри', 'me'=>'мe', 'ro'=>'рo', 're'=>'рe', 'sa'=>'са', 'di'=>'ди', 'se'=>'сe', 'ra'=>'ра', 'bi'=>'би', 'bo'=>'бо', 'bu'=>'бу', 'pa'=>'пха', 'om'=>'ом', 'ju'=>'чжу', 'nu'=>'ну', 'ji'=>'чжи', 'no'=>'но', 'jo'=>'чжо', 'je'=>'чже', 'im'=>'им', 'ja'=>'чжа', 'ni'=>'ни', 'ne'=>'не', 'na'=>'на', 'to'=>'тхо', 'tu'=>'тху', 'ti'=>'тхи', 'te'=>'тхе', 'ta'=>'тха', 'gi'=>'ги', 'ko'=>'кхо', 'ki'=>'кхи', 'il'=>'иль', 'in'=>'ин', 'ul'=>'уль', 'um'=>'ум', 'wa'=>'ва', 'un'=>'ун', 'uk'=>'ук', 'oe'=>'ве', 'yo'=>'ё', 'wi'=>'ви', 'wo'=>'во', 'ik'=>'ик', 'yu'=>'ю', 'ui'=>'уи', 'eu'=>'ы', 'da'=>'да', 'a'=>'а', 'u'=>'у', 'e'=>'е', 'i'=>'и', 'o'=>'о', 'g'=>'г', 'k'=>'г', 'n'=>'н', 'd'=>'д', 't'=>'д', 'r'=>'р', 'l'=>'р', 'm'=>'м', 'p'=>'б', 'b'=>'б', 's'=>'c', 'j'=>'дж', 'h'=>'х');

	$words=mb_split ('[ \-]',$korean);

	$russian='';

	foreach ($words as $n)
	{
		$w=$n;
		foreach($begin as $i=>$u)
        	$w = preg_replace('/^'.$i.'/si',$u,$w);
		foreach($ending as $i=>$u)
        	$w = preg_replace('/'.$i.'$/si',$u,$w);
		foreach($middle as $i=>$u)
        	$w = preg_replace('/'.$i.'/si',$u,$w);

		if (strlen($n)>1)
		{
			if (preg_match('/([A-Z]{1})/si',mb_substr($n,0,1)) && preg_match('/([a-z\.\:\/]{1})/si',mb_substr($n,1,1))) $w=utf8_ucfirst($w);
			else if (preg_match('/([A-Z]{1})/si',mb_substr($n,0,1)) && preg_match('/([A-Z\.\:\/]{1})/si',mb_substr($n,1,1))) $w=utf8_uppercase($w);

		} else {
			if (preg_match('/([A-ZŌÔ]{1})/si',$n)) $w=utf8_ucfirst($w);
		}


	    $russian.=$w.' ';

	}
	return trim($russian);

}



function translate_chinese ($chinese)
{

	mb_internal_encoding("UTF-8");
	mb_regex_encoding("UTF-8");

$middle=array ('chuang'=>'чуан', 'shuang'=>'шуан', 'zhuang'=>'чжуан', 'chuan'=>'чуань', 'sheng'=>'шэн', 'chuai'=>'чуай', 'xiang'=>'сян', 'zhang'=>'чжан', 'kuang'=>'куан', 'shuan'=>'шуань', 'shuai'=>'шуай', 'chang'=>'чан', 'chong'=>'чун', 'jiong'=>'цзюн', 'huang'=>'хуан', 'zhong'=>'чжун', 'zheng'=>'чжэн', 'guang'=>'гуан', 'qiong'=>'цюн', 'shang'=>'шан', 'zhuan'=>'чжуань', 'qiang'=>'цян', 'zhuai'=>'чжуай', 'jiang'=>'цзян', 'xiong'=>'сюн', 'cheng'=>'чэн', 'liang'=>'лян', 'niang'=>'нян', 'huan'=>'хуань', 'ming'=>'мин', 'huai'=>'хуай', 'xian'=>'сянь', 'zuan'=>'цзуань', 'hong'=>'хун', 'quan'=>'цюань', 'qing'=>'цин', 'meng'=>'мэн', 'neng'=>'нэн', 'jiao'=>'цзяо', 'jian'=>'цзянь', 'qiao'=>'цяо', 'heng'=>'хэн', 'mian'=>'мянь', 'miao'=>'мяо', 'rang'=>'жан', 'geng'=>'гэн', 'gong'=>'гун', 'guai'=>'гуай', 'zhai'=>'чжай', 'sang'=>'сан', 'zhan'=>'чжань', 'gang'=>'ган', 'guan'=>'гуань', 'ying'=>'ин', 'reng'=>'жэн', 'hang'=>'хан', 'nang'=>'нан', 'rong'=>'жун', 'yong'=>'юн', 'ruan'=>'жуань', 'yang'=>'ян', 'jing'=>'цзин', 'xing'=>'син', 'liao'=>'ляо', 'kuai'=>'куай', 'pian'=>'пянь', 'piao'=>'пяо', 'keng'=>'кэн', 'kong'=>'кун', 'kuan'=>'куань', 'lian'=>'лянь', 'lang'=>'лан', 'zang'=>'цзан', 'pang'=>'пан', 'tuan'=>'туань', 'xuan'=>'сюань', 'peng'=>'пэн', 'ling'=>'лин', 'ping'=>'пин', 'juan'=>'цзюань', 'yuan'=>'юань', 'niao'=>'няо', 'zong'=>'цзун', 'nian'=>'нянь', 'leng'=>'лэн', 'mang'=>'ман', 'ning'=>'нин', 'luan'=>'луань', 'zeng'=>'цзэн', 'kang'=>'кан', 'nuan'=>'нуань', 'xiao'=>'сяо', 'nong'=>'нун', 'long'=>'лун', 'qian'=>'цянь', 'weng'=>'вэн', 'shen'=>'шэнь', 'shei'=>'шэй', 'dang'=>'дан', 'chuo'=>'чо', 'bing'=>'бин', 'chui'=>'чуй', 'chun'=>'чунь', 'shao'=>'шао', 'deng'=>'дэн', 'shan'=>'шань', 'ding'=>'дин', 'shai'=>'шай', 'shuo'=>'шо', 'dian'=>'дянь', 'zhua'=>'чжуа', 'teng'=>'тэн', 'chou'=>'чоу', 'chen'=>'чэнь', 'zhuo'=>'чжо', 'cong'=>'цун', 'zhun'=>'чжунь', 'ceng'=>'цэн', 'shui'=>'шуй', 'shun'=>'шунь', 'cang'=>'цан', 'cuan'=>'цуань', 'shua'=>'шуа', 'chao'=>'чао', 'shou'=>'шоу', 'zhao'=>'чжао', 'tang'=>'тан', 'chan'=>'чань', 'zhui'=>'чжуй', 'chai'=>'чай', 'dong'=>'дун', 'diao'=>'дяо', 'tong'=>'тун', 'ngyo'=>'нъё', 'ting'=>'тин', 'wang'=>'ван', 'suan'=>'суань', 'feng'=>'фэн', 'biao'=>'бяо', 'song'=>'сун', 'fang'=>'фан', 'ngyi'=>'нъи', 'ngye'=>'нъе', 'zhei'=>'чжэй', 'zhen'=>'чжэнь', 'zhou'=>'чжоу', 'bang'=>'бан', 'ngya'=>'нъя', 'ngyu'=>'нъю', 'duan'=>'дуань', 'bian'=>'бянь', 'beng'=>'бэн', 'seng'=>'сэн', 'tiao'=>'тяо', 'tian'=>'тянь', 'tan'=>'тань', 'tai'=>'тай', 'nan'=>'нань', 'tou'=>'тоу', 'nao'=>'нао', 'xiu'=>'сю', 'tuo'=>'то', 'nei'=>'нэй', 'tui'=>'туй', 'ten'=>'тэнь', 'xun'=>'сюнь', 'nie'=>'не', 'niu'=>'ню', 'nin'=>'нинь', 'yan'=>'янь', 'tie'=>'те', 'nuo'=>'но', 'tao'=>'тао', 'xue'=>'сюэ', 'tun'=>'тунь', 'nen'=>'нэнь', 'yao'=>'яо', 'xin'=>'синь', 'ren'=>'жэнь', 'rou'=>'жоу', 'wan'=>'вань', 'rui'=>'жуй', 'sui'=>'суй', 'rao'=>'жао', 'xia'=>'ся', 'ran'=>'жань', 'sun'=>'сунь', 'run'=>'жунь', 'sou'=>'соу', 'sao'=>'сао', 'wei'=>'вэй', 'sen'=>'сэнь', 'san'=>'сань', 'sai'=>'сай', 'ruo'=>'жо', 'nai'=>'най', 'wen'=>'вэнь', 'suo'=>'со', 'qun'=>'цюнь', 'pie'=>'пе', 'pin'=>'пинь', 'pou'=>'поу', 'shu'=>'шу', 'pen'=>'пэнь', 'pan'=>'пань', 'pao'=>'пао', 'pei'=>'пэй', 'xie'=>'се', 'shi'=>'ши', 'sha'=>'ша', 'wai'=>'вай', 'que'=>'цюэ', 'qiu'=>'цю', 'qin'=>'цинь', 'qia'=>'ця', 'she'=>'шэ', 'qie'=>'це', 'pai'=>'пай', 'zao'=>'цзао', 'fan'=>'фань', 'eng'=>'эн', 'fei'=>'фэй', 'fen'=>'фэнь', 'fou'=>'фоу', 'zhe'=>'чжэ', 'zhi'=>'чжи', 'duo'=>'до', 'diu'=>'дю', 'die'=>'де', 'dou'=>'доу', 'zhu'=>'чжу', 'dun'=>'дунь', 'dui'=>'дуй', 'gai'=>'гай', 'gan'=>'гань', 'guo'=>'го', 'gun'=>'гунь', 'zuo'=>'цзо', 'hai'=>'хай', 'zun'=>'цзунь', 'han'=>'хань', 'gui'=>'гуй', 'gua'=>'гуа', 'gei'=>'гэй', 'gao'=>'гао', 'gen'=>'гэнь', 'gou'=>'гоу', 'zha'=>'чжа', 'dia'=>'дя', 'dei'=>'дэй', 'ngu'=>'нъу', 'bin'=>'бинь', 'ngo'=>'нъо', 'ngi'=>'нъи', 'cai'=>'цай', 'nge'=>'нъэ', 'bie'=>'бе', 'ben'=>'бэнь', 'ang'=>'ан', 'lee'=>'ли', 'bai'=>'бай', 'ban'=>'бань', 'bei'=>'бэй', 'bao'=>'бао', 'can'=>'цань', 'cao'=>'цао', 'chi'=>'чи', 'che'=>'чэ', 'chu'=>'чу', 'dai'=>'дай', 'dao'=>'дао', 'dan'=>'дань', 'cha'=>'ча', 'cuo'=>'цо', 'cen'=>'цэнь', 'nga'=>'нъа', 'cou'=>'цоу', 'cui'=>'цуй', 'cun'=>'цунь', 'hei'=>'хэй', 'hao'=>'хао', 'lie'=>'ле', 'lia'=>'ля', 'lin'=>'линь', 'liu'=>'лю', 'zai'=>'цзай', 'lou'=>'лоу', 'zan'=>'цзань', 'lei'=>'лэй', 'hen'=>'хэнь', 'kun'=>'кунь', 'lai'=>'лай', 'lan'=>'лань', 'lao'=>'лао', 'yun'=>'юнь', 'lun'=>'лунь', 'mie'=>'ме', 'you'=>'ю', 'min'=>'минь', 'miu'=>'мю', 'yin'=>'инь', 'mou'=>'моу', 'men'=>'мэнь', 'mei'=>'мэй', 'yue'=>'юэ', 'luo'=>'ло', 'mai'=>'май', 'man'=>'мань', 'mao'=>'мао', 'kui'=>'куй', 'kuo'=>'ко', 'jia'=>'цзя', 'zou'=>'цзоу', 'kua'=>'куа', 'jie'=>'цзе', 'zui'=>'цзуй', 'hng'=>'хнг', 'huo'=>'хо', 'hou'=>'хоу', 'hua'=>'хуа', 'hui'=>'хуэй', 'hun'=>'хунь', 'jin'=>'цзинь', 'jiu'=>'цзю', 'zen'=>'цзэнь', 'ken'=>'кэнь', 'kou'=>'коу', 'zei'=>'цзэй', 'kao'=>'као', 'kan'=>'кань', 'jun'=>'цзюнь', 'jue'=>'цзюэ', 'kai'=>'кай', 'iu'=>'ю', 'ye'=>'е', 'yi'=>'и', 'wu'=>'у', 'zh'=>'чж', 'xi'=>'си', 'za'=>'цза', 'zi'=>'цзы', 'xu'=>'сюй', 'ze'=>'цзэ', 'ya'=>'я', 'wa'=>'ва', 'yu'=>'юй', 'zu'=>'цзу', 'wo'=>'во', 'na'=>'на', 'ha'=>'ха', 'he'=>'хэ', 'hm'=>'хм', 'hu'=>'ху', 'gu'=>'гу', 'ge'=>'гэ', 'fo'=>'фо', 'fu'=>'фу', 'ga'=>'га', 'ji'=>'цзи', 'ju'=>'цзюй', 'li'=>'ли', 'tu'=>'ту', 'le'=>'люэ', 'le'=>'лэ', 'la'=>'ла', 'ka'=>'ка', 'ke'=>'кэ', 'ku'=>'ку', 'fa'=>'фа', 'er'=>'эр', 'bo'=>'бо', 'bu'=>'бу', 'ca'=>'ца', 'bi'=>'би', 'ba'=>'ба', 'ai'=>'ай', 'an'=>'ань', 'ao'=>'ао', 'ce'=>'цэ', 'ci'=>'цы', 'du'=>'ду', 'ei'=>'эй', 'en'=>'энь', 'di'=>'ди', 'de'=>'дэ', 'cu'=>'цу', 'ch'=>'ч', 'da'=>'да', 'ma'=>'ма', 'lu'=>'лу', 'qi'=>'ци', 'qu'=>'цюй', 're'=>'жэ', 'pu'=>'пу', 'po'=>'по', 'ou'=>'оу', 'pa'=>'па', 'me'=>'мэ', 'ri'=>'жи', 'ru'=>'жу', 'ta'=>'та', 'te'=>'тэ', 'ti'=>'ти', 'sh'=>'ш', 'su'=>'су', 'sa'=>'са', 'se'=>'сэ', 'si'=>'сы', 'ne'=>'нюэ', 'pi'=>'пи', 'ng'=>'нг', 'mm'=>'мм', 'mo'=>'мо', 'mu'=>'му', 'ne'=>'нэ', 'nu'=>'ну', 'ni'=>'ни', 'mi'=>'ми', 'm'=>'м', 'n'=>'н', 's'=>'с', 'z'=>'цз', 'b'=>'б', 'l'=>'л', 'l'=>'люй', 'w'=>'в', 'c'=>'ц', 't'=>'т', 'x'=>'с', 'g'=>'г', 'j'=>'цз', 'y'=>'й', 'p'=>'п', 'h'=>'х', 'n'=>'нюй', 'f'=>'ф', 'q'=>'ц', 'o'=>'о', 'a'=>'а', 'r'=>'ж', 'e'=>'э', 'k'=>'к', 'd'=>'д', 'u'=>'у');

	//$words=mb_split ('[ \-]',$chinese);
	$words=preg_split ('/[ \-]+/',$chinese);

	$russian='';

	foreach ($words as $n)
	{
		$w=$n;
		foreach($middle as $i=>$u)
        	$w = preg_replace('/'.$i.'/si',$u,$w);

		if (mb_strlen($n)>1)
		{
			if (preg_match('/([A-Z]{1})/si',mb_substr($n,0,1)) && preg_match('/([a-z\.\:\/]{1})/si',mb_substr($n,1,1))) $w=utf8_ucfirst($w);
			else if (preg_match('/([A-Z]{1})/si',mb_substr($n,0,1)) && preg_match('/([A-Z\.\:\/]{1})/si',mb_substr($n,1,1))) $w=utf8_uppercase($w);

		} else {
			if (preg_match('/([A-ZŌÔ]{1})/si',$n)) $w=utf8_ucfirst($w);
		}

	    if (mb_substr($n,-2)=='ng' && mb_substr($w,-2)=='нг') $w=mb_substr($w,0,-2).'н';
	    if (mb_substr($n,-1)=='n' && mb_substr($w,-1)=='н') $w=mb_substr($w,0,-1).'нь';
	    if (mb_substr($n,-2)=='ng' && mb_substr($w,-3)=='ньг') $w=mb_substr($w,0,-1);

	    $russian.=$w.' ';

	}
	return trim($russian);

}



	function nametranslation ($name, $system='kg')
	{

		$english = array ('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'ō', 'ô', 'Ō', 'Ô', 'ū', 'û', 'ā', 'ē');
		$russian = array ('а', 'б', 'ц', 'д', 'е', 'ф', 'г', 'х', 'и', 'ы', 'к', 'л', 'м', 'н', 'о', 'п', 'кв', 'р', 'с', 'т', 'у', 'в', 'в', 'кс', 'й', 'з', 'оу', 'оу', 'оу', 'оу', 'уу', 'уу', 'а', 'е');

		$japanese = array (
		'ыйu',
		'ыйоу',
		'тсук', 'сук',
		'йоу', 'йуу', 'ыуу', 'ыоу', 'цхоу', 'цхуу', 'схоу', 'схуу', 'оу', 'уу', 'цч',
		'зи', 'зе', 'за', 'зу', 'зо',
		'ие', 'ее', 'ае', 'уе', 'ое',
		'цхи', 'цха', 'цху', 'цхо',
		'схи', 'сха', 'сху', 'схо',
		'ыа', 'ыи', 'ыу', 'ыо', 'ыю',
		'сх', 'зх', 'цх', 'тс', 'йа', 'йо', 'йу', 'во',
		'ни', 'не', 'на', 'ну', 'но', 'нб', 'нп', 'нм',
		'ии', 'еи', 'аи', 'уи', 'ои', 'эи', 'юи', 'ёи', 'яи');

		$russian_kg = array (
		'дзю',
		'дзё',
		'цук', 'сук',
		'ё', 'ю', 'дзю', 'дзё', 'чё', 'чу', 'щё', 'щу', 'о', 'у', 'чч',
		'зи', 'зе', 'за', 'зу', 'зо',
		'иэ', 'ээ', 'аэ', 'уэ', 'оэ',
		'чи', 'ча', 'чу', 'чё',
		'щи', 'ща', 'щу', 'щё',
		'дзя', 'дзи', 'дзю','дзё', 'дзю',
		'щ', 'ж', 'ч', 'ц', 'я', 'ё', 'ю', 'о',
		'ни', 'не', 'на', 'ну', 'но',  'нб', 'нп', 'нм',
		'ий', 'ей', 'ай', 'уй', 'ой', 'эй', 'юй', 'ёй', 'яй'
		);

		$russian_hepburn = array (
		'джю',
		'джо',
		'цук', 'сук',
		'ёу', 'юу', 'джуу', 'джоу', 'чоу', 'чуу', 'шоу', 'шуу', 'оу', 'уу', 'чч',
		'зи', 'зе', 'за', 'зу', 'зо',
		'ие', 'ее', 'ае', 'уе', 'ое',
		'чи', 'ча', 'чу', 'чо',
		'ши', 'ша', 'шу', 'шо',
		'джа', 'джи', 'джу','джо', 'джу',
		'ш', 'ж', 'ч', 'ц', 'я', 'ё', 'ю', 'о',
		'ни', 'не', 'на', 'ну', 'но', 'нб', 'нп', 'нм',
		'ии', 'еи', 'аи', 'уи', 'ои', 'эй', 'юй', 'ёй', 'яй'
		);

		$russian_polivanov = array (
		'дзю',
		'дзё',
		'цук', 'сук',
		'ё', 'ю', 'дзю', 'дзё', 'тё', 'тю', 'сё', 'сю', 'о', 'у', 'тт',
		'дзи', 'дзэ', 'дза', 'дзу', 'дзо',
		'иэ', 'ээ', 'аэ', 'уэ', 'оэ',
		'ти', 'тя', 'тю', 'тё',
		'си', 'ся', 'сю', 'сё',
		'дзя', 'дзи', 'дзю','дзё', 'дзю',
		'с', 'ж', 'т', 'ц', 'я', 'ё', 'ю', 'о',
		'ни', 'нэ', 'на', 'ну', 'но', 'мб', 'мп', 'мм',
		'ий', 'эй', 'ай', 'уй', 'ой', 'эй', 'юй', 'ёй', 'яй'
		);

		$names=mb_split ('[ \/\-]{1}',$name);
		$npos=0;
		
		$return='';

		$work=array('Detective'=>'Детектив', 'Inspector'=>'Инспектор', 'Mrs.'=>'Миссис', 'Ms.'=>'Мисс', 'Mr.'=>'Мистер', 'Dr.'=>'Доктор', 'Doctor'=>'Доктор', 'Director'=>'Директор', 'Captain'=>'Капитан', 'Officer'=>'Офицер', 'Madame'=>'Мадам', 'Android'=>'Андроид', 'Voice'=>'Голос', 'Radio'=>'Радио', 'Class'=>'Класс', 'Princess'=>'Принцесса', 'Prince'=>'Принц');

		foreach ($names as $nkey=>$n)
		{
			$translated=$n;

			if (in_array ($n,array_keys($work))) $translated=$work[$n];
			else
			{
				$translated=str_ireplace ($english, $russian, $translated);

				if ($system=='kg') {
						$translated=str_ireplace ($japanese, $russian_kg, $translated, $cnt);
				} else if ($system=='polivanov') $translated=str_ireplace ($japanese, $russian_polivanov, $translated);
						else if ($system=='hepburn') $translated=str_ireplace ($japanese, $russian_hepburn, $translated);

				if (mb_substr($translated,0,1)=='е') $translated='э'.mb_substr($translated,1);
				if (mb_substr($translated,-1)=='х') $translated=mb_substr($translated,0,-1);

				//if ($translated=='ери') echo mb_substr($translated,0,);

				if (strlen($n)>1)
				{
					if (preg_match('/([A-ZŌÔ]{1})/si',mb_substr($n,0,1)) && preg_match('/([a-zāōūûô\.\:\/]{1})/si',mb_substr($n,1,1))) $translated=utf8_ucfirst($translated);
					else if (mb_substr($n,0,1)=='"' && preg_match('/([A-ZŌÔ]{1})/si',mb_substr($n,1,1)) && preg_match('/([a-zāōūûô\.\:\/]{1})/si',mb_substr($n,2,1))) $translated='"'.utf8_ucfirst(mb_substr($translated,1));
					else if (mb_substr($n,0,2)=='("' && preg_match('/([A-ZŌÔ]{1})/si',mb_substr($n,2,1)) && preg_match('/([a-zāōūûô\.\:\/]{1})/si',mb_substr($n,3,1))) $translated='("'.utf8_ucfirst(mb_substr($translated,2));


				} else {
					if (preg_match('/([A-ZŌÔ]{1})/si',$n)) $translated=utf8_ucfirst($translated);
				}

			}

			$npos=$npos+mb_strlen($n);

			// $return.=$translated.' ';
			$return.=$translated.mb_substr($name,$npos,1);

			$npos++;
		}

		$return=str_replace ('йй', 'йи', $return);
		$return=str_replace ('цч', 'чч', $return);

		return trim ($return);

	}


function before_first_str ($text, $str)
{
	if (mb_strpos ($text,$str)!==FALSE)
		return mb_strstr ($text,$str,TRUE);
	else return $text;

}

function before_last_str ($text, $str, $include=FALSE)
{
	if (mb_strstr ($text,$str))
		return ($include?mb_strrchr ($text,$str,true).$str:mb_strrchr ($text,$str,true));
	else return $text;
}

function after_first_str ($text, $str)
{
	if (mb_strpos ($text,$str)!==FALSE)
		return mb_substr(mb_strstr ($text,$str),mb_strlen($str));
	else return $text;

}

function after_last_str ($text, $str, $include=FALSE)
{
	if (mb_stristr ($text,$str))
		return ($include?mb_strrchr ($text,$str):mb_substr(mb_strrchr ($text,$str),mb_strlen($str)));
	else return $text;
}

function print_array($ar) {

 static $count;
 $count = (isset($count)) ? ++$count : 0;

 $colors = array('#FFCB72', '#FFB072', '#FFE972', '#F1FF72',
     '#92FF69', '#6EF6DA', '#72D9FE', '#FFFFFF', '#EEEEEE', '#DDDDDD', '#CCCCCC');

 if ($count > count($colors)) {
 echo "Достигнута максимальная глубина погружения!";
 $count--;
 return;
 }

 if (!is_array($ar)) {
 echo "Passed argument is not an array!<p>";
 return; }

 echo '<table style="border: 1px solid; background-color: '.$colors[$count].'">';
 while(list($k, $v) = each($ar)) {
 echo "<tr><td>$k</td><td>".(!is_array($v)?$v:'')."</td></tr>\n";
 if (is_array($v)) {
 echo "<tr><td> </td><td>";
 print_array($v);
 echo "</td></tr>\n";
 }
 }
 echo "</table>";
 $count--;

}


global $N0, $Ne0, $Ne1, $Ne2, $Ne3, $Ne6;

$N0 = 'ноль';

$Ne0 = array(
             0 => array('','один','два','три','четыре','пять','шесть',
                        'семь','восемь','девять','десять','одиннадцать',
                        'двенадцать','тринадцать','четырнадцать','пятнадцать',
                        'шестнадцать','семнадцать','восемнадцать','девятнадцать'),
             1 => array('','одна','две','три','четыре','пять','шесть',
                        'семь','восемь','девять','десять','одиннадцать',
                        'двенадцать','тринадцать','четырнадцать','пятнадцать',
                        'шестнадцать','семнадцать','восемнадцать','девятнадцать'),
             2 => array('','первого','второго','третьего','четвёртого','пятого','шестого',
                        'седьмого','восьмого','девятого','десятого','одиннадцатого',
                        'двенадцатого','тринадцатого','четырнадцатого','пятнадцатого',
                        'шестнадцатого','семнадцатого','восемнадцатого','девятнадцатого'),
             3 => array('','первой','второй','третьей','четвёртой','пятой','шестой',
                        'седьмой','восьмой','девятой','десятой','одиннадцатой',
                        'двенадцатой','тринадцатой','четырнадцатой','пятнадцатой',
                        'шестнадцатой','семнадцатой','восемнадцатой','девятнадцатой')
             );

$Ne1 = array('','десять','двадцать','тридцать','сорок','пятьдесят',
             'шестьдесят','семьдесят','восемьдесят','девяносто');

$Ne2 = array('','сто','двести','триста','четыреста','пятьсот',
             'шестьсот','семьсот','восемьсот','девятьсот');

$Ne3 = array(1 => 'тысяча', 2 => 'тысячи', 5 => 'тысяч');

$Ne6 = array(1 => 'миллион', 2 => 'миллиона', 5 => 'миллионов');


function written_number($i, $gender=0) {
  global $N0;
  if ( ($i<0) || ($i>=1e9) || !is_int($i) ) {
    return false; // Аргумент должен быть неотрицательным целым числом, не превышающим 1 миллион
  }
  if($i==0) {
    return $N0;
  }
  else {
    return preg_replace( array('/s+/','/\s$/'),
                         array(' ',''),
                         num1e9($i, $gender));
    return num1e9($i, $gender);
  }
}

function num_125($n) {
  /* форма склонения слова, существительное с числительным склоняется
   одним из трех способов: 1 миллион, 2 миллиона, 5 миллионов */
  $n100 = $n % 100;
  $n10 = $n % 10;
  if( ($n100 > 10) && ($n100 < 20) ) {
    return 5;
  }
  elseif( $n10 == 1) {
    return 1;
  }
  elseif( ($n10 >= 2) && ($n10 <= 4) ) {
    return 2;
  }
  else {
    return 5;
  }
}

function num1e9($i, $gender) {
  global $Ne6;
  if($i<1e6) {
    return num1e6($i, $gender);
  }
  else {
    return num1000(intval($i/1e6), false) . ' ' .
      $Ne6[num_125(intval($i/1e6))] . ' ' . num1e6($i%1e6, $gender);
  }
}

function num1e6($i, $gender) {
  global $Ne3;
  if($i<1000) {
    return num1000($i, $gender);
  }
  else {
    return num1000(intval($i/1000), true) . ' ' .
      $Ne3[num_125(intval($i/1000))] . ' ' . num1000($i%1000, $gender);
  }
}

function num1000($i, $gender) {
  global $Ne2;
  if( $i<100) {
    return num100($i, $gender);
  }
  else {
    return $Ne2[intval($i/100)] . (($i%100)?(' '. num100($i%100, $gender)):'');
  }
}

function num100($i, $gender) {
  global $Ne0, $Ne1;
  if ($i<20) {
    return $Ne0[$gender][$i];
  }
  else {
    return $Ne1[intval($i/10)] . (($i%10)?(' ' . $Ne0[$gender][$i%10]):'');
  }
}

function make_links_blank( $text )
{
	return  preg_replace(
	array(
       '/(?(?=<a[^>]*>.+<\/a>)
             (?:<a[^>]*>.+<\/a>)
             |
             ([^="\'])((?:https?|ftp):\/\/[^<> \n\r)]+)
         )/iex',
       '/<a([^>]*)target="?[^"\']+"?/i',
       '/<a([^>]+)>/i'
       ),
     array(
       "stripslashes((strlen('\\2')>0?'\\1<a href=\"\\2\">\\2</a>\\3':'\\0'))",
       '<a\\1',
       '<a\\1 target="_blank">'
       ),
       $text
   );
}

function date_to_timestamp ($old_date, $test=0)
{
	global $date_days;
	
	$old_date=strip_tags($old_date);
	
	$months_eng=array ('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov', 'dec');
	$months_rus=array ('янв','фев','мар','апр','май','июн','июл','авг','сен','окт','ноя', 'дек');
	
	$old_date=preg_replace ('/ \(.+\)/','',$old_date);
	$old_date=preg_replace ('/\(.+\)/','',$old_date);
	$old_date=preg_replace ('/\s{2,}/',' ',$old_date);
	
	$old_date=preg_replace ('/([0-9]+)(th|nd|st|rd) /','\\1 ',$old_date);
	
	$h=0;
	$min=0;
	$s=0;
	
	$d=0;
	$m=0;
	$y=0;
	
	$date=$old_date;
	$date=str_replace (
		array (' года', ' год', ' г.', ' г', '-й ', '-я'), // убираем слово "год" и окончания из "1-й квартал"
		array ('', '', '', '', ' ', ' '),
		$date);
		
	$date=preg_replace ('/([1-4]+) кв/si', '$1кв', $date); // заменяем 1 квартал на 1квартал - для удобства
	
	$date=mb_trim($date);
	
	if ($date=='' || $date=='00.00.0000' || $date=='0000-00-00' || $date=='0000-00-00 00:00:00')
		$timestamp=0;
	
	else
	if (preg_match('/^[0-9]{4}$/si',$date))
		$timestamp=mktime (3, 0, 0, 12, 31, $date);
	else
	if (preg_match('/^([0-9]{1,2})(\.|\/)([0-9]{4})$/si',$date,$dmatch))
		$timestamp=mktime (1, 0, 0, intval($dmatch[1]), $date_days[intval($dmatch[1])-1], $dmatch[3]);
	else
	{	
		$tt=preg_split ('/[ ,]+/',$date);
		if (mb_strpos(end($tt),':')!==FALSE)
		{
			$t=explode (':',end($tt));
			$h=intval($t[0]);
			$min=intval($t[1]);
			$s=(isset($t[2])?intval($t[2]):0);
			$date=mb_strrchr($date,' ',TRUE);
		}
		
		$date=trim($date);
		if (mb_substr($date,-2)==' в') $date=mb_substr($date,0,-2);
		if (mb_substr($date,-1)==',') $date=mb_substr($date,0,-1);
		$date=trim($date);
		
		if (mb_strpos($date,' ')!==FALSE)
		// Значит, текстовая дата типа "4 сентября 2012"
		{
			$dd=preg_split ('/[ ,]+/',$date);
			//print_r($dd);

			if (sizeof($dd)==2 && preg_match('/^[0-9]{4}$/si',$dd[1]))
			{
			
				$y=(int)$dd[1];
				$dd[0]=mb_trim($dd[0]);
				$dd[1]=mb_trim($dd[1]);
				$h=2;
				$min=0;
				$s=0;
				$mt=utf8_lowercase(mb_substr($dd[0],0,3));
				//echo '#'.$mt.'#';
			    switch ($mt)
			    {
			        case 'win':
			        case 'зим':
			        	$m=2;
			        	break;
			        case 'spr':
			        case 'вес':
			        	$m=5;
			        	break;
			        case 'sum':
			        case 'лет':
			        	$m=8;
			        	break;
			        case 'fal':
			        case 'aut':
			        case 'осе':
			        	$m=11;
			        	break;
			        case 'q1':
			        case '1кв':
			        	$m=3;
			        	break;
			        case 'q2':
			        case '2кв':
			        	$m=6;
			        	break;
			        case 'q3':
			        case '3кв':
			        	$m=9;
			        	break;
			        case 'q4':
			        case '4кв':
			        	$m=12;
			        	break;
			    }
			    
				if (in_array ($mt,$months_rus))
				{
					$m=array_search($mt,$months_rus)+1;
					$h=1;
				}
				else
				if (in_array ($mt,$months_eng))
				{
					$m=array_search($mt,$months_eng)+1;
					$h=1;
				}
				else
				if ($mt=='мая')
				{
					$m=5;
					$h=1;
				}
				
				$d=date('t',mktime(0,0,0,$m,1,$y));
				
				//echo $h.$min.$s.$m.$d.$y;
			
			} else
			{
				
				$dd[0]=mb_trim($dd[0]);
				$dd[1]=mb_trim($dd[1]);
				$dd[2]=(isset($dd[2])?mb_trim($dd[2]):'');

				$y=intval($dd[2]);
				if ($y==0) $y=date('Y');
	
				if (preg_match('/^[0-9]+$/',$dd[0]))
				{
					$d=(int)$dd[0];
					$mt=utf8_lowercase(mb_substr($dd[1],0,3));
				} else
				{
					$d=(int)$dd[1];
					$mt=utf8_lowercase(mb_substr($dd[0],0,3));
				}
	
				if (in_array ($mt,$months_rus))
					$m=array_search($mt,$months_rus)+1;
				else
				if (in_array ($mt,$months_eng))
					$m=array_search($mt,$months_eng)+1;
				else
				if ($mt=='мая')
					$m=5;	
				
			}
			


		} else
		if (mb_strpos($date,'.')!==FALSE || mb_strpos($date,'-')!==FALSE || mb_strpos($date,'/')!==FALSE)
		// Значит, цифровая дата типа "04.02.2012" или типа того
		{
			$dd=preg_split ('/[\.\-\/]+/',$date);
			$d=(int)$dd[0];
			$m=(int)$dd[1];
			$y=(int)$dd[2];
			
			if ($d>31)
			{
				$y=$d;
				$d=(int)$dd[2];
			}
			
			if ($y==0) $y=date('Y');
			
			if ($y<30)
				$y=2000+$y;
			else
			if ($y<100)
				$y=1900+$y;

		}

		$timestamp=mktime ($h, $min, $s, $m, $d, $y);
	}
	return $timestamp;	
}


	function xml2array($contents, $get_attributes=1, $priority = 'tag') {
    if(!$contents) return array();

    if(!function_exists('xml_parser_create')) {
        //print "'xml_parser_create()' function not found!";
        return array();
    }

    //Get the XML parser of PHP - PHP must have this module for the parser to work
    $parser = xml_parser_create('');
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, trim($contents), $xml_values);
    xml_parser_free($parser);

    if(!$xml_values) return;//Hmm...

    //Initializations
    $xml_array = array();
    $parents = array();
    $opened_tags = array();
    $arr = array();

    $current = &$xml_array; //Refference

    //Go through the tags.
    $repeated_tag_index = array();//Multiple tags with same name will be turned into an array
    foreach($xml_values as $data) {
        unset($attributes,$value);//Remove existing values, or there will be trouble

        //This command will extract these variables into the foreach scope
        // tag(string), type(string), level(int), attributes(array).
        extract($data);//We could use the array by itself, but this cooler.

        $result = array();
        $attributes_data = array();

        if(isset($value)) {
            if($priority == 'tag') $result = $value;
            else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
        }

        //Set the attributes too.
        if(isset($attributes) and $get_attributes) {
            foreach($attributes as $attr => $val) {
                if($priority == 'tag') $attributes_data[$attr] = $val;
                else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
            }
        }

        //See tag status and do the needed.
        if($type == "open") {//The starting of the tag '<tag>'
            $parent[$level-1] = &$current;
            if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                $current[$tag] = $result;
                if($attributes_data) $current[$tag. '_attr'] = $attributes_data;
                $repeated_tag_index[$tag.'_'.$level] = 1;

                $current = &$current[$tag];

            } else { //There was another element with the same tag name

                if(isset($current[$tag][0])) {//If there is a 0th element it is already an array
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                    $repeated_tag_index[$tag.'_'.$level]++;
                } else {//This section will make the value an array if multiple tags with the same name appear together
                    $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array
                    $repeated_tag_index[$tag.'_'.$level] = 2;

                    if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                        $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                        unset($current[$tag.'_attr']);
                    }

                }
                $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1;
                $current = &$current[$tag][$last_item_index];
            }

        } elseif($type == "complete") { //Tags that ends in 1 line '<tag />'
            //See if the key is already taken.
            if(!isset($current[$tag])) { //New Key
                $current[$tag] = $result;
                $repeated_tag_index[$tag.'_'.$level] = 1;
                if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data;

            } else { //If taken, put all things inside a list(array)
                if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...

                    // ...push the new element into that array.
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;

                    if($priority == 'tag' and $get_attributes and $attributes_data) {
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                    }
                    $repeated_tag_index[$tag.'_'.$level]++;

                } else { //If it is not an array...
                    $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                    $repeated_tag_index[$tag.'_'.$level] = 1;
                    if($priority == 'tag' and $get_attributes) {
                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well

                            $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                            unset($current[$tag.'_attr']);
                        }

                        if($attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                        }
                    }
                    $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken
                }
            }

        } elseif($type == 'close') { //End of tag '</tag>'
            $current = &$parent[$level-1];
        }
    }

    return($xml_array);
}

function remove_tail ($text, $str)
{
	// Убирает подстроку из конца, если она есть. Если нет - оставляет нетронутой

	$len=mb_strlen($str);
	if (mb_substr($text,-$len)==$str)
		return mb_substr($text,0,-$len);
	else
		return $text;
}


function remove_head ($text, $str)
{
	// Убирает подстроку из конца, если она есть. Если нет - оставляет нетронутой

	$len=mb_strlen($str);
	if (mb_substr($text,0,$len)==$str)
		return mb_substr($text,$len);
	else
		return $text;
}


	function num2word ($num, $pad='im')
	{
		// Работает только до 1000!
		if ($pad=='im')
		{
			$wordnum_im=array ('нулевой', 'первый', 'второй', 'третий', 'четвёртый', 'пятый', 'шестой', 'седьмой', 'восьмой', 'девятый', 'десятый', 'одиннадцатый', 'двенадцатый', 'тринадцатый', 'четырнадцатый', 'пятнадцатый', 'шестнадцатый', 'семнадцатый', 'восемнадцатый', 'девятнадцатый', 'двадцатый');

			$wordnum_dec_im=array ('нулевой', 'десятый', 'двадцатый', 'тридцатый', 'сороковой', 'пятидесятый', 'шестидесятый', 'семидесятый', 'восьмидесятый', 'девяностый', 'сотый');

			$wordnum_hundreds_im=array ('нулевой', 'сотый', 'двухсотый', 'трёхсотый', 'четырёхсотый', 'пятисотый', 'шестисотый', 'семисотый', 'восьмисотый', 'девятисотый', 'тысячный');

		}

		$wordnum_dec_prefix=array ('', '', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто', 'сто');

		$wordnum_hundreds_prefix=array ('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот', 'сто');

		$str='';

		if ($num%100==0 && $num>=100)
			return $wordnum_hundreds_im[$num/100];
		else
		if ($num>100)
			$str.=$wordnum_hundreds_prefix[floor($num/100)].' ';

		$num=$num%100;

		if ($num<20)
			$str.=$wordnum_im[$num];
		else
		if ($num%10==0)
			$str.=$wordnum_dec_im[$num/10];
		else
		if ($num>20 && $num<100)
			$str.=$wordnum_dec_prefix[floor($num/10)].' '.$wordnum_im[$num%10];

		return $str;
	}

	function rating_color ($rating)
	{
		if ($rating>=75)
			return '#00AA00';
		else
		if ($rating>=50)
			return '#ff8800';
		else
		if ($rating>=20)
			return '#cc0000';
		else
			return '#000000';
	}


	function clear_name ($original)
	{
		$original_clear=preg_replace('/[^a-zA-Z0-9а-яА-Я\!\? ]+/siU','',str_replace(array('ō','Ō','ū','Ū','&'),array('ou','Ou','uu','Uu',' and '),$original));
		$original_clear=preg_replace('/ +/si',' ',$original_clear);
		return $original_clear;
	}

function mb_wordwrap($str, $width = 75, $break = "\n", $cut = false) {
    $lines = explode($break, $str);
    foreach ($lines as &$line) {
        $line = rtrim($line);
        if (mb_strlen($line) <= $width)
            continue;
        $words = explode(' ', $line);
        $line = '';
        $actual = '';
        foreach ($words as $word) {
            if (mb_strlen($actual.$word) <= $width)
                $actual .= $word.' ';
            else {
                if ($actual != '')
                    $line .= rtrim($actual).$break;
                $actual = $word;
                if ($cut) {
                    while (mb_strlen($actual) > $width) {
                        $line .= mb_substr($actual, 0, $width).$break;
                        $actual = mb_substr($actual, $width);
                    }
                }
                $actual .= ' ';
            }
        }
        $line .= trim($actual);
    }
    return implode($break, $lines);
}




class XmlToArray
{

    var $xml='';

    /**
    * Default Constructor
    * @param $xml = xml data
    * @return none
    */

    function XmlToArray($xml)
    {
       $this->xml = $xml;
    }

    /**
    * _struct_to_array($values, &$i)
    *
    * This is adds the contents of the return xml into the array for easier processing.
    * Recursive, Static
    *
    * @access    private
    * @param    array  $values this is the xml data in an array
    * @param    int    $i  this is the current location in the array
    * @return    Array
    */

    function _struct_to_array($values, &$i)
    {
        $child = array();
        if (isset($values[$i]['value'])) array_push($child, $values[$i]['value']);

        while ($i++ < count($values)) {
            switch ($values[$i]['type']) {
                case 'cdata':
                array_push($child, $values[$i]['value']);
                break;

                case 'complete':
                    $name = $values[$i]['tag'];
                    if(!empty($name)){
                    $child[$name]= (!empty($values[$i]['value'])?$values[$i]['value']:'');
                    if(isset($values[$i]['attributes'])) {
                        $child[$name] = $values[$i]['attributes'];
                    }
                }
              break;

                case 'open':
                    $name = $values[$i]['tag'];
                    $size = isset($child[$name]) ? sizeof($child[$name]) : 0;
                    $child[$name][$size] = $this->_struct_to_array($values, $i);
                break;

                case 'close':
                return $child;
                break;
            }
        }
        return $child;
    }//_struct_to_array


    function createArray()
    {
        $xml    = $this->xml;
        $values = array();
        $index  = array();
        $array  = array();
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parse_into_struct($parser, $xml, $values, $index);
        xml_parser_free($parser);
        $i = 0;
        $name = $values[$i]['tag'];
        $array[$name] = isset($values[$i]['attributes']) ? $values[$i]['attributes'] : '';
        $array[$name] = $this->_struct_to_array($values, $i);
        return $array;
    }//createArray

}



function array_shuffle ($list) {
	if (!is_array($list)) return $list;

	$keys = array_keys($list);
	shuffle($keys);
	$random = array();
	foreach ($keys as $key) {
	$random[$key] = $list[$key];
	}
	return $random;
}


	function notzero ($num, $zero=0)
	{
		if ($num==$zero)
			return '';
		else
			return $num;
	}



/**
 * Formats date to "10 minutes ago" or "Yesterday in 22:10"
 * This algorithm taken from https://github.com/livestreet/livestreet/blob/7a6039b21c326acf03c956772325e1398801c5fe/engine/modules/viewer/plugs/function.date_format.php
 *
 * @param string $date Timestamp to format
 * @param int $maxHours
 * @param int $maxMinutes
 *
 * @return string
 */
function dateAgo($date, $maxHours = 0, $maxMinutes = 59) {
	$dateDay = 'day H:i';
	$dateFormat = 'd F Y, H:i';
	$date = is_numeric($date)
		? $date
		: strtotime($date);
	$current = time();
	$delta = $current - $date;

	if ($delta < 10) {
		return 'Только что';
	}

	$minutes = round(($delta) / 60);
	if ($maxMinutes >0 && $minutes < $maxMinutes) {
		if ($minutes > 0) {
			return declension($minutes, array(
				"{$minutes} минута назад",
				"{$minutes} минуты назад",
				"{$minutes} минут назад"
			));
		}
		else {
			return 'Меньше минуты назад';
		}
	}

	$hours = round(($delta) / 3600);
	if ($maxHours > 0 && $hours < $maxHours) {
		if ($hours > 0) {
			return declension($hours, array(
				"{$hours} час назад",
				"{$hours} часа назад",
				"{$hours} часов назад"
			));
		}
		else {
			return 'Меньше часа назад';
		}
	}

	switch (date('Y-m-d', $date)) {
		case date('Y-m-d'):
			$day = 'Сегодня в';
			break;
		case date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'))):
			$day = 'Вчера в';
			break;
		case date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 1, date('Y'))):
			$day = 'Завтра в';
			break;
		default:
			$day = null;
	}
	if ($day) {
		$format = str_replace("day", preg_replace("#(\w{1})#", '\\\${1}', $day), $dateDay);
		return date($format, $date);
	}

	$m = date('n', $date);
	$month_arr = array('января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря');
	$month = $month_arr[$m - 1];
	$format = preg_replace("~(?<!\\\\)F~U", preg_replace('~(\w{1})~u', '\\\${1}', $month), $dateFormat);

	return date($format, $date);
}


/**
 * Declension of words
 * This algorithm taken from https://github.com/livestreet/livestreet/blob/eca10c0186c8174b774a2125d8af3760e1c34825/engine/modules/viewer/plugs/modifier.declension.php
 *
 * @param int $count
 * @param array|string $forms
 * @param string $lang
 *
 * @return string
 */
function declension($count, $forms, $lang = 'ru') {
	if (!is_array($forms)) {
		$forms = $forms[0] == '[' || $forms[0] == '{'
			? json_decode($forms, true)
			: explode(',', $forms);
	}
	if ($lang == 'ru') {
		$mod100 = $count % 100;
		switch ($count % 10) {
			case 1:
				if ($mod100 == 11) {
					$text = $forms[2];
				}
				else {
					$text = $forms[0];
				}
				break;
			case 2:
			case 3:
			case 4:
				if (($mod100 > 10) && ($mod100 < 20)) {
					$text = $forms[2];
				}
				else {
					$text = $forms[1];
				}
				break;
			case 5:
			case 6:
			case 7:
			case 8:
			case 9:
			case 0:
			default:
				$text = $forms[2];
		}
	}
	else {
		if ($count == 1) {
			$text = $forms[0];
		}
		else {
			$text = $forms[1];
		}
	}

	return $text;
}

/*	---	*/

	function alter_ai ($table, $field='id')
	{
		$ai=intval(faq("SELECT ".$field." FROM ".$table." ORDER BY ".$field." DESC LIMIT 1",$field))+1;
		q ("ALTER TABLE ".$table." AUTO_INCREMENT=".$ai);

	}


	function file_get_contents_curl ($url) {
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_REFERER, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $result;
	}

	function strip_certain_tags ($text, $tags_text)
	{
		$tags=array ();
		$tt=explode ('<',$tags_text);
		foreach ($tt as $t)
		{
			if ($t!='')
			{
				$tags[]=remove_tail($t,'>');
			}
		}
		$text = preg_replace( '/<(' . implode( '|', $tags) . ')(?:[^>]+)?>/s', '', $text);
		$text = preg_replace( '/<\/(' . implode( '|', $tags) . ')>/s', '', $text);
		return $text;
	}

function rss_transform ($text)
{

	$text=str_replace (
		array ('&laquo;', '&raquo;', '<', '>', "'", '"', '&nbsp;', '&'),
		array ('«', '»', '#lt;', '#gt;', '#apos;', '#quot;', ' ', '&amp;'),
		$text
	);

	$text=str_replace (
		array ('#lt;', '#gt;', '#apos;', '#quot;'),
		array ('&lt;', '&gt;', '&apos;', '&quot;'),
		$text
	);

	$text=preg_replace ("/[\n]{2,}/si", "\n\n", $text);

	return $text;
}


function in_arrayi($needle, $haystack) {
    return in_array(strtolower($needle), array_map('strtolower', $haystack));
}

function get_youtube_image ($youtubemain)
{
	// На входе — либо ссылка, либо YoutubeId
	if (mb_stristr($youtubemain, '?v='))
		$youtubemainid=between ($youtubemain, '?v=', '&');
	else
		$youtubemainid=$youtubemain;
	
	$ytsizes=array ('maxresdefault', 'sddefault', 'hqdefault', '0');
	
	
	foreach ($ytsizes as $yts)
	{
		$ytimg='https://img.youtube.com/vi/'.$youtubemainid.'/'.$yts.'.jpg';
		$ytisimg=getimagesize($ytimg);
		
		if (!is_array($ytisimg))
			$ytimg='';
		else
			break;
	}

	foreach ($ytsizes as $yts)
	{
		$ytimg_webp='https://i.ytimg.com/vi_webp/'.$youtubemainid.'/'.$yts.'.webp';
		$ytisimg=getimagesize($ytimg_webp);
		
		if (!is_array($ytisimg))
			$ytimg_webp='';
		else
			break;
	}
	
	return array ('jpg'=>$ytimg, 'webp'=>$ytimg_webp);
}

function rus_date ($timestamp, $showyear='года')
{
	$date_rus=array ('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	$months_rus=array ('январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь');
		
	if ($timestamp!=0)
	{	
		if (date('H:i',$timestamp)=='01:00' && date('t',$timestamp)==date('j',$timestamp))
			$date=utf8_ucfirst($months_rus[date('n',$timestamp)-1]).' '.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='02:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==3)
			$date='1 квартал '.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='02:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==6)
			$date='2 квартал '.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='02:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==9)
			$date='3 квартал '.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='02:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==12)
			$date='4 квартал '.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='02:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==2)
			$date='Зима '.(intval(date('Y',$timestamp))-1).'-'.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='02:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==5)
			$date='Весна '.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='02:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==8)
			$date='Лето '.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='02:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==11)
			$date='Осень '.date('Y',$timestamp).' года';
		else
		if (date('H:i',$timestamp)=='03:00' && date('t',$timestamp)==date('j',$timestamp) && date('m',$timestamp)==12)
			$date=date('Y',$timestamp).' год';
		else
		{
			if ($showyear=='-')
				$date=date ('j', $timestamp).' '.$date_rus[intval(date ('n', $timestamp))-1];
			else
			if ($showyear!='')
				$date=date ('j', $timestamp).' '.$date_rus[intval(date ('n', $timestamp))-1].' '.date ('Y', $timestamp).' '.$showyear;
			else
				$date=date ('j', $timestamp).' '.$date_rus[intval(date ('n', $timestamp))-1].(date ('Y', $timestamp)!=date ('Y')?' '.date ('Y', $timestamp).' года':'');
		}
		return mb_trim($date);
	} else
		return '';
	
}


function addDayToDate($timeStamp, $totalDays=1){
    // You can add as many days as you want. mktime will accumulate to the next month / year.
    $thePHPDate = getdate($timeStamp);
    $thePHPDate['mday'] = $thePHPDate['mday']+$totalDays;
    $timeStamp = mktime($thePHPDate['hours'], $thePHPDate['minutes'], $thePHPDate['seconds'], $thePHPDate['mon'], $thePHPDate['mday'], $thePHPDate['year']);
    return $timeStamp;
}


	
	function isenglish ($name)
	{
		con();
		$words=explode(' ',$name);
		$russian='';
		$b=0;
		foreach ($words as $w)
		{
			$en=fq("SELECT * FROM english_names WHERE english='".addslashes($w)."'");
			if ($en) {
				$russian.=$en['russian'].' ';
				$b++;
			} else $russian.=$w.' ';
			
		}
		return array ('russian'=>trim($russian),'weight'=>$b/sizeof($words));
	
	}
	
	function my_ucfirst($string, $e ='utf-8') { 
        if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string)) { 
            $string = mb_strtolower($string, $e); 
            $upper = mb_strtoupper($string, $e); 
            preg_match('#(.)#us', $upper, $matches); 
            $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e); 
        } else { 
            $string = ucfirst($string); 
        } 
        return $string; 
    } 

		
	function toup ($str, $n=-1)
	{
		$str_eng=array ('а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'р', 'п', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ь', 'ы', 'э', 'ю', 'я', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		$str_rus=array ('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'Р', 'П', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ь', 'Ы', 'Э', 'Ю', 'Я', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		if ($n<0) $str = str_replace($str_eng, $str_rus, $str);
		else 
		if ($n==0) $str=str_replace($str_eng, $str_rus, substr($str,0,1)).substr($str,1);
		return $str;
	}
	



function shorten_header ($tn_header, $len = 0) {
	/*
		if ( !function_exists('htmlspecialchars_decode') )
		{
			function htmlspecialchars_decode($text)
			{
				return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS)));
			}
		}
	*/
	$ss1 = array('&laquo;','&raquo;');
	$ss2 = array('«', '»');
	$tn_header = str_replace($ss1, $ss2, htmlspecialchars_decode($tn_header));
	if ($len > 0 && mb_strlen($tn_header) > $len + 2) {
		$tn_header = mb_substr($tn_header, 0, $len) . '...';
	}

	return $tn_header;
}


function lastIndexOf($string,$item){
	$index=strpos(strrev($string),strrev($item));
	if ($index !== false){
		$index=strlen($string)-strlen($item)-$index;
		return $index;
	} else return -1; }
// === Функция выбирает первую подстроку, которая начинается со $StartSubstring и заканчиваются на $EndSubstring
function SelectSubs($string,$StartSubstring,$EndSubstring){
	if ($StartSubstring){
		$f1=strpos($string,$StartSubstring);
		if ($f1 !== false){
			$f2=strpos($string,$EndSubstring,$f1);
			if ($f2 !== false){
				$string = substr($string,$f1,$f2-$f1+strlen($EndSubstring));	
			}
			else return null;
		}
		else return null;
	}
	return $string;
}
// === Функция выбирает первую подстроку, которая между $StartSubstring и $EndSubstring
function SelectiSubs($string,$StartSubstring,$EndSubstring)
{
	$f1 = strpos($string,$StartSubstring);
	if ($f1 !== false)
	{
		$f2=strpos($string,$EndSubstring,$f1+strlen($StartSubstring));
		if ($f2 !== false)
		{
			$string = substr($string,$f1+strlen($StartSubstring),$f2-$f1-strlen($StartSubstring));	
		} else return null;
	} else return null;
	return $string;
}

// === Функция выбирает все подстроки, которые начинаются со $StartSubstring и заканчиваются на $EndSubstring
function SelectSubsAll($string,$StartSubstring,$EndSubstring,$f2=0){
	$str = null;
	$n = 0;
	while(true)
	{
		$f1=strpos($string,$StartSubstring,$f2);
		if ($f1 !== false){
			$f2=strpos($string,$EndSubstring,$f1);
			if ($f2 !== false){
				$str[$n] = substr($string,$f1,$f2-$f1+strlen($EndSubstring));	
			}
			else return $str;
		}
		else return $str;
		$n++;
	}
}
// === Функция удаляет все подстроки, которые начинаются со $StartSubstring и заканчиваются на $EndSubstring
// == Пример удаляет скрипты: $text = RemoveSubsAll($text,"<script","</script>");
function RemoveSubsAll($string,$StartSubstring,$EndSubstring){
	$p=true;
	while($p){
		if ($StartSubstring){
			$f1=strpos($string,$StartSubstring);
			if ($f1 !== false){
				if ($EndSubstring){
					$f2=strpos($string,$EndSubstring,$f1);
					if ($f2 !== false){
						$string = substr_replace($string,"",$f1,$f2-$f1+strlen($EndSubstring));	
					} else $p = false;
				}
			} else $p = false;
		} else $p = false;
	}
	return $string;
}
// === Функция удаляет первую подстроку, которая начинается со $StartSubstring и заканчиваются на $EndSubstring
function RemoveSubs($string,$StartSubstring,$EndSubstring){
	if ($StartSubstring){
		$f1=strpos($string,$StartSubstring);
		if ($f1 !== false){
			if ($EndSubstring){
				$f2=strpos($string,$EndSubstring,$f1);
				if ($f2 !== false){
					$string = substr_replace($string,"",$f1,$f2-$f1+strlen($EndSubstring));	
				}
			}
		}
	}
	return $string;
}

// === Функция удаляет первую подстроку, которая находится МЕЖДУ $StartSubstring и $EndSubstring
function RemoveiSubs($string,$StartSubstring,$EndSubstring){
	if ($StartSubstring){
		$f1=strpos($string,$StartSubstring);
		if ($f1 !== false){
			if ($EndSubstring){
				$f2=strpos($string,$EndSubstring,$f1);
				if ($f2 !== false){
					$string = substr_replace($string,"",$f1+strlen($StartSubstring),$f2-$f1-strlen($StartSubstring));	
				}
			}
		}
	}
	return $string;
}
//=== Функция заменяет подряд идущие пробелы на один пробел
function ReplaceSpace($text){
	$text = str_replace("\t", " ", $text);
	$p=true;
	while($p){
		if (strpos($text,"  ") === false) $p = false;
		else $text = str_replace("  ", " ", $text);
	}
	$text = trim($text);
	return $text;
}
//=== Функция заменяет подряд идущие "перевод строки" на один "перевод строки"
function ReplaceRN($text){
	$text = str_replace("\r", "", $text);
	$text = str_replace("\n ", "\n", $text);	
	$p=true;
	while($p){
		if (strpos($text,"\n\n") === false) $p = false;
		else $text = str_replace("\n\n", "\n", $text);
	}
	$text = trim($text);
	return $text;
}

//=== Функция ищет позицию HTML-тега с заданным атрибутом начиная с позиции $pos
//== Эта функция нужна для работы функции SelectNode() и RemoveNode()
function NodePos($HTMLtext, $tag, $attribute, $pos){
	$HTMLtext = strtolower($HTMLtext);
	$tag = strtolower($tag);
	if ($attribute !== null) $attribute = strtolower($attribute);
	$p=true;
	$s = $pos;
	while($p){
		$f1 = strpos($HTMLtext,"<$tag", $s);
		if ($f1 !== false){
			if ($attribute!==null){
				$f2  = strpos($HTMLtext,">", $f1);
				if ($f2 !== false) {
					if (strpos(substr($HTMLtext, $f1, $f2-$f1), $attribute) !== false) RETURN $f1; }
			} else RETURN $f1;
		} else $p = false;
		$s = $f1 + 1;
	} RETURN null;
}
//=== Функция делает выборку узла(одного node) с заданным атрибутом из HTML
//== Эта функция нужна для работы функции SelectNodes()
//= пример: $rtext = SelectNode($text, "div", "class=\"text\"");
function SelectNode($HTMLtext, $tag, $attribute=null, $pos=0){
	$LHTMLtext = strtolower($HTMLtext);
	$Ltag = strtolower($tag);
	if ($attribute !== null) $Lattribute = strtolower($attribute);
	$fs = NodePos($HTMLtext, $tag, $attribute, $pos);
	if ($fs!==null){
		$fe = strlen($HTMLtext) - $fs;
		$sp = $fs + 1;
		$p=true;
		$s = 1;
		$e = 0;
		while ($p){
			$f1 = strpos($LHTMLtext,"<$Ltag", $sp);
			$f2 = strpos($LHTMLtext,"</$Ltag", $sp);
			if ($f2 !== false){
				if ($f1 !== false){
					if ($f2<$f1) { $e++; $sp = $f2 + 1; }
					else { $s++; $sp = $f1 + 1; }
				} else { $e++; $sp = $f2 + 1; }
				if ($s === $e) { $fe = $sp + strlen("</$tag>") - 1 - $fs; $p = false; }
			} else $p = false;
		}
		RETURN substr($HTMLtext, $fs, $fe);
	} else RETURN null;
}
//=== Функция делает выборку узлов(массив node) с заданным атрибутом из HTML
function SelectNodes($HTMLtext, $tag, $attribute=null, $pos=0){
	$p=true;
	$nodes = null;
	$n=0;
	while ($p){
		$fs = NodePos($HTMLtext, $tag, $attribute, $pos);
		if ($fs!==null) { $nodes[$n] = SelectNode($HTMLtext, $tag, $attribute, $pos); $n++; $pos = $fs+1; }
		else $p = false;
	}
	RETURN $nodes;
}

//=== Функция делает УДАЛЕНИЕ узла(одного node) с заданным атрибутом из HTML
function RemoveNode($HTMLtext, $tag, $attribute=null, $pos=0){
	$LHTMLtext = strtolower($HTMLtext);
	$Ltag = strtolower($tag);
	if ($attribute !== null) $Lattribute = strtolower($attribute);
	$fs = NodePos($HTMLtext, $tag, $attribute, $pos);
	if ($fs!==null){		
		$fe = strlen($HTMLtext) - $fs;
		$sp = $fs + 1;
		$p=true;
		$s = 1;
		$e = 0;
		while ($p){
			$f1 = strpos($LHTMLtext,"<$Ltag", $sp);
			$f2 = strpos($LHTMLtext,"</$Ltag", $sp);
			if ($f2 !== false){
				if ($f1 !== false){
					if ($f2<$f1) { $e++; $sp = $f2 + 1; }
					else { $s++; $sp = $f1 + 1; }
				} else { $e++; $sp = $f2 + 1; }
				if ($s === $e) { $fe = $sp + strlen("</$tag>") - 1 - $fs; $p = false; }
			} else $p = false;
		}
		RETURN substr_replace($HTMLtext, "", $fs, $fe);
	} else RETURN $HTMLtext;
}
//=== Функция делает УДАЛЕНИЕ ВСЕХ узлов(nodes) с заданным атрибутом из HTML
function RemoveNodes($HTMLtext, $tag, $attribute=null, $pos=0){
	do {
		$HTMLtext = RemoveNode($HTMLtext, $tag, $attribute, $pos);
		$fs = NodePos($HTMLtext, $tag, $attribute, $pos);
	} while ($fs!==null);
	RETURN $HTMLtext;
}

//
function SumOfText($text)
{
  $text = trim($text);
  $slngth = mb_strlen($text, 'UTF-8');
  $subText = $text;
  while(true)
  {
    $f1 = lastIndexOf($subText, "\n");
    if($f1 != -1)
    {
      $summery = trim(substr($text, $f1));
      if(mb_strlen($summery, 'UTF-8') >= 90)
      {
				$subsumm = substr($summery, 0, 15);
				if(is_numeric(stripos($subsumm,"достоинств")) | is_numeric(stripos($subsumm,"плюсы")) | is_numeric(stripos($subsumm,"PS ")) | is_numeric(stripos($subsumm,"PS\r")) | is_numeric(stripos($subsumm,"PS\n")) | is_numeric(stripos($subsumm,"P.S.")) | is_numeric(stripos($subsumm,"PPS")) | is_numeric(stripos($subsumm,"P.P.S.")) | is_numeric(stripos($subsumm,"ПС ")) | is_numeric(stripos($subsumm,"ПС\r")) | is_numeric(stripos($subsumm,"ПС\n")) | is_numeric(stripos($subsumm,"П.С.")) | is_numeric(stripos($subsumm,"ППС")) | is_numeric(stripos($subsumm,"П.П.С.")) | is_numeric(stripos($subsumm,"ЗЫ ")) | is_numeric(stripos($subsumm,"ЗЫ\r")) | is_numeric(stripos($subsumm,"ЗЫ\n")) | is_numeric(stripos($subsumm,"З.Ы.")))
				{
					$text = trim(substr($text, 0, $f1));
          $slngth = mb_strlen($text, 'UTF-8');
          $subText = $text;
				} else
        {
          return $summery;
        }
      } else
      {
        $subText = trim(substr($subText, 0, $f1));
      }
    } else
    {
      return $text;
    }
  }
}

function RusMonthToINT($Month=null) {
  $Month = mb_strtolower($Month,'UTF-8');
	if($Month !== null)
	{
		if($Month == 'января') RETURN "01";
		else if($Month == 'февраля') RETURN "02";
		else if($Month == 'марта') RETURN "03";
		else if($Month == 'Апреля') RETURN "04";
		else if($Month == 'мая') RETURN "05";
		else if($Month == 'июня') RETURN "06";
		else if($Month == 'июля') RETURN "07";
		else if($Month == 'августа') RETURN "08";
		else if($Month == 'сентября') RETURN "09";
		else if($Month == 'октября') RETURN "10";
		else if($Month == 'ноября') RETURN "11";
		else if($Month == 'декабря') RETURN "12";
	}
	RETURN NULL;
}

function DateConverter($datesource)
{
  $datesplit = split(",", $datesource);
  $datesplit = split(" ", $datesplit[0]);
  return $datesplit;
}

	function num_form ($number, $dec=0)
	{
		return number_format ($number, ($number==round($number)?0:$dec), ',', ' '); 
	}	
	
	function normalize_name ($name) {
		$name = strtolower($name);
		$normalized = array();
		
		foreach (preg_split('/([^a-z\'])/', $name, NULL, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY) as $word) {
		    if (preg_match('/^(mc)(.*)$/', $word, $matches)) {
		        $word = $matches[1] . ucfirst($matches[2]);
		    }
		
		    $normalized[] = ucfirst($word);
		}
		
		return implode('', $normalized);
	}

	function str_replace_first ($from, $to, $subject)
	{
	    $from = '/'.preg_quote($from, '/').'/';
	
	    return preg_replace($from, $to, $subject, 1);
	}
	
	
	function send_mail ($from, $to, $header, $message)
	{
		
		
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: <'.$from.">\r\n".'Reply-To: <'.$from.">\r\n".'X-Mailer: PHP/'.phpversion();			
		mail ($to, $header, $message, $headers);
		
	}
	
	 function sanitizeText($text) {
		$text = trim($text);
		$text = strip_tags($text);
		$text = preg_replace('#\){3,}#', ':-)', $text);
		$text = preg_replace('#\({3,}#', ':-(', $text);

		return $text;
	}
	
	
	
	function decode_html ($p, $trim=true) {
	
	 	$p=trim(html_entity_decode($p, ENT_QUOTES | ENT_XML1, 'UTF-8'));		 	
	
	
		$p = preg_replace_callback(
		    '/&#x([a-f0-9]+)/mi', 
		    function ($m) {
		        return chr(hexdec($m[1]));
		    },
			$p
		);

		return $p;
		
	}
	
	
	
	function relative_path_to_root ($path='') {
		
		if ($path=='')
			$pathinfo = pathinfo($_SERVER['PHP_SELF']); 
	    
	    $deep = substr_count($pathinfo['dirname'], "/"); 
	    
	    $path_to_root = ""; 
	    
	    for($i = 1; $i <= $deep; $i++) { 
	    
	        $path_to_root .= "../"; 
	        
	    } 
	    
	    return $path_to_root; 
	} 
	

function generate_password($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;

    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];

    }

    return $code;

}


function remove_dir ($dir)
{
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            rrmdir($file);
        else
            unlink($file);
    }
    rmdir($dir);
}


function closest_day ($day, $timestamp=0)
{
	if ($timestamp==0)
		$timestamp=time();
	
    $day = ucfirst($day);
    if(date('l', time()) == $day)
        return time();
    else if(abs(time()-strtotime('next '.$day, $timestamp)) < abs(time()-strtotime('last '.$day, $timestamp)))
        return strtotime('next '.$day, $timestamp);
    else
        return strtotime('last '.$day, $timestamp);
}


function strip_tags_content ($text, $tags = '', $invert = FALSE) {

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
  $tags = array_unique($tags[1]);
   
  if(is_array($tags) AND count($tags) > 0) {
    if($invert == FALSE) {
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
    }
    else {
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
    }
  }
  elseif($invert == FALSE) {
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
  }
  return $text;
}


function img ($src='', $class='', $is2x=TRUE, $add='webp')
{
	
	$ext=after_last_str ($src, '.');
	$src=before_last_str ($src, '.');
	
	$src1x=$src.'.'.$ext;
	$add1x=$src.'.'.$add;
	
	if ($is2x)
	{
		$add2x=$src.'_2x.'.$add;
		$src2x=$src.'_2x.'.$ext;
	}
	
	return ($add!=''?'<picture><source type="image/'.$add.'" srcset="'.$add2x.' 2x, '.$add1x.' 1x">':'').'<img'.($class!=''?' class="'.$class.'"':'').' srcset="'.$src1x.' 1x, '.$src2x.' 2x" src="'.$src1x.'" loading="lazy">'.($add!=''?'</picture>':'');
	
}




function curl ($url, $data, $headers=array (), $method='GET')
{
	$data_json = json_encode($data);
	
	$headers=array_merge (array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)), $headers);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response  = curl_exec($ch);
	curl_close($ch);
	
	return json_decode ($response, true);

}



function youtube ($action, $query, $channel='')
{
	
	if ($action=='search_video')
	{
		$info=json_decode(file_get_contents_curl("https://youtube.googleapis.com/youtube/v3/search?part=snippet&type=video".($channel!=''?"&channelId=".$channel:"")."&q=".($channel!=''?urlencode('allintitle: "'.$query.'"'):str_replace (array (' - ', ' — '), ' ', $query))."&key=".youtube_apikey), true);
		
		if ($info['pageInfo']['totalResults']>0)
		{

			$result = array ();
			
			foreach ($info['items'] as $item)
				$result[] = array_merge (array ('id'=>$item['id']['videoId'], 'etag'=>$item['etag'], 'kind'=>$item['kind']), $item['snippet']);

			return $result;


			return ($info['items']);
		}
		else
			return false;
	} else
	if ($action=='get_video')
	{
		
		$query = trim(after_first_str(before_first_str(str_replace(array ('https://youtu.be/', '&feature=youtu.be'), array ('https://www.youtube.com/watch?v=', ''), $query),'&'),'?v='));
		
		$info=json_decode(file_get_contents_curl("https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&id=".$query."&key=".youtube_apikey), true);
		
		if ($info['pageInfo']['totalResults']>1)
		{
			$result = array ();
			
			foreach ($info['items'] as $item)
				$result[] = array_merge (array ('id'=>$item['id'], 'etag'=>$item['etag'], 'kind'=>$item['kind']), $item['snippet'], $item['statistics']);

			return $result;
		}
		else
		if ($info['pageInfo']['totalResults']==1)
			return array_merge (array ('id'=>$info['items'][0]['id'], 'etag'=>$info['items'][0]['etag'], 'kind'=>$info['items'][0]['kind']), $info['items'][0]['snippet'], $info['items'][0]['statistics']);
		else
			return false;
	}
}

?>
