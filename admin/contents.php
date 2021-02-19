<div class="card bg-white mb-3">
    <div class="card-header">
        Upload Video
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <div ng-if="video" class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" ng-src="{{video}}"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="form-group">
                <label for="inputURL">Vieo URL</label>
                <input type="text" ng-change="SetVideo(videoURL)" ng-model="videoURL" class="form-control" id="inputURL"
                    aria-describedby="inputURL" placeholder="Enter Youtube URL">
                <small id="inputURLerror" class="form-text text-muted">{{youtubeURLError}}</small>
            </div>
            <div class="form-group">
                <label for="videoTitle">Video Title</label>
                <input type="text" ng-model="videoTitle" class="form-control" id="videoTitle" placeholder="Video Title">
                <small id="videoTitleError" class="form-text text-muted">{{vidoTitleError}}</small>
            </div>
            <div class="form-group">
                <label for="category">Class</label>
                <select ng-change="GetChapters()" class="custom-select" ng-model="classId" required>
                    <option ng-repeat="class in classes" value="{{class.ClassID}}">{{class.ClassName}}</option>
                </select>
                <small id="priceText" class="invalid-feedback">Please select a valid category.</small>
            </div>
            <div class="form-group">
                <label for="category">Subject</label>
                <select ng-change="GetChapters()" class="custom-select" ng-model="subjectId" required>
                    <option ng-repeat="subject in subjects" value="{{subject.SubjectID}}">{{subject.SubjectName}}</option>
                </select>
                <small id="priceText" class="invalid-feedback">Please select a valid category.</small>
            </div>
            <div class="form-group">
                <label for="category">Chapter</label>
                <select class="custom-select" ng-model="chapterId" required>
                    <option ng-repeat="chapter in chapters" value="{{chapter.ChapterID}}">{{chapter.ChapterName}}</option>
                </select>
                <small id="priceText" class="invalid-feedback">Please select a valid category.</small>
            </div>
            <button type="submit" ng-click="UploadVideo(videoURL, videoTitle)" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>