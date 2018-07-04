<?php

?>

<td><?=$model->nama_anggota; ?>

     </td>
     <td>    <?=$model->posisi; ?>
</td>
<td>    <?=$model->jenis_kelamin; ?>
</td>    <td>    <?=$model->umur; ?>
</td>
            <?php if ($model->jenis_anggota === 'BUDIDAYA') {
    ?>
            <td>   <?= Yii::$app->formatter->asDecimal($model->total_tebar); ?></td>
            <td>   <?= Yii::$app->formatter->asDecimal($model->total_pakan); ?></td>
            <td>   <?= Yii::$app->formatter->asDecimal($model->total_produksi); ?></td>

            <?php
}
        ?>
