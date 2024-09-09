<?php

namespace backend\models\search;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PlanEstudios;

/**
 * PlanEstudiosSearch represents the model behind the search form of `backend\models\PlanEstudios`.
 */
class PlanEstudiosSearch extends PlanEstudios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plan', 'carrera_id_carrera'], 'integer'],
            [['nombre', 'fecha_autorizacion', 'vigencia', 'estado', 'observaciones'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params, $id=null)
    {
        //$query = PlanEstudio::find();
        if ($id)
             $query = PlanEstudios::find()->where(['carrera_id_carrera' => $id]);
        else
            $query = PlanEstudios::find();
        // add conditions that should always apply here
        
        //$query = PlanEstudios::find();

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
            'id_plan' => $this->id_plan,
            'fecha_autorizacion' => $this->fecha_autorizacion,
            'vigencia' => $this->vigencia,
            'carrera_id_carrera' => $this->carrera_id_carrera,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
