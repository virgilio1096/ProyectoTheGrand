<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipos".
 *
 * @property int $IDequipo
 * @property int $IDusuario
 * @property int $IDdepartamento
 * @property string $Entrego
 * @property string $TipoEquipo
 * @property string $Modelo
 * @property string $NumSerie
 * @property string $FallaEquipo
 * @property string $ComentarioFalla
 * @property string $FechaIngreso
 * @property string $proceso
 *
 * @property Entregado[] $entregados
 * @property Departamento $departamento
 * @property Usuario $
 *composer require 2amigos/yii2-date-picker-widget:~1.0
 */
class Equipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDusuario', 'IDdepartamento', 'Entrego', 'TipoEquipo', 'Modelo', 'NumSerie', 'FallaEquipo'], 'required'],
            [['IDusuario', 'IDdepartamento'], 'integer'],
            [['ComentarioFalla'], 'string'],
            [['FechaIngreso'], 'safe'],
            [['Entrego', 'TipoEquipo', 'Modelo', 'NumSerie', 'FallaEquipo'], 'string', 'max' => 100],
            [['proceso'], 'string', 'max' => 50],
            [['IDdepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['IDdepartamento' => 'IDdepartamento']],
            [['IDusuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IDusuario' => 'IDusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDequipo' => Yii::t('app', 'Idequipo'),
            'IDusuario' => Yii::t('app', $Idusuario='Encargado del Equipo'),
            'IDdepartamento' => Yii::t('app', $Iddepartamento='Departamento'),
            'Entrego' => Yii::t('app', $Entrego='Persona que Entrega el Equipo'),
            'TipoEquipo' => Yii::t('app', $TipoEquipo='Tipo de Equipo'),
            'Modelo' => Yii::t('app', $Modelo='Marca y Modelo'),
            'NumSerie' => Yii::t('app', $NumSerie='Numero de Serie'),
            'FallaEquipo' => Yii::t('app', $FallaEquipo='Falla del Equipo en General'),
            'ComentarioFalla' => Yii::t('app', $ComentarioFalla='Agrege algun Comentario del Equipo Adicional'),
            'FechaIngreso' => Yii::t('app', 'Fecha Ingreso'),
            'proceso' => Yii::t('app', 'Proceso'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregados()
    {
        return $this->hasMany(Entregado::className(), ['IDequipo' => 'IDequipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['IDdepartamento' => 'IDdepartamento']);
             return $this->hasOne(Departamento::className(),['IDdepartamento', 'NombreDepartamento']); 
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['IDusuario' => 'IDusuario']);
         return $this->hasOne(Usser::className(),['IDusuario', 'NombreCompleto']); 
    }
}
