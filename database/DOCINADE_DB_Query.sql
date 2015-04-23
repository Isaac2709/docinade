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
	email VARCHAR(255) NOT NULL,
	password VARCHAR(60) NOT NULL,
	remember_token VARCHAR(100),

    CONSTRAINT PK_Usu_ID PRIMARY KEY (Usu_ID)
    -- Alter table `asp_aspirante` CHANGE COLUMN `ASP_Usuario` `GEN_ID_Usuario` SMALLINT NOT NULL
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
	PTe_Metodologia TEXT,
	PTe_Adjunto LONGBLOB,

    CONSTRAINT PK_Asp_Pte_ID PRIMARY KEY (PTe_ID)
);

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
	Asp_Fotografia LONGBLOB,
	Asp_Pasaporte_Adj LONGBLOB,
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

	ID_Prop_Tesis SMALLINT,

    CONSTRAINT PK_Asp_Asp_ID PRIMARY KEY (Asp_ID),
    CONSTRAINT FK_Asp_Asp_InfoPer FOREIGN KEY (Asp_ID_InfoPer) REFERENCES GEN_Info_Personal(IPe_ID),
    CONSTRAINT FK_Asp_Asp_Naci FOREIGN KEY (Asp_ID_Nac) REFERENCES ASP_Nacionalidad(Nac_ID),
    CONSTRAINT FK_Asp_Asp_Enfasis FOREIGN KEY (Asp_ID_Enfasis) REFERENCES ASP_Enfasis(Enf_ID),
    CONSTRAINT FK_Asp_Asp_DirAct FOREIGN KEY (Asp_ID_Dir_Actual) REFERENCES ASP_Dir_Actual(DiA_ID),
    -- CONSTRAINT FK_Asp_Asp_Area_Interes FOREIGN KEY (Asp_ID_Area_Interes) REFERENCES ASP_Area_Interes(Area_ID),
    CONSTRAINT FK_Asp_Asp_Prop_Tesis FOREIGN KEY (ID_Prop_Tesis) REFERENCES ASP_Prop_Tesis(PTe_ID)
);
-- CHANGES
-- ALTER TABLE `Asp_Aspirante` DROP FOREIGN KEY `FK_Asp_Asp_Naci`;
-- ALTER TABLE `Asp_Aspirante` ADD CONSTRAINT `FK_Asp_Asp_Naci` FOREIGN KEY (`Asp_ID_Nac`) REFERENCES `DOCINADE_DB`.`Asp_Nacionalidad`(`Nac_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `Asp_Aspirante` DROP FOREIGN KEY `FK_Asp_Asp_Area_Interes`;
-- ALTER TABLE `Asp_Aspirante` CHANGE `Asp_ID_Area_Interes` `Asp_Area_Interes` VARCHAR(150) NULL DEFAULT NULL;

CREATE TABLE ASP_Biblioteca(
	Bib_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Bib_ID_Asp SMALLINT NOT NULL,
	Bib_Nombre VARCHAR (250) NOT NULL,

    CONSTRAINT PK_Asp_Bib_ID PRIMARY KEY (Bib_ID),
    CONSTRAINT FK_Asp_Bib_Asp FOREIGN KEY (Bib_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID)
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
	Idm_Adjunto LONGBLOB,

    CONSTRAINT PK_Asp_Idm_ID PRIMARY KEY (Idm_ID),
    CONSTRAINT FK_Asp_Idm_Asp FOREIGN KEY (Idm_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Idm_Escr FOREIGN KEY (Idm_ID_Niv_Escr) REFERENCES ASP_Idioma(Idm_ID),
    CONSTRAINT FK_Asp_Idm_Lect FOREIGN KEY (Idm_ID_Niv_Lect) REFERENCES ASP_Idioma(Idm_ID),
    CONSTRAINT FK_Asp_Idm_Conv FOREIGN KEY (Idm_ID_Niv_Conv) REFERENCES ASP_Idioma(Idm_ID)
);

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
	Sup_Anio_Grad YEAR(4),
	Sup_Adjunto LONGBLOB,

    CONSTRAINT PK_Asp_Sup_ID PRIMARY KEY (Sup_ID),
    CONSTRAINT FK_Asp_Sup_Asp FOREIGN KEY (Sup_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Sup_Institucion FOREIGN KEY (Sup_ID_Institucion) REFERENCES GEN_Institucion(Ins_ID),
    CONSTRAINT FK_Asp_Sup_Pais FOREIGN KEY (Sup_ID_Pais) REFERENCES GEN_Pais(Pais_ID),
    CONSTRAINT FK_Asp_Sup_Area FOREIGN KEY (Sup_ID_Area_Esp) REFERENCES ASP_Area_Esp(Esp_ID),
    CONSTRAINT FK_Asp_Sup_Grado FOREIGN KEY (Sup_ID_Grado_Acad) REFERENCES GEN_Grado_Acad(Gra_ID)
);

CREATE TABLE ASP_Exp_Invest(
	Inv_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Inv_ID_Asp SMALLINT NOT NULL,
	Inv_Proyecto VARCHAR(400) NOT NULL,
	Inv_ID_Institucion SMALLINT,
	Inv_Lugar VARCHAR(250),
	Inv_Anio YEAR(4),

    CONSTRAINT PK_Asp_Inv_ID PRIMARY KEY (Inv_ID),
    CONSTRAINT FK_Asp_Inv_Asp FOREIGN KEY (Inv_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Inv_Institucion FOREIGN KEY (Inv_ID_Institucion) REFERENCES GEN_Institucion(Ins_ID)
);

CREATE TABLE ASP_Exp_Profesional( -- Para obtener el más reciente se calcula con los años.
	Pro_ID SMALLINT AUTO_INCREMENT NOT NULL,
	Pro_ID_Asp SMALLINT NOT NULL,
	Pro_Institucion VARCHAR(250),
	Pro_ID_Ocupacion SMALLINT,
	Pro_Anio_Inicio YEAR(4),
    Pro_Actual BOOLEAN,
	Pro_Anio_Fin YEAR(4),

    CONSTRAINT PK_Asp_Pro_ID PRIMARY KEY (Pro_ID),
    CONSTRAINT FK_Asp_Pro_Asp FOREIGN KEY (Pro_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Pro_Ocupacion FOREIGN KEY (Pro_ID_Ocupacion) REFERENCES GEN_Ocupacion(Ocu_ID)
);

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
	Rec_ID_Ocupacion SMALLINT,
	Rec_Adjunto LONGBLOB,

    CONSTRAINT PK_Asp_Rec_ID PRIMARY KEY (Rec_ID),
    CONSTRAINT FK_Asp_Rec_Asp FOREIGN KEY (Rec_ID_Asp) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Rec_Email FOREIGN KEY (Rec_ID_Email) REFERENCES ASP_Aspirante(Asp_ID),
    CONSTRAINT FK_Asp_Rec_Ocupacion FOREIGN KEY (Rec_ID_Ocupacion) REFERENCES GEN_Email(Email_ID)
);

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
