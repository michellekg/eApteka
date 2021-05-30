ie = (document.all)? true : false;
nn4 = (document.layers)? true : false;
nn5 = (parseInt(navigator.appVersion)>=5)? true : false;
opera = (document.appName == "Opera" && parseInt(navigator.appVersion)>=4)? true : false;

w = "window.innerWidth";
h = "Math.round(window.innerHeight/2-100)+window.pageYOffset";

function show_social (news_id)
{
	if ($('#share_div_'+news_id).html()=='')
		$('#share_div_'+news_id).load('useractions.php?action=show_social_buttons&news_id='+news_id);
	$('#share_div_'+news_id).slideToggle('fast');
}

function swap_image (element, first, second)
{
	if (element.src!=element.src.replace(first,second))
		element.src=element.src.replace(first,second);
	else
		element.src=element.src.replace(second,first);
}


function fuckit(name)
{
if (name.substr(0,4).toLowerCase()=='the ') name=name.substr(4);
if (name.substr(0,2).toLowerCase()=='a ') name=name.substr(2);
namenew='';
for (i=0;i<name.length;i++)
{
if ((name.substr(i,1)!=' ')&&(name.substr(i,1)!=':')&&(name.substr(i,1)!='-')&&(name.substr(i,1)!='.')&&(name.substr(i,1)!='!')&&(name.substr(i,1)!='?')&&(name.substr(i,1)!='&')&&(name.substr(i,1)!="'")) namenew=namenew.concat(name.substr(i,1));
}
return namenew.toLowerCase();
}

function toggle_taglist (id, name)
{
	$('#hidden_' + name + '_' + id).toggle();
	if ($('#hider_' + name + '_' + id).text()==' ««')
		$('#hider_' + name + '_' + id).text(' »»');
	else
	if ($('#hider_' + name + '_' + id).text()==' »»')
		$('#hider_' + name + '_' + id).text(' ««');
}

function lowerit(name, namerus, nameoriginal)
{

	if (nameoriginal!==undefined && nameoriginal!='')
		name=nameoriginal;
	
	var strange=new Array ('ū','ó','é','Ō','ô','Ô','é','&#xE9;','Á','É','ō');
	var normal=new Array ('uu','o','e','ou','ou','ou','e','e','A','E','ou');
	
	for (var i=0; i<strange.length; i++) {
    	name = name.replace(strange[i], normal[i]);
  	} 

	name=name.toLowerCase();
	
	if (name=='') 
	{
		name=namerus.toLowerCase();;
		var rus=new Array ('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я');
		var eng=new Array ('a','b','v','g','d','e','e','zh','z','i','j','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','','y','','e','ju','ja');
		for (i=0;i<33;i++)
		{
			r=name.search(rus[i]);
			while (r>-1)
			{
				name=name.replace (rus[i], eng[i]);
				r=name.search(rus[i]);
			}
				
		}
	}
	
	if (name.substr(0,4)=='the ') name=name.substr(4);
	if (name.substr(0,2)=='a ') name=name.substr(2);
	if (name.substr(0,3)=='an ') name=name.substr(3);
	
	namenew='';
	
	for (i=0;i<name.length;i++)
	{
		if (((name.substr(i,1)>='a')&&(name.substr(i,1)<='z'))||
		    ((name.substr(i,1)>='0')&&(name.substr(i,1)<='9'))) namenew=namenew.concat(name.substr(i,1));
	}
	
	return namenew;
	
}


function needtolower(name,namerus,code)
{
if (code=='') return lowerit(name,namerus); else return code;
}

function onOff(obj){
 obj.contentEditable =
  (obj.isContentEditable)
   ? false
   : true;
 }

function fall(num,pl)
{
if (!a.opera)
{
a.clip (0,554,num,0);
num+=pl;
if ((num>=0)&&(num<=250)) setTimeout("fall("+num+","+pl+")", 50);
if (num<=0) a.hide();
} else a.hide();
}

function onoff(name){
if ((name=='menu3end')||(name=='menu4end')||(name=='menu7end')) h=3; else h=18;
if (document.images)
{
 if (document.images[name].height==h) {document.images[name].height=0; /*document.images[name].width=78;*/}
 else {document.images[name].height=h; /*document.images[name].width=78;*/}
}
}
function scrollit()
 {for (I=100; I>=1; I--)
  {self.scroll(1,I*5)}}

function off(name){
if (document.images) {document.images[name].height=0; document.images[name].width=78;}
}


function change_days()
{
if (document.date_dmy.date_m.value==02)
{
document.date_dmy.date_d.options[30]=null;
document.date_dmy.date_d.options[29]=null;
// Код для високосного года
//if (document.date_dmy.date_y.value=='2000') document.date_dmy.date_d.options[28]=null;
}
else {
document.date_dmy.date_d.options[29]=new Option ('30');
document.date_dmy.date_d.options[28]=new Option ('29');
if ((document.date_dmy.date_m.value==04)||(document.date_dmy.date_m.value==06)||(document.date_dmy.date_m.value==09)||(document.date_dmy.date_m.value==11)) document.date_dmy.date_d.options[30]=null;
if ((document.date_dmy.date_m.value==01)||(document.date_dmy.date_m.value==03)||(document.date_dmy.date_m.value==05)||(document.date_dmy.date_m.value==07)||(document.date_dmy.date_m.value==08)||(document.date_dmy.date_m.value==10)||(document.date_dmy.date_m.value==12)) document.date_dmy.date_d.options[30]=new Option ('31');
}
}


function Copy1()
{
 document.forma.text_field.createTextRange().execCommand("Copy");
 document.forma.text_field.focus();
}

function show_hint(message,width,show)
{
 if (navigator.appVersion != "Netscape")
 {
    html = "<TABLE border=0 cellspacing=0 bgcolor=#000000 cellpadding=1 width=\"" + width + "\"><TR><TD align=center valign=center>\n";
    html +="<TABLE border=0 cellspacing=1 bgcolor=#E1EBE0 cellpadding=8 width=100%>\n";
    html +="<TR><TD align=left class=basic>" + message + "</TD></TR>"; 
    html +="<TABLE>"; 
    html +="</TR></TD><TABLE>"; 
    if (show == 1 && message != '')
    {
      document.all('hint').innerHTML = html;
      document.all('hint').style.width = width;
      h = document.body.scrollWidth  - document.all('hint').offsetWidth; 
      v = document.body.scrollHeight - document.all('hint').offsetHeight; 
      posx1 = document.body.scrollLeft + event.clientX + 10; 
      posy1 = document.body.scrollTop + event.clientY + 30; 
      posx2 = document.body.scrollLeft + event.clientX - document.all('hint').offsetWidth - 5; 
      posy2 = document.body.scrollTop + event.clientY - document.all('hint').offsetHeight - 5; 

      if (posx1<h)
        document.all('hint').style.posLeft = posx1;
      else
        document.all('hint').style.posLeft = posx2;
      if (posy1<v)
        document.all('hint').style.posTop = posy1;
      else
        document.all('hint').style.posTop = posy2;

      document.all('hint').style.visibility = "visible";
    }
    else
    {
      document.all('hint').style.visibility = "hidden";
      document.all('hint').style.posTop = 0;
      document.all('hint').style.posLeft = 0;
    }
 }
}

function move_hint()
{
 if (navigator.appVersion != "Netscape")
 {
  h = document.body.scrollWidth  - document.all('hint').offsetWidth; 
  v = document.body.scrollHeight - document.all('hint').offsetHeight; 
  posx1 = document.body.scrollLeft   + event.clientX + 10; 
  posy1 = document.body.scrollTop    + event.clientY + 30; 
  posx2 = document.body.scrollLeft   + event.clientX - document.all('hint').offsetWidth  - 5; 
  posy2 = document.body.scrollTop    + event.clientY - document.all('hint').offsetHeight - 5; 
  if (posx1<h) 
     document.all('hint').style.posLeft = posx1;
  else 
     document.all('hint').style.posLeft = posx2;
  if (posy1<v) 
     document.all('hint').style.posTop = posy1;
  else 
     document.all('hint').style.posTop = posy2;
 }
}


function togShow(id) {

  if (document.all[id].style.visibility=="visible")
  {
  document.all[id].style.visibility="hidden";
  document.all[id].style.position="absolute";
  }else{
  if ((id=="Overview")&&(document.all["Antimat"].style.visibility=="visible"))
    {document.all["Antimat"].style.visibility="hidden";document.all["Antimat"].style.position="absolute";} else
  if ((id=="Antimat")&&(document.all["Overview"].style.visibility=="visible"))
    {document.all["Overview"].style.visibility="hidden";document.all["Overview"].style.position="absolute";}
  document.all[id].style.visibility="visible";
  document.all[id].style.position="relative";
  }

}

   function showhide(showhideelement, changetextelement, text1, text2)
   {
      if (showhideelement == null) return;
      var n = showhideelement.className.toLowerCase(); 
      showhideelement.className = (n=="hidden") ? "shown" : "hidden";
      textelement=document.getElementById(changetextelement);
      if (textelement != null)
      {
	   	  text=textelement.childNodes[0].innerHTML;
		  if (text!="")
      	  {
      	     if (text.search(text1)!=-1) document.getElementById(changetextelement).childNodes[0].innerHTML = text.replace (text1, text2);
      		     else document.getElementById(changetextelement).childNodes[0].innerHTML = text.replace (text2, text1);
      	     document.getElementById(changetextelement).childNodes[0].blur();
   	  	  }
   	  
   	  }
   }

   function showhidemass(showhideelementplus, start, end, changetextelement, text1, text2)
   {
   	  for (i=start; i<=end; i++)
   	  {
   	  	  showhideelement=document.getElementById(showhideelementplus+""+i);
   	  	  if (showhideelement == null) return;
	      var n = showhideelement.className.toLowerCase(); 
	      showhideelement.className = (n=="hidden") ? "shown" : "hidden";
	      textelement=document.getElementById(changetextelement);
	      if (textelement != null)
	      {
		   	  text=textelement.childNodes[0].innerHTML;
			  if (text!="")
	      	  {
	      	     if (text.search(text1)!=-1) document.getElementById(changetextelement).childNodes[0].innerHTML = text.replace (text1, text2);
	      		     else document.getElementById(changetextelement).childNodes[0].innerHTML = text.replace (text2, text1);
	      	     document.getElementById(changetextelement).childNodes[0].blur();
	   	  	  }
	   	  
	   	  }
   	  }
   }

   function showhideplus(showhideelementplus, changetextelement, text1, text2)
   {
   	  	  showhideelement=document.getElementById(showhideelementplus);
   	  	  if (showhideelement == null) return;
	      var n = showhideelement.className.toLowerCase(); 
	      showhideelement.className = (n=="hidden") ? "shown" : "hidden";

   }
   
   function change (showhideelement1,showhideelement2)
   {
      if (showhideelement1 == null || showhideelement2 == null) return;
      var n1 = showhideelement1.className.toLowerCase();
      var n2 = showhideelement2.className.toLowerCase();
      showhideelement1.className = (n1=="hidden") ? "shown" : "hidden";
      showhideelement2.className = (n2=="hidden") ? "shown" : "hidden";
   }
   
   
   
	function txt_cb(val) {
		document.getElementById("readersgrade").innerHTML=Math.round(val) + '%';
	}

	function txt_cb_wait(val) {
		document.getElementById("readerswaiting").innerHTML=Math.round(val) + '%';
	}
	
	function grade (id, section, gr, c_member, tochange)
	{
		x_grade(id, section, gr, c_member, 'grade', txt_cb);
		if (section=="movies")
			document.getElementById(tochange).innerHTML="Ваша оценка: " + gr + " из 10.";
		else if (section=="anime") document.getElementById(tochange).innerHTML="Ваша оценка: " + gr + " из 10.";
		else if (section=="trailers") document.getElementById(tochange).innerHTML="Ваша оценка: " + gr + " из 10.";
	}

	function wait (id, section, gr, c_member, tochange)
	{
		x_grade(id, section, gr, c_member, 'wait', txt_cb_wait);
		if (section=="movies")
			document.getElementById(tochange).innerHTML="Ваш рейтинг ожидания: " + gr + " из 10.";
		else if (section=="anime") document.getElementById(tochange).innerHTML="Ваш рейтинг ожидания: " + gr + " из 10.";
		else if (section=="trailers") document.getElementById(tochange).innerHTML="Ваш рейтинг ожидания: " + gr + " из 10.";
	}	

	function box_sb()
	{
	}
	
	function box_changewords (num, add, date, sqltable)
	{
		words=document.getElementById("words" + num).value;
		name=document.getElementById("english" + num).value;
		wrd=name.split (" ");
		words=Number(words)+Number(add);
		if (words<0) words=0;
		if (words>wrd.length) words=wrd.length;

		x_box_changewords (num, words, date, sqltable, box_sb);

		document.getElementById("words" + num).value=words;
		if (words!=0) newname='<span style="color: #1A64B5;">';
			else newname='';
		for (i=0; i<wrd.length; i++)
		{
			//alert (wrd[i]);
			newname = newname + wrd[i] + " ";
			if (i==words-1) newname = newname + "</span>";
		}
		
		document.getElementById("td"+num).innerHTML=newname;

	}


function grade_cb(val) {
  document.getElementById('rating6331').innerHTML=35;
  } 

/* AJAX Star Rating : v1.0.3 : 2008/05/06 */
/* http://www.nofunc.com/AJAX_Star_Rating/ */

function $ASR(v,o) { return((typeof(o)=='object'?o:document).getElementById(v)); }
function $S(o) { return((typeof(o)=='object'?o:$ASR(o)).style); }
function agent(v) { return(Math.max(navigator.userAgent.toLowerCase().indexOf(v),0)); }
function abPos(o) { var o=(typeof(o)=='object'?o:$ASR(o)), z={X:0,Y:0}; while(o!=null) { z.X+=o.offsetLeft; z.Y+=o.offsetTop; o=o.offsetParent; }; return(z); }
function XY(e,v) { var o=agent('msie')?{'X':event.clientX+document.body.scrollLeft,'Y':event.clientY+document.body.scrollTop}:{'X':e.pageX,'Y':e.pageY}; return(v?o[v]:o); }

star={};

star.mouse=function(e,o) { if(star.stop || isNaN(star.stop)) { star.stop=0;

  document.onmousemove=function(e) { var n=star.num;
  
    var p=abPos($ASR('star'+n)), x=XY(e), oX=x.X-p.X, oY=x.Y-p.Y; star.num=o.id.substr(4);

    if(oX<1 || oX>129 || oY<0 || oY>16) { star.stop=1; star.revert(); }
          
          else {
                  ooX=Math.floor(oX/13)*13+13;
                        $S('starCur'+n).width=ooX+'px';
                        $ASR('starUser'+n).title=Math.floor(oX/13)+1;
                            }
      };
} };

star.update=function(e,o, id, section, c_member) { var n=star.num, v=parseInt($ASR('starUser'+n).title);

  n=o.id.substr(4); $ASR('starCur'+n).title=v;

  // req=new XMLHttpRequest(); req.open(\'GET\',\'/AJAX_Star_Vote.php?vote=\'+v,false); req.send(null);   
  x_grade(id, section, v, c_member, grade_cb);
};

star.revert=function() { var n=star.num, v=parseInt($ASR('starCur'+n).title);

  ov=v*13;
  $S('starCur'+n).width=ov+'px';
    $ASR('starUser'+n).title=(v>0?v:'');

    document.onmousemove='';
};

star.num=0
