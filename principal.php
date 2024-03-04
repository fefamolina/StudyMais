<?php 
      session_start();
      $conn = mysqli_connect("localhost" , "root" , "" , "authentication") or die("Connection Failed");
      if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM cadastro WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
      }
      else{
        header("location: login.php");
      }
?>
<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/principal.css">
     
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="shortcut icon" href="assets/img/MicrosoftTeams-image-removebg-preview.png">
    <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Study+</title>
</head>
<body>
    <nav>
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

</section>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="bx bx-search icon"></i>
                <input type="text" placeholder="Pesquise aqui">
            </div>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="bx bx-comment"></i>
                    <span class="text">Post</span>
                </div>
                </div>
                <ul class="posts" id="posts"></ul>
                <div class="boxes">     
            </div>
            <div class="wrapper">
                <div class="input-box">
                  <div class="tweet-area" name='post_text'>
                    <span class="placeholder">O que está acontecendo?</span>
                    <div class="input editable" contenteditable="true" spellcheck="false"></div>
                    <div class="input readonly" contenteditable="true" spellcheck="false"></div>
                  </div>
                </div>
                <div class="bottom">
                  <ul class="icons">
                    <li><i class="uil uil-capture"></i></li>
                    <li><i class='bx bxs-file-plus'></i></li>
                  </ul>
                  <div class="content">
                    <span class="counter">100</span>
                    <button name="add">Publicar</button>
                  </div>
                </div>
              </div>
            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Atividades recentes</span>
                </div>
        </div>
        <section>

    <script src="assets/js/script.js"></script>
</body>
</html>
