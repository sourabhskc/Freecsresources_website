<?php
    // This should be the first thing in this file 
    // Because we are using "$_SERVER['PHP_SELF']'" in below commands
    session_start();
?>
<?php
        // For showing alert on the screen when user signup successfully or not
        $showalert = false;
        $showerror = false;

        // Including connection.php to establish connection to databse.

        include 'connection.php';

        if(isset($_POST["submit"])){

            // mysqli_real_escape_string() function for storing data as inserted by user
            // because database not take special characters as input

            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $username = mysqli_real_escape_string($conn,$_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
           
            // Encryption of Password for more security

            $pass = md5($password);
            
            $usernamequery = " select * from userdetails where USERNAME='$username' ";

            $query = mysqli_query($conn, $usernamequery);

            $numexistrows = mysqli_num_rows($query);
   
            if($numexistrows>0){
                // setting error message when username already registerd
                $showerror = " Username already exist!";
            }   
            else{
                $insertquery = " insert into userdetails(NAME, USERNAME, PASSWORD) values ('$name','$username','$pass') ";

                $iquery = mysqli_query($conn, $insertquery); 
                
                if($iquery){
                    // setting showalert as true for showing, successful insertion
                    $showalert = true; 
                }
                else{
                    ?>
                        <script>
                            alert("Not inserted");
                        </script>
                    <?php
                } 
            }
        //    mysqli_close($conn);
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
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
    <!-- include nav.php will access navbar  -->
    <?php
    require 'nav.php';
    ?>

<?php
    if($showalert){
       echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(158, 219, 45);margin : 20px auto;">
        <strong>Success! </strong> Your account is Created Successfully.
        <br>
        <b>Now Login to explore..</b>
        </div>';}
    if($showerror){
       echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(158, 219, 45);margin : 20px auto;">
        <strong>Error!</strong>'.$showerror.'</div>';}       
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
                    <h3>User Singnup</h3>
                </div>

                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="name">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
        
                    <div class="user">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="pass">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    
                    <button type="submit" name="submit" class="btn">Signup</button>
                    <br><br>
                </form>
        </div>
    </div>

</body>

</html>