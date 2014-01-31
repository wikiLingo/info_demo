<?php
require_once "wikiLingo/autoload.php";

//Use wikiLingo Scripts utility to add scripts this page
$scripts = (new WikiLingo\Utilities\Scripts('wikiLingo/'))
    ->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js")
    ->addCss(<<<CSS
@font-face {
    font-family: "dayRoman";
    src: url(wikiLingo/editor/font/dayRoman.woff);
    font-weight:400;
}
body {
    font-family: 'dayRoman';
    color: rgba(255, 255, 255, 0.7);
    font-size: xx-large;
}
a {
    color: rgba(255, 255, 190, 0.25);
    text-decoration: none;
     -webkit-transition: all 1s ease-in-out;
    -moz-transition: all 1s ease-in-out;
    -o-transition: all 1s ease-in-out;
    transition: all 1s ease-in-out;
}
a:hover {
    color: rgba(255, 255, 190, 1);
}
CSS
);

//create the wikiLingo and wikiLingoWYSIWYG parsers, and give them the optional scripts manager
$wikiLingo = new WikiLingo\Parser($scripts);

//open file demo.wl and then parse it.
$page = file_get_contents("demo.wl");
$out = $wikiLingo->parse($page);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>wikiLingo Does That</title>
    <meta name="author" content="Gavin Crenshaw, Robert Plummer" />
    <meta name="description" content="wikiLingo" />
    <meta name="keywords"  content="wiki language" />
    <meta name="Resource-type" content="Document" />
    <?php
        //render css
        echo $scripts->renderCss();
    ?>
</head>
<body>
    <?php
        //write page
        echo $out;

        //render script
        echo $scripts->renderScript();
    ?>
</body>
</html>