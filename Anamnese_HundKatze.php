<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/w3.css">
    <script src="angular.min.js"></script>
    <script src="AnamneseHundKatze.js"></script>
    <script src='pdfmake.js'></script>
    <script src='vfs_fonts.js'></script>
    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-hide") === -1) {
                x.className += " w3-hide";
            } else {
                x.className = x.className.replace(" w3-hide", "");
            }
        }
    </script>
</head>
<body>

<div ng-app="myEditorApp" ng-controller="myEditorCtrl">
    <?php include("phpFunctions/myPhpFunctions.php"); ?>
    <?php include("Allgemeine_Daten/a_head.html"); ?>
    <article class="w3-container w3-teal w3-border-top w3-border-bottom">
        <h2>Anamnesebogen Hund/Katze</h2>
        <div class="w3-container w3-teal">
            <form action="db-newAnamneseHundKatze.php"
                  method="post"
                  class="w3-container w3-card-4 w3-sand w3-text-blue w3-margin">
                <div class="w3-container w3-margin">
                    <input class="w3-button w3-round-xxlarge w3-red" type="reset" value="Alle Felder löschen"/>
                </div>
                <h4><?php line("Datum der Anamnese", "anamneseDate", "date") ?></h4>
                <?php
                include("Anamnesebogen_HundKatze/b_Stammdaten.php");
                include("Anamnesebogen_HundKatze/c_GrundDesBesuchs.php");
                include("Anamnesebogen_HundKatze/d_Ernaehrung.php");
                include("Anamnesebogen_HundKatze/f_Urinabsatz.php");
                include("Anamnesebogen_HundKatze/g_Kotabsatz.php");
                include("Anamnesebogen_HundKatze/h_HaltungUndBewegung.php");
                include("Anamnesebogen_HundKatze/i_Verhalten.php");
                include("Anamnesebogen_HundKatze/k_Herkunft.php");
                include("Anamnesebogen_HundKatze/l_Changes.php");
                include("Anamnesebogen_HundKatze/m_Health.php");
                include("Anamnesebogen_HundKatze/n_Impfungen.php");
                include("Anamnesebogen_HundKatze/p_WeitereUntersuchungen.php");
                include("Anamnesebogen_HundKatze/q_WeiterePatienten.php");
                include("Anamnesebogen_HundKatze/x_Vorerkrankungen.php");
                include("Anamnesebogen_HundKatze/y_BisherigeBehandlungUndTherapie.php");
                ?>
                <div class="w3-container w3-margin">
                    <input class="w3-button w3-round-xxlarge w3-red" type="submit" value="Alle Daten speichern"/>
                    <button class="w3-button w3-round-xxlarge w3-red" ng-click="onPrint()">Alle Daten drucken</button>
                </div>
            </form>
        </div>

        <div class="w3-container w3-teal w3-hide">
            <form action="createDbTables/db_create_anamneseHundKatze.php"
                  method="post"
                  class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
                Datenbank löschen und neu aufbauen?
                <?php
                $sql = createDataTableSQL("anamnesehundkatze");
                $myInput = "<textarea name='myFieldList' rows='40' cols='120'>$sql</textarea>";
                echo "$myInput";
                ?>
                <input type="submit" value="Jetzt ausführen!"/>
            </form>
        </div>
    </article>
    <?php include("Allgemeine_Daten/z_foot.html"); ?>
</div>
</body>
</html>