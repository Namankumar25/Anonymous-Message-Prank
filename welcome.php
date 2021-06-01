<?php
include "partials/dbConnect.php";
session_start();

if (!isset($_SESSION['loggedinUser'])) {
    header("location:index.php");
}else{
    $user_name=$_SESSION['loggedinUser'];
}

include "partials/header.php";

?>
<?php include "partials/navbar.php" ?>

<div class="content">
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3 my-3">
            <div class="container-fluid py-5 text-center">
                <h1 class="display-5 fw-bold">Hey😁😀, <?php echo $_SESSION['name'] ?></h1>
                <h4 class="fw-bold">Your Username - <?php echo $_SESSION['loggedinUser'] ?></h4>
                <h4 class="fw-bold">Password - <?php echo $_SESSION['userPass'] ?></h4>
                <p class="fs-4">Use these crediantials when you login again save them for future reference</p>
                <p class="fs-5 text-info">Reload the page to Load new messages</p>
                <p class="fs-6">Share this URL with your friends so that they can send you messages</p>
                <p class="fs-6 text-success">Link - <?php echo $_SERVER['HTTP_HOST'] . "/anonymousprank/anonymous.php?abcNum=" . base64_encode($user_name) ?></p>
            </div>
        </div>
    </div>



        <h4 class="fw-bold container">Messages</h4>


    <div class="container cont">
        <div class="row">

    <?php

        $__username=$_SESSION['loggedinUser'];
        $_sql="SELECT `an_id` FROM `an_users` WHERE `an_username`='$__username'";
        $_result = mysqli_query($conn, $_sql);
        $_row = mysqli_fetch_assoc($_result);

        $an_u_id=$_row['an_id'];

        $sql = "SELECT `msg_text`,`timestamp` FROM `an_messages` WHERE `an_id`='$an_u_id'";
        $result = mysqli_query($conn, $sql);
    
        while($row = mysqli_fetch_assoc($result)){
            echo '
            <div class="card mx-3 my-2" style="width: 18rem;border-radius:21px;border: solid aqua 6px;">
                <div class="card-body">
                <p class="card-text">'.$row['msg_text'].'</p>
                <p class="card-text" style="float:right">'.$row['timestamp'].'</p>
                </div>
            </div>';        
        }
    ?>

        </div>
    </div>
</div>
<?php include "partials/footer.php" ?>