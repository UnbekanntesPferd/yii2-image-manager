<?php

namespace noam148\imagemanager\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "ImageManagerTag".
 *
 * @property int $id
 * @property string $name
 * @property int $createdBy
 * @property int $modifiedBy
 * @property string $created
 * @property string $modified
 *
 * @property ImageManagerImageManagerTag[] $imageTags
 * @property ImageManager[] $images
 * @property string|integer $assignedImageCount
 */
class ImageManagerTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ImageManagerTag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name',], 'required'],
            [['createdBy', 'modifiedBy'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['name'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('imagemanager', 'ID'),
            'name' => Yii::t('imagemanager', 'Name'),
            'createdBy' => Yii::t('imagemanager', 'Created by'),
            'modifiedBy' => Yii::t('imagemanager', 'Modified by'),
            'created' => Yii::t('imagemanager', 'Created'),
            'modified' => Yii::t('imagemanager', 'Modified'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'modified',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageTags()
    {
        return $this->hasMany(ImageManagerImageManagerTag::className(), ['ImageManagerTag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(ImageManager::className(), ['id' => 'ImageManager_id'])->viaTable('ImageManager_ImageManagerTag', ['ImageManagerTag_id' => 'id']);
    }

    /**
     * Get the amount of assigned images to this tag
     * @return int|string
     */
    public function getAssignedImageCount() {
        return $this->hasMany(ImageManagerImageManagerTag::className(), ['ImageManagerTag_id' => 'id'])->count();
    }
}
