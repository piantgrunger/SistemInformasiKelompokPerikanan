<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Propinsi;
use app\models\Kota;

use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\datecontrol\DateControl;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="anggota-form">

    <?php $form = ActiveForm::begin();
    
    $item =
[
    [
        'label' => 'Data Anggota',
        'content' => $this->render('_form_anggota', ['model' => $model, 'form' => $form]),
        'active' =>true,
    ],

   
     
];
if($model->jenis_anggota ==='PENGOLAHAN')
{
$item[]= [
    'label' => 'Data Pengolahan',
    'content' => $this->render('_form_pengolahan', ['model' => $model, 'form' => $form]),
];
}

if($model->jenis_anggota ==='BUDI DAYA')
{
$item[]= [
    'label' => 'Data Budi Daya',
    'content' => $this->render('_form_budidaya', ['model' => $model, 'form' => $form]),
];
}

    ?>

                    <?= Tabs::widget([
        'items' =>$item]); ?>

       



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
