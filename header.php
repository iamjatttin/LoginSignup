<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="#">| ADMIN |</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <div class="div input-group">
        <input class="form-control input-group " type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary input-group my-2 my-sm-0" type="submit">Search</button>
        </div>
    </form>
    <ul class="navbar-nav ml-auto">
    <?php 
            if(isset($_SESSION['User'])): ?>
            <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <?php else: ?>

            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="signup.php" class="nav-link">Signup</a></li>

            <?php endif; ?>
    </ul>
  </div>
  </div>
</nav>