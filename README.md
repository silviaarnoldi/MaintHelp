# MaintHelp

# DESCRIZIONE: 
web app per gestione dei documenti di manutenzioni e di documenti sui macchinari utili ai manutentori che devono intervenire su un macchinario;

# PROBLEMA:

Il sistema supporta i manutentori nella gestione completa delle manutenzioni, sia preventive che in risposta a guasti dei macchinari. Permette loro di ricevere informazioni dettagliate sullo stato dei macchinari, inclusi dettagli come l'ultima manutenzione, lo storico delle manutenzioni, chi le ha eseguite, la data della prossima manutenzione, la durata delle manutenzioni e lo storico dei guasti, evidenziando i guasti più ricorrenti.In aggiunta il manutentore può cancellare la documentazione delle manutenzioni preventive e guasto eseguite nel tempo.

Per gli operatori, il sistema facilita la segnalazione dei guasti, fornendo un elenco dettagliato di possibili guasti da compilare. Ciò consente ai manutentori di comprendere rapidamente il problema e di sapere come intervenire.

Inoltre, il sistema consente ai manutentori di registrare tutte le informazioni relative alle manutenzioni eseguite, sia preventive che in seguito a guasti. L'Amministratore ha il compito di gestire i lavoratori, registrando nuovi manutentori o operatori e rimuovendoli quando necessario e modificarli.

# TARGET: 
manutentori,operatori e amministratori aziendali;

# FUNZIONALITA': 
**UTENTI**:
  * accedere alla piattaforma ** (FATTO)**
  * modificare credenziali ** (FATTO)**
    
**OPERATORE**:
  * scrivere il DocRichiesta ** (FATTO)**

**MANUTENTORE**:
  * scrivere DocManutenzionePreventiva ** (FATTO)**
  * scrivere DocManutenzioneGuasto ** (FATTO)**

  * ricevere la richiesta da parte del operatore  ** (FATTO)**
  * ricevere il DocRichiesta ** (FATTO)**

  * ricevere i DocMachinari ** (FATTO)**
  * ricevere i DocMachinari,storici di DocManutenzioneGuasto e DocManutenzionePreventiva ** (FATTO)**
  * eliminare DocManutenzionePreventiva e DocManutenzioneGuasto ** (FATTO)**
    
**AMMINISTRATORE**:
  * registare un utente ** (FATTO)**
  * eliminare utente ** (FATTO)**
  * modificare utente ** (FATTO)**
    
# DIAGRAMMA E.R.:

![278418006-91bfdd0e-256f-4af3-8954-c7885f5d6471](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/d467e4a3-cc66-4854-81c1-8f9d98d0470c)








# ENTITA': 
  * **MACCHINARIO**: ID, NOME,STATO, SCHEMA_ELECT,SCHEMA_MEC, CHIAMATA_MANUTENTORE;
  * **UTENTE**: ID,USERNAME,PASSWORD,NOME,COGNOME;
  * **DOCUMENTO**: ID, NOME,DATA;
  * **RICHIESTA**: STATO_MACCHINARIO;
  * **GUASTO**: ID;
  * **MECCANICO**:-;
  * **ELETTRICO**:-;
  * **ELETTRICO_MECCANICO**:-;
  * **MANUTENZIONE**: ORE_MANUTENZIONE,DESCRIZIONE,TIPO_MANUTENZIONE;
  * **OPERATORE**:-;
  * **MANUTENTORE**:-;
  * **AMMINISTRATORE**:-;

# RELAZIONI: 
  * **HA**;
  * **RICEVE**;
  * **SCRIVE**:DATA;
  * **ESEGUE**:DATA;
  *  **POSSIEDE**;
    
# CARDINALITA':
 * MACCHINARIO (1,N) DOCUMENTO
 * MANUTENTORE (1,N) DOCUMENTO
 * MANUTENTORE (1,N) MANUTENZIONE
 * OPERATORE (1,N) RICHIESTA
 * RICHIESTA (1,1) GUASTO
   
   
# MODELLO RELAZIONALE:
 * MACCHINARIO(**ID**,NOME,STATO,SCHEMA_ELECT,SCHEMA_MEC,CHIAMATA_MANUTENTORE)
 * DOCUMENTO(**ID**,NOME,TIPODOCUMENTO,TIPOGUASTO,DATA_INVIA,*UTENTE_ID*,TIPO_MANUTENZIONE,ORE_MANUTENZIONE,DESCRIZIONE,DATA_SCRIVE,*MACCHINARIO_ID*,*GUASTO_ID*)
 * GUASTO(**ID**,TIPOGUASTO)
 * UTENTE(**ID**,USERNAME,PASSWORD,NOME,COGNOME,RUOLO)
     
# MOCKUP: 
**UTENTE:**
accedere alla piattaforma

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/f9f69fb7-add1-48a7-8998-fde7f9053a2b)

modifica credenziali:

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/0c1dc707-f169-45dc-bda8-38840cf85852)


**AMMINISTRATORE:**

HOME:

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/fd130fcb-a701-4fed-875d-aa9841dc9d20)




registare un utente 

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/3a1452a6-c892-480b-93b5-f47c75894e7f)


eliminare e modifica utente

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/865b3dc9-47eb-4fd4-9be3-569e53f7877d)


![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/2c17ae55-320b-46da-a753-ed5b385d9ee8)





**OPERATO:**
HOME:

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/5f03e844-a207-46ba-ba8d-4883321f0c92)



scrivere il DocRichiesta

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/f1b16638-ed83-4418-8575-b8a8b786ca41)


**MANUTENTORE:**

HOME:

ricevere la richiesta da parte del operatore e ricevere i DocManutenzionePreventiva
ricevere il DocRichiesta e ricevere i DocManutenzionePreventiva

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/c150ec83-8240-4305-9e1c-8016be9f9149)



scrivere DocManutenzionePreventiva e ricevere i DocMachinari

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/beb97e83-ce3f-495e-bd5f-0e723c757f7c)





scrivere DocManutenzioneGuasto e ricevere i DocMachinari,storici di DocManutenzioneGuasto e DocManutenzionePreventiva

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/448b1b5b-bf16-46e5-8798-a3a938fd6959)




# DATABASE
**consiglio di scaricare l'estensione docker**

**per accedere al database inserisci la seguente riga nel terminale**:docker run --name myXampp -p 41061:22 -p 41062:80 -d -v /workspaces/MaintHelp:/www tomsik68/xampp:8

**PER CREARE IL DATABASE IN  SQL FAI COPIA IN COLLA DEL FILE "database.sql"** 

** per il LOGIN e testare le varie funzionalita degli utenti, accedere con le credenziali  per:
*  **AMMINISTRATORE**=> username: **admin** , password: **esperia** ;
*  **MANUTENTORE**=> username: **mari** , password: **esperia** ;
*  **OPERATORE**=> username: **pippo** , password: **esperia** ;



