<?php
global $link;
function logDebug($mess){
	error_log( date('d.m.Y h:i:s') . " $mess \n", 3, "log.log");
}
function connect(){
	global $link;	
	$link = mysqli_connect('localhost', 'root', '', 'doctruyen');
	if (!$link) {
	    die('<br/>Khong ket noi duoc: ' . mysqli_error($link));
	}
	mysqli_query($link, "SET NAMES 'utf8'");
}

function close(){
	global $link;
	mysqli_close($link);
}
function select_one($sql){
	$data = exec_select($sql);
	if (!$data) return null;
	return $data[0];
}
function select_list($sql){
	return exec_select($sql);
}
function exec_select($sql){
	global $link;
	logDebug("sql=[$sql]");//de fix bug
	connect();
	$ret = isset($ret) ? $ret : "";
	$res = mysqli_query($link, $sql) ;
	$row = array();
	//Lay loi sau khi thuc hien truy van
	$err = mysqli_error($link);
	//kiem tra
	if ($err){
		print("Khong the select duoc");
		logDebug("Khong the select duoc,ERROR=[" . $err . "]" );
		logDebug(  "COUNT=[0]" );
		return null;
	}
	//Khong co loi
	if ($res ){
		//lay tung dong ket qua
		$ret = array();
		while( $row = mysqli_fetch_array($res,MYSQLI_NUM) )
		{				
			$ret[] = $row;
		}
		mysqli_free_result($res);
	}	
	close();
	return $ret;
}
function exec_update($sql){
	global $link;	
	logDebug( "<!-- sql=[$sql] -->");//de fix bug
	connect();
	$res = mysqli_query($link, $sql) ;
	//Lay loi sau khi thuc hien truy van
	$err = mysqli_error($link);
	//kiem tra
	if ($err){
		print("Khong the select duoc,ERROR=[" . $err . "]" );
		print(  "COUNT=[0]" );
		return -1;
	}
	$ret = mysql_affected_rows();
	close();
	return $ret;
}
function sql_str($val){
	if($val === 0)  return '0' ;
	if($val === null) {
		return 'NULL';
	}	
	if (get_magic_quotes_gpc()) return "" . mysql_escape_string(stripslashes($val)) . "" ;
	return "" . mysql_escape_string($val)  . "" ;
}
?>
