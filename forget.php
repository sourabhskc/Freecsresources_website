<?php
function random_password( $length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
?>

<?php
      $login = false;
      $showerror = false;
      if($_SERVER["REQUEST_METHOD"] == "POST"){

         // Including connection.php to establish connection with databse
         include 'connection.php';

          $name = $_POST["name"];
          $username = $_POST["username"];
         
       
  
            $sql = "select * from userdetails where NAME='$name' and USERNAME='$username'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
  
            if($num == 1){
                $pass = random_password(8);
                $login= $pass; 
                $hasspass = md5($pass);

                $update = " update userdetails set PASSWORD = '$hasspass' where userdetails.USERNAME = '$username' ";

                $retval = mysqli_query($conn,$update);

                if(!$retval ) {
                    ?>
                        <script>
                        alert("Could not update data!");
                        </script>
                    <?php
                }
                
                  // redirect
  
                //   header("location:welcome.php");
  
            }
            else{
                $showerror = "Invalid Username or Name";
            }

            mysqli_close($conn);
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="regis.css">
    <style>
        body{
            background : url("Background.jpg");
            background-size:cover;
            background-image: center center;
        }
        .center{
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 8px;
            padding: .04rem 0.6rem;
        }
    </style>
</head>
<body>
    <?php
        require "nav.php";
    ?>

<?php
    if($login){
        echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(158, 219, 45);margin : 20px auto;">
         <strong>Your New Password! is : </strong>'.$login .' <strong> To reset your password follow this link   <a href="resetpassword.php">reset</a> </strong>'  .'</div>';}
    if($showerror){
       echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(158, 219, 45);margin : 20px auto;">
        <strong>Error!</strong>' .$showerror .'</div>';}
?>

    <!-- Sign up form creation  -->
    <div class="container">
        <div class="site-info">
            <div><h2>Hello Users!</h2></div>
            <div><h1>welcome to <span>Freecsresources.com</span></h1></div>
            <div><h2>Our goal is to make Available to you, the <span>Computer Science</span> resources absolutely <span>Free</span>.</h2></div>
        </div>

        <div class="center">
            <div class="heading">
                <h3>Recover password</h3>
            </div>

            <form action="forget.php" method="post">
                <div class="name">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="user">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <button type="submit" class="btn">login</button>

                <br><br>

            </form>
        </div>
    </div>

</body>
</html>