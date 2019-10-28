<?php
date_default_timezone_set('PRC');

$GLOBALS['env'] = isset($argv[1]) ? $argv[1] : 'local';


function getPdo(){

    
    $env = $GLOBALS['env'];
    switch ($env){
        case 'local':
            $mysql_conf = array(
                'host'    => '127.0.0.1:3308',
                'db'      => 'sqb_db',
                'db_user' => 'root',
                'db_pwd'  => '123456',
            );
            break;
        case 'test':
            $mysql_conf = array(
                'host'    => 'mysql',
                'db'      => 'test_sqb',
                'db_user' => 'root',
                'db_pwd'  => '27252725',
            );
            break;
        case 'pro':
            $mysql_conf = array(
                'host'    => 'mysql',
                'db'      => 'sqb_db',
                'db_user' => 'root',
                'db_pwd'  => '27252725',
            );
            break;
    }
 

  
    $servername = $mysql_conf['host'];
    $username = $mysql_conf['db_user'];
    $password = $mysql_conf['db_pwd'];
    $dbname = $mysql_conf['db'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        $stmt = $conn->prepare("SELECT id FROM ds_member limit 1");
        $res =  $stmt->execute();

        echo '<pre>';
        var_dump($res);
        echo '</pre>';
        exit;

        // 设置结果集为关联数组
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
//        echo $v;
//    }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function read( $sql, $binds = [], $findOne = 0 )
{
    $pdo = getPdo();
    $stmt = _doPrepare($sql, $binds, $pdo);

    $errorInfo = $stmt->errorInfo();
    if (!$errorInfo[0]) {
        throw new \Exception('mysql error:' . $errorInfo[2]);
    } else {
        if ($findOne == 1) {
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        }
        return $data;
    }
}

function write($sql, $binds = [])
{
    $pdo = getPdo();
    $stmt = _doPrepare($sql, $binds, $pdo);

    $errorInfo = $stmt->errorInfo();
    if (!$errorInfo[0]) {
        throw new \Exception('mysql error:' . $errorInfo[2]);
    }
}

function _doPrepare( $sql, $binds, $pdo )
{
    $ps = $pdo->prepare($sql);
    if (isset($binds['i']) && !empty($binds['i'])) {
        foreach ($binds['i'] as $k => $v) {
            $vv = (int)$v;
            $ps->bindValue($k, $vv, \PDO::PARAM_INT);
        }
    }
    if (isset($binds['s']) && !empty($binds['s'])) {
        foreach ($binds['s'] as $k => $v) {
            $ps->bindValue($k, $v, \PDO::PARAM_STR);
        }
    }
    $ps->execute();

    return $ps;
}

 function qxjy($id,$mr_user_id){

    $map['id']=$id;


    $result = read("select * from ds_jyzx where id = $id",[],1);


    $mc_user = $result['mc_user'];

    if (!$mc_user){
        return;
    }


    $oobs = read("select * from ds_member where username = '$mc_user'",[],1);

     if(!$oobs){
         return;
     }
    $oobs_level = intval($oobs['level']);




    // 退费


     $shouxuArr = read("select shouxu from ds_member_group where `level` = $oobs_level",[],1);
     if(!$shouxuArr){
         return;
     }
     $shouxu = $shouxuArr['shouxu'];


     $res_cbt = $result['cbt'];

     $tui = $res_cbt * $shouxu + $res_cbt;

    $trading_coupon_num = $result['trading_coupon_num'];


    $oob = write("update ds_member set `ksye` = `ksye` + $tui,`ksed` = `ksed` + $res_cbt,trading_coupon_num = trading_coupon_num + $trading_coupon_num where username = $mc_user limit 1 ");



     $sql = "update ds_jyzx set `zt` = 0,`jydate` = '', `mc_user` = '', `mc_level` = '', `mc_id` = '', `trading_coupon_num` = 0 where id = $id  limit 1";


     write($sql);




     $seal_sql = "update ds_member set `lock` = 1 where username = $mr_user_id and `lock` = 0 limit 1";

     write($seal_sql);

     $sql = "select * from ds_jyzx where `zt` = 1 and mr_user = $mr_user_id and mc_user is not null";


     $deal_list = read($sql);


     if(is_array($deal_list) && count($deal_list)){
         foreach ($deal_list as $key => $value) {
             $id = $value['id'];
             $mc_user = $value['mc_user'];
             $oobs = read("select * from ds_member where username = '$mc_user'",[],1);

             if(!$oobs){
                 continue;
             }
             $oobs_level = intval($oobs['level']);
             $shouxuArr = read("select shouxu from ds_member_group where `level` = $oobs_level",[],1);
             if(!$shouxuArr){
                 continue;
             }
             $shouxu = $shouxuArr['shouxu'];


             $res_cbt = $value['cbt'];

             $tui = $res_cbt * $shouxu + $res_cbt;


             $trading_coupon_num = $value['trading_coupon_num'];
//             echo '<pre>';
//                 var_dump($trading_coupon_num,$tui,"update ds_member set `ksye` = `ksye` + $tui,`ksed` = `ksed` + $res_cbt,trading_coupon_num = trading_coupon_num + $trading_coupon_num where username = $mc_user limit 1 ");
//             echo '</pre>';
//             exit;

             $oob = write("update ds_member set `ksye` = `ksye` + $tui,`ksed` = `ksed` + $res_cbt,trading_coupon_num = trading_coupon_num + $trading_coupon_num where username = $mc_user limit 1 ");



         }
     }

     $sql = "delete from ds_jyzx where mr_user = $mr_user_id and `zt` in (0,1)";
     write($sql);


     $sql = "Call Proc_Member_titles('$mr_user_id','add')";
     read($sql);

//    keshou($mc_user,$tui,'交易取消退款',1);

    // 可售额度

//    dongjie($mc_user,$res_cbt,'交易取消退款',1);



     echo '成功啦';


}

function keshou($member,$money,$desc,$jj,$type = 0){



    $ksyeArr = read("select ksye from ds_member where `username` = $member",[],1);


    $ksye = $ksyeArr['ksye'];


    $balance = $money + $ksye;

    $addtime = time();

    $sql = "insert into ds_keshoudetail (member,type,adds,balance,addtime,`desc`) values ($member,$type,$money,$balance,$addtime,'$desc')";
    write($sql);



}


function dongjie($member,$money,$desc,$jj,$type = 0){

    $ksyeArr = read("select ksed from ds_member where `username` = $member",[],1);


    $qjinbi = $ksyeArr['ksed'];




        $qjinbi = $qjinbi - $money;


        $balance = $money + $qjinbi;


    $addtime = time();



    $sql = "insert into ds_dongjiedetail (member,`type`,adds,balance,addtime,`desc`) values ($member,$type,$money,$balance,$addtime,'$desc')";
    write($sql);

}


$time =$GLOBALS['env'] == 'pro' ? date('Y-m-d H:i:s',time()-3600*2) :date('Y-m-d H:i:s',time()-60*5) ;
$sql = "select id,mr_user from ds_jyzx where `zt` = 1 and mc_user is not NULL and  image is null and jydate < '$time'  limit 50";

$deal_list = read($sql);



//$sql = "Call Proc_Member_titles('188888888887','select')";
//$res = read($sql,[],1);
//
//echo '<pre>';
//    var_dump($res);
//echo '</pre>';
//exit;

//echo '<pre>';
//    var_dump($deal_list);
//echo '</pre>';
//exit;

if($deal_list && count($deal_list)){


    foreach ($deal_list as $key => $value) {
        qxjy($value['id'] ,(int)$value['mr_user']);
    }
    exit($GLOBALS['env'] . ',' .date('Y-m-d'). ',success:' . join(',',array_column($deal_list,'id')));
}
exit($GLOBALS['env'] . ',' .date('Y-m-d'). ',success');

