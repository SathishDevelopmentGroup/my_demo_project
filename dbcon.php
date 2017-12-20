<?php
        
class Functions{

    public static function getUserInfo(){
        
        $server_name="localhost";
        $user_name="root";
		$password="";
		$database="my_demo_project";
		
        $conn=new mysqli($server_name,$user_name,$password,$database);
		if($conn->connect_error)
		{
		die("connection failed:".$connect_error);
		}
        // conn
        $sql = mysqli_query($conn, "SELECT * FROM milk_users");
        $arr =  array(); 
                while($row = mysqli_fetch_array($sql))
                {
                // close connection to db
                	 $arr1["Name"] = $row['name'];
               	      $arr1["Email"] =$row['email_id'];
             array_push($arr, $arr1 );
                	//$row1["Email:"] =$row['email_id'];
               
                 }
       				 return $arr;
        // close connection to db
       
    }
}

//$userID = !empty($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;
$function = new Functions();
$user =  $function->getUserInfo();
	$myJSON = json_encode($user);
    echo $myJSON;
    
?>
