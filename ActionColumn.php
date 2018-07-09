<?php

namespace raphaelbsr\gii;

use Yii;

/**
 * Description of MyActionColumn
 *
 * @author rapha
 */
class ActionColumn extends \yii\grid\ActionColumn {
    
    protected function initDefaultButtons() {
        //parent::initDefaultButtons();        
        $this->initDefaultButton('view', 'eye-open', [
            'title' => 'Detalhar',
            'class' => 'viewButton',
        ]);
        $this->initDefaultButton('update', 'pencil', [
            'title' => 'Atualizar',
            'class' => 'updateButton',
        ]);
        $this->initDefaultButton('delete', 'trash', [
            'class' => 'deleteButton',
            'title' => 'Excluir',
            "data-method" => "post",
            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
//            'data-method' => 'post',
//            'data-pjax' => 'pjax-container',
//            'title' => 'Excluir'
        ]);
    }

}
