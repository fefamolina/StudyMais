<?php
session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "authentication") or die("Connection Failed");
$errors = [];

if(isset($_POST['verifyEmail'])){
    $_SESSION['message'] = "";
    $OTPverify = mysqli_real_escape_string($conn, $_POST['OTPverify']);
    $verifyQuery = "SELECT * FROM cadastro WHERE code = $OTPverify";
    $runVerifyQuery = mysqli_query($conn, $verifyQuery);
    if($runVerifyQuery){
        if(mysqli_num_rows($runVerifyQuery) > 0){
            $newQuery = "UPDATE cadastro SET code = 0";
            $run = mysqli_query($conn,$newQuery);
            header("location: novasenha.php");
        }else{
            $errors['verification_error'] = "Código de verificação inválido";
        }
    }else{
        $errors['db_error'] = "Erro!";
    }
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar código</title>
    <link rel="stylesheet" href="assets/css/forgot.css">
</head>

<body>
    <div id="container">
        <h2>Validar código</h2>
        <p>Digite o código enviado</p>
        <div id="line"></div>
        <form action="email.php" method="POST" autocomplete="off">
        <?php
            if(isset($_SESSION['message'])){
                ?>
                <div id="alert"><?php echo $_SESSION['message']; ?></div>
                <?php
            }
            ?>
            <?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="aler"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
            <input type="text" name="OTPverify" placeholder="Código"><br>
            <input type="submit" name="verifyEmail" value="Continuar">
        </form>
    </div>
</body>

</html>
