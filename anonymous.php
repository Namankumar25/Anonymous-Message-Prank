<?php
include "partials/dbConnect.php";
include "partials/header.php";

if (isset($_GET['abcNum'])) {
    $_username = base64_decode($_GET['abcNum']);
}

?>
<?php include "partials/navbar.php" ?>

<div class="content">
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3 my-3">
            <div class="container-fluid py-5 text-center">
                <h1 class="display-5 fw-bold">Hey 😀, Anonymous Send a Secret message to
                    <?php
                    $sql = "SELECT `an_name`,an_id FROM `an_users` WHERE `an_username`='$_username'";
                    $result = mysqli_query($conn, $sql);
                    $record = mysqli_num_rows($result);

                    if ($record>0) {
                        $row = mysqli_fetch_assoc($result);
                        echo $row['an_name'];    
                    }else {
                        header("location:index.php");
                    }
                    
                    ?>
                </h1>
                <h3 id="log" class="my-4 text-success"></h3>

                <div class="mb-3">
                <form method="POST" id="sendForm">
                    <textarea class="form-control" id="message" rows="3" name="message" required></textarea>
                    <input type="hidden" value=<?php echo $row['an_id']?> name="mycode" id="mycode">
                    <button type="submit" class="btn btn-primary my-4 btn-lg" name="sendBtn" id="sendBtn">Send</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<?php include "partials/footer.php" ?>


<script>
$(document).ready(function(){
    
  $("#sendForm").submit(function(e){
  e.preventDefault();    
  let mycode = $("#mycode").val();
  let message = $("#message").val();
   
    $.post("partials/action.php",
    {sendBtn:true,
      mycode2: mycode,
      message2: message
    },
    (data)=>{
        $("#log").html(data)
        setTimeout(() => {
            $("#log").html("")
        }, 2000);
        $("#message").val("")
    });
  });
});


</script>