<?php
class JinbidetailAction extends CommonAction {

    public function csdd(){
        $User = M ( 'jyzx' ); // 實例化User對象
        $data = I ( 'post.user' );

        if($data){
            $map['mc_user']=$data;

        }
    
        $map['zt']=0;
        $map['datatype']="qgcbt";

        import("@.ORG.Util.Page");// 导入分页类
        $count = $User->where ( $map )->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->count (); // 查詢滿足要求的總記錄數
        $p = new Page($count,12);

        $list = $User->where ( $map )->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
        $show       = $p->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出

        $this->assign ( 'list', $list ); // 賦值數據集
        $this->display();
    }
    public function csdddel(){
        $id=$_GET['id'];
        $result=M('jyzx')->where(array('id'=>$id))->find();
        $users=M('member')->where(array('username'=>$result['mc_user']))->find();
        $shouxu = M('member_group')->where(array('level'=>$users['level']))->getField('shouxu');
        $tui =  $users['qjinbi'] + $users['qjinbi'] * $shouxu;
        if($users['qjinbi'] >= $tui){
            $user1=M('member')->where(array('username'=>$result['mc_user']))->setInc('ksye',$tui);
            $user=M('member')->where(array('username'=>$result['mc_user']))->setDec('qjinbi',$tui);
            $ppdd=M('jyzx')->where(array('id'=>$id))->delete();
            if($ppdd){
                $this->success("删除成功");
            }
        }else{
            $this->error("删除失败");
        }

    }






    //toushu
    public function report_order(){

        $ppdd_id=I('get.ppdd_id',0,'intval');
        $where="1=1";

        if(!empty($ppdd_id)){
            $where.=" and a.pid = ".$ppdd_id;
        }
        import("ORG.Util.Page");// 导入分页类
        $count = M('tousu')->alias('a')->where ($where)->count (); // 查詢滿足要求的總記錄數
        $p = new Page($count,30);


        $list=M('tousu')->alias('a')
            ->field("a.*,b.id as user_id,c.id as buser_id")
            ->join("ds_member as b on a.user=b.username")
            ->join("ds_member as c on a.buser=c.username")
            ->where($where)->order("a.id desc")->limit ( $p->firstRow, $p->listRows )->select();
        $show = $p->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出

        $this->assign ( 'list', $list ); // 賦值數據集
        $this->display();


    }

    public function qiugou(){

        $User = M ( 'jyzx' ); // 實例化User對象
        $data = I ( 'post.user' );

        if($data){
            $map['mr_user']=$data;
        }
        // $map['mc_user'] =array('not in',[18867513490,18916953132,18918174254]);


        $map['zt']=0;
        $map['datatype']="qgcbt";
        import("@.ORG.Util.Page");// 导入分页类
        $count = $User->where ( $map )->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->count (); // 查詢滿足要求的總記錄數
        $p = new Page($count,12);

        $list = $User->where ( $map )->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
        $show       = $p->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出

        $this->assign ( 'list', $list ); // 賦值數據集
        $this->display();
    }
    public function qiugoudel(){

        $id=$_GET['id'];
        $ppdd=M('jyzx')->where(array('id'=>$id))->delete();
        if($ppdd){
            $this->success("删除成功");
        }
    }

    public function jiaoyi(){

        $User = M ( 'jyzx' ); // 實例化User對象
        $data = I ( 'post.user' );
        $user =I('post.type');
        

        if($user=='mr_user'){
            $map['mr_user']=$data;
        }
        if($user=='mc_user'){
             $map['mc_user']=$data;
            
        }


        $gname=$data;
        if($data){
            $map['_string']="(mr_user = '$gname' or mc_user = '$gname')";
        }
        

        $map['zt']=1;

        $id=I('get.id','0','intval');

        if(!empty($id)){
            $map['id']=$id;
    
    }
        // $map['mc_user'] = array('not in',C('mySelf'));

        import("@.ORG.Util.Page");// 导入分页类
        $count = $User->where ( $map )->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->count (); // 查詢滿足要求的總記錄數
        $p = new Page($count,50);

        $list = $User->where ( $map )->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->order ( 'jydate desc' )->limit ( $p->firstRow, $p->listRows )->select ();


        $show       = $p->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出

        $this->assign ( 'list', $list ); // 賦值數據集
        $this->display();
    }


    // 删除
    public function qxjy(){
        $id = $_GET['id'];

        $map['id']=$id;

        $result=M('jyzx')->where($map)->find();//出售人信息
        if (!$result['mc_user']) 
        {
            $this->error('无卖出人信息');
            exit;
        }
        $oobs = M('member')->where(array('username'=>$result['mc_user']))->find();

        if (!$oobs) 
        {
            $this->error('无卖出人信息');
            exit;
        }

        // 退费
        $shouxu = M('member_group')->where(array('level'=>$oobs['level']))->getField('shouxu');
        $tui = $result['cbt'] * $shouxu + $result['cbt'];

        $oob=M('member')->where(array('username'=>$result['mc_user']))->setInc('ksye',$tui);
        $obs=M('member')->where(array('username'=>$result['mc_user']))->setInc('ksed',$result['cbt']);

        // 记录可售余额
        keshou($result['mc_user'],$tui,'交易取消退款',1);
        // 可售额度
        dongjie($result['mc_user'],$result['cbt'],'交易取消退款',1);

        if($oob && $obs)
        {
            $re=M('jyzx')->where(array('id'=>$id))->save(array('zt'=>0,'jydate'=>'','mc_user'=>'','mc_level'=>'','mc_id'=>''));
            if($re){
                $this->success('订单删除成功');
            }

        }else{
            $this->error('订单删除失败');
        }

    }

    public function jywc(){


        $User = M ( 'jyzx'); // 實例化User對象

        $gname=I ( 'post.user' );

        if ($gname) {
            $map['_string'] = "(mr_user = '$gname' or mc_user = '$gname')";
        }
    
        $map['zt']=2;
        $map['datatype']="qgcbt";
        // $map['mc_user'] = array('not in',C('mySelf'));

        import("@.ORG.Util.Page");// 导入分页类
        $count = $User->where ( $map )->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->count (); // 查詢滿足要求的總記錄數
        $p = new Page($count,50);

        $list = $User->where ( $map )->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->order ( 'jydate  desc' )->limit ( $p->firstRow, $p->listRows )->select ();

        $show       = $p->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出

        $this->assign ( 'list', $list ); // 賦值數據集
        $this->display();
    }


    public function qianbaodetail(){
        $Data = M('jinbidetail'); // 实例化Data数据对象
        import("@.ORG.Util.Page");// 导入分页类
        $map = array();
        if (isset($_POST['account']) && $_POST['account']!='') {
            $map['member'] = array("eq",$_POST['account']);
        }
        if (isset($_POST['start_time']) && $_POST['start_time']!='') {
            $map['addtime'] = array("egt",strtotime($_POST['start_time']));
        }
        if (isset($_POST['end_time']) && $_POST['end_time']!='') {
            $map['addtime'] = array("elt",strtotime($_POST['end_time']));
        }
        // $map['member'] = array('not in',C('mySelf'));

        $count      = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数


        $list = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->order('id desc')->limit($Page ->firstRow.','.$Page -> listRows)->select();
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
    }

    public function dongjiedetail(){
        $Data = M('qjinbidetail'); // 实例化Data数据对象
        import("@.ORG.Util.Page");// 导入分页类
        $map = array();
        if (isset($_POST['account']) && $_POST['account']!='') {
            $map['member'] = array("eq",$_POST['account']);
        }
        if (isset($_POST['start_time']) && $_POST['start_time']!='') {
            $map['addtime'] = array("egt",strtotime($_POST['start_time']));
        }
        if (isset($_POST['end_time']) && $_POST['end_time']!='') {
            $map['addtime'] = array("elt",strtotime($_POST['end_time']));
        }
        // $map['member'] = array('not in',C('mySelf'));
        $count      = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数


        $list = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->order('id desc')->limit($Page ->firstRow.','.$Page -> listRows)->select();
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
    }

    public function ksyedetail(){
        $Data = M('keshoudetail'); // 实例化Data数据对象
        import("@.ORG.Util.Page");// 导入分页类
        $map = array();
        if (isset($_POST['account']) && $_POST['account']!='') {
            $map['member'] = array("eq",$_POST['account']);
        }
        if (isset($_POST['start_time']) && $_POST['start_time']!='') {
            $map['addtime'] = array("egt",strtotime($_POST['start_time']));
        }
        if (isset($_POST['end_time']) && $_POST['end_time']!='') {
            $map['addtime'] = array("elt",strtotime($_POST['end_time']));
        }
        // $map['member'] = array('not in',C('mySelf'));

        $count      = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数


        $list = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->order('id desc')->limit($Page ->firstRow.','.$Page -> listRows)->select();
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
    }
    public function zichandetail(){
        $Data = M('zichandetail'); // 实例化Data数据对象
        import("@.ORG.Util.Page");// 导入分页类
        $map = array();
        if (isset($_POST['account']) && $_POST['account']!='') {
            $map['member'] = array("eq",$_POST['account']);
        }
        if (isset($_POST['start_time']) && $_POST['start_time']!='') {
            $map['addtime'] = array("egt",strtotime($_POST['start_time']));
        }
        if (isset($_POST['end_time']) && $_POST['end_time']!='') {
            $map['addtime'] = array("elt",strtotime($_POST['end_time']));
        }

        // $map['member'] = array('not in',C('mySelf'));
        $count      = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数


        $list = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->order('id desc')->limit($Page ->firstRow.','.$Page -> listRows)->select();
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
    }
}
