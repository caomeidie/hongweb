<?php
class AdminController extends UserBaseController
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
        $admin_model = new Admin();
        $condition = array('admin_id'=>array('>=', 1));
        if($s = Yii::app()->request->getParam('s')){
            switch ($s){
                case 'admin':
                    $condition = array_merge($condition, array('style_id'=>array('=', 1)));
                    break;
                case 'editor':
                    $condition = array_merge($condition, array('style_id'=>array('=', 2)));
                    break;
                case 'finance':
                    $condition = array_merge($condition, array('style_id'=>array('=', 3)));
                    break;
                case 'service':
                    $condition = array_merge($condition, array('style_id'=>array('=', 4)));
                    break;
            }
        }
        $pagination['count'] = $admin_model->adminCount($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $admin_list = $admin_model->adminList($condition, 'admin_id ASC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('admin_list', array('list'=>$admin_list, 'pagination'=>$pagination));
        exit;
    }
    
    public function actionAdd()
    {
        $model=new AdminForm();
        if(isset($_POST['AdminForm']))
        {
            $model->attributes=$_POST['AdminForm'];
            if($model->validate())
            {
                if($model->addAdmin()){
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
        $style_model = new AdminStyle();
        $style_list = $style_model->stylesList();
        $this->renderPartial('admin_add',array('model'=>$model, 'styles'=>$style_list));
    
    }
    
    public function actionDel()
    {
        $admin_id = Yii::app()->request->getParam('sid');
        $admin_model = new Admin();
        $admin_arr = explode(',', $admin_id);
        if(count($admin_arr) <= 1){
            if($admin_model->adminDropOne($admin_id))
                $result = $this->message("删除成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }else{
            if($count = $admin_model->adminDropAll($admin_id))
                $result = $this->message("删除{$count}条成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }
        echo $result;
    }
    
    public function actionEdit()
    {
        $admin_id = Yii::app()->request->getParam('uid');
        
        if(isset($_POST['Admin']))
        {
            $model=new Admin();
            $model->attributes=$_POST['Admin'];
            if($model->editAdmin($admin_id)){
                $result = $this->message("修改成功", "200");
            }else{
                $result = $this->message("修改失败", "300");
            }
            echo $result;
        }else{
            $model=new Admin();
            $admin_info = $model->findByPk($admin_id);
            $style_model = new AdminStyle();
            $style_list = $style_model->stylesList();
            $this->renderPartial('admin_edit',array('admin'=>$admin_info, 'styles'=>$style_list));
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
