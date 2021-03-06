<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
		
	public function beforeAction($action){
	    //判断用户登录时间是否已过期
	    if(!Yii::app()->user->isGuest){
	        if(time()<Yii::app()->user->getState('sessionTimeoutSeconds')){
	            Yii::app()->user->setState('sessionTimeoutSeconds', time()+Yii::app()->params['sessionTimeoutSeconds']);
	            return true;
	        }else{
	            Yii::app()->user->logout();
	            //$this->redirect(Yii::app()->homeUrl.'?r=site/login');
	            //echo $this->message("登录超时", "301");
	            echo "<script>testConfirmMsg('登陆超时，请重新登陆！', '".Yii::app()->request->baseUrl."');</script>";
	            exit;
	        }
	    }else{
	        return true;
	    }
	}	
}
?>