<div>
    <h2>réinitialisation de mot de passe</h2>
</div>
<form action="./src/controller/controllerSetPassword.php" method="POST">
    <div class="row text-center">
        <div class="col-md-2 mx-auto">
            <input type="hidden" name="id" value=<?=isset($_GET['id'])?intval($_GET['id']):'erreur'?>>
            <div class="form-group">
                <input type="text" name="oldPassword" id="oldPassword" placeholder="Ancien mot de passe" required>
            </div>
            <div class="form-group">
                <input type="text" name="newPassword" id="newPassword" placeholder="Nouveau mot de passe" required>
            </div>
            <div class="form-group">
                <input type="text" name="confirmPassword" id="confirmPassword" placeholder="Confirmez le mot de passe" required>
            </div>
        </div>
    </div>
    <div class="text-center">

        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>