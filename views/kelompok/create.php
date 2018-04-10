<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kelompok */

$this->title = Yii::t('app', 'Kelompok  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kelompok'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
