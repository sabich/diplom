<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project`.
 */
class m170413_174542_create_projects extends Migration
{
    public function up()
    {
        $transaction = $this->db->beginTransaction();

        try {
            $this->createTable('project_type', [
                'id' => $this->primaryKey(),
                'name' => $this->string(25)->notNull()->unique()
            ]);

            $this->batchInsert('project_type', ['name'], [
                ['Индивидуальное жилье'],
                ['Жилой комплекс'],
                ['Промышленный объект'],
                ['Развлекательный комплекс']
            ]);

            $this->createTable('project', [
                'id' => $this->primaryKey(),
                'typeId' => $this->integer()->notNull(),
                'date' => $this->date()->notNull(),
                'article' => $this->string(25)->unique()->notNull(),
                'cover' => $this->string(32)->notNull(),
                'annotation' => $this->string(150)->notNull(),
                'description' => $this->text()->notNull(),
                'created' => $this->timestamp()->notNull(),
                'updated' => $this->timestamp()->notNUll()
            ]);

            $this->addForeignKey('FK_project_typeId', 'project', 'typeId', 'project_type', 'id');

            $transaction->commit();

            return true;
        } catch (Exception $e) {
            $transaction->rollBack();

            throw $e;
        }
    }

    public function down()
    {
        $transaction = $this->db->beginTransaction();

        try {
            $this->dropTable('project');
            $this->dropTable('project_type');

            $transaction->commit();

            return true;
        } catch (Exception $e) {
            $transaction->rollBack();

            throw $e;
        }
    }
}
