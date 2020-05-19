<h1>Hello world!</h1>
<!--<p>--><?//=$name?><!--</p>-->
<!--<p>--><?//=$age?><!--</p>-->

<?php foreach($databaseData as $d) : ?>
    <h3><?=$d->name?></h3>
<?php endforeach; ?>
