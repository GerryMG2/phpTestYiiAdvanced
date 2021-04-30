<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "unity".
 *
 * @property int $id
 * @property string $unidad
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Employee[] $employees
 */
class Unity extends \yii\db\ActiveRecord
{

    const SCRENARIO_CREATE = 'create';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unidad'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['unidad'], 'string', 'max' => 64],
            [['unidad'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unidad' => 'Unidad',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['unidades' => 'id']);
    }

   public function scenarios(){
       $scenarios = parent::scenarios();
       $scenarios['create'] = ['unity'];
       return $scenarios;
   } 
}
