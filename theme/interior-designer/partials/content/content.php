<div ng-controller="ContentCtrl as content">
    <div class="page col-1 animated fadeInUp">

        <h3 class="page-title dark-maroon-color">{{page.title.rendered}}</h3>

        <div class="page-content dim-brone-color" ng-bind-html="htmlSafe(page.content.rendered)"></div>

      

    </div>


</div>