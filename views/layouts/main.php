
<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use kartik\nav\NavX;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use app\assets\AppAsset;
AppAsset::register($this);
use hscstudio\mimin\components\Mimin;
$menuItems =
        [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii/'],'visible' => !Yii::$app->user->isGuest],
                    [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'Manajemen User / Group',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                    ['label' => 'App. Route', 'icon' =>  'fa fa-circle-o', 'url' => ['/mimin/route/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role', 'icon' =>  'fa fa-circle-o', 'url' => ['/mimin/role/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => ' fa fa-circle-o', 'url' => ['/user/index'],'visible' => !Yii::$app->user->isGuest],
                   ]]
                        ,
                        ['label' => 'Anggota', 'icon' => 'fa fa-file-code-o', 'url' => ['/anggota/index'],'visible' => !Yii::$app->user->isGuest],
                        ['label' => 'Kelompok', 'icon' => 'fa fa-file-code-o', 'url' => ['/kelompok/index'],'visible' => !Yii::$app->user->isGuest],
                        
                ];     
                
 if (!Yii::$app->user->isGuest)
{             
 if (Yii::$app->user->identity->username !== 'admin') 
{
  $menuItems = Mimin::filterMenu($menuItems);
};
}        
$this->title ='Sistem Informasi Kelompok Perikanan'
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'SIKP',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>
      [
[
  'label' => 'Logout',
  'url' => ['/site/logout'],
  'linkOptions' => ['data-method' => 'post'],
  'visible' => !Yii::$app->user->isGuest
]],
               
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		<?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Sistem Informasi Kelompok Perikanan <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>