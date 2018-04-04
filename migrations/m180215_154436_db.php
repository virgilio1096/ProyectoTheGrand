<?php

use yii\db\Migration;

/**
 * Class m180215_154436_db
 */
class m180215_154436_db extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('usuario',[
        'IDusuario' => $this -> primarykey(),
        'NombreCompleto' =>  $this ->string(100)->notNull(),
        'Telefono' => $this ->String(10)->notNull(),
        'Correo' =>  $this ->String(50)->notNull(),
        'Usuario' => $this ->string(100)->notNull(),
        'Password' => $this ->string(200)->notNull(),
        'Roll' => $this ->string(200)->notNull(),
        ]);
        $this->createTable('bodega',[
        'IDrefaccion' => $this ->primarykey(),
        'Refaccion' => $this ->string(100)->notNull(),
        'MarcaModelo' => $this ->string(150)->notNull(),
        'NumSerie' => $this ->string(100)->notNull(),
        'CantiDisponible' => $this ->integer(200)->notNull(),
        ]);

        $this->createTable('equipos',[
        'IDequipo' => $this ->primarykey(),
        'IDusuario' => $this ->integer()->notNull(),
        'IDdepartamento' => $this ->integer()->notNull(),
        'Entrego' => $this ->String(100)->notNull(),
        'TipoEquipo' => $this ->string(100)->notNull(),
        'Modelo' => $this ->string(100)->notNull(),
        'NumSerie' => $this ->string(100)->notNull(),
        'FallaEquipo' => $this ->string(100)->notNull(),
        'ComentarioFalla' => $this ->text(),
        'FechaIngreso'=> $this ->String(1000),
        'proceso'=> $this ->string(50)
        ]);

        $this->createTable('departamento',[
        'IDdepartamento' => $this ->primarykey(),
        'NombreDepartamento' => $this ->string(100)->notNull(),
        'Extension' => $this ->string(100)->notNull(),
        ]);

        $this->createTable('Entregado',[
        'IDproceso' => $this ->primarykey(),
        'IDusuario' => $this ->integer()->notNull(),
        'Recibio' => $this ->string(100)->notNull(),
        'refaccion' => $this ->string(200),
        'EstatusRefaccion' => $this ->string(100),
        'IDequipo' => $this ->integer()->notNull(),
        'Comentario' => $this ->text(),
        'FechaEntrega' =>  $this ->String(1000),
        ]);



            $this->addForeignKey(
            'usuarioentregado',
            'entregado',
            'IDusuario',
            'usuario',
            'IDusuario',
            'CASCADE');



            $this->addForeignKey(
            'equipoentregado',
            'entregado',
            'IDequipo',
            'equipos',
            'IDequipo',
            'CASCADE');

            $this->addForeignKey(
            'usuarioequipo',
            'equipos',
            'IDusuario',
            'usuario',
            'IDusuario',
            'CASCADE');

            $this->addForeignKey(
            'departamentoequipo',
            'equipos',
            'IDdepartamento',
            'departamento',
            'IDdepartamento',
            'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       // echo "m180215_154436_db cannot be reverted.\n";

        //return false;
        $this->dropTable('usuario');
        $this->dropTable('bodega');
        $this->dropTable('equipos');
        $this->dropTable('prosesos');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_154436_db cannot be reverted.\n";

        return false;
    }
    */
}
