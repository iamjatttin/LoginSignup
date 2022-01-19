<?php
    include 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admins | Login
    </title>
  </head>
  <body>
    <?php
    include 'header.php';
    ?>
    <div class="container ">
        <div class="row ">
            <div class="col-4 bg-success mx-auto my-5">
                <div class="card">
                    <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">UserName</label>
                            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                        </div>  
                        <button type="submit" name="login" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
    if(isset($_POST['login'])){
        $contact = $_POST['username'];
        $password = sha1($_POST['password']);
        // $password = $_POST['password'];

        $query = mysqli_query($conn, "select * from users where username='$contact' and password='$password'");

        $count = mysqli_num_rows($query);

        if($count > 0){
            $_SESSION['User'] = $contact;
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            echo "<script>alert('contact and password is incorrect') </script>";
        }

    }
?>