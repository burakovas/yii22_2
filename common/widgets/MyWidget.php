<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2018-12-26
 * Time: 16:44
 */

namespace common\widgets;
use yii\base\Widget;



class MyWidget extends Widget
{
    public $id;
    public $name = "Имя";
    public $date = "Дата завершения";
    public $description = "Пояснение";

    public function run(){


        return $this->render('my', [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,
            'description' => $this->description

        ]);

    }
}