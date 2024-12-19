<form action="" method="post" class="form signUpForm" id="preventSignUp" >
    <fieldset class="formFieldset">
        <legend class="title">
            <h2>Inscription</h2>
        </legend>
        <div class="formDiv">
            <div class="formDivEle">
                <label class="formLabel" for="lastnameId">Nom :</label>
                <input class="formInput" type="text" id="lastnameId" name="lastname" placeholder="Saisissez votre nom" required autofocus>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>

            <div class="formDivEle">
                <label class="formLabel" for="firstnameId">Prénom :</label>
                <input class="formInput" type="text" id="firstnameId" name="firstname" placeholder="Saisissez votre prénom" required>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
        </div>

        <div class="formDiv">
            <div class="formDivEle">
                <label for="genderId">Genre : </label>
                <select name="gender" id="genderId" class="formSelect">
                    <option value="M" selected>Homme</option>
                    <option value="F">Femme</option>
                </select>
            </div>

            <div class="formDivEle">
                <label for="birthdayId">Date d'anniversaire : </label>
                <input class="formSelDate" type="date" id="birthdayId" name="birthday" required>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
        </div>
        <div class="formDiv">
            <div class="formDivEle">
                <label class="formLabel" for="emailId">Mail :</label>
                <input class="formInput" type="email" id="emailId" name="email" placeholder="Saisissez votre email" required>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
            
            <div class="formDivEle">
                <label class="formLabel" for="passcodeId">Mot de passe :</label>
                <input class="formInput" type="password" id="passcodeId" name="passcode" placeholder="Saisissez un mot de passe" required>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
        </div>

        <div class="formDiv">

            <div class="formDivEle">
                <label class="formLabel" for="phoneNbrId">Téléphone portable : </label>
                <input class="formInput" type="number" id="phoneNbrId" name="phoneNbr" placeholder="Saisissez votre tel" required>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
            <div class="formDivEle">
                <input name="action" value="insert" hidden>
                <input class="formSubmit" type="submit">
            </div>
        </div>
        <div class="errorForm">
            <?php
            if (!empty($errorMessage)) {
                echo $errorMessage;
            }
            if(!empty($_SESSION)){ 
                header('Location: /onightroof/home');
                exit();
            }
            ?>
        </div>
        <p>J'ai déjà un compte <a href="/onightroof/signIn">cliquez ici</a></p>
    </fieldset>
</form>