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
  <?php 
		require 'controllers/index-control.php';
		if(!isset($_GET['subjectId'])){
			$result = getSubjects();
		}
  ?>

  <div id="video" class="container" ng-app='app' ng-controller='MainController'>
    <div class="row">
      <div class="col">

        <div ng-view class="container" style="margin-top: 10px; padding: 10px;">
          <div class="card">
            <div class="card-body bg-white">
              <div class="card-deck">
          <?php
            if(isset($_GET['classId']) && !isset($_GET['subjectId'])){
              if($result->num_rows > 0) {
                while($data = $result->fetch_assoc()){
          ?>
                  <div class="card bg-info" style="max-width: 208px;min-width:208px;margin: 10px">
                  <div class="card-body text-center">
                      <p class="card-text"><?php print($data['SubjectName']) ?></p>
                      <a href="videos.php?subjectId=<?php print($data['SubjectID'])?>&classId=<?php print($_GET['classId']) ?>" class="stretched-link"></a>
                  </div>
                  </div>
          <?php
                }
              }
            }
            else if(isset($_GET['classId']) && isset($_GET['subjectId']) && !isset($_GET['chapterId'])){
              $result = getChapters($_GET['classId'], $_GET['subjectId']);
              if($result->num_rows > 0) {
                while($data = $result->fetch_assoc()){
          ?>
                  <div class="card bg-info" style="max-width: 208px;min-width:208px;margin: 10px">
                  <div class="card-body text-center">
                      <p class="card-text"><?php print($data['ChapterName']) ?></p>
                      <a href="videos.php?chapterId=<?php print($data['ChapterID'])?>&classId=<?php print($_GET['classId']) ?>&subjectId=<?php print($_GET['subjectId']) ?>" class="stretched-link"></a>
                  </div>
                  </div>
          <?php
                }
              }
              
            }
          ?>
              </div>
            </div>

            <div class="card-img-top">
              <div ng-if="video" class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" ng-src="{{video}}"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen>
                </iframe>
              </div>
              <div class="card-footer text-muted">
                {{videoTitle}}
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4">
        <div ng-view class="container" style="margin-top: 10px; padding: 10px;">
          <div class="card">
            <ul class="list-group list-group-item-action" ng-repeat="video in videos">
              <li class="list-group-item"><a href="" ng-click="SetVideo(video.VideoId, video.VideoTitle)">{{video.VideoTitle}}</a></li>
            </ul>
            
          </div>
        </div>
      </div>
    </div>

    <!-- Loads the Footer-->
  	<?php include 'include/footer.php'?>

  </div>
</body>

</html>

<script>
  window.onload = function () {
    angular.element(document.getElementById('video')).scope().GetVideo(<?php print($_GET['classId'])?>, <?php print($_GET['subjectId'])?>, <?php print($_GET['chapterId'])?> );
  }
</script>