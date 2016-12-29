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
        $nomeAdm = $_SESSION['nome'];
        $senhaAdm = $_SESSION['senha'];
        $idAdm = $_SESSION['idA'];

        if (isset($nomeAdm) and isset($senhaAdm)) {
        ?>

                <nav class="navbar navbar-default">
                    <ul class="nav nav-tabs">
                        <li role="presentation" ><a href="home.php">Home</a></li>
                        <li role="presentation" class="active"><a href="#">Avaliar</a></li>
                        <li role="presentation" ><a href="meusFuncionario.php">Meus
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
                    <?php
                    include '../dao/AdministradorDAO.php';
                    include '../dao/FuncionarioDAO.php';

                    $adm = new administrador();
                    $id = null;


                    $func = new funcionario();

                        $res = $func->mostrarAvaliacao($idAdm);
                    if ($res->num_rows>0) {//verifiaca se possui funcionarios                            ?>


                                <div class="table-responsive col-md-12">
                                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Função</th>
                                                <th>Fone</th>
                                                <th>Nota</th>
                                                <th>Avaliar</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $name = 0;

                                            while ($row = mysqli_fetch_assoc($res)) {
                                                ?>
                                              <form  id="form<?=$row['id']?>"  class="formAvaliacao" method="post">
                                                <tr>
                                                    <td><?php echo $row['nome'] ?></td>
                                                    <td><?php echo $row['funcao'] ?></td>
                                                    <td><?php echo $row['fone'] ?></td>
                                                    <td>
                                                        <select name="nota" class="dropdown" required>
                                                        <option selected="selected" value="">Selecione uma Nota</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                      </select>
                                                    </td>
                                                    <td>
                                                      <input type="hidden" name="idFuncionario" value="<?=$row['id']?>"/>
                                                      <input type="hidden" name="operacao" value="avaliar"/>
                                                      <input id="<?=$row['id']?>" type="submit" class="button_send btn btn-primary" value="Avaliar">
                                                    </td>
                                                </tr>
                                              </form>

                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div id="status" class=""></div>
                                </div>
                                <div>



                                </div>


                            <?php
                        } else {
                            ?>
                            <h1>
                                <div class="alert alert-info">
                                    <strong>Info!</strong> Não há funcionários para avaliar!
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
      </div>

        <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/meuJS.js"></script>

    </body>
</html>
