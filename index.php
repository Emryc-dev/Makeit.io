<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeit.io</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>
<body>
    <!-- Fullscreen animated background (canvas injected by finisher script) -->
    <div class="finisher-header"></div>

    <div class="container-fluid">
            <div class="container" style="margin-top: 100px;">
                <div class="row align-items-center justify-content-center hero-content">
                    <!-- Text column -->
                    <div class="col-md-6 d-flex align-items-center justify-content-start text-dark text-md-start text-center">
                        <div>
                            <h1>Welcome to Makeit.io</h1>
                            <p>A easy way to make an id-card in just a click!</p>
                        </div>
                    </div>

                    <!-- Icon column -->
                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-id-card icon-large" aria-hidden="true"></i>
                    </div>
                </div>

                <!-- Button row: centered below the text and icon -->
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-4">
                        <a href="generate.php" class="btn btn-primary btn-lg">Start Now</a>
                    </div>
                </div>
            </div>
            <div class="text-dark text-center mt-5">
                This site is only for students of IUT, IUC, and IUGET
            </div>
            <footer class="footer">
                <div class="container text-center mt-5" style="bottom: 0">
                    <span class="text-muted">© 2024 Makeit.io. All rights reserved.</span>
                </div>
            </footer>
    </div>
    <script src="finisher-header.es5.min.js"></script>
    <script type="text/javascript">
        new FinisherHeader({
           "count": 90,
           "size": {
           "min": 1,
           "max": 8,
           "pulse": 0
           },
           "speed": {
           "x": {
              "min": 0,
              "max": 0.4
            },
           "y": {
              "min": 0,
              "max": 0.6
             }
           },
           "colors": {
           "background": "#FFF",
           "particles": [
              "#000",
            ]
           },
           "blending": "overlay",
           "opacity": {
           "center": 0,
           "edge": 0.4
           },
           "skew": 0,
           "shapes": [
           "c",
           ]
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>