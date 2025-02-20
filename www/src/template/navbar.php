<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a2d5d5;">
    <a class="navbar-brand" href="#">Refuge pour Animaux</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['login'])): ?>
                <li class="nav-item d-flex align-items-center">
                    <span class="nav-link">👤 <?php echo htmlspecialchars($_SESSION['login']); ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./src/controller/controllerLogout.php">Se déconnecter 🔑</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <form id="login-form" action="./src/controller/controllerLogin.php" method="POST" class="d-flex align-items-center">
                        <div class="form-group mb-0 me-2">
                            <label for="login" class="sr-only">Login</label>
                            <input type="text" id="login" name="login" class="form-control" placeholder="Login">
                        </div>
                        <div class="form-group mb-0 me-2">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary d-none d-lg-inline">Se connecter 🔑</button>
                        <button type="submit" class="btn btn-primary d-lg-none">🔑</button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>