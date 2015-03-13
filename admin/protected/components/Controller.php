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
	
	public function beforeAction(){
	    //判断用户登录时间是否已过期
	    if(!Yii::app()->user->isGuest){
	        if(time()<Yii::app()->user->getState('sessionTimeoutSeconds')){
	            Yii::app()->user->setState('sessionTimeoutSeconds', time()+Yii::app()->params['sessionTimeoutSeconds']);
	            

	            //判断用户是否有权限操作当前action
	            $usersRole_model = new UsersRole();
	            $roles = $usersRole_model->getRoles(Yii::app()->user->getId());
	             
	            $roles_arr = explode(',', $roles['roles']);
	            $action_name = $action->id;
	             
	            $roles_model = new Roles();
	            $role = $roles_model->getRole($action_name,'NAME');
	             
	            return $this->checkRole($role['role_id'], $roles_arr);
	        }else{
	            Yii::app()->user->logout();
	            $this->redirect('?r=site/login');
	        }
	    }else{
	        return true;
	    }
	}
	
	/**
	 * 判断$role action 是否有执行的权限
	 * @param int $role
	 * @param array $roles_arr or string
	 * @return boolean true or false
	 * 
	 */
	private function checkRole($role, $roles_arr){
	    if(is_array($roles_arr)){
	        if((in_array($role, $roles_arr) && !in_array($role, $roles_arr)) || in_array($role, $roles_arr)){
	            return true;
	        }else{
	            return false;
	        }
	    }else{
	        if($role == $roles_arr){
	            return true;
	        }else{
	            return false;
	        }
	    }
	    
	}
}
?>