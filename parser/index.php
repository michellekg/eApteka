<?php

mb_regex_encoding("UTF-8");
mb_internal_encoding("UTF-8");

include ('../core.php');

con ();

/*
	
$json=json_decode(file_get_contents('products.json'),true);

foreach ($json as $js)
{
	q ("INSERT INTO eapteka_products SET id=".intval($js['ID']).", name='".mres($js['NAME'])."'");
	br();
}

*/

/*
$json=json_decode(file_get_contents('property.json'),true);

foreach ($json as $js)
{
	q ("INSERT INTO eapteka_property SET id=".intval($js['ID']).", name='".mres($js['NAME'])."', code='".mres($js['CODE'])."'");
	br();
}
*/

/*

$json=json_decode(file_get_contents('propertyValues.json'),true);

foreach ($json as $k=>$js)
{
	//if ($k<10)
	//{
		foreach ($js as $p=>$j)
		{
			if ($p!='IBLOCK_ELEMENT_ID')
				q ("INSERT INTO eapteka_propertyvalues SET product_id=".intval($js['IBLOCK_ELEMENT_ID']).", property_id=".intval(after_first_str($p,"PROPERTY_")).", value='".mres($j)."'");
		}
	//}
	
}
*/

$drugs = q ("SELECT * FROM eapteka_products WHERE image='' and id>1107609");

while ($m=mfa($drugs))
{
	$product_id=($key=='home'?$m['product_id']:$m['id']);
	$artikul=faq ("SELECT value FROM eapteka_propertyvalues WHERE product_id=".intval($product_id)." AND property_id=343", "value");
	$image='https://cdn.eapteka.ru/upload/offer_photo/'.mb_substr($artikul,0,3).'/'.mb_substr($artikul, 3).'/1.jpeg';

	if (!@fopen($image, 'r'))
		$image='https://cdn.eapteka.ru/upload/offer_photo/'.mb_substr($artikul,0,3).'/'.mb_substr($artikul, 3).'/1.jpg';

	if (!@fopen($image, 'r'))
		$image='';
			
	q ("UPDATE eapteka_products SET image='".mres($image)."' WHERE id=".intval($m['id'])."");
	
}

?>