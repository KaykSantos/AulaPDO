<?php
include('../php/conect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <style>
        p{
            font-size: 30px;
            font-weight: bolder;
            letter-spacing: 2px;
            margin-bottom: 0px;
        }
        td{
            border: 1px solid black;
            text-align: center;
        }
        #tb-id{
            width:40px;
        }
        #tb-nm{
            width:120px;
        }
        #tb-em{
            width:200px;
        }
        #tb-ex{
            width:50px;
        }
        a{
            text-decoration: none;
            color: red;
        }
        a:hover{
            text-decoration: underline;
        }
        button{
            margin: 5px;
        }
    </style>
</head>
<body>
    <a href="../"><h2>Voltar</h2></a>
    <p>Relatório</p>
    <?php
        $sql = "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
            if($stmt->rowcount() == 0){
                echo "<h2>Nenhum usuário cadastrado!</h2>";
            }else{
                echo "
                    <table>
                        <tr>
                            <td id='tb-id'>ID</td>
                            <td id='tb-nm'>Nome</td>
                            <td id='tb-em'>Email</td>
                            <td id='tb-ex'>Excluir</td>
                            <td id='tb-ed'>Editar</td>
                        </tr>
                ";
                foreach($stmt as $row){
                    echo "
                        <tr>
                            <td>".$row['cd']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                            <td><a href='?id=".$row['cd']."&type=delete'>Delete</a></td>
                            <td><a href='?id=".$row['cd']."&type=edit'>Editar</a></td>
                        </tr>
                    ";
                }
                echo "</table>";
            }
        }
    ?>
</body>
</html>
<?php
    if($_GET){
        if(isset($_GET['id'])){
            if($_GET['type'] == "delete"){
                echo '
                    <form action="../php/delete.php" method="post">
                        Deseja realmente excluir o usuário '.$_GET['id'].'?
                        <br>
                        <input hidden type="text" name="id" value="'.$_GET['id'].'">
                        <button name="submit-confirm">Confirmar</button><button name="submit-cancel">Cancelar</button>
                    </form>
                ';
            }else if($_GET['type'] == "edit"){
                $sql = "SELECT * FROM users WHERE cd = :cd";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':cd', $_GET['id']);
                if($stmt->execute()){
                    foreach($stmt as $row){
                        echo '
                            <form action="../php/edit.php" method="post">
                                Editando dados do usuário '.$row['cd'].'<br>
                                <input hidden type="text" name="cd" value="'.$row['cd'].'">
                                <input type="text" name="name" id="name" value="'.$row['name'].'">
                                <br><br>
                                <input type="email" name="email" id="email" value="'.$row['email'].'">
                                <br>
                                <button name="submit-confirm">Editar</button>
                                <button name="submit-cancel">Cancelar</button>
                            </form>
                        ';
                    }
                }
            }
        }
    }
?>