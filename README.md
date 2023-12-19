# MaintHelp

# DESCRIZIONE: 
web app per gestione dei documenti di manutenzioni e di documenti sui macchinari utili ai manutentori che devono intervenire su un macchinario;

# PROBLEMA:

Il sistema supporta i manutentori nella gestione completa delle manutenzioni, sia preventive che in risposta a guasti dei macchinari. Permette loro di ricevere informazioni dettagliate sullo stato dei macchinari, inclusi dettagli come l'ultima manutenzione, lo storico delle manutenzioni, chi le ha eseguite, la data della prossima manutenzione, la durata delle manutenzioni e lo storico dei guasti, evidenziando i guasti più ricorrenti.

Per gli operatori, il sistema facilita la segnalazione dei guasti, fornendo un elenco dettagliato di possibili guasti da compilare. Ciò consente ai manutentori di comprendere rapidamente il problema e di sapere come intervenire.

Inoltre, il sistema consente ai manutentori di registrare tutte le informazioni relative alle manutenzioni eseguite, sia preventive che in seguito a guasti. L'Amministratore ha il compito di gestire i lavoratori, registrando nuovi manutentori o operatori e rimuovendoli quando necessario.

# TARGET: 
manutentori,operatori e amministratori aziendali;

# FUNZIONALITA': 
**UTENTI**:
  * accedere alla piattaforma ** (FATTO)**
    
**OPERATORE**:
  * scrivere il DocRichiesta ** (FATTO)**

**MANUTENTORE**:
  * scrivere DocManutenzionePreventiva
  * scrivere DocManutenzioneGuasto
  * ricevere il DocRichiesta
  * ricevere i DocMachinari
  * ricevere i DocMachinari,storici di DocManutenzioneGuasto e DocManutenzionePreventiva
    
**AMMINISTRATORE**:
  * registare un utente ** (FATTO)**
  * eliminare utente ** (FATTO)**
    
# DIAGRAMMA E.R.:

![290471021-136248e5-5ea0-4036-a4f2-2d5e365eff81](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/3fee65a6-1c8b-4d07-bddf-f15d0ef3c184) 




# ENTITA': 
  * **MACCHINARIO**: ID, NOME,STATO;
  * **UTENTE**: ID,USERNAME,PASSWORD,NOME,COGNOME;
  * **DOCUMENTO**: ID, NOME,DATA;
  * **INFORMATIVO**: SCHEMA_ELECT,SCHEMA_MEC;
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
 * MACCHINARIO(**ID**,NOME,STATO)
 * DOCUMENTO(**ID**,NOME,SCHEMA_ELECT,SCHEMA_MEC,TIPODOCUMENTO,TIPOGUASTO,DATA_INVIA,*UTENTE_ID*,TIPO_MANUTENZIONE,ORE_MANUTENZIONE,DESCRIZIONE,DATA_SCRIVE,*MACCHINARIO_ID*,*GUASTO_ID*)
 * GUASTO(**ID**,TIPOGUASTO)
 * UTENTE(**ID**,USERNAME,PASSWORD,NOME,COGNOME,RUOLO)
     
# MOCKUP: 
accedere alla piattaforma

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/f9f69fb7-add1-48a7-8998-fde7f9053a2b)

**AMMINISTRATORE:**

HOME:

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/a7879202-97b1-4103-982e-057ece568cd6)




registare un utente 

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/3a1452a6-c892-480b-93b5-f47c75894e7f)


eliminare utente

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/ed9395a2-ac7b-48dd-b944-54062c7be500)


**OPERATO:**
HOME:

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/98c7406f-5adc-4b99-aa35-68213bee1682)



scrivere il DocRichiesta

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/f1b16638-ed83-4418-8575-b8a8b786ca41)


**MANUTENTORE:**

HOME:

ricevere il DocRichiesta e ricevere i DocManutenzionePreventiva

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/f6b7dbd2-bc7a-4773-b5e9-e94ae34bb473)



scrivere DocManutenzionePreventiva e ricevere i DocMachinari

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/8569cb80-39ea-4644-b7e2-f8c3b3bc1535)




scrivere DocManutenzioneGuasto e ricevere i DocMachinari,storici di DocManutenzioneGuasto e DocManutenzionePreventiva

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/20b608b8-7abd-413b-9f1f-d52c3ca81709)




# DATABASE
**consiglio di scaricare l'estensione docker**

**per accedere al database inserisci la seguente riga nel terminale**:docker run --name myXampp -p 41061:22 -p 41062:80 -d -v /workspaces/MaintHelp:/www tomsik68/xampp:8

**PER CREARE IL DATABASE IN  SQL FAI COPIA IN COLLA DEL FILE "database.sql"** 

** per il LOGIN e testare il REGISTRA ED ELIMINA utente, accedere con le credenziali username: **admin** , password: **esperia**

