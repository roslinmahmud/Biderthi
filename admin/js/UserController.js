(function(){

    var app = angular.module('admin');

    app.controller('UserController', function($scope, $http){

        $scope.getUsers = function(){
            $scope.initUpdate = false;
            $scope.initRemove = false;
            $http.get('users-data.php')
                .then(function(response){
                    $scope.users = response.data;
                })
        };

        $scope.update = function(name, username, role){
            $scope.updateName = name
            $scope.updateUsername = username;
            $scope.updateRole = role;
            $scope.initUpdate = true;
            $scope.initRemove = false;
        }

        $scope.updateUser = function(username, role){
            $http({
                method: "post",
                url: 'users-data.php',
                data:{
                    reason: 'updateRole',
                    username: username,
                    role: role
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function(response){
                $scope.getUsers();
            })
            
        }

        $scope.remove = function(name, username){
            $scope.removeName = name;
            $scope.removeUsername = username;
            $scope.initRemove = true;
            $scope.initUpdate = false;
        }

        $scope.removeUser = function(username){
            $http({
                method: "post",
                url: 'users-data.php',
                data:{
                    reason: 'removeUser',
                    username: username
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function(response){
                $scope.getUsers();
                alert(response.data);
            })
        }

        $scope.Users = function(){
            $scope.getUsers();
        };

        $scope.title = "Users Menu";
        $scope.initUpdate = false;
        $scope.Users();
    })

}());