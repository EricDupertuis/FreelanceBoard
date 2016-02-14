app.controller('ClientController', function($scope, $http){
    var clients = $http.get('./api/clients.json')
        .then(function(response){
            $scope.clients = response.data;
        });
});