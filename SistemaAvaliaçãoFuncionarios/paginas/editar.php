<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">

        <title>zsuper</title>

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div id="main" class="container-fluid">
            <div class="form-group">

                <div class="alert alert-info">
                    <strong><h2>Editar</h2></strong>
                </div>

            </div>
            <hr />
            <div id="top" class="row form-group">

                <form action="../dao/Controller.php" method="post">
                    <?php
                    include "../dao/FuncionarioDAO.php";
                    include '../dao/AdministradorDAO.php';
                    $codigo = $_GET["codigo"];

                    $obj = new funcionario();
                    $resultado = $obj->mostrarAlterar($codigo);

                    if ($resultado) {
                        while ($linha = mysqli_fetch_assoc($resultado)) {
                            $codigo = $linha['id'];
                            $nome = $linha['nome'];
                            $funcao = $linha['funcao'];
                            $fone = $linha['fone'];
                        }
                    }
                    ?>
                    <input type="hidden" name="operacao" value="editarFun">
                    <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">

                    <div class="col-lg-10">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="nome">Nome</label>
                                <input type="text"class="form-control" id="nome"
                                       name="nome" value="<?php echo $nome; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="senha">Função</label>
                                <input type="text"class="form-control" id="funcao" name="funcao" value="<?php echo $funcao; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="senha">Telefone</label>
                                <input type="text" class="form-control" id="fone" name="fone" value="<?php echo $fone; ?>">
                            </div>
                        </div>
                        <div id="actions" class="form-group col-md-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" value="editarFun">Adicionar</button>
                                <a href="meusFuncionario.php" class="btn btn-default">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
                <hr/>
            </div>
        </div>

        <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
