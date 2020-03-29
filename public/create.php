
<?php
var_dump($_POST);
require ("../config.php");
if(isset($_POST['submit'])){



	try {
		$connection = new PDO($dsn,$username,$password,$options);
		$firstname =$_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$birthday = $_POST['birthday'];
		$location = $_POST['location'];

		$sql="INSERT INTO `users` (firstname, lastname, email, birthday, location) VALUES (:$firstname, :$lastname, :$email, :$birthday, :$location)";
	$statement = $connection->prepare($sql);
	$statement->execute($sql);
		//$connection->exec($sql);
	echo "Successful!";
	}
	catch(PDOException $e){
		echo "Error! Connection! ".$e->getMessage();
	}
}

?>
<?php include "template/header.php"; ?>
<?php if(isset($_POST['submit'])&&$statement){
	echo $_POST['firstname']." successfully added";
}  ?>

<h2>Add a User</h2>
<form method="POST">
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