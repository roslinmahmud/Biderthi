(function () {

    var app = angular.module('admin');

    app.controller('ContentController', function ($scope, $sce, $http) {

        $scope.GetClasses = function () {
            $http({
                method: "post",
                url: 'contents-data.php',
                data: {
                    reason: 'getClasses'
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function (response) {
                $scope.classes = response.data;
            })
        }

        $scope.GetSubjects = function () {
            $http({
                method: "post",
                url: 'contents-data.php',
                data: {
                    reason: 'getSubjects'
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function (response) {
                $scope.subjects = response.data;
            })
        }

        $scope.GetChapters = function(){
            if($scope.classId && $scope.subjectId){
                $http({
                    method: "post",
                    url: 'contents-data.php',
                    data: {
                        reason: 'getChapters',
                        classId: $scope.classId,
                        subjectId: $scope.subjectId
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    alert(response.data);
                    $scope.chapters = response.data;
                })
            }
        }

        var IsEmpty = function isEmpty(str) {
            return (!str || 0 === str.length);
        }

        var ConvertToEmbed = function (videoURL) {
            var embed = videoURL.split("=");
            var embedURL = "https://www.youtube.com/embed/" + embed[1].split("&")[0];
            return embedURL;
        }

        var GetVideoId = function (videoURL) {
            var embed = videoURL.split("=");
            return embed[1].split("&")[0];
        }

        $scope.SetVideo = function (videoURL) {
            $scope.video = $sce.trustAsResourceUrl(ConvertToEmbed(videoURL));
        }

        $scope.UploadVideo = function (videoURL, videoTitle, classId, subjectId, chapterId) {
            
            var videoId;
            if (!IsEmpty(videoURL)) {
                videoId = GetVideoId(videoURL);
            }
            else {
                $scope.youtubeURLError = "Enter a video URL";
            }


            if (!IsEmpty(videoTitle)) {
                $scope.vidoTitleError = "";
            }
            else {
                $scope.vidoTitleError = "Enter a video Title";
            }

            if (!IsEmpty(videoURL) && !IsEmpty(videoTitle)) {
                $http({
                    method: "post",
                    url: 'contents-data.php',
                    data: {
                        reason: 'uploadVideo',
                        videoId: videoId,
                        videoTitle: videoTitle,
                        classId: $scope.classId,
                        subjectId: $scope.subjectId,
                        chapterId: $scope.chapterId
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    alert(response.data);
                })
            }
        }

        var GetVideos = function(){
            $http({
                method: "post",
                url: 'contents-data.php',
                data: {
                    reason: 'getVideos'
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function (response) {
                $scope.videos = response.data;
            })
        }

        $scope.InitRemoveVideo = function(VideoId, VideoTitle){
            $scope.RemoveVideoTitle = VideoTitle;
            $scope.RemoveVideoId = VideoId;
        }

        $scope.RemoveVideo = function(VideoId){
            $http({
                method: "post",
                url: 'contents-data.php',
                data:{
                    reason: 'removeVideo',
                    VideoId: VideoId
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function(response){
                GetVideos();
                alert(response.data);
            })
        }
        
        $scope.GetClasses();
        $scope.GetSubjects();
        GetVideos();

    })

}());