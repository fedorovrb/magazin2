<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $articul
 * @property integer $price
 */
class Product extends \yii\db\ActiveRecord
{

    public $imageFiles;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'articul', 'price'], 'required'],
            [['price'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['articul'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 1000],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'articul' => 'Articul',
            'description' => 'Description',
            'price' => 'Price',
            'imageFiles' => 'imageFiles',
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs($file->baseName . '.' . $file->extension);
                 Yii::$app->db->createCommand()->insert('images', [
                    'id' => $this->id,
                    'name' => $file->baseName . '.' . $file->extension,
           ])->execute();
            }
            return true;
        } else {
            return false;
        }
    }
    
}
