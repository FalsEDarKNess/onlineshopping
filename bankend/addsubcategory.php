<?php 

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include 'dbconnect.php';

	$name = $_POST['name'];
	$category = $_POST['category'];

	// echo "$name and $category <br>";

	$sql="INSERT INTO subcategories (name,category_id) VALUES(:subcategory_name,:subcategory_category)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':subcategory_name',$name);
	$stmt->bindParam(':subcategory_category',$category);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:subcategory_list.php");
	}else{
		echo "Error";
	}

}else{
	header("location:index.php");
}

?>