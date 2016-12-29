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
    </head>
    <body>
        <div class="container">
            <?php
            session_start();
            if (isset($_SESSION['nome']) and isset($_SESSION['senha'])) {
                ?>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active" ><a href="home.php">Home</a></li>
                            <li role="presentation"><a href="avaliar.php">Avaliar</a></li>
                            <li role="presentation"><a href="meusFuncionario.php">Meus
                                    Funcionarios</a></li>
                            <li role="presentation" ><a href="cadastrar.php">Cadastrar
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
                    </div><!-- /.container-fluid -->
                </nav>
                <div class="panel-body" style="background-color: #f5f5f5;">
                    <?php
                    include '../dao/FuncionarioDAO.php';

                    $func = new funcionario();

                    $res = $func->ranking();
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
                                            <th>Nota</th>
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
                                            <td><?php echo $row['nota'] ?></td>
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
                                <strong>Info!</strong> Não há Funcionários avaliados!
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
            </div>
            <!--<footer class="footer">
              <p class="copyrightFooter">Avaliação de funcionarios<a href="logout.php" class="pull-right">Sair</a> </p>
            </footer>-->
        </div>


        <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
