<?phpclass JinbidetailAction extends CommonAction{    public function csdd()    {        $User = M('jyzx'); // 實例化User對象        $data = I('post.user');        if ($data) {            $map['mc_user'] = $data;        }        $map['zt'] = 0;        $map['datatype'] = "qgcbt";        import("@.ORG.Util.Page");// 导入分页类        $count = $User->where($map)->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->count(); // 查詢滿足要求的總記錄數        $p = new Page($count, 12);        $list = $User->where($map)->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->order('id desc')->limit($p->firstRow, $p->listRows)->select();        $show = $p->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        if (is_array($list) && count($list)) {            foreach ($list as $key => &$value) {                $value['date'] = date('Y-m-d H:i:s', $value['date']);            }        }        $this->assign('list', $list); // 賦值數據集        $this->display();    }    //卖出执行    public function mcpost()    {//        if (IS_GET) {//            if(empty($_GET['id']) && empty($_GET['ejmm']) && empty($_GET['shenfen'])){        if (empty($_POST['mc_id']) || empty($_POST['mc_username'])) {            $this->error('请填写卖出的账号！');            die;        }        $mc_username = trim($_POST['mc_username']);        $id = intval($_POST['mc_id']);//            $time=date('Y-m-d 00:00:00');////            $time1=date('Y-m-d 23:59:59');//            $c=1;////            $d=2;////            $map = array();////            $map['zt']=array('in',[1,2]);////            $map['mc_user']=$mc_username;////            $map['mc_id']=session("mid");////            $map['datatype']=array('eq', 'qgcbt');////            $map['jydate']=array('BETWEEN',array($time,$time1));        // $map['jydate']=array('elt',$time1);//            $mcnum = M('jyzx')->where($map)->count();        // 每个级别的等级矿工//            $level58 = M('member')->where(array('id'=>session('mid')))->getField('level');////            $item2 = M('member_group')->where(array('level'=>$level58))->getField('item2');        // if($mcnum >= C('mcnum') ){        //     $this->error(array("msg"=>'对不起，每个账号每天仅允许出售'.C("mcnum").'单！'));        // }//            if($mcnum >= $item2 ){////                $this->error(array("msg"=>'对不起，您这个等级的矿工每天仅允许出售'.$item2.'单！'));////            }        $user = M('member')->where(array('username' => $mc_username))->find();        if (!$user) {            $this->error('卖出用户不存在!');        }////            if ($user['password2'] !=MD5($_GET['ejmm'])  ) {////                $this->error(array("msg"=>'二级密码错误,请重新输入！'));////            }////            if ($user['shenfen']!=$_GET['shenfen'] ) {////                $this->error(array("msg"=>'身份证号错误,请重新输入！'));////            }//            $shouxu = M('member_group')->where(array('level'=>$user['level']))->getField('shouxu');//            $id = decode_code($_GET['id']);        $result = M('jyzx')->where(array('id' => $id))->find();        if ($result['mr_user'] == $mc_username) {            $this->error('不能卖给自己');            die;        }        $cbt = (int)$result['cbt'];        $boolFind = M('coupon_num')->where("`number` = $cbt")->find();        if (!$boolFind) {            $this->error('匹配的币的数量后台没配置!');            die;        }        $coupon_num = intval($boolFind['coupon_num']);//        $maichu = $cbt * 1.3;        $maichu = $cbt * 1.2;        if ($result['zt'] == 1) {            $this->error('对不起，该订单已匹配成功，正在交易中！');            die;        } elseif ($cbt > $user['ksed']) {            $this->error('对不起，您的可售额度不足！');            die;        } elseif ($maichu > $user['ksye']) {            $this->error('对不起，您的可售奇幻果不足！');            die;        } elseif ($result['mr_user'] == $mc_username) {            $this->error('您不能出售到自己的账户！');            die;        } elseif ($result['zt'] == 2) {            $this->error('对方交易已完成！');            die;        } elseif ($user['trading_coupon_num'] - $coupon_num - 1 < 0) {            $all_seller_arch = $coupon_num + 1;            $this->error('对不起，您的积分券不足，需要扣除' . $coupon_num . '张券,账号最少需要' . $all_seller_arch . '张券!');            die;        } else {            $time=date('Y-m-d H:i:s');            M('jyzx')->where(array('id'=>$id))->data(array('zt'=>1,'jydate'=>$time,'mc_user'=>$user['username'],'mc_level'=>$user['level'],'mc_id'=>$user['id'] , 'trading_coupon_num' => $coupon_num))->save();            // 可售奇幻果 + 手续费            $results = M('member')->where(array('username'=>session("username")))->setDec('ksye',$maichu);            // 可售额度 不加手续费//                $results11 = M('member')->where(array('username'=>session("username")))->setDec('ksed',$cbt);            $results11 = M('member')->where(array('username'=>session("username")))->setDec('kczc',$cbt);            $results_arch = M('member')->where(array('username'=>session("username")))->setDec('trading_coupon_num',$coupon_num);            // 记录可售奇幻果            keshou(session("username"),$maichu,'交易中心下单',0);            // 可售额度//                dongjie(session("username"),$cbt,'交易中心下单',0);3            zichan(session('username'),$cbt,'交易中心下单',0);            if ($results && $results11 && $results_arch) {//                    $qycode=rand(111111,999999);////                    $mobile = $result['mr_user'];////                    $appkey = C('CODE_APIKEY'); //请用自己的appkey代替////                    $content="您在交易中心买入订单已经匹配成功，请尽快联系卖家交易。【BEG】";//					$url="http://api.jisuapi.com/sms/send?appkey=$appkey&mobile=$mobile&content=$content";                //$return = ccurlOpen($url);//					sendSMS($mobile, $content,session('mid'));                $this->success('匹配成功！');            }        }//        }    }    public function csdddel()    {        $id = $_GET['id'];        $result = M('jyzx')->where(array('id' => $id))->find();        $users = M('member')->where(array('username' => $result['mc_user']))->find();        $shouxu = M('member_group')->where(array('level' => $users['level']))->getField('shouxu');        $tui = $users['qjinbi'] + $users['qjinbi'] * $shouxu;        if ($users['qjinbi'] >= $tui) {            $user1 = M('member')->where(array('username' => $result['mc_user']))->setInc('ksye', $tui);            $user = M('member')->where(array('username' => $result['mc_user']))->setDec('qjinbi', $tui);            $ppdd = M('jyzx')->where(array('id' => $id))->delete();            if ($ppdd) {                $this->success("删除成功");            }        } else {            $this->error("删除失败");        }    }    //toushu    public function report_order()    {        $ppdd_id = I('get.ppdd_id', 0, 'intval');        $where = "1=1";        if (!empty($ppdd_id)) {            $where .= " and a.pid = " . $ppdd_id;        }        import("ORG.Util.Page");// 导入分页类        $count = M('tousu')->alias('a')->where($where)->count(); // 查詢滿足要求的總記錄數        $p = new Page($count, 30);        $list = M('tousu')->alias('a')            ->field("a.*,b.id as user_id,c.id as buser_id")            ->join("ds_member as b on a.user=b.username")            ->join("ds_member as c on a.buser=c.username")            ->where($where)->order("a.id desc")->limit($p->firstRow, $p->listRows)->select();        $show = $p->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        $this->assign('list', $list); // 賦值數據集        $this->display();    }    public function qiugou()    {        $User = M('jyzx'); // 實例化User對象        $data = I('post.user');        if ($data) {            $map['mr_user'] = $data;        }        // $map['mc_user'] =array('not in',[18867513490,18916953132,18918174254]);        $map['zt'] = 0;        $map['datatype'] = "qgcbt";        import("@.ORG.Util.Page");// 导入分页类        $count = $User->where($map)->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->count(); // 查詢滿足要求的總記錄數        $p = new Page($count, 12);        $list = $User->where($map)->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->order('id desc')->limit($p->firstRow, $p->listRows)->select();        $show = $p->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        if (is_array($list) && count($list)) {            foreach ($list as $key => &$value) {                $value['date'] = date('Y-m-d H:i:s', $value['date']);            }        }        $this->assign('list', $list); // 賦值數據集        $this->display();    }    public function qiugoudel()    {        $id = $_GET['id'];        $ppdd = M('jyzx')->where(array('id' => $id))->delete();        if ($ppdd) {            $this->success("删除成功");        }    }    public function jiaoyi()    {        $User = M('jyzx'); // 實例化User對象        $data = I('post.user');        $user = I('post.type');        if ($user == 'mr_user') {            $map['mr_user'] = $data;        }        if ($user == 'mc_user') {            $map['mc_user'] = $data;        }        $gname = $data;        if ($data) {            $map['_string'] = "(mr_user = '$gname' or mc_user = '$gname')";        }        $map['zt'] = 1;        $id = I('get.id', '0', 'intval');        if (!empty($id)) {            $map['id'] = $id;        }        // $map['mc_user'] = array('not in',C('mySelf'));        import("@.ORG.Util.Page");// 导入分页类        $count = $User->where($map)->where('(mc_user is not NULL ')->count(); // 查詢滿足要求的總記錄數        $p = new Page($count, 50);        $list = $User->where($map)->where('(mc_user is not NULL)')->order('jydate desc')->limit($p->firstRow, $p->listRows)->select();        $show = $p->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        $this->assign('list', $list); // 賦值數據集        $this->display();    }    // 删除    public function qxjy()    {        $id = $_GET['id'];        $map['id'] = $id;        $result = M('jyzx')->where($map)->find();//出售人信息        if (!$result['mc_user']) {            $this->error('无卖出人信息');            exit;        }        $oobs = M('member')->where(array('username' => $result['mc_user']))->find();        if (!$oobs) {            $this->error('无卖出人信息');            exit;        }        // 退费//        $shouxu = M('member_group')->where(array('level' => $oobs['level']))->getField('shouxu');        $shouxu = 0.2;        $tui = $result['cbt'] * $shouxu + $result['cbt'];        $oob = M('member')->where(array('username' => $result['mc_user']))->setInc('ksye', $tui);        $obs = M('member')->where(array('username' => $result['mc_user']))->setInc('kczc', $result['cbt']);//        $obs = M('member')->where(array('username' => $result['mc_user']))->setInc('ksed', $result['cbt']);        $coupon = M('member')->where(array('username' => $result['mc_user']))->setInc('trading_coupon_num', $result['trading_coupon_num']);        // 记录可售奇幻果        keshou($result['mc_user'], $tui, '交易取消退款', 1);        // 可售额度        zichan($result['mc_user'],$result['cbt'],'交易取消退款',1);//        dongjie($result['mc_user'], $result['cbt'], '交易取消退款', 1);        if ($oob && $obs) {            $re = M('jyzx')->where(array('id' => $id))->save(array('zt' => 0, 'jydate' => '', 'mc_user' => '', 'mc_level' => '', 'mc_id' => '', 'trading_coupon_num' => 0));            if ($re) {                $this->success('订单删除成功');            }        } else {            $this->error('订单删除失败');        }    }    public function jywc()    {        $User = M('jyzx'); // 實例化User對象        $gname = I('post.user');        if ($gname) {            $map['_string'] = "(mr_user = '$gname' or mc_user = '$gname')";        }        $map['zt'] = 2;        $map['datatype'] = "qgcbt";        // $map['mc_user'] = array('not in',C('mySelf'));        import("@.ORG.Util.Page");// 导入分页类        $count = $User->where($map)->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->count(); // 查詢滿足要求的總記錄數        $p = new Page($count, 50);        $list = $User->where($map)->where('mc_user is NULL or (mc_user is not NULL AND mc_user <> "18916953132" AND mc_user <> "18918174254")')->order('jydate  desc')->limit($p->firstRow, $p->listRows)->select();        $show = $p->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        $this->assign('list', $list); // 賦值數據集        $this->display();    }    public function qianbaodetail()    {        $Data = M('jinbidetail'); // 实例化Data数据对象        import("@.ORG.Util.Page");// 导入分页类        $map = array();        if (isset($_POST['account']) && $_POST['account'] != '') {            $map['member'] = array("eq", $_POST['account']);        }        if (isset($_POST['start_time']) && $_POST['start_time'] != '') {            $map['addtime'] = array("egt", strtotime($_POST['start_time']));        }        if (isset($_POST['end_time']) && $_POST['end_time'] != '') {            $map['addtime'] = array("elt", strtotime($_POST['end_time']));        }        // $map['member'] = array('not in',C('mySelf'));        $count = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->count();// 查询满足要求的总记录数        $Page = new Page($count, 10);// 实例化分页类 传入总记录数        $list = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();        $show = $Page->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        $this->assign('list', $list);// 赋值数据集        $this->display(); // 输出模板    }    public function dongjiedetail()    {        $Data = M('qjinbidetail'); // 实例化Data数据对象        import("@.ORG.Util.Page");// 导入分页类        $map = array();        if (isset($_POST['account']) && $_POST['account'] != '') {            $map['member'] = array("eq", $_POST['account']);        }        if (isset($_POST['start_time']) && $_POST['start_time'] != '') {            $map['addtime'] = array("egt", strtotime($_POST['start_time']));        }        if (isset($_POST['end_time']) && $_POST['end_time'] != '') {            $map['addtime'] = array("elt", strtotime($_POST['end_time']));        }        // $map['member'] = array('not in',C('mySelf'));        $count = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->count();// 查询满足要求的总记录数        $Page = new Page($count, 10);// 实例化分页类 传入总记录数        $list = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();        $show = $Page->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        $this->assign('list', $list);// 赋值数据集        $this->display(); // 输出模板    }    public function ksyedetail()    {        $Data = M('keshoudetail'); // 实例化Data数据对象        import("@.ORG.Util.Page");// 导入分页类        $map = array();        if (isset($_POST['account']) && $_POST['account'] != '') {            $map['member'] = array("eq", $_POST['account']);        }        if (isset($_POST['start_time']) && $_POST['start_time'] != '') {            $map['addtime'] = array("egt", strtotime($_POST['start_time']));        }        if (isset($_POST['end_time']) && $_POST['end_time'] != '') {            $map['addtime'] = array("elt", strtotime($_POST['end_time']));        }        // $map['member'] = array('not in',C('mySelf'));        $count = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->count();// 查询满足要求的总记录数        $Page = new Page($count, 10);// 实例化分页类 传入总记录数        $list = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();        $show = $Page->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        $this->assign('list', $list);// 赋值数据集        $this->display(); // 输出模板    }    public function zichandetail()    {        $Data = M('zichandetail'); // 实例化Data数据对象        import("@.ORG.Util.Page");// 导入分页类        $map = array();        if (isset($_POST['account']) && $_POST['account'] != '') {            $map['member'] = array("eq", $_POST['account']);        }        if (isset($_POST['start_time']) && $_POST['start_time'] != '') {            $map['addtime'] = array("egt", strtotime($_POST['start_time']));        }        if (isset($_POST['end_time']) && $_POST['end_time'] != '') {            $map['addtime'] = array("elt", strtotime($_POST['end_time']));        }        // $map['member'] = array('not in',C('mySelf'));        $count = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->count();// 查询满足要求的总记录数        $Page = new Page($count, 10);// 实例化分页类 传入总记录数        $list = $Data->where($map)->where('member is NULL or (member is not NULL AND member <> "18916953132" AND member <> "18918174254")')->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();        $show = $Page->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        $this->assign('list', $list);// 赋值数据集        $this->display(); // 输出模板    }}