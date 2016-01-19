<?php

use dosamigos\datepicker\DatePicker;
use frontend\models\Motorista;
use frontend\models\TipoCombustivel;
use frontend\models\PostoAbastecimento;
use frontend\models\Veiculo;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Abastecimento */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="abastecimento-form">
    <div class="box box-primary">
        <div class="box-header with-border">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'id_posto')->dropDownList(ArrayHelper::map(PostoAbastecimento::find()->all(), 'id', 'nome'), ['prompt'=>'Selecione uma opção']) ?>

            <?= $form->field($model, 'id_combustivel')->dropDownList(ArrayHelper::map(TipoCombustivel::find()->all(), 'id', 'nome'),
                ['prompt'=>'Selecione uma opção',
                'onchange' =>'
                var valor_abastecimento = document.getElementById("abastecimento-valor_abastecido").value;

                $.get("index.php?r=abastecimento/calculo&id='.'" + $(this).val()+"&valor_abastecido="+valor_abastecimento, function(data){
                    //console.log("res: "+data);
                    document.getElementById("abastecimento-qty_litro").value = data;

                });',

                ]) ?>

            <?= $form->field($model, 'valor_abastecido')->textInput(
                [
                    'readonly' => 'true',
                ]
            )
            ?>

            <?= $form->field($model, 'qty_litro')->textInput(
                [
                    'onkeyup' =>'
                    var id_combustivel = document.getElementById("abastecimento-id_combustivel").value;
                    //console.log("res: "+$(this).val());
                    $.get("index.php?r=abastecimento/calculo&quantidade_litros='.'" + $(this).val()+"&id="+id_combustivel, function(data){
                        //console.log("res: "+data);
                        document.getElementById("abastecimento-valor_abastecido").value = data;

                    });'

                ]) ?>

            <?= $form->field($model, 'id_veiculo')->dropDownList(ArrayHelper::map(Veiculo::find()->all(), 'renavam', 'placa_atual'), ['prompt'=>'Selecione uma opção']) ?>

            <?= $form->field($model, 'km')->textInput()
                ->hint('Insira um número inteiro.')
            ?>

            <?= $form->field($model, 'id_motorista')->dropDownList(ArrayHelper::map(Motorista::find()->all(), 'cnh', 'nome'), ['prompt'=>'Selecione uma opção']) ?>

            <?= $form->field($model, 'data_abastecimento')->widget(
                DatePicker::className(), [
                    // inline too, not bad
                    'inline' => false,
                    'language' => 'pt',
                    // modify template for custom rendering
                    //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ]
                ]);?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>
