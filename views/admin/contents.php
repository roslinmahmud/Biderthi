<h3>Contents</h3>
<hr>

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
        <input type="text" ng-model="videoURL" class="form-control" id="inputURL" aria-describedby="inputURL"
            placeholder="Enter Youtube URL">
        <small id="inputURLerror" class="form-text text-muted">{{youtubeURLError}}</small>
    </div>
    <div class="form-group">
        <label for="videoTitle">Video Title</label>
        <input type="text" ng-model="videoTitle" class="form-control" id="videoTitle" placeholder="Video Title">
        <small id="videoTitleError" class="form-text text-muted">{{vidoTitleError}}</small>
    </div>
    <button type="submit" ng-click="UploadVideo(videoURL, videoTitle)" class="btn btn-primary">Upload</button>
</form>