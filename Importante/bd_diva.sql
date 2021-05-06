-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 05/05/2021 às 21:40
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
-- Estrutura para tabela `cad_profissional`
--

CREATE TABLE `cad_profissional` (
  `id_psicologo` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `nascimento` varchar(12) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `num` varchar(5) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `crp` varchar(10) DEFAULT NULL,
  `diploma` varchar(37) DEFAULT NULL,
  `foto` varchar(37) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `unique_id` varchar(200) DEFAULT NULL,
  `situacao` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_usuario`
--

CREATE TABLE `cad_usuario` (
  `id_paciente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nascimento` char(10) NOT NULL,
  `telefone` char(19) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `senha` char(40) NOT NULL,
  `cpf` char(14) NOT NULL,
  `cep` char(9) NOT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `num` varchar(5) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `foto` varchar(37) DEFAULT NULL,
  `rg` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `unique_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cad_usuario`
--

INSERT INTO `cad_usuario` (`id_paciente`, `nome`, `nascimento`, `telefone`, `sexo`, `email`, `senha`, `cpf`, `cep`, `rua`, `num`, `bairro`, `cidade`, `estado`, `foto`, `rg`, `status`, `unique_id`) VALUES
(1, 'Lucas de Oliveira', '16/08/2003', NULL, NULL, 'lucasmiau@gmail.com', '4de4d95fc854e7883bec112a191c867c0678ca42', '374.058.006-56', '08122-010', NULL, NULL, NULL, NULL, NULL, NULL, '30.721.024-7', 'Online', '946544665'),
(2, 'Neymar Junior', '05/02/1992', NULL, NULL, 'ney@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '374.058.006-56', '08122-000', NULL, NULL, NULL, NULL, NULL, NULL, '30.751.124-7', 'Online', '1408673948'),
(3, 'keven soares', '22/04/2003', NULL, NULL, 'keven@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '578.923.975-58', '08121-321', NULL, NULL, NULL, NULL, NULL, NULL, '58.328.203-9', 'Online', '267154862'),
(4, 'halland', '16/02/1999', NULL, NULL, 'haland@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '999.058.606-58', '08122-080', NULL, NULL, NULL, NULL, NULL, NULL, '52.328.893-9', 'Online', '143676301'),
(5, 'Paciente teste', '22/04/2003', '(11)96881-3442', NULL, 'paciente@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '374.058.006-56', '08122-080', NULL, NULL, NULL, NULL, NULL, NULL, '30.751.824-8', 'Online', '846225059'),
(6, 'Teste2', '16/02/1999', NULL, NULL, 'test.e@gmailcom', '8cb2237d0679ca88db6464eac60da96345513964', '143.873.922-65', '08122-080', NULL, NULL, NULL, NULL, NULL, NULL, '37.987.921-0', 'Online', '982704140');

-- --------------------------------------------------------

--
-- Estrutura para tabela `diast`
--

CREATE TABLE `diast` (
  `diaID` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `id_psicologo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(20, 982704140, 846225059, 'ola tbm');

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
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `sexo` varchar(90) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cep` varchar(12) NOT NULL,
  `nascimento` varchar(10) NOT NULL,
  `status` varchar(200) NOT NULL,
  `unique_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nome`, `sexo`, `cpf`, `rg`, `telefone`, `email`, `senha`, `cep`, `nascimento`, `status`, `unique_id`) VALUES
(1, 'Lucas de Oliveira', NULL, '374.838.688-99', '30.721.024-7', NULL, 'lucaspadauan777@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08122-080', '16/08/2003', '', 0),
(2, 'Luan de Oliveira', NULL, '374.058.006-56', '30.751.824-8', NULL, 'lulu@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '08122-010', '16/08/2002', 'Online', 789737243),
(3, 'Maicon kuster', NULL, '374.058.606-58', '30.411.021-7', NULL, 'kuster@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '08122-000', '16/02/2012', 'Online', 697053475),
(4, 'Manu', NULL, '412.058.606-58', '30.411.021-8', NULL, 'manu@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '08122-080', '16/08/2002', 'Online', 1242144219),
(5, 'Edu', NULL, '374.838.126-56', '30.411.021-8', NULL, 'dudu@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '08122-000', '16/02/2000', 'Online', 1186842808),
(6, 'Eduardo ', NULL, '374.838.126-56', '30.411.021-8', NULL, 'duardo@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '08122-000', '16/02/2000', 'Online', 572754993),
(7, 'Nexus', NULL, '374.058.606-58', '30.411.021-7', NULL, 'nex@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '08122-000', '16/08/2003', 'Online', 601658706);

-- --------------------------------------------------------

--
-- Estrutura para tabela `psicologos`
--

CREATE TABLE `psicologos` (
  `id_psicologos` int(11) NOT NULL,
  `nome` varchar(90) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(14) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `unique_id` varchar(100) DEFAULT NULL,
  `crp` varchar(15) DEFAULT NULL,
  `situacao` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `psicologos`
--

INSERT INTO `psicologos` (`id_psicologos`, `nome`, `sexo`, `cpf`, `rg`, `telefone`, `email`, `senha`, `cep`, `nascimento`, `status`, `unique_id`, `crp`, `situacao`) VALUES
(1, 'Jabson Lima', NULL, '374.838.126-56', '30.751.124-7', NULL, 'jabs@jbs.com', '8cb2237d0679ca88db6464eac60da96345513964', '08122-080', '16/08/2002', NULL, NULL, NULL, 1),
(2, 'Juanio', NULL, '432.897.761-08', '38.731.837-0', NULL, 'juanio@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08122080', '16/08/1997', 'Online', '123456789', '87643', 0),
(3, 'Juan rodrigues', NULL, '374.058.006-56', '30.751.824-8', NULL, 'juan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08121-321', '06/09/1969', 'Online', '1245145576', '0152310', 0),
(4, 'Claudio Messias', NULL, '374.838.126-56', '30.751.124-7', NULL, 'clau@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08122-010', '16/11/1977', 'Online', '1076254783', '0152310', 0),
(5, 'Psicologo teste', 'masculino', '345.987.008-54', '58.981.255-9', '96881-0990', 'psicologo1@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08122-080', '12/12/1990', 'Online', '123456', '0503651', 1),
(6, 'Psicologo teste2', 'feminino', '345.987.558-54', '58.001.255-9', '96881-0990', 'psicologo1@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08122-080', '22/10/1990', 'Online', '234567', '0503571', 1),
(7, 'Psicologo teste3', 'masculino', '345.337.008-54', '58.331.255-9', '96881-0990', 'psicologo3@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08192-080', '13/02/1992', 'Online', '3890056', '0502551', 1),
(8, 'Psicologo4', NULL, '253.262.379-7', '23.987.656-9', NULL, 'psic4@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08122-090', '22/09/1989', 'Online', '927103694', '12/08912', 0),
(9, 'Doutor JoÃ£o', 'm', '255.877.976-23', '12.987.456-0', '(11) 4002-8922', 'psiquiatra@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08122-090', '13/09/1994', 'Online', '687908762', '11/0986-x', 1);

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
-- Índices de tabela `cad_profissional`
--
ALTER TABLE `cad_profissional`
  ADD PRIMARY KEY (`id_psicologo`);

--
-- Índices de tabela `cad_usuario`
--
ALTER TABLE `cad_usuario`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Índices de tabela `diast`
--
ALTER TABLE `diast`
  ADD PRIMARY KEY (`diaID`),
  ADD KEY `FK_psic` (`id_psicologo`);

--
-- Índices de tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Índices de tabela `psicologos`
--
ALTER TABLE `psicologos`
  ADD PRIMARY KEY (`id_psicologos`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cad_profissional`
--
ALTER TABLE `cad_profissional`
  MODIFY `id_psicologo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `cad_usuario`
--
ALTER TABLE `cad_usuario`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `psicologos`
--
ALTER TABLE `psicologos`
  MODIFY `id_psicologos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `diast`
--
ALTER TABLE `diast`
  ADD CONSTRAINT `FK_psic` FOREIGN KEY (`id_psicologo`) REFERENCES `psicologos` (`id_psicologos`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
