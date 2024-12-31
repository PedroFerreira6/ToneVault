    <?php

    ?>
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

-->
    </head>

    <body>


      <?php
      $local = 3;
      include_once 'headerView.php'; ?>
      <div class="page-heading normal-space">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h6>Profile</h6>
              <h2>View The Details Of This Profile</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="author-page">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="author">
                <img src="app/assets/images/single-author.jpg" alt="" style="border-radius: 50%; max-width: 170px;">
                <h4><?php echo $userData['nome']; ?><br> <a href="#"><?php echo $userData['email']; ?></a></h4>
              </div>
            </div>

            <?php
            if (!isset($_GET['id'])) {
            ?>
              <div class="col-lg-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h2>Change <em>Password</em>.</h2>
                </div>
              </div>
              <div class="col-12" style="margin-bottom:0;
              ">
                <form id="contact" action="/profile/editPassword" enctype="multipart/form-data" method="post" style="width: 100%;">
                  <div class="row">
                    <div class="col-12" style="width: 100%;">
                      <fieldset>
                        <label for="title">Password</label>
                        <input type="password" name="password" id="title" placeholder="Password" style="width: 100%;" autocomplete="on" required="">
                      </fieldset>
                    </div>
                    <div class="col-12" style="width: 100%;">
                      <fieldset>
                        <label for="title">Confirm Password</label>
                        <input type="password" name="password" id="title" placeholder="Confirm Pasword" style="width: 100%;" autocomplete="on" required="">
                      </fieldset>
                    </div>
                    <br>
                    <div class="col-12" style="width: 100%;">
                      <fieldset>
                        <button type="submit" id="form-submit" class="orange-button" style="width: 100%;    font-size: 14px;
    color: #fff;
    background-color: #7453fc;
    border: 1px solid #7453fc;
    padding: 12px 30px;
    display: inline-block;
    border-radius: 25px;
    font-weight: 500;
    text-transform: capitalize;
    letter-spacing: 0.5px;
    transition: all .3s;
    position: relative;
    overflow: hidden;">Publish</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            <?php
            }
            ?>
            <div class="col-lg-12">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h2>My <em>Items</em>.</h2>
              </div>
            </div>

            <?php foreach ($audioData as $audio) { ?>

              <div class="col-lg-3 col-md-6">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-12">
                      <span class="author">
                        <img src="app/assets/images/author.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
                      </span>
                      <img src="app/assets/images/discover-03.jpg" alt="" style="border-radius: 20px;">
                      <h4><?= $audio['titulo'] ?></h4>
                    </div>
                    <div class="col-lg-12">
                      <div class="line-dec"></div>
                      <div class="row">
                        <div class="col-6">
                          <span>Price: <br> <strong><?= $audio['valor'] ?> Toins</strong></span>
                        </div>
                        <div class="col-6">
                          <span>User: <br> <strong><?= $userData['nome'] ?></strong></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="main-button">
                        <a href="/item?id=<?= $audio['id'] ?>">View Details</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>


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