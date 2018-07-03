<?php

use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="anggota-form">

    <?php $form = ActiveForm::begin();
  echo $form->errorSummary($model);

$item[] = [
    'label' => 'Data Budidaya',
    'content' => $this->render('_form_budidaya', ['model' => $model, 'form' => $form]),
];

    ?>




     <?= Tabs::widget(['items' => $item]); ?>






    <?php ActiveForm::end(); ?>

</div>
