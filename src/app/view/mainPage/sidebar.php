<div>
    <div>
        <h4 class="border-bottom pb-2 px-3 pt-3" style="background-color: rgb(237, 240, 244);">Elérhetőség:</h4>
        <div class="mb-3 px-3">
            <h6 class="d-inline">Cím: </h6><p class="d-inline">2234 Maglód, Madách Imre utca 12.</p>
        </div>
        <div class="mb-3 px-3">
            <h6 class="d-inline">Telefonszám: </h6><p class="d-inline">+36304759162</p>
        </div>
        <div class="mb-3 px-3">
            <h6 class="d-inline">Email: </h6><p class="d-inline">zazi.szabo@gmail.com</p>
        </div>
        <div class="pb-2 px-3">
            <h6>Nyitvatartás: </h6>
            <p class="mb-0">Hétfő-péntek: <b>8-17</b> óra</p>
            <p class="mb-0">Szombat: <b>10-15</b> óra</p>
            <p class="mb-0">Vasárnap: <b>zárva</b></p>
        </div>
    </div>
    <div>
        <h4 class="border-bottom border-top pt-3 pb-2 px-3" style="background-color: rgb(237, 240, 244);">Találatok szűrése:</h4>
        <form>
            <div class="mb-3 px-3">
                <label for="artist" class="h6">Előadó: </label>
                <input type="text" name="artist" id="artist" class="form-control input-bg" placeholder="Írd be az előadó nevét.. ">
            </div>
            <!-- <hr> -->
            <div class="mb-3 px-3">
                <label for="album" class="h6">Album: </label>
                <input type="text" name="album" id="album" class="form-control input-bg" placeholder="Írd be az album címét.. ">
            </div>
            <!-- <hr> -->
            <div class="mb-3 px-3">
                <label for="selectFormat" class="h6">Formátum: </label>
                <select name="selectFormat" id="selectFormat" class="form-select input-bg" onchange="userToTable();">
                    <option value="default" hidden selected>Válaszd ki a formátumot..</option>
                    <option value="vinyl">Vinyl LP</option>
                    <option value="cd">CD</option>
                    <option value="dvd">DVD</option>
                    <option value="bluray">Blu-ray</option>
                </select>
            </div>
            <!-- <hr> -->
            <div class="mb-3 px-3">
                <label for="selectCategory" class="h6">Kategória: </label>
                <select name="selectCategory" id="selectCategory" class="form-select input-bg" onchange="userToTable();">
                    <option value="default" hidden selected>Válaszd ki a kategóriát..</option>
                    <option value="pop-rock">Pop/Rock</option>
                    <option value="classical">Klasszikus</option>
                    <option value="movie-soundtrack">Filmzene</option>
                    <option value="rnb-hiphop">R&B/Hip Hop</option>
                    <option value="blues">Blues</option>
                    <option value="jazz">Jazz</option>
                    <option value="movie">Filmek</option>
                </select>
            </div>
            <!-- <hr> -->
            <div class="mb-3 mx-3">
                <h6>Ár: </h6>
                <div class="input-bg rounded px-3 pt-2 priceDiv">
                    <label for="priceRangeMin" id="priceRangeMinLabel" class="form-label">Minimum ár: 1 Ft</label>
                    <input type="range" name="priceRangeMin" id="priceRangeMin" class="form-range" min="1" max="56000" value="1" onmousemove="priceFilterMin()"">
                    <label for="priceRangeMax" id="priceRangeMaxLabel" class="form-label">Maximum ár: 56000 Ft</label>
                    <input type="range" name="priceRangeMax" id="priceRangeMax" class="form-range" min="1" max="56000" value="56000" onmousemove="priceFilterMax()">
                </div>
            </div>
            <button type="submit" class="btn btn-dark float-right mx-3">Szűrés</button>
        </form>
    </div>
</div>