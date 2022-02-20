<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "certificates".
 *
 * @property int $id
 * @property string $number
 * @property string $course_name
 * @property string $student_name
 * @property int $date_end
 */
class Certificate extends \yii\db\ActiveRecord
{

    public static function create( $number, $courses, $studentName,$dateEnd) : self
    {

        $certificate = new self();
        $certificate->number = $number;
        $certificate->course_name = $courses;
        $certificate->student_name = $studentName;
        $certificate->date_end = strtotime($dateEnd);

        return $certificate;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificates';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_name' => 'Course Name',
            'student_name' => 'Student Name',
            'created_at' => 'Created At',
        ];
    }
}
