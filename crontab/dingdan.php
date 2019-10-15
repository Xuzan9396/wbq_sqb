<?php
$mysql_conf = array(
    'host'    => '127.0.0.1:3308',
    'db'      => 'sqb_db',
    'db_user' => 'root',
    'db_pwd'  => '123456',
);

$link = mysqli_connect(
    $mysql_conf['host'],  /* The host to connect to 连接MySQL地址 */
    'root',      /* The user to connect as 连接MySQL用户名 */
    '123456',  /* The password to use 连接MySQL密码 */
    'sqb_db');    /* The default database to query 连接数据库名称*/
if (!$link) {
    printf("Can't connect to MySQL Server. Errorcode: %s ", mysqli_connect_error());
    exit;
}
echo '<pre>';
    var_dump($link);
echo '</pre>';
exit;

/* Send a query to the server 向服务器发送查询请求*/
if ($result = mysqli_query($link, 'SELECT Name, Population FROM City ORDER BY Population DESC LIMIT 5')) {

    //print("Very large cities are: ");

    /* Fetch the results of the query 返回查询的结果 */
    while( $row = mysqli_fetch_assoc($result) ){
        printf("%s (%s) ", $row['Name'], $row['Population']);
    }

    /* Destroy the result set and free the memory used for it 结束查询释放内存 */
    mysqli_free_result($result);
}

/* Close the connection 关闭连接*/
mysqli_close($link);


function connect(){
    static $conn;
    if(!$conn){
        $conn = mysqli_connect('127.0.0.1','root',123456,3308) ;
    }

    if (mysqli_connect_errno($conn))
    {
        echo "连接 MySQL 失败: " . mysqli_connect_error();
    }
    mysqli_set_charset($conn,'utf8');
    mysqli_select_db('sqb_db','utf8') or die("指定数据库打开失败");
    /* //测试查询数据库
        $sql="select category_id,category_name from category";
        //$sql = "SELECT * FROM admin";
        $result = mysqli_query($conn, $sql);
    //返回所有的数据集
    //var_dump(mysqli_fetch_all($result));die;
    //处理返回的数据集
        $data = [];
        while($row = mysqli_fetch_assoc($result)) {
    //mysqli_fetch_array
            $data[] = $row;
        }
    //在页面上打印
        var_dump($data);*/
    return $conn;
}

