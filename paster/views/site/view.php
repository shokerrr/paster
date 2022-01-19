<?php

/* @var $this yii\web\View */
/* @var $model app\models\Past */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Паста';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="past-view">
    <h1><?= Html::encode($this->title) ?></h1>


</div>

<?php
echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content',
            'author_id',
            'expiration_time',
            'type',
            'create_at',
            'is_active',
        ]
]);

?>

