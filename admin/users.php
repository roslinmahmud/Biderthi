<div class="card bg-white mb-3">
    <div class="card-header">
        Users
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="user in users">
                    <td>{{user.Name}}</td>
                    <td>{{user.Role}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm"
                            ng-click="update(user.Name, user.Username, user.Role)">Update</button>
                        <button type="button" class="btn btn-danger btn-sm"
                            ng-click="remove(user.Name, user.Username)">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div ng-if="initUpdate" class="alert alert-warning" role="alert">
            <div class="row">
                <div class="col">
                    <h6><b>{{updateName}}</b> Role: </h6>
                </div>
                <div class="col">
                    <select ng-model="updateRole">
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-warning btn-sm"
                        ng-click="updateUser(updateUsername, updateRole)">Update</button>
                </div>
            </div>
        </div>

        <div ng-if="initRemove" class="alert alert-danger" role="alert">
            <div class="row">
                <div class="col">
                    <h6>Want to remove <b>{{removeName}}</b> ? </h6>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger btn-sm" ng-click="removeUser(removeUsername)">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>