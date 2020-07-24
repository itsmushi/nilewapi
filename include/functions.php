<?php
function redirect($location){
  header("Location: $location");
  exit;
}

function confirm_query($result_set){
 if(!$result_set){
     die("Database Query failed");
    }
  }

function is_even($num){
  if($num%2==0){
    return true;
  }else{
    return false;
  }
}



  function authenticate_user($username, $password){
    global $conn;
    //write query
    $sql ="SELECT * FROM `admins`";
    //get results
    
    $flag=false;
    
    $results = mysqli_query($conn,$sql);
    
    while($data = mysqli_fetch_assoc($results)){
      
      if( $data["admin_name"]==$username && password_verify($password, $data["password"])) {
        $flag=true;
        break;
      }
    }
    
    
    
    if($flag){
      return $data["cafe_name"]; //so as to be assigned to the session
    }else{
      return false;
    }
    
    }
    
    
?>