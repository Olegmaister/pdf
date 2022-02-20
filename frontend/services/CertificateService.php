<?php

namespace frontend\services;

use app\models\Certificate;
use frontend\models\CertificateForm;
use frontend\repositories\CertificateRepository;
use kartik\mpdf\Pdf;

class CertificateService
{
    private $certificates;
    public function __construct(CertificateRepository $certificates)
    {
        $this->certificates = $certificates;
    }

    public function create(CertificateForm $form)
    {
        $certificate = Certificate::create(
            $form->number,
            $form->courses,
            $form->studentName,
            $form->dateEnd
        );

        $this->certificates->save($certificate);

        return $certificate;
    }

    public function pdf($content, Certificate $certificate)
    {
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => 'Krajee Report Title'],
            'methods' => [
                'SetHeader'=>['Certificate '.$certificate->student_name],
            ]
        ]);

        return $pdf;
    }
}