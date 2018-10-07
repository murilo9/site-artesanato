CREATE DATABASE dbCoelho;
USE dbCoelho;
CREATE TABLE tbCategorias(
	stNome VARCHAR(30) NOT NULL,
    PRIMARY KEY (stNome)
) ENGINE=innodb;

CREATE TABLE tbItens(
	itId INT AUTO_INCREMENT,
    stNome VARCHAR(60) NOT NULL,
    stCategoria VARCHAR(30) NOT NULL,
    stFoto VARCHAR(80) DEFAULT 'none',
    PRIMARY KEY (itId),
    FOREIGN KEY (stCategoria) REFERENCES tbCategorias(stNome)
) ENGINE=innodb;

CREATE TABLE tbAdmins(
	stLogin VARCHAR(30) NOT NULL,
    stSenha VARCHAR(20) NOT NULL,
    PRIMARY KEY (stLogin)
) ENGINE=innodb;
