<style>
        .card {
            max-width: 250px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>

<main class="container mt-5">
        <h1 class="text-center mb-4">Bienvenue au refuge pour animaux</h1>
        <div class="mb-4">
            <select class="form-control" id="speciesSelect" onchange="filterCards()">
                <option value="all">Toutes les espèces</option>
                <option value="chien">Chiens</option>
                <option value="giraffe">Giraffes</option>
                <option value="elephant">Éléphants</option>
                <option value="crocodile">Crocodiles</option>
                <option value="serpent">Serpents</option>
                <option value="loup">Loups</option>
                <option value="chat">Chats</option>
                <option value="ane">Ânes</option>
                <option value="mulet">Mulets</option>
                <option value="cheval">Chevaux</option>
            </select>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://images8.alphacoders.com/873/873630.jpg" class="card-img-top" alt="Chien">
                    <div class="card-body">
                        <h5 class="card-title">Max</h5>
                        <p class="card-text">Max est un chien adorable qui aime jouer et courir dans le parc.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://images8.alphacoders.com/873/873630.jpg" class="card-img-top" alt="Chat">
                    <div class="card-body">
                        <h5 class="card-title">Mimi</h5>
                        <p class="card-text">Mimi est une chatte douce et câline, parfaite pour les foyers aimants.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://images8.alphacoders.com/873/873630.jpg" class="card-img-top" alt="Lapin">
                    <div class="card-body">
                        <h5 class="card-title">Fluffy</h5>
                        <p class="card-text">Fluffy est un lapin curieux et joueur, idéal pour les familles avec enfants.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>