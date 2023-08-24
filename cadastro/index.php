<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

        form{
            background-color: white;
            width: 300px;
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

        form p{
            font-size: 25px;
            margin: 0px 15px;
            font-weight: bolder;
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
            width: 100px;
            height: 30px;
            margin: auto auto;
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
    </style>
</head>
<body>
    <header>
        <p>Cadastros</p>
        <a href="../">Voltar</a>
    </header>
    <main>
        <form action="../php/cadastrar.php" method="post" name="frmcadastro">
            <p>Cadastrar cliente</p>
            <input type="text" name="name" id="name" placeholder="Digite o nome:">
            
            <input type="email" name="email" id="email" placeholder="Digite o email:">
            
            <input type="password" name="password" id="password" placeholder="Digite a senha:">
            
            <button name="submit">Cadastrar</button>
        </form>        
    </main>
</body>
</html>