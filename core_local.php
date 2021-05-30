<?php
	
		
	$types = array (
		'таблетки' => array ('таблетка', 'таблеток'),
		'уколы' => array ('укол', 'уколов'),
		'капсулы' => array ('капсула', 'капсул'),
		'капли' => array ('капля', 'капель'),
		'драже' => array ('драже', 'драже'),
		'пилюли' => array ('пилюля', 'пилюль'),
		'свечи' => array ('свеча', 'свечей'),
		'вбрызги' => array ('вбрызг', 'вбрызгов'),
		'ампулы' => array ('ампул', 'ампул'),
		'ложки' => array ('ложка', 'ложек'),
		'саше' => array ('саше', 'саше'),
		'инъекции' => array ('инъекция', 'инъекций'),
	);
	
	$howlongtypes = array (
		'1' => array ('день', 'дня', 'дней', 1),
		'2' => array ('неделю', 'недели', 'недель', 7),
		'3' => array ('месяц', 'месяца', 'месяцев', 30),
		'4' => array ('год', 'года', 'лет', 365),
	);

	function show_drug ($d)
	{
		global $howlongtypes;
		$prod=fq("SELECT * FROM eapteka_products WHERE id=".intval($d['product_id']));
		$image=$prod['image'];

		if ($image=='')
			$image='/i/drug.jpg';
			
		$totake=($d['count']*$d['times']*$d['howlong']*$howlongtypes[$d['howlongtype']][3]);
		
		$num=faq ("SELECT value FROM eapteka_propertyvalues WHERE product_id=".intval($d['product_id'])." AND property_id=540", "value");
		
		if ($d['count']*$d['times']!=0)
			$daysleft=floor($d['num']/($d['count']*$d['times']));
		else
			$daysleft=0;
			
		$tobuy=ceil(($totake-$d['num'])/$num);
		
		$type='шт.';
			
		return '<div class="line" onclick="select_line (this)">
		<span class="image"><img src="'.$image.'"></span>
		<span class="text">
			'.$d['name'].($d['dosage']!=''?' ('.$d['dosage'].')':'').($d['num']!=0?' — '.$d['num'].' шт.':'').
		($d['status']==1?' <a href="https://www.eapteka.ru/goods/id'.$d['product_vendorcode'].'/" target="_blank">&#128722;</a>':'').
		($d['take_from']!=0?
			'<div class="small">По '.$d['count'].' '.$type.' '.$d['times'].' раза в '.$d['period'].($d['howlongtype']==5?' — пожизненно':($d['howlongtype']!=0?' — '.$d['howlong'].' '.ending ($d['howlong'], $howlongtypes[$d['howlongtype']][0], $howlongtypes[$d['howlongtype']][1], $howlongtypes[$d['howlongtype']][2]):'')).'</div>':
			'').
		($tobuy>0 && $d['take_from']!=0 && $d['count']*$d['times']!=0?
			($daysleft>3?
			'<div class="orange small">Хватит на '.$daysleft.' дней. Советуем <a href="https://www.eapteka.ru/goods/id'.$d['product_vendorcode'].'/" target="_blank" class="dotted orange">докупить '.$tobuy.' пач'.ending ($tobuy, 'ку', 'ки', 'ек').'</a>.</div>'
			:
			'<div class="red small">Заканчивается, хватит на '.$daysleft.' дней. Советуем <a href="https://www.eapteka.ru/goods/id'.$d['product_vendorcode'].'/" target="_blank" class="dotted red">докупить '.$tobuy.' пач'.ending ($tobuy, 'ку', 'ки', 'ек').'</a>.</div>'
			)
		:'').
		($d['expiration']!=0 && $d['expiration']<time()+86400*14?
			'<div class="'.($d['expiration']<time()?'red':($d['expiration']<time()+86400*14?'orange':'darkgrey')).' small">Срок годности'.($d['expiration']<time()?' истёк':($d['expiration']<time()+86400*14?' истекает':'')).': '.rus_date($d['expiration']).'</div>':
			'').
		
		'<div class="addinfo">'.
		($d['expiration']!=0 && $d['expiration']>=time()+86400*14?
			'<div class="darkgrey small">Срок годности: '.rus_date($d['expiration']).'</div>':
		'').

		'<br>
		<button type="button" class="btn btn-light"><a href="?action=edit&id='.$d['id'].'" class="name">Редактировать</a></button>
		</div>'.
		
		'</span></div>';
	}

	function echo_drug ($d)
	{
		global $howlongtypes;
		$image=faq ("SELECT image FROM eapteka_products WHERE id=".intval($d['product_id'])."", 'image');

		if ($image=='')
			$image='/i/drug.jpg';
			
		echo '<div class="line">
		<span class="image"><img src="'.$image.'"></span>
		<span class="text">
			<a href="?action=edit&id='.$d['id'].'">'.$d['name'].'</a>'.($d['dosage']!=''?' ('.$d['dosage'].')':'').($d['num']!=0?' — '.$d['num'].' шт.':'').
		($d['status']==1?' <a href="https://www.eapteka.ru/goods/id'.$d['product_vendorcode'].'/" target="_blank">&#128722;</a>':'').
		($d['take_from']!=0?
			'<div class="small">Принимать по '.$d['count'].' шт. '.$d['times'].' раза в '.$d['period'].($d['howlongtype']==5?' — пожизненно':($d['howlongtype']!=0?' — '.$d['howlong'].' '.ending ($d['howlong'], $howlongtypes[$d['howlongtype']][0], $howlongtypes[$d['howlongtype']][1], $howlongtypes[$d['howlongtype']][2]):'')).'</div>':
			'').
		($d['expiration']!=0?
			'<div class="'.($d['expiration']<time()?'red':($d['expiration']<time()+86400*7?'orange':'darkgrey')).' small">Срок годности'.($d['expiration']<time()?' истёк':($d['expiration']<time()+86400*7?' истекает':'')).': '.rus_date($d['expiration']).'</div>':
			'').
		
		'</span></div>';
	}
	
	
	function form ($id, $value='', $label='', $type='text', $placeholder='', $prefix='', $suffix='')
	{
		return ($label!=''?'<label for="'.$id.'">'.$label.'</label>':'').'<div class="input-group">'.($prefix!=''?' <span class="input-group-addon" id="basic_addon_'.$id.'">'.$prefix.'</span>':'').'<input style="margin-bottom: 10px;" type="'.$type.'" name="'.$id.'" id="'.$id.'" value="'.$value.'" class="form-control" placeholder="'.$placeholder.'"'.($prefix!=''?' aria-describedby="basic_addon_'.$id.'">'.$prefix.'</span>':'').'></div>';
	}

	function drug_forms ($d=array ())
	{
		$tags_list='';
		
		$tags=q("SELECT * FROM eapteka_tags ORDER BY name ASC");
		while ($t=mfa ($tags))
		{
			$tags_list.='
		        <li onclick="$(\'#tags_text\').val($(\'#tags_text\').val() + \''.$t['name'].', \')">'.$t['name'].'</li>';

		}
		
		$mytags_list='';
		
		$tags=q("SELECT * FROM eapteka_home_tags WHERE product_id=".intval($d['product_id'])." ORDER BY tag_id ASC");

		while ($t=mfa ($tags))
		{
			$tagname=faq("SELECT name FROM eapteka_tags WHERE id=".intval($t['tag_id']),"name");
			$mytags_list.=$tagname.', ';
		}
		
		$mytags_list=remove_tail ($mytags_list, ', ');
		
		
		return '
		<div id="drug_form"'.(sizeof($d)>0?'':' style="display: none;"').'>

<input type="hidden" name="product_id" id="product_id" value="'.$d['product_id'].'"><input type="hidden" name="product_vendorcode" id="product_vendorcode" value="'.$d['product_vendorcode'].'">'.
form ('name', $d['name'], 'Название').
form ('dosage', $d['dosage'], 'Доза').
form ('num', $d['num'], 'Количество').
/*form ('tags_text', $d['num'], 'Списки').*/
'<label for="tags_text">Списки</label>
<div class="input-group"><input style="margin-bottom: 10px;" type="text" name="tags_text" id="tags_text" value="'.(sizeof($d)>0?$mytags_list:'основной').'" class="form-control ui-autocomplete-input" placeholder="" autocomplete="off">

<div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">&nbsp;</button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
'.
    $tags_list.'
    
  </ul>
</div>
</div>
'.
form ('expiration', rus_date($d['expiration']), 'Срок годности', 'date').

'
	<div class="form-check">
		<input class="form-check-input" name="takein" type="checkbox" value="1" id="takein" onclick="$(\'#take\').toggle();"'.($d['takein']==1?' checked':'').'>
		<label class="form-check-label" style="color: #1A64B5;" for="takein">Принимаю</label>
	</div>
	<div id="take"'.($d['takein']==0?' style="display: none;"':'').'>'.
	form ('take_from', ($d['take_from']!=0?date ('Y-m-d', $d['take_from']):''), 'Начать приём', 'date').
	'<span class="blue dotted" onclick="$(\'[name=take_from]\').val(\''. date ('Y-m-d', strtotime('today')).'\')">сегодня</span>, <span class="blue dotted" onclick="$(\'[name=take_from]\').val(\''.date ('Y-m-d', strtotime('tomorrow')).'\')">завтра</span>, <span class="blue dotted" onclick="$(\'[name=take_from]\').val(\''.date ('Y-m-d', strtotime('next monday')).'\')">с понедельника</span><br><br>'.
	/*form ('count', rus_date($d['count']), 'Количество').*/
	'Принимать: <input type="text" name="count" id="count" style="width: 25px;" value="'.$d['count'].'"> шт. <input type="text" name="times" id="times" style="width:25px;" value="'.$d['times'].'"> раз в <input type="text" name="period" id="period" style="width: 50px;" value="'.$d['period'].'"> в течение <input type="text" name="howlong" id="howlong" style="width: 50px;" value="'.$d['howlong'].'"> <select name="howlongtype" id="howlongtype" style="width: 100px;"><option value="1"'.($d['howlongtype']==1?' selected':'').'>день</option><option value="2"'.($d['howlongtype']==2?' selected':'').'>неделя</option><option value="3"'.($d['howlongtype']==3?' selected':'').'>месяц</option><option value="4"'.($d['howlongtype']==4?' selected':'').'>год</option><option value="5"'.($d['howlongtype']==5?' selected':'').'>пожизненно</option></select>
	
	</div>
	
	'.(sizeof($d)>0?'<br><input TYPE="submit" value="Сохранить" name="save" class="btn btn-sm btn-success"> <input TYPE="submit" value="Удалить" name="delete" class="btn btn-sm btn-danger" onclick="return confirm(\'Точно-точно удалить?\');">':'<input TYPE="submit" value="В домашнюю аптечку" name="tohome" class="btn btn-sm btn-success"> <input TYPE="submit" value="Надо купить" name="tobuy" class="btn btn-sm btn-primary">').'
	
	</div>
	';
	
	}
	
	
	function show_drugs ($tag_id='', $sort='')
	{
		$text='';
		
		if ($tag_id!='')
			$sel="SELECT * FROM eapteka_home AS t1 INNER JOIN eapteka_home_tags AS t2 ON t1.product_id = t2.product_id WHERE t2.tag_id=".$tag_id." AND ";
		else
			$sel="SELECT * FROM eapteka_home WHERE ";
			
		
		$drugs = q ($sel."status=1 ORDER BY timestamp DESC");
		
		if (num_rows($drugs)>0)
		{
			$text.='<h4>Нужно купить</h4>';
			
			while ($d=mfa ($drugs))
				$text.=show_drug ($d);

		}
		
		$drugs = q ($sel."takein=1 AND status=0 ORDER BY take_from DESC, name DESC");

		
		if (num_rows($drugs)>0)
		{
			$text.='<h4>Принимаю</h4>';
			
			while ($d=mfa ($drugs))
				$text.=show_drug ($d);
	
		}
	
		
		$drugs_cnt = faq ("SELECT COUNT(*) as cnt FROM eapteka_home WHERE status=0 AND takein=0 ORDER BY name ASC", "cnt");
		
		if ($drugs_cnt>0)
		{
			$text.='<h4>Есть в аптечке</h4>';
			
			$drugs = q ($sel."status=0 AND takein=0 AND expiration<".(time()+86400*7)." AND expiration!=0 ORDER BY expiration ASC, name ASC");

			while ($d=mfa ($drugs))
				$text.=show_drug ($d);

			$drugs = q ($sel."status=0 AND takein=0 AND (expiration>=".(time()+86400*7)." OR expiration=0) ORDER BY name ASC");

			while ($d=mfa ($drugs))
				$text.=show_drug ($d);
	
		}
		
		return $text;
		
	}
	
	
	function show_selection ($sel_id='', $sort='')
	{
		$text='';
		
		$drugs = q ("SELECT * FROM eapteka_products AS t1 INNER JOIN eapteka_selections_products AS t2 ON t1.id = t2.product_id WHERE t2.selection_id=".$sel_id." ORDER BY name ASC");
		
		
		if (num_rows($drugs)>0)
		{
			while ($d=mfa ($drugs))
			{
				$d['status']=1;
				$text.=show_drug ($d);
			}
		}
		
		return $text;
		
	}

?>