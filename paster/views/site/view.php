<?php

/* @var $this yii\web\View */
/* @var $model app\models\Past */

use app\models\Past;
use app\models\PastType;
use yii\helpers\Html;
use yii\helpers\Url;
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
            [
                'attribute' => 'author_id',
                'value' => function($model) {
                    return $model->author ? $model->author->nickname : 'аноним';
                }
            ],
            [
                'attribute' => 'expiration_time',
                'value' => function($model) {
                    return Past::$listLimit[$model->expiration_time];
                }
            ],
            [
                'attribute' => 'type',
                'value' => function($model) {
                    return PastType::$pastType[$model->type];
                }
            ],
            [
                'attribute' => 'create_at',
                'format' => 'datetime'
            ],
            [
                'attribute' => 'hash',
                'label' => 'Ссылка',
                'value' => function($model) {
                    return Url::base(true) . '/' . $model->hash;
                }
            ]
        ]
]);

?>

