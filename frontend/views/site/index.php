<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\CertificateForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Certificate';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'certificate-form']); ?>
            <?= $form->field($model, 'number')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'courses')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'studentName')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'dateEnd')->textInput(
                    ['autofocus' => true,'placeholder' => '10-10-2022']) ?>
            <div class="form-group">
                <?= Html::submitButton('Получить сертификат', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>






