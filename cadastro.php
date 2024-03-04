<?php
session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "authentication") or die("Connection Failed");
$code = rand(999999, 111111);

if(isset($_POST["submit"])){
  $user = $_POST["user"];
  $email = $_POST["email"];
  $senha = md5($_POST["senha"]);
  $senha2 = md5($_POST["senha2"]);
  $duplicate = mysqli_query($conn, "SELECT * FROM cadastro WHERE user = '$user' or email = '$email'");
  if(mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Nome de usuário ou email inválidos ou em uso'); </script>";
  }
  else {
    if($senha == $senha2){
      $query = "INSERT INTO cadastro VALUES('', '$user', '$email', '$senha', $code = 0)";
      mysqli_query($conn, $query);
      echo 
      header("location: login.php");
      }
      else{
        echo
        "<script> alert('As senhas não combinam');</script>";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/MicrosoftTeams-image-removebg-preview.png">
    <title>Study+</title>
    <link rel="stylesheet" href="assets/css/login.css"/>
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
            <form method="post" action="cadastro.php" autocomplete="off" class="sign-in-form">

              <div class="heading">
                <h2>Cadastrar</h2>
                <h6>Já tem uma conta?</h6>
                <a href="login.php" class="toggle">Login</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    name="user"
                    class="input-field"
                    autocomplete="off"
                    placeholder="usuário"
                    required
                  />
                </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    name="email"
                    minlength="4"
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
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{3,}$"
                    title="Senha deve ter ao menos 1 maiúscula, 1 minúscula e 1 caracter especial"
                  />
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="senha2"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    placeholder="Confirme sua senha"
                    required
                    required 
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{3,}$"
                    title="Senha deve ter ao menos 1 maiúscula, 1 minúscula e 1 caracter especial"
                  />
                </div>
                
                

                <input type="submit" value="Cadastrar" class="sign-btn" name="submit"/>
              </div>
            </form>

            <div class="carousel">
                <img src="assets/img/register.svg" class="image img-1 show" alt="" />
              </div>
  
      </main>
  </body>
</html>

