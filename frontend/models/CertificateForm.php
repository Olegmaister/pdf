<?php

namespace frontend\models;

use app\models\Certificate;
use yii\base\Model;

class CertificateForm extends Model
{
    public $number;
    public $courses;
    public $studentName;
    public $dateEnd;

    public function rules()
    {
        return [
            [['courses', 'studentName', 'number'], 'required'],
            [['dateEnd'], 'date', 'format' => 'dd-mm-yyyy'],
            [['number'], 'unique', 'targetClass' => Certificate::class]
        ];
    }
}