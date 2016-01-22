<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Veiculo;
use frontend\models\Motorista;

/* @var $this yii\web\View */
/* @var $model frontend\models\Manutencao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manutencao-form">
    <div class="box box-primary">
        <div class="box-header with-border">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'servico')->textarea(['rows'=>'3'])?>

            <?= $form->field($model, 'custo')->textInput(['type'=>'number', 'step' => '0.01']) ?>

            <?= $form->field($model, 'tipo')->dropDownList($model->getTipo(), $model->getPrompt()) ?>

            <?= $form->field($model, 'data_entrada')->widget(
                DatePicker::className(), [
                    // inline too, not bad
                    'inline' => false,
                    'language' => 'pt',
                    //'size' => 'xs',
                    // modify template for custom rendering
                    //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ]
                ]);?>

            <?= $form->field($model, 'data_saida')->widget(
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


            <?php
                echo $form->field($model, 'id_veiculo')->dropDownList(ArrayHelper::map(Veiculo::find()->where(['status' => '2'])->all(), 'renavam', 'placa_atual'), ['prompt'=>'Selecione a placa do veículo'])

            ?>

            <?= $form->field($model, 'km')->textInput()
                ->hint('Insira um número inteiro.')
            ?>

            <?= $form->field($model, 'id_motorista')->dropDownList(ArrayHelper::map(Motorista::find()->all(), 'cnh', 'nome'), ['prompt'=>'Selecione o nome do motorista']) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
