<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'placeholder'=>Yii::t('app','ahmed salah')]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'placeholder'=>Yii::t('app','only characters and numerber plus _- are allowed')]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder'=>Yii::t('app',($model->scenario=='insert')?'charcters, numbers and @*# only are available':"leave it empty if you don't want to change it")]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder'=>'xxxx@yyy.com']) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true,'placeholder'=>Yii::t('app','Egyptian Mobile Numbers are only available')]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ '0' => 'male', '1' => 'Female'],array('prompt' =>Yii::t('app', '--choose--')))?>

    <?php //$form->field($model, 'created_at')->textInput() ?>

    <?php //$form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
