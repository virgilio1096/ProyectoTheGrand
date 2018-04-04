<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bodega".
 *
 * @property int $IDrefaccion
 * @property string $Refaccion
 * @property string $MarcaModelo
 * @property string $NumSerie
 * @property int $CantiDisponible
 *
 * @property Entregado[] $entregados
 */
class Bodega extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bodega';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Refaccion', 'MarcaModelo', 'NumSerie', 'CantiDisponible'], 'required'],
            [['CantiDisponible'], 'integer'],
            [['Refaccion', 'NumSerie'], 'string', 'max' => 100],
            [['MarcaModelo'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDrefaccion' => Yii::t('app', 'Idrefaccion'),
            'Refaccion' => Yii::t('app', 'Refaccion'),
            'MarcaModelo' => Yii::t('app', $MarcaModelo='Marca/Modelo'),
            'NumSerie' => Yii::t('app', $NumSerie='Numero De Serie'),
            'CantiDisponible' => Yii::t('app', $CantiDisponible='Cantidad Disponibles'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregados()
    {
        return $this->hasMany(Entregado::className(), ['IDrefaccion' => 'IDrefaccion']);
    }

    

}


