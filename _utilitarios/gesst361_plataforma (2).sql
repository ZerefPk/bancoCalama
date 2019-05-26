-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 15-Maio-2019 às 08:38
-- Versão do servidor: 5.6.41-84.1
-- versão do PHP: 7.2.7



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gesst361_plataforma`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--
CREATE DATABASE banco_curriculo;
USE banco_curriculo;

CREATE TABLE `aluno` (
  `idAluno` int(11) AUTO_INCREMENT,
  `nome` varchar(225) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `curso` varchar(60) NOT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `acesso` date NOT NULL,
  `objetivo_prof` text NOT NULL,
  `experiencia_prof` text NOT NULL,
  `extensao` text,
  `foto` varchar(255) NOT NULL,
  `disponibilidade` varchar(40) NOT NULL,
  `escolaridade` varchar(255) NOT NULL,
  `status_civil` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `idioma` varchar(255) NOT NULL,
  
  CONSTRAINT pk_aluno
  PRIMARY KEY (idAluno)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estrutura da tabela `cpf_alunos`
--

CREATE TABLE `cpf_alunos` (
  `idCPF` int(11) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  
  CONSTRAINT pk_cpf
  PRIMARY KEY (idCPF)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `Id` int(11) AUTO_INCREMENT,
  `nome` varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `ramo` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `razao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  
  
  CONSTRAINT pk_empresa
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `ID_vaga` int(11) AUTO_INCREMENT,
  `cargo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `numerovagas` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `cargahoraria` int(11) NOT NULL,
  `especialidade` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `periodo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `remuneracao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ID_empresa` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `requisitos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  

  CONSTRAINT pk_vagas
  PRIMARY KEY (ID_vaga),
  
  CONSTRAINT fk_empresa
  FOREIGN KEY (ID_empresa)
  REFERENCES empresa(Id)
  ON DELETE CASCADE ON UPDATE CASCADE  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `vagas`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
CREATE TABLE candidato (
id_candidato INT AUTO_INCREMENT,
aluno_id_aluno int(11)  NOT NULL,
vaga_id_vaga INT(11)  NOT NULL,
data_candidato TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 

CONSTRAINT pk_candidato
  PRIMARY KEY (id_candidato),

CONSTRAINT fk_vaga_candidato
  FOREIGN KEY (vaga_id_vaga)
  REFERENCES vagas(Id_vaga),
  
  CONSTRAINT fk_aluno_candidato
  FOREIGN KEY (aluno_id_aluno)
  REFERENCES aluno(idAluno)
)ENGINE=InnoDB CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
