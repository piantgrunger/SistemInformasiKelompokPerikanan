<?php

?>

<td><?= $form->field($model, "[$key]bulan_pakan")->dropDownList(array(
        '1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April',
        '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus',
        '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
    )
    )->label(false); ?>

     </td>
<td><?= $form->field($model, "[$key]tahun_pakan")->textInput()->label(false); ?>

     </td>

<td><?= $form->field($model, "[$key]minggu_pakan")->dropDownList(['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], ['prompt' => ''])->label(false); ?>

     </td>
<td><?= $form->field($model, "[$key]komoditas")->textInput()->label(false); ?>

     </td>
     <td><?= $form->field($model, "[$key]qty")->textInput()->label(false); ?>

     </td>


<td><a data-action="delete"><span class="glyphicon glyphicon-trash"></span></a></td>