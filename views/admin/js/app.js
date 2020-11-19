(function () {
    var app = angular.module('admin', ["ngRoute"]);

    app.config(function ($routeProvider) {
        $routeProvider
        
            .when("/dashboard", {
                templateUrl: "dashboard.php",
                controller: "DashboardController"
            })
            .when("/users", {
                templateUrl: "users.php",
                controller: "UserController"
            })
            .when("/contents", {
                templateUrl: "contents.php",
                controller: "ContentController"
            })
            .otherwise({ redirectTo: "/dashboard" });
    });

}());

