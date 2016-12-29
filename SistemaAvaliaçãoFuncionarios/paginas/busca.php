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
    </head>
    <body>
      <div class="container">
        <div class="row">
            <h2><label>Resultado da Busca</label></h2>
            <?php
            include '../dao/ConexaoBD.php';

            $bd = new ConexaoBD();
            $bd->conectar();

            $cursos = $_POST['palavra'];

            $sql = "SELECT * FROM funcionario WHERE nome LIKE '%$cursos%'";
            $res = $bd->query($sql);
            $bd->fechar();

            if ($res->num_rows > 0) {
                ?>
                <form action="../dao/Controller.php" method="post">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Função</th>
                                    <th>Fone</th>
                                    <th>#</th>
                                </tr>
                            </thead>


                            <?php
                            while ($rows = mysqli_fetch_assoc($res)) {
                                ?>


                                <tbody>


                                <input type="hidden" name="codigo" value="<?php echo $rows['id'] ?>">
                                <tr>
                                    <td><?php echo $rows['nome'] ?></td>
                                    <td><?php echo $rows['funcao'] ?></td>
                                    <td><?php echo $rows['fone'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href=../paginas/editar.php?codigo=<?php echo $rows['id'] ?>>Editar</a>
                                        <input type="submit" class="btn btn-danger" name="operacao" value="Excluir"/>
                                    </td>
                                </tr>

                                </tbody>
                                <?php
                            }
                        } else {
                            ?>
                            <h1>
                                <strong>Info!</strong> Não há Funcionários com estes caracteres!
                            </h1>
                            <?php
                        }
                        ?>
                    </table>

                </div>
            </form>


        </div>


      </div>
      <!-- END CONTAINER -->
    </body>
</html>
