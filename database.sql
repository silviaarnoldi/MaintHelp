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
    ID INT PRIMARY KEY,
    NOME VARCHAR(255),
    STATO BIT
);

CREATE TABLE GUASTO (
    ID INT PRIMARY KEY,
    TIPOGUASTO VARCHAR(255)
);

CREATE TABLE DOCUMENTO (
    ID INT PRIMARY KEY,
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
INSERT INTO UTENTE (USERNAME, PASSWORD, NOME, COGNOME, RUOLO) VALUES ('admin', '86f00f46f1128998f1c27b21fe9fd5ee', 'silvia', 'arnoldi', 'Amministratore');