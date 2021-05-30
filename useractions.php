<?php

	include ('../../core.php');

	$action=req('action');

	con ();

	
	if ($action=='search')
	{
		
		$query = $_GET["term"];
		
		$ar=array();

		$name=trim(before_first_str ($query, ','));
		
		$plan=trim(after_first_str ($query, ','));
		
		if ($plan!='')
		{		
			$plans=preg_split ('/[,;\.]/siU', $plan);
			
			$times='';
			$period='';
			$count='';
			$howlong='';
			$howlongtype='';
			
			foreach ($plans as $pl)
			{
			
				if (preg_match ('/([0-9]+)[\s]+(раз|р\/|р\.)/siU', $pl, $matches) && $times=='')
					$times=$matches[1];
					
				if (preg_match ('/в[\s]+(день|месяц|недел)/siU', $pl, $matches) && $period=='')
					$period=$matches[1];
			
				if (preg_match ('/([0-9]+)[\s]+(т\.|таб|кап|впрыс|вбрыз)/siU', $pl, $matches) && $count=='')
					$count=$matches[1];
			
				if (preg_match ('/([0-9]+)[\s]+(мес|ден|дне|нед|год|лет)/siU', $pl, $matches) && $howlong=='')
				{
					$howlong=$matches[1];
					
					$types=array (
						'ден' => 1,
						'дне' => 1,
						'нед' => 2,
						'мес' => 3,
						'год' => 4,
						'лет' => 4,
					);
					
					$howlongtype=$types[$matches[2]];
				}
				
				if (mb_stristr($pl, 'всегда') || mb_stristr($pl, 'жизнь') || mb_stristr($pl, 'пожизнен') || mb_stristr($pl, 'постоян'))
					$howlongtype=5;
					
				if ($count=='')
					$count=1;
			}
		}

		$sqls=array (
			'home'=>"SELECT * FROM eapteka_home WHERE name LIKE '%".mres($name)."%' AND status=0",
			'ea'=>"SELECT * FROM eapteka_products WHERE name LIKE '%".mres($name)."%' LIMIT 10",
			);
			
				
			foreach ($sqls as $key=>$sql)
			{
				
				
				$drugs = q ($sql);
				
				if (num_rows ($drugs)>0)
				{
					$ar[]=array ('id'=>0, 'name'=>($key=='home'?'В домашней аптечке':'В «еАптеке»'));

					while ($m=mfa($drugs))
					{
						$product_id=($key=='home'?$m['product_id']:$m['id']);
						$artikul=faq ("SELECT value FROM eapteka_propertyvalues WHERE product_id=".intval($product_id)." AND property_id=343", "value");
						//$image='https://cdn.eapteka.ru/upload/offer_photo/'.mb_substr($artikul,0,3).'/'.mb_substr($artikul, 3).'/1.jpeg';
						
						
						$image=($key=='home'?faq("SELECT image FROM eapteka_products WHERE id=".intval($m['product_id']),"image"):$m['image']);
						if ($image=='')
							$image='/i/drug.jpg';
						
						if ($key=='home')
						{
							$dosage=$m['dosage'];
							$num=$m['num'];
						} else
						{
						
							$dosage=faq ("SELECT value FROM eapteka_propertyvalues WHERE product_id=".intval($product_id)." AND property_id=541", "value");
							$num=faq ("SELECT value FROM eapteka_propertyvalues WHERE product_id=".intval($product_id)." AND property_id=540", "value");
							$type=faq ("SELECT value FROM eapteka_propertyvalues WHERE product_id=".intval($product_id)." AND property_id=542", "value");
						}
						//if (!@fopen($image, 'r'))
						//	$image='https://cdn.eapteka.ru/upload/offer_photo/'.mb_substr($artikul,0,3).'/'.mb_substr($artikul, 3).'/1.jpg';
						
						$ar[]=array ('id'=>$product_id, 'vendorcode'=>$artikul, 'name'=>trim(before_first_str($m['name'],',')), 'fullname'=>$m['name'], 'dosage'=>$dosage, 'num'=>$num, 'type'=>$type, 'image'=>$image, 'plan'=>$plan, 'times'=>$times, 'period'=>$period, 'count'=>$count, 'howlong'=>$howlong, 'howlongtype'=>$howlongtype, 'expiration'=>'22 апреля 2022 г.', 'home'=>($key=='home'?1:0));
					}
				}
			
			}
					
		echo json_encode($ar);
	} else
		
	if ($action=='search_tags')
	{
		$param=req ('term');
		
		$ar=array();

		$tags = q("SELECT * FROM eapteka_tags WHERE name LIKE '%".mres($param)."%' ORDER BY cnt DESC LIMIT 10");
	
		while ($m=mfa($tags))
		{
			$ar[]=array ('id'=>$m['codename'], 'value'=>$m['name']);
		}
		
		echo json_encode($ar);
	} else
	
	if ($action=='show_drugs')
	{
		$tag_id=req ('tag_id');
		echo json_encode(array ('status'=>'success', 'html'=>show_drugs($tag_id)));
	}
	
	else
	
	if ($action=='show_selection')
	{
		$sel_id=req ('sel_id');
		echo json_encode(array ('status'=>'success', 'html'=>show_selection($sel_id)));
	}
	
?>