<?php

namespace pascini\gii;

/**
 * @copyright Copyright &copy; Raphael Barbosa, 2018
 * @package   raphaelbsr\gii
 * @version   1.0.0
 */

class JsonEncoderHelper {

    const STATUS_SUCCESS = true;
    const STATUS_ERROR = false;
    const MESSAGE_SUCCESS = "Operação realizada com sucesso";
    const MESSAGE_ERROR = "Ocorreu um erro durante o processamento";
    const MESSAGE_POST_ERROR = "Restrição: A requisição não é do tipo post";

    /**
     * 
     * @param boolean $status
     * @param string $message
     * @param json $data
     * @param string|array $errors
     */
    public static function encodeJsonResponse($status, $message, $data = null, $errors = null) {    
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $stdClass = new \stdClass();
        $stdClass->status = $status;
        $stdClass->message = $message;
        $stdClass->data = $data;
        $stdClass->errors = null;
        
        if($errors != null){
            if(is_array($errors)){
                //$stdClass->errors = serialize($errors);
                foreach ($errors as $error) {
                    foreach ($error as $e)
                    $stdClass->errors .= ' | '. $e. '<br/>';
                }//endforeach
            }else{
                $stdClass->errors = $errors;
            }//endelse
        }//endif
        
        $stdClass->data = $data;        
        //return \yii\helpers\BaseJson::encode($stdClass);        
        return $stdClass;
    }
    
    
    public static function encode($status, $message, $data = null, $errors = null) {  
        return self::encodeJsonResponse($status, $message, $data, $errors);
    }
}
