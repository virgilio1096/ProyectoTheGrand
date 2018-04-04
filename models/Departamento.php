<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $IDdepartamento
 * @property string $NombreDepartamento
 * @property string $Extension
 *
 * @property Equipos[] $equipos
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreDepartamento', 'Extension'], 'required'],
            [['NombreDepartamento', 'Extension'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDdepartamento' => Yii::t('app', 'Iddepartamento'),
            'NombreDepartamento' => Yii::t('app', $NombreDepartamento='Nombre Del Departamento'),
            'Extension' => Yii::t('app', 'Extension'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipos::className(), ['IDdepartamento' => 'IDdepartamento']);
    }
}
