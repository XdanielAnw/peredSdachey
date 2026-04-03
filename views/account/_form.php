<?php

use app\models\Category;
use app\models\Level;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <h3>Рецепт</h3>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        Category::getCategory(), ['prompt' => 'Выберите категорию']
    ) ?>

    <?= $form->field($model, 'level_id')->dropDownList(
        Level::getLevel(), ['prompt' => 'Выберите сложность']
    ) ?>

    <?= $form->field($model, 'cook_time_id')->dropDownList(
        Level::getLevel(), ['prompt' => 'Выберите время готовки']
    ) ?>

    <?= $form->field($model, 'date_end')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'contact')->widget(\yii\widgets\MaskedInput::class, [
            'mask' => '+7(999)-999-99-99',
    ]) ?>

    <?= $form->field($model, 'photo')->textInput(['type' => 'file']) ?>

    <div class="form-group">
        <?= Html::submitButton('Опубликовать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
