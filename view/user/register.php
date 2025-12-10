<section class="form_subscribe">
    <div>
        <h1>Inscription</h1>
    </div>
    <form class="container_form" method="POST">
        <div class="bloc_form nom">
            <label for="nom" class="form-label">Nom*</label>
            <input type="text" name="nom" class="form-control" id="nom" required placeholder="Votre nom" value="">
            <div id="nomError"></div>
        </div>

        <div class="bloc_form prenom">
            <label for="prenom" class="form-label">Prénom*</label>
            <input type="text" name="prenom" class="form-control" id="prenom" required placeholder="Votre prénom" value="">
            <div id="prenomError"></div>
        </div>

        <div class="bloc_form pseudo">
            <label for="pseudo" class="form-label">Pseudo*</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" required placeholder="Votre pseudo" value="">
            <div id="pseudoError"></div>
        </div>

        <div class="bloc_form email">
            <label for="email" class="form-label">Email*</label>
            <input type="email" name="email" class="form-control" id="email" required placeholder="Votre email" value="">
            <div id="emailError"></div>
        </div>

        <div class="bloc_form pwd">
            <label for="pwd" class="form-label">Votre mot de passe*</label>
            <input type="password" name="pwd" class="form-control" id="pwd" required placeholder="Votre mot de passe">
            <div id="pwdError"></div>
            <div>
                <input type="checkbox" name="displayPwd" id="displayPwd">
                <label for="displayPwd">Afficher le mot de passe</label>
            </div>
        </div>

        <button type="submit" class="btn1" name="register" id="submitBtn">S'inscrire</button>
    </form>
</section>