<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\checkbox\CheckboxX;
use dmstr\widgets\Alert;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "<span class='glyphicon glyphicon-envelope form-control-feedback text-white'></span>{input}"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "<span class='glyphicon glyphicon-lock form-control-feedback text-white'></span>{input}"
];
$checkboxTemplate = '<div class="switch">{beginLabel}{input}{labelTitle}<span class="lever"></span>{endLabel}{error}{hint}</div>';
?>
  <div class="row fullHeight">
    <div class="col-sm-4 leftCol">
        <center>
            <h2><b>L</b>ogin Page</h2>
            SMK Negeri 1 Jenangan
            <img src="<?=yii\helpers\Url::base().'/uploaded/base/smk.png'?>" class="img img-responsive imgLogin" id="login-logo">
        </center>
    </div>
    <div class="col-sm-8 rightCol">

        <?= Alert::widget() ?>
      <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false, 'fieldConfig' => ['errorOptions' => ['encode' => false, 'class' => 'help-block']]]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['class'=>'formInput form-control', 'placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['class'=>'formInput form-control', 'placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe',['options'=>['class'=>'form-group checkbox']])->widget(CheckboxX::classname(), []); ?>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('<i class="glyphicon glyphicon-log-in"></i>', ['class' => 'btn btn-login btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
  </div>
