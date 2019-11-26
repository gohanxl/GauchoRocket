<?php

    if(isset($_POST['pasaje'])){
        $idPasaje = $_POST['pasaje'];
    }

    if(isset($_POST['confirmar'])){
        $idPasaje = $_POST['pasaje'];
        compraPasaje($idPasaje, date("Y-m-d H:i:s"));
        header('Location: /pasaje/confirmado');
    }
?>

<div class="container py-5">

    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h2 class="display-4">Compra de pasaje</h2>
        </div>
    </div>
    <!-- End -->

    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">

                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <form action='' method='POST'>
                            <div class="form-group">
                                <label for="username">Nombre completo (como figura en la tarjeta)</label>
                                <input type="text" name="username" placeholder="Nombre completo" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cardNumber">Número de la tarjeta</label>
                                <div class="input-group">
                                    <input type="text" name="cardNumber" placeholder="Número de la tarjeta" class="form-control" required>
                                    <div class="input-group-append">
                                    <span class="input-group-text text-muted">
                                        <i class="fa fa-cc-visa mx-1"></i>
                                        <i class="fa fa-cc-amex mx-1"></i>
                                        <i class="fa fa-cc-mastercard mx-1"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Expiration</span></label>
                                        <div class="input-group">
                                            <input type="number" placeholder="MM" name="" class="form-control" required>
                                            <input type="number" placeholder="YY" name="" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                            <i class="fa fa-question-circle"></i>
                                        </label>
                                        <input type="text" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php
                            echo "<input type='hidden' name='pasaje' value=" . $idPasaje . ">";
                            ?>
                            <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm" name="confirmar"> Confirmar  </button>
                        </form>
                    </div>
        </div>
    </div>
</div>