<?php

$data = Yii::$app->Cache->get('cachedata');

if ($data === false) {
    echo 'Data not found in cache. Storing data in cache';

    $data = "Cache message: This is stored in cache";
    \Yii::$app->Cache->set('cachedata', $data);
}
else
{
	echo "This is rendered from cache";
}
?>

    <h1><?= 'Message: '.$data?></h1>

<br><br>
<a href='refresh' class='btn btn-primary'>Refresh Code</a>