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
		$this->renderPartial('users_list');
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