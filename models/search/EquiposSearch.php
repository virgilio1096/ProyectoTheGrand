<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipos;
use app\models\Entregado;

use app\models\Usuario;
use app\models\Departamento;
use yii\helpers\ArrayHelper;



/**
 * EquiposSearch represents the model behind the search form of `app\models\Equipos`.
 */
class EquiposSearch extends Equipos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDequipo'], 'integer'],

            [['Entrego', 'TipoEquipo', 'Modelo', 'NumSerie', 'FallaEquipo', 'ComentarioFalla', 'FechaIngreso', 'proceso', 'IDusuario', 'IDdepartamento'], 'safe'],

            
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //$query = Equipos::find();
        $modelentregado = Entregado::find()->all();
        $data = ArrayHelper::toArray($modelentregado, [
            'app\models\Entregado' => [
               'IDequipo',
            ],
        ]);
        $query = Equipos::find()->where(['not in','IDequipo',$data]);

        $query ->  joinWith(['usuario']);
        $query ->  joinWith(['departamento']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IDequipo' => $this->IDequipo,
            
        ]);

        $query->andFilterWhere(['like', 'Entrego', $this->Entrego])
            ->andFilterWhere(['like', 'TipoEquipo', $this->TipoEquipo])
            ->andFilterWhere(['like', 'Modelo', $this->Modelo])
            ->andFilterWhere(['like', 'NumSerie', $this->NumSerie])
            ->andFilterWhere(['like', 'FallaEquipo', $this->FallaEquipo])
            ->andFilterWhere(['like', 'usuario.NombreCompleto', $this->IDusuario])
            ->andFilterWhere(['like', 'departamento.NombreDepartamento', $this->IDdepartamento])
            ->andFilterWhere(['like', 'ComentarioFalla', $this->ComentarioFalla])
            ->andFilterWhere(['like', 'proceso', $this->proceso]);

        return $dataProvider;
    }
}
