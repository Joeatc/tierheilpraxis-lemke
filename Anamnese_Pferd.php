<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <!--<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-red.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="Anamnese.js"></script>
    <script src='pdfmake.js'></script>
    <script src='vfs_fonts.js'></script>
</head>
<body>
<div ng-app="myEditorApp" ng-controller="myEditorCtrl">
    <?php include ("../Allgemeine_Daten/a_head.html"); ?>

    <article class="w3-container w3-teal w3-border-top w3-border-bottom">
        <h2>Anamnesebogen Pferd</h2>
        <h4>Datum <input type="date" class="w3-input" required ng-model="tagAnamnese"> Besitzer: {{besitzer_name}} - Patient: {{patient_name}}</h4>
        <form style="width: 100%" novalidate>
            <?php include ("../Anamnesebogen_Pferd/b_Stammdaten.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/c_GrundDesBesuchs.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/d_Ernaehrung.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/f_Urinabsatz.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/g_Kotabsatz.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/h_HaltungUndBewegung.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/i_Verhalten.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/k_Herkunft.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/l_Changes.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/m_Health.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/n_Impfungen.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/p_WeitereUntersuchungen.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/q_WeiterePatienten.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/x_Vorerkrankungen.html"); ?>
            <?php include ("../Anamnesebogen_Pferd/y_BisherigeBehandlungUndTherapie.html"); ?>
        </form>
    </article>
    <?php include ("../Allgemeine_Daten/z_foot.html"); ?>
</div>
</body>
</html>