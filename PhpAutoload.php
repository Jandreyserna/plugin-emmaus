<?php

//function loadLibraries($class){
    $path =__DIR__."/lib/PHPOffice/PhpWord/";
    require_once $path.'PhpWord'.".php";
    require_once $path.'IOFactory'.".php";
    require_once $path.'Media'.".php";
    require_once $path.'Settings'.".php";
    require_once $path.'Style'.".php";
    require_once $path.'TemplateProcessor'.".php";
    require_once $path.'Template'.".php";
    
    //colelction
    require_once $path.'Collection/AbstractCollection.php';
    require_once $path.'Collection/Bookmarks.php';
    require_once $path.'Collection/Charts.php';
    require_once $path.'Collection/Comments.php';
    require_once $path.'Collection/Endnotes.php';
    require_once $path.'Collection/Footnotes.php';
    require_once $path.'Collection/Titles.php';
    //complextype
    require_once $path.'ComplexType/FootnoteProperties.php';
    require_once $path.'ComplexType/ProofState.php';
    require_once $path.'ComplexType/TblWidth.php';
    require_once $path.'ComplexType/TrackChangesView.php';
//}

//spl_autoload_register("loadLibraries");