<?php
    $msg = false;

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "authentication";

    $conn = new mysqli($host, $user, $pass, $db) or die("Banco de dados OFF.");

    if(isset($_FILES['arquivo']))
    {
        $extensao = strtolower(strrchr($_FILES['arquivo']['name'], '.'));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "upload/";

        move_upload_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

        $sql = "INSERT INTO foto (id, arquivo, data) VALUES(NULL, '$novo_nome', NOW())";

        if($mysqli->query($sql))
        {
            $msg = "Arquivo enviado.";
        }else
        {
            $msg = "Falha ao enviar o arquivo.";
        }
    }
?>