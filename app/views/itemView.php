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
            <?php if ($audio['idUtilizador'] != $_SESSION['user_id']) { ?>
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
                        <h2><?= $audio['titulo'] ?></h2>
                        <span class="author">
                            <h3><a href="#"><?= $audio['nome'] ?></a></h3>
                        </span>
                        <p><?= $audio['descricao'] ?></p>
                        <?php if (($audio['estado'] == 1) || ($audio['estado'] == 0 && $audio['valor'] == 0) || ($check['result'] == "true")) { ?>
                            <audio controls>
                                <source src="downloads/<?= $audio['ficheiroEnc'] ?>" type="audio/mp3">
                                Your browser is bad (sadface)
                            </audio>
                            <?php if ($audio['estado'] == 1) { ?>
                                <form action="/buy" method="POST">
                                    <label for="quantity-text">Price: <?= $audio['valor'] ?> Toins</label>
                                    <button type="submit" id="form-submit" name="id" class="main-button" value="<?= $audio['id'] ?>">Buy Now</button>
                                </form>

                            <?php } ?>
                        <?php } else { ?>
                            <h6><?php if ($audio['estado'] == 0) echo "<br><strong>Buy just to listen</strong><br>";
                                else echo "<br><strong>Purchase rights</strong><br>";
                                ?></h6>

                            <form action="/buy" method="POST">
                                <label for="quantity-text">Price: <?= $audio['valor'] ?> Toins</label>
                                <button type="submit" id="form-submit" name="id" class="main-button" value="<?= $audio['id'] ?>">Buy Now</button>
                            </form>
                        <?php } ?>
                        <form action="/like" method="POST">
                            <button type="submit" id="form-submit" name="id" class="main-button" value="<?= $audio['id'] ?>">
                                <?php
                                if ($checkLike) {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart-crack"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><path d="m12 13-1-1 2-2-3-3 2-2"/></svg> Disike (You will LOSE 100 Toins)';
                                } else {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg> Like (You will EARN 100 Toins)';
                                }
                                ?>
                            </button>
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <form id="contact" action="/edit?id=<?= $_GET['id'] ?>" method="post" style="width: 100%;">
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
                            <input type="text" name="title" id="title" placeholder="Title" style="width: 100%;" autocomplete="on" required="" value="<?= $audio['titulo'] ?>">
                            <span class="author">
                                <h3><a href="/profile"><?= $audio['nome'] ?></a></h3>
                            </span>
                            <textarea name="description" id="description" placeholder="Give us your idea" style="
    background-color: rgb(40, 43, 47);
    border: 1px solid rgb(64, 66, 69);
    border-radius: 23px;
    color: rgb(175, 175, 175);
    cursor: text;
    display: inline-block;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: normal;
    line-height: 24px;
    margin-bottom: 30px;
    margin-right: 15px;
    outline: none;
    padding: 0 15px;
    text-align: left;
    width: 100%; 
    " autocomplete="on" required=""><?= $audio['descricao'] ?></textarea>
                            <fieldset>
                                <label for="price">Price Of Item</label>
                                <input type="number" name="price" id="price" value="<?= $audio['valor'] ?>" placeholder="0 Toins" style="width: 100%;" autocomplete="on" required="">
                            </fieldset>
                            <fieldset>
                                <label for="privacy">Privacy</label>
                                <select name="privacy" class="form-select" style="
    background-color: rgb(40, 43, 47);
    border: 1px solid rgb(64, 66, 69);
    border-radius: 23px;
    color: rgb(175, 175, 175);
    cursor: text;
    display: inline-block;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: normal;
    line-height: 24px;
    margin-bottom: 30px;
    margin-right: 15px;
    outline: none;
    padding: 0 15px;
    text-align: left;
    width: 100%; 
    ">
                                    <option value="0" <?php if ($audio['privacidade'] == 0) echo "selected" ?>>Private</option>
                                    <option value="1" <?php if ($audio['privacidade'] == 1) echo "selected" ?>>Public</option>
                                </select>
                            </fieldset>
                            <br>
                            <fieldset>
                                <label for="listing-type">Listing Type</label>
                                <select name="listing_type" class="form-select" style="
    background-color: rgb(40, 43, 47);
    border: 1px solid rgb(64, 66, 69);
    border-radius: 23px;
    color: rgb(175, 175, 175);
    cursor: text;
    display: inline-block;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: normal;
    line-height: 24px;
    margin-bottom: 30px;
    margin-right: 15px;
    outline: none;
    padding: 0 15px;
    text-align: left;
    width: 100%; 
    ">
                                    <option value="0" <?php if ($audio['estado'] == 0) echo "selected" ?>>Only For Listening</option>
                                    <option value="1" <?php if ($audio['estado'] == 1) echo "selected" ?>>Sell The Audio Rights</option>
                                </select>
                            </fieldset>

                            <audio controls>
                                <source src="downloads/<?= $audio['ficheiroEnc'] ?>" type="audio/mp3">
                                Your browser is bad (sadface)
                            </audio>
                            <fieldset>
                                <button type="submit" id="form-submit" class="orange-button" style="width: 100%;">Confirm Edit</button>
                            </fieldset>
                            </fieldset>
                </form>
                <form action="/like" method="POST"><button type="submit" id="form-submit" name="id" class="main-button" value="<?= $audio['id'] ?>">
                        <?php
                        if ($checkLike) {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart-crack"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><path d="m12 13-1-1 2-2-3-3 2-2"/></svg> Disike (You will LOSE 100 Toins)';
                        } else {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg> Like (You will EARN 100 Toins)';
                        }
                        ?>
                    </button></form>
        </div>

    </div>

<?php }

            if (!empty($transactionList)) {

?>

    <div class="col-lg-12">
        <div class="current-bid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mini-heading">
                        <h4>Audio Rights Transactions</h4>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
                <?php foreach ($transactionList as $transaction) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="left-img">
                                <img src="app/assets/images/current-01.jpg" alt="">
                            </div>
                            <div class="right-content">
                                <h4>Purchased rights</h4>
                                <a href="/profile?id=<?php echo $transaction['idUtilizadorIn'] ?>">By: <?php echo $transaction['nome_utilizador_in'] ?></a>
                                <br>
                                <a href="/profile?id=<?php echo $transaction['idUtilizadorOut'] ?>">From: <?php echo $transaction['nome_utilizador_out'] ?></a>
                                <div class="line-dec"></div>
                                <h6>Price: <em><?php echo $transaction['valor'] ?> Toins</em></h6>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php
            }
?>
</div>
</div>

<?php
include_once 'footerView.php';
?>
</body>

</html>