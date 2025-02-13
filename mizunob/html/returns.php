<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mizuno</title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <script src="https://kit.fontawesome.com/8facfa452a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>
    <!-- Main -->
    <main>
        <h2 style= "text-align: center;color:#0DCAF0; margin-bottom: 3%; margin-top: 3%;">Cerca per</h2>
        <div class="container form-container">
            <form id="filter-form" action="../includes/returns.inc.php" method="GET">
                <div id="filter-container">
                <div class="row mb-3">
                    <div class="col-md-6">
                    <select class="form-select">
                        <option>DATA FATTURAZIONE</option>
                        <option>DATA BOLLA</option>
                    </select>
                    <small class="form-text text-muted">Seleziona i criteri di ricerca</small>
                    </div>
                    <div class="col-md-6">
                    <select class="form-select">
                        <option>ULTIMI 24 MESI</option>
                        <option>ULTIMI 18 MESI</option>
                        <option>ULTIMI 12 MESI</option>
                    </select>
                    <small class="form-text text-muted">Seleziona la data di fatturazione es. "ultimi 12 mesi"</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                    <select class="form-select" placeholder="SELEZIONA">
                        <option value="" disabled selected>SELEZIONA</option>
                        <option>Numero Fattura</option>
                        <option>Numero Ordine</option>
                        <option>Numero Bolla</option>
                        <option>Codice Prodotto</option>
                        <option>Data di consegna richiesta</option>
                    </select>
                    <small class="form-text text-muted">Seleziona i criteri di ricerca</small>
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Inserisci valore">
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" id="add-filter" class="btn btn-primary mt-3">+</button>
                        <small class="form-text text-muted ms-2">Aggiungi filtro</small>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-md-6 text-start">
                    <button type="button" id="reset-filters" class="btn btn-danger">Annulla Filtri</button>
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" form="filter-form" class="btn btn-success">CERCA</button>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
<!-- Javascrip -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/script.js"></script>
</body>
</html>