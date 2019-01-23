-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 10-Dez-2018 às 21:17
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemath`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `ID_Avaliacao` int(11) NOT NULL,
  `ID_Prestador` varchar(11) NOT NULL,
  `ID_Solicitante` varchar(11) NOT NULL,
  `ID_SOLICITACAO` varchar(11) NOT NULL,
  `User_Prestador` varchar(20) NOT NULL,
  `Data` varchar(20) NOT NULL,
  `Q1` varchar(105) NOT NULL,
  `Q2` varchar(105) NOT NULL,
  `Q3` varchar(105) NOT NULL,
  `Q4` varchar(105) NOT NULL,
  `Q5` varchar(105) NOT NULL,
  `Q6` varchar(105) NOT NULL,
  `Q7` varchar(105) NOT NULL,
  `Q8` varchar(105) NOT NULL,
  `Q9` varchar(105) NOT NULL,
  `Q10` varchar(105) NOT NULL,
  `Q11` varchar(105) NOT NULL,
  `Q12` varchar(105) NOT NULL,
  `Q13` varchar(105) NOT NULL,
  `Q14` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`ID_Avaliacao`, `ID_Prestador`, `ID_Solicitante`, `ID_SOLICITACAO`, `User_Prestador`, `Data`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `Q13`, `Q14`) VALUES
(1, '45', '33', '1', 'Alessandra', '15-11-2018', 'Nem satisfeito, nem insatisfeito', 'Nem satisfeito, nem insatisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Insatisfeito', '', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', ' 						\r\n					', '10'),
(2, '45', '33', '2', 'Alessandra', '22-11-2018', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Insatisfeito', 'Sim', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', 'Tudo Otimo 						\r\n					', '10'),
(3, '45', '33', '1', 'Alessandra', '24-11-2018', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Insatisfeito', '', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', ' 						\r\n					', '10'),
(4, '41', '33', '7', 'Luan@', '24-11-2018', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Satisfeito', '', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', ' 						\r\n					', '10'),
(6, '45', '33', '8', 'Alessandra', '25-11-2018', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'NÃ£o', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', ' 						\r\n					', '1'),
(7, '45', '33', '1', 'Alessandra', '02-12-2018', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', '', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', ' 						\r\n					', '1'),
(8, '19', '33', '2', 'edu@', '08-12-2018', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', 'Muito Satisfeito', '', 'Sim', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', 'Concordo completamente', ' 						\r\n					', '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivo`
--

CREATE TABLE `motivo` (
  `ID` int(11) NOT NULL,
  `Motivo` varchar(255) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Data` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `motivo`
--

INSERT INTO `motivo` (`ID`, `Motivo`, `Username`, `Data`) VALUES
(1, '', 'SistemaTH', '19-11-2018'),
(2, '', 'SistemaTH', '19-11-2018'),
(3, '', 'SistemaTH', '19-11-2018'),
(4, '', 'SistemaTH', '19-11-2018'),
(5, '', 'SistemaTH', '19-11-2018'),
(6, '', 'SistemaTH', '19-11-2018'),
(7, '', 'SistemaTH', '19-11-2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `ID_Solicitacao` int(11) NOT NULL,
  `CD_Prestador` int(11) NOT NULL,
  `ID_Solicitante` int(11) NOT NULL,
  `Responsavel` varchar(255) NOT NULL,
  `User_Solicitante` varchar(20) NOT NULL,
  `NM_Solicitante` varchar(255) NOT NULL,
  `EmailSolicitante` varchar(105) NOT NULL,
  `Tel1Solicitante` varchar(20) NOT NULL,
  `TEl2Solicitante` varchar(20) NOT NULL,
  `Cep` varchar(20) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Complemento` varchar(155) NOT NULL,
  `Bairro` varchar(255) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `GU` varchar(100) NOT NULL,
  `Agendamento` varchar(20) NOT NULL,
  `Des` varchar(255) NOT NULL,
  `NM_Prestador` varchar(255) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Graduacao` varchar(100) NOT NULL,
  `Curso` varchar(100) NOT NULL,
  `Data` varchar(10) NOT NULL,
  `Hora` varchar(10) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Resposta` varchar(255) DEFAULT NULL,
  `DTHRSugerida` varchar(20) DEFAULT NULL,
  `FormadeCobranca` varchar(30) DEFAULT NULL,
  `Valor` varchar(20) DEFAULT NULL,
  `User_Prestador` varchar(20) NOT NULL,
  `Ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`ID_Solicitacao`, `CD_Prestador`, `ID_Solicitante`, `Responsavel`, `User_Solicitante`, `NM_Solicitante`, `EmailSolicitante`, `Tel1Solicitante`, `TEl2Solicitante`, `Cep`, `Endereco`, `Complemento`, `Bairro`, `Categoria`, `Tipo`, `GU`, `Agendamento`, `Des`, `NM_Prestador`, `Area`, `Graduacao`, `Curso`, `Data`, `Hora`, `Status`, `Resposta`, `DTHRSugerida`, `FormadeCobranca`, `Valor`, `User_Prestador`, `Ativo`) VALUES
(1, 45, 33, 'Matheus DurÃ£es da Silva', 'Theus_1903', 'Matheus DurÃ£es da Silva', 'duraes96matheus@gmail.com', '(11)2058-4560', '(11)9687-31333', '08071-100', 'Rua CatlÃ©ias', '48', 'Jardim Nair', 'ASSISTÃŠNCIA TÃ‰CNICA EM CASA ', 'OUTROS', '1', '', ' 								\r\n					', 'Alessandra Daiane das Neves', 'EletrÃ´nica', 'Bacharelado', 'EletrÃ´nica', '02-12-2018', '16:04', 'Pendente', NULL, NULL, NULL, NULL, 'Alessandra', 0),
(2, 19, 33, 'Matheus DurÃ£es da Silva', 'Theus_1903', 'Matheus DurÃ£es da Silva', 'duraes96matheus@gmail.com', '(11)2058-4560', '(11)9687-31333', '08071-100', 'Rua CatlÃ©ias', '48', 'Jardim Nair', 'ASSISTÃŠNCIA TÃ‰CNICA EM CASA ', 'OUTROS', '1', '', ' 								\r\n					', 'Eduardo DurÃ£es', 'Informatica', 'Tecnico', 'Tecnico em Informatica', '08-12-2018', '14:34', 'Pendente', NULL, NULL, NULL, NULL, 'edu@', 0),
(3, 45, 33, 'Matheus DurÃ£es da Silva', 'Theus_1903', 'Matheus DurÃ£es da Silva', 'duraes96matheus@gmail.com', '(11)2058-4560', '(11)9687-31333', '08071-100', 'Rua CatlÃ©ias', '48', 'Jardim Nair', 'ASSISTÃŠNCIA TÃ‰CNICA EM CASA ', 'OUTROS', '1', '', ' 								\r\n					', 'Alessandra Daiane das Neves', 'Informatica', 'Mestrado', 'EletrÃ´nica', '08-12-2018', '14:47', 'Pendente', NULL, NULL, NULL, NULL, 'Alessandra', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contatos`
--

CREATE TABLE `tb_contatos` (
  `ID` int(11) NOT NULL,
  `TIPO` varchar(30) NOT NULL,
  `DS_Nome` varchar(255) NOT NULL,
  `DS_Email` varchar(155) NOT NULL,
  `Tel_Contato` varchar(20) DEFAULT NULL,
  `GU` varchar(5) DEFAULT NULL,
  `DS_Msg` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_contatos`
--

INSERT INTO `tb_contatos` (`ID`, `TIPO`, `DS_Nome`, `DS_Email`, `Tel_Contato`, `GU`, `DS_Msg`) VALUES
(1, 'Elogios', 'dsaa', 'asddddddddddd', '(', '', '							\r\n									'),
(2, 'Duvidas', 'Matheus DurÃ£es ', 'duraes96matheus@gmail.com', '(11)2058-4560', '10', '							\r\n									'),
(3, 'Elogios', 'ssssssssss', 's@gmmaio.com', '(11)1111-11111', '', '							\r\n									'),
(4, 'Elogios', 'Matheus DurÃ£es ', 'duraes96matheus@gmail.com', '(11)1111-11111', '10', 'dsa							\r\n									'),
(5, 'Elogios', 'saaaaaaaa', 'duraes96matheus@gmail.com', '(11)1111-11111', '', '							\r\n									'),
(6, 'Elogios', 'Matheus DurÃ£es da Silva', 'duraes96matheus@gmail.com', '(11)2058-4560', '10', 'Sla							\r\n									');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reportacao`
--

CREATE TABLE `tb_reportacao` (
  `ID_Reportacao` int(11) NOT NULL,
  `DS_Nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `DS_Email` varchar(155) CHARACTER SET latin1 NOT NULL,
  `Telefone_Contato` varchar(20) CHARACTER SET latin1 NOT NULL,
  `G_Urgencia` varchar(5) CHARACTER SET latin1 NOT NULL,
  `Tipo_Contato` varchar(30) CHARACTER SET latin1 NOT NULL,
  `DS_Msg` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `Arquivos` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_reportacao`
--

INSERT INTO `tb_reportacao` (`ID_Reportacao`, `DS_Nome`, `DS_Email`, `Telefone_Contato`, `G_Urgencia`, `Tipo_Contato`, `DS_Msg`, `Arquivos`) VALUES
(1, '', '', '', '', 'ProblemasComCadastro', '							\r\n										', NULL),
(2, 'matheus', 'duraes96matheus@gmail.com', '(11)1111-11111', '10', 'ProblemasComCadastro', '							\r\n										', NULL),
(5, 'saddddddddddddddddddsad', 'ddddddddddddddddddddddddddddd', '(1111111111111', '2', 'Problemas com cadastro', '											**Preencha este campo**							\r\n										', NULL),
(6, 'saddddddddddddddddddsad', 'ddddddddddddddddddddddddddddd', '(1111111111111', '2', 'Problemas com cadastro', '											**Preencha este campo**							\r\n										', NULL),
(7, 'asddd', 'ddddddddddddddddddddddddddd', 'dddddddddd', '', 'Problemas com cadastro', '											**Preencha este campo**							\r\n										', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `IMG_Usuario` varchar(30) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `DS_Email` varchar(155) NOT NULL,
  `DT_Nascimento` varchar(20) NOT NULL,
  `SEXO` varchar(20) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `TEL1` varchar(20) NOT NULL,
  `TEL2` varchar(20) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `address` varchar(155) NOT NULL,
  `Complemento` varchar(155) DEFAULT NULL,
  `DS_Bairro` varchar(155) NOT NULL,
  `DS_Cidade` varchar(155) NOT NULL,
  `DS_Area` varchar(30) DEFAULT NULL,
  `DS_Formacao` varchar(40) DEFAULT NULL,
  `Curso` varchar(155) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `DS_Insitiuicao` varchar(155) DEFAULT NULL,
  `DT_Conclusao` varchar(10) DEFAULT NULL,
  `Disponibilidade` varchar(20) DEFAULT NULL,
  `OBS` varchar(300) DEFAULT NULL,
  `Username` varchar(20) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`ID_Usuario`, `IMG_Usuario`, `name`, `DS_Email`, `DT_Nascimento`, `SEXO`, `CPF`, `TEL1`, `TEL2`, `CEP`, `address`, `Complemento`, `DS_Bairro`, `DS_Cidade`, `DS_Area`, `DS_Formacao`, `Curso`, `Status`, `DS_Insitiuicao`, `DT_Conclusao`, `Disponibilidade`, `OBS`, `Username`, `Senha`, `type`, `lat`, `lng`) VALUES
(11, NULL, 'Bruno DurÃ£es', '111111111111111@sasfasdas', '11/11/1111', 'Masculino', '111.111.111-11', '(11)1111-1111', '(11)11111-1111', '08071-000', 'Avenida Doutor CustÃ³dio de Lima', '', 'Parque Cruzeiro do Sul', 'SÃ£o Paulo', '', '', '', '', '', '', '', '', 'Bruno@', '14042015', 'Prestador', -23.495356, -46.455971),
(19, NULL, 'Eduardo DurÃ£es', 'Edu@gmail.com', '19/03/1996', 'Masculino', '444.444.444-45', '(11)1111-1111', '(11)11111-1111', '03634-010\r', 'Rua Doutor João Ribeiro', '', 'Penha de Franca', 'SÃ£o Paulo', 'Informatica', 'Tecnico', 'Tecnico em Informatica', 'Interrompido', 'Centro Paula Souza', '12/2018', 'NaoPossuo', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'edu@', '14042015', 'Prestador', -23.523869, -46.547401),
(28, NULL, 'Bruno DurÃ£es', 'da@fasdsasda4', '11/11/1111', 'Masculino', '456.654.654-65', '(11)1111-1111', '(11)11111-1111', '08071-100', 'Rua CatlÃ©ias', '', 'Jardim Nair', 'SÃ£o Paulo', '', '', '', '', '', '', '', '', 'Italo@', '14042015', 'Solicitante', NULL, NULL),
(30, NULL, 'wagner franÃ§a', 'wagnerdocrime@gmail.com', '11/11/1111', 'Masculino', '146.554.654-65', '(11)1201-5546', '(11)96584-5654', '08071-000', 'Avenida Doutor CustÃ³dio de Lima', '', 'Parque Cruzeiro do Sul', 'SÃ£o Paulo', 'Informatica', 'Doutorado', 'CiÃªncia da ComputaÃ§Ã£o', 'Cursando', 'USP', '12/2022', 'NÃ£o Possuo', 'Sem Obs					\r\n								', 'Wagner', '', 'Prestador', -23.496660, -46.456379),
(31, NULL, 'Carlos Alves ', 'Carlo@usp', '11/11/1950', 'Masculino', '444.555.666-77', '(11)1111-4560', '(22)22222-2222', '02189-020', 'R. Sd. Clï¿½vis Rosa da Silva', '', 'Parque Novo Mundo', 'SÃ£o Paulo', 'Informatica', 'Doutorado', 'CiÃªncia da ComputaÃ§Ã£o', 'Cursando', 'USP', '12/2018', 'NaoPossuo', 'Estou a procura de serviÃ§os extras						\r\n								', 'CarlosAlves@', '', 'Prestador', -23.508224, -46.569267),
(33, NULL, 'Matheus DurÃ£es da Silva', 'duraes96matheus@gmail.com', '19/03/1996', 'Masculino', '445.656.546-46', '(11)2058-4560', '(11)96873-1333', '08071-130', 'Rua Rafael Zimbardi', '', 'Jardim Nair', 'SÃ£o Paulo', '', '', '', '', '', '', '', '', 'Theus_1903', '14042015', 'Administrador', NULL, NULL),
(35, NULL, 'Mariane Fernanda Lima', 'marianefernandalima-82@technicolor.com', '24/11/1996', 'Feminino', '290.250.268-00', '(11)3709-1370', '(11)98146-8990', '04858-100', 'Rua ConstelaÃ§Ã£o dos Peixes', '', 'Jardim Campinas', 'SÃ£o Paulo', 'EletrÃ´nica', 'Tecnico', 'TÃ©cnico em eletrÃ´nica ', 'Cursando', 'USP', '12/2022', 'NÃ£o Possuo', '						\r\n								', 'Mariane@', '14042015', 'Prestador', NULL, NULL),
(39, NULL, 'Manuel Emanuel Costa', 'mmanuelemanuelcosta@hotrmail.com', '25/11/1981', 'Masculino', '009.801.118-97', '(11)2618-829', '(11)98674-866', '02121-000', 'Rua Santo Eliseu', '', 'Vila Maria', 'SÃ£o Paulo', '', '', '', '', '', '', '', '', 'Manuel@', '14042015', 'Solicitante', NULL, NULL),
(40, NULL, 'Hugo Theo Marcelo Silva', 'hugotheomarcelosilva@weatherford.com', '25/10/1981', 'Masculino', '755.075.328-85', '(11)2611-7490', '(11)99924-9930', '08341-335', 'Rua Minas de Santa FÃ©', '', 'Parque Boa EsperanÃ§a', 'SÃ£o Paulo', 'EletrÃ´nica', 'Doutorado', 'EletrÃ´nica', 'Cursando', '', '12/2020', 'NÃ£o Possuo', '						\r\n								', 'hugo', '14042015', 'Prestador', NULL, NULL),
(41, NULL, 'Luan Marcelo Lucca Sales', 'luanmarceloluccasales@p4ed.com', '20/02/1981', 'Masculino', '909.317.018-05', '(11)2512-4740', '(11)99843-9000', '08071-280', 'Rua Santa Bernadete', '', 'Jardim Nair', 'SÃ£o Paulo', 'Informatica', 'Bacharelado', 'TÃ©cnico em eletrÃ´nica ', 'Cursando', 'Senac', '11/2018', 'NÃ£o Possuo', '						\r\n								', 'Luan@', '14042015', 'Prestador', NULL, NULL),
(42, NULL, 'Elias Gustavo Oliver Duarte', 'eliasgustavooliverduarte_@lojasrayton.com', '12/04/1981', 'Masculino', '887.407.408-54', '(11)2656-8610', '(11)99443-0420', '05386-240', 'Rua Dedaleiro', '', 'Rio Pequeno', 'SÃ£o Paulo', 'EletrÃ´nica', 'Bacharelado', 'TÃ©cnico em eletrÃ´nica ', 'ConcluÃ­do', 'Impacta', '12/2018', 'Possuo', '						\r\n								', 'elias@', '14042015', 'Prestador', NULL, NULL),
(43, NULL, 'Roberto Breno Campos', 'robertobrenocampos_@smalte.com.br', '26/05/1981', 'Masculino', '322.641.498-41', '(11)2022-5554', '(11)11222-1215', '02961-060', 'Rua Engenheiro Gutierrez', '', 'Jardim Monjolo', 'SÃ£o Paulo', 'Informatica', 'Tecnico', 'CiÃªncia da ComputaÃ§Ã£o', 'Interrompido', 'SÃ£o Judas ', '12/2018', 'NÃ£o Possuo', '															\r\n								&#34;						\r\n								', 'Roberto ', '14042015', 'Prestador', NULL, NULL),
(44, NULL, 'Jennifer Malu Carvalho', 'jjennifermalucarvalho@mega.com.br', '26/02/2000', 'Masculino', '425.414.038-01', '(11)2914-7600', '(11)99959-2050', '05428-020', 'Rua Tucambira', '', 'Pinheiros', 'SÃ£o Paulo', 'EletrÃ´nica', 'Tecnico', 'TÃ©cnico em InformÃ¡tica', 'Cursando', 'Senac-TatuapÃ©', '12/2017', 'Possuo', '						\r\n								', 'Jennifer@', '14042015', 'Prestador', NULL, NULL),
(45, NULL, 'Alessandra Daiane das Neves', 'aalessandradaianedasneves@enox.com.br', '03/09/2000', 'Masculino', '369.208.548-64', '(11)3921-2800', '(11)99576-6360', '08040-605', 'Viela Santo AntÃ´nio', '48', 'Jardim Casa Pintada', 'SÃ£o Paulo', 'Informatica', 'Mestrado', 'EletrÃ´nica', 'Cursando', 'Centro Paula Souza', '12/2015', 'Possuo', '																																	\r\n								&#34;						\r\n								&#34;						\r\n								&#34;						\r\n								', 'Alessandra', '14042015teteu', 'Prestador', NULL, NULL),
(49, NULL, 'Manuela Agatha Antonella da ConceiÃ§Ã£o', 'manuelaagathaantonelladaconceicao@hotmal.com', '03/10/2000', 'Masculino', '837.042.788-07', '(11)3551-3390', '(11)99569-0680', '03265-120', 'Rua Mataraca', '', 'Vila Divina Pastora', 'SÃ£o Paulo', '', '', '', '', '', '', '', '', 'Manuel12@', '14042015', 'Solicitante', NULL, NULL),
(51, NULL, 'Carlos Silva Alves ', 'carlos@gmail.com', '19/03/1996', 'Masculino', '445.656.546-44', '11 205845644', '(11)96873-1236', '08071-100', 'Rua CatlÃ©ias', '', 'Jardim Nair', 'SÃ£o Paulo', '', '', '', '', '', '', '', '', 'Carlos@@@', '14042015', 'Solicitante', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_bloqueados`
--

CREATE TABLE `usuarios_bloqueados` (
  `ID` int(11) NOT NULL,
  `Administrador` varchar(20) NOT NULL,
  `Motivo` varchar(100) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `Email` varchar(105) NOT NULL,
  `Data` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_bloqueados`
--

INSERT INTO `usuarios_bloqueados` (`ID`, `Administrador`, `Motivo`, `CPF`, `Email`, `Data`) VALUES
(1, 'Theus_1903', 'adssssssssss', 'ssssssssssssss', 'sssssssssssssssssss@mgail.com', '02-12-2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`ID_Avaliacao`);

--
-- Indexes for table `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`ID_Solicitacao`);

--
-- Indexes for table `tb_contatos`
--
ALTER TABLE `tb_contatos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_reportacao`
--
ALTER TABLE `tb_reportacao`
  ADD PRIMARY KEY (`ID_Reportacao`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD UNIQUE KEY `DS_Email` (`DS_Email`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `DS_Email_2` (`DS_Email`),
  ADD KEY `DS_Email_3` (`DS_Email`);

--
-- Indexes for table `usuarios_bloqueados`
--
ALTER TABLE `usuarios_bloqueados`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `ID_Avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `motivo`
--
ALTER TABLE `motivo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `ID_Solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_contatos`
--
ALTER TABLE `tb_contatos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_reportacao`
--
ALTER TABLE `tb_reportacao`
  MODIFY `ID_Reportacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `usuarios_bloqueados`
--
ALTER TABLE `usuarios_bloqueados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
