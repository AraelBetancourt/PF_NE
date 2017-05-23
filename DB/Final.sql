CREATE DATABASE  IF NOT EXISTS `PF_NE` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `PF_NE`;
-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: PF_NE
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Alumnas`
--

DROP TABLE IF EXISTS `Alumnas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alumnas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `idgrupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Alumnas_ibfk_1` (`idgrupo`),
  CONSTRAINT `Alumnas_ibfk_1` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `AlumnasPrivada`
--

DROP TABLE IF EXISTS `AlumnasPrivada`;
/*!50001 DROP VIEW IF EXISTS `AlumnasPrivada`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `AlumnasPrivada` AS SELECT 
 1 AS `idpago`,
 1 AS `idalumna`,
 1 AS `idgrupo`,
 1 AS `nomMama`,
 1 AS `fechapago`,
 1 AS `fechaenvio`,
 1 AS `url`,
 1 AS `Folio`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `AlumnasPublica`
--

DROP TABLE IF EXISTS `AlumnasPublica`;
/*!50001 DROP VIEW IF EXISTS `AlumnasPublica`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `AlumnasPublica` AS SELECT 
 1 AS `idpago`,
 1 AS `idalumna`,
 1 AS `idgrupo`,
 1 AS `nomMama`,
 1 AS `fechapago`,
 1 AS `fechaenvio`,
 1 AS `Folio`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `Alumnas_Vista`
--

DROP TABLE IF EXISTS `Alumnas_Vista`;
/*!50001 DROP VIEW IF EXISTS `Alumnas_Vista`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `Alumnas_Vista` AS SELECT 
 1 AS `id`,
 1 AS `nombre`,
 1 AS `apellido`,
 1 AS `edad`,
 1 AS `fechaNacimiento`,
 1 AS `idgrupo`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `idalumna` int(11) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  `nomMama` varchar(100) NOT NULL,
  `fechapago` date NOT NULL,
  `fechaenvio` datetime NOT NULL,
  `url` varchar(255) NOT NULL,
  `Folio` varchar(45) NOT NULL,
  PRIMARY KEY (`idpago`),
  KEY `idalumna` (`idalumna`),
  KEY `idgrupo` (`idgrupo`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idalumna`) REFERENCES `Alumnas` (`id`),
  CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
insert into users Values ('admin',md5('admin'));
--
-- Dumping events for database 'PF_NE'
--

--
-- Dumping routines for database 'PF_NE'
--
/*!50003 DROP PROCEDURE IF EXISTS `AddorUpdateAluman` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddorUpdateAluman`(in tipo int,in nom varchar(50),in ape varchar(50),in fecha date,in grupo int)
BEGIN
	if(tipo=-1) then 
		insert into Alumnas values (0,nom,ape,fecha,grupo);
        select "add" as res;
    else
		UPDATE Alumnas SET nombre=nom, apellido=ape, fechaNacimiento=fecha, idgrupo=grupo WHERE id=tipo;
        select "update" as res;
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addPago` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addPago`(in ia int,in nom varchar(50),in pam varchar(50),in fp date, in url Varchar(255), in fo Varchar(45))
BEGIN
	declare fol int;
    declare ok int;
    set fol=(Select count(*) from pagos p where p.Folio=fo);
    if(fol=0) then
		set ok=(select idgrupo from Alumnas where id=ia);
		insert into pagos values(0,ia,ok,concat(nom," ",pam),fp,now(),url,fo);
		select "add" as res;
    else
		select "Duplicado" as res;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addUpdateGrupo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUpdateGrupo`(in idg int,in nom varchar(50))
BEGIN
	if(idg=-1) then
		insert into grupos values (0,nom);
        select "add" as res;
    else
		UPDATE grupos SET nombre=nom WHERE id=idg;
        select "update" as res;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DeleteAlumna` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteAlumna`(in ida int)
BEGIN
	DELETE from pagos where idalumna=ida;
    DELETE from Alumnas where id=ida;
    select "Elimino" as res;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteGrupo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteGrupo`(in idg int)
BEGIN
	update Alumnas set idgrupo=null where idgrupo=idg; 
	delete from grupos where id=idg;
    select "Elimino" as res;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(in u varchar(50),in pa varchar(16))
BEGIN
	select count(username) as esta from users where username=u and pass=md5(pa);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `AlumnasPrivada`
--

/*!50001 DROP VIEW IF EXISTS `AlumnasPrivada`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `AlumnasPrivada` AS select `P`.`idpago` AS `idpago`,concat(`A`.`nombre`,' ',`A`.`apellido`) AS `idalumna`,`G`.`nombre` AS `idgrupo`,`P`.`nomMama` AS `nomMama`,`P`.`fechapago` AS `fechapago`,`P`.`fechaenvio` AS `fechaenvio`,`P`.`url` AS `url`,`P`.`Folio` AS `Folio` from ((`pagos` `P` join `Alumnas` `A` on((`A`.`id` = `P`.`idalumna`))) join `grupos` `G` on((`G`.`id` = `P`.`idgrupo`))) order by `P`.`fechaenvio` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `AlumnasPublica`
--

/*!50001 DROP VIEW IF EXISTS `AlumnasPublica`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `AlumnasPublica` AS select `P`.`idpago` AS `idpago`,concat(`A`.`nombre`,' ',`A`.`apellido`) AS `idalumna`,`G`.`nombre` AS `idgrupo`,`P`.`nomMama` AS `nomMama`,`P`.`fechapago` AS `fechapago`,`P`.`fechaenvio` AS `fechaenvio`,`P`.`Folio` AS `Folio` from ((`pagos` `P` join `Alumnas` `A` on((`A`.`id` = `P`.`idalumna`))) join `grupos` `G` on((`G`.`id` = `P`.`idgrupo`))) order by `P`.`fechaenvio` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Alumnas_Vista`
--

/*!50001 DROP VIEW IF EXISTS `Alumnas_Vista`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `Alumnas_Vista` AS select `A`.`id` AS `id`,`A`.`nombre` AS `nombre`,`A`.`apellido` AS `apellido`,timestampdiff(YEAR,`A`.`fechaNacimiento`,curdate()) AS `edad`,`A`.`fechaNacimiento` AS `fechaNacimiento`,`G`.`nombre` AS `idgrupo` from (`Alumnas` `A` left join `grupos` `G` on((`G`.`id` = `A`.`idgrupo`))) order by `A`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-23 12:00:49
