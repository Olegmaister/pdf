<?php

use yii\db\Migration;

/**
 * Class m220220_190136_certificates
 */
class m220220_190136_certificates extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('certificates',[
            'id' => $this->primaryKey(),
            'number' => $this->string()->notNull()->unique(),
            'course_name' => $this->string()->notNull(),
            'student_name' => $this->string()->notNull(),
            'date_end' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('certificates');
    }


}
