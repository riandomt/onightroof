<?php
if (isset($_COOKIE['Rentals'])) {
    $rentals = json_decode($_COOKIE['Rentals'], true) ?? '';
    var_dump($rentals);
} ?>

<h1>Publier une annonce</h1>
<form action="" method="post" class="form">
    <a href="/onightroof/myRentals"><span class="material-icons btnLink">close</span></a>
    <fieldset class="formFieldset">
        <div class="formProgressbar">
            <div class="formProgressbarColor" style="width: 33%;">33%</div>
        </div>
        <div class="title">
            <h2>Informations de bases</h2>
        </div>

        <div class="formDiv">
            <div class="formDivEle">
                <label for="rentalNameid" class="formLabel">Nom de location : </label>
                <input class="formInput" type="text" name="rentalName" id="rentalNameId" placeholder="Le Paul Sabatier"
                    value="<?php echo $rentals['rentalName'] ?? ''; ?>" minlength="3" maxlength="30" autofocus>
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
            <div class="formDivEle">
                <label for="cityId" class="formLabel">Ville : </label>
                <input class="formInput" type="text" name="city" id="cityId" minlength="3" maxlength="50"
                    placeholder="Carcassonne" value="<?php echo $rentals['city'] ?? ''; ?>">
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
        </div>
        <div class="formDiv">
            <div class="formDivEle">
                <label for="zipCodeId" class="formLabel">Code postal : </label>
                <input class="formInput" type="text" name="zipCode" id="zipCodeId" style="width:50px" placeholder="11000"
                    minlength="5" maxlength="5" value="<?php echo $rentals['zipCode'] ?? ''; ?>">
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
            <div class="formDivEle">
                <label for="addressId" class="formLabel">Adresse : </label>
                <input class="formInput" type="text" name="address" id="addressId" style="width:300px" placeholder="36 Rue Alfred de Musset"
                    value="<?php echo $rentals['address'] ?? ''; ?>" minlength="10" maxlength="50">
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
        </div>
        <div class="formDiv">
            <div class="formDivEle">
                <label for="addressComplementId" class="formLabel">Complément d'adresse : </label>
                <input class="formInput" type="text" name="addressComplement" id="addressComplementId" style="width:400px"
                    placeholder="informations suplémentaires..." value="<?php echo $rentals['addressComplement'] ?? ''; ?>"
                    minlength="0" maxlength="50">
                <span class="material-icons validate" style="display: none;">check_circle</span>
            </div>
        </div>

        <div class="formDiv">
            <div class="formDivEle">
                <div>
                    <label for="typeOfRentalId" class="formLabel">Type de logement : </label>
                </div>
                <select name="typeOfRental" id="typeOfRentalId" class="formSelDate">
                    <option value="appartment" <?php if (isset($rentals['typeOfRental']) &&  $rentals['typeOfRental'] == 'appartment')
                                                    echo 'selected'; ?>>Appartement</option>
                    <option value="house" <?php if (isset($rentals['typeOfRental']) && $rentals['typeOfRental'] == 'house')
                                                echo 'selected'; ?>>Maison</option>
                    <option value="bedroom" <?php if (isset($rentals['typeOfRental']) && $rentals['typeOfRental'] == 'bedroom')
                                                echo 'selected'; ?>>Chambre</option>
                </select>

            </div>
        </div>
        <div class="formDiv">
            <div class="formDivEle formColumn">
                <div>
                    <label for="capacityId" class="formLabel">Capacité : </label>
                </div>

                <div class="formAlignCenter">
                    <span class="material-icons">person</span>
                    <input class="formInput" type="number" name="capacity" id="capacityId" style="width:50px"
                        value="<?php echo $rentals['capacity'] ?? 1 ?>" min="1" max="16">
                    <span class="material-icons validate" style="display: none;">check_circle</span>
                </div>
            </div>
            <div class="formDivEle formColumn">
                <div>
                    <label for="bedroomNbrId" class="formLabel">Nombre de chambre(s) : </label>
                </div>

                <div class="formAlignCenter">
                    <span class="material-icons">bedroom_parent</span>
                    <input class="formInput" type="number" name="bedroomNbr" id="bedroomNbrId" style="width:50px"
                        value="<?php echo $rentals['bedroomNbr'] ?? 1 ?>" min="1" max="16">
                    <span class="material-icons validate" style="display: none;">check_circle</span>
                </div>
            </div>

        </div>

        <div class="formDiv">
            <div class="formDivEle formColumn">
                <div>
                    <label for="doubleBedNbrId" class="formLabel">Nombre de lit double : </label>
                </div>
                <div class="formAlignCenter">
                    <span class="material-icons">bed</span>
                    <input class="formInput" type="number" name="doubleBedNbr" id="doubleBedNbrId" style="width:50px"
                        value="<?php echo $rentals['doubleBedNbr'] ?? 0 ?>" min="0" max="50">
                    <span class="material-icons validate" style="display: none;">check_circle</span>
                </div>
            </div>

            <div class="formDivEle formColumn">
                <div>
                    <label for="singleBedNbrId" class="formLabel">Nombre de lit simple : </label>
                </div>
                <div class="formAlignCenter">
                    <span class="material-icons">single_bed</span>
                    <input class="formInput" type="number" name="singleBedNbr" id="singleBedNbrId" style="width:50px"
                        value="<?php echo $rentals['singleBedNbr'] ?? 0 ?>" min="0" max="50">
                    <span class="material-icons validate" style="display: none;">check_circle</span>
                </div>
            </div>

        </div>

        <div class="formDiv">
            <div class="formDivEle formColumn">
                <div>
                    <label for="showerNbrId" class="formLabel">Nombre de douche(s) : </label>
                </div>
                <div class="formAlignCenter">
                    <span class="material-icons">shower</span>
                    <input class="formInput" type="number" name="showerNbr" id="showerNbrId" style="width:50px"
                        value="<?php echo $rentals['showerNbr'] ?? 0 ?>" min="0" max="50">
                    <span class="material-icons validate" style="display: none;">check_circle</span>
                </div>
            </div>
        </div>

        <div class="formDiv">
            <div class="formDivEle formColumn">
                <label for="lblRentalId">Description : </label>
                <textarea class="formTextarea formInput" name="lblRental" id="lblRentalId"
                    placeholder="Ecrivez des informations utiles sur votre logement"
                    maxlength="300" minlength="0"><?php echo $rentals['lblRental'] ?? '' ?></textarea>
            </div>
        </div>
        <div class="formDiv">
            <div class="formDivEle">
                <input name="action" value="basicInfo" hidden>
                <input class="formSubmit" type="submit" value="etape suivante">
            </div>
        </div>
    </fieldset>
</form>