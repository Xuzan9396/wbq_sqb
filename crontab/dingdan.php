<?php



function getPdo(){

    $mysql_conf = array(
        'host'    => '127.0.0.1:3308',
        'db'      => 'sqb_db',
        'db_user' => 'root',
        'db_pwd'  => '123456',
    );

    $mysql_conf = array(
        'host'    => 'mysql',
        'db'      => 'sqb_db',
        'db_user' => 'root',
        'db_pwd'  => '27252725',
    );
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

$sql = "select * from sqb_db.ds_member limit 5";

echo '<pre>';
    var_dump(read($sql));
echo '</pre>';
exit;
