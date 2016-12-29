<?php

class Avaliacao {

    public $idFuncionario;
    public $nota;

    function inserir() {
        $bd = new ConexaoBD;
        $sql = "INSERT INTO avaliacao (idFuncionario, nota)
                VALUES ('$this->idFuncionario', '$this->nota')";
        $bd->conectar();
        $bd->query($sql);
        $bd->fechar();
    }

    function mostrar() {
        $bd = new ConexaoBD;
        $bd->conectar();
        return $bd->query("SELECT * FROM avaliacao");
        $bd->fechar();
    }

}

?>
