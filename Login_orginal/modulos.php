<?php
    require_once('db.php');
    require_once('cadastro.php');
    


    function insertUser($nome, $email, $pass, $admin = 0){
        global $conn;

        try{
            $stmt = $conn->prepare("INSERT INTO users (nome, email, password, admin) VALUES (:nome,:email, :password, :admin)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $pass);
            $stmt->bindParam(":admin", $admin);
            $stmt->execute();
        } catch (PDOException $e){
            echo "Erro ao inserir usuário: " . $e->getMessage();
        }
    }

    function selectUser($email, $pass){
        global $conn;

        try{
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute((['email' => $email]));
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if($user && password_verify($pass, $user['password'])){
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e){
            return false;
        }


    }

?>