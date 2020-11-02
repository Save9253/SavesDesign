<?php
    $page = "SVG Round Up";
    $HeaderLogo = 'yes';
    $styles = '<link rel="stylesheet" href="./styles/svg.css">';

    include_once './parts/header.php';

?>
<h1>SVG Round Up</h1>
<h2>Enter your code in the box below</h2>
<div id="svgIn" contenteditable="true"></div>
<div class="inputs">
    <div class="inputs">
        <input id="pr100" type="radio" name="roundTo" value="100">
        <label for='pr100'>100</label>

        <input id="pr10" type="radio" name="roundTo" value="10">
        <label for='pr10'>10</label>

        <input id="pr1" type="radio" name="roundTo" checked value="1">
        <label for='pr1'>1</label>

        <input id="pr01" type="radio" name="roundTo" value="0.1">
        <label for='pr01'>0.1</label>

        <input id="pr001" type="radio" name="roundTo" value="0.01">
        <label for='pr001'>0.01</label>
    </div>
    <div class="inputs">
        <input id="forHTML" type="radio" name="roundFor" checked value="HTML">
        <label for='forHTML'>HTML</label>

        <input id="forJS" type="radio" name="roundFor" value="JS">
        <label for='forJS'>JavaScript</label>
    </div>
</div>
<button id='RoundUpBtn' class="btn">Round Up</button>

<h2>Preview:</h2>
<section id="preview">
    <div>
        <div>Before:</div>
        <div id="before"></div>
    </div>
    <div>
        <div>After:</div>
        <div id="after"></div>
    </div>
</section>
<?php include_once './parts/footer.php';?>
<script type="text/javascript" src="./scripts/svg.js"></script>

