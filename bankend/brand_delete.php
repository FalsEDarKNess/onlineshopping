<?php

	if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

	include 'dbconnect.php';

	$id=$_GET['id'];

	$sql="DELETE FROM brands Where brands.id=:brand_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam('brand_id',$id);
	$stmt->execute();

	if($stmt->rowCount()){
		header("location:brand_list.php");
	}else{
		echo "Error";
	}

}else{
	header("location:index.php");
}

 ?>