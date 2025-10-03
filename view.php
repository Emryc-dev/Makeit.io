<?php

 require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeit.io / id-card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">>
    <style>
        .card{
            width: 510px;
            height: auto;
            position: absolute;
            top: 10%;
            left: 30%;
            box-shadow: 0 0px 3px rgba(205, 197, 197, 0.86), 0 0px 3px 0 rgba(255, 255, 255, 0.46);
        }

        .card .img-fluide{
            width: 120px;
            height: 150px;
            border-radius: 20px;
            object-fit: cover;
        }

        .card .imge-fluid{
            width: 150px;
            height: 70px;
            border-radius: 20px;
            object-fit: contain;
        }
    </style>
</head>
<body class="bg-dark">
    <!--SPINNER-->
    <div id="spinner"
        class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only"></span>
        </div>
    </div>
    <!--SPINNER-->

    <!--CARD-->
    <div class="container-fluid bg-dark">
        <div class="card">
            <div class="card-title text-center">
                <?php if($_SESSION['users']['etablissement'] === 'IUT'): ?>
                   <img src="Logo_IUT_Douala.png" class="imge-fluid" alt="">
                <?php elseif($_SESSION['users']['etablissement'] === 'IUC'): ?>
                   <img src="iuc.jpg" class="imge-fluid" alt="">
                <?php elseif($_SESSION['users']['etablissement'] === 'IUGET'): ?>
                   <img src="IUGET-FR-jpeg.png" class="imge-fluid" alt="">
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="content d-flex justify-content-center align-items-center">
                            <?php
                                if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                                $s = $_SESSION['users_preview'] ?? $_SESSION['users'] ?? null;
                                $photo = 'trois.jpeg';
                                if($s && !empty($s['photo']) && file_exists(__DIR__ . '/uploads/' . $s['photo'])){
                                    $photo = 'uploads/' . $s['photo'];
                                }
                            ?>
                            <img src="<?php echo $photo; ?>" class="img-fluide" alt="">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="content1">
                            <?php if($s): ?>
                                <p>Name: <span class="fw-bold"><?php echo htmlspecialchars($s['nom'] ?? $s['nom']); ?></span></p>
                                <p>Born: <?php echo htmlspecialchars($s['date_de_naissance'] ?? ''); ?> at <?php echo htmlspecialchars($s['lieu_de_naissance'] ?? ''); ?></p>
                                <p>Speciality: <i class="me-2"><?php echo htmlspecialchars($s['specialite'] ?? ''); ?></i> Niveau: <?php echo htmlspecialchars($s['niveau'] ?? ''); ?> Sexe: <b><?php echo htmlspecialchars($s['sexe'] ?? ''); ?></b></p>
                                <p>Matricule: <b><?php echo htmlspecialchars($s['matricule'] ?? ''); ?></b> Contact: <?php echo htmlspecialchars($s['telephone'] ?? ''); ?></p>
                            <?php else: ?>
                                <p>Name: <span class="fw-bold">N/A</span></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <span class="text-muted">Institut Universitaire de technologies</span>
                </div>
            </div>
        </div>
    </div>
    <!--CARD-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // show spinner for 3 seconds on page load, then reveal the card
        document.addEventListener('DOMContentLoaded', function(){
            var spinner = document.getElementById('spinner');
            var card = document.querySelector('.container-fluid .card');
            // ensure spinner visible and card hidden initially
            if(spinner) spinner.style.display = 'flex';
            if(card) card.style.visibility = 'hidden';

            setTimeout(function(){
                if(spinner) spinner.style.display = 'none';
                if(card) card.style.visibility = 'visible';
            }, 2000);
        });
    </script>
</body>
</html>