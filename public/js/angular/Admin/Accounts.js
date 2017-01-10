app.controller('ShowTestController', function ($scope, $http, $routeParams, $timeout) {

    $scope.test = null;

    $http({
        method : "GET",
        url : "/tests/" + $routeParams.id
    }).then(function(response) {
        if(response.data) {
            $scope.test = response.data;
        } else {
            window.location = '#/';
        }
    });
});