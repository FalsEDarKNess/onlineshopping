<?php 
	include 'dbconnect.php';

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$profile = $_FILES['profile'];

	$basepath="img/profile/";
	$fullpath=$basepath.$profile['name'];
	move_uploaded_file($profile['tmp_name'], $fullpath);

	echo "$name and $phone and $email and $password and $address>";
	print_r($profile);

	$sql="INSERT INTO users (name,profile,phone,address,email,password) VALUES(:user_name,:user_profile,:user_phone,:user_address,:user_email,:user_password)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':user_name',$name);
	$stmt->bindParam(':user_profile',$fullpath);
	$stmt->bindParam(':user_phone',$phone);
	$stmt->bindParam(':user_address',$address);
	$stmt->bindParam(':user_email',$email);
	$stmt->bindParam(':user_password',$password);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:login.php");
	}else{
		echo "Error";
	}


?>