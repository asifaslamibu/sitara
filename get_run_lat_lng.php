<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        if($check!=""){
            $result = mysqli_query($db,"SELECT * FROM `positions` where device_id='$check' order by id DESC limit 1");
            $cust = mysqli_fetch_array($result); 
        

            // echo 'True '.$data;
            if($cust) {
                echo json_encode($cust);
                } else {
                // echo "Error: "  "" . mysqli_error($db);
                }
        }else{
            echo 'False';
        }
    }
?>