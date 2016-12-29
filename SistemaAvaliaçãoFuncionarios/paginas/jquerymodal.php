<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </head>

    <body>
        <div>
            <?php
            $numero = $_GET["numero"];
            session_start();
            if ($numero == 1) {
                ?>
                <!-- Modal -->
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><?php echo $_SESSION['mensagem']; ?></h4>
                            </div>

                            <div class="modal-footer">
                                <a class="btn btn-default" href="<?php echo $_SESSION['local']; ?>">Ok</a>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    $('document').ready(function () {
                        $('#myModal1').modal('show');
                    })
                </script>
                <?php
            }
            if ($numero == 2) {
                $codigo = $_GET["codigo"];
                ?>
                <!-- Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title" id="myModalLabel">Deseja realmente excluir?</h4>
                            </div>

                            <div class="modal-footer">
                                <form class="form-horizontal" role="form" method="post" action="../dao/Controller.php">
                                    <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                                    <input type="submit" class="btn btn-danger" name="operacao" value="Sim"/>
                                    <a class="btn btn-primary" href="meusFuncionario.php">Não</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $('document').ready(function () {
                        $('#myModal2').modal('show');
                    })
                </script>

                <?php
            }
            ?>

        </div>

    </body>
</html>
