# PallKit

Applicazione di esempio per la gestione dei sintomi e l'identificazione dei bisogni in cure palliative.

## Configurazione di nuove schede

Le schede di valutazione (ad esempio IPOS ed ESAS) sono costituite da:
- un file PHP in `gestione-sintomi/` che contiene la sezione HTML;
- un file JavaScript dedicato con la logica di compilazione/stampa;
- un eventuale file CSS per gli stili specifici.

Per aggiungere una nuova scheda:
1. crea `strumenti-nome.php` seguendo la struttura di `strumenti-ipos.php` o `strumenti-esas.php`;
2. aggiungi, se necessario, `css/nome.css` e includilo nel file PHP;
3. implementa lo script `js/nome.js` e richiamalo dal file PHP;
4. inserisci una card in `strumenti-multidimensionali.php` con i pulsanti "Compila" e "Visualizza";
5. definisci le funzioni `openNOMECompile` e `openNOMEVisualize` in `js/strumenti-valutazione.js` per mostrare la scheda.

Ricorda di eseguire `php -l` sui file PHP modificati prima del commit.
