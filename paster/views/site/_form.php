<?php

use app\models\PastType;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Past */
/* @var $form ActiveForm */

$type = PastType::$pastType;

if (\Yii::$app->user->isGuest) {
    unset($type[PastType::PRIVATE_TYPE]);
}

?>
<div class="form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'content')->textarea() ?>

        <?= $form->field($model, 'type')->widget(Select2::class, [
            'data' => $type,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <?= $form->field($model, 'expiration_time')->widget(Select2::class, [
            'data' => \app\models\Past::$listLimit,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
