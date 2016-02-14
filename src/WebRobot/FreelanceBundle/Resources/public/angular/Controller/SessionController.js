app.controller('SessionController', function($scope, $http){
    var sessions = $http.get('./api/session.json')
        .then(function(response){
            $scope.sessions = response.data;
        });
});