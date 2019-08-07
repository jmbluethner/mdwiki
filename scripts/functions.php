<?php

    // load all Markdown files
    function collectThreats() {
        $threatsArray = array();
        $threats = scandir('./threats/');
        $threats = array_diff($threats, array('.', '..'));
        foreach ($threats as $threatSelected) {
            if(!is_dir($threatSelected)) {
                if($threatSelected[0] != '.') {
                    if (strpos($threatSelected, '.md') !== false) {
                        $threatOriginal = preg_replace('/\\.[^.\\s]{3,4}$/', '', $threatSelected);
                        $threatSelected = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', $threatSelected));
                        $threatSelectedQuote = '"'.$threatSelected.'"';
                        array_push($threatsArray,$threatSelected);
                    }
                }
            }
        }
        return $threatsArray;
    }
    // cut off file extensions
    function file_ext_strip($filename){
        return preg_replace('/.[^.]*$/', '', $filename);
    }

?>