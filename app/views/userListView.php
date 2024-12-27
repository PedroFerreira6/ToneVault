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
                        <h2>Users <em>List</em></h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form id="contact">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Balance</th>
                                        <th>Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td style="color:white"><?= htmlspecialchars($user['id']); ?></td>
                                            <td style="color:white"><?= htmlspecialchars($user['nome']); ?></td>
                                            <td style="color:white"><?= htmlspecialchars($user['email']); ?></td>
                                            <td style="color:white"><?= htmlspecialchars(string: $user['saldo']); ?></td>
                                            <td style="color:white"><?php if($user['nivel'] == 1){ echo 'User'; }elseif($user['nivel'] == 2){ echo 'Moderator'; }if($user['nivel'] == 3){ echo 'Admin'; } ?></td>
                                            

                                            <td>
                                            <?php
                                            if ($user['id'] == $_SESSION['user_id']) {
                                                echo '<span class="text-muted">Cannot Edit Yourself</span>';
                                            }
                                            elseif ($_SESSION['nivel'] == 2 && $user['nivel'] == 3) {
                                                echo '<span class="text-muted">No Access</span>';
                                            }elseif ($_SESSION['nivel'] == 3 && $user['nivel'] == 3) {
                                                echo '<span class="text-muted">No Access</span>';
                                            }
                                            else {
                                                echo '<a href="/editUser?id=' . $user['id'] . '" class="btn btn-warning btn-sm" style="background-color:#7453fc; border-color:#7453fc;">Edit</a>';
                                            }
                                            ?>
                                        </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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




