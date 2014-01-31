<?php

//setup auto load
require_once("wikiLingo/autoload.php");



//create scripts collector utility
$scripts = (new WikiLingo\Utilities\Scripts('wikiLingo/'))

    //add some css
    ->addCssLocation("//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css")

    ->addCssLocation("~/bower_components/Medium.js/medium.css")

    ->addCssLocation("~/editor/bubble.css")
    ->addCssLocation("~/editor/IcoMoon/sprites/sprites.css")

    //add some javascript
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js")
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js")

    ->addScriptLocation("~/bower_components/undo/undo.js")
    ->addScriptLocation("~/bower_components/rangy/uncompressed/rangy-core.js")
    ->addScriptLocation("~/bower_components/rangy/uncompressed/rangy-cssclassapplier.js")
    ->addScriptLocation("~/bower_components/Medium.js/medium.js")

    ->addCssLocation("~/bower_components/CodeMirror/lib/codemirror.css")
    ->addScriptLocation("~/bower_components/CodeMirror/lib/codemirror.js")
    ->addCssLocation("~/bower_components/wikiLingoCodeMirror/wikiLingo.css")
    ->addScriptLocation("~/bower_components/wikiLingoCodeMirror/wikiLingo.js")

    ->addScriptLocation("~/editor/WLPluginSyntaxGenerator.js")
    ->addScriptLocation("~/editor/WLPluginEditor.js")
    ->addScriptLocation("~/editor/WLPluginAssistant.js")
    ->addScriptLocation("~/editor/bubble.js")
    ->addScript(<<<JS
var
	WLPlugin = function(el) {
		if (el.getAttribute('data-draggable') == 'true') {
			new WLPluginAssistant(el, 'wikiLingo/');
		}
	},
	color = function(element) {
		var newColor = prompt('What color?', element.style['color']);
		if (newColor) {
			element.style['color'] = newColor
		}
	},
	table = function(element) {

	};

$(function() {
	//bubble is the contenteditable toolbar, it is very simple and instantiated here
	var
        editable = document.getElementById('editable'),
		//medium makes contenteditable behave
		medium = editable.medium = new Medium({
			element: editable,
			mode: 'rich',
			placeholder: 'Your Article',
            autoHR: false,
			cssClasses: [],
			attributes: {
				remove: []
			},
			tags: {
				paragraph: 'p',
				outerLevel: ['pre','blockquote', 'figure', 'hr', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'strong', 'code', 'br', 'b', 'span'],
				innerLevel: ['a', 'b', 'u', 'i', 'img', 'div', 'strong', 'li', 'span', 'code', 'br']
			},
			modifiers: [],
            beforeInvokeElement: function() {
                console.log(this);
            },
            beforeInsertHtml: function() {
                console.log(this);
            },
            beforeAddTag: function(tag, shouldFocus, isEditable, afterElement) {
                var newEl;
                switch (tag) {
                    case 'br':
                    case 'p':
                        newEl = document.createElement('br');
                        newEl.setAttribute('class', 'element');
                        newEl.setAttribute('data-element', 'true');
                        newEl.setAttribute('data-type', 'WikiLingo\\\\Expression\\\\Line');

                        medium.insertHtml(newEl)
                        return true;
                }

                return newEl;
            }
		}),
        bubble = new WLBubble(window.expressionSyntaxes, editable);

	$('body')
		.on('resetWLPlugins', function() {
			for(var i = 0; i < wLPlugins.length; i++) {
				new WLPlugin(document.getElementById(wLPlugins[i]));
			}
		})
		.trigger('resetWLPlugins');

    $('#editable')
        .on('mouseup', function(event) {
            bubble.goToSelection();
        });
    $(function(){
        bubble.staticToTop();
    });
});
JS
    )
    ->addCss(<<<CSS
.canvas {
    background-color: rgba(255,255,255, 1);
    -moz-box-shadow:    0px 0px 3px 4px rgba(0, 0, 0, 0.5);
	-webkit-box-shadow: 0px 0px 3px 4px rgba(0, 0, 0, 0.5);
	box-shadow:         0px 0px 3px 4px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    padding: 10px;
}

@font-face {
    font-family: "dayRoman";
    src: url(wikiLingo/editor/font/dayRoman.woff);
    font-weight:400;
}
body {
    background-image: url(wikiLingo/editor/img/canvas.jpg);
    font-family: "dayRoman";
}
a {
    color: rgba(0, 0, 100, 0.55);
    text-decoration: none;
     -webkit-transition: all 1s ease-in-out;
    -moz-transition: all 1s ease-in-out;
    -o-transition: all 1s ease-in-out;
    transition: all 1s ease-in-out;
}
a:hover {
    color: rgba(0, 0, 50, 1);
}
.Code {
    width: 100%;
    height: 200px;
}
.fullpage_section {
    background-image: none ! important;
    border-bottom: dashed 5px #000000;
}
.fullpage_section_slide {
    background-image: none ! important;
    border-bottom: double 5px #000000;
}
CSS
    );




//create a wikiLingo to WYSIWYG parser, and send scripts collector to it
$parser = new WikiLingoWYSIWYG\Parser($scripts);


//open a file and parse it
$source = file_get_contents('demo.wl');
$page = $parser->parse($source);


//create a new group of possible syntaxes possible in the WikiLingo to WYSIWYG parser
$expressionSyntaxes = new WikiLingoWYSIWYG\ExpressionSyntaxes();



//bind to event "WikiLingoWYSIWYG\Event\ExpressionSyntax\Registered",giving certain syntax extra attributes
$expressionSyntaxes->parser->events->bind(new WikiLingoWYSIWYG\Event\ExpressionSyntax\Registered(function(\WikiLingoWYSIWYG\ExpressionType &$expressionType) {
    switch ($expressionType->name) {
        case 'Plugin':
            $expressionType->extraAttributes['onmouseover'] = '';
            break;
        case 'Table':
            $expressionType->extraAttributes['data-bubble-event'] = 'table';
            break;
        case 'Color':
            $expressionType->extraAttributes['ondblclick'] = 'color(this);return false;';
            break;
    }
}));



//register expression types so that they can be turned into json and sent to browser
$expressionSyntaxes->registerExpressionTypes($scripts);



//json encode the parsed expression syntaxes
$expressionSyntaxesJson = json_encode($expressionSyntaxes->parsedExpressionSyntaxes);
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>wikiLingo editor (contenteditable only and a tiny bit of js and css)</title>
    <?php
    //render css from scripts collector and bring it to the page
    echo $scripts->renderCss();
    ?>
</head>
<body>
<div id="header" style="text-align: center;">
    <h1><img src="wikiLingo/editor/img/wLogo.png" style="width: 40px;"/> wikiLingo<br /><strike style="color:rgba(255,255,255,0.25);">html5 compliant using contenteditable & unified data transformation manipulator interface for humans</strike><br />editor</h1>
</div><?php //create an editable area and echo page to it ?>
<div style="width: 75%; margin-left: auto; margin-right: auto;">
<div class="canvas">
    <div id="editable" contenteditable="true" style="border: none;"><?php echo $page;?></div>
</div>
</div>
</body>
<script>
    window.expressionSyntaxes = <?php echo $expressionSyntaxesJson; ?>;
    window.wLPlugins = <?php echo json_encode($parser->plugins); ?>;
</script>
<?php
//echo script from the scripts collector to page
echo $scripts->renderScript();
?>
</html>