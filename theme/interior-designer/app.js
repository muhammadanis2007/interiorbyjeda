// JavaScript Document
// initialize the app
var appPartials = appPartials.proot;
var domainserver = wpApiSettings.root,
    apiurl = domainserver + 'wp/v2/',
    widgetapi = domainserver + 'wp-rest-api-sidebars/v2/sidebars/';



var idsapps = angular.module('idsapps', ['ngRoute', 'ngSanitize', 'ngAnimate', 'duParallax']);

idsapps.config(['$routeProvider', '$locationProvider', '$compileProvider',

    function($routeProvider, $locationProvider, $compileProvider) {

        $routeProvider
            .when('/', {
                templateUrl: appPartials + '/home.html',
                controller: 'mainController',
                controllerAs: 'home',
                animate: 'ng-animate'
            })
            .when('/:slug/', {
                templateUrl: appPartials + '/content/content.php',
                controller: 'ContentCtrl',
                controllerAs: 'content',
                animate: 'ng-animate'
            })
            .when('/posts/:slug/', {
                templateUrl: appPartials + '/posts/post.html',
                controller: 'postCtrl',
                controllerAs: 'posts',
                animate: 'ng-animate'
            })
            .when('/search/all/', {
                templateUrl: appPartials + '/search/search.html',
                controller: 'searchCtrl',
                controllerAs: 'searchs',
                animate: 'ng-animate'
            })
            .otherwise({ redirectTo: '/' });

        $locationProvider.html5Mode(true);
        idsapps.compileProvider = $compileProvider;

    }
])


/* Toolbar Directive */

idsapps.directive('toolbarTip', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            $(element).toolbar(scope.$eval(attrs.toolbarTip));
        }
    };
});

/* Side widget Area */



/* Categories List Menu Directive */

idsapps.directive('postList', function($compile) {
    return {
        restrict: 'E',
        transclude: true,
        template: '<article  ng-repeat="postlst in PostList"><h2><a class="green-sea-color" ng-href="{{postlst.permalink}}">{{postlst.title}}</a></h2><div class="light-grey-color" ng-bind-html="htmlSafe(postlst.excerpt)"></div></article>',
        controller: ['$scope', '$http', '$routeParams', '$sce', function($scope, $http, $routeParams, $sce) {
            $http({
                method: "GET",
                url: apiurl + 'posts/' + $routeParams.slug
            }).then(function success(response) {

                    console.log("POST LIST SLUG : " + $routeParams.slug + response.data[0].cateslug);
                    var PostListData = response.data;
                    if ($routeParams.slug == response.data[0].cateslug) {


                        $scope.PostList = PostListData;

                        $scope.htmlSafe = function(data) {

                            return $sce.trustAsHtml(data);
                        }

                    } else { console.log("Under following category/Page no post, Please add posts under category or page."); }

                },
                function myError(response) {
                    $scope.myWelcome = response.statusText;
                })

        }],

    }

});





idsapps.controller('mainController', ['$scope', '$http', '$routeParams', '$sce', function($scope, $http, $routeParams, $sce) {

    $http({
        method: "GET",
        url: apiurl + 'pages?slug=home'
    }).then(function mySucces(response) {

            var homepage = response.data;
            $scope.page = homepage[0];
            console.log($scope.page)
            $scope.htmlSafe = function(data) {

                return $sce.trustAsHtml(data);
            }


        },
        function myError(response) {
            $scope.myWelcome = response.statusText;
        });
}]);




idsapps.controller('ContentCtrl', ['$scope', '$http', '$routeParams', '$sce', function($scope, $http, $routeParams, $sce) {

    $http({
        method: "GET",
        url: apiurl + 'pages?slug=' + $routeParams.slug
    }).then(function mySucces(response) {

            var otherpage = response.data;
            $scope.page = otherpage[0];

            $scope.htmlSafe = function(data) {

                return $sce.trustAsHtml(data);
            }



        },

        function myError(response) {
            $scope.myWelcome = response.statusText;
        });

}]);




idsapps.controller('postCtrl', ['$scope', '$http', '$routeParams', function($scope, $http, $routeParams) {

    $http({
        method: "GET",
        url: apiurl + "posts?slug=" + $routeParams.slug
    }).then(function mySucces(response) {

            var datapost = response.data;
            $scope.post = datapost[0];

        },
        function myError(response) {
            $scope.myWelcome = response.statusText;
        });


}]);








idsapps.controller('parallaxCtrl', function($scope, parallaxHelper) {
    $scope.background = parallaxHelper.createAnimator(-0.5, 250, -50);
});






idsapps.directive('autoActive', ['$location', '$http', '$routeParams', function($location, $http, $routeParams) {
    return {
        restrict: 'A',
        scope: false,
        link: function(scope, element) {
            function setActive() {
                var path = $location.path();
                if (path) {
                    angular.forEach(element.find('li'), function(li) {
                        var anchor = li.querySelector('a');

                        if (anchor.href == $location.absUrl()) {

                            angular.element(anchor).addClass('active');

                            if (angular.element(anchor).parent().parent().hasClass('sub-menu')) {
                                angular.element(anchor).parent().parent().parent().find('>a:first-child').addClass('active');

                            }
                        } else {
                            angular.element(anchor).removeClass('active');

                        }
                    });
                }
            }

            setActive();

            scope.$on('$locationChangeSuccess', setActive);
        }
    }
}]);

idsapps.controller('searchCtrl', ['$scope', '$http', function($scope, $http) {


    $http({
        method: 'GET',
        url: apiurl + 'allsearch'
    }).then(function success(response) {

        var srchData = response.data;

        $scope.search = {};
        $scope.search = function() {
            if ($scope.searchtxt.length > 0) {
                $scope.posts = srchData;
            } else {
                $scope.posts = []
            }
        }

    }).then(function myError(response) {

        $scope.myWelcome = response;

    });

}])

idsapps.directive('searchForm', function() {
    return {
        restrict: 'EA',
        template: '<div class="srch-box" ><input type="text" name="s" placeholder="Type your Keywords.." ng-model="searchtxt" ng-change="search()"><span class="fa srch-lbl fa-search" ></span></div>',
        controller: 'searchCtrl',
        controllerAs: 'searchs'
    };
});

idsapps.filter('trusted', function($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
})


/*AngularJS End App */


/*start Jquery Components scripts*/