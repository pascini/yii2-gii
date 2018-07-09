<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin(['id' => $model->formName()]); ?>

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
    <div class="form-group">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Salvar') ?> : <?= $generator->generateString('Atualizar') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>

<?= "<?php " ?>

$script = <<< JS

\$('form#{$model->formName()}').on('beforeSubmit', function(e) 
{   
   var \$form = $(this);
    $.post(
        \$form.attr("action"),
        \$form.serialize()
    ).done(function(data) {
        console.log(JSON.stringify(data));
        if(data.status){
            \$("#modalDialog").modal('hide');    
        }
        showMessage(data);
        \$.pjax.reload({container:'#pjaxContainer'});
    }).fail(function(data) {                              
            console.log("server error "+ JSON.stringify(data));
        });
    return false;
});
        
JS;

$this->registerJs($script);