<?php 

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include 'dbconnect.php';

	$name = $_POST['name'];
	$logo = $_POST['logo'];

	// echo "$name and $logo <br>";

	$sql="INSERT INTO categories (name,logo) VALUES(:category_name,:category_logo)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':category_name',$name);
	$stmt->bindParam(':category_logo',$logo);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:category_list.php");
	}else{
		echo "Error";
	}

}else{
	header("location:index.php");
}

?>