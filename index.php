<?php

mb_regex_encoding("UTF-8");
mb_internal_encoding("UTF-8");

include ('core.php');

con ();


$test_query='Пропанорм, 2 раза в день по 1 таблетке 1 год';

$types = array (
	'таблетки' => array ('таблетка', 'таблеток'),
	'уколы' => array ('укол', 'уколов'),
	'капсулы' => array ('капсула', 'капсул'),
	'капли' => array ('капля', 'капель'),
	'драже' => array ('драже', 'драже'),
	'пилюли' => array ('пилюля', 'пилюль'),
	'свечи' => array ('свеча', 'свечей'),
	'вбрызги' => array ('вбрызг', 'вбрызгов'),
	'впрыски' => array ('впрыск', 'вбрызгов'),
	'ампулы' => array ('ампула', 'ампул'),
	'ложки' => array ('ложка', 'ложек'),
	'саше' => array ('саше', 'саше'),
	'инъекции' => array ('инъекция', 'инъекций'),
);


$vars = array (
	'action',
	'search',
	'name',
	'id',
	'product_id',
	'dosage',
	'num',
	'type',
	'times',
	'period',
	'count',
	'howlong',
	'howlongtype',
	'tags_text',
	'product_vendorcode',
	'tohome',
	'tobuy',
	'save',
	'delete',
	'tags_text',
	'take_from',
	'expiration',
	'takein',
);

foreach ($vars as $v)
	$$v=req($v);

$take_from=date_to_timestamp($take_from);
$expiration=date_to_timestamp($expiration);

if ($tags_text!='')
{
	
	if (!is_array($system))
		$system=array ();
	
	$tagst=explode (',', $tags_text);
	
	q ("DELETE FROM eapteka_home_tags WHERE product_id=".intval($product_id));

	$tagts=array ();
	
	foreach ($tagst as $tagt)
	{
		$tagt=trim($tagt);
		
		if ($tagt!='')
		{

			$tt=fas ("eapteka_tags WHERE name='".mres($tagt)."'");
			if (!$tt)
			{
				q ("INSERT INTO eapteka_tags SET name='".mres($tagt)."', codename='".mres(nametocode($tagt))."'");
				$tagid=insert_id();
			} else
			{
				$tagid=$tt['id'];
			}
		}
		
		if (!in_array($tagid, $tagts))
		{
			$tagts[]=$tagid;
			q ("INSERT INTO eapteka_home_tags SET product_id=".intval($product_id).", tag_id=".intval($tagid)."");
		}
	}
	
}

if ($save && $action=='edit' && $id!='')
{
	q ("UPDATE eapteka_home SET name='".mres($name)."', product_id=".intval($product_id).", product_vendorcode=".intval($product_vendorcode).", dosage='".mres($dosage)."', period='".mres($period)."', num=".intval($num).", type=".intval($type).", times=".intval($times).", count=".intval($count).", take_from=".intval($take_from).", expiration=".intval($expiration).", takein=".intval($takein).", howlong=".intval($howlong).", howlongtype=".intval($howlongtype)." WHERE id=".intval($id)."");
	
	header ('Location: /');

}

if ($delete && $action=='edit' && $id!='')
{
	q ("DELETE FROM eapteka_home WHERE id=".intval($id)."");
	
	header ('Location: /');

}

if ($name!='' && ($tohome || $tobuy))
{
	
	$test=fq("SELECT * FROM eapteka_home WHERE name='".mres($name)."' AND product_id=".intval($product_id)." AND status=".($tobuy?1:0)."");
	
	if (!$test)
		q ("INSERT INTO eapteka_home SET name='".mres($name)."', product_id=".intval($product_id).", product_vendorcode=".intval($product_vendorcode).", dosage='".mres($dosage)."', period='".mres($period)."', num=".intval($num).", type=".intval($type).", times=".intval($times).", count=".intval($count).", take_from=".intval($take_from).", expiration=".intval($expiration).", takein=".intval($takein).", howlong=".intval($howlong).", howlongtype=".intval($howlongtype).", status=".($tobuy?1:0).", timestamp=".mktime());
	else
		q ("UPDATE eapteka_home SET num=num+".intval($num)." WHERE name='".mres($name)."' AND product_id=".intval($product_id)." AND status=".($tobuy?1:0)."");
	
}
	
?><head>
<title>Домашняя аптечка</title>
<meta http-equiv="content-Type" content="text/html; charset=UTF-8">
<link rel="apple-touch-icon" sizes="57x57" href="https://cdn.eapteka.ru/include/icon/apple-icon-57x57.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="apple-touch-icon" sizes="60x60" href="https://cdn.eapteka.ru/include/icon/apple-icon-60x60.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="apple-touch-icon" sizes="72x72" href="https://cdn.eapteka.ru/include/icon/apple-icon-72x72.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="apple-touch-icon" sizes="76x76" href="https://cdn.eapteka.ru/include/icon/apple-icon-76x76.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="apple-touch-icon" sizes="114x114" href="https://cdn.eapteka.ru/include/icon/apple-icon-114x114.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="apple-touch-icon" sizes="120x120" href="https://cdn.eapteka.ru/include/icon/apple-icon-120x120.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="apple-touch-icon" sizes="144x144" href="https://cdn.eapteka.ru/include/icon/apple-icon-144x144.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="apple-touch-icon" sizes="152x152" href="https://cdn.eapteka.ru/include/icon/apple-icon-152x152.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="apple-touch-icon" sizes="180x180" href="https://cdn.eapteka.ru/include/icon/apple-icon-180x180.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="icon" type="image/png" sizes="192x192" href="https://cdn.eapteka.ru/include/icon/android-icon-192x192.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="icon" type="image/png" sizes="32x32" href="https://cdn.eapteka.ru/include/icon/favicon-32x32.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="icon" type="image/png" sizes="96x96" href="https://cdn.eapteka.ru/include/icon/favicon-96x96.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="icon" type="image/png" sizes="16x16" href="https://cdn.eapteka.ru/include/icon/favicon-16x16.png?v=20.11.1&amp;_cvc=1622209430">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="https://cdn.eapteka.ru/include/icon/apple-icon-144x144.png?v=20.11.1&amp;_cvc=1622209430">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="/css/main.css?v=<?=time()?>">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body style="margin: 20px;">
<div id="scrolltop" style="display: none;">&nbsp;</div>

<h1>Домашняя аптечка</h1>

<?php
	
	if ($action=='edit' && $id!='')
	{
		
		$d=fq("SELECT * FROM eapteka_home WHERE id=".intval($id)."");
		
		echo '<a href="/" style="text-decoration: none;">← Назад</a><form method="post">
		<div style="margin: 20px auto 7px auto;  width: 100%; clear: both;">'.
		drug_forms ($d).
		'
		</div>
		</form>';

		
	} else
	{
	
		echo '<form method="post">
		<div class="input-group">
		<!--span class="input-group-addon" id="addon_search">&#x1F50E;</span-->
		<input type="text" name="search" id="search" autofocus="autofocus" class="form-control" placeholder="Найти или добавить" aria-describedby="addon_search">
		</div>
		<span onclick="$(\'#drug_form\').toggle();" class="dotted darkgrey">Ввести вручную</span> <span onclick="$(\'#search\').val(\''.$test_query.'\'); $(\'#search\').click()" class="dotted grey">пропанорм</span>
		
		
		<div style="margin: 20px auto 7px auto;  width: 100%; clear: both;">'.
		
		drug_forms ().
		
		'		
		</div>
		
		</form>';
		
		
	echo '	
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active btn-sm" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Аптечка</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link btn-sm" id="pills-lists-tab" data-bs-toggle="pill" data-bs-target="#pills-lists" type="button" role="tab" aria-controls="pills-lists" aria-selected="false">Списки</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link btn-sm" id="pills-suggestions-tab" data-bs-toggle="pill" data-bs-target="#pills-suggestions" type="button" role="tab" aria-controls="pills-suggestions" aria-selected="false">Подборки</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
';
		
		echo show_drugs();
		
		echo '
		</div>
		  <div class="tab-pane fade" id="pills-lists" role="tabpanel" aria-labelledby="pills-lists-tab">';
		  
		$tagsql=q("SELECT * FROM eapteka_tags ORDER BY id ASC");
		
		while ($a=mfa ($tagsql))
		{
			echo '<button type="button" id="tab_'.$a['id'].'" class="btn btn-'.($a['id']==1?'secondary':'light').' btn-sm" onclick="show_drugs('.$a['id'].')">'.$a['name'].'</button> ';
			
		}
		
		
		echo '
		<div id="forajax" style="padding-top: 20px;">'.show_drugs(1).'</div>
		
		</div>
  <div class="tab-pane fade" id="pills-suggestions" role="tabpanel" aria-labelledby="pills-suggestions-tab">';
  
		$tagsql=q("SELECT * FROM eapteka_selections ORDER BY id ASC");
		
		while ($a=mfa ($tagsql))
		{
			echo '<button type="button" id="selection_'.$a['id'].'" class="btn btn-warning" onclick="show_selection('.$a['id'].')">'.$a['name'].'</button> ';
			
		}
  
  
  echo '
  
  <div id="forselection" style="padding-top: 20px;"></div>
  
  
  </div>
</div>';

	
	}
	

?>


<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/js/jquery.auto-complete.min.js"></script> 
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
	
	$(document).click(function() {
	    //$(".line").removeClass('active');
	    //$(".addinfo").hide();
	});
		
   function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
    
    function show_drugs (tag_id)
    {
	    $('#forajax').html('<img src="/i/loading.gif">');

	    $.ajax({url: '/useractions.php', data: ({
	    		'action': 'show_drugs',
	    		'tag_id': tag_id
	    	}),	dataType: 'json', type: 'POST' }).done(function(data) {
	    	if (data['status']=='success')
	    	{
		    	$('[id*=tab_]').removeClass('btn-secondary').addClass('btn-light');
		    	$('#tab_' + tag_id).removeClass('btn-light').addClass('btn-secondary');
	    		$('#forajax').html(data['html']);
	    	}
	    	else
	    	{
	    		console.log ('fail');
	    	}
	    }).fail(function() { console.log ('Ошибка вызова функции'); });
    }
    
    
    function show_selection (sel_id)
    {
	    $('#forselection').html('<img src="/i/loading.gif">');

	    $.ajax({url: '/useractions.php', data: ({
	    		'action': 'show_selection',
	    		'sel_id': sel_id
	    	}),	dataType: 'json', type: 'POST' }).done(function(data) {
	    	if (data['status']=='success')
	    	{
		    	$('[id*=selection_]').removeClass('btn-secondary').addClass('btn-light');
		    	$('#selection_' + sel_id).removeClass('btn-light').addClass('btn-secondary');
	    		$('#forselection').html(data['html']);
	    	}
	    	else
	    	{
	    		console.log ('fail');
	    	}
	    }).fail(function() { console.log ('Ошибка вызова функции'); });
    }
    
    
    function select_line (el)
    {
	    $(".line").removeClass('active');
	    $(".addinfo").hide();
	    $(el).addClass('active');
	    $(el).find('.addinfo').show();

    }
    
	var xhr;
	
	/*
	$('#search').autoComplete({
		minChars: 2,
	    source: function(term, response){
	        try { xhr.abort(); } catch(e){}
	        xhr = $.getJSON('useractions.php?action=search', { name: term }, function(data){ response(data); });
	    },
	    renderItem: function (item, search){
	        search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
	        var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
	        
	        if (item['id']==0)
	        	return '<div class="autocomplete-suggestion" style="font-weight: bold;">' + item['name'] + '</div>';
	        else
				return '<div class="autocomplete-suggestion' + (item['home']==1?' home':'') + '" data-id="' + item['id'] + '" data-vendorcode="' + item['vendorcode'] + '" data-name="' + item['name'] + '" data-expiration="' + item['expiration'] + '" data-dosage="' + item['dosage'] + '" data-num="' + item['num'] + '" data-times="' + item['times'] + '" data-count="' + item['count'] + '" data-period="' + item['period'] + '" data-howlong="' + item['howlong'] + '" data-howlongtype="' + item['howlongtype'] + '">' + (item['image']!=''?'<img src="' + item['image'] + '" height="30"> ':'') + (item['home']==1?item['name']:item['fullname']) + '<span class="darkgrey" style="display: block;">' + (item['dosage']!=''?item['dosage']:'') + (item['dosage']!='' && item['num']!=0?', ':'') +(item['num']!=0?item['num'] + ' шт.':'') + '</span></div>';
	    },
	    onSelect: function(e, term, item){
		    e.preventDefault();
		    $('#drug_form').show();
		    $('#product_id').val(item.data('id'));
		    $('#product_vendorcode').val(item.data('vendorcode'));
		    $('#name').val(item.data('name'));
		    $('#dosage').val(item.data('dosage'));
		    $('#num').val(item.data('num'));
		    $('#times').val(item.data('times'));
		    $('#count').val(item.data('count'));
		    $('#period').val(item.data('period'));
		    $('#howlong').val(item.data('howlong'));
		    $('#howlongtype').val(item.data('howlongtype'));
		    $('#expiration').val(item.data('expiration'));
		    
		    if (item.data('times')!='' || item.data('howlong')!='' || item.data('howlongtype')!='')
		    {
		    	$('#takein').click();
		    }

	    }
	});
	
	*/
	
 $( "#search" )
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "useractions.php?action=search&", {
            term: request.term
          }, response );
        },
        search: function() {
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function(event, ui) {
        if (ui.item.id==0) {
            //
            //  skip disabled items
            //
            let data = $(this).data('ui-autocomplete');
            $(data.menu.active).find('div.ui-state-active').removeClass('ui-state-active'); // remove active class

            if (event.originalEvent.key === 'ArrowDown') {
                let liBefore = $(data.menu.active).prev(); // li before key pressing
                let nextLi = data.menu.active;
                if (!$(nextLi).is(':last-child')) {
                    while ($(nextLi).hasClass('ui-state-disabled')) {
                        // search first not disabled item
                        nextLi = $(nextLi).next();
                    }
                    if (nextLi.length === 0) {
                        // not found
                        nextLi = liBefore;
                    }
                } else {
                    // last item
                    nextLi = liBefore;
                }

                // setting of active item in jquery-ui autocomplete
                data.menu.active = nextLi;
                $(nextLi).find('div').addClass('ui-state-active');
            } else {
                if (event.originalEvent.key === 'ArrowUp') {
                    let liBefore = $(data.menu.active).next(); // li before key pressing
                    let prevLi = data.menu.active;
                    if (!$(prevLi).is(':first-child')) {
                        while ($(prevLi).hasClass('ui-state-disabled')) {
                            // search first not disabled item
                            prevLi = $(prevLi).prev();
                        }
                        if (prevLi.length === 0) {
                            // not found
                            prevLi = liBefore;
                        }
                    } else {
                        // first item
                        prevLi = liBefore;
                    }

                    // setting of active item in jquery-ui autocomplete
                    data.menu.active = prevLi;
                    $(prevLi).find('div').addClass('ui-state-active');
                }
            }
        }

        return false;
    },
        select: function( event, ui ) {
          /*var terms = split( this.value );
          terms.pop();
          terms.push( ui.item.value );
          terms.push( "" );
          this.value = terms.join( ", " );
          */
		    $('#drug_form').show();
		    $('#product_id').val(ui.item.id);
		    $('#product_vendorcode').val(ui.item.vendorcode);
		    $('#name').val(ui.item.name);
		    $('#dosage').val(ui.item.dosage);
		    $('#num').val(ui.item.num);
		    $('#times').val(ui.item.times);
		    $('#count').val(ui.item.count);
		    $('#period').val(ui.item.period);
		    $('#howlong').val(ui.item.howlong);
		    $('#howlongtype').val(ui.item.howlongtype);
		    $('#expiration').val(ui.item.expiration);
		    
		    if (ui.item.times!='' || ui.item.howlong!='' || ui.item.howlongtype!='')
		    {
		    	$('#takein').click();
		    }
          
          return false;
        }
      }).autocomplete( "instance" )._renderItem = function( ul, item ) {

		if (item['id']==0)
		{
	    	return $('<li class="ui-state-disabled">'+item.name+'</li>').appendTo(ul);
	
	
	/*			'<div class="autocomplete-suggestion" style="font-weight: bold;">' + item['name'] + '</div>'*/
		}
	
		else
		{
	      return $( "<li>" )
	        .append (
				'<div class="autocomplete-suggestion' + (item['home']==1?' home':'') + '" data-id="' + item['id'] + '" data-vendorcode="' + item['vendorcode'] + '" data-name="' + item['name'] + '" data-expiration="' + item['expiration'] + '" data-dosage="' + item['dosage'] + '" data-num="' + item['num'] + '" data-times="' + item['times'] + '" data-count="' + item['count'] + '" data-period="' + item['period'] + '" data-howlong="' + item['howlong'] + '" data-howlongtype="' + item['howlongtype'] + '">' + (item['image']!=''?'<img src="' + item['image'] + '" height="30"> ':'') + (item['home']==1?item['name']:item['fullname']) + '<span class="darkgrey" style="display: block;">' + (item['dosage']!=''?item['dosage']:'') + (item['dosage']!='' && item['num']!=0?', ':'') +(item['num']!=0?item['num'] + ' шт.':'') + '</span></div>')
	        .appendTo( ul );
	    }
    };
	
	
 $( "#tags_text" )
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "useractions.php?action=search_tags&", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          terms.pop();
          terms.push( ui.item.value );
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });


$(document).ready(function()
{
	$('#scrolltop').click(function(){$('html, body').animate({scrollTop:0}, 0); $('#name').focus(); return false;});

	$('#newgame').bind('keypress', function(e) {
		var code = e.keyCode || e.which;
		 if(code == 19 || code==160) { //Enter keycode
		 	e.preventDefault();
		 	$('#search_wos').click();
		 }
	});
	
	
	search.addEventListener('keydown', function(e) {
	if(e.keyCode == 13 && e.metaKey) {
		e.preventDefault();
		$('#search_wos').click();
	}
});

}
);

$(window).scroll(function()
	{if ($(this).scrollTop() > 400) {$('#scrolltop:hidden').stop(true, true).show();}
	else {$('#scrolltop').stop(true, true).hide();}}
);
	
</script>
</body>