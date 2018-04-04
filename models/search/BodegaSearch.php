<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bodega;

/**
 * BodegaSearch represents the model behind the search form of `app\models\Bodega`.
 */
class BodegaSearch extends Bodega
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDrefaccion', 'CantiDisponible'], 'integer'],
            [['Refaccion', 'MarcaModelo', 'NumSerie'], 'safe'],
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
        
        $query = Bodega::find();
       

       
         

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
            'IDrefaccion' => $this->IDrefaccion,
            'CantiDisponible' => $this->CantiDisponible,
        ]);

        $query->andFilterWhere(['like', 'Refaccion', $this->Refaccion])
            ->andFilterWhere(['like', 'MarcaModelo', $this->MarcaModelo])
            ->andFilterWhere(['like', 'NumSerie', $this->NumSerie]);

        return $dataProvider;
    }
}
