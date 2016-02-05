app.controller('ClientController', function($scope, $http){
   $scope.test = '';
    var clients = $http.get('./api/clients.json')
        .then(function(response){
            $scope.clients = response.data;
        });
});