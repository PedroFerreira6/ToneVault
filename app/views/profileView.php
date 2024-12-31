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
              <div class="col-12">
                <form id="contact" action="/upload/start" enctype="multipart/form-data" method="post" style="width: 100%;">
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
                        <input type="number" name="price" id="price" placeholder="0 Toins" style="width: 100%;" autocomplete="on" required="">
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
                          <option value="0">Private</option>
                          <option value="1">Public</option>
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
                        <input type="file" id="file" name="myfile" style="width: 100%;" accept="audio/mp3">
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