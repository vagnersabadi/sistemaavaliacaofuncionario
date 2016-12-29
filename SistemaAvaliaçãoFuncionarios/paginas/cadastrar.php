<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">

        <title>zsuper</title>

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/meuCSS.css" rel="stylesheet">
    </head>
    <body>

        <div id="main" class="container-fluid">
            <div class="form-group">
                <div class="alert alert-info">
                    <strong><h2>Cadastro</h2></strong>
                </div>
            </div>
            <form action="../dao/Controller.php" method="post">
                <input type="hidden" name="operacao" value="cadastroAdm">


                <div class="container">
                    <label><b>Nome</b></label>
                    <input type="text" placeholder="Enter Username" name="nome" required>

                    <label><b>Senha</b></label>
                    <input type="password" placeholder="Enter Password" name="senha" required>

                    <button type="submit" class="btn btn-primary" value="cadastroAdm">Adicionar</button>
                </div>

                    <a href="../index.php" class="btn btn-default">Voltar</a>
            </form>

            <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
            <script src="../js/jquery-3.1.1.js"></script>
            <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
