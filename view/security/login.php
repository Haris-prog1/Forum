<!-- Formulaire pour se connecter  -->
<h1 class="uk-child-width-1-2@s uk-text-center uk-text-warning">Se connecter</h1>


<p class="uk-child-width-1-2@s uk-text-center uk-text-warning">Renseignez les champs afin de vous</p>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 ms-0">
            <!-- Formulaire aligné à gauche avec une marge minimale -->
            <form action="index.php?ctrl=security&action=login" method="POST">
               
                <div class="mb-3">
                    <label for="mail" class="form-label uk-text-center">Email</label>
                    <input type="mail" class="form-control" id="mail" name="mail" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-secondary">Se connecter</button>
            </form>
        </div>
    </div>
</div>
        </form>
    </div>

    <!-- Bootstrap JS (nécessaire si tu veux des fonctionnalités comme les modals, alertes dynamiques, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- <a href="index.php?ctrl=security&action=login">Se connecter</a>
<a href="index.php?ctrl=security&action=register">S'inscrire</a> -->