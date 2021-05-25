-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 24/05/2021 às 22:22
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
  `nome` varchar(50) NOT NULL,
  `nascimento` char(10) NOT NULL,
  `telefone` char(19) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `senha` char(40) NOT NULL,
  `cpf` char(14) NOT NULL,
  `cep` char(9) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `rg` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `unique_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cad_usuario`
--

INSERT INTO `cad_usuario` (`nome`, `nascimento`, `telefone`, `sexo`, `email`, `senha`, `cpf`, `cep`, `estado`, `foto`, `rg`, `status`, `unique_id`) VALUES
('Neymar Junior', '05/02/1992', NULL, NULL, 'ney@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '374.058.006-56', '08122-000', NULL, NULL, '30.751.124-7', 'Online', '1408673948'),
('halland', '16/02/1999', NULL, NULL, 'haland@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '999.058.606-58', '08122-080', NULL, NULL, '52.328.893-9', 'Online', '143676301'),
('keven soares', '22/04/2003', NULL, NULL, 'keven@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '578.923.975-58', '08121-321', NULL, NULL, '58.328.203-9', 'Online', '267154862'),
('Paciente teste', '1992-09-12', '(+55) 968813-442', 'm', 'paciente@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '374.058.006-56', '08122-080', 'SP', 'user.png', '30.751.824-8', 'Online', '846225059'),
('Lucas de Oliveira', '16/08/2003', NULL, NULL, 'lucasmiau@gmail.com', '4de4d95fc854e7883bec112a191c867c0678ca42', '374.058.006-56', '08122-010', NULL, 'user.png', '30.721.024-7', 'Online', '946544665');

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
  `pago` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `horario`, `id_psic`, `id_user`, `realizada`, `tipo_pagamento`, `pago`) VALUES
(1, 'Segunda-Feira, 9:30 - 10:00', 123456, 946544665, 1, 'pix', 'sim'),
(2, 'Terça-Feira, 7:00 - 7:30', 123456, 846225059, 0, 'dinheiro', 'não');

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
  `id_psico` int(11) DEFAULT NULL,
  `descricao` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `especialidade`
--

INSERT INTO `especialidade` (`id_especialidade`, `nome`, `id_psico`, `descricao`) VALUES
(1, 'Abuso Sexual', NULL, NULL),
(2, 'Adolescência', 123456, NULL),
(3, 'agressividade', NULL, NULL),
(4, 'Alteração de Humor', 123456, NULL),
(5, 'Ansiedade', 123456, NULL),
(6, 'Assédio Moral', NULL, NULL),
(7, 'Autismo', NULL, NULL),
(8, 'Auto-Mutilação', NULL, NULL),
(9, 'Autoconhecimento', NULL, NULL),
(10, 'Auto Estima', NULL, NULL),
(11, 'Bullying', NULL, NULL),
(12, 'Claustrofobia', NULL, NULL),
(13, 'Compulsão Alimentar', NULL, NULL),
(14, 'Culpa', NULL, NULL),
(15, 'Câncer', NULL, NULL),
(16, 'Depressão', 123456, NULL),
(17, 'Deficiência Física', NULL, NULL),
(18, 'Desmotivação', NULL, NULL),
(19, 'Doenças emocionais', NULL, NULL),
(20, 'Doenças Psicológicas', NULL, NULL),
(21, 'Esquizofrenia', NULL, NULL),
(22, 'Estresse', 123456, NULL),
(23, 'Felicidade', NULL, NULL),
(24, 'Foco', NULL, NULL),
(25, 'Ideias Suicidas', NULL, NULL),
(26, 'Medo e Fobias', NULL, NULL),
(27, 'Medo de Dirigir', NULL, NULL),
(28, 'Medo de Falar Em Público', NULL, NULL),
(29, 'Morte e Luto', NULL, NULL),
(30, 'Motivação', NULL, NULL),
(31, 'Obesidade', NULL, NULL),
(32, 'Obsessão', NULL, NULL),
(33, 'Orientação Sexual', NULL, NULL),
(34, 'Perfeccionismo', NULL, NULL),
(35, 'Problemas Financeiros', NULL, NULL),
(36, 'Procastinação', NULL, NULL),
(37, 'Racismo', NULL, NULL),
(38, 'Raiva', NULL, NULL),
(39, 'Relacionamentos amorosos', NULL, NULL),
(40, 'Conflitos Familiares', NULL, NULL),
(41, 'PConflitos Profissionais', NULL, NULL),
(42, 'Sono', NULL, NULL),
(43, 'Sindrome do Pânico', NULL, NULL),
(44, 'Terapia de Casal', NULL, NULL),
(45, 'Transtorno Bipolar', NULL, NULL),
(46, 'Transtorno Obsessivo Compulsivo (TOC)', NULL, NULL),
(47, 'Transtorno de Déficit de Atenção e Hiperatividade (TDAH)', NULL, NULL),
(48, 'Transtorno de Personalidade', NULL, NULL),
(49, 'Traumas e Abuso', NULL, NULL),
(50, 'Violência Doméstica', NULL, NULL),
(51, 'Vícios', NULL, NULL);

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
(5, 'Domingo', '7:00', '7:30', '123456', 0),
(6, 'Terça-Feira', '7:00', '7:30', '123456', 0),
(7, 'Quarta-Feira', '9:00', '9:30', '123456', 0),
(8, 'Quinta-Feira', '10:00', '10:30', '123456', 0),
(9, 'Sexta-Feira', '7:00', '8:00', '123456', 0),
(10, 'Sábado', '11:00', '11:30', '123456', 0),
(11, 'Terça-Feira', '10:00', '10:30', '123456', 0);

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
(37, 946544665, 123456, 'opa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nicho_psicologico`
--

CREATE TABLE `nicho_psicologico` (
  `id_nicho` int(11) NOT NULL,
  `nicho` varchar(50) NOT NULL,
  `id_psico` int(11) DEFAULT NULL,
  `descritivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `nicho_psicologico`
--

INSERT INTO `nicho_psicologico` (`id_nicho`, `nicho`, `id_psico`, `descritivo`) VALUES
(1, 'Psicologia educacional ou escolar', 123456, 'O profissional é responsável por buscar melhorias no rendimento dos alunos dentro das salas de aula. Para cumprir seu objetivo, ele trabalha com professores, diretores e pedagogos e identifica os problemas que interferem no aprendizado dos alunos.'),
(2, 'Psicologia organizacional e do trabalho', NULL, 'As empresas têm requisitado bastante o trabalho do psicólogo. A principal função do profissional dentro das companhias é atuar em processos de recrutamento e seleção de funcionários para as empresas, além de oferecer treinamento e desenvolvimento de pessoal.'),
(3, 'Psicologia de trânsito', NULL, 'Essa é uma das áreas de atuação da Psicologia menos populares, mas que atendem grande parte da população. Isso porque quem deseja tirar sua carta de motorista precisa passar por um teste, que é aplicado por psicólogos especializados — o famoso exame psicotécnico.Mas a área vai além de aplicar avaliações para futuros motoristas. O psicólogo de trânsito ainda desenvolve ações socioeducativas para quem foi punido por má conduta no volante.'),
(4, 'Psicologia social', 123456, 'Essa área cuida de pessoas em situação de vulnerabilidade, como idosos, e também trabalha em prol da recuperação de detentos. O psicólogo social atua em penitenciárias, asilos e centros de atendimento a crianças e adolescentes.Além disso, ele é responsável por elaborar programas e pesquisas sobre a saúde mental da população em geral.'),
(5, 'Psicologia hospitalar e da saúde', NULL, 'Muitas vezes, pacientes com doenças graves e seus familiares precisam de apoio psicológico para lidar com a doença. É nesse cenário que entra o psicólogo hospitalar, que atua com médicos e outros profissionais do setor de saúde para fortalecer familiares e pacientes física e mentalmente.'),
(6, 'Psicologia esportiva', NULL, 'Atletas sofrem muita pressão para ter bons resultados. Para ajudá-los nessa questão, existe uma área chamada psicologia do esporte, que trabalha a inteligência emocional desses profissionais. O objetivo é melhorar o rendimento de cada atleta e promover a harmonia entre todos os membros da equipe.'),
(7, 'Comportamento do consumidor', NULL, 'Entender o comportamento do cliente é muito importante para que as empresas saibam como atender às suas necessidades. Nesse contexto, o trabalho do psicólogo visa orientar o marketing e agências de publicidade a criar campanhas que causem impacto no público-alvo das empresas.'),
(8, 'Orientação profissional', 123456, 'Essa é uma das áreas de atuação da Psicologia mais conhecidas. Profissionais desse ramo trabalham para ajudar jovens a escolher a carreira e decidir qual faculdade ou curso devem fazer. Eles fazem isso por meio de testes de perfil e avaliação psicológica.'),
(9, 'Acompanhamento terapêutico', NULL, 'O trabalho dentro das clínicas e consultórios é o mais comum no mercado para esse profissional. Os psicólogos terapeutas acompanham crianças, jovens e adultos para que eles consigam viver com mais autonomia.'),
(10, 'Neuropsicologia', NULL, 'Essa é uma área complexa, que envolve questões cerebrais, ou seja, o neuropsicólogo precisa estudar o funcionamento do cérebro, que é a parte mais sofisticada do corpo humano. Isso porque ele atua com diagnóstico, acompanhamento, tratamento e pesquisa da cognição, das emoções e do comportamento do ser humano. O enfoque do trabalho desse profissional é o funcionamento do cérebro. Ele busca entender como o comportamento do ser humano é influenciado pelas funções cerebrais.');

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
  `sexo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `psicologos`
--

INSERT INTO `psicologos` (`unique_id`, `nome`, `email`, `senha`, `nascimento`, `estado`, `cep`, `rg`, `cpf`, `telefone`, `local`, `crp`, `status`, `situacao`, `tempo_experiencia`, `tempo_consulta`, `resumo`, `texto`, `diploma`, `faculdade`, `foto`, `idioma`, `valor`, `remarcacao`, `sexo`) VALUES
('123456', 'João Lima', 'psiquiatra@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1992-02-13', 'SP', '08122-080', NULL, NULL, '968813442', 'Rua dos magos, n° 66, Jd. do Carmo', '09-01234', NULL, 1, '2013', '40min', 'O texto curto para mostrar ao usuarios', '', NULL, NULL, 'user.png', 'Português e Inglês', '80,00', '12', 'm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_nicho`
--

CREATE TABLE `tipo_nicho` (
  `id_tipo_nicho` int(11) NOT NULL,
  `id_profissional` int(11) NOT NULL,
  `id_nicho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Índices de tabela `psicologos`
--
ALTER TABLE `psicologos`
  ADD PRIMARY KEY (`unique_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `horas`
--
ALTER TABLE `horas`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
