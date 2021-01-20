
(function () {
    var app = angular.module('app', []);

    app.controller('MainController', function ($scope, $sce, $http) {

        var IsEmpty = function isEmpty(str) {
            return (!str || 0 === str.length);
        }

        var ConvertToEmbed = function (videoID) {
            var embedURL = "https://www.youtube.com/embed/" + videoID;
            return embedURL;
        }

        $scope.SetVideo = function (videoID, videoTitle) {
            $scope.video = $sce.trustAsResourceUrl(ConvertToEmbed(videoID));
            $scope.videoTitle = videoTitle;
        }

        $scope.GetVideo = function (classId, subjectId, chapterId) {
            console.log(classId + " " + subjectId + " "+ chapterId);
            if(!IsEmpty(classId) && !IsEmpty(subjectId) && !IsEmpty(chapterId)){
                
                $http({
                    method: "post",
                    url: 'contents-data.php',
                    data:{
                        classId: classId,
                        subjectId: subjectId,
                        chapterId: chapterId,
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function(response){
                    $scope.videos = response.data;
                })
            }
        }

    })

}());
