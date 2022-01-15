<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Past */
/* @var $form ActiveForm */
?>
<div class="form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'content') ?>

<!--  TODO  Скрыть -->
        <?= $form->field($model, 'author_id') ?>

<!--  TODO  SELECT 2 -->
        <?= $form->field($model, 'type') ?>

    <!-- TODO   Скрыть -->
        <?= $form->field($model, 'create_at') ?>
    <!--  TODO  Скрыть -->
        <?= $form->field($model, 'is_active') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
