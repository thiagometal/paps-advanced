<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TipoCombustivel;


/**
 * TipoCombustivelSearch represents the model behind the search form about `app\models\TipoCombustivel`.
 */
class TipoCombustivelSearch extends TipoCombustivel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['nome'], 'safe'],
            [['preco_litro'], 'number'],
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
        $query = TipoCombustivel::findBySql("SELECT * FROM tipo_combustivel WHERE data != '2001-09-11'");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'nome' => $this->nome,
            'preco_litro' => $this->preco_litro,
        ]);


        $query->andFilterWhere(['like', 'preco_litro', $this->preco_litro]);

        return $dataProvider;
    }
}
