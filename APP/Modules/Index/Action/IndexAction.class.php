<?phpClass IndexAction extends CommonAction{    public function test(  )    {        $data['zt'] = 2;//        $data['jydate'] = date('Y-m-d H:i:s');        $startTime = date('Y-m-d 00:00:00');        $endTime = date('Y-m-d 23:59:59');        $map['jydate'] = array('between',[strval($startTime),strval($endTime)]);        $cbt_today = M('jyzx')->where($map)->where(array('zt'=> 2 ))->sum('cbt');// everyday_rose        if($cbt_today = intval($cbt_today)){            $date = strtotime($startTime);            $bool = M('jyzx_total')->where('total_date = ' . $date)->find();            if($bool){                M('jyzx_total')->where('total_date = ' . $date)->save([                    'total_cbt' => $cbt_today,                    'update_at' => time(),                ]);            }else{                            M('jyzx_total')->add([                    'total_cbt' => $cbt_today,                    'update_at' => time(),                    'total_date' => $date,                    'create_at' => time(),                ]);            }        }        $cbt_total = M('jyzx_total')->sum('total_cbt');        echo '<pre>';            var_dump($cbt_total);        echo '</pre>';        exit;             $cbt_total = 400;        $Model = M();        $Model->startTrans();        $multiple = floor($cbt_total / 100); // 测试//        echo '<pre>';//            var_dump($multiple);//        echo '</pre>';//        exit;        $res = M('date')->order('id desc')->limit(1)->find();        if(!$res){            M('date')->add([                'date' => strtotime(date('Ymd')),                'price' => 0.1,                'multiple' => $multiple            ]);        }            if($multiple > $res['multiple']){//                $increment = 0.01;            $increment = C('everyday_rose');            M('date')->add([                'date' => time(),                'price' => $res['price'] + $increment,                'multiple' => $multiple            ]);            // 11            $jydata = M('jyzx')->where(array('zt' => 0))->select();            if(count($jydata)){                foreach ($jydata as $k => $v) {                    $id = intval($v['id']);                    $data11 = array(                        'danjia' => $res['price'] + $increment,                        'qian' => $v['cbt'] * ($res['price'] + $increment),                    );                    M('jyzx')->where(['id' => $id])->save($data11);                }            }        }        $Model->commit();    }    public function index(){        $member = M('member');        $username = session('username');        $minfo = $member->where(array('username'=>$username))->find();        $yxkj = M('order')->where(array('user'=>$username,'zt'=>1))->count();        $ljcl = M('order')->where(array('user'=>$username))->sum('already_profit');		$ljmrl = M('jyzx')->where(array('mr_user'=>$username,'datatype'=>'qgcbt','zt'=>2))->sum('cbt');        $jytj11 = M('jyzx')->where(array('mc_user'=>$username,'zt'=>1))->sum('cbt');        // 直推 团队        $ztnum = M('member')->where(array('parent'=>session('username')))->count();        $parentpath = M('member')->where(array('username'=>session('username')))->getField('parentpath');        $parentpath .= session('mid').'|';        $tdnum = M('member')->where(array('parentpath'=>array('like',$parentpath.'%')))->count();        $this->assign('ztnum',$ztnum);        $this->assign('tdnum',$tdnum+1);        $this->assign('yxkj',$yxkj);		$this->assign('ljmrl',$ljmrl);		        $this->assign('ljcl',$ljcl);        $this->assign('jytj11',$jytj11);        $this->assign('minfo',$minfo);        if($ljmrl>=10000){            $level = 7;            $level_str =  '七级矿工';        }else if($ljmrl>=5600){            $level = 6;            $level_str =  '六级矿工';        }else if($ljmrl>=3000){            $level_str =  '五级矿工';            $level = 5;        }else if($ljmrl>=1000){            $level_str =  '四级矿工';            $level = 4;        }else if($ljmrl>=500){            $level_str =  '三级矿工';            $level = 3;        }else if($ljmrl>=200){            $level_str =  '二级矿工';            $level = 2;        }else if($ljmrl>=50){            $level_str =  '一级矿工';            $level = 1;        }else{            $level_str =  '普通会员';            $level = 0;        }        M('member')->where(array('id' => $minfo['id']))->save(array('level'=>$level));        $this->assign('level',$level_str);        $this->display();    }    /**     * 生成验证码     */    public function verify(){        ob_clean();        import('ORG.Util.Image');        Image::buildImageVerify(4,1,'png',55,25);    }    //退出系统    public function logout(){        //添加日志        $desc = '会员'. session('account') .'登出';        write_log(session('account'),'member',$desc);        //销毁session        //session('[destroy]');        session('mid',null);        session('username',null);        session('member',null);        session('usersecondlogin',null);        $this->redirect(GROUP_NAME.'/Login/index');        //$this->redirect(U('Index/Login/index'));    }}?>