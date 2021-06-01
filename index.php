<?php
session_start();
if (isset($_SESSION['loggedinUser'])) {
    header("location:welcome.php");
}

include "partials/header.php";
include "partials/dbConnect.php";


?>
<?php include "partials/navbar.php" ?>
<?php include "partials/modals/loginmodal.php" ?>

<div class="content">
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3 my-3">
            <div class="container-fluid py-5 text-center">
                <h1 class="display-5 fw-bold">Anonymous message Prank Game</h1>
                <p class="fs-4">Prank Your Friends by Sending Secret Messages to them They don't able to know who send message to them 😂😆 Enter Your Name to get Started </p>

                <div class="container">
                    <form class="row" style="float:right;" action="partials/action.php" method="POST">
                        <div class="col-auto">
                            <label for="staticEmail2" class="visually-hidden">Name</label>
                            <label readonly class="form-control-plaintext">Your Name to Get started</label>
                        </div>
                        <div class="col-auto">
                            <label for="inputPassword2" class="visually-hidden">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name..">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3" name="startBtn">Start</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include "partials/footer.php" ?>