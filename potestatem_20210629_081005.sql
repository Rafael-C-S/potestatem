-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "al_aluno" -------------------------------------
CREATE TABLE `al_aluno`( 
	`id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`nome` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`cpf` VarChar( 11 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`deleted_at` Timestamp NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `al_aluno_cpf_unique` UNIQUE( `cpf` ),
	CONSTRAINT `al_aluno_email_unique` UNIQUE( `email` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "aluno_curso" ----------------------------------
CREATE TABLE `aluno_curso`( 
	`id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`aluno_id` Int( 10 ) UNSIGNED NOT NULL,
	`curso_id` Int( 10 ) UNSIGNED NOT NULL,
	`matricula` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`deleted_at` Timestamp NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "cr_curso" -------------------------------------
CREATE TABLE `cr_curso`( 
	`id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`nome` VarChar( 200 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`imagem` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`conteudo_programatico` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`deleted_at` Timestamp NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `cr_curso_nome_unique` UNIQUE( `nome` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "failed_jobs" ----------------------------------
CREATE TABLE `failed_jobs`( 
	`id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`uuid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`connection` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`queue` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`payload` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`exception` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`failed_at` Timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `failed_jobs_uuid_unique` UNIQUE( `uuid` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "migrations" -----------------------------------
CREATE TABLE `migrations`( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`migration` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`batch` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------


-- CREATE TABLE "password_resets" ------------------------------
CREATE TABLE `password_resets`( 
	`email` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`token` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users`( 
	`id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`email_verified_at` Timestamp NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`remember_token` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `users_email_unique` UNIQUE( `email` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- Dump data of "al_aluno" ---------------------------------
BEGIN;

INSERT INTO `al_aluno`(`id`,`nome`,`email`,`cpf`,`deleted_at`,`created_at`,`updated_at`) VALUES 
( '2', 'Rafael Costa Saboia', 'rafaelcostasaboia@teste.com', '01234567890', '2021-06-29 07:00:59', '2021-06-29 05:53:18', '2021-06-29 07:00:59' ),
( '3', 'Cássia Eufrásia da Silva Costa', 'cassiaazul2@gmail.com', '64611868320', NULL, '2021-06-29 05:57:21', '2021-06-29 05:57:21' ),
( '4', 'Márcio Benjamim da Silva Costa', 'mb@costa.com', '00123456789', NULL, '2021-06-29 06:06:03', '2021-06-29 06:06:03' ),
( '5', 'Fernando Henrique Costa Saboia', 'fhc.saboia@teste.com', '58474584584', NULL, '2021-06-29 06:53:33', '2021-06-29 06:53:33' ),
( '6', 'Geralda Márcia da Silva', 'gms@email.com', '12547858485', NULL, '2021-06-29 06:53:52', '2021-06-29 06:53:52' ),
( '7', 'Elvira Borges', 'eb@teste.com', '15847858595', NULL, '2021-06-29 06:54:35', '2021-06-29 06:54:35' ),
( '8', 'alexandre de Almeida', 'aa@teste.com', '14787458745', NULL, '2021-06-29 06:55:15', '2021-06-29 06:55:15' ),
( '9', 'Aninha D\'Angeles', 'ad@teste.com', '98756858748', NULL, '2021-06-29 06:55:48', '2021-06-29 06:55:48' ),
( '10', 'Gustavo Braga', 'gb@teste.com', '33325854745', NULL, '2021-06-29 06:56:19', '2021-06-29 06:56:19' ),
( '11', 'Mariana Braga', 'mb@teste.com', '78954854785', NULL, '2021-06-29 06:56:38', '2021-06-29 06:56:38' ),
( '12', 'Igor Pessoa de Araújo', 'ipa@teste.com', '88854745852', NULL, '2021-06-29 06:57:25', '2021-06-29 06:57:25' ),
( '13', 'José Alves de Lima', 'jal@teste.com', '12345685247', NULL, '2021-06-29 06:57:46', '2021-06-29 06:57:46' ),
( '14', 'Jorge Aragão da Silva', 'jas@teste.com', '00014251458', NULL, '2021-06-29 06:58:25', '2021-06-29 06:58:25' ),
( '15', 'Programer Aluno', 'pa@teste.com', '66654747412', NULL, '2021-06-29 06:59:12', '2021-06-29 07:00:35' ),
( '16', 'Davi de Sousa e Souza', 'dss@teste.com', '21547858585', NULL, '2021-06-29 08:00:10', '2021-06-29 08:00:10' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "aluno_curso" ------------------------------
BEGIN;

INSERT INTO `aluno_curso`(`id`,`aluno_id`,`curso_id`,`matricula`,`deleted_at`,`created_at`,`updated_at`) VALUES 
( '1', '2', '5', '202106292482', NULL, '2021-06-29 05:53:18', '2021-06-29 05:53:18' ),
( '2', '2', '7', '202106292482', NULL, '2021-06-29 05:53:18', '2021-06-29 05:53:18' ),
( '3', '3', '4', '2021062932593', NULL, '2021-06-29 05:57:21', '2021-06-29 05:57:21' ),
( '4', '3', '5', '2021062932593', NULL, '2021-06-29 05:57:21', '2021-06-29 05:57:21' ),
( '5', '3', '8', '2021062932593', NULL, '2021-06-29 05:57:21', '2021-06-29 05:57:21' ),
( '6', '4', '5', '20210629153945', NULL, '2021-06-29 06:06:03', '2021-06-29 06:06:03' ),
( '7', '4', '7', '2021062921647', NULL, '2021-06-29 06:06:03', '2021-06-29 06:06:03' ),
( '8', '5', '4', '20210629289154', NULL, '2021-06-29 06:53:33', '2021-06-29 06:53:33' ),
( '9', '5', '5', '20210629131355', NULL, '2021-06-29 06:53:33', '2021-06-29 06:53:33' ),
( '10', '5', '7', '20210629155957', NULL, '2021-06-29 06:53:33', '2021-06-29 06:53:33' ),
( '11', '5', '8', '20210629109858', NULL, '2021-06-29 06:53:33', '2021-06-29 06:53:33' ),
( '12', '6', '4', '20210629314964', NULL, '2021-06-29 06:53:52', '2021-06-29 06:53:52' ),
( '13', '7', '4', '2021062970774', NULL, '2021-06-29 06:54:35', '2021-06-29 06:54:35' ),
( '14', '7', '5', '20210629381075', NULL, '2021-06-29 06:54:35', '2021-06-29 06:54:35' ),
( '15', '8', '4', '20210629399384', NULL, '2021-06-29 06:55:15', '2021-06-29 06:55:15' ),
( '16', '8', '5', '2021062912785', NULL, '2021-06-29 06:55:15', '2021-06-29 06:55:15' ),
( '17', '8', '7', '20210629134887', NULL, '2021-06-29 06:55:15', '2021-06-29 06:55:15' ),
( '18', '8', '8', '2021062916788', NULL, '2021-06-29 06:55:15', '2021-06-29 06:55:15' ),
( '19', '9', '4', '20210629309094', NULL, '2021-06-29 06:55:48', '2021-06-29 06:55:48' ),
( '20', '9', '7', '20210629134997', NULL, '2021-06-29 06:55:48', '2021-06-29 06:55:48' ),
( '21', '9', '8', '2021062942298', NULL, '2021-06-29 06:55:48', '2021-06-29 06:55:48' ),
( '22', '10', '4', '202106293104', NULL, '2021-06-29 06:56:20', '2021-06-29 06:56:20' ),
( '23', '10', '7', '202106291805107', NULL, '2021-06-29 06:56:20', '2021-06-29 06:56:20' ),
( '24', '11', '4', '20210629118114', NULL, '2021-06-29 06:56:38', '2021-06-29 06:56:38' ),
( '25', '11', '7', '202106293819117', NULL, '2021-06-29 06:56:38', '2021-06-29 06:56:38' ),
( '26', '12', '4', '202106293536124', NULL, '2021-06-29 06:57:25', '2021-06-29 06:57:25' ),
( '27', '12', '5', '202106293825125', NULL, '2021-06-29 06:57:25', '2021-06-29 06:57:25' ),
( '28', '12', '7', '202106291104127', NULL, '2021-06-29 06:57:25', '2021-06-29 06:57:25' ),
( '29', '12', '8', '202106293718128', NULL, '2021-06-29 06:57:25', '2021-06-29 06:57:25' ),
( '30', '13', '4', '20210629157134', NULL, '2021-06-29 06:57:46', '2021-06-29 06:57:46' ),
( '31', '13', '5', '202106293856135', NULL, '2021-06-29 06:57:46', '2021-06-29 06:57:46' ),
( '32', '13', '7', '20210629957137', NULL, '2021-06-29 06:57:46', '2021-06-29 06:57:46' ),
( '33', '13', '8', '202106293045138', NULL, '2021-06-29 06:57:46', '2021-06-29 06:57:46' ),
( '34', '14', '4', '202106293967144', NULL, '2021-06-29 06:58:25', '2021-06-29 06:58:25' ),
( '35', '14', '5', '202106293494145', NULL, '2021-06-29 06:58:25', '2021-06-29 06:58:25' ),
( '36', '15', '4', '20210629469154', NULL, '2021-06-29 06:59:12', '2021-06-29 06:59:12' ),
( '37', '15', '5', '202106293909155', NULL, '2021-06-29 06:59:12', '2021-06-29 06:59:12' ),
( '38', '15', '7', '202106292820157', NULL, '2021-06-29 06:59:12', '2021-06-29 06:59:12' ),
( '39', '15', '8', '202106293500158', NULL, '2021-06-29 06:59:12', '2021-06-29 06:59:12' ),
( '40', '16', '4', '20210629649164', NULL, '2021-06-29 08:00:10', '2021-06-29 08:00:10' ),
( '41', '16', '5', '202106293694165', NULL, '2021-06-29 08:00:10', '2021-06-29 08:00:10' ),
( '42', '16', '7', '202106293452167', NULL, '2021-06-29 08:00:10', '2021-06-29 08:00:10' ),
( '43', '16', '8', '202106293358168', NULL, '2021-06-29 08:00:10', '2021-06-29 08:00:10' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "cr_curso" ---------------------------------
BEGIN;

INSERT INTO `cr_curso`(`id`,`nome`,`imagem`,`conteudo_programatico`,`deleted_at`,`created_at`,`updated_at`) VALUES 
( '4', 'Gamer 3.5', 'cursos/939f1b91d0403ac0c0ec8883787b84c02a82f67a.jpg', 'Diversidade de conhecimentos referente ao mundo dos gamers!', NULL, '2021-06-29 05:26:48', '2021-06-29 05:26:48' ),
( '5', 'Programador 5.5', 'cursos/87ffc53bcfae136170ba247cba00e46d2527e0dd.jpg', 'Curso com foco em recursos avançados para programação!', NULL, '2021-06-29 05:27:33', '2021-06-29 05:28:39' ),
( '6', 'Inglês para Iniciantes.', 'cursos/b1e8066bd7e33c13476120c97273381462285d14.jpg', 'Curso com foco em aprendizado de palavras iniciais!', '2021-06-29 05:29:04', '2021-06-29 05:28:19', '2021-06-29 05:29:04' ),
( '7', 'Inglês para Iniciantes', 'cursos/d06c1c54dc80ae9dced94faa53c3fa40f91c4d97.jpg', 'Curso com foco em aprendizado de palavras básicas!', NULL, '2021-06-29 05:29:31', '2021-06-29 05:29:31' ),
( '8', 'Didática Geral.', 'cursos/4f4f6e1ff01c87dde2208784f667dd08ad658d01.jpg', 'Este curso tem por objetivo a aperfeiçoamento de professores.', NULL, '2021-06-29 05:55:47', '2021-06-29 07:02:26' ),
( '9', 'Novo apenas para teste', 'cursos/1fa99afecc8425fedc1861ca6cda229e73452d8c.jpg', 'TEste teste', '2021-06-29 07:08:17', '2021-06-29 07:07:47', '2021-06-29 07:08:17' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "failed_jobs" ------------------------------
-- ---------------------------------------------------------


-- Dump data of "migrations" -------------------------------
BEGIN;

INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES 
( '1', '2014_10_12_000000_create_users_table', '1' ),
( '2', '2014_10_12_100000_create_password_resets_table', '1' ),
( '3', '2019_08_19_000000_create_failed_jobs_table', '1' ),
( '4', '2021_06_28_165645_acreate_cr_curso_table', '1' ),
( '5', '2021_06_29_033219_create_al_aluno_table', '1' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "password_resets" --------------------------
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "password_resets_email_index" ------------------
CREATE INDEX `password_resets_email_index` USING BTREE ON `password_resets`( `email` );
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


