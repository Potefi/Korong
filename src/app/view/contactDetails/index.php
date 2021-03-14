<div class="container text-center vertical-align">
    <!-- PC view -->
    <div class="d-none d-md-flex row bg-white shadow rounded my-5">
        <div class="col-12 border-bottom">
            <h1 class="mt-2 mb-3 display-4">Kapcsolat</h1>
        </div>
        <div class="col-4 pt-2 border-bottom border-right">
            <h2 class="display-6">Cégnév</h2>
            <p>Korong Kft.</p>
        </div>
        <div class="col-4 pt-2 border-bottom border-right">
            <h2 class="display-6">Cím</h2>
            <p>2234 Maglód, Madách Imre utca 12</p>
        </div>
        <div class="col-4 pt-2 border-bottom">
            <h2 class="display-6">Email</h2>
            <p>zazi.szabo@gmail.com</p>
        </div>
        <div class="col-4 pt-2 border-right border-bottom">
            <h2 class="display-6">Telefon</h2>
            <p>+36304759162</p>
        </div>
        <div class="col-4 pt-2 border-right border-bottom">
            <h2 class="display-6">Nyitvatartás</h2>
            <div class="container">
                <div class="row pb-3">
                    <div class="col-6 text-right">Hétfő:</div>
                    <div class="col-6 text-left">8:00-17:00</div>
                    <div class="col-6 text-right">Kedd:</div>
                    <div class="col-6 text-left">8:00-17:00</div>
                    <div class="col-6 text-right">Szerda:</div>
                    <div class="col-6 text-left">8:00-17:00</div>
                    <div class="col-6 text-right">Csütörtök:</div>
                    <div class="col-6 text-left">8:00-17:00</div>
                    <div class="col-6 text-right">Péntek:</div>
                    <div class="col-6 text-left">8:00-17:00</div>
                    <div class="col-6 text-right">Szombat:</div>
                    <div class="col-6 text-left">10:00-15:00</div>
                    <div class="col-6 text-right">Vasárnap:</div>
                    <div class="col-6 text-left"><b>zárva</b></div>
                </div>
            </div>
        </div>
        <div class="col-4 pt-2 border-bottom">
            <h2 class="display-6">Adószám</h2>
            <p>01010101-0-01</p>
        </div>
        <div class="col-12 pt-2">
            <h2 class="display-6">Cégjegyzékszám</h2>
            <p>01-10-010110</p>
        </div>
    </div>
    <div class="d-none d-md-flex row bg-white rounded shadow my-5">
        <div class="col-12 pt-2">
            <h2 class="display-6">Írj nekünk!</h2>
        </div>
        <div class="container px-5 pb-5 pt-3">
            <?php include('form.php'); ?>
        </div>
    </div>


    <!-- Mobile view -->
    <div class="d-block d-md-none">
        <div class="row mt-3 mb-2">
            <h1 class="display-1">Kapcsolat</h1>
        </div>
        <div class="table-responsive shadow mb-3 rounded">
            <table class="my-0 table table-striped table-borderless vertical-align">
                <tbody>
                    <tr>
                        <td class="text-left">Cégnév:</td>
                        <td class="text-right">Korong Kft.</td>
                    </tr>
                    <tr>
                        <td class="text-left">Cím:</td>
                        <td class="text-right">2234 Maglód, Madách Imre utca 12</td>
                    </tr>
                    <tr>
                        <td class="text-left">Email:</td>
                        <td class="text-right">zazi.szabo@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="text-left">Telefon:</td>
                        <td class="text-right">+36304759162</td>
                    </tr>
                    <tr>
                        <td class="text-left">Adószám:</td>
                        <td class="text-right">01010101-0-01</td>
                    </tr>
                    <tr>
                        <td class="text-left">Nyitvatartás:</td>
                        <td>
                            <table class="table table-borderless text-right my-0">
                                <tbody>
                                    <tr>
                                        <td class="my-0 py-0">Hétfő:</td>
                                        <td class="my-0 py-0">8:00-17:00</td>
                                    </tr>
                                    <tr>
                                        <td class="my-0 py-0">Kedd:</td>
                                        <td class="my-0 py-0">8:00-17:00</td>
                                    </tr>
                                    <tr>
                                        <td class="my-0 py-0">Szerda:</td>
                                        <td class="my-0 py-0">8:00-17:00</td>
                                    </tr>
                                    <tr>
                                        <td class="my-0 py-0">Csütörtök:</td>
                                        <td class="my-0 py-0">8:00-17:00</td>
                                    </tr>
                                    <tr>
                                        <td class="my-0 py-0">Péntek:</td>
                                        <td class="my-0 py-0">8:00-17:00</td>
                                    </tr>
                                    <tr>
                                        <td class="my-0 py-0">Szombat:</td>
                                        <td class="my-0 py-0">10:00-15:00</td>
                                    </tr>
                                    <tr>
                                        <td class="my-0 py-0">Vasárnap:</td>
                                        <td class="my-0 py-0"><b>zárva</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left pb-3">Cégjegyzékszám:</td>
                        <td class="text-right pb-3">01-10-010110</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bg-white shadow rounded mb-3 p-2">
            <h2 class="display-6">Írj nekünk!</h2>
            <?php include('form.php'); ?>
        </div>
    </div>
</div>