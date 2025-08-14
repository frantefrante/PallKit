<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4AT - Scala di Riferimento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="css/delirium.css" rel="stylesheet">
    <style>
        .scale-table{width:100%;border-collapse:collapse;margin:1.5rem 0;border-radius:10px;overflow:hidden;box-shadow:0 3px 15px rgba(0,0,0,0.1);} 
        .scale-table th{background:var(--delirium-primary);color:#fff;padding:1rem;font-weight:600;text-align:left;} 
        .scale-table td{padding:0.8rem 1rem;border-bottom:1px solid #e9ecef;} 
        .scale-table tbody tr:nth-child(even){background:#f8f9fa;} 
        .interpretation-box{background:linear-gradient(135deg,#f8f9fa,#e9ecef);border-radius:12px;padding:1.5rem;border:2px solid var(--delirium-light);} 
        .glossary-term{background:#fff;border:2px solid #e9ecef;border-radius:10px;padding:1.5rem;margin:1rem 0;} 
    </style>
</head>
<body>
<div class="container my-4">
    <div class="mb-3">
        <a href="index.php" class="btn btn-success me-2"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
        <a href="delirium.php" class="btn btn-outline-secondary" style="border-color:#6f42c1;color:#6f42c1;"><i class="fas fa-arrow-left me-2"></i>Torna a Delirium</a>
    </div>

    <h1 class="mb-4">📊 4AT - Scala di Riferimento Completa</h1>
    <table class="scale-table">
        <thead>
            <tr><th>Parametro</th><th>Punteggio</th><th>Descrizione</th></tr>
        </thead>
        <tbody>
            <tr><td rowspan="3"><strong>[1] Vigilanza</strong><br><em>Valutare lo stato di vigilanza del paziente</em></td><td style="background:#d4edda;font-weight:bold;">0</td><td>Normale, completamente vigile</td></tr>
            <tr><td style="background:#d4edda;font-weight:bold;">0</td><td>Moderata sonnolenza &lt;10 sec dopo il risveglio</td></tr>
            <tr><td style="background:#f8d7da;font-weight:bold;">4</td><td>Iperattivo, agitato o marcatamente soporoso</td></tr>
            <tr><td rowspan="3"><strong>[2] AMT4</strong><br><em>Età, data di nascita, luogo, anno corrente</em></td><td style="background:#d4edda;font-weight:bold;">0</td><td>Nessun errore</td></tr>
            <tr><td style="background:#fff3cd;font-weight:bold;">1</td><td>1 errore</td></tr>
            <tr><td style="background:#f8d7da;font-weight:bold;">2</td><td>2+ errori / non testabile</td></tr>
            <tr><td rowspan="3"><strong>[3] Attenzione</strong><br><em>Test lettere o mesi all'indietro</em></td><td style="background:#d4edda;font-weight:bold;">0</td><td>7 o più mesi corretti</td></tr>
            <tr><td style="background:#fff3cd;font-weight:bold;">1</td><td>Meno di 7 mesi / rifiuta di iniziare</td></tr>
            <tr><td style="background:#f8d7da;font-weight:bold;">2</td><td>Non testabile</td></tr>
            <tr><td rowspan="2"><strong>[4] Cambiamento acuto o fluttuante</strong></td><td style="background:#d4edda;font-weight:bold;">0</td><td>No</td></tr>
            <tr><td style="background:#f8d7da;font-weight:bold;">4</td><td>Sì, cambiamento nelle ultime 2 settimane e ancora presente</td></tr>
        </tbody>
    </table>

    <div class="interpretation-box mb-4">
        <h3 class="h5 mb-3">📈 Interpretazione Punteggi</h3>
        <div class="alert alert-success"><strong>&ge;4:</strong> Possibile delirium ± deficit cognitivo</div>
        <div class="alert alert-warning"><strong>1-3:</strong> Possibile deterioramento cognitivo, richiede valutazione</div>
        <div class="alert alert-info"><strong>0:</strong> Delirium improbabile</div>
    </div>

    <h2 class="mt-5">📚 Glossario di Utilizzo</h2>
    <div class="glossary-term">
        <h4>Vigilanza (Alertness)</h4>
        <p>Livello di coscienza e reattività del paziente agli stimoli.</p>
    </div>
    <div class="glossary-term">
        <h4>AMT4</h4>
        <p>Breve test cognitivo: età, data di nascita, luogo, anno corrente.</p>
    </div>
    <div class="glossary-term">
        <h4>Test di Attenzione</h4>
        <p>Sequenza di lettere (SAVEAHAART) o mesi dell'anno all'indietro.</p>
    </div>
    <div class="glossary-term">
        <h4>Cambiamento Acuto o Fluttuante</h4>
        <p>Variazioni cognitive o comportamentali nelle ultime 2 settimane.</p>
    </div>

    <div class="alert alert-warning mt-4">
        <strong>Limitazioni:</strong>
        <ul class="mb-0"><li>Strumento di screening, non diagnostico</li><li>Adattare per barriere linguistiche o sensoriali</li><li>Pazienti non testabili: assegnare punteggi massimi</li></ul>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-outline-primary" onclick="print4ATTemplate()"><i class="fas fa-print me-2"></i>Stampa Template Vuoto</button>
    </div>
</div>
<script>
function print4ATTemplate(){
    const w=window.open('', '_blank');
    w.document.write(`<!DOCTYPE html><html><head><title>4AT - Template Vuoto</title><style>body{font-family:Arial,sans-serif;margin:2cm;font-size:12px;line-height:1.4;}h1{text-align:center;} .section{margin-top:1.5cm;} .checkbox{display:inline-block;width:18px;height:18px;border:2px solid #000;margin-right:8px;} @page{margin:1.5cm;}</style></head><body>`);
    w.document.write('<h1>4AT - 4 \u201cA\u2019s Test</h1><p>Paziente: ____________ Data: ____________</p>');
    w.document.write('<div class="section"><strong>1. Vigilanza</strong><br><span class="checkbox"></span>0 Normale<br><span class="checkbox"></span>0 Moderata sonnolenza<br><span class="checkbox"></span>4 Alterata</div>');
    w.document.write('<div class="section"><strong>2. AMT4</strong><br><span class="checkbox"></span>0 Nessun errore<br><span class="checkbox"></span>1 1 errore<br><span class="checkbox"></span>2 2+ errori / non testabile</div>');
    w.document.write('<div class="section"><strong>3. Attenzione</strong><br><span class="checkbox"></span>0 7+ mesi corretti<br><span class="checkbox"></span>1 &lt;7 mesi / rifiuta<br><span class="checkbox"></span>2 Non testabile</div>');
    w.document.write('<div class="section"><strong>4. Cambiamento acuto</strong><br><span class="checkbox"></span>0 No<br><span class="checkbox"></span>4 Sì</div>');
    w.document.write('<div class="section"><strong>Punteggio Totale: ___/12</strong><br>0: delirium improbabile | 1-3: possibile deterioramento | ≥4: possibile delirium</div>');
    w.document.write('</body></html>');
    w.document.close();
    w.print();
}
</script>
</body>
</html>
