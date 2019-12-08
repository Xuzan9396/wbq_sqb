<?php/** * 系统设置控制器 */Class SystemAction extends CommonAction{    /**     * 系统日志视图     * @return [type] [description]     */    public function systemLog()    {        $Data = M('log'); // 实例化Data数据对象        import('ORG.Util.Page');// 导入分页类        $map = array();        if (isset($_GET['account']) && $_GET['account'] != '') {            $map['logaccount'] = $_GET['account'];        }        $count = $Data->where($map)->count();// 查询满足要求的总记录数        $Page = new Page($count, 10);// 实例化分页类 传入总记录数        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取        $nowPage = isset($_GET['p']) ? $_GET['p'] : 1;        $list = $Data->where($map)->order('logtime desc')->page($nowPage . ',' . $Page->listRows)->select();        $show = $Page->show();// 分页显示输出        $this->assign('page', $show);// 赋值分页输出        $this->assign('list', $list);// 赋值数据集        $this->display(); // 输出模板    }    //系统配置视图    public function customSetting()    {        $config = include './APP/Conf/system.php';        $this->assign('config', $config);        // 新的交易价格        $today = M('date_today')->order('id desc')->limit(1)->find();        $this->assign('dateToday', $today);        $this->display();    }    //奖金配置处理    public function bonusConf()    {        $path = './APP/Conf/system.php';        $config = include $path;        $config['num'] = I('post.num', 0, 'floatval');        $config['zs_num'] = I('post.zs_num', 0, 'floatval');        $config['z_num'] = I('post.z_num', 0, 'floatval');        $config['dhzcbs'] = I('post.dhzcbs', 0, 'floatval');        $config['qdzs'] = I('post.qdzs', 0, 'floatval');        $config['qdjiangli'] = I('post.qdjiangli', 0, 'floatval');        $config['jiaoyi_shouxu'] = I('post.jiaoyi_shouxu', 0, 'floatval');        $config['bsbei'] = I('post.bsbei', 0, 'floatval');        $config['adurl'] = I('post.adurl', '', 'trim');        $config['open_web'] = I('post.open_web', 0, 'intval');        $config['open_web_notice'] = I('post.open_web_notice', '', 'trim');        $config['is_open_regiest'] = I('post.is_open_regiest', 0, 'intval');        $data = "<?php\r\nreturn " . var_export($config, true) . ";\r\n?>";        if (file_put_contents($path, $data)) {            $this->success('修改成功', U(GROUP_NAME . '/System/customSetting'));        } else {            $this->error('修改失败， 请修改' . $path . '的写入权限');        }    }    public function jiaoyi()    {        $path = './APP/Conf/system.php';        $config = include $path;        $config['jy_open'] = I('post.jy_open', 0, 'intval');        $config['jy_time'] = I('post.jy_time', '', 'trim');        $config['tousu_time'] = I('post.tousu_time', 0, 'intval');        $config['rmb_hl'] = I('post.rmb_hl', 0, 'floatval');        $config['mcnum'] = I('post.mcnum', 0, 'floatval');        $config['seller_arch'] = I('post.seller_arch', 0, 'intval');        $config['buyer_arch'] = I('post.buyer_arch', 0, 'intval');        $config['kc_draw'] = I('post.kc_draw', 0, 'intval');        $config['draw_low_price'] = sprintf("%.2f", I('post.draw_low_price', 0, 'floatval'));        $config['draw_high_price'] = sprintf("%.2f",I('post.draw_high_price', 0, 'floatval'));        $data = "<?php\r\nreturn " . var_export($config, true) . ";\r\n?>";        if (file_put_contents($path, $data)) {            $this->success('修改成功', U(GROUP_NAME . '/System/customSetting'));        } else {            $this->error('修改失败， 请修改' . $path . '的写入权限');        }    }    /**     * 修改会员相关配置     */    public function kxian()    {         $path = './APP/Conf/system.php';        $jiaoyi_date = $_POST['jiaoyi_date'];        $jiaoyi_num = (int)$_POST['jiaoyi_num'];        $jiaoyi_mr_phone = trim($_POST['jiaoyi_mr_phone']);        $jiaoyi_mc_phone= trim($_POST['jiaoyi_mc_phone']);        if($jiaoyi_date && $jiaoyi_num && $jiaoyi_mr_phone &&  $jiaoyi_mc_phone){            $date = strtotime($jiaoyi_date);            $res = M('jyzx_total')->where('log_date = ' . $date)->limit(1)->find();            if($res){                M('jyzx_total')->where('log_date = ' . $date)->save([                    'total_cbt' => $res['total_cbt'] + $jiaoyi_num,                    'update_at' => time(),                ]);            }else{                M('jyzx_total')->add([                    'total_cbt' => $jiaoyi_num,                    'update_at' => time(),                    'log_date' => $date,                    'create_at' => time(),                ]);            }//            $map['mr_id'] =  $user['id'];            $map['mr_user'] = $jiaoyi_mr_phone;            $map['mc_user'] = $jiaoyi_mc_phone;            $map['qian'] = $jiaoyi_num*0.1;            $map['cbt'] = $jiaoyi_num;            $map['date']= time();            $map['jydate']= date('Y-m-d H:i:s');            $map['danjia']  = 0.1;            $map['datatype'] = 'qgcbt';            $map['zt'] = 2;            M('jyzx')->add($map);            $this->success('交易量添加成功', U(GROUP_NAME . '/System/customSetting'));        }else{            $config = include $path;            $config['everyday_rose']      = I('post.everyday_rose',0,'floatval');//        $config['draw_low_price'] = sprintf("%.2f", I('post.draw_low_price', 0, 'floatval'));//        $config['draw_high_price'] = sprintf("%.2f",I('post.draw_high_price', 0, 'floatval'));            $dataArr = "<?php\r\nreturn " . var_export($config, true) . ";\r\n?>";            if (file_put_contents($path, $dataArr)) {                $data['price'] = I('post.price', 0, 'floatval');                $data['date'] = time();//                $res = M('date_today')->add($data);                $arr = M('date')->order('id desc')->limit(1)->find();                M('date')->where('Id = ' .$arr['Id'])->limit(1)->save([                    'price' => $data['price']                ]);                if ($res) {//                $dateTime = strtotime(date('Ymd'));//                 M('date')->where("date = $dateTime")->save(['price' => $data['price'], 'date' => strtotime(date('Ymd'))]);////                // 将所有挂单金额改成当前金额//                    $jydata = M('jyzx')->where(array('zt' => 0))->select();                    foreach ($jydata as $k => $v) {                        $id = intval($v['id']);                        $data11 = array(                            'danjia' => $data['price'],                            'qian' => $v['cbt'] * $data['price'],                        );                        M('jyzx')->where(['id' => $id])->save($data11);                    }                    M('jyzx_total');                    $this->success('修改成功', U(GROUP_NAME . '/System/customSetting'));                } else {                    $this->error('修改失败!');                }            }else{                $this->error('写入失败');            }        }        // if (file_put_contents($path, $data)) {        //     $this->success('修改成功', U(GROUP_NAME.'/System/customSetting'));        // } else {        //     $this->error('修改失败， 请修改' . $path . '的写入权限');        // }    }    public function tuiguang()    {        $path = './APP/Conf/system.php';        $config = include $path;        $config['tjj_1'] = I('post.tjj_1', 0, 'floatval');        $config['tjj_2'] = I('post.tjj_2', 0, 'floatval');        $config['tjj_3'] = I('post.tjj_3', 0, 'floatval');        $config['tjj_4'] = I('post.tjj_4', 0, 'floatval');        $config['tjj_5'] = I('post.tjj_5', 0, 'floatval');        $config['tjj_6'] = I('post.tjj_6', 0, 'floatval');        $config['sq_num'] = I('post.sq_num', 0, 'floatval');        $config['zhitui'] = I('post.zhitui', 0, 'floatval');        $config['qianbao'] = I('post.qianbao', 0, 'floatval');        $config['sq_zc'] = I('post.sq_zc', 0, 'floatval');        $config['sq_id'] = I('post.sq_id', 0, 'floatval');        $config['sqkj_num'] = I('post.sqkj_num', 0, 'floatval');        $config['sqbz'] = I('post.sqbz', '', 'trim');        //-----------帅气的分割线------------        $config['tjj_ed_0'] = I('post.tjj_ed_0', 0, 'floatval');        $config['tjj_ed_1'] = I('post.tjj_ed_1', 0, 'floatval');        $config['tjj_ed_2'] = I('post.tjj_ed_2', 0, 'floatval');        $config['tjj_ed_3'] = I('post.tjj_ed_3', 0, 'floatval');        $config['tjj_ed_4'] = I('post.tjj_ed_4', 0, 'floatval');        $config['tjj_ed_5'] = I('post.tjj_ed_5', 0, 'floatval');        $config['tjj_ed_6'] = I('post.tjj_ed_6', 0, 'floatval');        //-----------帅气的分割线------------        $data = "<?php\r\nreturn " . var_export($config, true) . ";\r\n?>";        if (file_put_contents($path, $data)) {            $this->success('修改成功', U(GROUP_NAME . '/System/customSetting'));        } else {            $this->error('修改失败， 请修改' . $path . '的写入权限');        }    }    /**     * 修改会员相关配置     */    public function memberConf()    {        $path = './APP/Conf/system.php';        $config = include $path;        $config['MEMBER_LOGIN'] = I('post.memberlogin', '', 'strval');        $config['MEMBER_REG'] = I('post.memberreg', '', 'strval');        $config['CODE_APIKEY'] = I('post.code_apikey', '', 'strval');        $config['CODE_CF'] = I('post.code_cf', 0, 'intval');        $config['CODE_GQ'] = I('post.code_gq', 0, 'intval');        $data = "<?php\r\nreturn " . var_export($config, true) . ";\r\n?>";        if (file_put_contents($path, $data)) {            $this->success('修改成功', U(GROUP_NAME . '/System/customSetting'));        } else {            $this->error('修改失败， 请修改' . $path . '的写入权限');        }    }    public function backUp()    {        $DataDir = RUNTIME_PATH . 'databak/';        if (!empty($_GET['Action'])) {            import("ORG.Util.MySQLReback");            $config = array(                'host' => C('DB_HOST'),                'port' => C('DB_PORT'),                'userName' => C('DB_USER'),                'userPassword' => C('DB_PWD'),                'dbprefix' => C('DB_PREFIX'),                'charset' => 'UTF8',                'path' => $DataDir,                'isCompress' => 0, //是否开启gzip压缩                'isDownload' => 0            );            $mr = new MySQLReback($config);            $mr->setDBName(C('DB_NAME'));            if ($_GET['Action'] == 'backup') {                $mr->backup();                //添加日志操作                $desc = '备份数据库';                write_log(session('username'), 'admin', $desc);                redirect(U(GROUP_NAME . '/system/backUp'));            } elseif ($_GET['Action'] == 'RL') {                $mr->recover($_GET['File']);                //添加日志操作                $desc = '还原数据库';                write_log(session('username'), 'admin', $desc);                redirect(U(GROUP_NAME . '/system/backUp'));            } elseif ($_GET['Action'] == 'Del') {                if (@unlink($DataDir . $_GET['File'])) {                    //添加日志操作                    $desc = '删除备份文件';                    write_log(session('username'), 'admin', $desc);                    redirect(U(GROUP_NAME . '/system/backUp'));                } else {                    $this->error('删除失败！');                }            }            if ($_GET['Action'] == 'dow') {                function DownloadFile( $fileName )                {                    ob_end_clean();                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");                    header('Content-Description: File Transfer');                    header('Content-Type: application/octet-stream');                    header('Content-Length: ' . filesize($fileName));                    header('Content-Disposition: attachment; filename=' . basename($fileName));                    readfile($fileName);                }                DownloadFile($DataDir . $_GET['file']);                //添加日志操作                $desc = '下载备份文件';                write_log(session('username'), 'admin', $desc);                exit();            }        }        $filelist = dir_list($DataDir);        foreach ((array)$filelist as $r) {            $filename = explode('-', basename($r));            $files[] = array('path' => $r, 'file' => basename($r), 'name' => $filename[0], 'size' => filesize($r), 'time' => filemtime($r));        }        $this->assign('files', $files);        $this->display();    }    /**     * 券列表     * author gitxuzan     */    public function coupon_list()    {        $list = M('coupon_num')->order('number asc')->select();        $this->assign('list', $list);        $this->display();    }    public function edit_coupon()    {        $id = (int)$_GET['id'];        $list = M('coupon_num')->where('id = ' . $id )->find();               $this->assign('list', $list);        $this->display();    }    public function add_coupon()    {        $this->display();    }    public function del_coupon()    {        $id = (int)$_GET['id'];        $del = M('coupon_num')->where('id = ' . $id )->delete();        if ($del) {            $this->success('删除成功');            die;        }        $this->error('删除失败');        die;    }    public function editCouponApply(  )    {        if(isset($_POST['id'])){            $id = (int)$_POST['id'];            $coupon_num = (int)$_POST['coupon_num'];            $number = (int)$_POST['number'];            if($number <= 0  || $coupon_num < 0 ){                $this->error('参数设置不对');                die;            }            $boolFind = M('coupon_num')->where("id != $id and `number` = $number")->find();            if(!!$boolFind){                $this->error('该币的配置已经存在了');                die;            }            $create_at = time();            $data = compact('id','coupon_num', 'number','create_at');            $res = M('coupon_num')->data($data)->save();        }else{            $coupon_num = (int)$_POST['coupon_num'];            $number = (int)$_POST['number'];            if($number <= 0  || $coupon_num < 0 ){                $this->error('参数设置不对');                die;            }            $boolFind = M('coupon_num')->where("`number` = $number")->find();            if(!!$boolFind){                $this->error('该币的配置已经存在了');                die;            }            $create_at = time();            $data = compact('coupon_num', 'number','create_at');            $res = M('coupon_num')->data($data)->add();        }        if ($res) {            $this->success('保存成功');            die;        }        $this->error('保存失败');        die;    }}