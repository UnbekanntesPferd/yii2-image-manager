<?php

namespace noam148\imagemanager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use noam148\imagemanager\models\ImageManagerTag;

/**
 * ImageManagerTagSearch represents the model behind the search form of `noam148\imagemanager\models\ImageManagerTag`.
 */
class ImageManagerTagSearch extends ImageManagerTag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'createdBy', 'modifiedBy'], 'integer'],
            [['name', 'created', 'modified'], 'safe'],
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
        $query = ImageManagerTag::find();

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
            'id' => $this->id,
            'createdBy' => $this->createdBy,
            'modifiedBy' => $this->modifiedBy,
            'created' => $this->created,
            'modified' => $this->modified,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
