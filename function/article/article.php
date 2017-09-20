<?php

function dataArticle($id, $db_connection){
    $query = "SELECT * FROM article WHERE journal = '" . $id . "';";
    if ($result = mysqli_query($db_connection, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $lien = $row["lien"];
            $titre = $row["titre"];
            $description = $row["description"];
            $date = $row["date"];
            afficherArticle($titre, $lien, $date, $description);
        }
    }
}

function afficherArticle($titre, $lien, $date, $description){
    echo "
            <div class=\"col-sm-12\">
                <div class='card card-block h-100 justify-content-center'>
                    <div class='card-block'>
                    <center>
                        <h5 class='card-title'>". $titre . "</h5>
                        <p>". $description . "</p>
                        <a href='$lien' class='btn btn-primary'>Consultez l'article</a><br>
                        ". $date . "<br>
                    </center>
                    </div>
                </div>
            </div>";
}

function bestArticle(){
    echo "
<form method='POST'>
    <center>
        <button name=\"recherche\" type=\"button\" class=\"btn btn-secondary\"><i class=\"fa fa-thumbs-up\" aria-hidden=\"true\"></i></button>
    </center>
</form>";
}

function recherche($db_connection, $mots){
    $query = "SELECT * FROM article WHERE lien REGEXP '" . $mots . "' OR titre REGEXP  '" . $mots . "' OR description REGEXP  '" . $mots . "'";
    if ($result = mysqli_query($db_connection, $query)) {
        echo"

    <div class=\"col-sm-12\">
        <div class='card card-block h-100 justify-content-center'>
            <div class='card-block'>
            <center>
                <div class=\"alert alert-info\">
                    <span>Recherche pour <strong>".$mots."</strong>.</span>
                </div>
            </center>
            </div>
        </div>
    </div>

        ";
        while ($row = mysqli_fetch_assoc($result)) {
            $titre = $row["titre"];
            $description = $row["description"];
            $lien = $row["lien"];
            $date = $row["date"];

            afficherArticle($titre, $lien, $date, $description);
        }
    }
    else{
        echo"
<div class=\"alert alert-info\">
    <strong>Voici la recherche pour</strong> ".$mots.".
</div>
        ";
    }
}
