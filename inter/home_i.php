<?php
    session_start();
    include ('connect.php');
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Electivas UPIICSA</title>
    <link rel="icon" href="upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/LogIn.css">
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<img src="Images/everest_mountain_sky.jpg" class="img1" alt="clip">
<section>
    <form method="post">
        <div class="container">
            <div class="div1">
                <h1>You are Successfully Log In INTER...!</h1>
            </div>
            <div class="div2">
                <?php
                    $query  = "SELECT * FROM inter WHERE id_inter = '$_SESSION[user_id]'";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($result);
                ?>
                <h3 class="wlc">Welcome <?php echo $row['name']; ?></h3>
                <?php
                    if (!empty($_POST["lagout"])){

                        session_destroy();
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
                        header("Location: " . $home_url);
                    }
                ?>
                <input type="submit" id="#logout" name="lagout" value="Lagout">
            </div>
        </div>
    </form>
</section>

<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>

</body>
</html>