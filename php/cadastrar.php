<?php
include('conect.php');
if($_POST){
    if(isset($_POST['submit'])){
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
            header('Location: ../cadastro');
        }else{
            $sql = "INSERT INTO users VALUES (:cd, :name, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':cd', '');
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':password', $_POST['password']);
            if($stmt->execute()){
                echo "<h2>Cadastro realizado com sucesso!</h2><p>Aguarde, você será redirecionado automaticamente para a página inicial!</p>";
                echo '<meta http-equiv="refresh" content="3; url=../">';
            }
        }
    }
}