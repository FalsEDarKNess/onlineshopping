<?php

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include 'dbconnect.php';

	$id=$_GET['id'];

	$sql="DELETE FROM categories Where categories.id=:category_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam('category_id',$id);
	$stmt->execute();

	if($stmt->rowCount()){
		header("location:category_list.php");
	}else{
		echo "Error";
	}

}else{
	header("location:index.php");
}

 ?>