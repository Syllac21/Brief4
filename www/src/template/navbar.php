<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a2d5d5;">
    <!-- Nom du site dans la barre de navigation -->
    <a class="navbar-brand" href="#">Refuge pour Animaux</a>

    <!-- Bouton pour afficher/cacher la navigation sur mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenu du menu de navigation -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['login'])): ?>  <!-- Vérifie si l'utilisateur est connecté -->
                
                <!-- Affichage du nom d'utilisateur connecté -->
                <li class="nav-item d-flex align-items-center">
                    <span class="nav-link">👤 <?php echo htmlspecialchars($_SESSION['login']); ?></span>
                </li>

                <!-- Lien vers la page d'accueil -->
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>

                <!-- Lien vers le tableau de bord (accessible uniquement aux connectés) -->
                <li class="nav-item">
                    <a class="nav-link" href="/?page=dashboard">Dashboard</a>
                </li>

                <!-- Lien pour se déconnecter -->
                <li class="nav-item">
                    <a class="nav-link" href="./src/controller/controllerLogout.php">Se déconnecter 🔑</a>
                </li>

            <?php else: ?> <!-- Si l'utilisateur n'est pas connecté, afficher le formulaire de connexion -->

                <li class="nav-item">
                    <form id="login-form" action="./src/controller/controllerLogin.php" method="POST" class="d-flex align-items-center">
                        
                        <!-- Champ de saisie pour le login -->
                        <div class="form-group mb-0 me-2">
                            <label for="login" class="sr-only">Login</label>
                            <input type="text" id="login" name="login" class="form-control" placeholder="Login">
                        </div>

                        <!-- Champ de saisie pour le mot de passe -->
                        <div class="form-group mb-0 me-2">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <!-- Bouton de connexion (affiché en texte sur grands écrans, icône sur petits écrans) -->
                        <button type="submit" class="btn btn-primary d-none d-lg-inline">Se connecter 🔑</button>
                        <button type="submit" class="btn btn-primary d-lg-none">🔑</button>

                    </form>
                </li>

            <?php endif; ?>
        </ul>
    </div>
</nav>
