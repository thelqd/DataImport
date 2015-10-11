<html>
<head>
    <title>Data Visualization</title>
</head>
<body>
<h1>Visualization Examples</h1>
<h2>Tag Cloud for Anchor Text</h2>
<div id="anchorText">
<?= $tagCloud->render() ?>
</div>
<h2>BL DOM grouped by classes</h2>
<div id="blDom">

</div>
<?= $charts->render('BarChart', 'BlDom', 'blDom') ?>
<h2>Overview Link Status</h2>
<div id="linkStatus">

</div>
<?= $charts->render('DonutChart', 'Link Status', 'linkStatus') ?>
<h2>From URL by Hostname</h2>
<div id="fromUrl">

</div>
<?= $charts->render('DonutChart', 'From URL', 'fromUrl') ?>
</body>
</html>