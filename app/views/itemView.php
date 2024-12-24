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
    <!--

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
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

    <?php include_once 'headerView.php'; ?>


    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" style="background-image: url('app/assets/images/3rdBG.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h6>TONEVAULT</h6>
                        <h2>Earn Toins with ToneVault!</h2>
                        <p>With ToneVault, you have the opportunity to publish and sell your audio while interacting with the site to earn Toins. Accumulate Toins and use them to purchase amazing audio on the platform.</p>
                        <div class="buttons">
                            <div class="border-button">
                                <a href="procurar">Browse Audio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel">
                        <div class="item">
                            <img src="app/assets/images/vault3.png" alt="">
                        </div>
                        <div class="item">
                            <img src="app/assets/images/ilusIMG.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>View Details <em>For Audio</em> Here.</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="left-image">
                        <img src="app/assets/images/ilusIMG.png" alt="" style="border-radius: 20px;">
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <h4><?= $audio['titulo'] ?></h4>
                    <span class="author">
                        <h3><a href="#"><?= $audio['nome'] ?></a></h3>
                    </span>
                    <p><?= $audio['descricao'] ?><?= $check['result'] ?></p>
                    <?php if (($audio['idUtilizador'] == $_SESSION['user_id']) || ($audio['estado'] == 0 && $audio['valor'] == 0) || ($check['result']) == "true") { ?>
                        <audio controls>
                            <source src="downloads/<?=$audio['ficheiroEnc']?>" type="audio/mp3">
                            Your browser is bad (sadface)
                        </audio>

                    <?php } else { ?>
                        <h6><?php if ($audio['estado'] == 0) echo "<br><strong>Buy just to listen</strong><br>";
                            else echo "<br><strong>Purchase rights</strong><br>";
                            ?></h6>

                        <form action="submit">
                            <label for="quantity-text">Price: <?= $audio['valor'] ?> Toins</label>
                            <button type="submit" id="form-submit" class="main-button">Buy Now</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'footerView.php';
    ?>
</body>

</html>