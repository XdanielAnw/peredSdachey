<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property int $id
 * @property string $title
 *
 * @property Application[] $applications
 */
class Level extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Appliications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['level_id' => 'id']);
    }

    public static function getLevel()
    {
        return static::find()
            ->select('title')
            ->indexBy('id')
            ->column();
    }

}
