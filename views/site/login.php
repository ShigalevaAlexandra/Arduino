<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход';

?>
<div class="site-login">
    <br><div class="text-center">
        <div class="col-md-8 offset-md-2 p-5">
            <img class="rounded" src='https://opt-shigaleva.xn--80ahdri7a.site/web/login.png' alt='image' style="width: 120px;"><br>
            <br><h5 class="text-center">Добро пожаловать в автоматизированное рабочее место для управления проектами!</h5>
        </div>
    </div>
   <div class="row">
        <div class="col-md-8 offset-md-2 border border-secondary rounded p-5">
        <h1><?= Html::encode($this->title) ?></h1><br>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <br><div class="form-group">
                <div>
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
