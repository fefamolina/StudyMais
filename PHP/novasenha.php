<?php
session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "authentication") or die("Connection Failed");
$errors = [];

if(isset($_POST['forgot_password'])){
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);

        if ($_POST['password'] != $_POST['password2']) {
            $errors['password_error'] = 'As senhas não coincidem!';
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE cadastro SET senha = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            session_unset($email);
            session_destroy();
            header('location: login.php');
        }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetar senha</title>
    <link rel="stylesheet" href="assets/css/forgot.css">
</head>

<body>
    <div id="container">
        <h2>Resetar senha</h2>
        <p>Digite sua nova senha</p>
        <div id="line"></div>
        <form action="novasenha.php" method="POST" autocomplete="off">
            <?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="aler"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
            <input type="password" name="password" placeholder="Senha"><br>
            <input type="password" name="password2" placeholder="Confirmar senha"><br>

            
            <input type="submit" name="forgot_password" value="Resetar">
        </form>
    </div>
</body>

</html>
