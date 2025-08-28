# 🤝 Workflow di Collaborazione - Francesco & Filippo

## 📋 Struttura Branch

```
main                    # 🔒 Codice in produzione (SOLO per release)
development            # 🚀 Branch principale di sviluppo 
francesco/feature-development   # 👨‍💻 Branch di Francesco
filippo/feature-development     # 👨‍💻 Branch di Filippo
```

## 🔄 Workflow Quotidiano

### 1. **Iniziare una nuova feature**
```bash
# Passare al branch development e aggiornarlo
git checkout development
git pull origin development

# Creare un nuovo branch per la tua feature
git checkout -b francesco/nome-feature
# oppure
git checkout -b filippo/nome-feature
```

### 2. **Lavorare sulla feature**
```bash
# Fare le tue modifiche...
git add .
git commit -m "Descrizione chiara delle modifiche"

# Pushare sul tuo branch
git push origin francesco/nome-feature
```

### 3. **Merge della feature**
```bash
# Tornare a development e aggiornarlo
git checkout development
git pull origin development

# Mergeare la tua feature
git merge francesco/nome-feature

# Pushare development aggiornato
git push origin development

# Cancellare il branch della feature (opzionale)
git branch -d francesco/nome-feature
```

## 🏗️ Convenzioni di Naming

### Branch Names:
- `francesco/fix-icons-loading`
- `francesco/add-new-assessment-tool`
- `filippo/improve-dashboard-ui`
- `filippo/refactor-database-queries`

### Commit Messages:
- `Fix Font Awesome icons not loading on Windows`
- `Add NECPAL 4.0 assessment tool`
- `Improve mobile responsiveness for dashboard`
- `Refactor database connection handling`

## ⚠️ Regole Importanti

1. **MAI pushare direttamente su `main`**
2. **Sempre sincronizzarsi con `development` prima di creare nuovi branch**
3. **Un branch = una feature** (piccole e specifiche)
4. **Commit frequenti con messaggi chiari**
5. **Testare sempre prima del merge**

## 🔄 Sincronizzazione tra Collaboratori

### Quando Filippo ha fatto modifiche:
```bash
# Francesco sincronizza il suo lavoro
git checkout development
git pull origin development
git checkout francesco/mia-feature
git merge development  # Porta le modifiche di Filippo nel tuo branch
```

### Quando ci sono conflitti:
```bash
# Git ti mostrerà i file in conflitto
git status
# Risolvi manualmente i conflitti nei file
# Poi:
git add file-risolto.php
git commit -m "Resolve merge conflicts"
```

## 📞 Comunicazione

- **Prima di grandi modifiche**: Avvisare il collega
- **Se lavorate sugli stessi file**: Coordinarsi per evitare conflitti
- **Branch naming**: Usare nomi descrittivi per capire cosa fa l'altro

## 🚀 Release Process

Quando siete pronti per una release:
```bash
# Merge development in main
git checkout main
git merge development
git tag v1.0.0
git push origin main --tags
```

---
*Creato per il progetto PallKit - Gestione Sintomi*