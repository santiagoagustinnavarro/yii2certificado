<?php

namespace app\models;

use Yii;
use yii\base\Model;



class CsvForm extends Model{
    public $file;

    public function rules(){
        return [
            [['file'],'required'],
            [['file'],'file','extensions'=>'csv','maxSize'=>1024 * 1024 * 5],
        ];
    }

    public function attributeLabels(){
        return [
            'file'=>'Selecione  xxxx.csv',
        ];
    }
}
