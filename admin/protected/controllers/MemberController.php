<?php
class MemberController extends UserBaseController
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
        $member_model = new Member();
        $condition = array('member_id'=>array('>=', 1));
        if($s = Yii::app()->request->getParam('s')){
            switch ($s){
                case 'block':
                    $condition = array_merge($condition, array('member_state'=>array('=', 0)));
                    break;
                case 'vip':
                    $condition = array_merge($condition, array('member_vip'=>array('=', 1)));
                    break;
            }
        }
        $pagination['count'] = $member_model->countMember($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $member_list = $member_model->getMemberList($condition, 'member_id ASC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('member_list', array('list'=>$member_list, 'pagination'=>$pagination));
    }
    
    public function actionAdd()
    {
        $model=new Member();
        if(isset($_POST['MemberForm']))
        {
            $model->attributes=$_POST['MemberForm'];
            if($this->checkMember(trim($_POST['MemberForm']['member_name']))){
                $result = $this->message("用户名已存在", "300");
            }else if($this->checkMember(trim($_POST['MemberForm']['member_mobile']),'member_mobile')){
                $result = $this->message("该手机已经注册", "300");
            }else if($this->checkMember(trim($_POST['MemberForm']['member_idcard']),'member_idcard')){
                $result = $this->message("该身份证对应的用户已注册", "300");
            }else{
                if($model->addMember()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", "300");
                }
            }
            echo $result;
            exit;
        }
        $this->renderPartial('member_add',array('model'=>$model));
    }
    
    public function actionDel()
    {
        $member_id = Yii::app()->request->getParam('uid');
        $member_model = new Member();
        $member_arr = explode(',', $member_id);
        if(count($member_arr) <= 1){
            if($member_model->dropOneMember($member_id))
                $result = $this->message("删除成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }else{
            if($count = $member_model->dropAllMember($member_id))
                $result = $this->message("删除{$count}条成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }
        echo $result;
    }
    
    public function actionEdit()
    {
        $member_id = Yii::app()->request->getParam('uid');
        $model=new Member();
        
        if(isset($_POST['MemberForm']))
        {
            $model->attributes=$_POST['MemberForm'];
            if($model->editMember($member_id)){
                $result = $this->message("修改成功", "200");
            }else{
                $result = $this->message("修改失败", "300");
            }
            echo $result;
        }else{
            $member_info = $model->findByPk($member_id);
            $this->renderPartial('member_edit',array('member'=>$member_info));
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
    
    private function checkMember($member, $type='member_name')
    {
        $member_model=new Member();
        
        return $member_model->findByAttributes(array($type=>$member));
    }
}
?>
