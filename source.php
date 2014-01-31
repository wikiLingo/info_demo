<?php
$page = file_get_contents("demo.wl");
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>wikiLingo does that source</title>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords"  content="" />
    <meta name="Resource-type" content="Document" />
    <link rel='stylesheet' type='text/css' href='wikiLingo/bower_components/CodeMirror/lib/codemirror.css' />
    <link rel='stylesheet' type='text/css' href='wikiLingo/bower_components/wikiLingoCodeMirror/wikiLingo.css' />
    <style>
        div.CodeMirror {
            height: inherit;
        }
    </style>
</head>
<body>
<h4>Demo source (written in wikiLingo)</h4>
<form action="save.php" method="post">
    <textarea id="source" name="source"><?php echo $page;?></textarea>
    <input type="submit" value="Save"/>
</form>
<script src="wikiLingo/bower_components/CodeMirror/lib/codemirror.js"></script>
<script src="wikiLingo/bower_components/wikiLingoCodeMirror/wikiLingo.js"></script>
<script>
var source = document.getElementById('source'),
    editor = CodeMirror.fromTextArea(source, {
    mode: 'wikiLingo'
});
editor.on('change', function() {
    source.value = window.editor.getValue();
});

</script>
</body>
</html>