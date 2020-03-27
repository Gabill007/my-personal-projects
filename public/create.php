<?php include "template/header.php"; ?>
<?php
var_dump($_POST);

if(isset($_POST['submit'])){

	require ("../config.php");

	try {
		$connection = new PDO($dsn,$username,$password,$options);
		$firstname =$_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$birthday = $_POST['birthday'];
		$location = $_POST['location'];

		$sql="INSERT INTO `users` (firstname, lastname, email, birthday, location) VALUES (:$firstname, :$lastname, :$email, :$birthday, :$location)";
	$connection->exec($sql);
	echo "Successful!";
	}
	catch(PDOException $e){
		echo "Error! Connection! ".$e->getMessage();
	}
}

?>

<form method="POST" >
	<label for = "firstname">First Name</label>
	<input type="text" name ="firstname" id ="firstname"/>

	<label for ="lastname" >Last Name</label>
	<input type="text" name="lastname" id="lastname"/>

	<label for="email">Email Address</label>
	<input type="email" name="email" id="email">

	<label for ="birthday">Date of birth</label>
	<input type="Date" name="birthday" id="birthday"/>

	<label for="location">Location</label>
	<input type="text" name="location" id="location"/><br>

	<input type="submit" name="submit" value="Submit"/>

</form>

<a href="index.php">Back to home</a>
<?php include "template/footer.php"; ?>