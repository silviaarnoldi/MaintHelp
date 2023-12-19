DROP DATABASE IF EXISTS MaintHelp;
CREATE DATABASE MaintHelp;
USE MaintHelp;
CREATE TABLE UTENTE (
    ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    USERNAME VARCHAR(255),
    PASSWORD VARCHAR(255),
    NOME VARCHAR(255),
    COGNOME VARCHAR(255),
    RUOLO VARCHAR(255)
);

CREATE TABLE MACCHINARIO (
     ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(255),
    STATO BOOLEAN
);

CREATE TABLE GUASTO (
     ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    TIPOGUASTO VARCHAR(255)
);

CREATE TABLE DOCUMENTO (
     ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(255),
    SCHEMA_ELECT VARCHAR(255),
    SCHEMA_MEC VARCHAR(255),
    TIPODOCUMENTO VARCHAR(255),
    TIPOGUASTO VARCHAR(255),
    DATA_INVIA DATE,
    MANUTENTORE_ID INT,
    OPERATORE_ID INT,
    TIPO_MANUTENZIONE VARCHAR(255),
    ORE_MANUTENZIONE INT,
    DESCRIZIONE VARCHAR(255),
    DATA_SCRIVE DATE,
    MACCHINARIO_ID INT,
    GUASTO_ID INT,
    FOREIGN KEY (MANUTENTORE_ID) REFERENCES UTENTE(ID),
    FOREIGN KEY (OPERATORE_ID) REFERENCES UTENTE(ID),
    FOREIGN KEY (MACCHINARIO_ID) REFERENCES MACCHINARIO(ID),
    FOREIGN KEY (GUASTO_ID) REFERENCES GUASTO(ID)
);
INSERT INTO UTENTE (USERNAME, PASSWORD, NOME, COGNOME, RUOLO) VALUES ('admin', '153547d40c4320a3f7bb11f3435d2d49', 'silvia', 'arnoldi', 'Amministratore');
INSERT INTO MACCHINARIO (NOME, STATO) VALUES ('Macchinario1', 1);
INSERT INTO MACCHINARIO (NOME, STATO) VALUES ('Macchinario2', 1);
INSERT INTO MACCHINARIO (NOME, STATO) VALUES ('Macchinario3', 1);
INSERT INTO MACCHINARIO (NOME, STATO) VALUES ('Macchinario4', 1);
INSERT INTO GUASTO (TIPOGUASTO) VALUES ('Elettrico');
INSERT INTO GUASTO (TIPOGUASTO) VALUES ('Meccanico');
INSERT INTO GUASTO (TIPOGUASTO) VALUES ('ElettricoInformatico');
INSERT INTO GUASTO (TIPOGUASTO) VALUES ('Altro');

