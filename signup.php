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

    <title>Admins | SignUp
    </title>
  </head>
  <body>
    <?php
    include 'header.php';
    ?>
    <div class="container ">
        <div class="row ">
            <div class="col-5 bg-success mx-auto my-5">
                <div class="card">
                    <div class=" text-center card-header">
                        <h3>SignUp</h3>
                    </div>
                    <div class="card-body">
                    <form action="signup.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">UserName</label>
                            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" class="form-control" name="phone"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                        </div>  
                        <button type="submit" name="submitbtn"class="btn btn-primary">Submit</button>
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
if(isset($_POST['submitbtn'])){
    $username =$_POST['username'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $password =$_POST['password'];


    $callingCheck = mysqli_query($conn,"select * from users where email = '$email' or username='$username' or phone='$phone'");    
                                
    $countCheck = mysqli_num_rows($callingCheck);
    if($countCheck > 0){
        echo "<script>alert('email already exist try with another email') </script>";
    }
    else{
    $password = sha1($password);
    $sql="INSERT INTO users VALUES ('','$username','$email','$phone','$password')";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo"Error Cannot Create User".mysqli_error($conn);
    }
    else{
        echo"<script>
        var url= 'http://localhost/Loginsignup/login.php';
        window.location = url;
    </script>";
    }
}
}
?>