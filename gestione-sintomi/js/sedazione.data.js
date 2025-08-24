// js/sedazione.data.js - LINEE GUIDA SICP 2023
// Calcolatore Sedazione Palliativa basato su Linee Guida SICP 2023 SSN Italiano

window.schemiSedazione = [
  {
    nome: "Midazolam",
    visibile: true,
    prima_scelta: true,
    classe: "Benzodiazepina",
    vie: ["EV", "SC"],
    induzione: {
      bolo: {
        dose: "0,5-5 mg",
        dose_kg: "0,01-0,1 mg/kg",
        vie: {
          "EV": { onset: "2-5 min" },
          "SC": { onset: "10-15 min" }
        }
      },
      bolo_refratto: {
        "EV": { dose: "0,5-1 mg", intervallo: "1 min" },
        "SC": { dose: "2,5-5 mg", intervallo: "5-10 min" }
      },
      infusione: {
        dose: "0,2-5 mg/h",
        dose_kg: "0,02-0,1 mg/kg/h",
        esempio_70kg: "1,4-7 mg/h (per 70 kg)",
        incremento: "0,7 mg/h",
        unita: "mg/h"
      }
    },
    mantenimento: {
      infusione: {
        dose: "0,5-10 mg/h",
        dose_kg: "0,03-0,2 mg/kg/h",
        esempio_70kg: "2,1-14 mg/h (per 70 kg)",
        unita: "mg/h"
      },
      boli_fissi: {
        dose: "5-7,5 mg",
        intervallo: "4 ore",
        vie: ["SC", "EV"]
      },
      rescue: {
        dose: "1-5 mg (max 10 mg)",
        vie: {
          "EV": { onset: "1-5 min" },
          "SC": { onset: "10-15 min" }
        }
      }
    },
    note: "Benzodiazepina a rapido effetto e breve emivita: ampia variabilità interindividuale e potenziale rischio di tachifilassi",
    warning: "Se dose ≥ 20 mg/ora in infusione: valutare sostituzione o aggiunta secondo farmaco sedativo",
    indicazione: "Prima scelta secondo Indicazione 3A-5"
  },
  {
    nome: "Clorpromazina",
    visibile: true,
    prima_scelta: false,
    classe: "Neurolettico fenotiazinico",
    vie: ["IV", "IM"],
    induzione: {
      bolo: {
        dose: "25-50 mg",
        vie: {
          "IV": { onset: "15-30 min" },
          "IM": { onset: "15-30 min" }
        }
      }
    },
    mantenimento: {
      bolo_refratto: {
        dose: "25-50 mg",
        intervallo: "secondo necessità",
        vie: {
          "IV": { onset: "15-30 min" },
          "IM": { onset: "15-30 min" }
        }
      }
    },
    note: "Neurolettico fenotiazinico utilizzabile in integrazione ad una benzodiazepina per controllo agitazione psicomotoria/delirium",
    warning: "Somministrazione EV: infondere lentamente"
  },
  {
    nome: "Lorazepam",
    visibile: true,
    prima_scelta: false,
    classe: "Benzodiazepina",
    vie: ["IV", "SC"],
    induzione: {
      bolo: {
        dose: "0,5-4 mg",
        dose_kg: "0,01-0,06 mg/kg",
        vie: {
          "IV": { onset: "15-30 min" },
          "SC": { onset: "15-30 min" }
        }
      }
    },
    mantenimento: {
      bolo_refratto: {
        dose: "0,5-4 mg",
        intervallo: "secondo necessità clinica",
        vie: {
          "IV": { onset: "15-30 min" },
          "SC": { onset: "15-30 min" }
        }
      }
    },
    note: "Benzodiazepina con inizio azione più lento rispetto a midazolam. Buona maneggevolezza in boli refratti, bassa variabilità interindividuale",
    warning: "Somministrazione EV: infondere 2 mg/minuto"
  },
  {
    nome: "Diazepam",
    visibile: true,
    prima_scelta: false,
    classe: "Benzodiazepina",
    vie: ["IV", "IM"],
    induzione: {
      bolo: {
        dose: "5-10 mg",
        dose_kg: "0,07-0,15 mg/kg",
        vie: {
          "IV": { onset: "1-5 min" },
          "IM": { onset: "15-30 min" }
        }
      }
    },
    mantenimento: {
      bolo_refratto: {
        dose: "5-10 mg",
        intervallo: "secondo necessità",
        vie: {
          "IV": { onset: "variabile" },
          "IM": { onset: "variabile" }
        }
      }
    },
    note: "Benzodiazepina a rapido effetto ma lunga emivita. Facilmente titolabile con ampia variabilità interindividuale",
    warning: "Non indicato per via sottocutanea - Infondere 5 mg/minuto"
  },
  {
    nome: "Aloperidolo",
    visibile: true,
    prima_scelta: false,
    classe: "Neurolettico butirrofenonico",
    vie: ["IV", "SC", "IM"],
    induzione: {
      bolo: {
        dose: "2-5 mg",
        vie: {
          "IV": { onset: "15-30 min" },
          "SC": { onset: "15-30 min" },
          "IM": { onset: "15-30 min" }
        }
      }
    },
    mantenimento: {
      bolo_refratto: {
        dose: "2-5 mg",
        intervallo: "per delirium/agitazione/nausea",
        vie: {
          "SC": { onset: "15-30 min" },
          "IM": { onset: "15-30 min" }
        }
      }
    },
    note: "Neurolettico butirrofenonico da mantenere/aggiungere a benzodiazepina in caso di agitazione psicomotoria/delirium o nausea",
    warning: "Controindicato EV in scheda tecnica per rischio aritmie ventricolari"
  },
  {
    nome: "Morfina",
    visibile: true,
    prima_scelta: false,
    classe: "Oppiaceo",
    vie: ["IV", "SC", "EV"],
    induzione: {
      bolo: {
        dose_kg: "0,1-0,2 mg/kg",
        vie: {
          "IV": { onset: "5-10 min" },
          "EV": { onset: "5-10 min" },
          "SC": { onset: "10-15 min" }
        }
      }
    },
    mantenimento: {
      infusione: {
        dose: "dose individualizzata",
        note: "secondo controllo sintomi",
        vie: {
          "IV": { onset: "continuo" },
          "SC": { onset: "continuo" },
          "EV": { onset: "continuo" }
        }
      }
    },
    note: "Oppiaceo da mantenere o associare sempre a benzodiazepina/sedativo. Non esiste dose tetto predefinita",
    warning: "Non utilizzare a scopo sedativo - Nei pazienti già in terapia: dose bolo 10-20% della dose/24h"
  }
];

// Funzioni di supporto per calcoli
window.sedazioneCalculator = {
  // Aggiustamento dose per età
  adjustForAge: function(dose, age) {
    if (age > 75) {
      return dose * 0.75; // Riduzione 25%
    }
    return dose;
  },
  
  // Aggiustamento dose per funzione renale
  adjustForRenal: function(dose, renalFunction) {
    if (renalFunction === 'severe') {
      return dose * 0.5; // Riduzione 50%
    }
    return dose;
  },
  
  // Aggiustamento dose per stato generale
  adjustForCondition: function(dose, condition) {
    if (condition === 'critical') {
      return dose * 0.5; // Riduzione 50%
    }
    return dose;
  },
  
  // Calcolo dose basata su peso
  calculateWeightBasedDose: function(dosePerKg, weight) {
    // Estrae i numeri dalla stringa (es. "0,01-0,1 mg/kg")
    const cleaned = dosePerKg.replace(/[^0-9,\-\.]/g, ''); // rimuove tutto tranne numeri, virgole, punti e trattini
    const [min, max] = cleaned.split('-').map(d => parseFloat(d.replace(',', '.')));
    return {
      min: (min * weight).toFixed(2),
      max: (max * weight).toFixed(2)
    };
  },
  
  // Parsing dose range
  parseDoseRange: function(doseString) {
    const match = doseString.match(/([\d,]+(?:\.[\d,]+)?)-?([\d,]+(?:\.[\d,]+)?)/);
    if (match) {
      return {
        min: parseFloat(match[1].replace(',', '.')),
        max: parseFloat((match[2] || match[1]).replace(',', '.'))
      };
    }
    return null;
  }
};