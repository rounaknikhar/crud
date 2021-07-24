<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['streetAddress']) && isset($_POST['postCode']) && isset($_POST['country'])){

		$firstName = $user_fun->htmlvalidation($_POST['firstName']);
		$lastName = $user_fun->htmlvalidation($_POST['lastName']);
		$gender = $user_fun->htmlvalidation($_POST['gender']);
		$email = $user_fun->htmlvalidation($_POST['email']);
		$streetAddress = $user_fun->htmlvalidation($_POST['streetAddress']);
		$postCode = $user_fun->htmlvalidation($_POST['postCode']);
		$country = $user_fun->htmlvalidation($_POST['country']);

		if((!preg_match('/^[ ]*$/', $firstName)) && (!preg_match('/^[ ]*$/', $lastName)) && (!preg_match('/^[ ]*$/', $gender)) && (!preg_match('/^[ ]*$/', $email)) && (!preg_match('/^[ ]*$/', $streetAddress)) && (!preg_match('/^[ ]*$/', $postCode)) && (!preg_match('/^[ ]*$/', $country))){

			$field_val['firstName'] = $firstName;
			$field_val['lastName'] = $lastName;
			$field_val['gender'] = $gender;
			$field_val['email'] = $email;
			$field_val['streetAddress'] = $streetAddress;	
			$field_val['postCode'] = $postCode;	
			$field_val['country'] = $country;	

			$insert = $user_fun->insert("contact", $field_val);

			if($insert){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Inserted";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Inserted";
			}

		}
		else{

			if(preg_match('/^[ ]*$/', $firstName)){

				$json['status'] = 103;
				$json['msg'] = "Please Enter First Name";

			}
			if(preg_match('/^[ ]*$/', $lastName)){

				$json['status'] = 104;
				$json['msg'] = "Please Enter Last Name";

			}
			if(preg_match('/^[ ]*$/', $gender)){

				$json['status'] = 105;
				$json['msg'] = "Please choose a Gender option";

			}
			if(preg_match('/^[ ]*$/', $email)){

				$json['status'] = 106;
				$json['msg'] = "Please enter a valid Email";

			}
			if(preg_match('/^[ ]*$/', $streetAddress)){

				$json['status'] = 107;
				$json['msg'] = "Please enter Street Address";

			}
			if(preg_match('/^[ ]*$/', $postCode)){

				$json['status'] = 108;
				$json['msg'] = "Please enter Post Code";

			}
			if(preg_match('/^[ ]*$/', $country)){

				$json['status'] = 109;
				$json['msg'] = "Please select your Country";

			}

		}

	}
	else{

		$json['status'] = 110;
		$json['msg'] = "Invalid Values Passed";

	}

}
else{

	$json['status'] = 111;
	$json['msg'] = "Invalid Method Found";

}


echo json_encode($json);

?>