<?php
?>
<link rel="stylesheet" href="css/famcare2.css">
<section id="famcare2-home" class="famcare-container" style="display:none;">
  <div class="mb-3 print-hide">
    <button class="btn btn-outline-secondary" onclick="window.location.href='index.php#strumenti-valutazione-home';">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-secondary ms-2" onclick="window.location.href='caregiving.php';">
      <i class="fas fa-arrow-left me-2"></i>Torna a Caregiving
    </button>
  </div>

  <div class="famcare-header">
    <h1><i class="fas fa-users-line me-3"></i>FAMCARE-2</h1>
    <p>Family Satisfaction with Care - Versione a 17 item</p>
  </div>

  <div class="mode-selector">
    <a href="#" class="mode-btn active" onclick="switchFAMCARE2Mode('compile')"><i class="fas fa-edit me-2"></i>Compila</a>
    <a href="#" class="mode-btn" onclick="switchFAMCARE2Mode('visualize')"><i class="fas fa-eye me-2"></i>Visualizza</a>
    <a href="#" class="mode-btn" onclick="switchFAMCARE2Mode('glossary')"><i class="fas fa-book me-2"></i>Glossario</a>
  </div>

  <div id="famcare2-compile-section" class="content-section active">
    <div class="patient-info-card">
      <h3><i class="fas fa-user-friends me-2"></i>Dati Famiglia</h3>
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Nome Familiare</label>
          <input type="text" class="form-control" id="famcare2-family-name" placeholder="Nome familiare">
        </div>
        <div class="col-md-4">
          <label class="form-label">Nome Paziente</label>
          <input type="text" class="form-control" id="famcare2-patient-name" placeholder="Nome paziente">
        </div>
        <div class="col-md-4">
          <label class="form-label">Data Valutazione</label>
          <input type="date" class="form-control" id="famcare2-date">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-6">
          <label class="form-label">Relazione con il paziente</label>
          <select class="form-control" id="famcare2-relationship">
            <option value="">Seleziona...</option>
            <option value="coniuge">Coniuge/Partner</option>
            <option value="figlio">Figlio/a</option>
            <option value="genitore">Genitore</option>
            <option value="fratello">Fratello/Sorella</option>
            <option value="altro">Altro familiare</option>
            <option value="amico">Amico/a</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Setting di cura</label>
          <select class="form-control" id="famcare2-setting">
            <option value="">Seleziona...</option>
            <option value="domicilio">Domicilio</option>
            <option value="hospice">Hospice</option>
            <option value="ospedale">Ospedale</option>
            <option value="rsa">RSA</option>
            <option value="ambulatorio">Ambulatorio</option>
          </select>
        </div>
      </div>
    </div>

    <div class="progress-container">
      <h4><i class="fas fa-chart-line me-2"></i>Progresso Compilazione</h4>
      <div class="progress">
        <div class="progress-bar" role="progressbar" id="famcare2-progress" style="width: 0%"></div>
      </div>
      <div class="text-center mt-2">
        <span id="famcare2-progress-text">0 di 17 domande completate</span>
      </div>
    </div>

    <div class="form-group famcare-domain">
      <div class="domain-header">
        <i class="fas fa-comments me-2"></i>Informazione e Comunicazione
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">1</span>
          La velocità con cui viene risposto alle sue domande
        </div>
        <div class="likert-scale" data-question="q1">
          <div class="likert-option" onclick="selectFAMCARE2Option('q1', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q1', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q1', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q1', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q1', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">2</span>
          Le informazioni ricevute sulla condizione del paziente
        </div>
        <div class="likert-scale" data-question="q2">
          <div class="likert-option" onclick="selectFAMCARE2Option('q2', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q2', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q2', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q2', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q2', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">3</span>
          La chiarezza delle informazioni ricevute dal team
        </div>
        <div class="likert-scale" data-question="q3">
          <div class="likert-option" onclick="selectFAMCARE2Option('q3', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q3', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q3', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q3', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q3', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">4</span>
          La sincerità delle informazioni fornite sulla condizione del paziente
        </div>
        <div class="likert-scale" data-question="q4">
          <div class="likert-option" onclick="selectFAMCARE2Option('q4', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q4', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q4', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q4', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q4', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group famcare-domain">
      <div class="domain-header">
        <i class="fas fa-user-clock me-2"></i>Disponibilità del Team
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">5</span>
          La disponibilità del medico a parlare con lei
        </div>
        <div class="likert-scale" data-question="q5">
          <div class="likert-option" onclick="selectFAMCARE2Option('q5', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q5', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q5', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q5', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q5', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">6</span>
          La disponibilità degli infermieri a parlare con lei
        </div>
        <div class="likert-scale" data-question="q6">
          <div class="likert-option" onclick="selectFAMCARE2Option('q6', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q6', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q6', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q6', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q6', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">7</span>
          La frequenza delle visite del medico
        </div>
        <div class="likert-scale" data-question="q7">
          <div class="likert-option" onclick="selectFAMCARE2Option('q7', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q7', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q7', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q7', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q7', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">8</span>
          La coordinazione delle cure tra i diversi operatori
        </div>
        <div class="likert-scale" data-question="q8">
          <div class="likert-option" onclick="selectFAMCARE2Option('q8', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q8', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q8', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q8', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q8', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group famcare-domain">
      <div class="domain-header">
        <i class="fas fa-heartbeat me-2"></i>Gestione Sintomi Fisici
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">9</span>
          Il controllo del dolore del paziente
        </div>
        <div class="likert-scale" data-question="q9">
          <div class="likert-option" onclick="selectFAMCARE2Option('q9', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q9', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q9', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q9', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q9', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">10</span>
          Il controllo dei sintomi del paziente (diversi dal dolore)
        </div>
        <div class="likert-scale" data-question="q10">
          <div class="likert-option" onclick="selectFAMCARE2Option('q10', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q10', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q10', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q10', 2, this)">
            <div class="likert-number">2</div>
            <div la="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q10', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">11</span>
          La gestione degli effetti collaterali delle terapie
        </div>
        <div class="likert-scale" data-question="q11">
          <div class="likert-option" onclick="selectFAMCARE2Option('q11', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q11', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q11', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q11', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q11', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">12</span>
          La velocità con cui i sintomi fisici vengono affrontati
        </div>
        <div class="likert-scale" data-question="q12">
          <div class="likert-option" onclick="selectFAMCARE2Option('q12', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q12', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q12', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q12', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q12', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group famcare-domain">
      <div class="domain-header">
        <i class="fas fa-hands-holding-heart me-2"></i>Supporto Psicosociale
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">13</span>
          Il supporto emotivo fornito dal team al paziente
        </div>
        <div class="likert-scale" data-question="q13">
          <div class="likert-option" onclick="selectFAMCARE2Option('q13', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q13', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q13', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q13', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q13', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">14</span>
          Il supporto emotivo fornito dal team alla famiglia
        </div>
        <div class="likert-scale" data-question="q14">
          <div class="likert-option" onclick="selectFAMCARE2Option('q14', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q14', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q14', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q14', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q14', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">15</span>
          Il coinvolgimento della famiglia nelle decisioni riguardanti le cure
        </div>
        <div class="likert-scale" data-question="q15">
          <div class="likert-option" onclick="selectFAMCARE2Option('q15', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q15', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q15', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q15', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q15', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">16</span>
          L'attenzione dedicata ai bisogni spirituali del paziente
        </div>
        <div class="likert-scale" data-question="q16">
          <div class="likert-option" onclick="selectFAMCARE2Option('q16', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q16', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q16', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q16', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q16', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <div class="item-question">
          <span class="item-number">17</span>
          Nel complesso, quanto è soddisfatto delle cure ricevute dal paziente?
        </div>
        <div class="likert-scale" data-question="q17">
          <div class="likert-option" onclick="selectFAMCARE2Option('q17', 5, this)">
            <div class="likert-number">5</div>
            <div class="likert-label">Molto soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q17', 4, this)">
            <div class="likert-number">4</div>
            <div class="likert-label">Soddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q17', 3, this)">
            <div class="likert-number">3</div>
            <div class="likert-label">Indifferente</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q17', 2, this)">
            <div class="likert-number">2</div>
            <div class="likert-label">Insoddisfatto</div>
          </div>
          <div class="likert-option" onclick="selectFAMCARE2Option('q17', 1, this)">
            <div class="likert-number">1</div>
            <div class="likert-label">Molto insoddisfatto</div>
          </div>
        </div>
      </div>
    </div>

    <div class="results-container" id="famcare2-results">
      <div class="score-display" id="famcare2-score">-</div>
      <div class="score-interpretation" id="famcare2-interpretation">Punteggio FAMCARE-2</div>
      <div class="score-description" id="famcare2-description">Completa tutte le domande per vedere l'interpretazione</div>

      <div class="row mt-4" id="famcare2-domain-scores" style="display:none;">
        <div class="col-md-3">
          <div class="text-center">
            <h6>Informazione</h6>
            <div class="score-display" style="font-size:2rem;" id="domain1-score">-</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <h6>Disponibilità</h6>
            <div class="score-display" style="font-size:2rem;" id="domain2-score">-</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <h6>Sintomi Fisici</h6>
            <div class="score-display" style="font-size:2rem;" id="domain3-score">-</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <h6>Supporto Psicosociale</h6>
            <div class="score-display" style="font-size:2rem;" id="domain4-score">-</div>
          </div>
        </div>
      </div>
    </div>

    <div class="action-buttons">
      <button class="btn btn-primary" onclick="saveFAMCARE2()">
        <i class="fas fa-save me-2"></i>Salva Valutazione
      </button>
      <button class="btn btn-outline-primary" onclick="printFAMCARE2()">
        <i class="fas fa-print me-2"></i>Stampa Report
      </button>
      <button class="btn btn-outline-primary" onclick="resetFAMCARE2()">
        <i class="fas fa-redo me-2"></i>Reset
      </button>
    </div>
  </div>

  <div id="famcare2-visualize-section" class="content-section">
    <div class="template-section">
      <h3><i class="fas fa-table me-2"></i>Scala FAMCARE-2 Completa</h3>
      <div class="mb-4">
        <h5 style="color:#e83e8c;">Domini e Item</h5>
        <table class="scale-table">
          <thead>
            <tr>
              <th>Dominio</th>
              <th>Item</th>
              <th>Descrizione</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td rowspan="4"><strong>Informazione e Comunicazione</strong></td>
              <td>1</td>
              <td>Velocità risposta alle domande</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Informazioni sulla condizione</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Chiarezza delle informazioni</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Sincerità delle informazioni</td>
            </tr>
            <tr>
              <td rowspan="4"><strong>Disponibilità del Team</strong></td>
              <td>5</td>
              <td>Disponibilità del medico</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Disponibilità degli infermieri</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Frequenza visite medico</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Coordinazione delle cure</td>
            </tr>
            <tr>
              <td rowspan="4"><strong>Gestione Sintomi Fisici</strong></td>
              <td>9</td>
              <td>Controllo del dolore</td>
            </tr>
            <tr>
              <td>10</td>
              <td>Controllo altri sintomi</td>
            </tr>
            <tr>
              <td>11</td>
              <td>Gestione effetti collaterali</td>
            </tr>
            <tr>
              <td>12</td>
              <td>Velocità gestione sintomi</td>
            </tr>
            <tr>
              <td rowspan="5"><strong>Supporto Psicosociale</strong></td>
              <td>13</td>
              <td>Supporto emotivo al paziente</td>
            </tr>
            <tr>
              <td>14</td>
              <td>Supporto emotivo alla famiglia</td>
            </tr>
            <tr>
              <td>15</td>
              <td>Coinvolgimento decisioni</td>
            </tr>
            <tr>
              <td>16</td>
              <td>Attenzione bisogni spirituali</td>
            </tr>
            <tr>
              <td>17</td>
              <td>Soddisfazione globale</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div style="background:#f8f9fa;padding:2rem;border-radius:15px;margin-top:2rem;">
        <h4 style="color:#e83e8c;">📊 Sistema di Scoring</h4>
        <ul style="margin:0;padding-left:1.5rem;color:#666;">
          <li><strong>Scala Likert:</strong> 1-5 punti per ogni item</li>
          <li><strong>Punteggio totale:</strong> 17-85 punti (somma di tutti gli item)</li>
          <li><strong>Punteggi per dominio:</strong> Media degli item del dominio</li>
          <li><strong>Interpretazione:</strong> Punteggi più alti = maggiore soddisfazione</li>
          <li><strong>Tempo di compilazione:</strong> 5-10 minuti</li>
        </ul>
      </div>

      <div class="action-buttons">
        <button class="btn btn-outline-primary" onclick="printFAMCARE2Template()">
          <i class="fas fa-print me-2"></i>Stampa Template
        </button>
      </div>
    </div>
  </div>

  <div id="famcare2-glossary-section" class="content-section">
    <div class="template-section">
      <h3><i class="fas fa-book me-2"></i>Glossario Clinico FAMCARE-2</h3>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Cos'è FAMCARE-2</h5>
        <p>FAMCARE-2 è uno strumento validato per misurare la soddisfazione dei familiari rispetto alle cure palliative/oncologiche ricevute dal paziente. È stato sviluppato a partire dal FAMCARE originale di Kristjanson, con 17 item organizzati in 4 domini principali.</p>
      </div>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Domini di Valutazione</h5>
        <div class="row">
          <div class="col-md-6">
            <div style="background:#fff3cd;padding:1.5rem;border-radius:12px;margin-bottom:1rem;">
              <h6 style="color:#856404;"><i class="fas fa-comments me-2"></i>Informazione e Comunicazione</h6>
              <p style="color:#856404;margin:0;font-size:0.9rem;">Qualità, chiarezza e tempestività delle informazioni fornite dal team medico alla famiglia.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#d1ecf1;padding:1.5rem;border-radius:12px;margin-bottom:1rem;">
              <h6 style="color:#0c5460;"><i class="fas fa-user-clock me-2"></i>Disponibilità del Team</h6>
              <p style="color:#0c5460;margin:0;font-size:0.9rem;">Accessibilità e coordinazione degli operatori sanitari per la famiglia.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#f8d7da;padding:1.5rem;border-radius:12px;margin-bottom:1rem;">
              <h6 style="color:#721c24;"><i class="fas fa-heartbeat me-2"></i>Gestione Sintomi Fisici</h6>
              <p style="color:#721c24;margin:0;font-size:0.9rem;">Efficacia nel controllo del dolore e di altri sintomi fisici del paziente.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#d4edda;padding:1.5rem;border-radius:12px;margin-bottom:1rem;">
              <h6 style="color:#155724;"><i class="fas fa-hands-holding-heart me-2"></i>Supporto Psicosociale</h6>
              <p style="color:#155724;margin:0;font-size:0.9rem;">Attenzione ai bisogni emotivi, spirituali e decisionali di paziente e famiglia.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Utilizzo Clinico</h5>
        <ul>
          <li><strong>Audit di qualità</strong> nei servizi di cure palliative</li>
          <li><strong>Valutazione soddisfazione</strong> in hospice, domicilio, ospedale</li>
          <li><strong>Progetti di miglioramento</strong> della qualità percepita</li>
          <li><strong>Ricerca clinica</strong> sull'efficacia degli interventi</li>
          <li><strong>Follow-up longitudinale</strong> della soddisfazione familiare</li>
        </ul>
      </div>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Proprietà Psicometriche</h5>
        <div style="background:#f8f9fa;padding:1.5rem;border-radius:12px;">
          <ul style="margin:0;color:#666;">
            <li><strong>Affidabilità interna:</strong> Ottima (α > 0,90)</li>
            <li><strong>Validità di costrutto:</strong> Confermata attraverso analisi fattoriale</li>
            <li><strong>Traduzioni disponibili:</strong> Italiano, inglese, svedese, thai</li>
            <li><strong>Popolazione target:</strong> Familiari/caregiver di pazienti in cure palliative</li>
            <li><strong>Modalità:</strong> Autosomministrato o intervista</li>
          </ul>
        </div>
      </div>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Interpretazione Risultati</h5>
        <p>I punteggi si interpretano confrontando diversi setting, periodi temporali o gruppi di pazienti. Non esistono cut-off clinici specifici. L'analisi per domini permette di identificare aree specifiche di forza o miglioramento nel servizio.</p>
      </div>

      <div style="background:#fff3cd;padding:1.5rem;border-radius:12px;border-left:4px solid #ffc107;">
        <h6 style="color:#856404;"><i class="fas fa-lightbulb me-2"></i>Best Practice</h6>
        <p style="color:#856404;margin:0;">Utilizzare FAMCARE-2 regolarmente per monitorare la qualità percepita e implementare azioni di miglioramento basate sui feedback delle famiglie. Considerare la somministrazione a diverse fasi del percorso di cura.</p>
      </div>
    </div>
  </div>
</section>
<script src="js/famcare2.js"></script>
