<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost:8080/php54/end_2/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nội Thất Đồ Gỗ Việt</title>
      <link rel="stylesheet" href="assets/frontend/css/style.css">
    <link rel="stylesheet" href="assets/frontend/css/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- load news -->
    <link rel="stylesheet" href="assets/frontend/css/news.css">
    <!-- /load news -->
    <script src="assets/frontend/js/slick.js" defer></script>
    <script src="assets/frontend/js/jquery-3.5.1.js"></script>
    <script src="assets/frontend/js/bootstrap.min.js"></script>
    <script src="assets/frontend/js/js.js"></script>
    <script src="assets/frontend/js/js2.js"></script>
    <script src="assets/frontend/js/js3.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="assets/frontend/js/jsmenu.js"></script>
    <script src="assets/frontend/js/jsmenu-trangchu.js"></script>


</head>

<body>

    <!-- header -->
    <?php include 'ViewHeader.php'; ?>
    <!-- /header -->
    <!-- body -->
    <div class="clear">
    </div>
    <!-- slider -->
    <div class="slider-page">

        <div class="content-page">

            <!-- /content left -->
            <div class="content-left">

            </div>
            <!-- /content left -->
            <!-- content-right -->
            <div class="content-right">
                <div class="slide-show">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner carousel-fade ">
                            <div class="carousel-item active carousel-fade">
                                <img class="d-block w-100 carousel-fade" src="assets/frontend/images/sl1.png" alt="First slide">
                            </div>
                            <div class="carousel-item carousel-fade">
                                <img class="d-block w-100 carousel-fade" src="assets/frontend/images/sl2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item carousel-fade">
                                <img class="d-block w-100 carousel-fade" src="assets/frontend/images/sl3.png" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="assets/frontend/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
                    </script>
                    <script src="assets/frontend/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
                    </script>
                    <script src="assets/frontend/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
                    </script>
                </div>
            </div>
            <!-- /content-right -->
        </div>

    </div>
    <!-- /slider -->
    <!-- main -->

    <!-- all-prodiuct -->
    <?php echo $this->view; ?>
    <!-- /all-prodiuct -->
    <!-- /main -->

    <!-- client -->
    <?php include "ViewClient.php" ?>
    <!-- /end client -->

    <div class="clear">
    </div>
    <!-- footer -->
    <?php include "ViewFooter.php" ?>
    <!-- /footer -->
    <!-- back to top -->

    <!-- /back to top -->
</body>

</html>