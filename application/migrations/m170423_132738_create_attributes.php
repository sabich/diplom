<?php

use yii\db\Migration;
use app\models\Project;

class m170423_132738_create_attributes extends Migration
{
    public function up()
    {
        $transaction = $this->db->beginTransaction();

        try {
            $this->createTable('project_attribute', [
                'id' => $this->primaryKey(),
                'name' => $this->string(25)->notNull()->unique()
            ]);

            $this->createTable('project_type_attribute', [
                'typeId' => $this->integer()->notNull(),
                'attributeId' => $this->integer()->notNull()
            ]);

            $this->addForeignKey('FK_project_type_attribute_typeId', 'project_type_attribute', 'typeId', 'project_type', 'id');
            $this->addForeignKey('FK_project_type_attribute_attributeId', 'project_type_attribute', 'attributeId', 'project_attribute', 'id');

            $this->createTable('project_attribute_value', [
                'projectId' => $this->integer()->notNull(),
                'attributeId' => $this->integer()->notNull(),
                'value' => $this->text()->notNull()
            ]);

            $this->addForeignKey('FK_project_attribute_value_projectId', 'project_attribute_value', 'projectId', 'project', 'id');
            $this->addForeignKey('FK_project_attribute_value_attributeId', 'project_attribute_value', 'attributeId', 'project_attribute', 'id');
            $this->addPrimaryKey('PK_project_attribute_value', 'project_attribute_value', ['projectId', 'attributeId']);

            $this->batchInsert('project_attribute', ['name'], [
                ['Общая площадь'],
                ['Площадь застройки'],
                ['Жилая площадь'],
                ['Количество этажей'],
                ['Количество спален'],
                ['Мансарда'],
                ['Подвал'],
                ['Тип'],
            ]);

            $this->batchInsert('project_type_attribute', ['typeId', 'attributeId'], [
                [1, 1],[1, 2],[1, 3],[1, 4],[1, 5],[1, 6],[1, 7],[1, 8],
                [2, 1],[2, 2],[1, 3],[1, 4],
                [3, 1],[3, 2],[3, 4],
                [3, 1],[3, 2],[3, 4],
            ]);

            $batch = [];
            foreach (Project::find()->all() as $project) {
                switch ($project->typeId) {
                    case Project::TYPE_INDIVIDUAL :
                        $batch[] = [$project->id, 1];
                        $batch[] = [$project->id, 2];
                        $batch[] = [$project->id, 3];
                        $batch[] = [$project->id, 4];
                        $batch[] = [$project->id, 5];
                        $batch[] = [$project->id, 6];
                        $batch[] = [$project->id, 7];
                        $batch[] = [$project->id, 8];
                        break;
                    case Project::TYPE_RESIDENTIAL :
                        $batch[] = [$project->id, 1];
                        $batch[] = [$project->id, 2];
                        $batch[] = [$project->id, 3];
                        $batch[] = [$project->id, 4];
                        break;
                    case Project::TYPE_INDUSTRIAL :
                        $batch[] = [$project->id, 1];
                        $batch[] = [$project->id, 2];
                        $batch[] = [$project->id, 4];
                        break;
                    case Project::TYPE_ENTERTAINMENT :
                        $batch[] = [$project->id, 1];
                        $batch[] = [$project->id, 2];
                        $batch[] = [$project->id, 4];
                        break;
                }
            }

            $this->batchInsert('project_attribute_value', ['projectId', 'attributeId'], $batch);

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
            $this->dropTable('project_attribute_value');
            $this->dropTable('project_type_attribute');
            $this->dropTable('project_attribute');

            $transaction->commit();

            return true;
        } catch (Exception $e) {
            $transaction->rollBack();

            throw $e;
        }
    }
}
