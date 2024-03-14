<?php
session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "authentication") or die("Connection Failed");
$errors = [];

if (isset($_POST['forgot_password'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    $emailCheckQuery = "SELECT * FROM cadastro WHERE email = '$email'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

    // if query run
    if ($emailCheckResult) {
        // if email matched
        if (mysqli_num_rows($emailCheckResult) > 0) {
            $code = rand(999999, 111111);
            $updateQuery = "UPDATE cadastro SET code = $code WHERE email = '$email'";
            $updateResult = mysqli_query($conn, $updateQuery);
            if ($updateResult) {
                $subject = 'Resetar senha';
                $message = "Seu código de verificação é: $code";
                $sender = 'From: etecstudymais@gmail.com';

                if (mail($email, $subject, $message, $sender)) {
                    $message = "O código foi enviado ao seu email: <br> $email";

                    $_SESSION['message'] = $message;
                    header('location: email.php');
                } else {
                    $errors['otp_errors'] = 'Falha ao enviar o código';
                }
            } else {
                $errors['db_errors'] = "Erro!";
            }
        }else{
            $errors['invalidEmail'] = "Email inválido";
        }
    }else {
        $errors['db_error'] = "Falha ao checar seu email!";
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu a senha</title>
    <link rel="stylesheet" href="assets/css/forgot.css">
</head>

<body>
    <div id="container">
        <h2>Esqueceu a senha</h2>
        <p>Digite o seu email cadastrado</p>
        <div id="line"></div>
        <form action="esqueceu.php" method="POST" autocomplete="off">
            <?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="submit" name="forgot_password" value="Continuar">
        </form>
    </div>
</body>

</html>
