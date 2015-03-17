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
        $pagination['page'] = is_numeric(Yii::app()->request->getQuery('page')) ? Yii::app()->request->getQuery('page') : 0;
        $pagination['perpage'] = 2;
        $pagination['limit'] = $pagination['perpage'].', '.($pagination['page'] * $pagination['perpage']);
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        
        $users_list = $users_model->usersList($condition, 'user_id DESC', $pagination['limit']);        
        
		$this->renderPartial('users_list', array('list'=>$users_list, 'pagination'=>$pagination));
    }
    
    public function actionAdd()
    {
    
    }
    
    public function actionDel()
    {
    
    }
    
    public function actionUpdate()
    {
    
    }
}
?>