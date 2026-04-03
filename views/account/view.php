<?php

use app\models\Category;
use app\models\Level;
use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Заявка #' . $model->id . ' от ' . Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y, h:i:s')
?>
<div class="application-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Назад', ['/account', 'id' => $model->id], ['class' => 'btn btn-outline-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'user_id',
                'value' => $model->user->full_name,
            ],
            'title',
            'description:ntext',
            [
                'attribute' => 'category_id',
                'value' => $model->category->title
            ],
            [
                'attribute' =>  'level_id',
                'value' => $model->level->title
            ],
            [
                'attribute' =>  'cook_time_id',
                'value' => $model->cookTime->hours
            ],
            'date_end',
            'contact',
            'photo',
            [
                'attribute' =>  'status_id',
                'value' => $model->status->title
            ],
        ],
    ]) ?>

</div>
