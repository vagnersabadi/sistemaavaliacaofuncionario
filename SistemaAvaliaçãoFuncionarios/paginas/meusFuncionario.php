<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/meuJS.js"></script>
    </head>
    <body>
      <div class="container">
        <?php
        session_start();
        $nomeAdm = $_SESSION['nome'];
        $senhaAdm = $_SESSION['senha'];
        $idAdm = $_SESSION['idA'];


        if (isset($nomeAdm) and isset($senhaAdm)) {
            ?>


                <nav class="navbar navbar-default">

                    <ul class="nav nav-tabs">
                        <li role="presentation" ><a href="home.php">Home</a></li>
                        <li role="presentation"><a href="avaliar.php">Avaliar</a></li>
                        <li role="presentation" class="active"><a href="#">Meus
                                Funcionarios</a></li>
                        <li role="presentation" ><a href="addFuncionarios.php">Cadastrar
                                Funcionarios</a></li>
                        <div  class="pull-right" style="margin-top: 10px; margin-right: 10px;">
                            <div class="btn-group" role="group">


                                <a class="dropdown-toggle" data-toggle="dropdown" >
                                    <div class="glyphicon glyphicon-user  ">
                                        <strong><?php echo $_SESSION['nome']; ?></strong>
                                    </div>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logoff</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>

                </nav>
                <div class="panel-body" style="background-color: #f5f5f5;">
                    <form method="POST" action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" name="pesquisa" id="pesquisa" placeholder="Pesquisar" value="">
                        </div>
                    </form>

                    <?php
                    //include '../dao/AdministradorDAO.php';
                    include '../dao/FuncionarioDAO.php';

                    $func = new funcionario();

                    $res = $func->mostrar($idAdm);
                    if ($res->num_rows > 0) {//verifiaca se possui funcionarios
                        ?>
                        <form action="../dao/Controller.php" method="post">

                            <div class="table-responsive col-md-12" id="tab">
                                <table class="table table-striped" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Função</th>
                                            <th>Fone</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $codigo = $row['id'];
                                            ?>
                                        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
                                        <tr>
                                            <td><?php echo $row['nome'] ?></td>
                                            <td><?php echo $row['funcao'] ?></td>
                                            <td><?php echo $row['fone'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href=editar.php?codigo=<?php echo $codigo ?>>Editar</a>
                                                <input type="submit" class="btn btn-danger" name="operacao" value="Excluir"/>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </form>

                        <?php
                    } else {
                        ?>
                        <h1>
                            <div class="alert alert-info">
                                <strong>Info!</strong> Não há Funcionários
                            </div>
                        </h1>
                        <?php
                    }
                    ?>

                    <?php
                } else {
                    ?>
                    <h1>
                        <div class="alert alert-info">
                            <strong>Erro Login!</strong> <a href="../index.php">Click aqui</a> para fazer login
                        </div>
                    </h1>

                    <?php
                }
                ?>
                <ul class="resultado">
                </ul>

              </div>

              </div>
            <!-- END CONTAINER -->

    </body>
</html>
