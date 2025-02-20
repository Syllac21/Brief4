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
            background-color: #dcecec;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        .highlight {
            border: 2px solid #0066cc;
            padding: 15px;
            border-radius: 10px;
            background-color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <!-- Informations sur le Soigneur first -->
        <div class="col-md-6">
            <div class="card">
                <h5>Informations sur le Soigneur :</h5>
                <p><strong>Nom :</strong> Sarah Johnson</p>
                <p><strong>Rôle :</strong> Soigneur Principal</p>
                <p><strong>Email :</strong> sarah@refugeanimaux.org</p>
            </div>

            <!-- Informations sur l'Animal -->
            <div class="card mt-4">
                <h5>Informations sur l'Animal :</h5>
                <p><strong>Nom :</strong> Max</p>
                <p><strong>Espèce :</strong> Chien</p>
                <p><strong>Race :</strong> Labrador Retriever</p>
                <p><strong>Âge :</strong> 2 ans</p>
                <p><strong>Date de naissance :</strong> 15 Juin 2022</p>
                <p><strong>Identifiant :</strong> #12345</p>
            </div>
        </div>

        <!-- Right side: Image + Options d’Adoption -->
        <div class="col-md-6">
            <!-- Image principale -->
            <div class="text-center">
                <img src="https://cdn.pixabay.com/photo/2020/06/18/18/01/golden-retriever-5638780_960_720.jpg" class="img-fluid rounded" alt="Image de l'animal">
            </div>

            <!-- Options d’Adoption -->
            <div class="highlight mt-4">
                <h5>Options d’Adoption :</h5>
                <p><strong>Statut :</strong> Disponible</p>
                <p><strong>Frais d’adoption :</strong> 150 €</p>
                <p><strong>Procédure :</strong> Une visite est recommandée avant l'adoption. Les frais couvrent la vaccination, la stérilisation et l’identification.</p>
                <button class="btn btn-primary">Remplir le formulaire d’adoption</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
