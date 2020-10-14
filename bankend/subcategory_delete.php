<?php 

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include 'dbconnect.php';

	$id=$_GET['id'];

	$sql="DELETE FROM subcategories Where subcategories.id=:subcategory_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam('subcategory_id',$id);
	$stmt->execute();

	if($stmt->rowCount()){
		header("location:subcategory_list.php");
	}else{
		echo "Error";
	}

}else{
	header("location:index.php");
}

 ?>