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
  <!-- ***** Main Banner Area End ***** -->


  <div class="create-nft">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Publish Your Audio Now!!!</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="main-button">
            <a href="publicar">PUBLISH AUDIO</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item first-item">
            <div class="number">
              <h6>1</h6>
            </div>
            <div class="icon">
              <img src="app/assets/images/icon-03.png" alt="">
            </div>
            <h4>Publish</h4>
            <p>Publish your audio files.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item second-item">
            <div class="number">
              <h6>2</h6>
            </div>
            <div class="icon">
              <img src="app/assets/images/icon-04.png" alt="">
            </div>
            <h4>Sell</h4>
            <p>Set a price for your audio files.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item">
            <div class="icon">
              <img src="app/assets/images/icon-05.png" alt="">
            </div>
            <h4>Earn</h4>
            <p>Earn Toins from purchases of your audio files.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> on the market.</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid">
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="app/assets/images/MusicImage.png" alt="" style="border-radius: 20px; min-width: 195px;max-height:300px">
                </div>
                <div class="right-content">
                  <h4>MusicItem</h4>
                  <span class="author">
                    <h6>AuthorProfile<br><a href="perfil"></h6>
                  </span>
                  <div class="line-dec"></div>
                  <span class="bid">
                    Listen for<br><strong>0 Toins</strong><br>
                  </span>
                  <span class="ends">
                    <br><strong>purchase rights</strong><br>
                  </span>
                  <div class="text-button">
                    <a href="details.html">View Details</a>
                  </div>
                </div>
              </div>
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