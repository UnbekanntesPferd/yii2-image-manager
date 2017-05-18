<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ImageManager_ImageManagerTag`.
 * Has foreign keys to the tables:
 *
 * - `ImageManager`
 * - `ImageManagerTag`
 */
class m170518_192850_create_junction_table_for_ImageManager_and_ImageManagerTag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ImageManager_ImageManagerTag', [
            'ImageManager_id' => $this->integer(10)->unsigned(),
            'ImageManagerTag_id' => $this->integer(10)->unsigned(),
            'created' => $this->dateTime()->notNull(),
            'PRIMARY KEY(ImageManager_id, ImageManagerTag_id)',
        ]);

        // creates index for column `ImageManager_id`
        $this->createIndex(
            'idx-ImageManager_ImageManagerTag-ImageManager_id',
            'ImageManager_ImageManagerTag',
            'ImageManager_id'
        );

        // add foreign key for table `ImageManager`
        $this->addForeignKey(
            'fk-ImageManager_ImageManagerTag-ImageManager_id',
            'ImageManager_ImageManagerTag',
            'ImageManager_id',
            'ImageManager',
            'id',
            'CASCADE'
        );

        // creates index for column `ImageManagerTag_id`
        $this->createIndex(
            'idx-ImageManager_ImageManagerTag-ImageManagerTag_id',
            'ImageManager_ImageManagerTag',
            'ImageManagerTag_id'
        );

        // add foreign key for table `ImageManagerTag`
        $this->addForeignKey(
            'fk-ImageManager_ImageManagerTag-ImageManagerTag_id',
            'ImageManager_ImageManagerTag',
            'ImageManagerTag_id',
            'ImageManagerTag',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `ImageManager`
        $this->dropForeignKey(
            'fk-ImageManager_ImageManagerTag-ImageManager_id',
            'ImageManager_ImageManagerTag'
        );

        // drops index for column `ImageManager_id`
        $this->dropIndex(
            'idx-ImageManager_ImageManagerTag-ImageManager_id',
            'ImageManager_ImageManagerTag'
        );

        // drops foreign key for table `ImageManagerTag`
        $this->dropForeignKey(
            'fk-ImageManager_ImageManagerTag-ImageManagerTag_id',
            'ImageManager_ImageManagerTag'
        );

        // drops index for column `ImageManagerTag_id`
        $this->dropIndex(
            'idx-ImageManager_ImageManagerTag-ImageManagerTag_id',
            'ImageManager_ImageManagerTag'
        );

        $this->dropTable('ImageManager_ImageManagerTag');
    }
}
