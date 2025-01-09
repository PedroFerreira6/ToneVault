<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Tonevault - List users</title>

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

    <!-- ***** Header Area Start ***** -->
    <?php require 'headerView.php'  ?>
    <!-- ***** Header Area End ***** -->



    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Edit <em> <?= htmlspecialchars($user['nome']); ?></em></h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form id="contact" method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">

                        <div class="mb-3">
                            <label for="nome" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($user['nome']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="saldo" class="form-label">Balance</label>
                            <input type="number" step="0.01" class="form-control" id="saldo" name="saldo" value="<?= htmlspecialchars($user['saldo']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="nivel" class="form-label">Level</label>
                            <select class="form-control" id="nivel" name="nivel" required>
                                <option value="1" <?= $user['nivel'] == 1 ? 'selected' : ''; ?>>User</option>
                                <option value="2" <?= $user['nivel'] == 2 ? 'selected' : ''; ?>>Moderator</option>
                                <?php if($_SESSION['nivel']==3){ ?><option value="3" <?= $user['nivel'] == 3 ? 'selected' : ''; ?>>Admin</option> <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <br>
                        <br>

                        <a href="/listUsers" class="btn btn-secondary">Cancel</a>


                    </form>
                </div>


                <div class="col-lg-7">
                    <div class="left-image">
                        <img src="assets/images/create-yours.jpg" alt="" style="border-radius: 20px;">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require 'footerView.php'  ?>

</body>

</html>