<div class="col-sm-12">
    <div class="card card-block h-100 justify-content-center">
        <div class="card-block">
            <center>
                <h3 class="card-title">20minutes</h3>

                <img src="image/20minute/20minute.jpg" alt="Smiley face" height="50" width="50">
            </center>
        </div>
    </div>
</div>
<?php
$urlJournal = "http://feeds.feedburner.com/20minutes-ActuHightech?format=xml";
rssArticle($urlJournal);
require_once "database/database.php";
$id = 2;
saveArticle ($urlJournal, $id, $db_connection);