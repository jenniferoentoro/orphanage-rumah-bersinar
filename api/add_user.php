<?php
	require_once("../connection.php");
	if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST['special_code']) && $_POST['email'] != '' && $_POST['name'] != '' && $_POST['password'] != '' && $_POST['special_code'] != '')
	{

		$name = $_POST["name"];
		$email = $_POST["email"];

		$sql = "SELECT * FROM user_data WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        echo "4";
        return;
    } else {
        $select_query = "SELECT special_code, date_valid_until FROM activation_status WHERE email='$email';";
		$result = mysqli_query($con, $select_query)->fetch_all();
		$result_length = count($result);
		if ($result_length != 0) {
			$last_request = $result[$result_length-1][1];
			if ($last_request < date('Y-m-d H:i:s')) {
				echo "9"; //your special code has expired. please request a new one
			} else {
				if ($result[$result_length-1][0] == $_POST['special_code']) {
					$password = $_POST['password'];
					//bcrypt password
					$password = password_hash($password, PASSWORD_DEFAULT);
					// $insert_query = "INSERT INTO user_data (name, email, password) VALUES ('$name', '$email', '$password');";
					// $result = mysqli_query($con, $insert_query);
					$q = mysqli_query($con, "INSERT INTO `user_data`(`id`, `name`, `role`, `email`, `password`, `profileImg`, `bio`) VALUES (null, '$name', 0, '$email', '$password','../assets/profiledefault.png',' ')"); 
					echo "200"; //registered successfully
				} else {
					echo "8"; //your special code is incorrect
				}
			}
		} else {
			echo "6"; //please request special code
		}
    


		
		// //bcrypt password
		// $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
		// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		// 	echo "2";}
  		// else{


		// 	$q = mysqli_query($con, "INSERT INTO `user_data`(`id`, `name`, `role`, `email`, `password`, `profileImg`, `bio`) VALUES (null, '$name', 0, '$email', '$password','../assets/profiledefault.png',' ')"); 
		// 	if($q){ 
		// 		echo "1";
		// 	}else{
		// 		echo "0";
		// 	}
		// }

		}
	} else {
		echo "7"; //please fill all the fields
	}
?>