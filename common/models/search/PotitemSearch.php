<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PotItem;

/**
 * PotitemSearch represents the model behind the search form about `common\models\PotItem`.
 */
class PotitemSearch extends PotItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pot_id'], 'integer'],
            [['date', 'title', 'datetime_created', 'datetime_updated'], 'safe'],
            [['price', 'amount'], 'number'],
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
        $query = PotItem::find();

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
            'pot_id' => $this->pot_id,
            'date' => $this->date,
            'price' => $this->price,
            'amount' => $this->amount,
            'datetime_created' => $this->datetime_created,
            'datetime_updated' => $this->datetime_updated,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
