-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.11-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para tarifa
CREATE DATABASE IF NOT EXISTS `tarifa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tarifa`;

-- Copiando estrutura para tabela tarifa.operador
CREATE TABLE IF NOT EXISTS `operador` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESC` varchar(50) NOT NULL,
  `ATIVO` int(11) NOT NULL DEFAULT 1 COMMENT '1=ATIVO, 0=INATIVO',
  `DT_CADASTRO` date NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DESC` (`DESC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela tarifa.operador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `operador` DISABLE KEYS */;
/*!40000 ALTER TABLE `operador` ENABLE KEYS */;

-- Copiando estrutura para tabela tarifa.tarifa
CREATE TABLE IF NOT EXISTS `tarifa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_OPERADOR` int(11) NOT NULL,
  `VALOR` float(10,2) NOT NULL DEFAULT 0.00,
  `ATIVO` int(11) NOT NULL DEFAULT 1 COMMENT '1=ATIVO, 0=INATIVO',
  `DT_CADASTRO` date NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela tarifa.tarifa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tarifa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
