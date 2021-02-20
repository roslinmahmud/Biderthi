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

        $scope.GetChapters = function(ClassID, SubjectID){
            if(ClassID && SubjectID){
                $http({
                    method: "post",
                    url: 'contents-data.php',
                    data: {
                        reason: 'getChapters',
                        classId: ClassID,
                        subjectId: SubjectID
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
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
                    GetVideos();
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
                alert(response.data);
                GetVideos();
            })
        }

        $scope.AddClass = function(ClassName){
            if(!IsEmpty(ClassName)){
                $http({
                    method: "post",
                    url: 'contents-data.php',
                    data: {
                        reason: 'AddClass',
                        ClassName: ClassName
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    alert(response.data);
                    $scope.GetClasses();
                })
            }
            else{
                alert("Enter a Class name to Add!");
            }
        }

        $scope.AddSubject = function(SubjectName){
            if(!IsEmpty(SubjectName)){
                $http({
                    method: "post",
                    url: 'contents-data.php',
                    data: {
                        reason: 'AddSubject',
                        SubjectName: SubjectName
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    alert(response.data);
                    $scope.GetSubjects();
                })
            }
            else{
                alert("Enter a Subject name to Add!");
            }
        }

        $scope.AddChapter = function(ChapterName, ClassID, SubjectID){
            if(IsEmpty(ClassID) || IsEmpty(SubjectID)){
                alert("Select Class/Subject name to AddChapter!");
            }
            else if(!IsEmpty(ChapterName)){
                $http({
                    method: "post",
                    url: 'contents-data.php',
                    data: {
                        reason: 'AddChapter',
                        ChapterName: ChapterName,
                        ClassID: ClassID,
                        SubjectID: SubjectID
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    alert(response.data);
                    $scope.GetChapters(ClassID, SubjectID);
                })
            }
            else{
                alert("Enter a Chapter name to Add!");
            }
        }
        
        $scope.GetClasses();
        $scope.GetSubjects();
        GetVideos();

    })

}());