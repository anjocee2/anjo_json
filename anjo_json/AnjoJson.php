<?php
namespace common\widgets\anjo_json;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\base\InvalidConfigException;

/**
 * Json字段编辑控件
 * 以下是 action 处理部分的示例代码：
    $id=44;
    $model=$model_name::findOne($id);
    $field_name='fields';
    $model_name='common\models\SysOtableDefine';
    if (Yii::$app->request->post())
    {
        $json=$_POST['json'] ?? '{}';
        if (is_string($json) && (substr($json,0,1)=='[')) $json='{'.$json.'}';
        if (is_array($json)) $json=json_encode($json, JSON_UNESCAPED_UNICODE); //解决json_encode乱码问题。时好时坏...
        $model->$field_name=$json;

        if (!$model->save()) show_model_errors($model);
        die();
    }
*/
class AnjoJson extends InputWidget
{
    public function init()
    {
        // ...
        parent::init();
    }

    public function run(){
        $opt = [
            'model'     => $this->model,
            'attribute' => $this->attribute,
        ];

        // 避免 json 字段为空的时候，json编辑器出不来
        $attr=$this->attribute;
        // if (empty($this->model->$attr)) $this->model->$attr='[{}]';

        return $this->render('editor', $opt);
    }
}

