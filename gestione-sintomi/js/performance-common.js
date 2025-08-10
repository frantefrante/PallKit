window.performanceTools = window.performanceTools || {};

function updateProgress(toolId, percentage){
  const bar = document.getElementById(`${toolId}-progress`);
  const text = document.getElementById(`${toolId}-progress-text`);
  if(bar) bar.style.width = percentage + '%';
  if(text) text.textContent = percentage + '%';
}

function generateReportContent(toolId, score, patient, date, interpretation, description){
  return `REPORT ${toolId.toUpperCase()}\nPunteggio: ${score}\nPaziente: ${patient}\nData: ${date}\nInterpretazione: ${interpretation}\n${description}`;
}

function generatePrintTemplate(toolId){
  return `<!DOCTYPE html><html lang="it"><head><meta charset="UTF-8"><title>${toolId}</title></head><body><h1>${toolId.toUpperCase()} Template</h1></body></html>`;
}

function printPerformanceTemplate(toolId){
  const html = generatePrintTemplate(toolId);
  const w = window.open('');
  if(w){ w.document.write(html); w.document.close(); w.print(); }
}

window.performanceTools.updateProgress = updateProgress;
window.performanceTools.generateReportContent = generateReportContent;
window.performanceTools.generatePrintTemplate = generatePrintTemplate;
window.performanceTools.printPerformanceTemplate = printPerformanceTemplate;
