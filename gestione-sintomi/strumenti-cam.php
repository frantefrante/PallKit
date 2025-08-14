<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAM - Algoritmo Diagnostico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="css/delirium.css" rel="stylesheet">
    <style>
        .algorithm-box{background:linear-gradient(135deg,#e8f5e8,#d4edda);border:3px solid var(--success-color);border-radius:15px;padding:2rem;margin:2rem 0;text-align:center;}
        .scale-table{width:100%;margin:2rem 0;border-collapse:collapse;border-radius:15px;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,0.1);}
        .scale-table th{background:var(--delirium-primary);color:#fff;padding:1.5rem;font-weight:700;text-align:left;}
        .scale-table td{padding:1.2rem 1.5rem;border-bottom:1px solid #e9ecef;}
        .scale-table tbody tr:nth-child(even){background:#f8f9fa;}
        .scale-table tbody tr:hover{background:var(--delirium-light);}
        .interpretation-box{background:linear-gradient(135deg,#f8f9fa,#e9ecef);border-radius:12px;padding:1.5rem;margin:1.5rem 0;border:2px solid var(--delirium-light);}
    </style>
</head>
<body>
<div class="container my-4">
    <div class="mb-3 no-print">
        <a href="index.php#strumenti-valutazione-home" class="btn btn-success me-2"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
        <a href="delirium.php" class="btn btn-outline-secondary" style="border-color:#6f42c1;color:#6f42c1;"><i class="fas fa-arrow-left me-2"></i>Torna a Delirium</a>
    </div>

    <h1 class="mb-4">🔍 CAM - Scala di Riferimento e Algoritmo Diagnostico</h1>

    <div class="algorithm-box">
        <h2>🎯 Algoritmo Diagnostico CAM</h2>
        <p style="font-size:1.2rem;margin:1rem 0;"><strong>DELIRIUM PRESENTE se:</strong><br>
            <span style="background:#fff;padding:0.5rem;border-radius:5px;display:inline-block;margin:0.5rem;">(Caratteristica 1 <strong>E</strong> Caratteristica 2) <strong>E</strong> (Caratteristica 3 <strong>O</strong> Caratteristica 4)</span>
        </p>
    </div>

    <table class="scale-table">
        <thead>
            <tr>
                <th style="width:30%">Caratteristica</th>
                <th style="width:15%">Valutazione</th>
                <th style="width:55%">Esempi di Indagine Clinica</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2"><strong>1. Insorgenza acuta e andamento fluttuante</strong><br><em>C'è stato un cambiamento acuto nello stato mentale del paziente rispetto alla sua situazione di base?</em></td>
                <td style="background:#f8d7da;font-weight:bold;">PRESENTE</td>
                <td><strong>Domande da porre ai familiari/caregiver:</strong><br>• "Come era il paziente una settimana fa rispetto ad oggi?"<br>• "Ha notato cambiamenti nel comportamento nelle ultime 24-48 ore?"<br>• "I sintomi vanno e vengono durante il giorno?"<br>• "C'è stata confusione che prima non c'era?"</td>
            </tr>
            <tr>
                <td style="background:#d4edda;font-weight:bold;">ASSENTE</td>
                <td>Nessun cambiamento significativo, comportamento stabile rispetto al baseline</td>
            </tr>

            <tr>
                <td rowspan="2"><strong>2. Perdita dell'attenzione</strong><br><em>Il paziente presenta difficoltà nel concentrare la sua attenzione, per esempio è facilmente distraibile, non riesce a mantenere il filo del discorso ecc.?</em></td>
                <td style="background:#f8d7da;font-weight:bold;">PRESENTE</td>
                <td><strong>Osservazioni cliniche:</strong><br>• Si distrae facilmente durante la conversazione<br>• Difficoltà a seguire comandi semplici<br>• Perde il filo del discorso<br>• Non riesce a mantenere l'attenzione su una task<br><strong>Test:</strong> Può usare test delle lettere (4AT) o digits span</td>
            </tr>
            <tr>
                <td style="background:#d4edda;font-weight:bold;">ASSENTE</td>
                <td>Attenzione normale, riesce a seguire la conversazione e i comandi</td>
            </tr>

            <tr>
                <td rowspan="2"><strong>3. Disorganizzazione del pensiero</strong><br><em>Il pensiero del paziente è disorganizzato e incoerente, passa da un argomento all'altro senza filo logico, in modo imprevedibile?</em></td>
                <td style="background:#f8d7da;font-weight:bold;">PRESENTE</td>
                <td><strong>Evidenze di pensiero disorganizzato:</strong><br>• Conversazione incoerente o sconnessa<br>• Flusso di idee poco chiaro o illogico<br>• Passa da un argomento all'altro senza logica<br>• Risposte inappropriate alle domande<br>• Discorso confuso o frammentario</td>
            </tr>
            <tr>
                <td style="background:#d4edda;font-weight:bold;">ASSENTE</td>
                <td>Pensiero organizzato e coerente, conversazione logica</td>
            </tr>

            <tr>
                <td rowspan="2"><strong>4. Alterato livello di coscienza</strong><br><em>0=vigile 1=iperallerta, letargia, stupor, coma</em></td>
                <td style="background:#f8d7da;font-weight:bold;">ALTERATO</td>
                <td><strong>Livelli di coscienza alterati:</strong><br>• <strong>Iperallerta:</strong> Ipervigilante, facilmente allarmabile<br>• <strong>Letargia:</strong> Soporoso ma risvegliabile alla voce<br>• <strong>Stupor:</strong> Difficile da risvegliare, risponde poco<br>• <strong>Coma:</strong> Non responsivo agli stimoli verbali</td>
            </tr>
            <tr>
                <td style="background:#d4edda;font-weight:bold;">NORMALE</td>
                <td><strong>Vigile:</strong> Livello di coscienza normale, appropriatamente allerta</td>
            </tr>
        </tbody>
    </table>

    <div class="interpretation-box">
        <h3>📊 Interpretazione Algoritmo CAM</h3>
        <div class="row" style="display:flex;gap:2rem;margin-top:1.5rem;">
            <div style="flex:1;">
                <div class="alert alert-success">
                    <h4>✅ DELIRIUM PRESENTE</h4>
                    <p><strong>Se sono soddisfatti:</strong></p>
                    <ul style="margin:0.5rem 0;">
                        <li>Caratteristica 1: PRESENTE</li>
                        <li>Caratteristica 2: PRESENTE</li>
                        <li>Caratteristica 3 O 4: PRESENTE</li>
                    </ul>
                </div>
            </div>
            <div style="flex:1;">
                <div class="alert alert-warning" style="background:#f8d7da;border-color:#dc3545;">
                    <h4>❌ DELIRIUM ASSENTE</h4>
                    <p><strong>Se manca anche solo uno di:</strong></p>
                    <ul style="margin:0.5rem 0;">
                        <li>Caratteristica 1</li>
                        <li>Caratteristica 2</li>
                        <li>Entrambe Caratteristiche 3 e 4</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-info">
        <h4>📋 Performance Diagnostica CAM</h4>
        <div style="display:flex;gap:2rem;margin-top:1rem;">
            <div><strong>Sensibilità:</strong> 94-100%</div>
            <div><strong>Specificità:</strong> 90-95%</div>
            <div><strong>Tempo di somministrazione:</strong> 5-10 minuti</div>
        </div>
    </div>

    <div class="alert alert-warning">
        <h4>⚠️ Note Importanti per la Valutazione</h4>
        <ul>
            <li><strong>Caratteristica 1:</strong> Richiede sempre informazioni da fonti esterne (famiglia, caregiver, documentazione)</li>
            <li><strong>Caratteristiche 2-4:</strong> Valutabili attraverso osservazione diretta durante la visita</li>
            <li><strong>Timing:</strong> Il delirium può fluttuare, considerare rivalutazioni multiple</li>
            <li><strong>Sottotipi:</strong> Considerare delirium ipoattivo (meno evidente ma presente)</li>
        </ul>
    </div>

    <div class="text-center mt-4 no-print">
        <button class="btn btn-outline-primary" onclick="printCAMTemplate()"><i class="fas fa-print me-2"></i>Stampa Template Vuoto</button>
    </div>
</div>
<script>
function printCAMTemplate() {
    const templateWindow = window.open('', '_blank', 'width=800,height=1200');
    templateWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>CAM - Template Vuoto</title>
            <style>
                @page { margin: 1.5cm; size: A4; }
                body {
                    font-family: 'Courier New', monospace;
                    margin: 0;
                    font-size: 11px;
                    line-height: 1.3;
                }
                .header {
                    text-align: center;
                    margin-bottom: 1cm;
                    border: 2px solid #000;
                    padding: 0.5rem;
                }
                .section {
                    border: 1px solid #000;
                    margin-bottom: 0.8cm;
                    padding: 0.8rem;
                }
                .algorithm {
                    border: 3px double #000;
                    margin: 1cm 0;
                    padding: 1rem;
                    text-align: center;
                    background: #f5f5f5;
                }
                .checkbox {
                    display: inline-block;
                    width: 12px;
                    height: 12px;
                    border: 1.5px solid #000;
                    margin-right: 6px;
                    vertical-align: middle;
                }
                .line {
                    border-bottom: 1px solid #000;
                    display: inline-block;
                    min-width: 150px;
                    margin: 0 3px;
                }
                h2, h3 { margin: 0.3rem 0; }
                .actions {
                    border: 1px solid #000;
                    padding: 0.8rem;
                    margin-top: 0.5cm;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h2>CAM - CONFUSION ASSESSMENT METHOD</h2>
                <h3>Algoritmo Diagnostico per Delirium</h3>
                <p>Nome: <span class="line"></span> Data: <span class="line"></span> Ora: <span class="line"></span></p>
                <p>Età: <span class="line"></span> Reparto: <span class="line"></span> Valutatore: <span class="line"></span></p>
            </div>

            <div class="section">
                <h3>CARATTERISTICA 1: INSORGENZA ACUTA E ANDAMENTO FLUTTUANTE</h3>
                <p>C'è stato un cambiamento acuto nello stato mentale rispetto alla baseline?</p>
                <p>Fonti: <span class="checkbox"></span>Familiari <span class="checkbox"></span>Caregiver <span class="checkbox"></span>Documentazione <span class="checkbox"></span>Staff</p>
                <p><span class="checkbox"></span> ASSENTE <span class="checkbox"></span> PRESENTE</p>
                <p>Note: <span class="line" style="min-width: 400px;"></span></p>
            </div>

            <div class="section">
                <h3>CARATTERISTICA 2: PERDITA DELL'ATTENZIONE</h3>
                <p>Difficoltà nel concentrare l'attenzione? Facilmente distraibile?</p>
                <p><span class="checkbox"></span> ASSENTE <span class="checkbox"></span> PRESENTE</p>
                <p>Note: <span class="line" style="min-width: 400px;"></span></p>
            </div>

            <div class="section">
                <h3>CARATTERISTICA 3: DISORGANIZZAZIONE DEL PENSIERO</h3>
                <p>Pensiero disorganizzato? Passa da argomento ad argomento senza logica?</p>
                <p><span class="checkbox"></span> ASSENTE <span class="checkbox"></span> PRESENTE</p>
                <p>Note: <span class="line" style="min-width: 400px;"></span></p>
            </div>

            <div class="section">
                <h3>CARATTERISTICA 4: ALTERATO LIVELLO DI COSCIENZA</h3>
                <p>Livello di coscienza diverso da "normale/allerta"?</p>
                <p><span class="checkbox"></span> NORMALE (vigile) <span class="checkbox"></span> ALTERATO</p>
                <p>Specificare: <span class="line" style="min-width: 300px;"></span></p>
            </div>

            <div class="algorithm">
                <h3>ALGORITMO DIAGNOSTICO CAM</h3>
                <p><strong>(Caratteristica 1 E Caratteristica 2) E (Caratteristica 3 O Caratteristica 4)</strong></p>
                <br>
                <p>Caratteristica 1: <span class="checkbox"></span>Presente <span class="checkbox"></span>Assente</p>
                <p>Caratteristica 2: <span class="checkbox"></span>Presente <span class="checkbox"></span>Assente</p>
                <p>Caratteristica 3: <span class="checkbox"></span>Presente <span class="checkbox"></span>Assente</p>
                <p>Caratteristica 4: <span class="checkbox"></span>Presente <span class="checkbox"></span>Assente</p>
                <br>
                <h3>RISULTATO:</h3>
                <p><span class="checkbox"></span> DELIRIUM PRESENTE <span class="checkbox"></span> DELIRIUM ASSENTE</p>
            </div>

            <div class="actions">
                <h3>AZIONI SUCCESSIVE (se delirium presente):</h3>
                <p><span class="checkbox"></span>Identificare cause scatenanti <span class="checkbox"></span>Revisione farmaci</p>
                <p><span class="checkbox"></span>Interventi non farmacologici <span class="checkbox"></span>Monitoraggio frequente</p>
                <p>Prossima rivalutazione: <span class="line"></span></p>
                <p>Note: <span class="line" style="min-width: 400px;"></span></p>
            </div>

            <div style="margin-top: 1cm; border-top: 1px solid #000; padding-top: 0.5rem;">
                <p>Valutatore: <span class="line"></span> Firma: <span class="line"></span> Data/Ora: <span class="line"></span></p>
            </div>
        </body>
        </html>
    `);
    templateWindow.document.close();
    setTimeout(() => {
        templateWindow.print();
        templateWindow.close();
    }, 250);
}
</script>
</body>
</html>
