<?php
include('conect.php');

if($_POST){
    if(isset($_POST['submit-confirm'])){
        $sql = "DELETE FROM users WHERE cd = :cd";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cd', $_POST['id']);
        if($stmt->execute()){
            echo "<h2>Usuário deletado com sucesso!</h2><p>Aguarde, você será redirecionado automaticamente para a página de relatórios!</p>";
            echo '<meta http-equiv="refresh" content="3; url=../relatorio/">';
        }
    }else if(isset($_POST['submit-cancel'])){
        header('Location: ../relatorio');
    }
}
?>