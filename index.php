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
        <script type="text/javascript" src="https://cdn.nighttimedev.com/toolbox/js/generalFunctions.js"></script>
    </head>

    <body>
        <div class="page">
            <div class="sidebar">
                <div class="heading">MDWiki</div>
                <div class="buttoncontainer">

                    <?php

                        $threats = collectThreats();
                        $lpc = 0;
                        foreach($threats as $threatname) {
                            $threatnameFile = "'".$threatname."'";
                            print_r('<button onclick="loadMarkdown('.$lpc.')">'.file_ext_strip($threatname).'</button>');
                            $lpc++;
                        }

                    ?>

                </div>
            </div>
            <div id="mdframe">
                <h1>Willkommen ...</h1>
                <h2>zur simpelsten Knowledgebase der Welt</h2>

                <?php
                    $threats = collectThreats();
                    $lpc = 0;
                    foreach($threats as $threatname) {
                ?>
                    <div data-markdown id="md_container_<?php echo $lpc ?>">
                        <?php
                        $md = file_get_contents('./threats/'.$threatname);
                        print_r($md);
                        ?>
                    </div>
                <?php
                    $lpc++;
                    }
                ?>


            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/showdown/0.3.1/showdown.min.js"></script>
        <script src="./scripts/functions.js"></script>
        <script>
            window.onload=function(){
                function unescapeHTML( text ) {
                    return text.replace( /&amp;/g, "&" )
                            .replace( /&lt;/g, "<" )
                            .replace( /&gt;/g, ">" )
                            .replace( /&quot;/g, "\"" )
                            .replace( /&#39;/g, "'" );
                }
                (function(){
                [].forEach.call( document.querySelectorAll('[data-markdown]'), function fn(elem){
                    elem.innerHTML = (new Showdown.converter()).makeHtml(unescapeHTML(elem.innerHTML));
                });
                }());
            }
        </script>
    </body>

</html>