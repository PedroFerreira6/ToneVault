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


    <div class="item-details-page">
        <div class="container">
            <form id="contact" method="post" style="width: 100%;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <div class="line-dec"></div>
                            <h2>Edit <em>Audio</em></h2>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="left-image">
                            <img src="app/assets/images/ilusIMG.png" alt="" style="border-radius: 20px;">
                        </div>
                    </div>
                    <div class="col-lg-5 align-self-center">
                    <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Title" style="width: 100%;" autocomplete="on" required="" value="<?= $audio['titulo'] ?>">
                        <label for="owner">Change Audio Owner</label>
                        <select name="owner" class="form-select" style="background-color: rgb(40, 43, 47); border: 1px solid rgb(64, 66, 69); border-radius: 23px; color: rgb(175, 175, 175); cursor: text; display: inline-block; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 500; letter-spacing: normal; line-height: 24px; margin-bottom: 30px; margin-right: 15px; outline: none; padding: 0 15px; text-align: left; width: 100%;">
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>" <?= $user['id'] == $audio['idUtilizador'] ? 'selected' : '' ?>>
                                    <?= $user['id'] ?> - <?= htmlspecialchars($user['nome'], ENT_QUOTES, 'UTF-8') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="description">Description</label>

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

                    </div>
                    <fieldset>
                        <button type="submit" id="form-submit" class="orange-button" style="width: 100%;">Confirm Edit</button>
                    </fieldset>
                </div>
            </form>

        </div>
    </div>

    <?php
    include_once 'footerView.php';
    ?>
</body>

</html>