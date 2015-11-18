<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipo_combustivel".
 *
 * @property integer $id
 * @property integer $nome
 *
 * @property Veiculo[] $veiculos
 */
class TipoCombustivel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_combustivel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'unique', "message"=>"Combustível existente no sistema"],
            [['nome'], 'required', "message"=>"Este campo é obrigatório"],
            [['nome'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculos()
    {
        return $this->hasMany(Veiculo::className(), ['id_tipo_combustivel' => 'id']);
    }
}
