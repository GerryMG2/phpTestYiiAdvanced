<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $cargo
 * @property int $unidades
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Unity $unidades0
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'cargo', 'unidades'], 'required'],
            [['unidades', 'created_at', 'updated_at'], 'integer'],
            [['nombres', 'apellidos', 'cargo'], 'string', 'max' => 64],
            [['unidades'], 'exist', 'skipOnError' => true, 'targetClass' => Unity::className(), 'targetAttribute' => ['unidades' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'cargo' => 'Cargo',
            'unidades' => 'Unidades',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Unidades0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidades0()
    {
        return $this->hasOne(Unity::className(), ['id' => 'unidades']);
    }

    public function getUnidadesName(){
        return $this->unidades0->unidad;
    }
}
