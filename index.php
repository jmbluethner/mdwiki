<?php

    /*
     * A simple project which allows you to store .md files and give other users access to them
     * Editor maybe coming soon
     * 
     * Developed for https://die-lan.party/
     */


    require './scripts/functions.php';

?>

<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="./styles/main.css">
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="page">
            <div class="sidebar">
                <div class="heading">MDWiki</div>
                <div class="buttoncontainer">

                    <?php

                        $threats = collectThreats();
                        foreach($threats as $threatname) {
                            $threatnameFile = "'".$threatname."'";
                            print_r('<button onclick="loadMarkdown('.$threatnameFile.')">'.file_ext_strip($threatname).'</button>');
                        }

                    ?>

                </div>
            </div>
            <div id="mdframe">
                <h1>Willkommen ...</h1>
                <h2>zur simpelsten Knowledgebase der Welt</h2>
            </div>
        </div>
        <script src="./scripts/functions.js"></script>
    </body>

</html>