<?php
    /** @var \app\models\Certificate $certificate*/
?>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Courses name</th>
        <th scope="col">Student name</th>
        <th scope="col">Date</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row"><?=$certificate->number?></th>
        <td><?=$certificate->course_name?></td>
        <td><?=$certificate->student_name?></td>
        <td><?=date('d-m-Y',$certificate->date_end)?></td>
    </tr>
    </tbody>
</table>

<?php
Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
$data = "https://example.com/certificates/{$certificate->id}";
$qr = new \chillerlan\QRCode\QRCode();
echo '<img src="'.$qr->render($data).'" />';
?>
