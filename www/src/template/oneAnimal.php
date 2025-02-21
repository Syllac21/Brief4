<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #a9c8d4;
        }
        .card {
            background-color:rgb(203, 236, 236);
            border-radius: 10px;
            padding: 15px;
            height: 100%;
        }
        .highlight {
            background-color: #ffffff;
            border: 2px solid;
            border-radius: 10px;
            padding: 15px;
            height: 100%;
        }
        .container {
            background-color: #AFDFDF;
            padding: 14px;
        }
        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <!-- Left Column: Soigneur Info -->
        <div class="col-md-6">
            <div class="card ">
                <h5>Informations sur le Soigneur :</h5>
                <p><strong>Nom :</strong> Sarah Johnson</p>
                <p><strong>Rôle :</strong> Soigneur Principal</p>
                <p><strong>Email :</strong> sarah@refugeanimaux.org</p>
            </div>
        </div>

        <!-- Right Column: Animal Photo -->
        <div class="col-md-6">
            <div class="img-container">
                <img src="https://cdn.britannica.com/79/232779-050-6B0411D7/German-Shepherd-dog-Alsatian.jpg" alt="Image de l'animal">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Left Column: Animal Info -->
        <div class="col-md-6">
            <div class="card">
                <h5>Informations sur l'Animal :</h5>
                <p><strong>Nom :</strong> Max</p>
                <p><strong>Espèce :</strong> Chien</p>
                <p><strong>Race :</strong> Labrador Retriever</p>
                <p><strong>Âge :</strong> 2 ans</p>
                <p><strong>Date de naissance :</strong> 15 Juin 2022</p>
                <p><strong>Identifiant :</strong> #12345</p>
            </div>
        </div>

        <!-- Right Column: Options d’Adoption -->
        <div class="col-md-6">
            <div class="highlight">
                <h5>Options d'Adoption :</h5>
                <p><strong>Statut :</strong> Disponible</p>
                <p><strong>Frais d'adoption :</strong> 150 €</p>
                <p><strong>Procédure :</strong> Une visite est recommandée avant l'adoption. Les frais couvrent la vaccination, la stérilisation et l'identification.</p>
                <button class="btn btn-primary">Remplir le formulaire d'adoption</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
