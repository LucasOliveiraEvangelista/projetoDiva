-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/06/2021 às 19:47
-- Versão do servidor: 5.6.50
-- Versão do PHP: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_diva`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_usuario`
--

CREATE TABLE `cad_usuario` (
  `unique_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nascimento` char(10) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `senha` char(40) NOT NULL,
  `cpf` char(14) NOT NULL,
  `telefone` char(19) DEFAULT NULL,
  `cep` char(9) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `rg` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `desativada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cad_usuario`
--

INSERT INTO `cad_usuario` (`unique_id`, `nome`, `nascimento`, `sexo`, `email`, `senha`, `cpf`, `telefone`, `cep`, `estado`, `foto`, `rg`, `status`, `desativada`) VALUES
('1043688555', 'Eduardo Silva', '11/09/1991', NULL, 'edu@edu.com', '8cb2237d0679ca88db6464eac60da96345513964', '906.509.638-81', '', '08122-080', NULL, 'user.png', '36;080;099-4', 'Online', NULL),
('1234', 'Luan Guilherme', '09/09/2000', NULL, 'Luan7@luan.com', '8cb2237d0679ca88db6464eac60da96345513964', '123.214.980-90', '', '08122-080', NULL, 'user.png', '34.781.990-2', 'Online', 1),
('1408673948', 'Neymar Junior', '05/02/1992', NULL, 'ney@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '374.058.006-56', NULL, '08122-000', NULL, NULL, '30.751.124-7', 'Online', 0),
('143676301', 'halland', '16/02/1999', NULL, 'haland@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '999.058.606-58', NULL, '08122-080', NULL, NULL, '52.328.893-9', 'Online', 0),
('1460747688', 'Thiago Ribeiro Mello', '09/09/1993', 'm', 'thiago@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '305.938.510-64', '(+55) 906512-321', '08122-080', 'ES', '162394182860cb62c44193cjpeg', '34.900.788-09', 'Online', 0),
('267154862', 'keven soares', '22/04/2003', NULL, 'keven@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '578.923.975-58', NULL, '08121-321', NULL, NULL, '58.328.203-9', 'Online', 0),
('308104992', 'Gustavo Rios', '07/12/1995', NULL, 'grios@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '128.695.490-83', '', '08122-080', NULL, 'user.png', '12.345.765-9', 'Online', 1),
('351010038', 'Lucas de Oliveira', '16/08/2003', 'm', 'lucasoe007@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '12345678999', '', '08122-080', 'SP', 'bat.jpeg', '38.731.090-1', 'Online', 0),
('589349873', 'Alexia Alberiz', '11/05/2004', NULL, 'alexia@alexia.com', '8cb2237d0679ca88db6464eac60da96345513964', '12345678762', '', '08122-080', NULL, 'user.png', '38.731.012-7', 'Online', 1),
('771384558', 'Mannuelly Dias', '19/03/2001', 'f', 'manu@manu.com', '8cb2237d0679ca88db6464eac60da96345513964', '374.838.688-09', '(11)98871-9080', '08122-080', 'SP', '162250472260b57512c6871jpeg', '32.808.099-9', 'Online', 1),
('846225059', 'Paciente teste', '1992-09-12', 'm', 'paciente@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '374.058.006-56', '(+55) 968813-442', '08122-080', 'SP', '162216876760b054bf26b3e.jpeg', '30.751.824-8', 'Online', 0),
('918715829', 'Ricardo Vieira', '11/07/1991', 'm', 'ricardo@email.com', '8cb2237d0679ca88db6464eac60da96345513964', '374.838.688-56', '(11)96881-3442', '08122080', 'SP', 'user.png', '32.765.987.12', 'Online', NULL),
('946544665', 'Lucas de Oliveira', '16/08/2003', 'm', 'lucasmiau@gmail.com', '4de4d95fc854e7883bec112a191c867c0678ca42', '374.058.006-56', NULL, '08122-010', NULL, 'user.png', '30.721.024-7', 'Online', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `horario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_psic` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `realizada` int(11) DEFAULT NULL,
  `tipo_pagamento` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pago` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `horario`, `id_psic`, `id_user`, `realizada`, `tipo_pagamento`, `pago`) VALUES
(1, 'Segunda-Feira, 9:30 - 10:00', 123456, 946544665, 1, 'pix', 1),
(2, 'Terça-Feira, 7:00 - 7:30', 123456, 846225059, 1, 'dinheiro', 0),
(6, 'Quinta-Feira, 10:00 - 10:30', 123456, 846225059, 1, 'Dinheiro', 0),
(9, 'Segunda-Feira, 19:00 - 20:00', 1341553486, 1043688555, 1, 'Dinheiro', 1),
(10, 'Segunda-Feira, 7:00 - 8:00', 694628662, 351010038, 1, 'Dinheiro', 0),
(11, 'Segunda-Feira, 20:00 - 21:00', 1341553486, 1460747688, 0, 'Pix', 0),
(13, 'Segunda-Feira, 11:00 - 12:00', 1341553486, 351010038, 0, 'Pix', 0),
(14, 'Terça-Feira, 7:00 - 8:00', 1341553486, 918715829, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `dias`
--

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `dia` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `dias`
--

INSERT INTO `dias` (`id_dia`, `dia`) VALUES
(1, 'Domingo'),
(2, 'Segunda-Feira'),
(3, 'Terça-Feira'),
(4, 'Quarta-Feira'),
(5, 'Quinta-Feira'),
(6, 'Sexta-Feira'),
(7, 'Sábado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `id_especialidade` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `especialidade`
--

INSERT INTO `especialidade` (`id_especialidade`, `nome`, `descricao`) VALUES
(1, 'Abuso Sexual', NULL),
(2, 'Adolescência', NULL),
(3, 'agressividade', NULL),
(4, 'Alteração de Humor', NULL),
(5, 'Ansiedade', NULL),
(6, 'Assédio Moral', NULL),
(7, 'Autismo', NULL),
(8, 'Auto-Mutilação', NULL),
(9, 'Autoconhecimento', NULL),
(10, 'Auto Estima', NULL),
(11, 'Bullying', NULL),
(12, 'Claustrofobia', NULL),
(13, 'Compulsão Alimentar', NULL),
(14, 'Culpa', NULL),
(15, 'Câncer', NULL),
(16, 'Depressão', NULL),
(17, 'Deficiência Física', NULL),
(18, 'Desmotivação', NULL),
(19, 'Doenças emocionais', NULL),
(20, 'Doenças Psicológicas', NULL),
(21, 'Esquizofrenia', NULL),
(22, 'Estresse', NULL),
(23, 'Felicidade', NULL),
(24, 'Foco', NULL),
(25, 'Ideias Suicidas', NULL),
(26, 'Medo e Fobias', NULL),
(27, 'Medo de Dirigir', NULL),
(28, 'Medo de Falar Em Público', NULL),
(29, 'Morte e Luto', NULL),
(30, 'Motivação', NULL),
(31, 'Obesidade', NULL),
(32, 'Obsessão', NULL),
(33, 'Orientação Sexual', NULL),
(34, 'Perfeccionismo', NULL),
(35, 'Problemas Financeiros', NULL),
(36, 'Procastinação', NULL),
(37, 'Racismo', NULL),
(38, 'Raiva', NULL),
(39, 'Relacionamentos amorosos', NULL),
(40, 'Conflitos Familiares', NULL),
(41, 'Conflitos Profissionais', NULL),
(42, 'Sono', NULL),
(43, 'Sindrome do Pânico', NULL),
(44, 'Terapia de Casal', NULL),
(45, 'Transtorno Bipolar', NULL),
(46, 'Transtorno Obsessivo Compulsivo (TOC)', NULL),
(47, 'Transtorno de Déficit de Atenção e Hiperatividade (TDAH)', NULL),
(48, 'Transtorno de Personalidade', NULL),
(49, 'Traumas e Abuso', NULL),
(50, 'Violência Doméstica', NULL),
(51, 'Vícios', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `esp_psico`
--

CREATE TABLE `esp_psico` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `id_psic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `esp_psico`
--

INSERT INTO `esp_psico` (`id`, `nome`, `id_psic`) VALUES
(1, 'Depressão', 123456),
(14, 'Motivação', 123456),
(15, 'Medo e Fobias', 123456),
(17, 'Autismo', 1341553486),
(18, 'Alteração de Humor', 123456),
(19, 'Adolescência', 694628662),
(20, 'Autismo', 694628662),
(21, 'Bullying', 694628662),
(22, 'Autoconhecimento', 694628662),
(23, 'Estresse', 694628662),
(25, 'Assédio Moral', 1341553486),
(26, 'Bullying', 1341553486),
(27, 'Câncer', 1341553486),
(28, 'Medo e Fobias', 1341553486),
(29, 'Adolescência', 1065604361),
(30, 'Culpa', 1065604361),
(31, 'Ansiedade', 1065604361),
(32, 'Depressão', 1065604361),
(33, 'Transtorno de Déficit de Atenção e Hiperatividade (TDAH)', 1370923711),
(34, 'Alteração de Humor', 1370923711),
(35, 'Autismo', 1370923711),
(36, 'Ansiedade', 1548621570),
(37, 'Estresse', 1548621570),
(38, 'Morte e Luto', 1548621570),
(39, 'Assédio Moral', 1548621570),
(40, 'Abuso Sexual', 1548621570),
(41, 'agressividade', 1406286231),
(42, 'Autoconhecimento', 1406286231),
(43, 'Depressão', 1406286231),
(44, 'Vícios', 1406286231),
(45, 'Abuso Sexual', 1037570738),
(46, 'Medo e Fobias', 1037570738),
(47, 'Morte e Luto', 1037570738);

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios`
--

CREATE TABLE `horarios` (
  `id_agendamento` int(11) NOT NULL,
  `dia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hora_inicio` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hora_fim` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_psic` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `marcado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `horarios`
--

INSERT INTO `horarios` (`id_agendamento`, `dia`, `hora_inicio`, `hora_fim`, `id_psic`, `marcado`) VALUES
(1, 'Segunda-Feira', '8:00', '8:30', '123456', 1),
(2, 'Domingo', '8:30', '9:00', '123456', 0),
(3, 'Segunda-Feira', '8:30', '9:00', '123456', 0),
(4, 'Segunda-Feira', '9:30', '10:00', '123456', 0),
(6, 'Terça-Feira', '7:00', '7:30', '123456', 0),
(7, 'Quarta-Feira', '9:00', '9:30', '123456', 0),
(8, 'Quinta-Feira', '10:00', '10:30', '123456', 1),
(9, 'Sexta-Feira', '7:00', '8:00', '123456', 0),
(10, 'Sábado', '11:00', '11:30', '123456', 0),
(11, 'Terça-Feira', '10:00', '10:30', '123456', 0),
(12, 'Segunda-Feira', '7:00', '7:30', '687908762', 0),
(13, 'Terça-Feira', '8:00', '9:00', '687908762', 0),
(14, 'Segunda-Feira', '8:00', '8:30', '1341553486', 1),
(15, 'Segunda-Feira', '10:00', '11:00', '1341553486', 1),
(16, 'Domingo', '11:00', '12:00', '1341553486', 0),
(17, 'Segunda-Feira', '11:00', '12:00', '1341553486', 1),
(18, 'Terça-Feira', '7:00', '8:00', '1341553486', 1),
(19, 'Terça-Feira', '8:00', '9:00', '1341553486', 1),
(20, 'Domingo', '10:00', '11:00', '1341553486', 0),
(21, 'Domingo', '11:30', '12:00', '123456', 0),
(22, 'Segunda-Feira', '10:30', '11:30', '123456', 0),
(23, 'Segunda-Feira', '14:00', '15:00', '123456', 0),
(24, 'Segunda-Feira', '12:00', '13:00', '1341553486', 1),
(25, 'Segunda-Feira', '13:00', '14:00', '1341553486', 1),
(26, 'Segunda-Feira', '15:00', '16:00', '1341553486', 1),
(27, 'Domingo', '16:00', '17:00', '1341553486', 0),
(28, 'Segunda-Feira', '16:00', '17:00', '1341553486', 1),
(29, 'Segunda-Feira', '17:00', '18:00', '1341553486', 0),
(30, 'Segunda-Feira', '18:00', '19:00', '1341553486', 0),
(31, 'Segunda-Feira', '19:00', '20:00', '1341553486', 1),
(32, 'Segunda-Feira', '20:00', '21:00', '1341553486', 1),
(33, 'Terça-Feira', '8:00', '9:00', '1341553486', 0),
(34, 'Terça-Feira', '9:00', '10:00', '1341553486', 0),
(35, 'Segunda-Feira', '7:00', '8:00', '694628662', 1),
(36, 'Segunda-Feira', '8:00', '9:00', '694628662', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `horas`
--

CREATE TABLE `horas` (
  `id_hora` int(11) NOT NULL,
  `horarios` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hora_inicio` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora_fim` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_psic` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `horas`
--

INSERT INTO `horas` (`id_hora`, `horarios`, `hora_inicio`, `hora_fim`, `id_psic`) VALUES
(1, '7:00', NULL, NULL, NULL),
(2, '7:30', NULL, NULL, NULL),
(3, '8:00', NULL, NULL, NULL),
(4, '8:30', NULL, NULL, NULL),
(5, '9:00', NULL, NULL, NULL),
(6, '9:30', NULL, NULL, NULL),
(7, '10:00', NULL, NULL, NULL),
(8, '10:30', NULL, NULL, NULL),
(9, '11:00', NULL, NULL, NULL),
(10, '11:30', NULL, NULL, NULL),
(11, '12:00', NULL, NULL, NULL),
(12, '12:30', NULL, NULL, NULL),
(13, '13:00', NULL, NULL, NULL),
(14, '13:30', NULL, NULL, NULL),
(15, '14:00', NULL, NULL, NULL),
(16, '14:30', NULL, NULL, NULL),
(17, '15:00', NULL, NULL, NULL),
(18, '15:30', NULL, NULL, NULL),
(19, '16:00', NULL, NULL, NULL),
(20, '16:30', NULL, NULL, NULL),
(21, '17:00', NULL, NULL, NULL),
(22, '17:30', NULL, NULL, NULL),
(23, '18:00', NULL, NULL, NULL),
(24, '18:30', NULL, NULL, NULL),
(25, '19:00', NULL, NULL, NULL),
(26, '19:30', NULL, NULL, NULL),
(27, '20:00', NULL, NULL, NULL),
(28, '20:30', NULL, NULL, NULL),
(29, '21:00', NULL, NULL, NULL),
(30, '21:30', NULL, NULL, NULL),
(31, '22:00', NULL, NULL, NULL),
(32, '22:30', NULL, NULL, NULL),
(33, '23:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1186842808, 601658706, 'opa'),
(2, 1186842808, 601658706, 'tranquilão'),
(3, 1408673948, 946544665, 'ola'),
(4, 946544665, 1408673948, 'ola'),
(5, 1408673948, 267154862, 'opl'),
(6, 846225059, 982704140, 'Salve man'),
(7, 982704140, 846225059, 'fala  meu bom'),
(8, 982704140, 927103694, 'fala'),
(9, 846225059, 982704140, 'papo '),
(10, 846225059, 982704140, 'serelepe '),
(11, 982704140, 846225059, 'tipo o zap'),
(12, 982704140, 846225059, 'nÃ£o tem jeito'),
(13, 846225059, 982704140, '#neyday CANCELADO'),
(14, 982704140, 846225059, '#viniday CANCELADO tbm'),
(15, 846225059, 982704140, 'opa'),
(16, 982704140, 687908762, 'oi'),
(17, 846225059, 982704140, 'oi'),
(18, 846225059, 982704140, 'ola'),
(19, 846225059, 982704140, 'ola'),
(20, 982704140, 846225059, 'ola tbm'),
(21, 982704140, 846225059, 'q'),
(22, 982704140, 846225059, 'fala ai'),
(23, 846225059, 982704140, 'lolas'),
(24, 846225059, 982704140, 'jessica'),
(25, 143676301, 846225059, 'fala amigo'),
(26, 687908762, 846225059, 'Fala meu chapa '),
(27, 687908762, 846225059, 'tudo dibas'),
(28, 687908762, 846225059, '???'),
(29, 687908762, 846225059, 'E essa PANDS'),
(30, 687908762, 846225059, 'zuada'),
(31, 846225059, 687908762, 'bah'),
(32, 846225059, 687908762, 'é us guri'),
(33, 687908762, 846225059, 'fala fi'),
(34, 123456, 846225059, 'iai'),
(35, 846225059, 687908762, 'opa'),
(36, 687908762, 846225059, 'ola'),
(37, 946544665, 123456, 'opa'),
(38, 846225059, 1341553486, 'fala meu padrinho'),
(39, 846225059, 1341553486, 'como anda pia'),
(40, 694628662, 351010038, 'opa'),
(41, 1341553486, 1460747688, 'fala'),
(42, 1341553486, 1460747688, 'minha madrinha'),
(43, 1341553486, 1460747688, 'suav?'),
(44, 1460747688, 1341553486, 'op'),
(45, 1460747688, 1341553486, 'lolo'),
(46, 1460747688, 1341553486, 'kkkk'),
(47, 1341553486, 1460747688, 'kkkk'),
(48, 1341553486, 1460747688, 'lololloo'),
(49, 1341553486, 1460747688, 'kkkkkkkkk'),
(50, 1341553486, 1460747688, 'ri'),
(51, 1341553486, 1460747688, 'sa'),
(52, 1341553486, 1460747688, 'da'),
(53, 1341553486, 1460747688, 'lolo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nicho_psicologico`
--

CREATE TABLE `nicho_psicologico` (
  `id_nicho` int(11) NOT NULL,
  `nicho` varchar(50) NOT NULL,
  `descritivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `nicho_psicologico`
--

INSERT INTO `nicho_psicologico` (`id_nicho`, `nicho`, `descritivo`) VALUES
(1, 'Psicologia educacional ou escolar', 'O profissional é responsável por buscar melhorias no rendimento dos alunos dentro das salas de aula. Para cumprir seu objetivo, ele trabalha com professores, diretores e pedagogos e identifica os problemas que interferem no aprendizado dos alunos.'),
(2, 'Psicologia organizacional e do trabalho', 'As empresas têm requisitado bastante o trabalho do psicólogo. A principal função do profissional dentro das companhias é atuar em processos de recrutamento e seleção de funcionários para as empresas, além de oferecer treinamento e desenvolvimento de pessoal.'),
(3, 'Psicologia de trânsito', 'Essa é uma das áreas de atuação da Psicologia menos populares, mas que atendem grande parte da população. Isso porque quem deseja tirar sua carta de motorista precisa passar por um teste, que é aplicado por psicólogos especializados — o famoso exame psicotécnico.Mas a área vai além de aplicar avaliações para futuros motoristas. O psicólogo de trânsito ainda desenvolve ações socioeducativas para quem foi punido por má conduta no volante.'),
(4, 'Psicologia social', 'Essa área cuida de pessoas em situação de vulnerabilidade, como idosos, e também trabalha em prol da recuperação de detentos. O psicólogo social atua em penitenciárias, asilos e centros de atendimento a crianças e adolescentes.Além disso, ele é responsável por elaborar programas e pesquisas sobre a saúde mental da população em geral.'),
(5, 'Psicologia hospitalar e da saúde', 'Muitas vezes, pacientes com doenças graves e seus familiares precisam de apoio psicológico para lidar com a doença. É nesse cenário que entra o psicólogo hospitalar, que atua com médicos e outros profissionais do setor de saúde para fortalecer familiares e pacientes física e mentalmente.'),
(6, 'Psicologia esportiva', 'Atletas sofrem muita pressão para ter bons resultados. Para ajudá-los nessa questão, existe uma área chamada psicologia do esporte, que trabalha a inteligência emocional desses profissionais. O objetivo é melhorar o rendimento de cada atleta e promover a harmonia entre todos os membros da equipe.'),
(7, 'Comportamento do consumidor', 'Entender o comportamento do cliente é muito importante para que as empresas saibam como atender às suas necessidades. Nesse contexto, o trabalho do psicólogo visa orientar o marketing e agências de publicidade a criar campanhas que causem impacto no público-alvo das empresas.'),
(8, 'Orientação profissional', 'Essa é uma das áreas de atuação da Psicologia mais conhecidas. Profissionais desse ramo trabalham para ajudar jovens a escolher a carreira e decidir qual faculdade ou curso devem fazer. Eles fazem isso por meio de testes de perfil e avaliação psicológica.'),
(9, 'Acompanhamento terapêutico', 'O trabalho dentro das clínicas e consultórios é o mais comum no mercado para esse profissional. Os psicólogos terapeutas acompanham crianças, jovens e adultos para que eles consigam viver com mais autonomia.'),
(10, 'Neuropsicologia', 'Essa é uma área complexa, que envolve questões cerebrais, ou seja, o neuropsicólogo precisa estudar o funcionamento do cérebro, que é a parte mais sofisticada do corpo humano. Isso porque ele atua com diagnóstico, acompanhamento, tratamento e pesquisa da cognição, das emoções e do comportamento do ser humano. O enfoque do trabalho desse profissional é o funcionamento do cérebro. Ele busca entender como o comportamento do ser humano é influenciado pelas funções cerebrais.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id` int(11) NOT NULL,
  `id_para` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_enviou` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `notificacao`
--

INSERT INTO `notificacao` (`id`, `id_para`, `id_enviou`, `msg`, `status`) VALUES
(3, '123456', '351010038', 'Nova  Consulta', 'Não visto'),
(5, '1234', '123456', 'Nova mensagem', 'Não visto'),
(6, '1234', '123456', 'Nova mensagem', 'Já Visto'),
(9, '694628662', '351010038', 'Nova Mensagem', 'Não Visto'),
(10, '1341553486', '1460747688', 'Nova Consulta', 'Já Visto'),
(11, '1341553486', '1460747688', 'Nova Mensagem', 'Já Visto'),
(12, '1341553486', '1460747688', 'Nova Consulta', 'Não Visto'),
(13, '1341553486', '1460747688', 'Nova Mensagem', 'Já Visto'),
(14, '1460747688', '1341553486', 'Nova Mensagem', 'Já Visto'),
(15, '1460747688', '1341553486', 'Nova Mensagem', 'Já Visto'),
(16, '1460747688', '1341553486', 'Nova Mensagem', 'Não Visto'),
(17, '1341553486', '1460747688', 'Nova Mensagem', 'Já Visto'),
(18, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(19, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(20, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(21, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(22, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(23, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(24, '1341553486', '1460747688', 'Nova Consulta', 'Não Visto'),
(26, '1341553486', '1460747688', 'Pagou consulta', 'Não Visto'),
(27, '1341553486', '1460747688', 'Pagou consulta', 'Já Visto'),
(28, '1341553486', '351010038', 'Nova Consulta', 'Não Visto'),
(29, '1341553486', '351010038', 'Pagou consulta', 'Não Visto'),
(30, '1341553486', '918715829', 'Nova Consulta', 'Não Visto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `psicologos`
--

CREATE TABLE `psicologos` (
  `unique_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nascimento` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rg` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `local` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `crp` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  `tempo_experiencia` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempo_consulta` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resumo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diploma` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faculdade` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idioma` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarcacao` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chave` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qrcode` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desativada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `psicologos`
--

INSERT INTO `psicologos` (`unique_id`, `nome`, `email`, `senha`, `nascimento`, `estado`, `cep`, `rg`, `cpf`, `telefone`, `local`, `crp`, `status`, `situacao`, `tempo_experiencia`, `tempo_consulta`, `resumo`, `texto`, `diploma`, `faculdade`, `foto`, `idioma`, `valor`, `remarcacao`, `sexo`, `chave`, `qrcode`, `desativada`) VALUES
('1037570738', 'José Mario', 'jm@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '13/09/1991', 'RJ', '06211-021', '19.538.674-7', '192.339.210-77', '(21) 96112-8559', 'Rua Almeida Barros', '06/06554', 'Online', 1, '2012', '60min', 'Sou psicanalista, especialista em saúde do trabalhador e minha missão é ajudar pessoas a reencontrarem o equilíbrio emocional, alterado por conflitos ligados à angustia, ansiedade, burnout, compulsões, crise existencial, estresse, fobia/medo, relacionamento familiar, bullyng ou transtornos diversos.', 'O meu trabalho é fornecer o anzol [a escuta analítica], e de meus clientes a isca [suas palavras], e juntos trazemos à tona estas memórias e damos o devido tratamento à elas com o propósito de ajudá-los a manterem uma relação mais saudável consigo mesmos e com os outros e a viverem a vida de uma forma mais leve.', NULL, NULL, '162422794860cfc06c1ac68jpeg', 'Português', '90,00', '12', 'r', NULL, NULL, 0),
('1065604361', 'Sabrina Sabino Cruz', 'sasa@gmail.com', 'f1bcd8cc0fc2668a15170ef7291b39032b480596', '14/09/1994', 'SP', '09311-020', '40.084.323-7', '940.468.740-58', '(11) 91281-0992', 'Rua das folhas', '06/98322', 'Online', 1, '2020', '50min', 'Olá! Sou psicóloga e mestranda. Atuo principalmente com orientações e reorientações de carreira. Tenho experiência no contexto clínico, organizacional e em casos de depressão e ansiedade.', 'Tenho como propósito auxiliar as pessoas a enxergarem a sua melhor versão em sintonia com uma profissão que verdadeiramente faça sentido para elas. E realmente espero te auxiliar a vivenciar um propósito que realmente tenha relação com você, de maneira saudável e equilibrada, e tendo como base o fato de você estar bem com você mesmo, com a saúde mental em dia e, sobretudo, se sentindo bem com a pessoa que você é.', NULL, NULL, '162421725760cf96a99660bjpeg', 'Inglês e Poertuguês', '100,00', '12', 'f', NULL, NULL, 0),
('1108578287', 'Camilo Santana', 'ca@santana.com', '8cb2237d0679ca88db6464eac60da96345513964', '30/01/1992', 'SP', '08121-020', '18.883.354-7', '653.465.960-38', NULL, NULL, '06/11002', 'Online', 1, '2010', '50min', 'Olá, sou Psicologo Clinico que atua na abordagem fenomenologia existencial, buscando compreender os fenômenos humanos de ordem cognitiva, comportamental e afetiva em diferentes contextos, considerando as diferenças individuais e socioculturais dos pacientes.', '\nOlá, bem-vindos! Sou Psicologo especializando-se em Psicologia Clínica na Perspectiva Fenomenológico-Existencial, buscando área clinica para realização de atendimento psicológico, visando uma prática que busca o acolhimento e escuta da queixa do paciente, com o proposito de compreender a demanda com uma base no raciocínio clinico, para que se possa interpretar e formular intervenções psicológicas.', NULL, 'UFSP', '13.jpg', 'Português', '50,00', '12', 'm', NULL, NULL, 0),
('123456', 'João Lima', 'psiquiatra@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '13/02/1989', 'SP', '08122-080', NULL, NULL, '968813442', 'Rua dos magos, n° 66, Jd. do Carmo', '09/01234', NULL, 2, '2013', '40min', 'O texto curto para mostrar ao usuarios, llllllllllll llllllllllllllllllllllll lll llllllll', 'kkkkkkkkkkkkkkk k kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkk kkkkkkkk kkkkkk  kkkkkkkkkkkk kkkkkkk kkkkkkkkkk', NULL, 'UFSP\n', ' 162216871860b0548e96337.jpeg', 'Português e Inglês', '80,00', '12', 'm', '99900987', 'qrcode.png', 1),
('1341553486', 'Joana Doria Silva', 'drjoana@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '12/09/1996', 'SP', '08122-080', '38.721.720-70', '374.868.988-65', '96881-3442', 'Rua Alvaro alvorada, n° 777, Itaqua', '09/88123', 'Online', 1, '2018', '40min', 'Amo cuidar de pessoas, psicologia é minha paixão. mo cuidar de pessoasmo cuidar de pessoasmo cuidar de pessoasmo cuidar de pessoas.', 'mo cuidar de pessoas, psicologia é minha paixão.  mo cuidar de pessoas, psicologia é minha paixão. ', NULL, 'UFSP', '12.jpeg', 'Inglês, Português', '80', '24', 'f', 'drjoana@gmail.com', '162402155660cc9a344a8b8.png', 1),
('1370923711', 'Alana Queiroz ', 'lana@gmail.com', 'f1bcd8cc0fc2668a15170ef7291b39032b480596', '31/10/1992', 'SP', '06232-060', '14.095.436-3', '124.625.390-93', '(11)9211-5445', 'Est. do campo Limpo, n°220', '06/15239', 'Online', 1, '2017', '60min', 'Olá! Seja muito bem-vindx. Meus principais temas de estudo e atendimento terapêutico agregam a depressão, autoconhecimento, o empoderamento feminino e da comunidade LGBTQIAP+, dentre outros. Os horários podem ser marcados diretamente comigo, pelo chat. Se precisar de algum horário que não apareça como disponível, podemos conversar a respeito. Parabéns por sua iniciativa em buscar um tratamento!', 'É importante ter em mente que ao buscar a psicoterapia alguns dos pilares para o bom andamento deste tratamento envolve uma parceria entre o profissional e o cliente, no qual realizaremos um trabalho “em equipe” para que você possa sair da sua posição de sofrimento e passe a ser mais ativo em relação a sua própria mudança. Enfim, agradeço-lhe o interesse por ter lido até aqui. Mas, principalmente, quero te dar os parabéns por sua iniciativa em buscar um tratamento! Espero te ver em breve!', NULL, 'UFSP', '162421764560cf982d79ee7jpeg', 'Portugês', '120,00', '24', 'f', NULL, NULL, 0),
('1406286231', 'Leticia Sampaio', 'lele@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '05/02/1994', 'SP', '08122-080', '32.623.723-9', '908.069.370-76', '(11)94332-0701', 'Rua Monte Lambara', '06/90902', 'Online', 1, '2019', '50min', 'Formação e Pós-Graduação em Psicanálise Clinica pela Academia Paulista de Psicanálise\r\nAtuando com atendimento on-line em casos de ansiedade, fibromialgia, aborto, medo, perda, luto, abuso sexual, rejeição e abandono.', 'Ajudar as pessoas nessa jornada para o autoconhecimento e desenvolvimento pessoal é algo que dá sentido aos meus dias e me faz sentir que estou realmente viva. Acredito que juntos, psicólogo e cliente, podem encontrar o caminho do meio para a aceitação e mudança. Por isso, me coloco a disposição e afirmo que com certeza será uma grande honra fazer parte do seu processo!', NULL, NULL, '162422664160cfbb5131aecjpeg', 'Português', '60,00', '12', 'f', NULL, NULL, 0),
('1548621570', 'Helena Silveira', 'helena@gmail.com', '08fdadc2b4982085d4a63e53a6773f291d52c8ec', '24/05/1993', 'SP', '07650-010', '16.135.609-6', '308.099.060-90', '(11) 96551-2020', 'Rua dois, n° 242, Jd. Napoli', '06/99818', 'Online', 1, '2016', '35min', 'sicóloga formada pela Universidade Estadual de Maringá (UFSP). Cursando Pós-Graduação (especialização) em Psicoterapia Online. Especialista em Pesquisa Educacional com experiência em docência em Psicologia.', 'Olá, Sou psicóloga formada pela Universidade Estadual de Maringá (UEM) há 5\r\n anos. Trabalho com Psicoterapia Breve de orientação psicanalítica. Estou me especializando em Psicoterapia Online (cursando pós-graduação). Tenho experiência em lidar com Fobia Social, Depressão, Angústia e Ansiedade. Atendo adolescentes e adultos.', NULL, NULL, '162422058760cfa3ab92e3bjpeg', 'Português e Esapanhol', '50,00', '12', 'f', NULL, NULL, 0),
('161975984', 'Samara Oliveira', 'sa@samara.com', '8cb2237d0679ca88db6464eac60da96345513964', '11/09/1996', 'SP', '09711-022', '42.445.390-3', '117.279.590-86', NULL, NULL, '07/32451', 'Online', 1, '2015', '50min', 'Psicóloga graduada pela PUCRS em 2005. Especialista em Psicologia Clínica no Instituto Fernando Pessoa em Porto Alegre. Possuo vasta experiência no atendimento psicológico e de psicoterapia para o público adulto', '\nOlá! Sou psicóloga e atuo na área de psicologia clínica e psicoterapia. Tenho trabalhado com temáticas como ansiedade, alterações de humor, angústia e depressão, entre outras, as quais geram muito sofrimento psíquico. Estou disponível para te ajudar também em questões de autoestima e em uma jornada em busca de autoconhecimento.', NULL, 'UFBA', '10.jpeg', 'Português e Inglês', '80,00', '12', 'f', NULL, NULL, 0),
('198467153', 'Carlos Dantas Filho', 'carlao@gmail.com', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', '12/03/1979', 'SP', '07112-070', '40.767.509-7', '500.697.490-78', NULL, NULL, '09/34612', 'Online', 1, '2019', '45min', '\nÀs vezes precisamos de alguém para ajudar a arrumar a bagunça... Fazer terapia não é um luxo, é uma necessidade. É para todos! Provavelmente, você já se sentiu confuso, perdido, ansioso, culpado e sobrecarregado. Buscar por ajuda é um ato de coragem..', '\nÀs vezes precisamos de alguém para ajudar a arrumar a bagunça...\nFazer terapia não é um luxo, é uma necessidade.\nÉ para todos! Provavelmente, você já se sentiu confuso, perdido, ansioso, culpado e sobrecarregado.\nBuscar por ajuda é um ato de coragem de quem busca autoconhecimento, melhorar as relações, elaborar os sentimentos e desenvolver a autoestima.\nInvista em VOCÊ e na sua qualidade de vida', NULL, 'UFMG', '11.jpg', 'Português', '60,00', '24', 'm', NULL, NULL, 0),
('260532961', 'Marcos Paulo', 'marcao@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '07/09/1988', 'SP', '08122-080', '32.909.765-9', '305.938.510-64', '(11) 968813442', 'Rua dos lagos, n° 37, jd Oliva', '05/00891', 'Online', 1, '2007', '50min', 'Olá, bem vindo a este espaço. Sou psicólogo clínico e tenho experiência em Terapia Humanista - Abordagem Centrada na Pessoa(ACP).\r\nConsidero que todas as pessoas possam ser compreendidas e acolhidas, independente da experiência que estejam vivenciando.\r\nA ACP é uma abordagem que considera único cada indivíduo e entende que é possível ajudar o outro através de um processo de autoconhecimento e de escuta acolhedora e empática.\r\nSeja bem vindo a este espaço de acolhimento.', 'Na minha formação em Psicologia pela Universidade Federal de Minas Gerais tive oportunidade de trabalhar com diversas áreas da Psicologia (social, desenvolvimento, clínica, etc). Em paralelo busquei experiências no mercado e construí uma carreira voltada para o Recursos Humanos, principalmente para o mercado de Startups.\r\nHoje busco dividir meu tempo em um balanço entre clínica e Recursos Humanos, pois percebo que tais experiências são muito complementares e podem proporcionar maior compreensão das experiências vividas', NULL, 'UFSP', '15.jpeg', 'Português', '80,00', '12', 'm', NULL, 'qrcode.png', 1),
('694628662', 'Thiago', 'thiago@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '12/08/1984', 'SP', '08122-080', '32.899..423-9', '305.938.510-64', '(11) 96881-3442', 'Rua Lagos azul, N° 43', '08/01234', 'Online', 2, '2011', '50min', '\nRecordar. Repetir e Elaborar. É através da psicanálise que vamos investigar o inconsciente e conhecer as raízes das suas demandas. Seja muito bem-vinda e muito bem-vindo ao meu consultório online. Este é o seu espaço dedicado a você mesmo.', ' sou apaixonado pela psicanálise, principalmente os temas que envolvem a diversidade sexual humana. Gosto muito de filosofia, em especial a epistemologia, assim como a mitologia grega, e creio que podemos compreender muito de nós mesmos através dos mitos e dos questionamentos que a filosofia nos proporciona.', NULL, 'UFSP', '162328159960c14fbf48805.jpeg', 'Inglês', '90,00', '6', 'm', NULL, 'qrcode.png', 0),
('736972397', 'Mauro Luiz Cardoso', 'mauro@mauro.com', '68dfdb93cf897626ca2f1c35c9f9ceec7afe1066', '22/02/1980', 'SP', '09133-060', '41.902.305-7', '497.002.970-98', '(11)98117-2341', 'Rua Sousa lima, n° 32', '06/98712', 'Online', 1, '2006', '60min', ' Já precisei procurar ajuda psicológica na minha vida e sei o quão difícil é estar numa situação de angústia extrema, desamparo, confusão ou solidão. Sei também que dá para sair dessa, com ajuda, foco e persistência. Agora estou do outro lado da sala e fico muito feliz em poder ajudar como psicólogo', 'Na minha sessão, tenho o objetivo de lhe fornecer uma relação segura, na qual você poderá ser 100% você mesmo(a). Procuro também enxergar como ocorre sua relação com as pessoas, com os amigos, familiares, até com coisas abstratas (medos, responsabilidades, desejos), assim tenho uma boa noção de como você é como ser único e o quê possivelmente está lhe causando sofrimento (e possivelmente o porquê lhe causa sofrimento), além de você ampliar sua visão de si mesmo. O objetivo final é causar um desenvolvimento na sua personalidade, lhe tornando alguém mais forte perante as grandes dificuldades da vida. Para ser o psicólogo que sou, eu me baseio primeiramente nos princípios da Análise do Comportamento -- ela é como se fosse a coluna vertebral do meu arcabouço teórico.', NULL, 'UFRS', '162421550060cf8fccda616jpeg', 'Português, Inglês e Italiano', '70,00', '12', 'm', NULL, NULL, 0),
('746169448', 'Samuel Santos Lima', 'samuel@samuel.com', '8cb2237d0679ca88db6464eac60da96345513964', '12/06/1988', 'SP', '08122-080', '28.946.521-7', '550.237.660-55', NULL, NULL, '06/01212', 'Online', 1, '2018', '50min', '\nRecordar. Repetir e Elaborar. É através da psicanálise que vamos investigar o inconsciente e conhecer as raízes das suas demandas. Seja muito bem-vinda e muito bem-vindo ao meu consultório online. Este é o seu espaço dedicado a você mesmo.', 'Em 2016 comecei a atender online, atendendo inicialmente brasileiros residentes no exterior que procuravam a psicoterapia com alguém que entendesse seu idioma e sua cultura. Para mim o atendimento online é uma ferramenta de inclusão que permite o acesso à psicoterapia inclusive para pessoas que de outra forma não seria possível acessá-la.\n\nAgora é o melhor momento e o online é o melhor caminho! Estou à disposição para te ajudar.', NULL, 'UFRJ', '14.jpeg', 'Português', '70,00', '24', 'm', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_nicho`
--

CREATE TABLE `tipo_nicho` (
  `id_tipo_nicho` int(11) NOT NULL,
  `id_psic` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipo_nicho`
--

INSERT INTO `tipo_nicho` (`id_tipo_nicho`, `id_psic`, `nome`) VALUES
(11, 123456, 'Orientação profissional'),
(12, 123456, 'Psicologia organizacional e do trabalho'),
(13, 123456, 'Psicologia organizacional e do trabalho'),
(16, 694628662, 'Orientação profissional'),
(17, 694628662, 'Psicologia de trânsito'),
(19, 1341553486, 'Psicologia de trânsito'),
(21, 1341553486, 'Psicologia social'),
(22, 1341553486, 'Neuropsicologia'),
(23, 1341553486, 'Comportamento do consumidor'),
(24, 1341553486, 'Psicologia organizacional e do trabalho'),
(25, 1065604361, 'Orientação profissional'),
(26, 1065604361, 'Psicologia educacional ou escolar'),
(27, 1065604361, 'Acompanhamento terapêutico'),
(28, 1065604361, 'Psicologia social'),
(29, 1370923711, 'Neuropsicologia'),
(30, 1370923711, 'Acompanhamento terapêutico'),
(31, 1370923711, 'Psicologia social'),
(32, 1548621570, 'Acompanhamento terapêutico'),
(33, 1548621570, 'Neuropsicologia'),
(34, 1548621570, 'Psicologia organizacional e do trabalho'),
(35, 1548621570, 'Orientação profissional'),
(36, 1548621570, 'Psicologia educacional ou escolar'),
(37, 1406286231, 'Acompanhamento terapêutico'),
(38, 1406286231, 'Psicologia social'),
(39, 1406286231, 'Orientação profissional'),
(40, 1037570738, 'Orientação profissional'),
(41, 1037570738, 'Neuropsicologia');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cad_usuario`
--
ALTER TABLE `cad_usuario`
  ADD PRIMARY KEY (`unique_id`);

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Índices de tabela `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Índices de tabela `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`id_especialidade`);

--
-- Índices de tabela `esp_psico`
--
ALTER TABLE `esp_psico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_agendamento`);

--
-- Índices de tabela `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id_hora`);

--
-- Índices de tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Índices de tabela `nicho_psicologico`
--
ALTER TABLE `nicho_psicologico`
  ADD PRIMARY KEY (`id_nicho`);

--
-- Índices de tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `psicologos`
--
ALTER TABLE `psicologos`
  ADD PRIMARY KEY (`unique_id`);

--
-- Índices de tabela `tipo_nicho`
--
ALTER TABLE `tipo_nicho`
  ADD PRIMARY KEY (`id_tipo_nicho`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de tabela `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `id_especialidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de tabela `esp_psico`
--
ALTER TABLE `esp_psico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de tabela `horas`
--
ALTER TABLE `horas`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de tabela `tipo_nicho`
--
ALTER TABLE `tipo_nicho`
  MODIFY `id_tipo_nicho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
