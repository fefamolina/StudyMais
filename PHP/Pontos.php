<?php
    session_start();

    $ResIngles = $_POST['PtsIngles'];
    $ResPort = $_POST['PtsPort'];
    $ResMat = $_POST['PtsMat'];
    $ResTud = $_POST['PtsTud'];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "cadastro";

    $conn = new mysqli($host, $user, $pass, $db);

    function SomarPts()
    {
        $TotalPts = $conn->query("SELECT pontos FROM cadastro");

        if(isset($ResIngles))
        {
            $TotalPts += $ResIngles;
        }
        if(isset($ResMat))
        {
            $TotalPts += $ResMat;
        }
        if(isset($ResPort))
        {
            $TotalPts += $ResPort;
        }
        if(isset($ResTud))
        {
            $TotalPts += $ResTud;
        }

        $AtlPts = "INSERT INTO cadastro (pontos) VALUES ('$TotalPts')";

        $conn->query($AtlPts);
        $conn->close();

        echo "$TotalPts";
    }

?>
