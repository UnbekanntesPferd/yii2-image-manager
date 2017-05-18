<?php

use noam148\imagemanager\models\ImageManagerTag;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel noam148\imagemanager\models\ImageManagerTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $modelImageTag ImageManagerTag */

$this->title = Yii::t('imagemanager', 'Image Manager Tags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-manager-tag-index">
    <?php
        Pjax::begin([
            'id' => 'tag-manager-container',
            'timeout' => 5000
        ]);
    ?>
    <div class="row">
        <div class="col-xs-6 col-sm-10">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item img-thumbnail'],
                'layout' => "<div class='item-overview'>{items}</div> {pager}",
                'itemView' => function ($modelImageTag, $key, $index, $widget) {
                    /* @var $modelImageTag ImageManagerTag */
                    return $this->render("_item", [
                        'modelImageTag' => $modelImageTag
                    ]);
                },
            ]) ?>
        </div>
        <div class="col-xs-6 col-sm-2">
            <?php
                if ($modelImageTag->isNewRecord):
            ?>
                <h4><?= Yii::t('imagemanager', 'Create tag') ?></h4>
                <?php $formNew = ActiveForm::begin([
                    'enableAjaxValidation' => true,
                    'action' => ['create']
                ]) ?>
                    <?= $formNew->field($modelImageTag, 'name')->textInput(['placeholder' => $modelImageTag->getAttributeLabel('name')])->label(false) ?>

                    <?= Html::submitButton('<i class="fa fa-floppy-o"></i> '.Yii::t('imagemanager', 'Submit'), ['class' => 'btn btn-primary btn-block']); ?>
                <?php
                    ActiveForm::end();
                ?>
            <?php
                else:
            ?>
                    <h4><?= Yii::t('imagemanager', 'Update tag') ?></h4>
                    <?php $formNew = ActiveForm::begin([
                    'enableAjaxValidation' => true,
                    'action' => ['update', 'id' => $modelImageTag->id]
                ]) ?>
                    <?= $formNew->field($modelImageTag, 'name')->textInput(['placeholder' => $modelImageTag->getAttributeLabel('name')])->label(false) ?>

                    <?= Html::submitButton('<i class="fa fa-floppy-o"></i> '.Yii::t('imagemanager', 'Submit'), ['class' => 'btn btn-primary btn-block']); ?>
                    <?php
                    ActiveForm::end();
                    ?>
            <?php
                endif;
            ?>
        </div>
    </div>
    <?php
        Pjax::end();
    ?>
</div>
