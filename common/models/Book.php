<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%book}}".
 *
 * @property int $id
 * @property int $category_id
 * @property int $type_id
 * @property string $title
 * @property string|null $description
 * @property string|null $authors
 * @property string|null $publisher
 * @property string|null $release
 * @property string|null $isbn
 * @property int|null $pages
 * @property string $language
 * @property string $cover_path
 * @property string $book_path
 *
 * @property Category $category
 * @property Type $type
 */
class Book extends \yii\db\ActiveRecord
{
    public $book;
    public $cover;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%book}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['book', 'file', 'extensions' => 'pdf', 'skipOnEmpty' => true],
            ['cover', 'file', 'extensions' => 'jpg, jpeg, png', 'skipOnEmpty' => true],

            [['description', 'authors', 'publisher', 'release', 'isbn', 'pages'], 'default', 'value' => null],
            [['title', 'language', 'cover_path', 'book_path'], 'required'],
            [['category_id', 'type_id', 'pages'], 'integer'],
            [['description'], 'string'],
            [['title', 'authors', 'publisher', 'cover_path', 'book_path'], 'string', 'max' => 255],
            [['release', 'isbn', 'language'], 'string', 'max' => 20],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'type_id' => Yii::t('app', 'Type ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'authors' => Yii::t('app', 'Authors'),
            'publisher' => Yii::t('app', 'Publisher'),
            'release' => Yii::t('app', 'Release'),
            'isbn' => Yii::t('app', 'Isbn'),
            'pages' => Yii::t('app', 'Pages'),
            'language' => Yii::t('app', 'Language'),
            'cover_path' => Yii::t('app', 'Cover Path'),
            'book_path' => Yii::t('app', 'Book Path'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TypeQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BookQuery(get_called_class());
    }

}
