<form action="" method="post" class="form signInForm">
    <fieldset class="formFieldset">
        <legend class="title">
            <h2>Connexion</h2>
        </legend>

        <div class="formDiv">
            <div class="formDivEle">
                <label class="formLabel" for="emailId">Mail : </label>
                <input class="formInput" type="email" id="emailId" name="email" placeholder="Saisissez votre email" required autofocus>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
        </div>

        <div class="formDiv">
            <div class="formDivEle">
                <label class="formLabel" for="passcodeId">Mot de passe : </label>
                <input class="formInput" type="password" id="passcodeId" name="passcode" placeholder="Saisissez un mot de passe" required>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
        </div>
        
        <div class="formDiv">
            <div class="formDivEle">
                <input name="action" value="auth" hidden>
                <input class="formSubmit" value="Se connecter" type="submit">
            </div>
        </div>

        <div class="errorForm">
            <?php
            if (!empty($errorSignIn)) {
                echo $errorSignIn;
            }
            if(isset($_SESSION['isLogged'])) {
                header('Location: /onightroof/home');
                exit;
            }
            ?>
        </div>
        <p>Je n'es pas de compte <a href="/onightroof/signUp">cliquez ici</a></p>
        </div>
    </fieldset>
</form>