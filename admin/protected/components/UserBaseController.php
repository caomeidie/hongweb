<?php
class UserBaseController extends Controller
{
    public function beforeAction(){
        parent::beforeAction();
        //判断用户是否有权限操作当前action
        $userStyle_model = new UserStyle();
        $roles = $userStyle_model->getStyle(Yii::app()->user->getId());
        
        $roles_arr = unserialize($roles['roles']);
         
        $action_name = $this->getAction()->getId();
        $controller_name = $this->getId();
        
        $roles_model = new Roles();
        $role = $roles_model->getRole($action_name,'NAME',$controller_name);
        
        if(!$this->checkRole($role, $roles_arr)){
            echo "<script>alertMsg.error('您没有权限访问此模块，请与管理员联系！')</script>";
            exit;
        }
        return true;
    }
    
    /**
     * 判断$role action 是否有执行的权限
     * @param array $role
     * @param array $roles_arr
     * @return boolean true or false
     *
     */
    private function checkRole($role, $roles_arr){
        if(in_array(1, $roles_arr))
            return true;
        
        if(in_array($role['role_id'], $roles_arr) && !in_array($role['related_role_id'], $roles_arr))
            return true;
        
        if(in_array($role['parent_role_id'], $roles_arr))
            return true;
        return false;
    }
    
    /**
     * 信息提醒
     * 
     */
    public function message($message, $code=200){
        return json_encode(array("statusCode"=>$code, "message"=>$message));
    }
}
?>