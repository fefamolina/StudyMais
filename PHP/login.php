<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "authentication");

  if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    
    $result = mysqli_query($conn, "SELECT * FROM cadastro WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($senha == $row["senha"]){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        $_SESSION["user"] = $row["user"];
        $_SESSION["email"] = $row["email"];
        
      
        header("location: quiz.html");
      }
      else {
        echo
    "<script> alert('Senha incorreta'); </script>";
      }

    }
    else{
      echo
    "<script> alert('O email não está registrado'); </script>";
    }
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/MicrosoftTeams-image-removebg-preview.png">
    <title>Study+</title>
    <link rel="stylesheet" href="assets/css/login.css">
  </head>
  <body>
    <div class="logo">
        <img src="assets/img/MicrosoftTeams-image-removebg-preview.png">
      </a>
      <a href="index.html" class="toggle">Voltar</a>
    </div>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form method="post" action="login.php" class="sign-in-form">

              <div class="heading">
                <h2>Login</h2>
                <h6>Não tem cadastro?</h6>
                <a href="cadastro.php" class="toggle">Cadastrar</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    minlength="4"
                    name="email"
                    class="input-field"
                    autocomplete="off"
                    placeholder="Email"
                    required
                  />
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="senha"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    placeholder="Senha"
                    required
                  />
                </div>

                <input type="submit" value="Login" name="submit" class="sign-btn" />

                <p class="text">
                  Esqueceu a sua senha?
                  <a href="esqueceu.php">Esqueci a senha</a>
                </p>
              </div>
            </form>

            <div class="carousel">
                <img src="assets/img/undraw_true_friends_c-94-g.svg" class="image img-1 show" alt="" />
              </div>
  
      </main>
  </body>
</html>
