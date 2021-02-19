<?php
    // Start Seession
    session_start();
    if($_SESSION['role']!='admin'){
        header("Location: /Biderthi/");
    }
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Admin - BoiPoka | Book Sharing Platform</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="manifest" href="../../site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="icon" href="../../favicon.ico" type="image/png" sizes="16x16">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-route.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/DashboardController.js"></script>
        <script src="js/UserController.js"></script>
        <script src="js/ContentController.js"></script>
    </head>


    <body ng-app='admin'>
        <!-- Loads the Header-->
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="container" style="margin-top: 10px;">
                        <div class="list-group">
                            <a href="#!dashboard" class="list-group-item list-group-item-action">Dashboard</a>
                            <a href="#!users" class="list-group-item list-group-item-action">Users</a>
                            <a href="#!contents" class="list-group-item list-group-item-action">Contents</a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div ng-view class="container" style="margin-top: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- Loads the Footer-->
    <?php include '../include/footer.php'?>

</html>