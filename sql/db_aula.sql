-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_aula
CREATE DATABASE IF NOT EXISTS `db_aula` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_aula`;

-- Copiando estrutura para tabela db_aula.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `valor` float NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_aula.pedido: ~2 rows (aproximadamente)
REPLACE INTO `pedido` (`id`, `nome`, `valor`, `data`) VALUES
	(1, 'Liliana Wrzesinski', 4800, '2023-06-29'),
	(2, 'Gabriel Riboli', 1000, '2023-06-29');

-- Copiando estrutura para tabela db_aula.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagem` longblob NOT NULL,
  `quantidade` int NOT NULL,
  `preco` float NOT NULL,
  `descricao` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_aula.produto: ~2 rows (aproximadamente)
REPLACE INTO `produto` (`id`, `nome`, `imagem`, `quantidade`, `preco`, `descricao`) VALUES
	(1, ' A verdade sobre o caso Harry Quebert', _binary 0x44657369676e2073656d206e6f6d65202831292e706e67, 1, 20, ' Mistério'),
	(5, 'Good Omens', _binary '', 1, 25, 'O mundo vai acabar em um sábado. No próximo sábado, para falar a verdade. Pouco antes da hora do jantar.');

-- Copiando estrutura para tabela db_aula.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `login` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `senha` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula.usuario: ~7 rows (aproximadamente)
REPLACE INTO `usuario` (`id`, `nome`, `telefone`, `email`, `login`, `senha`) VALUES
	(1, 'Liliana', '49999714294', 'lilianawrzesinski@gmail.com', 'admin', '1234'),
	(34, 'Liliana Wrzesinski', '49999714294', 'lilianawrzesinski@gmail.com', NULL, NULL),
	(35, 'Liliana Wrzesinski', '49999714294', 'lilianawrzesinski@gmail.com', NULL, NULL),
	(36, 'Liliana Wrzesinski', '49999714294', 'lilianawrzesinski@gmail.com', NULL, NULL),
	(37, 'Liliana Wrzesinski', '49999714294', 'lilianawrzesinski@gmail.com', 'lili', '123'),
	(38, 'Liliana Wrzesinski', '49999714294', 'lilianawrzesinski@gmail.com', 'admina', '$2y$10$bZwLG/nw3OoeqawQXfBxLeGHjG3MpkegfLzEmkEG5aD4M9PW9bWNK'),
	(39, 'Liliana Wrzesinski', '49999714294', 'lilianawrzesinski@gmail.com', 'adminb', '$2y$10$7Ev9CUkUbR.lfmMsqaZb0ualQ6nZ2bIFDT1kQXdUQgqiBAZgohPm6');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
