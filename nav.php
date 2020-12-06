<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        $loggedin = true;
    }
    else{
        $loggedin = false;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>

    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    .navbar{
        width: 100%;
        height: 4rem;
        background-color: whitesmoke;
        display: flex;
        justify-content: space-between;
    }

    .links{
        display: flex;
        justify-content: space-around;    
    }

    .brand{
        padding: 21px;
        font-size: 25px;
    }
    
    a{
        padding: 23px;
        font-size: 25px;
        font-style: none;
        font-weight: bold;
        color: black;
        text-decoration: none;
    }

    </style>
</head>

<body>

    <div class="navbar">
        <?php
        echo '<div class="brand">
            <a href="login.php">Freecsresources</a>
            </div>

            <div class="links">
            <a href="regis.php">Home</a>';
    
           
            if(!$loggedin){
                echo '<a href="login.php">login</a>
                    <a href="regis.php">sign-up</a>';

            }
            if($loggedin){
                echo '<a href="login.php">login</a>
                    <a href="regis.php">sign-up</a>';
              //  echo '<a href="logout.php">Logout</a>';
            }
           
        echo '</div>';
        ?>
    </div>
</body>

</html>