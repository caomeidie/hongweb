<?php
class UsersController extends UserBaseController
{
    
    public function actions()
    {
        return array(
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
    }
    
    public function actionIndex()
    {
        $users_model = new Users();
        $condition = array('user_id'=>array('>=', 1));
        if($s = Yii::app()->request->getParam('s')){
            switch ($s){
                case 'admin':
                    $condition = array_merge($condition, array('style_id'=>array('=', 2)));
                    break;
                case 'vip':
                    $condition = array_merge($condition, array('style_id'=>array('=', 3)));
                    break;
                case 'normal':
                    $condition = array_merge($condition, array('style_id'=>array('=', 1)));
                    break;
                case 'canceled':
                    $condition = array_merge($condition, array('style_id'=>array('=', 4)));
                    break;
                case 'reported':
                    $condition = array_merge($condition, array('style_id'=>array('=', 5)));
                    break;
            }
        }
        $pagination['count'] = $users_model->usersCount($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $users_list = $users_model->usersList($condition, 'user_id ASC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('users_list', array('list'=>$users_list, 'pagination'=>$pagination));
    }
    
    public function actionAdd()
    {
        $model=new UsersForm();
        if(isset($_POST['UsersForm']))
        {
            $model->attributes=$_POST['UsersForm'];
            if($model->validate())
            {
                if($model->addUser()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", "300");
                }
            }else{
                $result = $this->message("该用户名或手机号或邮箱已存在", "300");
            }
            echo $result;
            exit;
        }
        $this->renderPartial('users_add',array('model'=>$model));
    
    }
    
    public function actionDel()
    {
        $user_id = Yii::app()->request->getParam('uid');
        $users_model = new Users();
        $user_arr = explode(',', $user_id);
        if(count($user_arr) <= 1){
            if($users_model->usersDropOne($user_id))
                $result = $this->message("删除成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }else{
            if($count = $users_model->usersDropAll($user_id))
                $result = $this->message("删除{$count}条成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }
        echo $result;
    }
    
    public function actionEdit()
    {
        $user_id = Yii::app()->request->getParam('uid');
        
        if(isset($_POST['Users']))
        {
            $model=new Users();
            $model->attributes=$_POST['Users'];
            if($model->editUser($user_id)){
                $result = $this->message("修改成功", "200");
            }else{
                $result = $this->message("修改失败", "300");
            }
            echo $result;
        }else{
            $model=new Users();
            $users_info = $model->findAllByPk($user_id);
            $this->renderPartial('users_edit',array('user'=>$users_info[0]));
        }
    }
    
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                echo "<script>alert('请不要乱操作123！')</script>";
            //$this->render('error', $error);
        }
    }
}
?>