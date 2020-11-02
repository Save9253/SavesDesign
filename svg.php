<?php
    $page = "SVG Round Up";
    $HeaderLogo = 'yes';
    $styles = '<link rel="stylesheet" href="./styles/svg.css">';

    include_once './parts/header.php';

?>
<h1>SVG Round Up</h1>
<h2>Enter your code in the box below</h2>
<div id="svgIn" contenteditable="true"></div>
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

