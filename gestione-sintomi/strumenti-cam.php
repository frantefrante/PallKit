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
        .code-block{background:#2d3748;color:#e2e8f0;padding:1rem;border-radius:10px;overflow-x:auto;font-family:'Courier New',monospace;}
        .example-case{background:#fff;border:2px solid #e9ecef;border-radius:12px;padding:1.5rem;margin:1rem 0;border-left:5px solid var(--delirium-primary);}
    </style>
</head>
<body>
<div class="container my-4">
    <div class="mb-3">
        <a href="index.php" class="btn btn-success me-2"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
        <a href="delirium.php" class="btn btn-outline-secondary" style="border-color:#6f42c1;color:#6f42c1;"><i class="fas fa-arrow-left me-2"></i>Torna a Delirium</a>
    </div>

    <h1 class="mb-4">🔍 CAM - Algoritmo Diagnostico</h1>
    <div class="algorithm-box">
        <h2 class="h5 mb-3">Delirium presente se:</h2>
        <p>(Caratteristica 1 <strong>E</strong> Caratteristica 2) <strong>E</strong> (Caratteristica 3 <strong>O</strong> Caratteristica 4)</p>
    </div>

    <div class="code-block mb-4">
function calculateCAMDiagnosis(features) {
    const f1 = features[1];
    const f2 = features[2];
    const f3 = features[3];
    const f4 = features[4];
    const deliriumPresent = f1 && f2 && (f3 || f4);
    return deliriumPresent ? "DELIRIUM PRESENTE" : "DELIRIUM ASSENTE";
}
    </div>

    <h2 class="h5 mt-4">📋 Esempi Clinici</h2>
    <div class="example-case">
        <strong>Caso 1: Post-operatorio</strong>
        <ul class="mb-0"><li>F1 Presente</li><li>F2 Presente</li><li>F3 Assente</li><li>F4 Presente</li></ul>
        <div class="alert alert-success mt-2 mb-0">Risultato: DELIRIUM PRESENTE</div>
    </div>
    <div class="example-case">
        <strong>Caso 2: Demenza stabilizzata</strong>
        <ul class="mb-0"><li>F1 Assente</li><li>F2 Presente</li><li>F3 Presente</li><li>F4 Assente</li></ul>
        <div class="alert alert-warning mt-2 mb-0">Risultato: DELIRIUM ASSENTE</div>
    </div>
    <div class="example-case">
        <strong>Caso 3: Infezione urinaria</strong>
        <ul class="mb-0"><li>F1 Presente</li><li>F2 Presente</li><li>F3 Presente</li><li>F4 Assente</li></ul>
        <div class="alert alert-success mt-2 mb-0">Risultato: DELIRIUM PRESENTE</div>
    </div>

    <div class="alert alert-info mt-4">
        <strong>Tips:</strong>
        <ul class="mb-0"><li>Raccogliere informazioni da familiari/caregiver</li><li>Osservare il paziente durante tutto l'incontro</li><li>Distinguere i cambiamenti acuti dalla demenza</li></ul>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-outline-primary" onclick="printCAMTemplate()"><i class="fas fa-print me-2"></i>Stampa Template Vuoto</button>
    </div>
</div>
<script>
function printCAMTemplate(){
    const w=window.open('', '_blank');
    w.document.write(`<!DOCTYPE html><html><head><title>CAM - Template Vuoto</title><style>body{font-family:'Courier New',monospace;margin:2cm;font-size:12px;line-height:1.4;}h1{text-align:center;}@page{margin:1.5cm;} .section{margin-top:1.5cm;} .checkbox{display:inline-block;width:15px;height:15px;border:2px solid #000;margin-right:6px;}</style></head><body>`);
    w.document.write('<h1>CAM - Confusion Assessment Method</h1><p>Nome: ____________ Data: ____________</p>');
    w.document.write('<div class="section"><strong>1. Esordio acuto e corso fluttuante</strong><br><span class="checkbox"></span>Assente <span class="checkbox"></span>Presente</div>');
    w.document.write('<div class="section"><strong>2. Disattenzione</strong><br><span class="checkbox"></span>Assente <span class="checkbox"></span>Presente</div>');
    w.document.write('<div class="section"><strong>3. Pensiero disorganizzato</strong><br><span class="checkbox"></span>Assente <span class="checkbox"></span>Presente</div>');
    w.document.write('<div class="section"><strong>4. Livello di coscienza alterato</strong><br><span class="checkbox"></span>Normale <span class="checkbox"></span>Alterato</div>');
    w.document.write('<div class="section"><strong>Algoritmo:</strong> (1 e 2) e (3 o 4)<br><span class="checkbox"></span>Delirium presente<br><span class="checkbox"></span>Delirium assente</div>');
    w.document.write('</body></html>');
    w.document.close();
    w.print();
}
</script>
</body>
</html>
