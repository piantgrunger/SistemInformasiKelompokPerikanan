<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kelompok */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Kelompok',
]) . $model->id_kelompok;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kelompok'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kelompok, 'url' => ['view', 'id' => $model->id_kelompok]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="kelompok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
