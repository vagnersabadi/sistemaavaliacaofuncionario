<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produto</title>
        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div>
            <?php
            include './AdministradorDAO.php';
            include './FuncionarioDAO.php';
            include './AvaliacaoDAO.php';

            $operacao = $_POST["operacao"]; //operação input
            //inicialização objetos
            $adm = new administrador();
            $func = new funcionario();
            $ava = new Avaliacao;

            switch ($operacao) {
                
                case "avaliar":
                    $ava->idFuncionario = $_POST["idFuncionario"];
                    $ava->nota = $_POST["nota"];
                    
                    $ava->inserir();
                    echo"ok";
                    break;

                case "cadastroAdm":
                    $nome = $_POST["nome"];
                    $senha = $_POST["senha"];

                    $adm->nome = $nome;
                    $adm->senha = $senha;

                    $adm->inserir();
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../index.php'>";
                    break;

                case "cadastroFun":
                    $nome = $_POST["nome"];
                    $funcao = $_POST["funcao"];
                    $fone = $_POST["fone"];

                    session_start();
                    $id = $_SESSION['idA'];

                    $func->nomeFuncionario = $nome;
                    $func->funcaoFuncionario = $funcao;
                    $func->FoneFuncionario = $fone;

                    $func->inserir($id);
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../paginas/home.php'>";
                    break;

                case "cadastroNotas":
                    $ava->idFuncionario = $_POST["idFuncionario"];
                    $ava->nota = $_POST["nota"];
                    ;
                    $ava->inserir();
                    echo"ok";
                    break;

                case "logar":
                    $senhaA = $_POST["senhaA"];
                    $nomeA = $_POST["nomeA"];
                    $nomeBanco = null;
                    $senhaBanco = null;
                    $idBanco = null;

                    $resutado = $adm->buscaUser($nomeA, $senhaA);

                    while ($linha = mysqli_fetch_assoc($resutado)) {
                        $nomeBanco = $linha['nome'];
                        $senhaBanco = $linha['senha'];
                        $idBanco = $linha['id'];
                    }
                    if ($nomeA == $nomeBanco) {
                        if ($senhaA == $senhaBanco) {
                            session_start();
                            $_SESSION['nome'] = $nomeBanco;
                            $_SESSION['senha'] = $senhaBanco;
                            $_SESSION['idA'] = $idBanco;
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../paginas/home.php'>";
                        } else {
                            ?>
                            <h1>
                                <div class="alert alert-info">
                                    <strong>Senha Errada!</strong>
                                    <a href="../index.php">Clique aqui</a> para fazer login
                                </div>
                            </h1>"
                            <?php
                        }
                    } else {
                        ?>
                        <h1>
                            <div class="alert alert-info">
                                <strong>Nome Errado!</strong>
                                <a href="../index.php">Clique aqui</a> para fazer login
                            </div>
                        </h1>
                        <?php
                    }

                    break;

                case "editarFun":
                    $nome = $_POST["nome"];
                    $codigo = $_POST["codigo"];
                    $funcao = $_POST["funcao"];
                    $fone = $_POST["fone"];

                    $func->idFuncionario = $codigo;
                    $func->nomeFuncionario = $nome;
                    $func->funcaoFuncionario = $funcao;
                    $func->FoneFuncionario = $fone;

                    $func->alterar();
                    session_start();

                    $_SESSION['mensagem'] = 'Funcionario alterado com sucesso';
                    $_SESSION['local'] = '../paginas/meusFuncionario.php';

                    echo "<meta http-equiv='refresh'
					content='0;url=../paginas/jquerymodal.php?numero=1'>";
                    break;

                case "Excluir"://botao de meusFuncionarios.php
                    $codigo = $_POST["codigo"];

                    echo "<meta http-equiv='refresh'
	            content='0;url=../paginas/jquerymodal.php?numero=2&codigo=$codigo'>";
                    break;
                
                case "Sim"://confirmação da exclusaõ vindo do jquerymodal
                    session_start();
                    $codigo = $_POST["codigo"];
                    $func->excluir($codigo);

                    $_SESSION['mensagem'] = 'Funcionario excluído com sucesso';
                    $_SESSION['local'] = '../paginas/meusFuncionario.php';
                    echo "<meta http-equiv='refresh'
					content='0;url=../paginas/jquerymodal.php?numero=1'>";
                    break;

                case "cadastroNotas":
                    session_start();
                    $codigo = $_POST["codigo"];
                    $func->excluir($codigo);

                    $_SESSION['mensagem'] = 'Funcionario excluído com sucesso';
                    $_SESSION['local'] = '../paginas/meusFuncionario.php';
                    echo "<meta http-equiv='refresh'
					content='0;url=../paginas/jquerymodal.php?numero=1'>";
                    break;
            }
            ?>

        </div>
        <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
