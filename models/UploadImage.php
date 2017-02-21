<?php
namespace app\models;

use yii\base\Model;

class UploadImage extends Model
{
    /**
     * @var
     */
    public $picture;


    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['picture'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

}