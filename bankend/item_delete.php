<?php 

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include 'dbconnect.php';

	$id=$_GET['id'];

	$sql="DELETE FROM items Where items.id=:item_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam('item_id',$id);
	$stmt->execute();

	if($stmt->rowCount()){
		header("location:item_list.php");
	}else{
		echo "Error";
	}

}else{
	header("location:index.php");
}

 ?>