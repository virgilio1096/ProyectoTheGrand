<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entregado;

/**
 * EntregadoSearch represents the model behind the search form of `app\models\Entregado`.
 */
class EntregadoSearch extends Entregado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDproceso',], 'integer'],
            [['Recibio', 'refaccion', 'Comentario', 'FechaEntrega', 'IDusuario', 'IDequipo'], 'safe'],
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
        $query = Entregado::find();
        $query ->  joinWith(['usuario']);
        $query ->  joinWith(['equipo']);

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
            'IDproceso' => $this->IDproceso,
            
        ]);

        $query->andFilterWhere(['like', 'Recibio', $this->Recibio])
            ->andFilterWhere(['like', 'refaccion', $this->refaccion])

            ->andFilterWhere(['like', 'usuario.NombreCompleto', $this->IDusuario])
            ->andFilterWhere(['like', 'equipos.NumSerie', $this->IDequipo])

            ->andFilterWhere(['like', 'Comentario', $this->Comentario])
            ->andFilterWhere(['like', 'FechaEntrega', $this->FechaEntrega]);

        return $dataProvider;
    }
}
