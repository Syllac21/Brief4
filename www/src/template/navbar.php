<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a2d5d5;">
    <a class="navbar-brand" href="#">Refuge pour Animaux</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
        <ul class="navbar-nav flex-grow-1">
            <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        </ul>
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Se déconnecter</a></li>
            <?php else: ?>
                <li class="nav-item">
                    <form id="login-form" action="login.php" method="POST" class="d-flex align-items-center">
                        <div class="form-group mb-0 me-2">
                            <label for="login" class="sr-only">Login</label>
                            <input type="text" id="login" name="login" class="form-control" placeholder="Login">
                        </div>
                        <div class="form-group mb-0 me-2">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter🔑</button>
                        <button type="submit" class="btn btn-outline-secondary">Déconnexion🔑</button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

