<h1>Publier une annonce</h1>

<form action="" method="post" class="form" enctype="multipart/form-data">
    <a href="/onightroof/myRentals/services"><span class="material-icons btnLink">arrow_back_ios</span></a>
    <fieldset class="formFieldset">
        <div class="formProgressbar">
            <div class="formProgressbarColor" style="width: 99%;">99%</div>
        </div>
        <div class="title">
            <h2>Ajouter des Images</h2>
        </div>

        <div class="formDiv">
            <div class="formDivEle formColumn">
                <label for="mainPicId">Photo 1 (principale)</label>
                <input type="file" name="mainPic" id="mainPicId" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="formDivEle formColumn">
                <label for="picTwoId">Photo 2</label>
                <input type="file" name="picTwo" id="picTwoId" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

        <div class="formDiv">
            <div class="formDivEle formColumn">
                <label for="picThreeId">Photo 3</label>
                <input type="file" name="picThree" id="picThreeId" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="formDivEle formColumn">
                <label for="picFourId">Photo 4</label>
                <input type="file" name="picFour" id="picFourId" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

        <div class="formDiv">
            <div class="formDivEle formColumn">
                <label for="picFiveId">Photo 5</label>
                <input type="file" name="picFive" id="picFiveId" accept="image/png, image/jpeg, image/jpg">
            </div>

            <div class="formDivEle">
                <input name="action" value="create" hidden>
                <input class="formSubmit" type="submit" value="publier mon annonce">
            </div>
        </div>
    </fieldset>
</form>
