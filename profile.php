<?php
    include 'connection.php';
    $user=$_SESSION['User'];
    $result=mysqli_query($conn,"Select * from users where username='$user'");
    $row=mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admins
    </title>
  </head>
  <body>
    <?php
    include 'header.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto my-5">
                <div class="card">
                    <div class="card-body">
                        Welcome <?=$row['username'];?><br>
                        Email:<?=$row['email'];?><br>
                        Phone: <?=$row['phone'];?><br>
                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Update profile
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="profile.php"  method="POST">
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
                                                    <input type="email" class="form-control" name="email"id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Enter Email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                                                </div>  
                                                
                                                <button type="submit" name="updatebtn"class="btn btn-primary">Save changes</button>
                                            </form>
      </div>
      
    </div>
  </div>
</div>
                          

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
if(isset($_POST['updatebtn'])){
    $username =$_POST['username'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $password =$_POST['password'];


    $callingCheck = mysqli_query($conn,"select * from users where email = '$email' or username='$username' ");    
                                
    $countCheck = mysqli_num_rows($callingCheck);
    if($countCheck > 0){
        echo "<script>alert('email already exist try with another email') </script>";
    }
    else{
    $password = sha1($password);
    $sql="update users set username='$username', email='$email', phone='$phone', password='$password' where username='$user'";
    //$sql="INSERT INTO users VALUES ('','$username','$email','$phone','$password')";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo"Error Cannot Create User".mysqli_error($conn);
    }
    else{
        $_SESSION['User']=$username;
        echo"<script>
        var url= 'http://localhost/Loginsignup/profile.php';
        window.location = url;
    </script>";
    }
}
}
?>