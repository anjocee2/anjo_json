# JSON Editor for Yii2

This widget for Yii2 is a version of https://github.com/josdejong/jsoneditor


### Install

- copy folder 'anjo_json' to Yii2's project's common/widget (advanced version)


### Usage
- in controller-file, add this line:
        return $this->render('json-editor', ['model'=>$model]);

- in view-file, add this line:
<? echo $form->field($model, 'fields')->widget('common\widgets\anjo_json\AnjoJson') ?>

- other codes is as same as normal Yii2 codes;