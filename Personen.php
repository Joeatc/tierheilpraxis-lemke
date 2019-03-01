<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="Anamnese.js"></script>
    <script src='pdfmake.js'></script>
    <script src='vfs_fonts.js'></script>
</head>
<body>
<div class="w3-container w3-teal" ng-app="myEditorApp" ng-controller="myEditorCtrl">
    <?php include("../Allgemeine_Daten/a_head.html"); ?>

    <div class="w3-container w3-teal">
        <form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
            <?php include("../Personaldaten/personal_data.html"); ?>
            <?php include("../Personaldaten/contact_data.html"); ?>
            <?php include("../Personaldaten/account_data.html"); ?>
        </form>
    </div>
    <?php include("../Allgemeine_Daten/z_foot.html"); ?>
</div>
</body>
</html>