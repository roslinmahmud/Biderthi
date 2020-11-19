
(function () {
    var app = angular.module('app',[]);

    app.controller('MainController', function ($scope, $sce, $http) {

        var ConvertToEmbed = function(videoID) {
            var embedURL = "https://www.youtube.com/embed/"+videoID;
            return embedURL;
        }

        $scope.SetVideo = function(videoID, videoTitle) {
            $scope.video = $sce.trustAsResourceUrl(ConvertToEmbed(videoID));
            $scope.videoTitle = videoTitle;
        }

        $scope.GetVideo =  function(){
            $http.get('contents-data.php')
                .then(function(response){
                    $scope.videos = response.data;
                })
            }
        
        $scope.GetVideo();
        //$scope.video = $sce.trustAsResourceUrl(ConvertToEmbed("https://www.youtube.com/watch?v=IKRJAIcdock"));
    })

}());
