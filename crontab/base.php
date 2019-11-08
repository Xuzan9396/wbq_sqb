<?php
/**
 * Created by PhpStorm.
 * User: xuzan
 * Date: 2019/10/23
 * Time: 8:56 PM
 */
date_default_timezone_set('PRC');
class Base
{
//
    public function __construct( $argv )
    {

        
        $GLOBALS['env'] = isset($argv[1]) ? $argv[1] : 'local';
    }

    public   function getPdo(){


        $env = isset($GLOBALS['env']) ? $GLOBALS['env'] : 'local';
        switch ($env){
            case 'local':
                $mysql_conf = array(
                    'host'    => '127.0.0.1:3308',
                    'db'      => 'jlkc_db',
                    'db_user' => 'root',
                    'db_pwd'  => '123456',
                );
                break;
            case 'test':
                $mysql_conf = array(
                    'host'    => 'mysql',
                    'db'      => 'jlkc_db',
                    'db_user' => 'root',
                    'db_pwd'  => '27252725',
                );
                break;
            case 'pro':
                $mysql_conf = array(
                    'host'    => 'mysql',
                    'db'      => 'jlkc_db',
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
//            $stmt = $conn->prepare("SELECT id FROM ds_member limit 1");
//            $res =  $stmt->execute();
//
//            echo '<pre>';
//            var_dump($res);
//            echo '</pre>';
//            exit;
//
//            // 设置结果集为关联数组
//            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
////    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
//        echo $v;
//    }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function read( $sql, $binds = [], $findOne = 0 )
    {
        $pdo = $this->getPdo();
        $stmt = $this->_doPrepare($sql, $binds, $pdo);

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

    public function write($sql, $binds = [])
    {
        $pdo = $this->getPdo();
        $stmt = $this->_doPrepare($sql, $binds, $pdo);

        $errorInfo = $stmt->errorInfo();
        if (!$errorInfo[0]) {
            throw new \Exception('mysql error:' . $errorInfo[2]);
        }
    }

    public function _doPrepare( $sql, $binds, $pdo )
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
}



