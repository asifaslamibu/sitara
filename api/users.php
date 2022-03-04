<?php
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	$id = $_GET['id'];
	if(isset($_GET['accesskey'])) {
		$access_key_received = $_GET['accesskey'];
		
		if($access_key_received == $access_key){
			// get all category data from category table
			$sql_query = "SELECT * 
					FROM users where id='$id'
					ORDER BY id ASC ";
			
			$result = $connect->query($sql_query) or die ("Error :".mysqli_error());
	 
			$users = array();
			while($user = $result->fetch_assoc()) {
				$users[] = array('users'=>$user);
			}
			
			// create json output
			$output = json_encode(array('data' => $users));
		}else{
			die('accesskey is incorrect.');
		}
	} else {
		die('accesskey is required.');
	}
 
	//Output the output.
	echo $output;

	include_once('../includes/close_database.php'); 
?>