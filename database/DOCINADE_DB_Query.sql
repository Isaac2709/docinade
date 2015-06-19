CREATE DATABASE DOCINADE_DB;

USE DOCINADE_DB;

-- ******************************** TABLAS GENERALES ******************************** --

CREATE TABLE GEN_Pais(
	Pais_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Pais_Nombre VARCHAR(30) NOT NULL,

    CONSTRAINT PK_Gen_Pais_ID PRIMARY KEY (Pais_ID),
    CONSTRAINT UNQ_Gen_Pais_Nombre UNIQUE (Pais_Nombre)
);

-- Change
-- ************************ TABLAS DE USUARIOS ************************ --

CREATE TABLE GEN_Usuario(
	Usu_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Usu_Nombre VARCHAR(255) NOT NULL,
	Usu_Tipo ENUM('Administrador', 'Aspirante', 'Profesor') NOT NULL DEFAULT 'Aspirante',
	email VARCHAR(255) NOT NULL,
	password VARCHAR(60) NOT NULL,
	remember_token VARCHAR(100),

    CONSTRAINT PK_Usu_ID PRIMARY KEY (Usu_ID)
    -- Alter table `asp_aspirante` CHANGE COLUMN `ASP_Usuario` `GEN_ID_Usuario` SMALLINT NOT NULL
    -- Alter table `gen_usuario` ADD COLUMN `Usu_Tipo` ENUM('Administrador', 'Aspirante', 'Profesor') NOT NULL DEFAULT 'Aspirante';
);

CREATE TABLE GEN_Info_Personal(
	IPe_ID SMALLINT AUTO_INCREMENT NOT NULL,
	IPe_Nombre VARCHAR(50) NOT NULL, -- Posibilidad de 2 nombres.
	IPe_Apellido VARCHAR(50) NOT NULL, -- Posibilidad de 2 apellidos.
	IPe_Genero CHAR, -- F=Femenino | M=Masculino
	IPe_Pasaporte VARCHAR(25), -- Pasaporte/Cédula.
	IPe_Fecha_Nac DATE,
	-- IPe_ID_PaisRes SMALLINT, -- País Residencia.
	IPe_Telefono VARCHAR(20),
	IPe_Fax VARCHAR(20),
	-- Change
	GEN_ID_Usuario SMALLINT NOT NULL,


    CONSTRAINT PK_Gen_IPe_ID PRIMARY KEY (IPe_ID),
    -- CONSTRAINT FK_Gen_IPe_PaisRes FOREIGN KEY (IPe_ID_PaisRes) REFERENCES GEN_Pais(Pais_ID),
    -- Change
    CONSTRAINT FK_GEN_IPe_Usu FOREIGN KEY (GEN_ID_Usuario) REFERENCES GEN_Usuario(Usu_ID)
);
-- CHANGES
-- ALTER TABLE `GEN_Info_Personal` DROP FOREIGN KEY `FK_Gen_IPe_PaisRes`;
-- ALTER TABLE `GEN_Info_Personal` ADD CONSTRAINT `FK_GEN_IPe_Usu` FOREIGN KEY (`GEN_ID_Usuario`) REFERENCES `DOCINADE_DB`.`gen_usuario`(`Usu_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
-- ALTER TABLE `gen_info_personal` DROP FOREIGN KEY `FK_Gen_IPe_PaisRes`;
-- ALTER TABLE `gen_info_personal` DROP `IPe_ID_PaisRes`;

CREATE TABLE GEN_Email(
	Email_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Email_ID_InfoPer SMALLINT,
	Email_Email VARCHAR(50) NOT NULL,

    CONSTRAINT PK_Gen_Email_ID PRIMARY KEY (Email_ID),
    CONSTRAINT FK_Gen_Email_InfoPer FOREIGN KEY (Email_ID_InfoPer) REFERENCES GEN_Info_Personal(IPe_ID)
);

CREATE TABLE GEN_Ocupacion(
	Ocu_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Ocu_Ocupacion VARCHAR(150) NOT NULL,

    CONSTRAINT PK_Gen_Ocu_ID PRIMARY KEY (Ocu_ID),
    CONSTRAINT UNQ_Gen_Ocu_Ocupacion UNIQUE (Ocu_Ocupacion)
);

CREATE TABLE GEN_Institucion( -- Institución Relacionada a Educación.
	Ins_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Ins_Nombre VARCHAR(250) NOT NULL,

    CONSTRAINT PK_Gen_Ins_ID PRIMARY KEY (Ins_ID),
    CONSTRAINT UNQ_Gen_Ins_Nombre UNIQUE (Ins_Nombre)
);

CREATE TABLE GEN_Grado_Acad(
	Gra_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Gra_Nombre VARCHAR(20) NOT NULL,

    CONSTRAINT PK_Gen_Gra_ID PRIMARY KEY (Gra_ID),
    CONSTRAINT UNQ_Gen_Gra_Nombre UNIQUE (Gra_Nombre)
);

CREATE TABLE GEN_Funcion(
	Fun_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Fun_Nombre VARCHAR(250),

    CONSTRAINT PK_Gen_Fun_ID PRIMARY KEY (Fun_ID),
    CONSTRAINT UNQ_Gen_Fun_Nombre UNIQUE (Fun_Nombre)
);

-- ******************************* TABLAS ASPIRANTES ******************************** --
CREATE TABLE ASP_Enfasis(
	Enf_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Enf_Nombre VARCHAR(100) NOT NULL,

	CONSTRAINT PK_Asp_Enf_ID PRIMARY KEY (Enf_ID),
    CONSTRAINT UNQ_Gen_Enf_Nombre UNIQUE (Enf_Nombre)
);

CREATE TABLE ASP_Dir_Actual(
	DiA_ID SMALLINT AUTO_INCREMENT NOT NULL,
	DiA_ID_Pais SMALLINT, -- NOT NULL,
	DiA_Ciudad VARCHAR(30),
	DiA_Cod_Postal VARCHAR(12),
	DiA_Dir_Corresp VARCHAR(250), -- Señas Exactas de la Dirección de Correspondencia.

    CONSTRAINT PK_Asp_DiA_ID PRIMARY KEY (DiA_ID),
    CONSTRAINT FK_Asp_DiA_Pais FOREIGN KEY (DiA_ID_Pais) REFERENCES GEN_Pais(Pais_ID)
);
-- CHANGE
-- ALTER TABLE `asp_dir_actual` CHANGE `DiA_ID_Pais` `DiA_ID_Pais` SMALLINT(6) NULL;


-- CREATE TABLE ASP_Area_Interes(
-- 	Area_ID SMALLINT AUTO_INCREMENT NOT NULL,
-- 	Area_Nombre VARCHAR(150) NOT NULL,

--     CONSTRAINT PK_Asp_Area_ID PRIMARY KEY (Area_ID),
--     CONSTRAINT UNQ_Asp_Area_Nombre UNIQUE (Area_Nombre)
-- );
-- CHANGES
-- DROP TABLE 'ASP_Area_Interes';


CREATE TABLE ASP_Prop_Tesis(
	PTe_ID SMALLINT AUTO_INCREMENT NOT NULL,
	PTe_Titulo VARCHAR(250),
	PTe_Definicion TEXT,
	PTe_Marco_Teorico MEDIUMTEXT,
	PTe_Objetivos MEDIUMTEXT,
	PTe_Metodologia TEXT,
	PTe_Bibliografia MEDIUMTEXT,
	PTe_Adjunto VARCHAR(300),

    CONSTRAINT PK_Asp_Pte_ID PRIMARY KEY (PTe_ID)
);
-- ALTER TABLE `asp_prop_tesis` ADD `PTe_Objetivos` MEDIUMTEXT NULL AFTER `PTe_Marco_Teorico`;
-- ALTER TABLE `asp_prop_tesis` ADD `PTe_Bibliografia` MEDIUMTEXT NULL AFTER `PTe_Metodologia`;

CREATE TABLE ASP_Bibliografia(
	Bib_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Bib_ID_Prop_Tesis SMALLINT NOT NULL,
	Bib_Bibliografia TEXT,

    CONSTRAINT PK_Asp_Bib_ID PRIMARY KEY (Bib_ID),
    CONSTRAINT FK_Asp_Bib_Prop_Tesis FOREIGN KEY (Bib_ID_Prop_Tesis) REFERENCES ASP_Prop_Tesis(PTe_ID)
);

CREATE TABLE ASP_Objetivo(
	Obj_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Obj_ID_Prop_Tesis SMALLINT NOT NULL,
	Obj_Objetivo TEXT,

    CONSTRAINT PK_Asp_Obj_ID PRIMARY KEY (Obj_ID),
    CONSTRAINT FK_Asp_Obj_Prop_Tesis FOREIGN KEY (Obj_ID_Prop_Tesis) REFERENCES ASP_Prop_Tesis(PTe_ID)
);

CREATE TABLE ASP_Nacionalidad(
	Nac_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Nac_Nombre VARCHAR(60) NOT NULL,

    CONSTRAINT PK_Asp_Nac_ID PRIMARY KEY (Nac_ID),
    CONSTRAINT UNQ_Asp_Nac_Nombre UNIQUE (Nac_Nombre)
);

CREATE TABLE ASP_Aspirante(
	Asp_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Asp_Fecha_Envio DATE,
	-- Asp_Fotografia LONGBLOB,
	Asp_Fotografia VARCHAR(300),
	Asp_Pasaporte_Adj VARCHAR(300),
	-- Change
    -- Asp_ID_InfoPer SMALLINT NOT NULL,
    Asp_ID_InfoPer SMALLINT,
    -- alter table `asp_aspirante` MODIFY `Asp_ID_InfoPer` SMALLINT NULL
    Asp_Lugar_Nac VARCHAR(100),

	Asp_ID_Nac SMALLINT, -- País de Nacimiento.
	Asp_ID_Enfasis SMALLINT,
	Asp_ID_Dir_Actual SMALLINT,
	Asp_Area_Interes VARCHAR(150),

	Asp_Acceso_Biblioteca BOOLEAN,
	Asp_Acceso_Proc_DatoS BOOLEAN,
	Asp_Acceso_Windows BOOLEAN,
	Asp_Acceso_Email BOOLEAN,
	Asp_Utilizacion_Progra_Comp BOOLEAN,
	Asp_Conoc_Educacion_Dist BOOLEAN,

	Asp_Estado_Formulario ENUM('Incompleto', 'No enviado','Enviado','Revisado') NOT NULL DEFAULT 'No enviado',

	ID_Prop_Tesis SMALLINT,

    CONSTRAINT PK_Asp_Asp_ID PRIMARY KEY (Asp_ID),
    CONSTRAINT FK_Asp_Asp_InfoPer FOREIGN KEY (Asp_ID_InfoPer) REFERENCES GEN_Info_Personal(IPe_ID),
    CONSTRAINT FK_Asp_Asp_Naci FOREIGN KEY (Asp_ID_Nac) REFERENCES ASP_Nacionalidad(Nac_ID),
    CONSTRAINT FK_Asp_Asp_Enfasis FOREIGN KEY (Asp_ID_Enfasis) REFERENCES ASP_Enfasis(Enf_ID),
    CONSTRAINT FK_Asp_Asp_DirAct FOREIGN KEY (Asp_ID_Dir_Actual) REFERENCES ASP_Dir_Actual(DiA_ID),

    -- CONSTRAINT FK_Asp_Asp_Area_Interes FOREIGN KEY (Asp_ID_Area_Interes) REFERENCES ASP_Area_Interes(Area_ID),
    CONSTRAINT FK_Asp_Asp_Prop_Tesis FOREIGN KEY (ID_Prop_Tesis) REFERENCES ASP_Prop_Tesis(PTe_ID)
    -- Change
    -- CONSTRAINT FK_Asp_Usu FOREIGN KEY (GEN_ID_Usuario) REFERENCES GEN_Usuario(Usu_ID)

);
-- CHANGES
-- ALTER TABLE `Asp_Aspirante` DROP FOREIGN KEY `FK_Asp_Asp_Naci`;
-- ALTER TABLE `Asp_Aspirante` ADD CONSTRAINT `FK_Asp_Asp_Naci` FOREIGN KEY (`Asp_ID_Nac`) REFERENCES `DOCINADE_DB`.`Asp_Nacionalidad`(`Nac_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `Asp_Aspirante` DROP FOREIGN KEY `FK_Asp_Asp_Area_Interes`;
-- ALTER TABLE `Asp_Aspirante` CHANGE `Asp_ID_Area_Interes` `Asp_Area_Interes` VARCHAR(150) NULL DEFAULT NULL;
-- ALTER TABLE `asp_aspirante` CHANGE `Asp_Pasaporte_Adj` `Asp_Pasaporte_Adj` VARCHAR(300) NULL DEFAULT NULL;
-- ALTER TABLE `asp_aspirante` CHANGE `Asp_Fotografia` `Asp_Fotografia` VARCHAR(300) NULL DEFAULT NULL;
-- ALTER TABLE `asp_aspirante` ADD `Asp_Estado_Formulario` ENUM('Incompleto', 'No enviado','Enviado','Revisado') NOT NULL DEFAULT 'Incompleto' AFTER `ID_Prop_Tesis`;

CREATE TABLE ASP_Biblioteca(
	Bib_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Bib_ID_Asp SMALLINT NOT NULL,
	Bib_Nombre VARCHAR (250) NOT NULL,

    CONSTRAINT PK_Asp_Bib_ID PRIMARY KEY (Bib_ID),
    CONSTRAINT FK_Asp_Bib_Asp FOREIGN KEY (Bib_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID)
);

CREATE TABLE ASP_Edu_Distancia(
	EDi_ID SMALLINT AUTO_INCREMENT NOT NULL,
	EDi_ID_Asp SMALLINT NOT NULL,
	EDi_Descripción VARCHAR (500) NOT NULL,

    CONSTRAINT PK_Asp_EDi_ID PRIMARY KEY (EDi_ID),
    CONSTRAINT FK_Asp_EDi_ID_Asp FOREIGN KEY (EDi_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID)
);

CREATE TABLE ASP_Proc_Datos(
	PDa_ID SMALLINT AUTO_INCREMENT NOT NULL,
	PDa_ID_Asp SMALLINT NOT NULL,
	PDa_Nombre VARCHAR(100) NOT NULL,

    CONSTRAINT PK_Asp_PDa_ID PRIMARY KEY (PDa_ID),
    CONSTRAINT FK_Asp_PDa_Asp FOREIGN KEY (PDa_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID)
);

CREATE TABLE ASP_Nivel(
	Niv_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Niv_Nombre VARCHAR(25) NOT NULL,

    CONSTRAINT PK_Asp_Niv_ID PRIMARY KEY (Niv_ID),
    CONSTRAINT UNQ_Asp_Niv_Nombre UNIQUE (Niv_Nombre)
);

CREATE TABLE ASP_Idioma(
	Idm_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Idm_ID_Asp SMALLINT NOT NULL,
	Idm_Idioma VARCHAR(30),
	Idm_ID_Niv_Escr SMALLINT,
	Idm_ID_Niv_Lect SMALLINT,
	Idm_ID_Niv_Conv SMALLINT,
	Idm_Posee_MCE BOOLEAN,
	Idm_Adjunto VARCHAR(300),

    CONSTRAINT PK_Asp_Idm_ID PRIMARY KEY (Idm_ID),
    CONSTRAINT FK_Asp_Idm_Asp FOREIGN KEY (Idm_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Idm_Escr FOREIGN KEY (Idm_ID_Niv_Escr) REFERENCES ASP_Nivel(Niv_ID),
    CONSTRAINT FK_Asp_Idm_Lect FOREIGN KEY (Idm_ID_Niv_Lect) REFERENCES ASP_Nivel(Niv_ID),
    CONSTRAINT FK_Asp_Idm_Conv FOREIGN KEY (Idm_ID_Niv_Conv) REFERENCES ASP_Nivel(Niv_ID)
);
-- ALTER TABLE `asp_idioma` DROP FOREIGN KEY `FK_Asp_Idm_Escr`;
-- ALTER TABLE `asp_idioma` ADD CONSTRAINT `FK_Asp_Idm_Escr` FOREIGN KEY (`Idm_ID_Niv_Escr`) REFERENCES `docinade_db`.`asp_nivel`(`Niv_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `asp_idioma` DROP FOREIGN KEY `FK_Asp_Idm_Lect`;
-- ALTER TABLE `asp_idioma` ADD CONSTRAINT `FK_Asp_Idm_Lect` FOREIGN KEY (`Idm_ID_Niv_Lect`) REFERENCES `docinade_db`.`asp_nivel`(`Niv_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `asp_idioma` DROP FOREIGN KEY `FK_Asp_Idm_Conv`;
-- ALTER TABLE `asp_idioma` ADD CONSTRAINT `FK_Asp_Idm_Conv` FOREIGN KEY (`Idm_ID_Niv_Conv`) REFERENCES `docinade_db`.`asp_nivel`(`Niv_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `asp_idioma` CHANGE `Idm_Adjunto` `Idm_Adjunto` VARCHAR(300) NULL DEFAULT NULL;

CREATE TABLE ASP_Curso_Sem(
	CSe_ID SMALLINT AUTO_INCREMENT NOT NULL,
	CSe_ID_Asp SMALLINT NOT NULL,
	CSe_Actividad VARCHAR(250) NOT NULL,
	CSe_Institucion VARCHAR(250),
	CSe_Lugar VARCHAR(250),
	CSe_Annio YEAR(4),

    CONSTRAINT PK_Asp_CSe_ID PRIMARY KEY (CSe_ID),
    CONSTRAINT FK_Asp_CSe_Asp FOREIGN KEY (CSe_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID)
);

CREATE TABLE ASP_Progra_Compu(
	Prog_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Prog_ID_Asp SMALLINT NOT NULL,
	Prog_Nombre VARCHAR(100),

    CONSTRAINT PK_Asp_Prog_ID PRIMARY KEY (Prog_ID),
    CONSTRAINT FK_Asp_Prog_Asp FOREIGN KEY (Prog_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID)
);

CREATE TABLE ASP_Area_Esp(
	Esp_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Esp_Area VARCHAR(150) NOT NULL,

    CONSTRAINT PK_Asp_Esp_ID PRIMARY KEY (Esp_ID),
    CONSTRAINT UNQ_Asp_Esp_Area UNIQUE (Esp_Area)
);

CREATE TABLE ASP_Educ_Sup(
	Sup_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Sup_ID_Asp SMALLINT NOT NULL,
	Sup_ID_Institucion SMALLINT NOT NULL,
	Sup_ID_Pais SMALLINT NOT NULL,
	Sup_ID_Area_Esp SMALLINT NOT NULL,
	Sup_ID_Grado_Acad SMALLINT NOT NULL,
	Sup_Anio_Grad YEAR(4) NULL,
	Sup_Adjunto VARCHAR(300) NULL,

    CONSTRAINT PK_Asp_Sup_ID PRIMARY KEY (Sup_ID),
    CONSTRAINT FK_Asp_Sup_Asp FOREIGN KEY (Sup_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Sup_Institucion FOREIGN KEY (Sup_ID_Institucion) REFERENCES GEN_Institucion(Ins_ID),
    CONSTRAINT FK_Asp_Sup_Pais FOREIGN KEY (Sup_ID_Pais) REFERENCES GEN_Pais(Pais_ID),
    CONSTRAINT FK_Asp_Sup_Area FOREIGN KEY (Sup_ID_Area_Esp) REFERENCES ASP_Area_Esp(Esp_ID),
    CONSTRAINT FK_Asp_Sup_Grado FOREIGN KEY (Sup_ID_Grado_Acad) REFERENCES GEN_Grado_Acad(Gra_ID)
);
-- ALTER TABLE `asp_educ_sup` CHANGE `Sup_ID_Area_Esp` `Sup_ID_Area_Esp` SMALLINT(6) NULL;
-- ALTER TABLE `asp_educ_sup` CHANGE `Sup_Adjunto` `Sup_Adjunto` VARCHAR(300) NULL DEFAULT NULL;

CREATE TABLE ASP_Exp_Invest(
	Inv_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Inv_ID_Asp SMALLINT NOT NULL,
	Inv_Proyecto VARCHAR(400) NOT NULL,
	Inv_ID_Institucion SMALLINT,
	Inv_Lugar VARCHAR(250),
	Inv_Anio_Inicio YEAR(4),

    CONSTRAINT PK_Asp_Inv_ID PRIMARY KEY (Inv_ID),
    CONSTRAINT FK_Asp_Inv_Asp FOREIGN KEY (Inv_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Inv_Institucion FOREIGN KEY (Inv_ID_Institucion) REFERENCES GEN_Institucion(Ins_ID)
);
-- ALTER TABLE `asp_exp_invest` CHANGE `Inv_Anio` `Inv_Anio_Inicio` YEAR(4) NULL DEFAULT NULL;
-- ALTER TABLE `asp_exp_invest` ADD `Inv_Anio_Fin` YEAR(4) NULL DEFAULT NULL;

CREATE TABLE ASP_Exp_Profesional( -- Para obtener el más reciente se calcula con los años.
	Pro_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Pro_ID_Asp SMALLINT NOT NULL,
	Pro_Institucion VARCHAR(250),
	Pro_ID_Ocupacion SMALLINT,
	Pro_Anio_Inicio YEAR(4),
    Pro_Actual BOOLEAN,
	Pro_Anio_Fin YEAR(4),
	Pro_Funciones VARCHAR(500),

    CONSTRAINT PK_Asp_Pro_ID PRIMARY KEY (Pro_ID),
    CONSTRAINT FK_Asp_Pro_Asp FOREIGN KEY (Pro_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Pro_Ocupacion FOREIGN KEY (Pro_ID_Ocupacion) REFERENCES GEN_Ocupacion(Ocu_ID)
);
-- ALTER TABLE `asp_exp_profesional` ADD `Pro_Funciones` VARCHAR(500) NULL AFTER `Pro_ID_Ocupacion`;

CREATE TABLE ASP_Exp_Funcion(
	EFu_ID_Exp_Prof SMALLINT NOT NULL,
	EFu_ID_Funcion SMALLINT NOT NULL,

    CONSTRAINT PK_Asp_EFu_ID PRIMARY KEY (EFu_ID_Exp_Prof,EFu_ID_Funcion),
    CONSTRAINT FK_Asp_EFu_Exp_Prof FOREIGN KEY (EFu_ID_Exp_Prof) REFERENCES ASP_Exp_Profesional(Pro_ID),
    CONSTRAINT FK_Asp_EFu_Funcion FOREIGN KEY (EFu_ID_Funcion) REFERENCES GEN_Funcion(Fun_ID)
);

CREATE TABLE ASP_Recomendacion(
	Rec_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Rec_ID_Asp SMALLINT NOT NULL,
	Rec_Nombre_Completo VARCHAR(100) NOT NULL,
	Rec_Direccion VARCHAR(250),
	Rec_Telefono VARCHAR(20),
	Rec_Fax VARCHAR(20),
    Rec_ID_Email SMALLINT,
    Rec_Ocupacion VARCHAR(150),
	-- Rec_ID_Ocupacion SMALLINT,
	Rec_Adjunto VARCHAR(300),

    CONSTRAINT PK_Asp_Rec_ID PRIMARY KEY (Rec_ID),
    CONSTRAINT FK_Asp_Rec_Asp FOREIGN KEY (Rec_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Rec_Email FOREIGN KEY (Rec_ID_Email) REFERENCES GEN_Email(Email_ID),
    -- CONSTRAINT FK_Asp_Rec_Ocupacion FOREIGN KEY (Rec_ID_Ocupacion) REFERENCES GEN_Ocupacion(Ocu_ID)
);
-- ALTER TABLE `asp_recomendacion` DROP FOREIGN KEY `FK_Asp_Rec_Email`;
-- ALTER TABLE `asp_recomendacion` ADD CONSTRAINT `FK_Asp_Rec_Email` FOREIGN KEY (`Rec_ID_Email`) REFERENCES `docinade_db`.`gen_email`(`Email_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `asp_recomendacion` DROP FOREIGN KEY `FK_Asp_Rec_Ocupacion`;
-- ALTER TABLE `asp_recomendacion` ADD CONSTRAINT `FK_Asp_Rec_Ocupacion` FOREIGN KEY (`Rec_ID_Ocupacion`) REFERENCES `docinade_db`.`gen_ocupacion`(`Ocu_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `asp_recomendacion` DROP FOREIGN KEY `FK_Asp_Rec_Ocupacion`
-- ALTER TABLE `asp_recomendacion` CHANGE `Rec_ID_Ocupacion` `Rec_Ocupacion` VARCHAR(150) NULL DEFAULT NULL;

-- ************************ TABLAS GENERALES CON DEPENDENCIA ************************ --

CREATE TABLE GEN_Publicacion(
	Pub_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Pub_ID_Asp SMALLINT,
	-- Pub_ID_Grad SMALLINT,      --> CUANDO SE TENGA EL GRADUADO!!
	Pub_Titulo VARCHAR(400) NOT NULL,
	Pub_Medio VARCHAR (250),
	Pub_ID_Pais SMALLINT,
	Pub_Anio YEAR(4),
	Pub_Enlace VARCHAR(250),

    CONSTRAINT PK_Asp_Pub_ID PRIMARY KEY (Pub_ID),
    CONSTRAINT FK_Asp_Pub_Asp FOREIGN KEY (Pub_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Pub_Pais FOREIGN KEY (Pub_ID_Pais) REFERENCES GEN_Pais(Pais_ID)
);

-- PROCEDIMIENTOS
CREATE DEFINER=`root`@`localhost` PROCEDURE `check_table_existence`(IN table_name CHAR(64))
BEGIN
    DECLARE CONTINUE HANDLER FOR SQLSTATE '42S02' SET @err = 1;
    SET @err = 0;
    SET @table_name = table_name;
    SET @sql_query = CONCAT('SELECT NULL FROM ',@table_name);
    PREPARE stmt1 FROM @sql_query;
    IF (@err = 1) THEN
        SET @table_exists = 0;
    ELSE
        SET @table_exists = 1;
        DEALLOCATE PREPARE stmt1;
    END IF;
END




CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEstado`(aspirante INT)
    DETERMINISTIC
    COMMENT 'A procedure'
BEGIN
	DECLARE Asp_Fotografia_Temp VARCHAR(300);
	DECLARE Asp_Pasaporte_Adj_Temp VARCHAR(300);
    DECLARE Asp_ID_InfoPer_Temp SMALLINT;
    DECLARE Asp_Lugar_Nac_Temp VARCHAR(100);
	DECLARE Asp_ID_Nac_Temp SMALLINT;
	DECLARE Asp_ID_Enfasis_Temp SMALLINT;
	DECLARE Asp_ID_Dir_Actual_Temp SMALLINT;
	DECLARE Asp_Area_Interes_Temp VARCHAR(150);
	DECLARE Asp_Acceso_Windows_Temp BOOLEAN;
	DECLARE Asp_Acceso_Email_Temp BOOLEAN;
	DECLARE Asp_Utilizacion_Progra_Comp_Temp BOOLEAN;
	DECLARE Asp_Conoc_Educacion_Dist_Temp BOOLEAN;
	DECLARE ID_Prop_Tesis_Temp SMALLINT;

    DECLARE Cont_Idiomas INT;
    DECLARE Cont_Curso_Sem INT;
    DECLARE Cont_Educ_Sup INT;
    DECLARE Cont_Exp_Invest INT;
    DECLARE Cont_Publicacion INT;
    DECLARE Cont_Exp_Profesional INT;
    DECLARE Cont_Recomendacion INT;

	DECLARE Info_Personal VARCHAR(30);
    DECLARE Edu_Superior VARCHAR(30);
    DECLARE Exp_Profesional VARCHAR(30);
    DECLARE Exp_Investigacion VARCHAR(30);
    DECLARE Inv_Publicadas VARCHAR(30);
    DECLARE Sem_Cursos VARCHAR(30);
    DECLARE Con_Idioma VARCHAR(30);
    DECLARE Acc_Bibliotecas VARCHAR(30);
    DECLARE Man_Programas VARCHAR(30);
    DECLARE Recomendaciones VARCHAR(30);
    DECLARE Prop_Tesis VARCHAR(30);
    DECLARE Cant_Campos INT;

    SET Info_Personal = "Información Personal";
    SET Edu_Superior = "Educación Superior";
    SET Exp_Profesional = "Experiencia Profesional";
    SET Exp_Investigacion = "Experiencia en Investigación";
    SET Inv_Publicadas = "Investigaciones publicadas";
    SET Sem_Cursos = "Seminarios y Cursos";
    SET Con_Idioma = "Conocimiento de Idiomas";
    SET Acc_Bibliotecas = "Acceso a Bibliotecas y Procesamiento de Datos";
    SET Man_Programas = "Manejo de Programas de Computo";
    SET Recomendaciones = "Recomendaciones";
    SET Prop_Tesis = "Propuesta de tésis";
    SET Cant_Campos = 0;

	CALL check_table_existence('Res_Temporal');
	If(SELECT @table_exists <> 1)Then
		create temporary table Res_Temporal(
			Res_Campo VARCHAR(60) NOT NULL,
			Res_Seccion VARCHAR(60) NULL,
			Res_Cant INT NULL
		);
	Else
		Delete From Res_Temporal;
    End IF;

    SELECT Asp_Fotografia, Asp_Pasaporte_Adj, Asp_ID_InfoPer, Asp_Lugar_Nac, Asp_ID_Nac,
    Asp_ID_Enfasis, Asp_ID_Dir_Actual, Asp_Area_Interes, Asp_Acceso_Windows,
    Asp_Acceso_Email, Asp_Utilizacion_Progra_Comp, Asp_Conoc_Educacion_Dist, ID_Prop_Tesis
    INTO Asp_Fotografia_Temp, Asp_Pasaporte_Adj_Temp, Asp_ID_InfoPer_Temp,
    Asp_Lugar_Nac_Temp, Asp_ID_Nac_Temp, Asp_ID_Enfasis_Temp, Asp_ID_Dir_Actual_Temp,
    Asp_Area_Interes_Temp, Asp_Acceso_Windows_Temp, Asp_Acceso_Email_Temp,
    Asp_Utilizacion_Progra_Comp_Temp, Asp_Conoc_Educacion_Dist_Temp, ID_Prop_Tesis_Temp
    FROM ASP_Aspirante WHERE Asp_ID = aspirante LIMIT 1;

    IF (Asp_Fotografia_Temp IS NULL or Asp_Fotografia_Temp = '') THEN
		INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Fotografia', Info_Personal);
	END IF;
	SET Cant_Campos = Cant_Campos + 1;
    IF (Asp_Pasaporte_Adj_Temp IS NULL or Asp_Pasaporte_Adj_Temp = '') THEN
		INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Adjunto del pasaporte o identificación', Info_Personal);
	END IF;
	SET Cant_Campos = Cant_Campos + 1;
    IF (Asp_ID_InfoPer_Temp IS NULL or Asp_ID_InfoPer_Temp = '') THEN
		INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Asp_ID_InfoPer', Info_Personal);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
        BEGIN
			DECLARE IPe_Nombre_Temp VARCHAR(50);
			DECLARE IPe_Apellido_Temp VARCHAR(50);
			DECLARE IPe_Genero_Temp CHAR;
			DECLARE IPe_Pasaporte_Temp VARCHAR(25);
			DECLARE IPe_Fecha_Nac_Temp DATE;
			DECLARE IPe_Telefono_Temp VARCHAR(20);
			DECLARE IPe_Fax_Temp VARCHAR(20);

            SELECT IPe_Nombre, IPe_Apellido, IPe_Genero, IPe_Pasaporte, IPe_Fecha_Nac,
            IPe_Telefono, IPe_Fax
            INTO IPe_Nombre_Temp, IPe_Apellido_Temp, IPe_Genero_Temp, IPe_Pasaporte_Temp,
            IPe_Fecha_Nac_Temp, IPe_Telefono_Temp, IPe_Fax_Temp
            FROM GEN_Info_Personal WHERE IPe_ID = Asp_ID_InfoPer_Temp;
            IF (IPe_Nombre_Temp IS NULL or IPe_Nombre_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Nombre', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (IPe_Apellido_Temp IS NULL or IPe_Apellido_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Apellidos', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (IPe_Genero_Temp IS NULL or IPe_Genero_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Genero', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (IPe_Pasaporte_Temp IS NULL or IPe_Pasaporte_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Pasaporte o número de identificación', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (IPe_Fecha_Nac_Temp IS NULL or IPe_Fecha_Nac_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Fecha de Nacimiento', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (IPe_Telefono_Temp IS NULL or IPe_Telefono_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Teléfono', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (IPe_Fax_Temp IS NULL or IPe_Fax_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Fax', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
        END;
	END IF;
    IF (Asp_Lugar_Nac_Temp IS NULL or Asp_Lugar_Nac_Temp = '') THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Lugar de Nacimiento', Info_Personal);
	END IF;
	SET Cant_Campos = Cant_Campos + 1;
    IF (Asp_ID_Nac_Temp IS NULL or Asp_ID_Nac_Temp = '') THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Nacionalidad', Info_Personal);
	END IF;
	SET Cant_Campos = Cant_Campos + 1;
    IF (Asp_ID_Enfasis_Temp IS NULL or Asp_ID_Enfasis_Temp = '') THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Enfasis', Info_Personal);
	END IF;
	SET Cant_Campos = Cant_Campos + 1;
    IF (Asp_ID_Dir_Actual_Temp IS NULL or Asp_ID_Dir_Actual_Temp = '') THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Direccion Actual', Info_Personal);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
        BEGIN
			DECLARE DiA_ID_Pais_Temp SMALLINT;
			DECLARE DiA_Ciudad_Temp VARCHAR(30);
			DECLARE DiA_Cod_Postal_Temp VARCHAR(12);
			DECLARE DiA_Dir_Corresp_Temp VARCHAR(250);

            SELECT DiA_ID_Pais, DiA_Ciudad, DiA_Cod_Postal, DiA_Dir_Corresp
            INTO DiA_ID_Pais_Temp, DiA_Ciudad_Temp, DiA_Cod_Postal_Temp, DiA_Dir_Corresp_Temp
            FROM ASP_Dir_Actual WHERE DiA_ID = Asp_ID_Dir_Actual_Temp;
            IF (DiA_ID_Pais_Temp IS NULL or DiA_ID_Pais_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Pais de residencia', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (DiA_Ciudad_Temp IS NULL or DiA_Ciudad_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Ciudad', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (DiA_Cod_Postal_Temp IS NULL or DiA_Cod_Postal_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Codigo Postal', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (DiA_Dir_Corresp_Temp IS NULL or DiA_Dir_Corresp_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Dirección de Correspodencia', Info_Personal);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
        END;
	END IF;
    IF (Asp_Area_Interes_Temp IS NULL or Asp_Area_Interes_Temp = '') THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Area de interes para desarrollar el tema de la investigación', Info_Personal);
	END IF;
	SET Cant_Campos = Cant_Campos + 1;
    IF (Asp_Acceso_Windows_Temp IS NULL) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Acceso a ambiente Windows', Man_Programas);
	END IF;
	SET Cant_Campos = Cant_Campos + 1;
    IF (Asp_Acceso_Email_Temp IS NULL) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Acceso a Correo Electrónico', Man_Programas);
	END IF;
	SET Cant_Campos = Cant_Campos + 1;
    -- No:
    -- IF (Asp_Utilizacion_Progra_Comp_Temp IS NULL or Asp_Utilizacion_Progra_Comp_Temp = '') THEN
		-- RETURN ("Asp_Utilizacion_Progra_Comp");
	-- END IF;
    IF (Asp_Conoc_Educacion_Dist_Temp IS NULL) THEN
		INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			VALUES ('Conocimiento de educación a distancia o plataformas virtuales', Man_Programas);
	END IF;
    SET Cant_Campos = Cant_Campos + 1;
    IF (ID_Prop_Tesis_Temp IS NULL or ID_Prop_Tesis_Temp = '') THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
    		VALUES (Prop_Tesis, null);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
        BEGIN
			DECLARE PTe_Titulo_Temp VARCHAR(250);
			DECLARE PTe_Definicion_Temp TEXT;
			DECLARE PTe_Marco_Teorico_Temp MEDIUMTEXT;
			DECLARE PTe_Objetivos_Temp MEDIUMTEXT;
			DECLARE PTe_Metodologia_Temp TEXT;
			DECLARE PTe_Bibliografia_Temp MEDIUMTEXT;
			DECLARE PTe_Adjunto_Temp VARCHAR(300);

            SELECT PTe_Titulo, PTe_Definicion, PTe_Marco_Teorico, PTe_Objetivos,
            PTe_Metodologia, PTe_Bibliografia, PTe_Adjunto
            INTO PTe_Titulo_Temp, PTe_Definicion_Temp, PTe_Marco_Teorico_Temp,
            PTe_Objetivos_Temp, PTe_Metodologia_Temp, PTe_Bibliografia_Temp,
            PTe_Adjunto_Temp
            FROM ASP_Prop_Tesis WHERE PTe_ID = ID_Prop_Tesis_Temp;
            IF (PTe_Titulo_Temp IS NULL or PTe_Titulo_Temp = '') THEN
            	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Titulo', Prop_Tesis);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (PTe_Definicion_Temp IS NULL or PTe_Definicion_Temp = '') THEN
            	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Definición', Prop_Tesis);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (PTe_Marco_Teorico_Temp IS NULL or PTe_Marco_Teorico_Temp = '') THEN
            	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Marco Teorico', Prop_Tesis);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (PTe_Objetivos_Temp IS NULL or PTe_Objetivos_Temp = '') THEN
            	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Objetivos', Prop_Tesis);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (PTe_Metodologia_Temp IS NULL or PTe_Metodologia_Temp = '') THEN
            	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
            		VALUES ('Metodologia', Prop_Tesis);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (PTe_Bibliografia_Temp IS NULL or PTe_Bibliografia_Temp = '') THEN
            	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
            		VALUES ('Bibliografia', Prop_Tesis);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            -- Si:
            -- IF (PTe_Adjunto_Temp IS NULL or PTe_Adjunto_Temp = '') THEN
			-- 	RETURN ("PTe_Adjunto");
			-- END IF;
        END;
	END IF;

	SELECT COUNT(*) INTO Cont_Idiomas FROM ASP_Idioma WHERE Idm_ID_Asp = aspirante;
    IF (Cont_Idiomas<1) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
    		VALUES ('Conocimiento de Idiomas', null);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
    BEGIN
		-- Idiomas:
		DECLARE Idm_Idioma_Temp VARCHAR(30);
		DECLARE Idm_ID_Niv_Escr_Temp SMALLINT;
		DECLARE Idm_ID_Niv_Lect_Temp SMALLINT;
		DECLARE Idm_ID_Niv_Conv_Temp SMALLINT;
		DECLARE Idm_Posee_MCE_Temp BOOLEAN;
		DECLARE Idm_Adjunto_Temp VARCHAR(300);
		DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Idioma CURSOR FOR
		SELECT Idm_Idioma, Idm_ID_Niv_Escr, Idm_ID_Niv_Lect, Idm_ID_Niv_Conv, Idm_Posee_MCE,
		Idm_Adjunto FROM ASP_Idioma WHERE Idm_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Idioma;
		loopIdioma: LOOP
		FETCH Crsr_Idioma INTO Idm_Idioma_Temp, Idm_ID_Niv_Escr_Temp, Idm_ID_Niv_Lect_Temp,
		Idm_ID_Niv_Conv_Temp, Idm_Posee_MCE_Temp, Idm_Adjunto_Temp;
			IF done THEN
				LEAVE loopIdioma;
			END IF;
			IF (Idm_Idioma_Temp IS NULL or Idm_Idioma_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Idioma', Con_Idioma);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Idm_ID_Niv_Escr_Temp IS NULL or Idm_ID_Niv_Escr_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Nivel de Escritura', Con_Idioma);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Idm_ID_Niv_Lect_Temp IS NULL or Idm_ID_Niv_Lect_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Nivel de Lectura', Con_Idioma);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Idm_ID_Niv_Conv_Temp IS NULL or Idm_ID_Niv_Conv_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Nivel Conversacional', Con_Idioma);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            -- Sí:
			-- IF (Idm_Posee_MCE_Temp IS NULL or Idm_Posee_MCE_Temp = '') THEN
				-- RETURN ("Idm_Posee_MCE");
			-- END IF;
			IF (Idm_Adjunto_Temp IS NULL or Idm_Adjunto_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Adjunto', Con_Idioma);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
		END LOOP loopIdioma;
		CLOSE Crsr_Idioma;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Curso_Sem FROM ASP_Curso_Sem WHERE CSe_ID_Asp = aspirante;
    IF (Cont_Curso_Sem<1) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
    		VALUES (Sem_Cursos, null);
        SET Cant_Campos = Cant_Campos + 1;
	ELSE
    BEGIN
		DECLARE CSe_Actividad_Temp VARCHAR(250);
		DECLARE CSe_Institucion_Temp VARCHAR(250);
		DECLARE CSe_Lugar_Temp VARCHAR(250);
		DECLARE CSe_Annio_Temp YEAR(4);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Curso_Sem CURSOR FOR
		SELECT CSe_Actividad, CSe_Institucion, CSe_Lugar, CSe_Annio
		FROM ASP_Curso_Sem WHERE CSe_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Curso_Sem;
		loopCursoSem: LOOP
		FETCH Crsr_Curso_Sem INTO CSe_Actividad_Temp, CSe_Institucion_Temp, CSe_Lugar_Temp,
        CSe_Annio_Temp;
			IF done THEN
				LEAVE loopCursoSem;
			END IF;
			IF (CSe_Actividad_Temp IS NULL or CSe_Actividad_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Nombre de la Actividad', Sem_Cursos);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (CSe_Institucion_Temp IS NULL or CSe_Institucion_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Institucion', Sem_Cursos);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (CSe_Lugar_Temp IS NULL or CSe_Lugar_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Lugar', Sem_Cursos);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (CSe_Annio_Temp IS NULL or CSe_Annio_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Año', Sem_Cursos);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
		END LOOP loopCursoSem;
		CLOSE Crsr_Curso_Sem;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Educ_Sup FROM ASP_Educ_Sup WHERE Sup_ID_Asp = aspirante;
    IF (Cont_Educ_Sup<1) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
    		VALUES (Edu_Superior, null);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
    BEGIN
		DECLARE Sup_ID_Institucion_Temp SMALLINT;
		DECLARE Sup_ID_Pais_Temp SMALLINT;
		DECLARE Sup_ID_Area_Esp_Temp SMALLINT;
		DECLARE Sup_ID_Grado_Acad_Temp SMALLINT;
		DECLARE Sup_Anio_Grad_Temp YEAR(4);
		DECLARE Sup_Adjunto_Temp VARCHAR(300);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Educ_Sup CURSOR FOR
		SELECT Sup_ID_Institucion, Sup_ID_Pais, Sup_ID_Area_Esp, Sup_ID_Grado_Acad,
        Sup_Anio_Grad, Sup_Adjunto
		FROM ASP_Educ_Sup WHERE Sup_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Educ_Sup;
		loopEducSup: LOOP
		FETCH Crsr_Educ_Sup INTO Sup_ID_Institucion_Temp, Sup_ID_Pais_Temp,
        Sup_ID_Area_Esp_Temp, Sup_ID_Grado_Acad_Temp, Sup_Anio_Grad_Temp, Sup_Adjunto_Temp;
			IF done THEN
				LEAVE loopEducSup;
			END IF;
			IF (Sup_ID_Institucion_Temp IS NULL or Sup_ID_Institucion_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Institución', Edu_Superior);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Sup_ID_Pais_Temp IS NULL or Sup_ID_Pais_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('País', Edu_Superior);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Sup_ID_Area_Esp_Temp IS NULL or Sup_ID_Area_Esp_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Area de Especialidad', Edu_Superior);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Sup_ID_Grado_Acad_Temp IS NULL or Sup_ID_Grado_Acad_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`)
					VALUES ('Grado Academico', Edu_Superior);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Sup_Anio_Grad_Temp IS NULL or Sup_Anio_Grad_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Año de Graduación', Edu_Superior);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Sup_Adjunto_Temp IS NULL or Sup_Adjunto_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Adjunto del título o certificado obtenido', Edu_Superior);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
		END LOOP loopEducSup;
		CLOSE Crsr_Educ_Sup;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Exp_Invest FROM ASP_Exp_Invest WHERE Inv_ID_Asp = aspirante;
    IF (Cont_Exp_Invest<1) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
    		VALUES (Exp_Investigacion, null);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
    BEGIN
		DECLARE Inv_Proyecto_Temp VARCHAR(400);
		DECLARE Inv_ID_Institucion_Temp SMALLINT;
		DECLARE Inv_Lugar_Temp VARCHAR(250);
		DECLARE Inv_Anio_Temp YEAR(4);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Exp_Invest CURSOR FOR
		SELECT Inv_Proyecto, Inv_ID_Institucion, Inv_Lugar, Inv_Anio
		FROM ASP_Exp_Invest WHERE Inv_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Exp_Invest;
		loopExpInvest: LOOP
		FETCH Crsr_Exp_Invest INTO Inv_Proyecto_Temp, Inv_ID_Institucion_Temp, Inv_Lugar_Temp,
        Inv_Anio_Temp;
			IF done THEN
				LEAVE loopExpInvest;
			END IF;
			IF (Inv_Proyecto_Temp IS NULL or Inv_Proyecto_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Nombre del proyecto o actividad principal', Exp_Investigacion);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Inv_ID_Institucion_Temp IS NULL or Inv_ID_Institucion_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Institución', Exp_Investigacion);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Inv_Lugar_Temp IS NULL or Inv_Lugar_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Lugar', Exp_Investigacion);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			IF (Inv_Anio_Temp IS NULL or Inv_Anio_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Año', Exp_Investigacion);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
		END LOOP loopExpInvest;
		CLOSE Crsr_Exp_Invest;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Publicacion FROM GEN_Publicacion WHERE Pub_ID_Asp = aspirante;
    IF (Cont_Publicacion<1) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
    		VALUES (Inv_Publicadas, null);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
    BEGIN
		DECLARE Pub_Titulo_Temp VARCHAR(400);
		DECLARE Pub_Medio_Temp VARCHAR (250);
		DECLARE Pub_ID_Pais_Temp SMALLINT;
		DECLARE Pub_Anio_Temp YEAR(4);
		DECLARE Pub_Enlace_Temp VARCHAR(250);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Publicacion CURSOR FOR
		SELECT Pub_Titulo, Pub_Medio, Pub_ID_Pais, Pub_Anio, Pub_Enlace
		FROM GEN_Publicacion WHERE Pub_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Publicacion;
		loopPublicacion: LOOP
		FETCH Crsr_Publicacion INTO Pub_Titulo_Temp, Pub_Medio_Temp, Pub_ID_Pais_Temp,
        Pub_Anio_Temp, Pub_Enlace_Temp;
			IF done THEN
				LEAVE loopPublicacion;
			END IF;
			IF (Pub_Titulo_Temp IS NULL or Pub_Titulo_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Título de la publicación', Inv_Publicadas);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Pub_Medio_Temp IS NULL or Pub_Medio_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Nombre del medio de publicación', Inv_Publicadas);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Pub_ID_Pais_Temp IS NULL or Pub_ID_Pais_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Pais de publicación', Inv_Publicadas);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Pub_Anio_Temp IS NULL or Pub_Anio_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Año', Inv_Publicadas);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            -- Sí
            -- IF (Pub_Enlace_Temp IS NULL or Pub_Enlace_Temp = '') THEN
				-- RETURN ("Pub_Enlace");
			-- END IF;

		END LOOP loopPublicacion;
		CLOSE Crsr_Publicacion;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Exp_Profesional FROM ASP_Exp_Profesional WHERE Pro_ID_Asp = aspirante;
    IF (Cont_Exp_Profesional<1) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
    		VALUES (Exp_Profesional, null);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
    BEGIN
		DECLARE Pro_Institucion_Temp VARCHAR(250);
		DECLARE Pro_ID_Ocupacion_Temp SMALLINT;
		DECLARE Pro_Anio_Inicio_Temp YEAR(4);
		DECLARE Pro_Actual_Temp BOOLEAN;
		DECLARE Pro_Anio_Fin_Temp YEAR(4);
		DECLARE Pro_Funciones_Temp VARCHAR(500);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Exp_Profesional CURSOR FOR
		SELECT Pro_Institucion, Pro_ID_Ocupacion, Pro_Anio_Inicio, Pro_Actual, Pro_Anio_Fin,
        Pro_Funciones
		FROM ASP_Exp_Profesional WHERE Pro_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Exp_Profesional;
		loopExpPro: LOOP
		FETCH Crsr_Exp_Profesional INTO Pro_Institucion_Temp, Pro_ID_Ocupacion_Temp,
        Pro_Anio_Inicio_Temp, Pro_Actual_Temp, Pro_Anio_Fin_Temp, Pro_Funciones_Temp;
			IF done THEN
				LEAVE loopExpPro;
			END IF;
			IF (Pro_Institucion_Temp IS NULL or Pro_Institucion_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Empresa, Centro o Institucion', Exp_Profesional);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Pro_ID_Ocupacion_Temp IS NULL or Pro_ID_Ocupacion_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Ocupacion o posición', Exp_Profesional);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Pro_Anio_Inicio_Temp IS NULL or Pro_Anio_Inicio_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`)
					VALUES ('Año de Inicio', Exp_Profesional);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            -- IF ((Pro_Actual_Temp IS NULL and Pro_Actual_Temp != 0) or (Pro_Actual_Temp = '' and Pro_Actual_Temp != 0)) THEN
			-- 	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
			-- 		VALUES ('Pro_Actual');
			-- END IF;
            IF (Pro_Anio_Fin_Temp IS NULL or Pro_Anio_Fin_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Año de Finalización', Exp_Profesional);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF ((Pro_Funciones_Temp IS NULL or Pro_Funciones_Temp = '' ) and Pro_Actual_Temp = 1) THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Funciones que desempeña para el trabajo actual', Exp_Profesional);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;

		END LOOP loopExpPro;
		CLOSE Crsr_Exp_Profesional;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Recomendacion FROM ASP_Recomendacion WHERE Rec_ID_Asp = aspirante;
    IF (Cont_Recomendacion<1) THEN
    	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
    		VALUES (Recomendaciones, null);
		SET Cant_Campos = Cant_Campos + 1;
	ELSE
    BEGIN
		DECLARE Rec_Nombre_Completo_Temp VARCHAR(100);
		DECLARE Rec_Direccion_Temp VARCHAR(250);
		DECLARE Rec_Telefono_Temp VARCHAR(20);
		DECLARE Rec_Fax_Temp VARCHAR(20);
		DECLARE Rec_ID_Email_Temp SMALLINT;
		DECLARE Rec_Ocupacion_Temp VARCHAR(150);
		DECLARE Rec_Adjunto_Temp VARCHAR(300);
        DECLARE done INT DEFAULT FALSE;
        DECLARE Cont_Rec INT DEFAULT 0;

		DEClARE Crsr_Recomendacion CURSOR FOR
		SELECT Rec_Nombre_Completo, Rec_Direccion, Rec_Telefono, Rec_Fax, Rec_ID_Email,
        Rec_Ocupacion, Rec_Adjunto
		FROM ASP_Recomendacion WHERE Rec_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Recomendacion;
		loopRecomendacion: LOOP
		FETCH Crsr_Recomendacion INTO Rec_Nombre_Completo_Temp, Rec_Direccion_Temp,
        Rec_Telefono_Temp, Rec_Fax_Temp, Rec_ID_Email_Temp, Rec_Ocupacion_Temp,
        Rec_Adjunto_Temp;
			IF done THEN
				IF (Cont_Rec>1) THEN
					LEAVE loopRecomendacion;
				ELSE
					INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
						VALUES ('Una recomendación', Recomendaciones);
					SET Cant_Campos = Cant_Campos + 1;
                END IF;
			END IF;
			IF (Rec_Nombre_Completo_Temp IS NULL or Rec_Nombre_Completo_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Nombre Completo', Recomendaciones);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Rec_Direccion_Temp IS NULL or Rec_Direccion_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Dirección', Recomendaciones);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Rec_Telefono_Temp IS NULL or Rec_Telefono_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Teléfono', Recomendaciones);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Rec_Fax_Temp IS NULL or Rec_Fax_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Fax', Recomendaciones);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Rec_ID_Email_Temp IS NULL or Rec_ID_Email_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Correo Electrónico', Recomendaciones);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
            IF (Rec_Ocupacion_Temp IS NULL or Rec_Ocupacion_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Posición u Ocupación', Recomendaciones);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
             IF (Rec_Adjunto_Temp IS NULL or Rec_Adjunto_Temp = '') THEN
				INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`)
					VALUES ('Adjunto de la carta de referencia', Recomendaciones);
			END IF;
			SET Cant_Campos = Cant_Campos + 1;
			SET Cont_Rec = Cont_Rec+1;
		END LOOP loopRecomendacion;
		CLOSE Crsr_Recomendacion;
	END;
	END IF;

	INSERT INTO `docinade_db`.`Res_Temporal` (`Res_Campo`, `Res_Seccion`, `Res_Cant`)
			VALUES ('Total', null , Cant_Campos);
	select * from Res_Temporal;
END


-- FUNCIONES
CREATE DEFINER=`root`@`localhost` FUNCTION `enviarForm`(aspirante INT) RETURNS varchar(250) CHARSET latin1
    DETERMINISTIC
BEGIN
	DECLARE Asp_Fotografia_Temp VARCHAR(300);
	DECLARE Asp_Pasaporte_Adj_Temp VARCHAR(300);
    DECLARE Asp_ID_InfoPer_Temp SMALLINT;
    DECLARE Asp_Lugar_Nac_Temp VARCHAR(100);
	DECLARE Asp_ID_Nac_Temp SMALLINT;
	DECLARE Asp_ID_Enfasis_Temp SMALLINT;
	DECLARE Asp_ID_Dir_Actual_Temp SMALLINT;
	DECLARE Asp_Area_Interes_Temp VARCHAR(150);
	DECLARE Asp_Acceso_Windows_Temp BOOLEAN;
	DECLARE Asp_Acceso_Email_Temp BOOLEAN;
	DECLARE Asp_Utilizacion_Progra_Comp_Temp BOOLEAN;
	DECLARE Asp_Conoc_Educacion_Dist_Temp BOOLEAN;
	DECLARE ID_Prop_Tesis_Temp SMALLINT;

    DECLARE Cont_Idiomas INT;
    DECLARE Cont_Curso_Sem INT;
    DECLARE Cont_Educ_Sup INT;
    DECLARE Cont_Exp_Invest INT;
    DECLARE Cont_Publicacion INT;
    DECLARE Cont_Exp_Profesional INT;
    DECLARE Cont_Recomendacion INT;


    SELECT Asp_Fotografia, Asp_Pasaporte_Adj, Asp_ID_InfoPer, Asp_Lugar_Nac, Asp_ID_Nac,
    Asp_ID_Enfasis, Asp_ID_Dir_Actual, Asp_Area_Interes, Asp_Acceso_Windows,
    Asp_Acceso_Email, Asp_Utilizacion_Progra_Comp, Asp_Conoc_Educacion_Dist, ID_Prop_Tesis
    INTO Asp_Fotografia_Temp, Asp_Pasaporte_Adj_Temp, Asp_ID_InfoPer_Temp,
    Asp_Lugar_Nac_Temp, Asp_ID_Nac_Temp, Asp_ID_Enfasis_Temp, Asp_ID_Dir_Actual_Temp,
    Asp_Area_Interes_Temp, Asp_Acceso_Windows_Temp, Asp_Acceso_Email_Temp,
    Asp_Utilizacion_Progra_Comp_Temp, Asp_Conoc_Educacion_Dist_Temp, ID_Prop_Tesis_Temp
    FROM ASP_Aspirante WHERE Asp_ID = aspirante LIMIT 1;

    IF (Asp_Fotografia_Temp IS NULL or Asp_Fotografia_Temp = '') THEN
		RETURN ("Asp_Fotografia");
	END IF;
    IF (Asp_Pasaporte_Adj_Temp IS NULL or Asp_Pasaporte_Adj_Temp = '') THEN
		RETURN ("Asp_Pasaporte_Adj");
	END IF;
    IF (Asp_ID_InfoPer_Temp IS NULL or Asp_ID_InfoPer_Temp = '') THEN
		RETURN ("Asp_ID_InfoPer");
	ELSE
        BEGIN
			DECLARE IPe_Nombre_Temp VARCHAR(50);
			DECLARE IPe_Apellido_Temp VARCHAR(50);
			DECLARE IPe_Genero_Temp CHAR;
			DECLARE IPe_Pasaporte_Temp VARCHAR(25);
			DECLARE IPe_Fecha_Nac_Temp DATE;
			DECLARE IPe_Telefono_Temp VARCHAR(20);
			DECLARE IPe_Fax_Temp VARCHAR(20);

            create temporary table Res_Temporal(
				Res_Campo VARCHAR(60) NOT NULL
			);

            SELECT IPe_Nombre, IPe_Apellido, IPe_Genero, IPe_Pasaporte, IPe_Fecha_Nac,
            IPe_Telefono, IPe_Fax
            INTO IPe_Nombre_Temp, IPe_Apellido_Temp, IPe_Genero_Temp, IPe_Pasaporte_Temp,
            IPe_Fecha_Nac_Temp, IPe_Telefono_Temp, IPe_Fax_Temp
            FROM GEN_Info_Personal WHERE IPe_ID = Asp_ID_InfoPer_Temp;
            IF (IPe_Nombre_Temp IS NULL or IPe_Nombre_Temp = '') THEN
                    RETURN ("IPe_Nombre");
			END IF;
            IF (IPe_Apellido_Temp IS NULL or IPe_Apellido_Temp = '') THEN
				RETURN ("IPe_Apellido");
			END IF;
            IF (IPe_Genero_Temp IS NULL or IPe_Genero_Temp = '') THEN
				RETURN ("IPe_Genero");
			END IF;
            IF (IPe_Pasaporte_Temp IS NULL or IPe_Pasaporte_Temp = '') THEN
				RETURN ("IPe_Pasaporte");
			END IF;
            IF (IPe_Fecha_Nac_Temp IS NULL or IPe_Fecha_Nac_Temp = '') THEN
				RETURN ("IPe_Fecha_Nac");
			END IF;
            IF (IPe_Telefono_Temp IS NULL or IPe_Telefono_Temp = '') THEN
				RETURN ("IPe_Telefono");
			END IF;
            IF (IPe_Fax_Temp IS NULL or IPe_Fax_Temp = '') THEN
				RETURN ("IPe_Fax");
			END IF;
        END;
	END IF;
    IF (Asp_Lugar_Nac_Temp IS NULL or Asp_Lugar_Nac_Temp = '') THEN
		RETURN ("Asp_Lugar_Nac");
	END IF;
    IF (Asp_ID_Nac_Temp IS NULL or Asp_ID_Nac_Temp = '') THEN
		RETURN ("Asp_ID_Nac");
	END IF;
    IF (Asp_ID_Enfasis_Temp IS NULL or Asp_ID_Enfasis_Temp = '') THEN
		RETURN ("Asp_ID_Enfasis");
	END IF;
    IF (Asp_ID_Dir_Actual_Temp IS NULL or Asp_ID_Dir_Actual_Temp = '') THEN
		RETURN ("Asp_ID_Dir_Actual");
	ELSE
        BEGIN
			DECLARE DiA_ID_Pais_Temp SMALLINT;
			DECLARE DiA_Ciudad_Temp VARCHAR(30);
			DECLARE DiA_Cod_Postal_Temp VARCHAR(12);
			DECLARE DiA_Dir_Corresp_Temp VARCHAR(250);

            SELECT DiA_ID_Pais, DiA_Ciudad, DiA_Cod_Postal, DiA_Dir_Corresp
            INTO DiA_ID_Pais_Temp, DiA_Ciudad_Temp, DiA_Cod_Postal_Temp, DiA_Dir_Corresp_Temp
            FROM ASP_Dir_Actual WHERE DiA_ID = Asp_ID_Dir_Actual_Temp;
            IF (DiA_ID_Pais_Temp IS NULL or DiA_ID_Pais_Temp = '') THEN
				RETURN ("DiA_ID_Pais");
			END IF;
            IF (DiA_Ciudad_Temp IS NULL or DiA_Ciudad_Temp = '') THEN
				RETURN ("DiA_Ciudad");
			END IF;
            IF (DiA_Cod_Postal_Temp IS NULL or DiA_Cod_Postal_Temp = '') THEN
				RETURN ("DiA_Cod_Postal");
			END IF;
            IF (DiA_Dir_Corresp_Temp IS NULL or DiA_Dir_Corresp_Temp = '') THEN
				RETURN ("DiA_Dir_Corresp");
			END IF;
        END;
	END IF;
    IF (Asp_Area_Interes_Temp IS NULL or Asp_Area_Interes_Temp = '') THEN
		RETURN ("Asp_Area_Interes");
	END IF;
    IF (Asp_Acceso_Windows_Temp IS NULL) THEN
		RETURN ("Asp_Acceso_Windows");
	END IF;
    IF (Asp_Acceso_Email_Temp IS NULL) THEN
		RETURN ("Asp_Acceso_Email");
	END IF;
    -- No:
    -- IF (Asp_Utilizacion_Progra_Comp_Temp IS NULL or Asp_Utilizacion_Progra_Comp_Temp = '') THEN
		-- RETURN ("Asp_Utilizacion_Progra_Comp");
	-- END IF;
     IF (Asp_Conoc_Educacion_Dist_Temp IS NULL) THEN
		RETURN ("Asp_Conoc_Educacion_Dist");
	 END IF;
    IF (ID_Prop_Tesis_Temp IS NULL or ID_Prop_Tesis_Temp = '') THEN
		RETURN ("ID_Prop_Tesis");
	ELSE
        BEGIN
			DECLARE PTe_Titulo_Temp VARCHAR(250);
			DECLARE PTe_Definicion_Temp TEXT;
			DECLARE PTe_Marco_Teorico_Temp MEDIUMTEXT;
			DECLARE PTe_Objetivos_Temp MEDIUMTEXT;
			DECLARE PTe_Metodologia_Temp TEXT;
			DECLARE PTe_Bibliografia_Temp MEDIUMTEXT;
			DECLARE PTe_Adjunto_Temp VARCHAR(300);

            SELECT PTe_Titulo, PTe_Definicion, PTe_Marco_Teorico, PTe_Objetivos,
            PTe_Metodologia, PTe_Bibliografia, PTe_Adjunto
            INTO PTe_Titulo_Temp, PTe_Definicion_Temp, PTe_Marco_Teorico_Temp,
            PTe_Objetivos_Temp, PTe_Metodologia_Temp, PTe_Bibliografia_Temp,
            PTe_Adjunto_Temp
            FROM ASP_Prop_Tesis WHERE PTe_ID = ID_Prop_Tesis_Temp;
            IF (PTe_Titulo_Temp IS NULL or PTe_Titulo_Temp = '') THEN
				RETURN ("PTe_Titulo");
			END IF;
            IF (PTe_Definicion_Temp IS NULL or PTe_Definicion_Temp = '') THEN
				RETURN ("PTe_Definicion");
			END IF;
            IF (PTe_Marco_Teorico_Temp IS NULL or PTe_Marco_Teorico_Temp = '') THEN
				RETURN ("PTe_Marco_Teorico");
			END IF;
            IF (PTe_Objetivos_Temp IS NULL or PTe_Objetivos_Temp = '') THEN
				RETURN ("PTe_Objetivos");
			END IF;
            IF (PTe_Metodologia_Temp IS NULL or PTe_Metodologia_Temp = '') THEN
				RETURN ("PTe_Metodologia");
			END IF;
            IF (PTe_Bibliografia_Temp IS NULL or PTe_Bibliografia_Temp = '') THEN
				RETURN ("PTe_Bibliografia");
			END IF;
            -- Si:
            -- IF (PTe_Adjunto_Temp IS NULL or PTe_Adjunto_Temp = '') THEN
			-- 	RETURN ("PTe_Adjunto");
			-- END IF;
        END;
	END IF;

	SELECT COUNT(*) INTO Cont_Idiomas FROM ASP_Idioma WHERE Idm_ID_Asp = aspirante;
    IF (Cont_Idiomas<1) THEN RETURN ("ASP_Idioma");
	ELSE
    BEGIN
		-- Idiomas:
		DECLARE Idm_Idioma_Temp VARCHAR(30);
		DECLARE Idm_ID_Niv_Escr_Temp SMALLINT;
		DECLARE Idm_ID_Niv_Lect_Temp SMALLINT;
		DECLARE Idm_ID_Niv_Conv_Temp SMALLINT;
		DECLARE Idm_Posee_MCE_Temp BOOLEAN;
		DECLARE Idm_Adjunto_Temp VARCHAR(300);
		DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Idioma CURSOR FOR
		SELECT Idm_Idioma, Idm_ID_Niv_Escr, Idm_ID_Niv_Lect, Idm_ID_Niv_Conv, Idm_Posee_MCE,
		Idm_Adjunto FROM ASP_Idioma WHERE Idm_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Idioma;
		loopIdioma: LOOP
		FETCH Crsr_Idioma INTO Idm_Idioma_Temp, Idm_ID_Niv_Escr_Temp, Idm_ID_Niv_Lect_Temp,
		Idm_ID_Niv_Conv_Temp, Idm_Posee_MCE_Temp, Idm_Adjunto_Temp;
			IF done THEN
				LEAVE loopIdioma;
			END IF;
			IF (Idm_Idioma_Temp IS NULL or Idm_Idioma_Temp = '') THEN
				RETURN ("Idm_Idioma");
			END IF;
			IF (Idm_ID_Niv_Escr_Temp IS NULL or Idm_ID_Niv_Escr_Temp = '') THEN
				RETURN ("Idm_ID_Niv_Escr");
			END IF;
			IF (Idm_ID_Niv_Lect_Temp IS NULL or Idm_ID_Niv_Lect_Temp = '') THEN
				RETURN ("Idm_ID_Niv_Lect");
			END IF;
			IF (Idm_ID_Niv_Conv_Temp IS NULL or Idm_ID_Niv_Conv_Temp = '') THEN
				RETURN ("Idm_ID_Niv_Conv");
			END IF;
            -- Sí:
			-- IF (Idm_Posee_MCE_Temp IS NULL or Idm_Posee_MCE_Temp = '') THEN
				-- RETURN ("Idm_Posee_MCE");
			-- END IF;
			IF (Idm_Adjunto_Temp IS NULL or Idm_Adjunto_Temp = '') THEN
				RETURN ("Idm_Adjunto");
			END IF;
		END LOOP loopIdioma;
		CLOSE Crsr_Idioma;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Curso_Sem FROM ASP_Curso_Sem WHERE CSe_ID_Asp = aspirante;
    IF (Cont_Curso_Sem<1) THEN RETURN ("ASP_Curso_Sem");
	ELSE
    BEGIN
		DECLARE CSe_Actividad_Temp VARCHAR(250);
		DECLARE CSe_Institucion_Temp VARCHAR(250);
		DECLARE CSe_Lugar_Temp VARCHAR(250);
		DECLARE CSe_Annio_Temp YEAR(4);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Curso_Sem CURSOR FOR
		SELECT CSe_Actividad, CSe_Institucion, CSe_Lugar, CSe_Annio
		FROM ASP_Curso_Sem WHERE CSe_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Curso_Sem;
		loopCursoSem: LOOP
		FETCH Crsr_Curso_Sem INTO CSe_Actividad_Temp, CSe_Institucion_Temp, CSe_Lugar_Temp,
        CSe_Annio_Temp;
			IF done THEN
				LEAVE loopCursoSem;
			END IF;
			IF (CSe_Actividad_Temp IS NULL or CSe_Actividad_Temp = '') THEN
				RETURN ("CSe_Actividad");
			END IF;
			IF (CSe_Institucion_Temp IS NULL or CSe_Institucion_Temp = '') THEN
				RETURN ("CSe_Institucion");
			END IF;
			IF (CSe_Lugar_Temp IS NULL or CSe_Lugar_Temp = '') THEN
				RETURN ("CSe_Lugar");
			END IF;
			IF (CSe_Annio_Temp IS NULL or CSe_Annio_Temp = '') THEN
				RETURN ("CSe_Annio");
			END IF;
		END LOOP loopCursoSem;
		CLOSE Crsr_Curso_Sem;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Educ_Sup FROM ASP_Educ_Sup WHERE Sup_ID_Asp = aspirante;
    IF (Cont_Educ_Sup<1) THEN RETURN ("ASP_Educ_Sup");
	ELSE
    BEGIN
		DECLARE Sup_ID_Institucion_Temp SMALLINT;
		DECLARE Sup_ID_Pais_Temp SMALLINT;
		DECLARE Sup_ID_Area_Esp_Temp SMALLINT;
		DECLARE Sup_ID_Grado_Acad_Temp SMALLINT;
		DECLARE Sup_Anio_Grad_Temp YEAR(4);
		DECLARE Sup_Adjunto_Temp VARCHAR(300);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Educ_Sup CURSOR FOR
		SELECT Sup_ID_Institucion, Sup_ID_Pais, Sup_ID_Area_Esp, Sup_ID_Grado_Acad,
        Sup_Anio_Grad, Sup_Adjunto
		FROM ASP_Educ_Sup WHERE Sup_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Educ_Sup;
		loopEducSup: LOOP
		FETCH Crsr_Educ_Sup INTO Sup_ID_Institucion_Temp, Sup_ID_Pais_Temp,
        Sup_ID_Area_Esp_Temp, Sup_ID_Grado_Acad_Temp, Sup_Anio_Grad_Temp, Sup_Adjunto_Temp;
			IF done THEN
				LEAVE loopEducSup;
			END IF;
			IF (Sup_ID_Institucion_Temp IS NULL or Sup_ID_Institucion_Temp = '') THEN
				RETURN ("Sup_ID_Institucion");
			END IF;
			IF (Sup_ID_Pais_Temp IS NULL or Sup_ID_Pais_Temp = '') THEN
				RETURN ("Sup_ID_Pais");
			END IF;
			IF (Sup_ID_Area_Esp_Temp IS NULL or Sup_ID_Area_Esp_Temp = '') THEN
				RETURN ("Sup_ID_Area_Esp");
			END IF;
			IF (Sup_ID_Grado_Acad_Temp IS NULL or Sup_ID_Grado_Acad_Temp = '') THEN
				RETURN ("Sup_ID_Grado_Acad");
			END IF;
            IF (Sup_Anio_Grad_Temp IS NULL or Sup_Anio_Grad_Temp = '') THEN
				RETURN ("Sup_Anio_Grad");
			END IF;
            IF (Sup_Adjunto_Temp IS NULL or Sup_Adjunto_Temp = '') THEN
				RETURN ("Sup_Adjunto");
			END IF;
		END LOOP loopEducSup;
		CLOSE Crsr_Educ_Sup;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Exp_Invest FROM ASP_Exp_Invest WHERE Inv_ID_Asp = aspirante;
    IF (Cont_Exp_Invest<1) THEN RETURN ("ASP_Exp_Invest");
	ELSE
    BEGIN
		DECLARE Inv_Proyecto_Temp VARCHAR(400);
		DECLARE Inv_ID_Institucion_Temp SMALLINT;
		DECLARE Inv_Lugar_Temp VARCHAR(250);
		DECLARE Inv_Anio_Temp YEAR(4);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Exp_Invest CURSOR FOR
		SELECT Inv_Proyecto, Inv_ID_Institucion, Inv_Lugar, Inv_Anio
		FROM ASP_Exp_Invest WHERE Inv_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Exp_Invest;
		loopExpInvest: LOOP
		FETCH Crsr_Exp_Invest INTO Inv_Proyecto_Temp, Inv_ID_Institucion_Temp, Inv_Lugar_Temp,
        Inv_Anio_Temp;
			IF done THEN
				LEAVE loopExpInvest;
			END IF;
			IF (Inv_Proyecto_Temp IS NULL or Inv_Proyecto_Temp = '') THEN
				RETURN ("Inv_Proyecto");
			END IF;
			IF (Inv_ID_Institucion_Temp IS NULL or Inv_ID_Institucion_Temp = '') THEN
				RETURN ("Inv_ID_Institucion");
			END IF;
			IF (Inv_Lugar_Temp IS NULL or Inv_Lugar_Temp = '') THEN
				RETURN ("Inv_Lugar");
			END IF;
			IF (Inv_Anio_Temp IS NULL or Inv_Anio_Temp = '') THEN
				RETURN ("Inv_Anio");
			END IF;
		END LOOP loopExpInvest;
		CLOSE Crsr_Exp_Invest;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Publicacion FROM GEN_Publicacion WHERE Pub_ID_Asp = aspirante;
    IF (Cont_Publicacion<1) THEN RETURN ("GEN_Publicacion");
	ELSE
    BEGIN
		DECLARE Pub_Titulo_Temp VARCHAR(400);
		DECLARE Pub_Medio_Temp VARCHAR (250);
		DECLARE Pub_ID_Pais_Temp SMALLINT;
		DECLARE Pub_Anio_Temp YEAR(4);
		DECLARE Pub_Enlace_Temp VARCHAR(250);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Publicacion CURSOR FOR
		SELECT Pub_Titulo, Pub_Medio, Pub_ID_Pais, Pub_Anio, Pub_Enlace
		FROM GEN_Publicacion WHERE Pub_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Publicacion;
		loopPublicacion: LOOP
		FETCH Crsr_Publicacion INTO Pub_Titulo_Temp, Pub_Medio_Temp, Pub_ID_Pais_Temp,
        Pub_Anio_Temp, Pub_Enlace_Temp;
			IF done THEN
				LEAVE loopPublicacion;
			END IF;
			IF (Pub_Titulo_Temp IS NULL or Pub_Titulo_Temp = '') THEN
				RETURN ("Pub_Titulo");
			END IF;
            IF (Pub_Medio_Temp IS NULL or Pub_Medio_Temp = '') THEN
				RETURN ("Pub_Medio");
			END IF;
            IF (Pub_ID_Pais_Temp IS NULL or Pub_ID_Pais_Temp = '') THEN
				RETURN ("Pub_ID_Pais");
			END IF;
            IF (Pub_Anio_Temp IS NULL or Pub_Anio_Temp = '') THEN
				RETURN ("Pub_Anio");
			END IF;
            -- Sí
            -- IF (Pub_Enlace_Temp IS NULL or Pub_Enlace_Temp = '') THEN
				-- RETURN ("Pub_Enlace");
			-- END IF;

		END LOOP loopPublicacion;
		CLOSE Crsr_Publicacion;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Exp_Profesional FROM ASP_Exp_Profesional WHERE Pro_ID_Asp = aspirante;
    IF (Cont_Exp_Profesional<1) THEN RETURN ("ASP_Exp_Profesional");
	ELSE
    BEGIN
		DECLARE Pro_Institucion_Temp VARCHAR(250);
		DECLARE Pro_ID_Ocupacion_Temp SMALLINT;
		DECLARE Pro_Anio_Inicio_Temp YEAR(4);
		DECLARE Pro_Actual_Temp BOOLEAN;
		DECLARE Pro_Anio_Fin_Temp YEAR(4);
		DECLARE Pro_Funciones_Temp VARCHAR(500);
        DECLARE done INT DEFAULT FALSE;

		DEClARE Crsr_Exp_Profesional CURSOR FOR
		SELECT Pro_Institucion, Pro_ID_Ocupacion, Pro_Anio_Inicio, Pro_Actual, Pro_Anio_Fin,
        Pro_Funciones
		FROM ASP_Exp_Profesional WHERE Pro_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Exp_Profesional;
		loopExpPro: LOOP
		FETCH Crsr_Exp_Profesional INTO Pro_Institucion_Temp, Pro_ID_Ocupacion_Temp,
        Pro_Anio_Inicio_Temp, Pro_Actual_Temp, Pro_Anio_Fin_Temp, Pro_Funciones_Temp;
			IF done THEN
				LEAVE loopExpPro;
			END IF;
			IF (Pro_Institucion_Temp IS NULL or Pro_Institucion_Temp = '') THEN
				RETURN ("Pro_Institucion");
			END IF;
            IF (Pro_ID_Ocupacion_Temp IS NULL or Pro_ID_Ocupacion_Temp = '') THEN
				RETURN ("Pro_ID_Ocupacion");
			END IF;
            IF (Pro_Anio_Inicio_Temp IS NULL or Pro_Anio_Inicio_Temp = '') THEN
				RETURN ("Pro_Anio_Inicio");
			END IF;
            IF ((Pro_Actual_Temp IS NULL and Pro_Actual_Temp != 0) or (Pro_Actual_Temp = '' and Pro_Actual_Temp != 0)) THEN
				RETURN ("Pro_Actual");
			END IF;
            IF (Pro_Anio_Fin_Temp IS NULL or Pro_Anio_Fin_Temp = '') THEN
				RETURN ("Pro_Anio_Fin");
			END IF;
            IF ((Pro_Funciones_Temp IS NULL or Pro_Funciones_Temp = '' ) and Pro_Actual_Temp = 1) THEN
				RETURN ("Pro_Funciones");
			END IF;

		END LOOP loopExpPro;
		CLOSE Crsr_Exp_Profesional;
	END;
	END IF;

    SELECT COUNT(*) INTO Cont_Recomendacion FROM ASP_Recomendacion WHERE Rec_ID_Asp = aspirante;
    IF (Cont_Recomendacion<1) THEN RETURN ("ASP_Recomendacion");
	ELSE
    BEGIN
		DECLARE Rec_Nombre_Completo_Temp VARCHAR(100);
		DECLARE Rec_Direccion_Temp VARCHAR(250);
		DECLARE Rec_Telefono_Temp VARCHAR(20);
		DECLARE Rec_Fax_Temp VARCHAR(20);
		DECLARE Rec_ID_Email_Temp SMALLINT;
		DECLARE Rec_Ocupacion_Temp VARCHAR(150);
		DECLARE Rec_Adjunto_Temp VARCHAR(300);
        DECLARE done INT DEFAULT FALSE;
        DECLARE Cont_Rec INT DEFAULT 0;

		DEClARE Crsr_Recomendacion CURSOR FOR
		SELECT Rec_Nombre_Completo, Rec_Direccion, Rec_Telefono, Rec_Fax, Rec_ID_Email,
        Rec_Ocupacion, Rec_Adjunto
		FROM ASP_Recomendacion WHERE Rec_ID_Asp = aspirante;

		-- Declaración de un manejador de error tipo NOT FOUND
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

		OPEN Crsr_Recomendacion;
		loopRecomendacion: LOOP
		FETCH Crsr_Recomendacion INTO Rec_Nombre_Completo_Temp, Rec_Direccion_Temp,
        Rec_Telefono_Temp, Rec_Fax_Temp, Rec_ID_Email_Temp, Rec_Ocupacion_Temp,
        Rec_Adjunto_Temp;
			IF done THEN
				IF (Cont_Rec>1) THEN
					LEAVE loopRecomendacion;
				ELSE
					RETURN ("ASP_Recomendacion2");
                END IF;
			END IF;
			IF (Rec_Nombre_Completo_Temp IS NULL or Rec_Nombre_Completo_Temp = '') THEN
				RETURN ("Rec_Nombre_Completo");
			END IF;
            IF (Rec_Direccion_Temp IS NULL or Rec_Direccion_Temp = '') THEN
				RETURN ("Rec_Direccion");
			END IF;
            IF (Rec_Telefono_Temp IS NULL or Rec_Telefono_Temp = '') THEN
				RETURN ("Rec_Telefono");
			END IF;
            IF (Rec_Fax_Temp IS NULL or Rec_Fax_Temp = '') THEN
				RETURN ("Rec_Fax");
			END IF;
            IF (Rec_ID_Email_Temp IS NULL or Rec_ID_Email_Temp = '') THEN
				RETURN ("Rec_ID_Email");
			END IF;
            IF (Rec_Ocupacion_Temp IS NULL or Rec_Ocupacion_Temp = '') THEN
				RETURN ("Rec_Ocupacion");
			END IF;
             IF (Rec_Adjunto_Temp IS NULL or Rec_Adjunto_Temp = '') THEN
				RETURN ("Rec_Adjunto");
			END IF;
			SET Cont_Rec = Cont_Rec+1;
		END LOOP loopRecomendacion;
		CLOSE Crsr_Recomendacion;
	END;
	END IF;

	RETURN 'Y';
END
