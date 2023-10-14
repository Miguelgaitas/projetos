-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Out-2023 às 15:45
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id20757658_dados_dos_registros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `codigo_postal` varchar(8) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id`, `nome`, `endereco`, `cidade`, `codigo_postal`, `telefone`) VALUES
(1, 'Aquário Electrónica', 'R. Dr. Júlio de Matos 65', 'Porto', '4200-356', '225072810');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas_produtos`
--

CREATE TABLE `lojas_produtos` (
  `id` int(11) NOT NULL,
  `loja_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lojas_produtos`
--

INSERT INTO `lojas_produtos` (`id`, `loja_id`, `produto_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `pergunta` text DEFAULT NULL,
  `data_publicacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `autor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade_em_stock` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `quantidade_em_stock`, `link`) VALUES
(1, 'Arduino UNO Rev3', 'O Arduino Uno é uma placa eletrônica acessível, com ATmega328P, ideal para diversos projetos, suportada por uma comunidade robusta.', '81.00', 39, 'https://www.aquario.pt/pt/product/velleman-arduino-uno-rev3-arduino-uno-r3?gclid=Cj0KCQjw6cKiBhD5ARIsAKXUdybaDZYw0h6j2BcyESLE5E9W3Suoh0RrHJz2GWlWAAkjePCjIg7h3zIaAsurEALw_wcB'),
(2, 'OcioDual Kit 50 diodos LED 5 mm vermelho azul verde amarelo branco para robótica eletrónica', '\r\nO LED do Arduino emite luz com corrente elétrica, indicando estados em projetos eletrônicos controlados por programação em placas Arduino.', '10.00', 67, 'https://www.amazon.es/-/pt/dp/B077SDNZHT/ref=asc_df_B077SDNZHT/?tag=ptgogshpadde-21&linkCode=df0&hvadid=634424762838&hvpos=&hvnetw=g&hvrand=12330639144680755817&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=20871&hvtargid=pla-1178146536920&p');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos_arduino`
--

CREATE TABLE `projetos_arduino` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `codigo` text NOT NULL,
  `simula` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `projetos_arduino`
--

INSERT INTO `projetos_arduino` (`id`, `autor`, `nome`, `descricao`, `imagem`, `codigo`, `simula`, `status`) VALUES
(1, 1, 'Nivel: 1 Led Que Pisca', 'O código fornecido é um exemplo simples que demonstra como fazer um LED piscar utilizando um Arduino. Vamos descrever passo a passo o que o código faz:\r\n\r\nPasso 1: Configuração inicial\r\nNo início do programa, temos a função void setup(). Esta função é executada apenas uma vez e é usada para configurar o ambiente inicial do Arduino. Neste caso, temos a instrução pinMode(13, OUTPUT), que define o pino 13 como uma saída, indicando que iremos utilizar esse pino para enviar um sinal de saída.\r\n\r\nPasso 2: Loop principal\r\nApós a configuração inicial, entramos na função void loop(), que será executada continuamente. Nesta função, temos as seguintes etapas:\r\n\r\nPasso 3: Ligar o LED\r\nUtilizando a instrução digitalWrite(13, HIGH), definimos o pino 13 como \"HIGH\", o que significa que estamos a ligar o LED conectado a esse pino. Isso faz com que o LED acenda.\r\n\r\nPasso 4: Pausa\r\nCom a instrução delay(1000), o programa faz uma pausa de 1000 milissegundos (1 segundo). Durante esse tempo, o LED permanece aceso.\r\n\r\nPasso 5: Desligar o LED\r\nUtilizando a instrução digitalWrite(13, LOW), definimos o pino 13 como \"LOW\", o que significa que estamos a desligar o LED conectado a esse pino. Isso faz com que o LED apague.\r\n\r\nPasso 6: Pausa\r\nNovamente, o programa faz uma pausa de 1000 milissegundos (1 segundo) com a instrução delay(1000). Durante esse tempo, o LED permanece apagado.\r\n\r\nO código retorna ao início da função loop() e repete os passos de ligar e desligar o LED, criando assim um efeito contínuo de piscar.\r\n\r\nEm resumo, o código configura o pino 13 como saída e alterna entre ligar e desligar o LED conectado a esse pino com intervalos de 1 segundo, resultando num efeito de piscar visível no LED. Este é um exemplo básico que ilustra o uso das funções pinMode(), digitalWrite() e delay(), que são comuns ao trabalhar com Arduino.', 'Capturar.PNG', 'void setup()\r\n{\r\n  pinMode(13, OUTPUT);\r\n}\r\n\r\nvoid loop()\r\n{\r\n  digitalWrite(13, HIGH);\r\n  delay(1000); // Wait for 1000 millisecond(s)\r\n  digitalWrite(13, LOW);\r\n  delay(1000); // Wait for 1000 millisecond(s)\r\n}', '<iframe width=\"600\" height=\"400\" src=\"https://www.tinkercad.com/embed/dbLWSh0cXiv?editbtn=1\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\"></iframe>', 'verificado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `pergunta_id` int(11) DEFAULT NULL,
  `resposta` text DEFAULT NULL,
  `data_publicacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `autor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tokens_reset_senha`
--

CREATE TABLE `tokens_reset_senha` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiracao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tokens_reset_senha`
--

INSERT INTO `tokens_reset_senha` (`id`, `usuario_id`, `token`, `expiracao`) VALUES
(2, 2, '96203cb0cd065a2a9e262652aab62e8f6f4be8e946126af5c1bf83f41391a59a', '2023-10-10 12:05:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('nao_verificado','verificado') NOT NULL DEFAULT 'nao_verificado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `admin`, `status`) VALUES
(1, 'Arduino Code Masters', 'admin@gmail.com', '5fe621f8cd25d4cdc3d9f976a0768f0c', 1, 'verificado'),
(2, 'MiguelGaitas', 'brunomiguelvieira2005@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'verificado'),
(13, 'Philipe', 'philipe@gmail.com', '850f371604563b430d82d0cdccb3ff25', 0, 'verificado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lojas_produtos`
--
ALTER TABLE `lojas_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loja_id` (`loja_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projetos_arduino`
--
ALTER TABLE `projetos_arduino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_projetos_arduino_usuarios` (`autor`);

--
-- Índices para tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pergunta_id` (`pergunta_id`);

--
-- Índices para tabela `tokens_reset_senha`
--
ALTER TABLE `tokens_reset_senha`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `lojas_produtos`
--
ALTER TABLE `lojas_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `projetos_arduino`
--
ALTER TABLE `projetos_arduino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tokens_reset_senha`
--
ALTER TABLE `tokens_reset_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `lojas_produtos`
--
ALTER TABLE `lojas_produtos`
  ADD CONSTRAINT `lojas_produtos_ibfk_1` FOREIGN KEY (`loja_id`) REFERENCES `lojas` (`id`),
  ADD CONSTRAINT `lojas_produtos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `projetos_arduino`
--
ALTER TABLE `projetos_arduino`
  ADD CONSTRAINT `FK_projetos_arduino_usuarios` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
