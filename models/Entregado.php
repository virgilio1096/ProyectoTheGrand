<?php

namespace app\models;
use app\models\user;

use Yii;

/**
 * This is the model class for table "entregado".
 *
 * @property int $IDproceso
 * @property int $IDusuario
 * @property string $Recibio
 * @property string $refaccion
 * @property string $EstatusRefaccion
 * @property int $IDequipo
 * @property string $Comentario
 * @property string $FechaEntrega
 *
 * @property Equipos $equipo
 * @property Usuario $usuario
 */
class Entregado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entregado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDusuario', 'Recibio', 'IDequipo'], 'required'],
            [['IDusuario', 'IDequipo'], 'integer'],
            [['Comentario'], 'string'],
            [['Recibio'], 'string', 'max' => 100],
            [['refaccion'], 'string', 'max' => 200],
            [['FechaEntrega'], 'string', 'max' => 1000],
            [['IDequipo'], 'exist', 'skipOnError' => true, 'targetClass' => Equipos::className(), 'targetAttribute' => ['IDequipo' => 'IDequipo']],
            [['IDusuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IDusuario' => 'IDusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDproceso' => Yii::t('app', 'Idproceso'),
            'IDusuario' => Yii::t('app', $Idusuario='Quien Entrega el Equipo'),
            'Recibio' => Yii::t('app', $Recibio='Equien Recibe el Equipo'),
            'refaccion' => Yii::t('app', $Refaccion='Refaccion Utilizada'),

            'IDequipo' => Yii::t('app', $Idequipo='Numero De Serie Del Equipo'),
            'Comentario' => Yii::t('app', 'Comentario'),
            'FechaEntrega' => Yii::t('app', 'Fecha Entrega'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipo()
    {
        return $this->hasOne(Equipos::className(), ['IDequipo' => 'IDequipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['IDusuario' => 'IDusuario']);

    }
}
