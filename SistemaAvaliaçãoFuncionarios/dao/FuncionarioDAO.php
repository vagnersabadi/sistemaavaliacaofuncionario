<?php

  include 'ConexaoBD.php';

    class funcionario {

        public $idFuncionario;
        public $nomeFuncionario;
        public $funcaoFuncionario;
        public $FoneFuncionario;
        function inserir($id) {

            $bd = new ConexaoBD();
            $sql = "INSERT INTO funcionario(id_adm,nome,funcao,fone) "
                    . "VALUES ('$id','$this->nomeFuncionario','$this->funcaoFuncionario','$this->FoneFuncionario');";
            $bd->conectar();
            $bd->query($sql);
            $bd->fechar();

        }
        function mostrar($id) {
            $bd = new ConexaoBD();
            $bd->conectar();
            $sql = "SELECT * FROM funcionario WHERE id_adm='$id'";
            return $bd->query($sql);
            $bd->fechar();
        }

        function ranking() {
            $bd = new ConexaoBD();
            $bd->conectar();
            $sql = "SELECT f.id, f.nome, f.funcao, f.fone, a.idFuncionario, a.nota
                    FROM funcionario f, avaliacao a
                    WHERE f.id=a.idFuncionario
                    ORDER BY nota DESC
                    LIMIT 0,3;
                  ";

            return $bd->query($sql);
            $bd->fechar();
        }

        function mostrarAvaliacao($id) {
            $bd = new ConexaoBD();
            $bd->conectar();
            $sql = "SELECT *
                    FROM funcionario
                    WHERE id NOT IN
                    ( SELECT idFuncionario
                      FROM avaliacao
                    )
                  ";

            return $bd->query($sql);
            $bd->fechar();
        }


        function excluir($id) {
            $bd = new ConexaoBD();
            $sql = "DELETE FROM funcionario WHERE id='$id';";
            $bd->conectar();
            $bd->query($sql);
            $bd->fechar();
        }

        function mostrarAlterar($id) {
            $bd = new ConexaoBD();
            $bd->conectar();
            $sql = "SELECT * FROM funcionario WHERE id='$id';";
            return $bd->query($sql);
            $bd->fechar();
        }
        function alterar() {
            $bd = new ConexaoBD();
            $sql = "UPDATE funcionario SET nome='$this->nomeFuncionario',"
                    . "funcao='$this->funcaoFuncionario' ,"
                    . "fone='$this->FoneFuncionario'  WHERE id='$this->idFuncionario';";
            $bd->conectar();
            return $bd->query($sql);
            $bd->fechar();
        }

}
?>
