<div class="card bg-white mb-3">
    <div class="card-header">
        <b>Upload Video</b>
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

<div class="card bg-white mb-3">
    <div class="card-header">
        <b>Videos</b>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Video Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="video in videos">
                    <td>{{video.VideoTitle}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm"
                            ng-click="update(user.Name, user.Username, user.Role)">Update</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#RemoveVideoModal"
                            ng-click="InitRemoveVideo(video.VideoId, video.VideoTitle)">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="RemoveVideoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Want to remove the Video?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ RemoveVideoTitle }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" ng-click="RemoveVideo(RemoveVideoId)" data-dismiss="modal">Remove</button>
      </div>
    </div>
  </div>
</div>