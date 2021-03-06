<?php
require_once __DIR__.'/../models/kegType.php';

class KegTypeManager{

	function GetAll(mysqli $con){
		$sql="SELECT * FROM kegTypes ORDER BY displayName";
		$qry = mysqli_query($con,$sql);
		
		$kegTypes = array();
		while($i = mysqli_fetch_array($qry)){
			$kegType = new KegType();
			$kegType->setFromArray($i);
			$kegTypes[$kegType->get_id()] = $kegType;		
		}
		
		return $kegTypes;
	}
	
	
		
	function GetById(mysqli $con, $id){
		$sql="SELECT * FROM kegTypes WHERE id = " . $id;
		$qry = mysqli_query($con,$sql);
		
		if( $i = mysqli_fetch_array($qry) ){		
			$kegType = new KegType();
			$kegType->setFromArray($i);
			return $kegType;
		}

		return null;
	}
}
