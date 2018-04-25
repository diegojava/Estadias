<?php
	include_once("$_SERVER[DOCUMENT_ROOT]/Estadias/admin/bin/conexion.php");
	//include(__DIR__"/admin/bin/conexion.php");//Me conecto a la base de datos
	//set timezone
	date_default_timezone_set('America/Mexico_City');
	$year = date('Y');
	$total=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="select escuela.nombre as nombreescuela, count(matricula) as suma
from alumno, escuela
where escuela.id = alumno.idescuela
group by idescuela";
		$query=$mysqli->query($sql);
		$row=$query->fetch_array();

		$total[]=$row['suma'];
	}

	$tjan = $total[0];
	$tfeb = $total[1];
	$tmar = $total[2];
	$tapr = $total[3];
	$tmay = $total[4];
	$tjun = $total[5];
	$tjul = $total[6];
	$taug = $total[7];
	$tsep = $total[8];
	$toct = $total[9];
	$tnov = $total[10];
	$tdec = $total[11];

	$pyear = $year - 1;
	$pnum=array();

	for ($pmonth = 1; $pmonth <= 12; $pmonth ++){
		$sql="select escuela.nombre as nombreescuela, count(matricula) as suma
from alumno, escuela
where escuela.id = alumno.idescuela
group by idescuela";
		$pquery=$mysqli->query($sql);
		$prow=$pquery->fetch_array();

		$ptotal[]=$prow['suma'];
	}
	
	$pjan = $ptotal[0];
	$pfeb = $ptotal[1];
	$pmar = $ptotal[2];
	$papr = $ptotal[3];
	$pmay = $ptotal[4];
	$pjun = $ptotal[5];
	$pjul = $ptotal[6];
	$paug = $ptotal[7];
	$psep = $ptotal[8];
	$poct = $ptotal[9];
	$pnov = $ptotal[10];
	$pdec = $ptotal[11];
?>