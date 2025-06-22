<?php
    @include 'config.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['pass']);
        $confirm_password = md5($_POST['cpass']);

        $select = " SELECT * FROM user_form WHERE email='$email' ";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'User already exist!';
        }else{
            if($password != $confirm_password){
                $error[] = 'password does not match!';
            }else{
                $insert = "INSERT INTO user_form(name, email, password) VALUES('$name', '$email', '$password')";
                mysqli_query($conn, $insert);
                header('location: login.php');
            }
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Registration Page</title>
</head>
    <body>
        <div class="form-container">
            <form action="" method="post">
                <h2>Register Now</h2>
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-message">' .$error. '</span>';
                        }
                    }
                ?>
                <input type="text" name="name" required placeholder="Enter name">
                <input type="email" name="email" required placeholder="Enter email">
                <input type="password" name="pass" required placeholder="Enter password">
                <input type="password" name="cpass" required placeholder="Confirm password">
                <input type="submit" name="submit" value="Register Now" class="form-btn">
                <p>Already have an account? <a href="login.php">Login Now</a></p>
            </form>
        </div>
    </body>
</html>