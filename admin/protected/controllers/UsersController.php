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
        $condition = array('lastip'=>array('=', '127.0.0.1'), 'user_id'=>array('>=', 1));

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
                    echo json_encode(array("statusCode"=>"200", "message"=>"添加成功"));
                }else{
                    echo json_encode(array("statusCode"=>"300", "message"=>"添加失败"));
                }
                exit;
            }
        }
        $this->renderPartial('users_add',array('model'=>$model));
    
    }
    
    public function actionDel()
    {
    
    }
    
    public function actionUpdate()
    {
    
    }
}
?>