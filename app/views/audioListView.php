<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Tonevault - List Audios</title>

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
    <!-- Preloader Start -->
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
    <!-- Preloader End -->

    <!-- Header Area Start -->
    <?php require 'headerView.php'; ?>
    <!-- Header Area End -->

    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Audio <em>List</em></h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form id="contact">
                        <div class="table-responsive">
                            <div class="col-lg-12">
                                <form id="search-form" class="mb-4">
                                    <input
                                        type="text"
                                        id="search-input"
                                        class="form-control"
                                        placeholder="Search audios by title or description..."
                                        onkeyup="filterAudios()" />
                                </form>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Títle</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Privacy</th>
                                        <th>State</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($audios as $audio): ?>
                                        <tr>
                                            <td style="color:white"><?= htmlspecialchars($audio['titulo']); ?></td>
                                            <td style="color:white"><?= htmlspecialchars($audio['descricao']); ?></td>
                                            <td style="color:white"><?= htmlspecialchars($audio['valor']); ?> €</td>
                                            <td style="color:white"><?= $audio['privacidade'] ? 'Privado' : 'Público'; ?></td>
                                            <td style="color:white"><?= $audio['estado'] ? 'Ativo' : 'Inativo'; ?></td>
                                            <td>
                                                <a href="/item?id=<?= $audio['id']; ?>" class="btn btn-info btn-sm">See</a>
                                                <?php if ($_SESSION['user_id'] == $audio['idUtilizador'] || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3): ?>
                                                    <a href="/editAudio?id=<?= $audio['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="/deleteAudio?id=<?= $audio['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you wish to permanetly delete this audio?');">Delete</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require 'footerView.php'; ?>
</body>
<script>
    function filterAudios() {
        const searchValue = document
            .getElementById("search-input")
            .value.toLowerCase();

        const tableRows = document
            .querySelectorAll("table tbody tr");

        tableRows.forEach(row => {
            const title = row.children[0].textContent.toLowerCase(); 
            const description = row.children[1].textContent.toLowerCase(); 

            if (
                title.includes(searchValue) ||
                description.includes(searchValue)
            ) {
                row.style.display = ""; 
            } else {
                row.style.display = "none"; 
            }
        });
    }
</script>

</html>