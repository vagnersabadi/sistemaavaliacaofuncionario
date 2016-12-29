<?php

// include 'ConexaoBD.php';

class administrador {

    public $nome;
    public $senha;

    function inserir(){
				$bd = new ConexaoBD;
				$sql = "INSERT INTO login (nome, senha) VALUES ('$this->nome', '$this->senha')";
				$bd->conectar();
				$bd->query($sql);
				$bd->fechar();
			}

    function buscaUser($nomeAdm, $senhaAdm) {

        $bd = new ConexaoBD();
        $bd->conectar();
        $sql = "SELECT * FROM login WHERE nome='{$nomeAdm}' AND senha='{$senhaAdm}';";
        return $bd->query($sql);
        $bd->fechar();
    }

}

?>
