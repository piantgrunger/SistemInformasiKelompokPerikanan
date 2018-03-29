<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Anggota',
]) . $model->id_anggota;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Anggota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_anggota, 'url' => ['view', 'id' => $model->id_anggota]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="anggota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
