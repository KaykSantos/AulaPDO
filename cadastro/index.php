<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="../"><h2>Voltar</h2></a>
    <fieldset>
        <legend>Cadastro</legend>
        <form action="../php/cadastrar.php" method="post" name="frmcadastro">
            <input type="text" name="name" id="name" placeholder="Digite seu nome:">
            <br><br>
            <input type="email" name="email" id="email" placeholder="Digite seu email:">
            <br><br>
            <input type="password" name="password" id="password" placeholder="Digite sua senha:">
            <br><br>
            <button name="submit">Cadastrar</button>
        </form>
    </fieldset>
</body>
</html>