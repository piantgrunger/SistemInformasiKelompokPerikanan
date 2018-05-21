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
/* @var $model app\models\Kelompok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelompok-form">


    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
        <?php echo Html::hiddenInput('input-id_kelompok', $model->id_kelompok, ['id'=>'input-id_kelompok']);?>
  <?php
        $item =
[
    [
        'label' => 'Data Kelompok',
        'content' => $this->render('_form_kelompok', ['model' => $model, 'form' => $form]),
        'active' =>true,
    ],

    [
        'label' => 'Data Anggota',
        'content' => $this->render('_form_anggota', ['model' => $model, 'form' => $form]),
        
    ],

   
     
];


echo Tabs::widget([

    'items' =>$item]); 



?>
   

    <?php ActiveForm::end(); ?>

</div>
