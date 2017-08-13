<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "notes".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $path_to_image
 * @property string $date_of_create
 * @property integer $user_id
 *
 * @property Users $user
 */
class Notes extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'user_id'], 'required'],
            [['text'], 'string'],
            [['date_of_create'], 'safe'],
            [['user_id'], 'integer'],
            [['title', 'path_to_image'], 'string', 'max' => 255],
            //[['path_to_image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'path_to_image' => 'Path To Image',
            'date_of_create' => 'Date Of Create',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
