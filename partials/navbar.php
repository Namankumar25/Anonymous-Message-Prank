<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Anonymous Prank 🤣😂 </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form class="d-flex">
        <?php
        if (isset($_SESSION['loggedinUser'])) {
          echo '<a href="logout.php" class="btn btn-outline-danger">
          Logout
        </a>'; 
        }else if (isset($_GET['name'])) {
          echo '<a class="btn btn-danger" href="index.php">
          Sign Up
        </a>';
        } 
        else {
          echo '<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginmodal">
          login
        </button>';
        }
        ?>
      </form>
    </div>
  </div>
</nav>