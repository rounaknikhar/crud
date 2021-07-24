<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['checkid']) && $_GET['checkid'] > 0){

		$update_ch_id = $user_fun->htmlvalidation($_GET['checkid']);

		$condition0['id'] = $update_ch_id;
		$select_pre = $user_fun->select_assoc("contact", $condition0);

		if($select_pre){

			$json['status'] = 0;
			$json['firstName'] = $select_pre['firstName'];
			$json['lastName'] = $select_pre['lastName'];
			$json['gender'] = $select_pre['gender'];
			$json['email'] = $select_pre['email'];
			$json['streetAddress'] = $select_pre['streetAddress'];
			$json['postCode'] = $select_pre['postCode'];
			$json['country'] = $select_pre['country'];
			$json['msg'] = "Success";

		}
		else{

			$json['status'] = 1;
			$json['firstName'] = "NULL";
			$json['lastName'] = "NULL";
			$json['gender'] = "NULL";
			$json['email'] = "NULL";
			$json['streetAddress'] = "NULL";
			$json['postCode'] = "NULL";
			$json['country'] = "NULL";
			$json['msg'] = "Fail";

		}

	}
	else{
			$json['status'] = 2;
			$json['firstName'] = "NULL";
			$json['lastName'] = "NULL";
			$json['gender'] = "NULL";
			$json['email'] = "NULL";
			$json['streetAddress'] = "NULL";
			$json['postCode'] = "NULL";
			$json['country'] = "NULL";
			$json['msg'] = "Invalid Values Passed";
	}
}
else{
			$json['status'] = 3;
			$json['firstName'] = "NULL";
			$json['lastName'] = "NULL";
			$json['gender'] = "NULL";
			$json['email'] = "NULL";
			$json['streetAddress'] = "NULL";
			$json['postCode'] = "NULL";
			$json['country'] = "NULL";
			$json['msg'] = "Invalid Method Found";
}


echo json_encode($json);

?>