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
    $local = 1;
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
                        <p>With ToneVault, you can publish and sell your audio while interacting with the site to earn Toins. Accumulate Toins and use them to purchase amazing audio on the platform.</p>
                        <div class="buttons">
                            <div class="border-button">
                                <a href="/home">Browse Audio</a>
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

    <div class="currently-market">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <div class="col-lg-7">
                            <form action="/search" id="search-form" method="get" role="search">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input type="text" name="s" class="searchText" placeholder="Type Something..." autocomplete="on">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-2">
                                        <fieldset>
                                            <button class="main-button">Search</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="line-dec"></div>
                        <h2>Searched <em>Items</em>.</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row grid">
                        <!-- Display each audio item -->
                        <?php foreach ($audiosList as $audio): ?>
                            <div class="col-lg-6 currently-market-item all msc">
                                <div class="item">
                                    <div class="left-image">
                                        <img src="app/assets/images/MusicImage.png" alt="" style="border-radius: 20px; min-width: 195px; max-height: 300px;">
                                    </div>
                                    <div class="right-content">
                                        <h4><?= htmlspecialchars($audio['titulo']); ?></h4>
                                        <span class="author">
                                            <h6><?= htmlspecialchars($audio['nome']); ?><br></h6>
                                        </span>
                                        <div class="line-dec"></div>
                                        <span class="bid">
                                            Listen for<br><strong><?= htmlspecialchars($audio['valor']); ?> Toins</strong><br>
                                        </span>
                                        <span class="ends">
                                            <?= $audio['estado'] == 0 ? "<br><strong>Buy just to listen</strong><br>" : "<br><strong>Purchase rights</strong><br>"; ?>
                                        </span>
                                        <div class="text-button">
                                            <a href="/item?id=<?= htmlspecialchars($audio['id']); ?>">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?= $page - 1; ?>" class="prev">«</a>
                        <?php endif; ?>
                        
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="?page=<?= $i; ?>" class="<?= $i == $page ? 'active' : ''; ?>"><?= $i; ?></a>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <a href="?page=<?= $page + 1; ?>" class="next">»</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footerView.php'; ?>
</body>

</html>
