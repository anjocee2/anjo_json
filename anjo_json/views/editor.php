<?php
// phpinfo();
use yii\helpers\Url;
use yii\helpers\Html;

$data=$model->{$attribute};
$input_name=Html::getInputName($model, $attribute);
?>

<?=Html::hiddenInput($input_name, $data, ['id'=>'data_area', 'rows'=>10, 'cols'=>80])?>

<?php
/* 加载页面级别资源 */
\common\widgets\anjo_json\AnjoJsonAsset::register($this);

// $this->registerCssFile('@web/jsoneditor/dist/jsoneditor.css');
// $this->registerJsFile('@web/jsoneditor/dist/jsoneditor.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$url=Url::to(['site/json-editor']);

$json=$model->$attribute;
$json=$model->fields;
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">

  <style type="text/css">
    #jsoneditor1 {
      width: 500px;
      height: 500px;
    }
  </style>
</head>
<body>
<div id="jsoneditor"></div>
<button id="postJSON"> 保存 </button>

<?php $this->beginBlock('test') ?>
  // create the editor
  const container = document.getElementById('jsoneditor')
  const options = {
    mode: 'tree',

    //onClassName: onClassName,
    onChangeJSON: function (j) {
      $('#data_area').val(JSON.stringify(editor.get()));
    }
  }
  const editor = new JSONEditor(container, options)
  editor.set(<?=$json?>);
  editor.expandAll();
  // set json
  $('#setJSON').click(function () {
    /*
    const json = {
      "array": [1, 2, 3],
      'boolean': true,
      'color': '#82b92c',
      'null': null,
      'number': 123,
      'object': {'a': 'b', 'c': 'd'},
      'time': 1575599819000,
      'string': 'Hello World',
      'onlineDemo': 'https://jsoneditoronline.org/'
    }
    */
    const json=<?=$json?>;
    editor.set(json)
  });

  // get json
  $('#getJSON').click(function () {
    const json = editor.get()
    alert(JSON.stringify(json, null, 2))
  });

  // post json
  document.getElementById('postJSON').onclick = function () {
    const json = editor.get()
    $.post('<?=$url?>',
        {
            _csrf:'<?= Yii::$app->request->csrfToken ?>', //在此没有效果。。。 2022.3
            'json':editor.get()
        },
        function(data,status){
            if (status!='success')
              alert("数据: \n" + data);
        }
    );
  }
<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
</body>
</html>
