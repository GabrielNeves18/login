<?php

    session_start();
    require_once('modulos.php');
        
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $email = $_POST['emailLogin'];
        $pass = $_POST['passwordLogin'];

        $user = selectUser($email, $pass);
        if($user){
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['login_success'] = 'Login realizado com sucesso!';
            header('Location: user.php');
            exit();
        } else{
            $_SESSION['login_error'] = 'Email ou senha inválidos.';
            header('Location: index.php');
            exit();
        }
    }