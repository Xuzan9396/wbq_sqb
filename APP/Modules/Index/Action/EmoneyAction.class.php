<?php/** * 电子货币控制器 */Class EmoneyAction extends CommonAction{    //交易中心页面    public function test(  )    {        $mr_user = 13291816017;        if($mr_user){            $res = $this->mc_note(intval($mr_user));            $data = json_decode($res,true);            if($data != null && $data['returnstatus'] == 'Success'){                $msg = '成功';                $send_type = 1;            }elseif($data != null && $data['returnstatus'] == 'Fail'){                $msg = '失败,' . $data['message'];                $send_type = 2;            }else{                $msg = '失败';                $send_type = 2;            }            $ins = M('send_node')->add([                'phone' => $mr_user,                'msg' => $msg,                'send_type' => $send_type,                'create_at' => time(),            ]);            echo '<pre>';                var_dump($ins);            echo '</pre>';            exit;        }    }    public function mc_note( $phone )    {//        action:send//userid://account:8T00439//password:5F5464B627C7DB334014965F8973AB8E//mobile:13291816017//content:【IOX】您的订单有新动态，请登录查看！//sendTime://extno://        action:send////userid://account:8T00439//password:5F5464B627C7DB334014965F8973AB8E//mobile:13291816017//content:【IOX】您的订单有新动态，请登录查看！        $postdata = http_build_query(            array(                'action' => 'send',                'account' => '8T00439',                'password' => '5F5464B627C7DB334014965F8973AB8E',                'mobile' => $phone,                'content' => '【IOX】您的订单有新动态，请登录查看！',            )        );        $opts = array('http' =>            array(                'method'  => 'POST',                'header'  => 'Content-type: application/x-www-form-urlencoded',                'content' => $postdata            )        );        $context  = stream_context_create($opts);        return $result = file_get_contents('https://dx.ipyy.net/smsJson.aspx', false, $context);    }    public function sc_send(  $text , $desp = '' , $key = 'SCU65754T00b8f9361c77adf5d63cf38d054d94a35dc046feedfea'  )    {        $postdata = http_build_query(            array(                'text' => $text,                'desp' => $desp            )        );        $opts = array('http' =>            array(                'method'  => 'POST',                'header'  => 'Content-type: application/x-www-form-urlencoded',                'content' => $postdata            )        );        $context  = stream_context_create($opts);        return $result = file_get_contents('https://sc.ftqq.com/'.$key.'.send', false, $context);    }    public function index(){        //判断是否开启        $jy_open=C('jy_open');        $jy_time=C('jy_time');        if(empty($jy_open)){            alert('交易中心未开放！',U('Index/index/index'));            exit;        }        if(!empty($jy_time)){            $jy_time_arr=explode('-',$jy_time);            // var_dump($jy_time_arr);die;            $s_time=strtotime(date("Y-m-d ".$jy_time_arr[0]));            $o_time=strtotime(date("Y-m-d ".$jy_time_arr[1]));            if(time() < $s_time || time() > $o_time){                alert('交易开放时间为'.$jy_time,U('Index/index/index'));                exit;            }        }        $status = M('member')->where(array('username'=>session('username')))->getField('status');        if($status == 0){            alert('请先实名认证',U('Account/shoukuanma'));            exit;        }        import('ORG.Util.Page');        $count = M('jyzx')->where(array('zt'=>0))->count();//        $Page  = new Page($count,15);////        $show  = $Page->show();//        $list=	M('jyzx')->where(array('zt'=>0))->order('date desc')->limit($Page->firstRow.','.$Page->listRows)->select();//        $list=	M('jyzx')->where(array('zt'=>0))->where(" cbt between 10 and 20")->order("RAND()")->limit(20)->select();//        $list30_60=	M('jyzx')->where(array('zt'=>0))->where(" cbt between 50 and 60")->order("RAND()")->limit(20)->select();//        $list70_100=	M('jyzx')->where(array('zt'=>0))->where(" cbt between 90 and 100")->order("RAND()")->limit(20)->select();        $list=	M('jyzx')->where(array('zt'=>0))->where(" cbt between 10 and 20")->order("id asc")->limit(20)->select();        $list30_60=	M('jyzx')->where(array('zt'=>0))->where(" cbt between 50 and 60")->order("id asc")->limit(20)->select();        $list70_100=	M('jyzx')->where(array('zt'=>0))->where(" cbt between 90 and 100")->order("id asc")->limit(20)->select();        $level = M('member')->where(array('username'=>session('username')))->getField('level');        $startTime = date('Y-m-d');        $date = strtotime($startTime);        $todayCbt =(int) M('jyzx_total')->where('log_date = ' . $date)->sum('total_cbt');        $totalCbt = (int)M('jyzx_total')->sum('total_cbt');        $shouxu = M('member_group')->where(array('level'=>$level))->getField('shouxu');        $boolFind = M('coupon_num')->select();        $couponNumber =  array_column($boolFind,'number');        $couponNum =  array_column($boolFind,'coupon_num');        $couponArr = array_combine($couponNumber, $couponNum);        $baifen = $shouxu * 100;        if(is_array($list) && count($list)){            shuffle($list);            foreach ($list as $key => $value) {                $list[$key]['id'] = encode_code($value['id']);                $list[$key]['coupon_num'] = isset($couponArr[$value['cbt']]) ? $couponArr[$value['cbt']]  : 1;            }        }        if(is_array($list30_60) && count($list30_60)){            shuffle($list30_60);            foreach ($list30_60 as $key => $value) {                $list30_60[$key]['id'] = encode_code($value['id']);                $list30_60[$key]['coupon_num'] = isset($couponArr[$value['cbt']]) ? $couponArr[$value['cbt']]  : 1;            }        }        if(is_array($list70_100) && count($list70_100)){            shuffle($list70_100);            foreach ($list70_100 as $key => $value) {                $list70_100[$key]['id'] = encode_code($value['id']);                $list70_100[$key]['coupon_num'] = isset($couponArr[$value['cbt']]) ? $couponArr[$value['cbt']]  : 1;            }        }        $this->assign('baifen',$baifen);        $this->assign('totalCbt',$totalCbt);        $this->assign('todayCbt',$todayCbt);        $this->assign('list',$list);        $this->assign('list30_60',$list30_60);        $this->assign('list70_100',$list70_100);//        $this->assign('page',$show);//        $this->assign('trading_coupon_num',C('seller_arch'));        $this->display();    }    //买入页面    public function mairu(){        $status = M('member')->where(array('username'=>session('username')))->getField('status');        if($status == 0){            alert('请先实名认证',U('Acount/shoukuanma'));            exit;        }        import('ORG.Util.Page');        $count = M('jyzx')->where(array('mr_id'=>session('mid'),'mr_user'=>session('username'),'datatype'=>qgcbt))->count();        $Page  = new Page($count,10);        $show  = $Page->show();        $list = M('jyzx')->where(array('mr_id'=>session('mid'),'mr_user'=>session('username'),'datatype'=>qgcbt))->select();        foreach ($list as $key => $value) {            $list[$key]['jydate'] = $value['jydate'] ? strtotime($value['jydate']) : 0;        }//        echo '<pre>';//            var_dump($list);//        echo '</pre>';//        exit;        // 之前的交易价        // $jiage = M('date')->order('id desc')->limit(1)->getField("price");        $jiage = M('date')->order('id desc')->limit(1)->getField("price");        $map['mr_id'] = session('mid');        $map['mr_user'] = session('username');        $map['datatype'] = qgcbt;        $map['zt'] = array( 'neq', 0);        $lists = M('jyzx')->where($map)->select();        foreach($lists as $kk=>$vv){            // var_dump($vv);            $lists[$kk]['total']=$vv['danjia']*$vv['cbt'];;            $lists[$kk]['jydate']=$vv['jydate'] ? strtotime($vv['jydate']) : 0;                    }        $coupon_list = M('coupon_num')->order('number asc')->select();        $this->assign('coupon_list',$coupon_list);        $this->assign('jiage',$jiage);//        $this->assign('draw_low_price',C('draw_low_price'));//        $this->assign('draw_high_price',C('draw_high_price'));        $this->assign('list',$list);        $this->assign('lists',$lists);        $this->assign('page',$show);        $this->display();    }    //买入申请    public function mrpost(){        if (IS_POST) {            //判断是否开启            $jy_open=C('jy_open');            if(empty($jy_open)){                alert('交易中心未开放！',U('Index/index/index'));                exit;            }//            $jiage = floatval($_POST['dj']);//            $price = M('date')->order("id desc")->limit(1)->getField("price");//            if(($jiage *100  < C('draw_low_price') * 100) || ($jiage * 100 > C('draw_high_price') * 100)){//                alert('价格范围不正确!', U('Index/emoney/mairu'));////                exit;//            }//            if ($jiage * 100 != $price * 100) {//                    alert('价格不正确!', U('Index/emoney/mairu'));//                    exit;//            }            $buyer_arch = C('buyer_arch');            // $jy_time=C('jy_time');   之前的买入交易时间            if (!session('mid'))             {                alert('非法操作！',U('Index/index/index'));                exit;            }//            $model = M('member')->where(array('id'=>session('mid')))->getField('level');            $userModel = M('member')->where(array('id'=>session('mid')))->find();            $level = intval($userModel['level']);            $trading_coupon_num = intval($userModel['trading_coupon_num']);            if($trading_coupon_num < $buyer_arch){                alert('申请买入最少需要' . $buyer_arch . '交易券');                exit;            }            // $jy_time = M('member')->join('left join member_group on member_group.level = member.level')->where(array('member.id'=>session('mid')))->getField('member_group.item1');            $jy_time = M('member_group')->where(array('level'=>$level))->getField('item1');            if (!$jy_time)             {                $group1 = M("member_group")->getField('level,name');                $levelName = $group1[$level];                alert('未设置当前 ( '.$levelName.' ) 矿工等级的交易时间!',U('Index/index/index'));                exit;            }            if(!empty($jy_time)){                $jy_time_arr=explode('-',$jy_time);                $s_time=strtotime(date("Y-m-d ".$jy_time_arr[0]));                $o_time=strtotime(date("Y-m-d ".$jy_time_arr[1]));                if(time() < $s_time || time() > $o_time){                    alert('交易开放时间为'.$jy_time,U('Index/index/index'));                    exit;                }            }            $user = M('member')->where(array('username'=>session('username')))->find();            if($user['status'] == 0){                alert('请先实名认证',U('Acount/shoukuanma'));                exit;            }            $cbt = (int)$_POST['amount'];            $boolFind = M('coupon_num')->where("`number` = $cbt")->find();            if(!$boolFind){                alert('没有该数量的配置',U('Acount/shoukuanma'));                exit;            }            if ($cbt <= 0)             {                alert('买入数量不能小于0',U('Acount/shoukuanma'));                exit;            }            if($cbt < C("bsbei") || $cbt%C("bsbei")!=0){                alert('交易数量必须为'.C("bsbei").'的倍数！',-1);            }            // 之前             $jiage = M('date')->order('id desc')->limit(1)->getField("price");            $gname = session("username");            if($cbt >= 10 && $cbt <= 20){                $maps['cbt']=array('BETWEEN',array(10,20));                $msgStr = '小区挂单';                $flag = 1;            }elseif($cbt >= 50 && $cbt <= 60){                $maps['cbt']=array('BETWEEN',array(50,60));                $msgStr = '中区挂单';                $flag = 2;            }elseif($cbt >=90 && $cbt <= 100){                $maps['cbt']=array('BETWEEN',array(90,100));                $msgStr = '大区挂单';                $flag = 2;            }else{                alert('单不符合');                exit;            }            $a=1;            $b=0;            $maps['zt']=array(array('eq',$a),array('eq',$b),'or');            $maps['mr_user'] = $gname;            $num = M('jyzx')->where($maps)->count();            if($flag == 2 && $num >= 2){                alert($msgStr . '最多同时能挂2个买入订单！',-1);                exit;            }elseif($flag == 1 && $num >= 6){                alert($msgStr . '最多同时能挂6个买入订单！',-1);                exit;            }            unset($maps['cbt']);            $numTotal = M('jyzx')->where($maps)->count();            $numTotal +=1;            if( $numTotal* 2 > $user['trading_coupon_num']){                alert('发布' . $numTotal . '单需要持有'. $numTotal*2 .'张交易券',-1);                exit;            }            $danjia = $jiage;            $map['mr_id'] =  $user['id'];            $map['mr_user'] = $user['username'];            $map['qian'] = $danjia*$cbt;            $map['cbt'] = $cbt;            $map['date']= time();            $map['mr_level'] = $user['level'];            $map['danjia']  = $danjia;            $map['trading_coupon_num']  = $boolFind['coupon_num'];            $map['datatype'] = 'qgcbt';            $oob=M('jyzx')->add($map);            if($oob){                alert('订单已成功发送至交易大厅!,订单匹配成功后请第一时间联系客服核对订单，核对无误后方可打款',U('Emoney/mairu'));            }        }    }    //卖出页面    public function maichu(){        import('ORG.Util.Page');        $count = M('jyzx')->where(array('mc_id'=>session('mid'),'mc_user'=>session('username'),'datatype'=>qgcbt))->count();        $Page  = new Page($count,10);        $show  = $Page->show();        $list = M('jyzx')->where(array('mc_id'=>session('mid'),'mc_user'=>session('username'),'datatype'=>qgcbt))->select();        $map['mc_id'] = session('mid');        $map['mc_user'] = session('username');        $map['datatype'] = qgcbt;        $map['zt'] = array( 'neq', 0);        $lists = M('jyzx')->where($map)->select();        $this->assign('list',$list);        $this->assign('lists',$lists);        $this->assign('page',$show);        $this->display();    }    //卖出执行    public function mcpost(){        if (IS_GET) {            if(empty($_GET['id']) && empty($_GET['ejmm']) && empty($_GET['shenfen'])){                $this->ajaxReturn(array("msg"=>'请输入交易密码及身份证号验证交易！'));            }            $time=date('Y-m-d 00:00:00');            $time1=date('Y-m-d 23:59:59');            $map = array();            $map['zt']=array('in',[1,2]);            $map['mc_user']=session("username");            $map['mc_id']=session("mid");            $map['datatype']=array('eq', 'qgcbt');            $map['jydate']=array('BETWEEN',array($time,$time1));            $mcnum = M('jyzx')->where($map)->count();            // 每个级别的等级矿工            $level58 = M('member')->where(array('id'=>session('mid')))->getField('level');            $item2 = M('member_group')->where(array('level'=>$level58))->getField('item2');            // if($mcnum >= C('mcnum') ){            //     $this->ajaxReturn(array("msg"=>'对不起，每个账号每天仅允许出售'.C("mcnum").'单！'));            // }            if($mcnum >= $item2 ){                $this->ajaxReturn(array("msg"=>'对不起，您这个等级的矿工每天仅允许出售'.$item2.'单！'));            }            $user = M('member')->where(array('username'=>session("username")))->find();            if ($user['password2'] !=MD5($_GET['ejmm'])  ) {                $this->ajaxReturn(array("msg"=>'二级密码错误,请重新输入！'));            }            if ($user['shenfen']!=$_GET['shenfen'] ) {                $this->ajaxReturn(array("msg"=>'身份证号错误,请重新输入！'));            }            $id = decode_code($_GET['id']);            if(!$id){                $this->ajaxReturn(array("msg"=>'id不存在'));            }            $id = intval($id);            $result = M('jyzx')->where(array('id'=>$id))->find();			            $cbt = intval($result['cbt']);            $boolFind = M('coupon_num')->where("`number` = $cbt")->find();            if(!$boolFind){                $this->error('匹配的币的数量后台没配置!');                die;            }			           $coupon_num = intval($boolFind['coupon_num']);            $maichu = $cbt * 1.3;            if($result['zt']==1 ){                $this->ajaxReturn(array("msg"=>'对不起，该订单已匹配成功，正在交易中！'));            } if( $maichu > $user['ksye']){                $this->ajaxReturn(array("msg"=>'对不起，您的可售余额不足！'));            }elseif($result['mr_user']==session("username")){                $this->ajaxReturn(array("msg"=>'您不能出售到自己的账户！'));            }elseif($result['zt']==2){                $this->ajaxReturn(array("msg"=>'对方交易已完成！'));            } elseif($user['is_get'] != 1){                $this->ajaxReturn(array("msg"=>"对不起，买10币激活，激活后才能卖出，卖出不限次数"));            }            elseif($user['trading_coupon_num'] -  $coupon_num -1 < 0 ){			    $all_seller_arch = $coupon_num + 1;                $this->ajaxReturn(array("msg"=>'对不起，您的交易券不足，需要扣除' .$coupon_num .'张券,账号最少需要' . $all_seller_arch. '张券!'));            }else{                $time=date('Y-m-d H:i:s');                M('jyzx')->where(array('id'=>$id))->data(array('zt'=>1,'jydate'=>$time,'mc_user'=>$user['username'],'mc_level'=>$user['level'],'mc_id'=>$user['id'] , 'trading_coupon_num' => $coupon_num))->save();                // 可售余额 + 手续费                $results = M('member')->where(array('username'=>session("username")))->setDec('ksye',$maichu);                // 可售额度 不加手续费//                $results11 = M('member')->where(array('username'=>session("username")))->setDec('ksed',$cbt);                $results11 = M('member')->where(array('username'=>session("username")))->setDec('kczc',$cbt);                $results_arch = M('member')->where(array('username'=>session("username")))->setDec('trading_coupon_num',$coupon_num);                // 记录可售余额                keshou(session("username"),$maichu,'交易中心下单',0);                // 可售额度//                dongjie(session("username"),$cbt,'交易中心下单',0);                zichan(session('username'),$cbt,'交易中心下单',0);                // 卖家                // $obs = M('member')->where(array('username'=>session("username")))->setInc('qjinbi',$maichu);                // 10个矿石钱包  17个可售额度                if($results && $results11&&$results_arch){//					$qycode=rand(111111,999999);//					$mobile = $result['mr_user'];//					$appkey = C('CODE_APIKEY'); //请用自己的appkey代替//					$content="您在交易中心买入订单已经匹配成功，请尽快联系卖家交易。【BEG】";			        $title="IOX交易订单匹配成功!点击看详情....";			        $mc_user = session("username");			        $mc_name = $user['truename']?:'-';			        $mc_ksed = $user['ksed']?:'0';			        $mc_ksye = $user['ksye']?:'0';			        $mr_user = $result['mr_user'];                    $mr_name = M('member')->where(array('username'=>$mr_user))->getField('truename') ?:'-';                    $content = '匹配时间:' . date('Y-m-d H:i:s') . PHP_EOL;                     $content .="卖家手机号:{$mc_user},卖家姓名:{$mc_name},卖家可售额度:{$mc_ksed},卖家可售余额:{$mc_ksye}" . PHP_EOL;			        $content .="买家手机号:{$mr_user},买家姓名:{$mr_name}" . PHP_EOL;			        $content .= '币数量:'. $cbt;			        if($mr_user){                        $res = $this->mc_note(intval($mr_user));                        $data = json_decode($res,true);                        if($data != null && $data['returnstatus'] == 'Success'){                            $msg = '成功';                            $send_type = 1;                        }elseif($data != null && $data['returnstatus'] == 'Fail'){                            $msg = '失败,' . $data['message'];                            $send_type = 2;                        }else{                            $msg = '失败';                            $send_type = 2;                        }                                                M('send_node')->add([                            'phone' => $mr_user,                            'msg' => $msg,                            'send_type' => $send_type,                            'create_at' => time(),                        ]);                    }                    $this->sc_send($title, $content);                    $this->sc_send($title, $content,'SCU64514T1d2bceaaf7386be63d2e6da3d22e46995da98d09d8ca7');                    $this->sc_send($title, $content,'SCU65760Tb840c8e7f1ff6e7b09d97b809062eb9c5dc052b875f7d');                    $this->ajaxReturn(array("msg"=>'匹配成功，请主动联系买家打款，未联系者造成买家超时封号，卖家同等封号处理。','url'=>U('Emoney/maichu')));                }            }        }    }    public static function http( $url, $params = [], $method = 'GET', $body = "0", $header = array() )    {        $opts = [            CURLOPT_TIMEOUT => 30,            CURLOPT_RETURNTRANSFER => 1,            CURLOPT_SSL_VERIFYPEER => false,            CURLOPT_SSL_VERIFYHOST => false,            CURLOPT_HTTPHEADER => $header        ];        /* 根据请求类型设置特定参数 */        switch (strtoupper($method)) {            case 'GET':                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);                break;            case 'POST':                //判断是否是否是body 传输                $params = $body ? json_encode($params) : http_build_query($params);                $opts = [                    CURLOPT_URL => $url,                    CURLOPT_POST => 1,                    CURLOPT_RETURNTRANSFER => 1,                    CURLOPT_POSTFIELDS => $params,                ];                break;            default:                throw new \Exception('不支持的请求方式！');        }        /* 初始化并执行curl请求 */        $ch = curl_init();        curl_setopt_array($ch, $opts);        $data = curl_exec($ch);        curl_close($ch);        return $data;    }		/* 买入卖出 状态处理 超过2小时未处理的封号 */	public function jyzx(){		$id = intval(I('id',0,'intval'));		$type = strval(I('type','','trim'));				$info = M('jyzx')->where(array('datatype'=>qgcbt,'id'=>$id))->find();		$end_time = $info['date']+7200;		if($type=='mr' && $end_time>time() && $info['zt']==1 && empty($info['image']) ){			//买入 交易状态: 等待打款			M('member')->where(array('id'=>$info['mc_id']))->save(array("lock"=>$lock));					}elseif($type=='mc'  && $end_time>time()  && $info['zt']==1){			//卖出			M('member')->where(array('id'=>$info['mr_id']))->save(array("lock"=>$lock));		}							}    //上传图片    public function sctp(){        $id = $_GET['id'];        $this->assign('id',$id);        $this->display();    }    //上传图片执行    public function scpost(){        if (IS_POST) {            $data['image'] = strval(I('post.image'));            if(empty($data['image'])){                alert('请上传付款截图页面',-1);            }            $list = M('jyzx')->where(array('mr_id' => session('mid'),'mr_user'=>session('username'),'id'=>$_POST['id'],'zt'=>1))->find();            if(empty($list)){                alert('非法操作，没有查到该订单！',-1);                die;            }            if(!empty($list['image'])){                alert('上传失败，该订单已经上传过付款页截图！',-1);                die;            }            $result = M('jyzx')->where(array('id' => $_POST['id']))->save($data);            if (!empty($result)) {					$qycode=rand(111111,999999);					$mobile = $list['mc_user'];					$appkey = C('CODE_APIKEY'); //请用自己的appkey代替					$content="买家已经上传付款截图，请尽快确认完成交易。【DST会员】";					$url="http://api.jisuapi.com/sms/send?appkey=$appkey&mobile=$mobile&content=$content";					$return = ccurlOpen($url);					alert('付款页截图上传成功',U('Emoney/mairu'));            } else {                alert('付款页截图上传失败',-1);            }        }    }    //上传图片    public function cktp(){        $id = $_GET['id'];        $image = M('jyzx')->where(array('mc_id' => session('mid'),'mc_user'=>session('username'),'id'=>$_GET['id'],'zt'=>1))->getField('image');        if(empty($image)){            alert('买家还未上传付款截图，请致电沟通！',-1);        }        $this->assign('image',$image);        $this->assign('id',$id);        $this->display();    }    //上传图片    //ajax 图片上传    public function uploads(){        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){            $name = $_FILES['photoimg']['name'];            $size = $_FILES['photoimg']['size'];            $file_time=date('Ymd',time());            $file_name = './Public/Uploads/';            if(!file_exists($file_name)){                mkdir($file_name);            }            $path = $file_name.'/';            $extArr = array("jpg", "png", "gif", "jpeg");            if(empty($name)){                echo json_encode(array('result' => 0,'msg'=>'请选择要上传的图片'));                return;            }            $ext = $this->extend($name);            if(!in_array($ext,$extArr)){                echo json_encode(array('result' => 0,'msg'=>'图片格式错误'));                return;            }            if($size>(300*1024*1024)){                echo json_encode(array('result' => 0,'msg'=>'图片大小不能超过3M'));                return;            }            $image_name = time().rand(100,999).".".$ext;            $tmp = $_FILES['photoimg']['tmp_name'];            $uploadip = substr($path,9);            if(move_uploaded_file($tmp, $path.$image_name)){                echo json_encode(array('result' => 1,'url'=>$uploadip.$image_name));                return;            }else{                echo json_encode(array('result' => 0,'msg'=>'上传出错了'));                return;            }            exit;        }        exit;    }    public function extend($file_name){        $extend = pathinfo($file_name);        $extend = strtolower($extend["extension"]);        return $extend;    }    public function mrchexiao(){        if (IS_GET) {            $id= intval(I("get.id",0,"intval"));            $jyzx = M('jyzx')->where(array('id'=>$id,'mr_user'=>$_SESSION['username']))->find();            if(empty($jyzx)){                alert('订单不存在！',U('Emoney/mairu'));                exit;            }            if($jyzx['zt'] >0){                alert('已经匹配的订单不能撤销！',U('Emoney/mairu'));                exit;            }            $a_time = time()-$jyzx['date'];            if ($a_time <= 1800)             {            	alert('订单未超过半个小时不能撤销！',U('Emoney/mairu'));                exit;            }            $result = M('jyzx')->where(array('id'=>$id,'mr_user'=>$_SESSION['username']))->delete();            if($result){                alert('取消成功！',U('Emoney/mairu'));            }else{                alert('取消失败！',U('Emoney/mairu'));            }        }    }    public function tousu(){        $id = $_GET['id'];        $result=M('jyzx')->where(array('id'=>$id))->find();        $time = strtotime($result['jydate']);        $time1=C('tousu_time')*60*60+$time;        if(time() < $time1 ){            alert('匹配成功'.C("tousu_time").'小时后才可以投诉！',-1);        }        $tousu = M('tousu')->where(array('pid' => $id))->find();//说明已经有一方投诉过了        if ($tousu) {            if ($tousu['user'] = $_SESSION['username']) {                alert('已经有一方投诉过了,请勿重复投诉！', -1);            }        }        $this->assign('id', $id);        $this->display();    }    public function tspost(){        if (IS_POST) {            $data_P = 	$_POST['id'];            $text = 	$_POST['content'];            $result=M('jyzx')->where(array('id'=>$data_P))->find();            $time = strtotime($result['jydate']);            $time1=C('tousu_time')*60*60+$time;            if(time() < $time1 ){                alert('匹配成功'.C("tousu_time").'小时后才可以投诉！',-1);            }            $tousu=M('tousu')->where(array('pid'=>$data_P))->find();//说明已经有一方投诉过了            if($tousu){                if($tousu['user']=$_SESSION['username']){                    alert('已经有一方投诉过了,请勿重复投诉！',-1);                }            }            if($text==""){                alert('投诉内容不能为空！',-1);            }            if($result['mr_user']==$_SESSION['username']){                $map['text']=$text;//投诉内容                $map['user']=$_SESSION['username'];//投诉人；                $map['buser'] =$result['mc_user']; //被投诉人                $map['date'] = date('Y-m-d H:i:s');                $map['pid'] = $data_P;                $oob=M('tousu')->add($map);                if($oob){                    alert('投诉成功，等待管理员处理！',U('Emoney/mairu'));                }            }            if($result['mc_user']==$_SESSION['username']){                $map1['text']=$text;//投诉内容                $map1['user']=$_SESSION['username'];//投诉人；                $map1['buser'] =$result['mr_user']; //被投诉人                $map1['date'] = date('Y-m-d H:i:s');                $map1['pid'] = $data_P;                $oobs=M('tousu')->add($map1);                if($oobs){                    alert('投诉成功，等待管理员处理！',U('Emoney/maichu'));                }            }        }    }    //买入完成    public function mrwc(){        $id=$_GET['id'];        $jyzx = M('jyzx')->where(array('id'=>$id,'mr_user'=>$_SESSION['username'],'zt'=>1))->find();        if(empty($jyzx)){            alert('订单不存在！',-1);            exit;        }        if(empty($jyzx['image'])){            alert('请尽快上传付款截图，等待卖家确认并完成交易！',-1);            exit;        }        alert('卖家正在赶来确认完成交易的路上，请耐心等候！',-1);    }    //买家看卖家详情    public function mcxq(){        if (IS_GET) {            $id = $_GET['id'];            $jyzx = M('jyzx')->where(array('id' => $id, 'mr_user' => $_SESSION['username'], 'zt' => 1))->find();            if (empty($jyzx)) {                alert('订单不存在！', -1);                exit;            }            $mclist = M('member')->where(array('id' => $jyzx['mc_id'], 'username' => $jyzx['mc_user']))->field('truename,username,image')->find();            if (empty($mclist)) {                alert('卖出用户不存在！', -1);                exit;            }            $huilv = C('rmb_hl');            $jyzx['qian']=$jyzx['danjia']*$jyzx['cbt'];            $rmb = $jyzx['qian'] * $huilv;            $this->assign('rmb', $rmb);            $this->assign('jyzx', $jyzx);            $this->assign('mclist', $mclist);        }        $this->display();    }    //卖家看买家详情    public function mrxq(){        if (IS_GET) {            $id = $_GET['id'];            $jyzx = M('jyzx')->where(array('id' => $id, 'mc_user' => $_SESSION['username'], 'zt' => 1))->find();            if (empty($jyzx)) {                alert('订单不存在！', -1);                exit;            }            $mclist = M('member')->where(array('id' => $jyzx['mr_id'], 'username' => $jyzx['mr_user']))->find();            if (empty($mclist)) {                alert('买入用户不存在！', -1);                exit;            }            $huilv = C('rmb_hl');            $jyzx['qian']=$jyzx['danjia']*$jyzx['cbt'];            $rmb = $jyzx['qian'] * $huilv;            $this->assign('rmb', $rmb);            $this->assign('jyzx', $jyzx);            $this->assign('mclist', $mclist);        }        $this->display();    }    //卖出完成    public function mcwc(){        if (IS_GET) {            $id=$_GET['id'];            $jyzx = M('jyzx')->where(array('id'=>$id,'mc_user'=>$_SESSION['username'],'zt'=>1))->find();            if(empty($jyzx)){                alert('订单不存在！',-1);                exit;            }            if(empty($jyzx['image'])){                alert('买家还未上传付款截图，暂时不能完成交易！',-1);                exit;            }            // 买家加钱            $mr_member = M('member')->where(array('id'=>$jyzx['mr_id']))->find();            $cbtNum = $jyzx['cbt']*5;            $obs = M('member')->where(array('id'=>$jyzx['mr_id']))->setInc('kczc',$cbtNum);            M('member')->where(array('id'=>$jyzx['mr_id']))->save(['is_get' => 1]); // 满足10个币            zichan($mr_member['username'],$cbtNum,'交易中心买入',1);            $data['zt'] = 2;            $data['jydate'] = date('Y-m-d H:i:s');            M('jyzx')->where(array('id'=>$id,'mc_user'=>$_SESSION['username']))->save($data);//            $cbt_today = M('jyzx')->where("jydate >= $startTime and jydate <= $endTime")->where(array('zt'=> 2 ))->sum('cbt');            $startTime = date('Y-m-d 00:00:00');            $endTime = date('Y-m-d 23:59:59');            $mapss['jydate'] = array('between',[strval($startTime),strval($endTime)]);            $cbt_today = M('jyzx')->where($mapss)->where(array('zt'=> 2 ))->sum('cbt');// everyday_rose            if($cbt_today = intval($cbt_today)){                $date = strtotime($startTime);                $bool = M('jyzx_total')->where('log_date = ' . $date)->find();                if($bool){                    M('jyzx_total')->where('log_date = ' . $date)->save([                        'total_cbt' => $cbt_today,                        'update_at' => time(),                    ]);                }else{                    M('jyzx_total')->add([                        'total_cbt' => $cbt_today,                        'update_at' => time(),                        'log_date' => $date,                        'create_at' => time(),                    ]);                }                $cbt_total = M('jyzx_total')->sum('total_cbt');                $Model = M();                $Model->startTrans();                $multiple = floor($cbt_total / 10000); // 测试                $res = M('date')->order('id desc')->limit(1)->find();                if(!$res){                    M('date')->add([                        'date' => strtotime(date('Ymd')),                        'price' => 0.1,                        'multiple' => $multiple                    ]);                }                if($multiple > $res['multiple']){//                $increment = 0.01;                    $increment = C('everyday_rose');                    M('date')->add([                        'date' => strtotime(date('Ymd')),                        'price' => $res['price'] + $increment,                        'multiple' => $multiple                    ]);                    // 11                    $jydata = M('jyzx')->where(array('zt' => 0))->select();                    if(count($jydata)){                        foreach ($jydata as $k => $v) {                            $id = intval($v['id']);                            $data11 = array(                                'danjia' => $res['price'] + $increment,                                'qian' => $v['cbt'] * ($res['price'] + $increment),                            );                            M('jyzx')->where(['id' => $id])->save($data11);                        }                    }                }                $Model->commit();            }            //-----------帅气的分割线------------            $user_id = $jyzx['mr_user'];            $cbt = intval($jyzx['cbt']);            if(C('tjj_ed_0') > 0 ){                $p_shouyi = C('tjj_ed_0')*$cbt;                M('member')->where("username = {$user_id}")->setInc("kczc",$p_shouyi);                zichan(session('username'),$p_shouyi,'交易完成矿池资产奖励',1);            }            $model=M('member')->where("username = {$user_id}")->find();            if($model){                $ids = $model['id'];                $p_id = $model['parent_id'];            }            if(isset($p_id) && !empty($p_id)){                for($i=1;$i<=6;$i++){                    $p_userinfo=M('member')->where("id = {$p_id}")->find();                    if($p_userinfo){//$p_userinfo['level']                        if($fl_bi=C('tjj_ed_'.$i)){                            $p_shouyi=$fl_bi*$cbt;                            M('member')->where("id = {$p_id}")->setInc("ksed",$p_shouyi);                            zichan($p_userinfo['username'],$p_shouyi,$i.'代/ID：'.$ids.'交易完成矿池资产奖励',1);                        }                        $p_id=$p_userinfo['parent_id'];                        if(empty($p_id) ){                            break;                        }                    }else{                        break;                    }                }            }            //-----------帅气的分割线------------            alert('交易成功！',U('Emoney/mairu'));        }    }/*    public function del(){        $id= I("get.id",0,"intval");        $oob = M('ppdd')->where(array('id'=>$id))->find();        if($oob['p_user']!=$_SESSION['username']){            die("<script>alert('操作失败！');history.back(-1);</script>");        }        $oobs = M('member')->where(array('username'=>$oob['p_user']))->find();        $inc = M('member') -> where(array('username'=>$oob['p_user']))->setInc('jinbi',$oobs['qjinbi']);        account_log($_SESSION['username'],$oobs['qjinbi'],'订单撤销返还',1);        $dec = M('member') -> where(array('username'=>$oob['p_user']))->setDec('qjinbi',$oobs['qjinbi']);        account_log4($_SESSION['username'],$oobs['qjinbi'],'订单撤销扣除',0);        $result=M('jyzx')->where(array('id'=>$id))->delete();        if($result && $inc && $dec){            alert('取消成功！',U('Emoney/mairu'));        }else{            alert('取消失败！',U('Emoney/mairu'));        }    }*/    //首页    public function shouye(){        $typeData = M("product") -> where("is_on = 0") ->order("id asc")  -> select();        $banner_list =M("banner") ->order("id asc")  -> select();                $this->assign("typeData",$typeData);        $this->assign("banner_list",$banner_list);        $this->display();    }}?>