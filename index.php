<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Biderthi </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="icon" href="favicon.ico" type="image/png" sizes="16x16">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-route.min.js"></script>
  <script src="js/app.js"></script>
</head>

<body>
  <!-- Loads the Header-->
  <?php include 'include/header.php' ?>

  <!-- Import getBookData() function -->
  <?php require 'controllers/index-control.php' ?>

  <div class="container" ng-app='app'>
    <div class="row" ng-controller='MainController'>
      <div class="col-8">
        <div ng-view class="container border border-light bg-light" style="margin-top: 10px; padding: 10px;">
          <div class="form-group">
            <div ng-if="video" class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" ng-src="{{video}}"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
              </iframe>
            </div>
            <h5>{{videoTitle}}</h5>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="container border border-light bg-light" style="margin-top: 10px; padding: 10px;">
          <nav class="nav flex-column">
            <a class="nav-link active" href="#subject">Subject</a>
            <a class="nav-link" href="#class">Class</a>
            <a class="nav-link" href="#topic">Topics</a>
            <hr>
            <ul class="list-group" ng-repeat="video in videos">
              <li class="list-group-item"><a href="" ng-click="SetVideo(video.VideoId, video.VideoTitle)">{{video.VideoTitle}}</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

  </div>

  <!-- Loads the Footer-->
  <?php include 'include/footer.php'?>
</body>

</html>