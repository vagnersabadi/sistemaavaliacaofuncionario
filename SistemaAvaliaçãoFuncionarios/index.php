<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">

        <title>Avalicao</title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/meuCSS.css" rel="stylesheet">
    </head>
    <body>

        <form action="dao/Controller.php" method="post">
     <input type="hidden" name="operacao" value="logar">



        <div class="container">
            <label><b>Nome</b></label>
            <input type="text" placeholder="Enter Username" name="nomeA" required>

            <label><b>Senha</b></label>
            <input type="password" placeholder="Enter Password" name="senhaA" required>

            <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <a href="paginas/cadastrar.php">Cadastre-se</a>
        </div>
    </form>


    <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
