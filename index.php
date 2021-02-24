<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Biderthi </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="icon" href="favicon.ico" type="image/png" sizes="16x16">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-route.min.js"></script>
  <script src="js/app.js"></script>
</head>

<body class='bg-light'>
  <!-- Loads the Header-->
  <?php include 'include/header.php' ?>

  <!-- Import getBookData() function -->
  <?php 
    require 'controllers/index-control.php';

    $result = getClasses();
  ?>

  <div class="container" ng-app='app'  ng-controller='MainController'>
    <div class="row">
      <div class="col">
        
        <div ng-view class="container" style="margin-top: 10px; padding: 10px;">
          <div class="card">
            <h5 class="card-header bg-white">
              <b>Classes</b>
            </h5>
            <div class="card-body bg-white">
              <div class="card-deck" >
                <?php
                  if ($result->num_rows > 0) {
                    while($data = $result->fetch_assoc()){
                ?>
                      <div class="card bg-info" style="max-width: 208px;min-width:208px;margin: 10px">
                        <div class="card-body text-center">
                          <h5 class="card-text"><?php print($data['ClassName']) ?></h5>
                          <a href="videos.php?classId=<?php print($data['ClassID'])?>" class="stretched-link"></a>
                        </div>
                      </div>
                <?php
                    }
                  }
                ?>
              </div>
            </div>   
          </div>

        </div>
      </div>
      <div class="col-lg-4">
        <!-- SET a poster here -->
        <div class="container" style="margin-top: 10px; padding: 10px;">
          <img src="img/ad.jpg" class="img-fluid" alt="Responsive image">
        </div>
        
      </div>
    </div>

    <!-- Loads the Footer-->
    <?php include 'include/footer.php'?>

  </div>
</body>

</html>