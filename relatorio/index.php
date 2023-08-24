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
        *{
            margin: 0px;
            padding: 0px;
            font-family: Arial;
        }

        header{
            height: 70px;
            width: 100vw;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            background-color: black;
        }

        header p{
            color: white;
            font-size: 25px;
            letter-spacing: 2px;
            margin: 0px 15px;
            font-weight: bolder;
        }

        header a{
            text-decoration: none;
            color: white;
            font-size: 25px;
            letter-spacing: 2px;
            margin: 0px 15px;
            font-weight: bolder;
        }

        header a:hover{
            text-decoration: underline;
        }

        main{
            width: 100vw;
            height: calc(100vh - 70px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgb(240, 240, 240);
        }

        .container{
            background-color: white;
            width: 550px;
            height: auto;
            padding: 20px 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            text-align: center;
            -webkit-box-shadow: 0px 0px 26px -8px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 26px -8px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 26px -8px rgba(0,0,0,0.75);
        }

        input{
            margin: 15px 0px;
            outline: none;
            border: none;
            border-bottom: 1px solid black;
            padding: 4px;
            font-size: 16px;
        }

        button{
            cursor: pointer;
            outline: none;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bolder;
            letter-spacing: 1px;
            background-color: black;
            color: white;
        }

        p{
            font-size: 30px;
            font-weight: bolder;
            letter-spacing: 2px;
            margin-bottom: 0px;
        }
        td{
            border: 1px solid black;
            text-align: center;
            padding: 3px;
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
            width:70px;
        }
        #tb-ed{
            width: 70px;
        }
        a{
            text-decoration: none;
            color: black;
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
    <header>    
        <p>Relatório</p>
        <a href="../">Voltar</a>
    </header>
    <main>
        <?php
            $sql = "SELECT * FROM users";
            $stmt = $pdo->prepare($sql);
            if($stmt->execute()){
                if($stmt->rowcount() == 0){
                    echo "<h2>Nenhum usuário cadastrado!</h2>";
                }else{
                    echo "
                    <div class='container'>
                        <h3>Usuários cadastrados:</h3>
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
                    echo "</table></div>";
                }
            }
        ?>
    </main>
    
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