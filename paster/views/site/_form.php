<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Past */
/* @var $form ActiveForm */
?>
<div class="form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'content')->textarea() ?>

        <?= $form->field($model, 'type')->widget(Select2::class, [
            'data' => \app\models\PastType::$pastType,
//            'options' => ['placeholder' => 'Выберите тип'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <?= $form->field($model, 'expiration_time')->widget(Select2::class, [
            'data' => \app\models\Past::$listLimit,
//            'options' => ['placeholder' => 'Выберите видимость'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
