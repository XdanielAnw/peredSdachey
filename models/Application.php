<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Application".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 * @property string $title
 * @property string $description
 * @property int $category_id
 * @property int $level_id
 * @property int $cook_time_id
 * @property string $date_end
 * @property string $contact
 * @property string $photo
 * @property int $status_id
 *
 * @property Category $category
 * @property CookTime $cookTime
 * @property Level $level
 * @property Status $status
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'description', 'category_id', 'level_id', 'cook_time_id', 'date_end', 'contact', 'photo', 'status_id'], 'required'],
            [['user_id', 'category_id', 'level_id', 'cook_time_id', 'status_id'], 'integer'],
            [['created_at', 'date_end'], 'safe'],
            [['description'], 'string'],
            [['title', 'photo'], 'string', 'max' => 255],
            [['contact'], 'string', 'max' => 17],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['cook_time_id'], 'exist', 'skipOnError' => true, 'targetClass' => CookTime::class, 'targetAttribute' => ['cook_time_id' => 'id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::class, 'targetAttribute' => ['level_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'created_at' => 'Created At',
            'title' => 'Название',
            'description' => 'Описание (состав ингредиентов и технологию приготовления)',
            'category_id' => 'Категория рецепта (выбор из существующих категорий - "Завтраки",
                "Обеды", "Ужины")',
            'level_id' => ' Сложность рецепта (из списка: простой, средний, сложный, очень
                сложный)',
            'cook_time_id' => 'Примерное время на приготовления блюда (время должно быть в
                промежутке от 2 до 8 часов)',
            'date_end' => 'Дата, когда закончится время публикации рецепта для других',
            'contact' => 'Контактная информация',
            'photo' => 'Фото',
            'status_id' => 'Status ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[CookTime]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCookTime()
    {
        return $this->hasOne(CookTime::class, ['id' => 'cook_time_id']);
    }

    /**
     * Gets query for [[Level]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Level::class, ['id' => 'level_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
