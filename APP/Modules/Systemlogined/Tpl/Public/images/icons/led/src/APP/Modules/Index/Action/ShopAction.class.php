<?php  
//账号管理控制器
Class  ShopAction extends CommonAction{

	//平台签到奖励
	public function qiandao(){

			 
			$s_time=strtotime(date("Y-m-d 00:00:01"));
			$o_time=strtotime(date("Y-m-d 23:59:59"));
			$user_id = session('mid');
			$username = session('username');
			$jiangli = C('qdjiangli');
			$qdzs = C('qdzs');
			$info = '签到奖励';
			
			$todayData = M('members_sign')->where("stime > {$s_time} and stime < {$o_time}")->count();    
			$grtodayData = M('members_sign')->where("stime > {$s_time} and stime < {$o_time} and user_id  = {$user_id} ")->count();    //个人签到与否
			

			if($todayData < $qdzs){   
			
				if($grtodayData == 1){      
					alert('您今日已经签过到了,快去推广吧!',-1);
				}else{      
				     
					$map['user_id'] = session('mid');
					$map['username'] = session('username');
					$map['jiangli'] = C('qdjiangli');
					$map['stime'] = time();     
					$map['desc'] = $info;     
					$id = M('members_sign')->add($map);    
				
					if($id){    
						M('member') -> where(array('id'=>session('mid')))->setInc('jinbi',$jiangli);

                        jinbi($username,$jiangli,'每日签到',1);
 						alert('签到成功,获得'. $jiangli .'个币的签到奖励,快去推广吧!',-1);
						}else{      
						alert('签到失败,请刷新重试!',-1);
						} 		
				}
			}else{
					alert('每天最多签到'. $qdzs .'人次!',-1);
				}    


	}


   //订单提交页面
   public function buy(){
	      $userinfo = M("member")->where(array("username"=>session("username")))->find();

	      $product = M("product");
		  $id =  $_GET['id'];
		  //查询矿机信息
		  $data = $product -> find($id);
		  if(empty($data)){
			  alert('信息不存在',U('Emoney/shouye'));
		  }
       $status = M('member')->where(array('username'=>session('username')))->getField('status');
       if($status == 0){
           alert('请先实名认证',U('Account/shoukuanma'));
           exit;
       }
		  //判断 是否已经达到限购数量
		  
		  $my_gounum=M("order")->where(array("user"=>session('username'),"sid"=>$id,'zt'=>1))->count();
		
		  if($my_gounum >=$data['xiangou']){
			    echo '<script>alert("已经达到你购买本矿机上线！");window.history.back(-1);</script>';
				die;
				  
		  }

		  $jinbi = getMemberField('jinbi');
			 if($jinbi < $data['price']){
				echo '<script>alert("矿池钱包不足！");window.history.back(-1);</script>';
				die;
			 }

			  M("member")->where(array('username'=>session('username')))->setDec('jinbi',$data['price']);

			  jinbi(session('username'),$data['price'],'购买'.$data['title'],0);

		$map = array();
			$yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'Q', 'Q', 'I', 'J');
			$map['kjbh'] = $yCode[intval(date('Y')) - 2011] . date('d') . substr(time(), -5) . sprintf('%02d', rand(0, 99));
		  $map['user'] = session('username');
		  $map['user_id'] = session('mid');
		  $map['project']= $data['title'];
		  $map['sid'] = $data['id'];
		  $map['yxzq'] = $data['yszq'];		
          $map['sumprice'] = $data['price'];
		  $map['addtime'] = date('Y-m-d H:i:s');	
          $map['imagepath'] = $data['thumb'];
		  $map['lixi']	= $data['gonglv'];
		  $map['kjsl'] =  $data['shouyi'];
          $map['zt'] =  1;	
          $map['UG_getTime'] =  time();		  
		  M('order')->add($map);		
		  $product->where(array("id"=>$id))->setDec("stock");
		  //写入上级团队算力
				$parentpath = M("member")->where(array("username"=>session('username')))->getField("parentpath");
				$path2 = explode('|', $parentpath);
		        array_pop($path2);
			    $parentpath = array_reverse($path2);
	            foreach($parentpath as $k=>$v){
					 M("member")->where(array('id'=>$v))->setInc("teamgonglv",$map['lixi']);
                }	
		   //写入个人算力
		  M("member")->where(array("username"=>session('username')))->setInc("mygonglv",$map['lixi']);
	            //写入个人矿机数量
		  M("member")->where(array("username"=>session('username')))->setInc('kjnum');

       $user_id = session('mid');
       $p_id=M('member')->where("id = {$user_id}")->getField('parent_id');

       if(!empty($p_id)){
           for($i=1;$i<=6;$i++){
               $p_userinfo=M('member')->where("id = {$p_id}")->find();
               if($p_userinfo){//$p_userinfo['level']
                   $group=M("member_group")->where(array("level"=>$p_userinfo['level']))->find();
                   if($group['ldj'] >=$i){//判断是否可以分到代数
                       $fl_bi=C('tjj_'.$i);
                       $p_shouyi=$data['price']*$fl_bi;
                       M('member')->where("id = {$p_id}")->setInc("jinbi",$p_shouyi);
                       jinbi($p_userinfo['username'],$p_shouyi,$i.'代/ID：'.$user_id,1);
                   }

                   $p_id=$p_userinfo['parent_id'];
                   if(empty($p_id)){
                       break;
                   }

               }else{

                   break;
               }
           }
       }

	      alert('矿机购买成功',U('Shop/orderlist'));
   }
   

   
	public function show(){
		$id = I('id','intval',0);
		
		$info = M('order')->where(array('user'=>session('username'),'zt'=>1,'user_id'=>session('mid'),'id'=>$id))->find();

		$a_time = (time() - strtotime($info['addtime'])) / 3600;
        $info['a_time']=round($a_time,2);
		
		$this->assign('info',$info);
		$this->display();
	}
 
   	//正常矿机
	public function orderlist(){
		import('ORG.Util.Page');
		$count = M('order') ->where(array('user'=>session('username'),'zt'=>1,'user_id'=>session('mid')))->count();
		$Page  = new Page($count,10);
		$Page->setConfig('theme', '%first% %upPage% %linkPage% %downPage% %end%');
		$show = $Page -> show();		
	 
        $list = M('order')->where(array('user'=>session('username'),'zt'=>1,'user_id'=>session('mid')))->order('id desc') -> limit($Page ->firstRow.','.$Page -> listRows)->select();
        foreach($list as $k=>$v) {
            $a_time = (time() - strtotime($v['addtime'])) / 3600;
            $list[$k]['a_time']=round($a_time,2);
        }
        $kjnum = M('order')->where(array('user'=>session('username'),'zt'=>1,'user_id'=>session('mid')))->count();
		$this ->assign("kjnum",$kjnum);
		$this ->assign("page",$show);
        $this->assign('list',$list);
		$this->display();
	}

    //到期矿机
    public function daoqi(){
        import('ORG.Util.Page');
        $count = M('order') ->where(array('user'=>session('username'),'zt'=>2))->count();
        $Page  = new Page($count,10);
        $Page->setConfig('theme', '%first% %upPage% %linkPage% %downPage% %end%');
        $show = $Page -> show();

        $list = M('order')->where(array('user'=>session('username'),'zt'=>2))->order('id desc') -> limit($Page ->firstRow.','.$Page -> listRows)->select();
        foreach($list as $k=>$v) {
            $a_time = (time() - strtotime($v['addtime'])) / 3600;
            $list[$k]['a_time']=round($a_time,2);
        }
        $this ->assign("page",$show);
        $this->assign('list',$list);
        $this->display();
    }


    //一键结算
    public function jiesuan(){
        $user_id=session('mid');
        $username=session('username');
        //判断与上次结算时间有没有达到24小时
        /*        $jiesuan_time=C('jiesuan_time');
                if(empty($jiesuan_time)){
                    $jiesuan_time=24;
                }*/

        $jssj = time() - 24*3600;
       // $jssj = time() - 1800;

        $costData = M('order')->where("user = $username and user_id = $user_id and zt = 1 and UG_getTime < $jssj")->select();
        if (!$costData) 
        {
          alert('暂无可结算矿机！',U('Index/Shop/orderlist'));
          exit;
        }
        foreach ($costData as $k => $v) 
        {
            // 结算
            $a_time = $v['UG_getTime']?$v['UG_getTime']:strtotime($v['addtime']);
            $time1  = time()-$a_time;
            $shouyi = ($time1/3600)*$v['kjsl'];//本次收益
            M('order')->where(array('id'=>$v['id']))->setInc('already_profit',$shouyi);
            M('order')->where(array('id'=>$v['id']))->save(array('UG_getTime'=>time()));

            M('member')->where(array('username'=>$username))->setInc("jinbi",$shouyi);
            jinbi($username,$shouyi,'矿机收益',1);

        }
        alert('结算成功！',U('Index/Shop/orderlist'));

        // $p_id = M('order')->where("user = $username and user_id = $user_id and zt = 1 and UG_getTime < $jssj")->getField('id');
        // if(!empty($p_id)){
        //     for($i=1;$i<=50;$i++){
        //         $order=M('order')->where("user = $username and user_id = $user_id and zt = 1 and UG_getTime < $jssj")->order('id asc')->find();

        //         if(!empty($order)){

        //             /*       if(time()-$order['UG_getTime'] > $jiesuan_time*3600){*/
        //             if(time()-$order['UG_getTime'] > 1800){
        //                 //算出已经结算的时间
        //                 $a_time=$order['UG_getTime']-strtotime($order['addtime']);
        //                 //本次将要结算的时间
        //                 $n_time=time()-$order['UG_getTime'];

        //                 $data=array();
        //                 $data['UG_getTime']=time();
        //                 if($a_time+$n_time > $order['yxzq']*3600){

        //                     $time=($order['yxzq']*3600)-$a_time;
        //                     $data['zt']=2;
        //                     //扣除我的算力
        //                     M('member')->where(array('id'=>$user_id))->setDec("mygonglv",$order['lixi']);
        //                 }else{
        //                     $time=$n_time;
        //                 }

        //                 $shouyi=($time/3600)*$order['kjsl'];//本次收益

        //                 M('order')->where(array('user_id'=>$user_id,'zt'=> 1,'id'=>$order['id']))->setInc('already_profit',$shouyi);
        //                 M('order')->where(array('user_id'=>$user_id,'zt'=> 1,'id'=>$order['id']))->save($data);

        //                 M('member')->where("id = {$user_id}")->setInc("jinbi",$shouyi);
        //                 jinbi($username,$shouyi,'矿机收益',1);
        //             }

        //             if(empty($order['id'])){
        //                 break;
        //             }
        //         }else{

        //             break;
        //         }
        //     }
        // }

    }


}
?>