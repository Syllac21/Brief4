<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informations Employé</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #AFDFDF;
            font-family: Arial, sans-serif;
        }

        .employee-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .employee-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .btn-reset {
            background-color:#023636;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-reset:hover {
            background-color: #AFDFDF;
        }
        .text-primary{
            color:black;
        }
        .container{
        background-color: #AFDFDF;
        padding: 14px;
    }

    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Informations sur l'Employé</h2>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="employee-card">
                <h4 class="text-center mb-3">Détails de l'Employé</h4>
                <p><strong>Identifiant :</strong> EMP12345</p>
                <p><strong>Nom :</strong> Dupont</p>
                <p><strong>Prénom :</strong> Dupont</p>
                <p><strong>Email :</strong> jean.dupont@example.com</p>

                <!-- Bouton pour réinitialiser le mot de passe -->
                <div class="text-center mt-4">
                    <button class="btn btn-reset px-4">Réinitialiser le mot de passe</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-dark text-center custom-footer py-4 mt-5 ">
    <div class="container">
        <p class="mb-1">@2025 Refuge pour Animaux. WebNovices : Tous droits réservés.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
