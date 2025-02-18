<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<style>
    .btn{
        margin-top: 20px;
        background: green;
    }

    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        background-color: #343a40;
        padding-top: 20px;
    }
    .sidebar .btn {
        width: 100%;
        margin-bottom: 15px;
    }

    .content-wrapper {
        margin-left: 250px;
        padding: 20px;
    }

    nav{
        color: white;
    }
    .btn-danger{

    }

</style>


<nav class="main-header navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="#  mx-4" class="navbar-brand">Menu</a>
        
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="# mx-4 text-white" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="# mx-4 text-white" href="#">Tableau de bord</a>
                </li>
                <li class="nav-item">
                    <a class="# mx-4 text-white" href="#">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="# mx-4 text-white" href="#">Mot de passe</a>
                </li>
                <li class="nav-item">
                    <a class="# mx-4 text-white" href="#">Inscription</a>
                </li>
            </ul>

            <!-- Déconnexion Button -->
            <form class="d-flex  ml-auto">
                <button class="btn btn-danger" type="submit">Déconnexion</button>
            </form>
        </div>
    </div>
</nav>


<aside class="sidebar">
    <button class="btn btn-outline-light mt-5">Gestion des Cages</button>
    <button class="btn btn-outline-light">Gestion des Animaux</button>
    <button class="btn btn-outline-light">Gestion des Personnes</button>
</aside>


<div class="content-wrapper">
            <div class="content-header">
                <h1 class="mt-5 text-center">Gestion des Animaux</h1>
            </div>
            <div class="content">
            <div class="container mt-4">
                <!-- Users Table -->
                <div class="container mt-4">
                    <table id="usersTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>
                                <button class="btn btn-info" onclick=""> View</button>
                                    <button class="btn btn-danger" onclick=""> Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Add User</button>
                </div>
        </div>
    </div>
</div>

</body>
</html>