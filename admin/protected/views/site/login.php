<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hongweb system</title>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/js/jquery-1.7.2.js" type="text/javascript"></script>
</head>
<h1>登录</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">带*为必填项</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<?php if(CCaptcha::checkRequirements()): ?>
            <div class="row">
                <?php echo $form->textField($model,'verifyCode');?>
                <?php $this->widget('CCaptcha',
                  array(
                    'showRefreshButton'=>false,
                    'clickableImage'=>true,
                    'buttonLabel'=>'刷新验证码',
                    'imageOptions'=>array(
                        'alt'=>'点击换图',
                        'title'=>'点击换图',
                        'style'=>'cursor:pointer',
                        'padding'=>'0',
                        'height'=>'35',
                    ),
                    'id'=>'captcha_change'
                  )
                ); ?>
            </div>
            <?php echo $form->error($model,'verifyCode'); ?>
       <?php endif;?>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('登录'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
</html>