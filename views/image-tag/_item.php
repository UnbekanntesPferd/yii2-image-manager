<?php
/**
 * Created by PhpStorm.
 * User: bvanleeuwen
 * Date: 18/05/2017
 * Time: 21:52
 */

/* @var $this \yii\web\View */
/* @var $modelImageTag \noam148\imagemanager\models\ImageManagerTag */

?>

<h3><?= $modelImageTag->name; ?></h3>
<hr />
<p><?= Yii::t('imagemanager', '{totalImages} assigned images', ['totalImages' => $modelImageTag->assignedImageCount]) ?></p>