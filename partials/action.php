<?php
include "dbConnect.php";
include "../utils/protectXss.php";

// signup handler 
if (isset($_POST['startBtn'])) {
     $name=protectxss($_POST['name']);
     $trimname=trim($name);
     $strreplace=str_replace(" ","_",$trimname);

     $userName=$strreplace."@".time();

     $password = rand();
     $passhash=password_hash($password,PASSWORD_DEFAULT);
     $sql="INSERT INTO `an_users` (`an_id`, `an_name`, `an_username`, `an_password`, `timestamp`) VALUES (NULL, '$trimname', '$userName', '$passhash', current_timestamp())";
     $result=mysqli_query($conn,$sql);

     if ($result) {
        session_start();
        $_SESSION['loggedinUser']=$userName;
        $_SESSION['userPass']=$password;
        $_SESSION['name']=$name; 
        header("location:../welcome.php");
     }else{
         echo "error";  
     }    
}

//login handle 

if (isset($_POST['loginBtn'])) {
     $username=protectxss($_POST['username']);
     $password=protectxss($_POST['password']);


     $sql="SELECT `an_password`,`an_name` FROM `an_users` WHERE `an_username`='$username'";
     $result=mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($result);
     
     if (password_verify($password,$row['an_password'])) {
        session_start();
        $_SESSION['loggedinUser']=$username;
        $_SESSION['userPass']=$password;
        $_SESSION['name']=$row['an_name']; 
        header("location:../welcome.php");
     } else {
        header("location:../index.php");
     }
      
}

// message Button
if (isset($_POST['sendBtn'])) {
    $message=protectxss($_POST['message2']);
    $mycode=protectxss($_POST['mycode2']);

    $sql="INSERT INTO `an_messages` (`msg_id`, `msg_text`, `an_id`, `timestamp`) VALUES (NULL, '$message', '$mycode', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if ($result) {
        echo "Message sent";
    }else{
        echo "try Again Later !";
    }    
}

?>