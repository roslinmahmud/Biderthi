(function(){

    var app = angular.module('admin');

    app.controller('ContentController', function($scope, $sce, $http){

        var IsEmpty = function isEmpty(str) {
            return (!str || 0 === str.length);
        }

        var ConvertToEmbed = function(videoURL) {
            var embed = videoURL.split("=");
            var embedURL = "https://www.youtube.com/embed/"+embed[1].split("&")[0];
            return embedURL;
        }

        var GetVideoId = function(videoURL){
            var embed = videoURL.split("=");
            return embed[1].split("&")[0];
        }

        var SetVideo = function(videoURL) {
            $scope.video = $sce.trustAsResourceUrl(ConvertToEmbed(videoURL));
        }

        $scope.UploadVideo = function(videoURL, videoTitle){
            var videoId;
            if(!IsEmpty(videoURL)){
                SetVideo(videoURL);
                videoId = GetVideoId(videoURL);
            }
            else{
                $scope.youtubeURLError = "Enter a video URL";
            }
            
            
            if(!IsEmpty(videoTitle)){
                $scope.vidoTitleError = "";
            }
            else{
                $scope.vidoTitleError = "Enter a video Title";
            }

            if(!IsEmpty(videoURL) && !IsEmpty(videoTitle)){
                $http({
                    method: "post",
                    url: 'contents-data.php',
                    data:{
                        reason: 'uploadVideo',
                        videoId: videoId,
                        videoTitle: videoTitle
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function(response){
                    alert(response.data);
                })
            }
        }

    })

}());