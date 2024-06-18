<?php
    session_start();
    $_SESSION['user_id'];
    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Restrita USer</title>
</head>
<body>
    <h1>Bem vindo a página Restrita do usuario</h1>
    <p>Somente usuários logados podem ver este conteúdo.</p>
    <a href="logout.php">Sair</a>
</body>
</html>