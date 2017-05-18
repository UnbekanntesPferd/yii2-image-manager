<?php

namespace noam148\imagemanager\models;

use Yii;

/**
 * This is the model class for table "ImageManager_ImageManagerTag".
 *
 * @property int $ImageManager_id
 * @property int $ImageManagerTag_id
 * @property string $created
 *
 * @property ImageManagerTag $imageManagerTag
 * @property ImageManager $imageManager
 */
class ImageManagerImageManagerTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ImageManager_ImageManagerTag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ImageManager_id', 'ImageManagerTag_id', 'created'], 'required'],
            [['ImageManager_id', 'ImageManagerTag_id'], 'integer'],
            [['created'], 'safe'],
            [['ImageManagerTag_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageManagerTag::className(), 'targetAttribute' => ['ImageManagerTag_id' => 'id']],
            [['ImageManager_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageManager::className(), 'targetAttribute' => ['ImageManager_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ImageManager_id' => Yii::t('imagemanager', 'Image'),
            'ImageManagerTag_id' => Yii::t('imagemanager', 'Image tag'),
            'created' => Yii::t('imagemanager', 'Created'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageManagerTag()
    {
        return $this->hasOne(ImageManagerTag::className(), ['id' => 'ImageManagerTag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageManager()
    {
        return $this->hasOne(ImageManager::className(), ['id' => 'ImageManager_id']);
    }
}
