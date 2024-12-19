<?php if (isset($_COOKIE['Services'])) {
    $services = json_decode($_COOKIE['Services'], true) ?? '';
    $shower = $services['shower'];
    $kitchen = $services['kitchen'];
    $livingRoom = $services['livingRoom'];
    $temperature = $services['temperature'];
    $security = $services['security'];
    $accessibility = $services['accessibility'];
} ?>

<h1>Publier une annonce</h1>

<form action="" method="post" class="form">
    <a href="/onightroof/myRentals/basicInfo"><span class="material-icons btnLink">arrow_back_ios</span></a>
    <fieldset class="formFieldset">
        <div class="formProgressbar">
            <div class="formProgressbarColor" style="width: 66%;">66%</div>
        </div>
        <div class="title">
            <h2>Booster votre location</h2>
        </div>

        <div>
            <div>
                <div class="title">
                    <h3>Douche</h3>
                </div>
                <div class="formDiv">

                    <!-- Serviette(s) -->
                    <div class="formDivEle radio formColumn">
                        <div>
                            <label class="formLabel">Serviette(s)</label>
                        </div>
                        <div class="formRadio">
                            <label class="formLabelRadio" for="towelYes">
                                <input type="radio" name="towel" id="towelYes" value="1"
                                    <?php if (isset($shower['towel']) && $shower['towel'] == 1) {
                                        echo 'checked';
                                    }
                                    if (!isset($shower['towel'])) {
                                        echo 'checked';
                                    } ?>>
                                <span>Oui</span>
                            </label>
                            <label class="formLabelRadio" for="towelNo">
                                <input type="radio" name="towel" id="towelNo" value="0"
                                    <?php if (isset($shower['towel']) && $shower['towel'] == 0) {
                                        echo 'checked';
                                    } ?>>
                                <span>Non</span>
                            </label>
                        </div>
                    </div>

                    <!-- Savon(s) -->
                    <div class="formDivEle radio formColumn">
                        <div>
                            <label class="formLabel">Savon(s)</label>
                        </div>
                        <div class="formRadio">
                            <label class="formLabelRadio" for="soapYes">
                                <input type="radio" name="soap" id="soapYes" value="1"
                                    <?php if (isset($shower['soap']) && $shower['soap'] == 1) {
                                        echo 'checked';
                                    }
                                    if (!isset($shower['soap'])) {
                                        echo 'checked';
                                    } ?>>
                                <span>Oui</span>
                            </label>
                            <label class="formLabelRadio" for="soapNo">
                                <input type="radio" name="soap" id="soapNo" value="0"
                                    <?php if (isset($shower['soap']) && $shower['soap'] == 0) {
                                        echo 'checked';
                                    } ?>>
                                <span>Non</span>
                            </label>
                        </div>
                    </div>

                    <!-- Sèche cheveux -->
                    <div class="formDivEle radio formColumn">
                        <div>
                            <label class="formLabel">Sèche cheveux</label>
                        </div>
                        <div class="formRadio">
                            <label class="formLabelRadio">
                                <input type="radio" name="hairDryer" id="hairDryerYes" value="1"
                                    <?php if (isset($shower['hairDryer']) && $shower['hairDryer'] == 1) {
                                        echo 'checked';
                                    }
                                    if (!isset($shower['hairDryer'])) {
                                        echo 'checked';
                                    } ?>>
                                <span>Oui</span>
                            </label>
                            <label class="formLabelRadio">
                                <input type="radio" name="hairDryer" id="hairDryerNo" value="0"
                                    <?php if (isset($shower['hairDryer']) && $shower['hairDryer'] == 0) {
                                        echo 'checked';
                                    } ?>>
                                <span>Non</span>
                            </label>
                        </div>
                    </div>

                </div>

                <div class="formDiv">

                    <!-- Sèche linge -->
                    <div class="formDivEle radio formColumn">
                        <div>
                            <label class="formLabel">Sèche linge</label>
                        </div>
                        <div class="formRadio">
                            <label class="formLabelRadio" for="dryerYes">
                                <input type="radio" name="dryer" id="dryerYes" value="1"
                                    <?php if (isset($shower['dryer']) && $shower['dryer'] == 1) {
                                        echo 'checked';
                                    }
                                    if (!isset($shower['dryer'])) {
                                        echo 'checked';
                                    } ?>>
                                <span>Oui</span>
                            </label>
                            <label class="formLabelRadio" for="dryerNo">
                                <input type="radio" name="dryer" id="dryerNo" value="0"
                                    <?php if (isset($shower['dryer']) && $shower['dryer'] == 0) {
                                        echo 'checked';
                                    } ?>>
                                <span>Non</span>
                            </label>
                        </div>
                    </div>

                    <!-- Machine à laver -->
                    <div class="formDivEle radio formColumn">
                        <div>
                            <label class="formLabel">Machine à laver</label>
                        </div>
                        <div class="formRadio">
                            <label class="formLabelRadio">
                                <input type="radio" name="washingMachine" id="washingMachineYes" value="1"
                                    <?php if (isset($shower['washingMachine']) && $shower['washingMachine'] == 1) {
                                        echo 'checked';
                                    }
                                    if (!isset($shower['washingMachine'])) {
                                        echo 'checked';
                                    } ?>>
                                <span>Oui</span>
                            </label>
                            <label class="formLabelRadio">
                                <input type="radio" name="washingMachine" id="washingMachineNo" value="0"
                                    <?php if (isset($shower['washingMachine']) && $shower['washingMachine'] == 0) {
                                        echo 'checked';
                                    } ?>>
                                <span>Non</span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <div>

                <div>
                    <div class="title">
                        <h3>Cuisine</h3>
                    </div>

                    <div class="formDiv">

                        <!-- Four -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Four</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="oven" id="ovenYes" value="1"
                                        <?php if (isset($kitchen['oven']) && $kitchen['oven'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($kitchen['oven'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="oven" id="ovenNo" value="0"
                                        <?php if (isset($kitchen['oven']) && $kitchen['oven'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Four à micro-ondes -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Four à micro-ondes</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="microwaveOven" id="microwaveOvenYes" value="1"
                                        <?php if (isset($kitchen['microwaveOven']) && $kitchen['microwaveOven'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($shower['microwaveOven'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="microwaveOven" id="microwaveOvenNo" value="0"
                                        <?php if (isset($kitchen['microwaveOven']) && $kitchen['microwaveOven'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Réfrigérateur -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Réfrigérateur</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="refrigerator" id="refrigeratorYes" value="1"
                                        <?php if (isset($kitchen['refrigerator']) && $kitchen['refrigerator'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($kitchen['refrigerator'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="refrigerator" id="refrigeratorNo" value="0"
                                        <?php if (isset($kitchen['refrigerator']) && $kitchen['refrigerator'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="formDiv">

                        <!-- Table à manger -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Table à manger</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="diningTable" id="diningTableYes" value="1"
                                        <?php if (isset($kitchen['diningTable']) && $kitchen['diningTable'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($kitchen['diningTable'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="diningTable" id="diningTableNo" value="0"
                                        <?php if (isset($kitchen['diningTable']) && $kitchen['diningTable'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Équipements de cuisine -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Équipements de cuisine</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="kitchenEquipment" id="kitchenEquipmentYes" value="1"
                                        <?php if (isset($kitchen['kitchenEquipment']) && $kitchen['kitchenEquipment'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($kitchen['kitchenEquipment'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="kitchenEquipment" id="kitchenEquipmentNo" value="0"
                                        <?php if (isset($kitchen['kitchenEquipment']) && $kitchen['kitchenEquipment'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>



                <div>
                    <div class="title">
                        <h3>Salon</h3>
                    </div>

                    <div class="formDiv">

                        <!-- Canapé -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Canapé</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="sofa" id="sofaYes" value="1"
                                        <?php if (isset($livingRoom['sofa']) && $livingRoom['sofa'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($livingRoom['sofa'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="sofa" id="sofaNo" value="0"
                                        <?php if (isset($livingRoom['sofa']) && $livingRoom['sofa'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Télévision -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Télévision</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="tv" id="tvYes" value="1"
                                        <?php if (isset($livingRoom['tv']) && $livingRoom['tv'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($livingRoom['tv'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="tv" id="tvNo" value="0"
                                        <?php if (isset($livingRoom['tv']) && $livingRoom['tv'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Wifi -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Wifi</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="wifi" id="wifiYes" value="1"
                                        <?php if (isset($livingRoom['wifi']) && $livingRoom['wifi'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($livingRoom['wifi'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="wifi" id="wifiNo" value="0"
                                        <?php if (isset($livingRoom['wifi']) && $livingRoom['wifi'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>


                <div>
                    <div class="title">
                        <h3>Température</h3>
                    </div>

                    <div class="formDiv">

                        <!-- Chauffage -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Chauffage</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="heating" id="heatingYes" value="1"
                                        <?php if (isset($temperature['heating']) && $temperature['heating'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($temperature['heating'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="heating" id="heatingNo" value="0"
                                        <?php if (isset($temperature['heating']) && $temperature['heating'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Climatisation -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Climatisation</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="airConditioning" id="airConditioningYes" value="1"
                                        <?php if (isset($temperature['airConditioning']) && $temperature['airConditioning'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($temperature['airConditioning'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="airConditioning" id="airConditioningNo" value="0"
                                        <?php if (isset($temperature['airConditioning']) && $temperature['airConditioning'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Ventilateur -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Ventilateur</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="airFan" id="airFanYes" value="1"
                                        <?php if (isset($temperature['airFan']) && $temperature['airFan'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($temperature['airFan'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="airFan" id="airFanNo" value="0"
                                        <?php if (isset($temperature['airFan']) && $temperature['airFan'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="title">
                        <h3>Sécurité</h3>
                    </div>

                    <div class="formDiv">

                        <!-- Détecteur de fumée -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Détecteur de fumée</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="smokeDetector" id="smokeDetectorYes" value="1"
                                        <?php if (isset($security['smokeDetector']) && $security['smokeDetector'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($security['smokeDetector'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="smokeDetector" id="smokeDetectorNo" value="0"
                                        <?php if (isset($security['smokeDetector']) && $security['smokeDetector'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Détecteur de monoxyde de carbone -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Détecteur de monoxyde de carbone</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="carbonMonoxydeDetector" id="carbonMonoxydeDetectorYes" value="1"
                                        <?php if (isset($security['carbonMonoxydeDetector']) && $security['carbonMonoxydeDetector'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($security['carbonMonoxydeDetector'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="carbonMonoxydeDetector" id="carbonMonoxydeDetectorNo" value="0"
                                        <?php if (isset($security['carbonMonoxydeDetector']) && $security['carbonMonoxydeDetector'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Extincteur -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Extincteur</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="fireExtinguisher" id="fireExtinguisherYes" value="1"
                                        <?php if (isset($security['fireExtinguisher']) && $security['fireExtinguisher'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($security['fireExtinguisher'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="fireExtinguisher" id="fireExtinguisherNo" value="0"
                                        <?php if (isset($security['fireExtinguisher']) && $security['fireExtinguisher'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="formDiv">

                        <!-- Kit de secours -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Kit de secours</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="safetyKit" id="safetyKitYes" value="1"
                                        <?php if (isset($security['safetyKit']) && $security['safetyKit'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($security['safetyKit'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="safetyKit" id="safetyKitNo" value="0"
                                        <?php if (isset($security['safetyKit']) && $security['safetyKit'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="title">
                        <h3>Accessibilité</h3>
                    </div>

                    <div class="formDiv">

                        <!-- Plein pieds -->
                        <div class="formDivEle radio formColumn">
                            <div>
                                <label class="formLabel">Plein pieds</label>
                            </div>
                            <div class="formRadio">
                                <label class="formLabelRadio">
                                    <input type="radio" name="singleStorey" id="singleStoreyYes" value="1"
                                        <?php if (isset($accessibility['singleStorey']) && $accessibility['singleStorey'] == 1) {
                                            echo 'checked';
                                        }
                                        if (!isset($accessibility['singleStorey'])) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Oui</span>
                                </label>
                                <label class="formLabelRadio">
                                    <input type="radio" name="singleStorey" id="singleStoreyNo" value="0"
                                        <?php if (isset($accessibility['singleStorey']) && $accessibility['singleStorey'] == 0) {
                                            echo 'checked';
                                        } ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Nombre de places de parking -->
                        <div class="formDivEle formColumn">
                            <div>
                                <label for="nbrOfParkingSpacesId" class="formLabel">Nombre de places de parking :</label>
                            </div>
                            <div class="formAlignCenter">
                                <span class="material-icons">local_parking</span>
                                <input class="formInput" type="number" name="nbrOfParkingSpaces" id="nbrOfParkingSpacesId" style="width:50px"
                                    value="<?php if(isset($accessibility['nbrOfParkingSpaces'])){
                                        echo $accessibility['nbrOfParkingSpaces'];
                                    } else {
                                        echo 0;
                                    }?>"
                                    min="0" max="50">
                                <span class="material-icons validate" style="display: none;">check_circle</span>
                            </div>

                        </div>

                    </div>
                </div>


                <div>
                    <div class="formDiv">
                        <div class="formDivEle">
                            <input name="action" value="services" hidden>
                            <input class="formSubmit" type="submit" value="etape suivante">
                        </div>
                    </div>
                </div>
            </div>
    </fieldset>

</form>