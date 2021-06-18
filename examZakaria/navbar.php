<?php 

require_once "authentification/auth.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <?php if(!$isLoggedIn){ ?>
        <form method="POST" class="d-flex align-items-center">

            <div class="form-group">
                <label for="username">Username</label>

                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
            <label for="password">password</label>

                <input type="password" class="form-control" name="password" required>
            </div>        
        
                <div class="form-group">
                 <input type="submit" value="Log in" class="btn btn-success">
                </div>
        </form>
        <?php }?>
    </div>
  </div>
</nav>   