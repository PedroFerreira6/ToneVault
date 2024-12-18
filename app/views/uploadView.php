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

    <?php
    $local = 2;
    include_once 'headerView.php';
    ?>
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
    <!-- ***** Main Banner Area End ***** -->


    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Apply For <em>Your Audio</em> Here.</h2>
                    </div>
                </div>
                <div class="col-12">
                    <form id="contact" action="" method="post" style="width: 100%;">
                        <div class="row">
                            <div class="col-12" style="width: 100%;">
                                <fieldset>
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" placeholder="Ex. Lyon King" style="width: 100%;" autocomplete="on" required="">
                                </fieldset>
                            </div>
                            <div class="col-12" style="width: 100%;">
                                <fieldset>
                                    <label for="description">Description</label><br>
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
    " autocomplete="on" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-12" style="width: 100%;">
                                <fieldset>
                                    <label for="price">Price Of Item</label>
                                    <input type="text" name="price" id="price" placeholder="0 Toins" style="width: 100%;" autocomplete="on" required="">
                                </fieldset>
                            </div>
                            <br>
                            <div class="col-12" style="width: 100%;">
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
                                        <option value="0">Privado</option>
                                        <option value="1">Publico</option>
                                    </select>
                                </fieldset>
                            </div>
                            <br>
                            <div class="col-12" style="width: 100%;">
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
                                        <option value="0">Only For Listening</option>
                                        <option value="1">Sell The Audio Rights</option>
                                    </select>
                                </fieldset>
                            </div>
                            <br>
                            <div class="col-12" style="width: 100%;">
                                <fieldset>
                                    <label for="file">Your File</label>
                                    <input type="file" id="file" name="myfiles[]" multiple="" style="width: 100%;">
                                </fieldset>
                            </div>
                            <div class="col-12" style="width: 100%;">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button" style="width: 100%;">Publish</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php
    include_once 'footerView.php';
    ?>
</body>

</html>