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
  * accedere alla piattaforma
    
**OPERATORE**:
  * scrivere il DocRichiesta

**MANUTENTORE**:
  * scrivere DocManutenzionePreventiva
  * scrivere DocManutenzioneGuasto
  * ricevere il DocRichiesta
  * ricevere i DocMachinari
  * ricevere i DocMachinari,storici di DocManutenzioneGuasto e DocManutenzionePreventiva
    
**AMMINISTRATORE**:
  * registare un utente
  * eliminare utente
    
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

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/90ddc362-85aa-4379-891c-fce337e75979)


registare un utente 

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/3ef6a592-1442-4bcc-aec0-a07063aa18e1)


eliminare utente

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/e94b8a15-2c47-4e6f-8b7d-cd13086b4f03)


scrivere il DocRichiesta

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/cc6ace75-0850-43a9-aaf2-afb5a09e038b)


ricevere il DocRichiesta e ricevere i DocManutenzionePreventiva

![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/a5f9aa59-b305-40ec-a592-5d8e54c56514)


scrivere DocManutenzionePreventiva e ricevere i DocMachinari
![image](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/bb17b347-7d7c-44f3-9aa2-16171b1c1ddb)



scrivere DocManutenzioneGuasto e ricevere i DocMachinari,storici di DocManutenzioneGuasto e DocManutenzionePreventiva
![279045353-cb90a159-a742-413d-a94d-808d64b4a8b8](https://github.com/silviaarnoldi/MaintHelp/assets/101811166/ea80e3e5-16e4-490d-b975-0a40a7f1d702)



# DATABASE
**per accedere al database inserisci la seguente riga nel terminale**:docker run --name myXampp -p 41061:22 -p 41062:80 -d -v /workspaces/MaintHelp:/www tomsik68/xampp:8

**PER CREARE IL DATABASE IN  SQL FAI COPIA IN COLLA DEL FILE "database.sql"**
