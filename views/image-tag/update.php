<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model noam148\imagemanager\models\ImageManagerTag */

$this->title = Yii::t('imagemanager', 'Update {modelClass}: ', [
    'modelClass' => 'Image Manager Tag',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('imagemanager', 'Image Manager Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('imagemanager', 'Update');
?>
<div class="image-manager-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
