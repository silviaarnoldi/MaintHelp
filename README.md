# MaintHelp

# DESCRIZIONE: 
web app per gestione dei documenti di manutenzioni e di documenti sui macchinari utili ai manutentori che devono intervenire su un macchinario;

# PROBLEMA:

Il sistema supporta i manutentori nella gestione completa delle manutenzioni, sia preventive che in risposta a guasti dei macchinari. Permette loro di ricevere informazioni dettagliate sullo stato dei macchinari, inclusi dettagli come l'ultima manutenzione, lo storico delle manutenzioni, chi le ha eseguite, la data della prossima manutenzione, la durata delle manutenzioni e lo storico dei guasti, evidenziando i guasti più ricorrenti.In aggiunta il manutentore può cancellare la documentazione delle manutenzioni preventive e guasto eseguite nel tempo.

Per gli operatori, il sistema facilita la segnalazione dei guasti, fornendo un elenco dettagliato di possibili guasti da compilare. Ciò consente ai manutentori di comprendere rapidamente il problema e di sapere come intervenire.

Inoltre, il sistema consente ai manutentori di registrare tutte le informazioni relative alle manutenzioni eseguite, sia preventive che in seguito a guasti. L'Dirigente ha il compito di gestire i lavoratori, registrando nuovi manutentori o operatori e rimuovendoli quando necessario e modificarli. Il Presidente invece crea,modifica o elimina una azienda e aggiunge,modifica o elimina un Dirigente.

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
    
**Dirigente**:
  * registare un utente ** (FATTO)**
  * eliminare utente ** (FATTO)**
  * modificare utente ** (FATTO)**
  * abilitare utente ** (FATTO)**
  * disabilitare utente ** (FATTO)**
  * crea un macchianrio ** (FATTO)**
  * eliminare macchianrio ** (FATTO)**
  * modificare macchianrio ** (FATTO)**
    
 **Presidente**:
  * registare un Dirigente ** (FATTO)**
  * eliminare Dirigente ** (FATTO)**
  * modificare Dirigente ** (FATTO)**
  * crea azienda ** (FATTO)**
  * elimina azienda ** (FATTO)**
  * modifica azienda ** (FATTO)**

    
# DIAGRAMMA E.R.:









# ENTITA': 
  * **AZIENDA**:ID,NOME;
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
  * **DIRIGENTE**:-;
  * **PRESIDENTE**:-;

# RELAZIONI: 
  * **TIENE**;
  * **LAVORA**;
  * **HA**;
  * **RICEVE**;
  * **SCRIVE**:DATA;
  * **ESEGUE**:DATA;
  *  **POSSIEDE**;
  *  **AMMINISTRA**;
  *  **TIENE**;
    
# CARDINALITA':
 * AZIENDA (1,N) MACCHINARIO
 * AZIENDA (1,N) UTENTE
 * MACCHINARIO (1,N) DOCUMENTO
 * MANUTENTORE (1,N) DOCUMENTO
 * MANUTENTORE (1,N) MANUTENZIONE
 * OPERATORE (1,N) RICHIESTA
 * RICHIESTA (1,1) GUASTO
 * PRESIDENTE (1,N) AZIENDA
 * AZIENDA (1,N) MACCHINARIO
   
   
   
# MODELLO RELAZIONALE:
 * AZIENDA (**ID**,NOME)
 * MACCHINARIO(**ID**,NOME,STATO,SCHEMA_ELECT,SCHEMA_MEC,CHIAMATA_MANUTENTORE,*AZIENDA_ID*)
   * DOCUMENTO(**ID**,NOME,TIPODOCUMENTO,TIPOGUASTO,DATA_INVIA,*UTENTE_ID*,TIPO_MANUTENZIONE,ORE_MANUTENZIONE,DESCRIZIONE,DATA_SCRIVE,*MACCHINARIO_ID*,*GUASTO_ID*)
 * GUASTO(**ID**,TIPOGUASTO)
 * UTENTE(**ID**,USERNAME,PASSWORD,NOME,COGNOME,RUOLO,,*AZIENDA_ID*)
     
# MOCKUP: 
**UTENTE:**
accedere alla piattaforma



modifica credenziali:




**DIRIGENTE:**

HOME:








registare un utente 




eliminare e modifica utente



abilita/disabilita utente:


![Screenshot 2024-04-11 101802](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/c581f1c9-8c40-4ba1-ad9a-f151f54e1593)



**PRESIDENTE:**

HOME:

crea azienda:


elimina e modifica azienda:


aggiungi Dirigente:


eliminare e modificare Dirigente:

 






**OPERATO:**
HOME:




scrivere il DocRichiesta




**MANUTENTORE:**

HOME:

ricevere la richiesta da parte del operatore e ricevere i DocManutenzionePreventiva
ricevere il DocRichiesta e ricevere i DocManutenzionePreventiva:






scrivere DocManutenzionePreventiva e ricevere i DocMachinari:







scrivere DocManutenzioneGuasto e ricevere i DocMachinari,storici di DocManutenzioneGuasto e DocManutenzionePreventiva:






# DATABASE
**consiglio di scaricare l'estensione docker**

**per accedere al database inserisci la seguente riga nel terminale**:docker run --name myXampp -p 41061:22 -p 41062:80 -d -v /workspaces/MaintHelp:/www tomsik68/xampp:8

**PER CREARE IL DATABASE IN  SQL FAI COPIA IN COLLA DEL FILE "database.sql"** 

** per il LOGIN e testare le varie funzionalita degli utenti, accedere con le credenziali  per:
*  **Dirigente**=> username: **admin** , password: **esperia** , azienda: 1 ;
*  **MANUTENTORE**=> username: **mari** , password: **esperia** , azienda: 1 ;
*  **OPERATORE**=> username: **pippo** , password: **esperia** , azienda: 1 ;
*  **Dirigente**=> username: **lollo** , password: **esperia** , azienda: 2 ;
*  **MANUTENTORE**=> username: **mimi** , password: **esperia** , azienda: 2 ;
*  **OPERATORE**=> username: **gianni** , password: **esperia** , azienda: 2 ;

