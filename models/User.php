<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $IDusuario
 * @property string $NombreCompleto
 * @property string $Telefono
 * @property string $Correo
 * @property string $Usuario
 * @property string $Password
 * @property string $Roll
 *
 * @property Entregado[] $entregados
 * @property Equipos[] $equipos
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreCompleto', 'Telefono', 'Correo', 'Usuario', 'Password', 'Roll'], 'required'],
            [['NombreCompleto', 'Usuario'], 'string', 'max' => 100],
            [['Telefono'], 'string', 'max' => 10],
            [['Correo'], 'string', 'max' => 50],
            [['Password', 'Roll'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDusuario' => Yii::t('app', 'Idusuario'),
            'NombreCompleto' => Yii::t('app', 'Nombre Completo'),
            'Telefono' => Yii::t('app', 'Telefono'),
            'Correo' => Yii::t('app', 'Correo'),
            'Usuario' => Yii::t('app', 'Usuario'),
            'Password' => Yii::t('app', $Password='Contraseña'),
            'Roll' => Yii::t('app', $Roll='Tipo de Usuario'),
        ];
    }

    


    public function guardar(){
        $this->validate();
            $this->Password = $this->setPassword($this->Password);
             \Yii::$app->session->setFlash('success',"Usuario Registrado");
            return $this->save();


        }


    public static function findIdentity($id) {
        return static::findOne(['IDusuario' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return null;
    }
    
    public function getId() {
        return $this->getPrimarykey();
    }
    
    public function getAuthKey() {
        return null;
    }

    public function validateAuthKey($authKey) {
        return null;
    }
    
     public static function findByUsername($usuario)
    {
         return self::findOne(['usuario'=>$usuario]);
    }
    
    public function validatePassword($Password){
        return Yii::$app->getSecurity()->validatePassword($Password, $this->Password);
    }
     /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($Password)
    {
        return Yii::$app->getSecurity()->generatePasswordHash($Password);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregados()
    {
        return $this->hasMany(Entregado::className(), ['IDusuario' => 'IDusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipos::className(), ['IDusuario' => 'IDusuario']);
    }



    public static function idusuarioadmin($id)
    {
        if (User::findOne(['IDusuario'=>$id, 'Roll'=>1])) {
            return true;
        }else{
            return false;
        }
    }

    public static function idusuarionormal($id)
    {
        if (User::findOne(['IDusuario'=>$id, 'Roll'=>0])) {
            return true;
        }else{
            return false;
        }
    }    



}
