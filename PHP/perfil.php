<?php
    session_start();
    // include_once ("UpImg.php"); 
    //  if($msg == true){
    //     echo "<p> $msg </p>";
    //  }
    if(isset($_POST['enviar'])){
        $password = md5($_POST['password']);
        $password2 = md5($_POST['password2']);
    
            if ($_POST['password'] != $_POST['password2']) {
                $errors['password_error'] = 'As senhas não coincidem!';
            } else {
                $id = $_SESSION['id'];
                $updatePassword = "UPDATE cadastro SET senha = '$password' WHERE email = '$email'";
                $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
                header('location: quizz.php');
            }
    }
    if(isset($_POST['enviar'])){
        $email = $_POST['email'];
    
            if ($_POST['email'] == "") {
                $id = $_SESSION['id'];
                $updatePassword = "UPDATE cadastro SET email = '$email' WHERE email = '$email'";
                $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
                header('location: quizz.php');
                }
            }
    
    if(isset($_POST['enviar'])){
        $user = $_POST['user'];
    
            if ($_POST['user'] == "") {
                $id = $_SESSION['id'];
                $updatePassword = "UPDATE cadastro SET user = '$user' WHERE email = '$email'";
                $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
                header('location: quizz.php');
            }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/principal.css">
    <link rel="stylesheet" href="assets/css/perfil.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Study+</title>
</head>
<body>
        <nav>
            <form  action="principal.php">
            <div class="logo-name">
                <div class="logo-image">
                    <img src="assets/img/MicrosoftTeams-image-removebg-preview.png" alt="">
                </div>
    
                <span class="logo_name">Study+</span>
            </div>
    
            <div class="menu-items">
                <ul class="nav-links">
                    <li><a href="principal.php">
                        <i class="bx bx-home-alt icon"></i>
                        <span class="link-name">Inicio</span>
                    </a></li>
                    <li><a href="perfil.php">
                        <i class="bx bx-user-circle icon"></i>
                        <span class="link-name">Perfil</span>
                    </a></li>
            <li><a href="quiz.html">
                        <i class='bx bxs-hourglass-top' icon></i>
                        <span class="link-name">Quiz</span>
                    </a></li>

                    <li><a href="ranking.html">
                        <i class="bx bx-bar-chart-alt-2 icon"></i>
                        <span class="link-name">Ranking</span>
                    </a></li>
                </ul>
                
                <ul class="logout-mode">
                    <li><a href="logout.php">
                        <i class="bx bx-log-out icon"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
    
                    <div class="mode-toggle">
                    </div>
                </li>
                </ul>
            </div>
        </nav>

        <section class="dashboard">
        <div class="top2">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Editar perfil</h4>
    <form action="UpImg.php" method="POST" ectype="multipart/form-data">
    <div class="d-flex align-items-start py-3 border-bottom">
        <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
            class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section">
            <b>Foto de perfil</b>
            <p></p>
            <input type="file" class="btn border button" required name="arquivo"/>
        </div>
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6">
                <label for="firstname">User</label>
                <input type="text" class="bg-light form-control" name="user" value="<?php echo $_SESSION['user']?>">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="lastname">Email</label>
                <input type="text" class="bg-light form-control" name="email" value="<?php echo $_SESSION['email']?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="email">Senha antiga</label>
                <input type="text" class="bg-light form-control" name="password" placeholder="Senha antiga">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone">Nova senha</label>
                <input type="tel" class="bg-light form-control"  name="password2" placeholder="Nova senha">
            </div>
        </div>
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom">
            <button name="enviar" class="btn border button">Salvar</button>
            <button class="btn border button">Cancelar</button>
        </div>
    </div>
</div>
                  
    <script src="assets/js/script.js"></script>
</body>
</html>    
