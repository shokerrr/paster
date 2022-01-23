<?php

/* @var $this yii\web\View */
/* @var $searchModel */
/* @var $dataProvider*/

use app\models\User;
use yii\bootstrap\Html;
use yii\grid\GridView;

$this->title = 'Главная';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Добро пожаловать!</h1>
        <?= Html::a('Создать пасту', ['/site/create']) ?>
    </div>

    <div class="body-content">

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'content',
                [
                    'attribute' => 'create_at',
                    'format' => 'datetime'
                ],
                [
                    'attribute' => 'author_id',
                    'value' => function ($data) {
                        $user = User::findOne($data->author_id);
                        return $user ? $user->nickname : 'аноним';
                    }
                ],
                'hash',
                [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}'
                ],
            ],
        ]);
    ?>
    </div>
</div>
