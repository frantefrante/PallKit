// js/sedazione.data.js
// Definiamo schemiSedazione come variabile globale

window.schemiSedazione = [
  {
    nome: "Midazolam",
    visibile: true,
    vie: ["EV", "SC"],
    induzione: {
      bolo_per_via: {
        "EV": "0,5–5 mg EV (0,01–0,1 mg/kg)",
        "SC": "0,5–5 mg SC (0,01–0,1 mg/kg)"
      },
      inizio_azione: {
        EV: "2–5 min",
        SC: "10–15 min"
      },
      refratto: {
        dose_media: {
          EV: "0,5–1 mg",
          SC: "2,5–5 mg"
        },
        intervallo: {
          EV: "1 min",
          SC: "5–10 min"
        }
      },
      inf_cont: {
        dose_media: "0,2–5 mg/ora",
        incremento: "0,7 mg/ora",
        posologia_kg: "0,02–0,1 mg/kg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "0,5–10 mg/ora",
        posologia_kg: "0,03–0,2 mg/kg/ora"
      },
      bolo_fissi: {
        dose: "5–7,5 mg SC/EV",
        intervallo: "4 ore"
      },
      rescue: {
        dose_media: {
          EV: "1–5 mg (max 10 mg)",
          SC: "1–5 mg (max 10 mg)"
        },
        inizio_azione: {
          EV: "1–5 min",
          SC: "10–15 min"
        }
      }
    },
    note: "Emivita breve; titolazione oraria"
  },
  {
    nome: "Levomepromazina",
    visibile: false,
    vie: ["SC"],
    induzione: {
      bolo_per_via: {
        "SC": "12,5–25 mg SC"
      },
      inizio_azione: {
        SC: "15–30 min"
      },
      refratto: {
        dose_media: {
          SC: "12,5 mg"
        },
        intervallo: {
          SC: "10–15 min"
        }
      },
      inf_cont: {
        dose_media: "6–12,5 mg/ora",
        incremento: "2,5 mg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "6–12,5 mg/ora"
      },
      bolo_fissi: {
        dose: "12,5 mg SC",
        intervallo: "6–8 ore"
      },
      rescue: {
        dose_media: {
          SC: "6,25–12,5 mg"
        },
        inizio_azione: {
          SC: "15–30 min"
        }
      }
    },
    note: "Efficace su delirium refrattario"
  },
  {
    nome: "Fenobarbital",
    visibile: false,
    vie: ["IV", "SC", "IM"],
    induzione: {
      bolo_per_via: {
        "IV": "100–300 mg IV",
        "SC": "100–300 mg SC",
        "IM": "100–300 mg IM"
      },
      inizio_azione: {
        IV: "5–15 min",
        SC: "15–30 min",
        IM: "15–30 min"
      },
      refratto: {
        dose_media: {
          IV: "50–100 mg",
          SC: "50–100 mg",
          IM: "50–100 mg"
        },
        intervallo: {
          IV: "15–30 min",
          SC: "15–30 min",
          IM: "15–30 min"
        }
      },
      inf_cont: {
        dose_media: "0,5–2 mg/kg/ora",
        incremento: "0,5 mg/kg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "0,5–2 mg/kg/ora"
      },
      bolo_fissi: {
        dose: "100 mg IV/SC/IM",
        intervallo: "8 ore"
      },
      rescue: {
        dose_media: {
          IV: "50 mg",
          SC: "50 mg",
          IM: "50 mg"
        },
        inizio_azione: {
          IV: "15–30 min",
          SC: "15–30 min",
          IM: "15–30 min"
        }
      }
    },
    note: "Barbiturico a lunga emivita; monitorare respiro"
  },
  {
    nome: "Propofol",
    visibile: false,
    vie: ["IV"],
    induzione: {
      bolo_per_via: {
        "IV": "0,5–2 mg/kg IV"
      },
      inizio_azione: {
        IV: "30–60 sec"
      },
      refratto: {
        dose_media: {
          IV: "0,5–1 mg/kg"
        },
        intervallo: {
          IV: "1–2 min"
        }
      },
      inf_cont: {
        dose_media: "0,5–4 mg/kg/ora",
        incremento: "0,5 mg/kg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "0,5–4 mg/kg/ora"
      },
      bolo_fissi: {
        dose: "Non previsto",
        intervallo: ""
      },
      rescue: {
        dose_media: {
          IV: "0,5–1 mg/kg"
        },
        inizio_azione: {
          IV: "1–2 min"
        }
      }
    },
    note: "Anestetico ultrarapido; pressione"
  },
  {
    nome: "Clorpromazina",
    visibile: true,
    vie: ["IV", "IM"],
    induzione: {
      bolo_per_via: {
        "IV": "25–50 mg IV",
        "IM": "25–50 mg IM"
      },
      inizio_azione: {
        IV: "15–30 min",
        IM: "15–30 min"
      },
      refratto: {
        dose_media: {
          IV: "12,5–25 mg",
          IM: "12,5–25 mg"
        },
        intervallo: {
          IV: "15–30 min",
          IM: "15–30 min"
        }
      },
      inf_cont: {
        dose_media: "1–12,5 mg/ora",
        incremento: "2,5 mg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "1–12,5 mg/ora"
      },
      bolo_fissi: {
        dose: "25 mg IV/IM",
        intervallo: "6–8 ore"
      },
      rescue: {
        dose_media: {
          IV: "12,5 mg",
          IM: "12,5 mg"
        },
        inizio_azione: {
          IV: "15–30 min",
          IM: "15–30 min"
        }
      }
    },
    note: "Fenotiazinico; EV lento"
  },
  {
    nome: "Lorazepam",
    visibile: true,
    vie: ["IV", "SC"],
    induzione: {
      bolo_per_via: {
        "IV": "0,5–4 mg IV",
        "SC": "0,5–4 mg SC"
      },
      inizio_azione: {
        IV: "15–30 min",
        SC: "15–30 min"
      },
      refratto: {
        dose_media: {
          IV: "0,5–1 mg",
          SC: "0,5–1 mg"
        },
        intervallo: {
          IV: "15–30 min",
          SC: "15–30 min"
        }
      },
      inf_cont: {
        dose_media: "0,15–4 mg/ora",
        incremento: "0,5 mg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "0,15–4 mg/ora"
      },
      bolo_fissi: {
        dose: "1–2 mg IV/SC",
        intervallo: "4–6 ore"
      },
      rescue: {
        dose_media: {
          IV: "0,5–1 mg",
          SC: "0,5–1 mg"
        },
        inizio_azione: {
          IV: "15–30 min",
          SC: "15–30 min"
        }
      }
    },
    note: "Benzodiazepina lento onset; rescues frequenti"
  },
  {
    nome: "Diazepam",
    visibile: true,
    vie: ["IV", "IM"],
    induzione: {
      bolo_per_via: {
        "IV": "5–10 mg IV",
        "IM": "5–10 mg IM"
      },
      inizio_azione: {
        IV: "1–5 min",
        IM: "15–30 min"
      },
      refratto: {
        dose_media: {
          IV: "2,5–5 mg",
          IM: "2,5–5 mg"
        },
        intervallo: {
          IV: "15–30 min",
          IM: "15–30 min"
        }
      },
      inf_cont: {
        dose_media: "0,02–0,05 mg/kg/ora",
        incremento: "0,01 mg/kg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "0,02–0,05 mg/kg/ora"
      },
      bolo_fissi: {
        dose: "5 mg IV/IM",
        intervallo: "6–8 ore"
      },
      rescue: {
        dose_media: {
          IV: "2,5 mg",
          IM: "2,5 mg"
        },
        inizio_azione: {
          IV: "15–30 min",
          IM: "15–30 min"
        }
      }
    },
    note: "Benzodiazepina a lunga emivita"
  },
  {
    nome: "Aloperidolo",
    visibile: true,
    vie: ["IV", "SC", "IM"],
    induzione: {
      bolo_per_via: {
        "IV": "2–5 mg IV",
        "SC": "2–5 mg SC",
        "IM": "2–5 mg IM"
      },
      inizio_azione: {
        IV: "15–30 min",
        SC: "15–30 min",
        IM: "15–30 min"
      },
      refratto: {
        dose_media: {
          IV: "2 mg",
          SC: "2 mg",
          IM: "2 mg"
        },
        intervallo: {
          IV: "15–30 min",
          SC: "15–30 min",
          IM: "15–30 min"
        }
      },
      inf_cont: {
        dose_media: "0,25–0,5 mg/ora",
        incremento: "0,1 mg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "0,25–0,5 mg/ora"
      },
      bolo_fissi: {
        dose: "2 mg IV/SC/IM",
        intervallo: "6–8 ore"
      },
      rescue: {
        dose_media: {
          IV: "1 mg",
          SC: "1 mg",
          IM: "1 mg"
        },
        inizio_azione: {
          IV: "15–30 min",
          SC: "15–30 min",
          IM: "15–30 min"
        }
      }
    },
    note: "Neurolettico; agitazione/delirium"
  },
  {
    nome: "Droperidolo",
    visibile: false,
    vie: ["IV", "IM"],
    induzione: {
      bolo_per_via: {
        "IV": "2,5–5 mg IV",
        "IM": "2,5–5 mg IM"
      },
      inizio_azione: {
        IV: "10–15 min",
        IM: "10–15 min"
      },
      refratto: {
        dose_media: {
          IV: "2,5 mg",
          IM: "2,5 mg"
        },
        intervallo: {
          IV: "10–15 min",
          IM: "10–15 min"
        }
      },
      inf_cont: {
        dose_media: "2,5–10 mg/ora",
        incremento: "2,5 mg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "2,5–10 mg/ora"
      },
      bolo_fissi: {
        dose: "5 mg IV/IM",
        intervallo: "4–6 ore"
      },
      rescue: {
        dose_media: {
          IV: "2,5 mg",
          IM: "2,5 mg"
        },
        inizio_azione: {
          IV: "10–15 min",
          IM: "10–15 min"
        }
      }
    },
    note: "Neurolettico butirofenone"
  },
  {
    nome: "Morfina",
    visibile: true,
    vie: ["IV", "SC", "EV"],
    induzione: {
      bolo_per_via: {
        "IV": "0,1–0,2 mg/kg IV",
        "SC": "0,1–0,2 mg/kg SC",
        "EV": "0,1–0,2 mg/kg EV"
      },
      inizio_azione: {
        IV: "5–10 min",
        SC: "10–15 min",
        EV: "5–10 min"
      },
      refratto: {
        dose_media: {
          IV: "0,05–0,1 mg/kg",
          SC: "0,05–0,1 mg/kg",
          EV: "0,05–0,1 mg/kg"
        },
        intervallo: {
          IV: "10–15 min",
          SC: "10–15 min",
          EV: "10–15 min"
        }
      },
      inf_cont: {
        dose_media: "0,05–0,3 mg/kg/ora",
        incremento: "0,05 mg/kg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "0,05–0,3 mg/kg/ora"
      },
      bolo_fissi: {
        dose: "2,5–5 mg IV/SC/EV",
        intervallo: "4–6 ore"
      },
      rescue: {
        dose_media: {
          IV: "2,5–5 mg",
          SC: "2,5–5 mg",
          EV: "2,5–5 mg"
        },
        inizio_azione: {
          IV: "10–15 min",
          SC: "10–15 min",
          EV: "10–15 min"
        }
      }
    },
    note: "Oppiaceo; titolare secondo scala OMS"
  },
  {
    nome: "Fentanyl",
    visibile: false,
    vie: ["IV", "SC", "EV"],
    induzione: {
      bolo_per_via: {
        "IV": "0,3–0,5 mcg/kg IV",
        "SC": "0,3–0,5 mcg/kg SC",
        "EV": "0,3–0,5 mcg/kg EV"
      },
      inizio_azione: {
        IV: "1–5 min",
        SC: "5–10 min",
        EV: "1–5 min"
      },
      refratto: {
        dose_media: {
          IV: "0,3–0,5 mcg/kg",
          SC: "0,3–0,5 mcg/kg",
          EV: "0,3–0,5 mcg/kg"
        },
        intervallo: {
          IV: "5–10 min",
          SC: "5–10 min",
          EV: "5–10 min"
        }
      },
      inf_cont: {
        dose_media: "1–10 mcg/kg/ora",
        incremento: "1 mcg/kg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "1–10 mcg/kg/ora"
      },
      bolo_fissi: {
        dose: "10–20 mcg IV/SC/EV",
        intervallo: "4 ore"
      },
      rescue: {
        dose_media: {
          IV: "10 mcg",
          SC: "10 mcg",
          EV: "10 mcg"
        },
        inizio_azione: {
          IV: "5–10 min",
          SC: "5–10 min",
          EV: "5–10 min"
        }
      }
    },
    note: "Oppiaceo; rapido onset"
  },
  {
    nome: "Dexmedetomidina",
    visibile: false,
    vie: ["IV"],
    induzione: {
      bolo_per_via: {},
      inizio_azione: {},
      refratto: {},
      inf_cont: {
        dose_media: "0,2–0,7 mcg/kg/ora",
        incremento: "0,1 mcg/kg/ora"
      }
    },
    mantenimento: {
      inf_cont: {
        dose_media: "0,5–1,4 mcg/kg/ora"
      },
      bolo_fissi: {},
      rescue: {}
    },
    note: "Agonista alfa-2; nessun bolo"
  }
];