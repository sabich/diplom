<?php

use yii\db\Migration;

class m170426_170543_create_project_images extends Migration
{
    public function up()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'filename' => $this->string(32)->notNull()->unique(),
            'created' => $this->dateTime()->notNull(),
        ]);

        $this->createTable('project_image', [
            'projectId' => $this->integer()->notNull(),
            'imageId' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_project_image_projectId', 'project_image', 'projectId', 'project', 'id');
        $this->addForeignKey('FK_project_image_imageId', 'project_image', 'imageId', 'image', 'id');

        $this->dropColumn('project', 'cover');
        $this->addColumn('project', 'coverId', 'INT(11) AFTER article');
        $this->addForeignKey('FK_project_coverId', 'project', 'coverId', 'image', 'id');

        return true;
    }

    public function down()
    {
        $this->dropColumn('project', 'coverId');
        $this->addColumn('project', 'cover', 'VARCHAR(32) AFTER article');
        $this->dropTable('project_image');
        $this->dropTable('image');

        return true;
    }
}
