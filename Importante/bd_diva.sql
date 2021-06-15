-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14/06/2021 às 16:35
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
('1460747688', 'Thiago', '09/09/1993', NULL, 'thiago@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '305.938.510-64', '', '08122-080', NULL, 'user.png', '34.900.788-09', 'Online', 1),
('267154862', 'keven soares', '22/04/2003', NULL, 'keven@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '578.923.975-58', NULL, '08121-321', NULL, NULL, '58.328.203-9', 'Online', 0),
('308104992', 'Gustavo Rios', '07/12/1995', NULL, 'grios@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '128.695.490-83', '', '08122-080', NULL, 'user.png', '12.345.765-9', 'Online', 1),
('351010038', 'Lucas de Oliveira', '16/08/2003', NULL, 'lucasoe007@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '12345678999', '', '08122-080', NULL, 'user.png', '38.731.090-1', 'Online', 1),
('589349873', 'Alexia Alberiz', '11/05/2004', NULL, 'alexia@alexia.com', '8cb2237d0679ca88db6464eac60da96345513964', '12345678762', '', '08122-080', NULL, 'user.png', '38.731.012-7', 'Online', 1),
('771384558', 'Mannuelly Dias', '19/03/2001', 'f', 'manu@manu.com', '8cb2237d0679ca88db6464eac60da96345513964', '374.838.688-09', '(11)98871-9080', '08122-080', 'SP', '162250472260b57512c6871jpeg', '32.808.099-9', 'Online', 1),
('846225059', 'Paciente teste', '1992-09-12', 'm', 'paciente@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '374.058.006-56', '(+55) 968813-442', '08122-080', 'SP', '162216876760b054bf26b3e.jpeg', '30.751.824-8', 'Online', 0),
('946544665', 'Lucas de Oliveira', '16/08/2003', NULL, 'lucasmiau@gmail.com', '4de4d95fc854e7883bec112a191c867c0678ca42', '374.058.006-56', NULL, '08122-010', NULL, 'user.png', '30.721.024-7', 'Online', 0);

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
(6, 'Quinta-Feira, 10:00 - 10:30', 123456, 846225059, 0, 'Dinheiro', 0),
(9, 'Segunda-Feira, 19:00 - 20:00', 1341553486, 1043688555, 1, 'Dinheiro', 1),
(10, 'Segunda-Feira, 7:00 - 8:00', 694628662, 351010038, 0, 'Dinheiro', 0),
(11, 'Segunda-Feira, 20:00 - 21:00', 1341553486, 1460747688, 0, 'Dinheiro', 0);

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
(41, 'PConflitos Profissionais', NULL),
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
(23, 'Estresse', 694628662);

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
(17, 'Segunda-Feira', '11:00', '12:00', '1341553486', 0),
(18, 'Terça-Feira', '7:00', '8:00', '1341553486', 0),
(19, 'Terça-Feira', '8:00', '9:00', '1341553486', 1),
(20, 'Domingo', '10:00', '11:00', '1341553486', 0),
(21, 'Domingo', '11:30', '12:00', '123456', 0),
(22, 'Segunda-Feira', '10:30', '11:30', '123456', 0),
(23, 'Segunda-Feira', '14:00', '15:00', '123456', 0),
(24, 'Segunda-Feira', '12:00', '13:00', '1341553486', 0),
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
(3, '123456', '351010038', 'Nova Consulta', 'Não visto'),
(5, '1234', '123456', 'Nova mensagem', 'Não visto'),
(6, '1234', '123456', 'Nova mensagem', 'Visto'),
(9, '694628662', '351010038', 'Nova Mensagem', 'Não Visto'),
(10, '1341553486', '1460747688', 'Nova Consulta', 'Não Visto'),
(11, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(12, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(13, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(14, '1460747688', '1341553486', 'Nova Mensagem', 'Não Visto'),
(15, '1460747688', '1341553486', 'Nova Mensagem', 'Não Visto'),
(16, '1460747688', '1341553486', 'Nova Mensagem', 'Não Visto'),
(17, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(18, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(19, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(20, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(21, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(22, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto'),
(23, '1341553486', '1460747688', 'Nova Mensagem', 'Não Visto');

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
  `desativada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `psicologos`
--

INSERT INTO `psicologos` (`unique_id`, `nome`, `email`, `senha`, `nascimento`, `estado`, `cep`, `rg`, `cpf`, `telefone`, `local`, `crp`, `status`, `situacao`, `tempo_experiencia`, `tempo_consulta`, `resumo`, `texto`, `diploma`, `faculdade`, `foto`, `idioma`, `valor`, `remarcacao`, `sexo`, `desativada`) VALUES
('123456', 'João Lima', 'psiquiatra@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '13/02/1989', 'SP', '08122-080', NULL, NULL, '968813442', 'Rua dos magos, n° 66, Jd. do Carmo', '09-01234', NULL, 1, '2013', '40min', 'O texto curto para mostrar ao usuarios, llllllllllll llllllllllllllllllllllll lll llllllll', 'kkkkkkkkkkkkkkk k kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkk kkkkkkkk kkkkkk  kkkkkkkkkkkk kkkkkkk kkkkkkkkkk', NULL, NULL, ' 162216871860b0548e96337.jpeg', 'Português e Inglês', '80,00', '12', 'm', 1),
('1341553486', 'Joana Doria Silva', 'drjoana@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '12/09/1996', 'SP', '08122-080', '38.721.720-70', '374.868.988-65', '96881-3442', 'Rua Alvaro alvorada, n° 777, Itaqua', '09-88123', 'Online', 1, '2018', '40min', 'Amo cuidar de pessoas, psicologia é minha paixão. mo cuidar de pessoasmo cuidar de pessoasmo cuidar de pessoasmo cuidar de pessoas.', 'mo cuidar de pessoas, psicologia é minha paixão.  mo cuidar de pessoas, psicologia é minha paixão. ', NULL, NULL, 'user.png', 'Inglês, Português', '80', '24', 'f', 1),
('260532961', 'Marcos Paulo', 'marcao@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '07/09/1988', 'SP', '08122-080', '32.909.765-9', '305.938.510-64', '(11) 968813442', 'Rua dos lagos, n° 37, jd Oliva', '05-00891', 'Online', 1, '2007', '50min', 'Olá, bem vindo a este espaço. Sou psicólogo clínico e tenho experiência em Terapia Humanista - Abordagem Centrada na Pessoa(ACP).\r\nConsidero que todas as pessoas possam ser compreendidas e acolhidas, independente da experiência que estejam vivenciando.\r\nA ACP é uma abordagem que considera único cada indivíduo e entende que é possível ajudar o outro através de um processo de autoconhecimento e de escuta acolhedora e empática.\r\nSeja bem vindo a este espaço de acolhimento.', 'Na minha formação em Psicologia pela Universidade Federal de Minas Gerais tive oportunidade de trabalhar com diversas áreas da Psicologia (social, desenvolvimento, clínica, etc). Em paralelo busquei experiências no mercado e construí uma carreira voltada para o Recursos Humanos, principalmente para o mercado de Startups.\r\nHoje busco dividir meu tempo em um balanço entre clínica e Recursos Humanos, pois percebo que tais experiências são muito complementares e podem proporcionar maior compreensão das experiências vividas', NULL, NULL, 'user.png', 'Português', '80,00', '12', 'm', 1),
('694628662', 'Thiago', 'thiago@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '12/08/1984', 'SP', '08122-080', '32.899..423-9', '305.938.510-64', '(11) 96881-3442', 'Rua Lagos azul, N° 43', '08-01234', 'Online', 1, '2011', '50min', 'ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', NULL, NULL, '162328159960c14fbf48805jpeg', 'Inglês', '90,00', '6', 'm', 0);

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
(15, 1341553486, 'Psicologia de trânsito'),
(16, 694628662, 'Orientação profissional'),
(17, 694628662, 'Psicologia de trânsito');

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
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de tabela `tipo_nicho`
--
ALTER TABLE `tipo_nicho`
  MODIFY `id_tipo_nicho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
