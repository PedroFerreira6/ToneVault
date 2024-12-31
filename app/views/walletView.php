<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>ToneVault</title>
    <link rel="icon" href="app/assets/images/logo/logo.svg" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="app/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="app/assets/css/fontawesome.css">
    <link rel="stylesheet" href="app/assets/css/templatemo-liberty-market.css">
    <link rel="stylesheet" href="app/assets/css/owl.css">
    <link rel="stylesheet" href="app/assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <?php
    $local = 4;
    include_once 'headerView.php';
    ?>
    <div class="page-heading normal-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>Wallet</h6>
                    <h2>View The Details Of Your Wallet</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="author-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="author">
                        <img src="app/assets/images/logo/Toin.png" alt="" style="border-radius: 50%; max-width: 170px;">
                        <h4 style="font-size:40px"><?= $saldo ?> <em style="color:#7453fc;">Toins</em></h4>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Your Purchase History.<em>(When You Buy)</em></h2>
                    </div>
                </div>
                <?php foreach ($compras as $compra) { ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="author">
                                        <img src="app/assets/images/author.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
                                    </span>
                                    <img src="app/assets/images/discover-03.jpg" alt="" style="border-radius: 20px;">
                                    <h4><?= $compra['titulo_audio'] ?></h4>
                                </div>
                                <div class="col-lg-12">
                                    <div class="line-dec"></div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Price: <br> <strong><?= $compra['valor_compra'] ?> Toins</strong></span>
                                        </div>
                                        <div class="col-6">
                                            <span>User: <br> <strong><?= $compra['nome_dono_audio'] ?></strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="/item?id=<?= $compra['audio_id'] ?>">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Your Transaction History.<em>(When You buy)</em></h2>
                    </div>
                </div>
                <?php foreach ($transacoes as $transacao) { ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="author">
                                        <img src="app/assets/images/author.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
                                    </span>
                                    <img src="app/assets/images/discover-03.jpg" alt="" style="border-radius: 20px;">
                                    <h4><?= $transacao['titulo_audio'] ?></h4>
                                </div>
                                <div class="col-lg-12">
                                    <div class="line-dec"></div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Price: <br> <strong><?= $transacao['valor_transacao'] ?> Toins</strong></span>
                                        </div>
                                        <div class="col-6">
                                            <span>User: <br> <strong><?= $transacao['nome_antigo_dono'] ?></strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="/item?id=<?= $transacao['audio_id'] ?>">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Your Purchase History.<em>(When sold)</em></h2>
                    </div>
                </div>
                <?php foreach ($ganhosCompras as $ganhosCompra) { ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="author">
                                        <img src="app/assets/images/author.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
                                    </span>
                                    <img src="app/assets/images/discover-03.jpg" alt="" style="border-radius: 20px;">
                                    <h4><?= $ganhosCompra['titulo_audio'] ?></h4>
                                </div>
                                <div class="col-lg-12">
                                    <div class="line-dec"></div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Price: <br> <strong><?= $ganhosCompra['valor_compra'] ?> Toins</strong></span>
                                        </div>
                                        <div class="col-6">
                                            <span>User: <br> <strong><?= $ganhosCompra['nome_comprador'] ?></strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="/item?id=<?= $ganhosCompra['audio_id'] ?>">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Your Transaction History.<em>(When sold)</em></h2>
                    </div>
                </div>
                <?php foreach ($ganhosTransacoes as $ganhosTransacoe) { ?>

                    <div class="col-lg-3 col-md-6">

                        <div class="item">

                            <div class="row">

                                <div class="col-lg-12">
                                    <span class="author">
                                        <img src="app/assets/images/author.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
                                    </span>
                                    <img src="app/assets/images/discover-03.jpg" alt="" style="border-radius: 20px;">
                                    <h4><?= $ganhosTransacoe['titulo_audio'] ?></h4>
                                </div>
                                <div class="col-lg-12">
                                    <div class="line-dec"></div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Price: <br> <strong><?= $ganhosTransacoe['valor_transacao'] ?> Toins</strong></span>
                                        </div>
                                        <div class="col-6">
                                            <span>User: <br> <strong><?= $ganhosTransacoe['nome_comprador'] ?></strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="/item?id=<?= $ganhosTransacoe['audio_id'] ?>">View Details</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <?php include_once 'footerView.php'; ?>
</body>

</html>