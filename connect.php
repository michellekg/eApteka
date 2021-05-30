<?php

function q ($query)
{
	if (strpos($query,'/*N*/')===FALSE && strpos($query,'INFORMATION_SCHEMA')===FALSE && strpos($query,'cnt.js')===FALSE)
	{
		$ret=mysqli_query ($GLOBALS['sqlink'], $query);
		return $ret;
	} else
		return false;
}

function fq ($query)
{
	$q=q($query);
	if ($q)
		return mysqli_fetch_assoc($q);
	else
		return false;
} 

function fas ($query)
{

	return fq ("SELECT * FROM ".$query);
} 

function qs ($query)
{
	return q("SELECT * FROM ".$query);
} 


function faq ($query, $key)
{	
	$ar=fq($query);
	if ($ar && isset($ar[$key])) {
		return $ar[$key];
	} else
		return '';
}

function fa ($query, $key)
{	
	$ar=fq("SELECT ".$key." FROM ".$query);
	if ($ar && isset($ar[$key])) {
		return $ar[$key];
	} else
		return '';
}

function con ()
{
	$GLOBALS['sqlink']=mysqli_connect("localhost", "kg", "DBpassKG2016", "kg");
//  $GLOBALS['sqlink']=mysqli_connect("178.130.130.30", "kg", "DBpassKG2016", "kg");
	//return $mysqli;
}

function num_rows ($result)
{
	
	return mysqli_num_rows($result);
}

function insert_id ()
{
	
	return mysqli_insert_id($GLOBALS['sqlink']);
}

function mfa ($q)
{
	return mysqli_fetch_assoc($q);
	
}

function mysql_remove_duplicates ($table, $fields=array (), $order="id")
{
	
	$s1="";
	$s2="";
	$s3="";
	
	foreach ($fields as $f)
	{
		$s1.=$f.", COUNT(".$f."), ";
		$s2.=$f.", ";
		$s3.="COUNT(".$f.") > 1 AND ";
	}
	
	$drugs=q ("SELECT ".remove_tail ($s1, ", ")." FROM ".$table." GROUP BY ".remove_tail ($s2, ", ")." HAVING ".remove_tail ($s3, " AND ").";");
    
    while ($d=mfa ($drugs))
    {
	    $s4='';
	    
	    foreach ($fields as $f)
	    	$s4.=$f."='".mres($d[$f])."' AND ";
		
		$first=fq ("SELECT * FROM ".$table." WHERE ".remove_tail ($s4, " AND ")." ORDER BY ".$order." ASC LIMIT 1");
		
		$id=intval($first[$order]);
		
		if ($id!=0)
			q ("DELETE FROM ".$table." WHERE ".$s4.$order."!=".$id);
    }
    
}

?>
