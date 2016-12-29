create database avaliacao;
  
CREATE TABLE `login` (
`id` INT NOT NULL AUTO_INCREMENT ,
`nome` VARCHAR(50) NOT NULL ,
`senha` VARCHAR(50) NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE funcionario (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`id_adm` INT NOT NULL , 
`nome` VARCHAR(50) NOT NULL , 
`funcao` VARCHAR(100) NOT NULL ,
`fone` INT NOT NULL ,
CONSTRAINT `fk_adm`
    FOREIGN KEY (id_adm) REFERENCES login (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
  ) ENGINE = InnoDB;

CREATE TABLE avaliacao (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`idFuncionario` INT NOT NULL ,
`nota` INT NOT NULL ,
CONSTRAINT `fk_idu`
    FOREIGN KEY (idFuncionario) REFERENCES funcionario(id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
  ) ENGINE = InnoDB;