
<?php use yii\helpers\Url;

$wallpaper =Url::to(['/img/wallpaper.jpg'],true);
$css = ".section-with-bg
{
    background: url('$wallpaper') no-repeat 50% 0;
        height:800px; 

}";
$this->registerCSS($css);


?>
<div class="site-index">

 
    <section class="section-with-bg" >
    </section >
    
  
 </div>
