<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\assets\AppAsset;
use app\assets\ThemeAsset;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

AppAsset::register($this);
ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?= Html::csrfMetaTags() ?>
        <!-- Page title -->
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition login-page">
        <?php $this->beginBody() ?>
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="javascript:;" class="h1"><b>Anker</b>ADMIN</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'loginForm',
                    ]);
                    ?>
                    <?=
                    $form->field($model, 'username', [
                        'template' => '<div class="input-group mb-3">{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div></div>{error}{hint}',
                    ])->textInput(['autofocus' => true, 'placeholder' => 'E-mail address'])->label(false)
                    ?>

                    <?=
                    $form->field($model, 'password', [
                        'template' => '<div class="input-group mb-3">{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div></div>{error}{hint}',
                    ])->passwordInput(['placeholder' => 'Password'])->label(false)
                    ?>

                    <div class="row">
                        <div class="col-8">
                            <?=
                            $form->field($model, 'rememberMe')->checkbox([
                                'template' => '<div class="icheck-primary">{input}<label for="remember">Remember Me</label></div>',
                                'class' => 'chkbox-custom'
                            ])->label(false)
                            ?>
                        </div>
                        <div class="col-4">
                            <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
