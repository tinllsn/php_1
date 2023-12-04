<?php 
    session_start();
    if(isset($_SESSION['user'])) header('location: dashboard.php');

    $error_message='';

    if($_POST){
        include('database/connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = 'SELECT * FROM users WHERE users.email="'. $username .'" AND users.password="'. $password .'" ';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user']=$user;

            header('Location: dashboard.php');

        } else $error_message = 'Wrong username or password. ';
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic Management System</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body id="loginBody">
    <?php if(!empty($error_message)) { ?>
        <div id="errorMessage">
            <strong>ERROR </strong> <p><?=$error_message?> </p>
        </div>
    <?php }?>
    <div class="container">
        <div class="loginHeader">
            <h1>OMS</h1>
            <p>Organic Management System</p>
        </div>
        <div class="loginBody">
            <form action="login.php" method="POST">
                <div class="loginInputsContainer">
                    <div>
                        <label for="">Username</label>
                        <input placeholder="username" name="username" type="text">
                <div class="loginInputsContainer">
                <div>
                    <label for="">Password</label>
                    <input placeholder="password" name="password" type="password">
                </div >
                <div class="loginButtonContainer">
                    <button>Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>