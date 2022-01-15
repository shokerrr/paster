<?php

/* @var $this yii\web\View */
/* @var $model app\models\Past */

use yii\helpers\Html;

$this->title = 'Создание пасты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Подключаем форму _Form
    </p>

    <?= $this->render('_form', [
            'model' => $model
    ])?>

</div>
