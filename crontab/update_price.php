<?php
/**
 * Created by PhpStorm.
 * User: xuzan
 * Date: 2019/10/23
 * Time: 8:56 PM
 */

include "base.php";

class UpdatePrice extends Base{
    public function __construct( $argv )
    {
        parent::__construct($argv);

    }

    public function update_all( $argv )
    {
        if(!isset($argv[2])) {
            echo '<pre>';
                var_dump('no function');
            echo '</pre>';
            exit;
        }

        $fun = trim($argv['2']);

        $this->$fun();

    }

    public function update_price(  )
    {

        $dates = date('Y-m-d H:i:s');
        $sql = "select * from ds_date order by id desc limit 1";
        $res = $this->read($sql,[],1);

        if($res){
            $date_time = strtotime(date('Y-m-d',$res['date']));
            $time = strtotime(date('Y-m-d'));
            if($date_time >= $time){
                echo $dates . '已经最新了';
                exit;

            }

            $path = "../APP/Conf/system.php";
            $config = include $path;


            $everyday_rose = isset($config['everyday_rose']) ? floatval($config['everyday_rose']) : 0.01;


            if($date_time+86400 ==  $time ){
                $cur_price = $everyday_rose + $res['price'];
                $sql = "insert into ds_date (price,date) values ($cur_price, $time)";
                $this->write($sql);
                $sql_update = "update ds_jyzx set danjia = $cur_price , qian = $cur_price * cbt  where zt = 0";
                $this->write($sql_update);
//                $config['everyday_last_time']      = time();


                echo $dates.  'success' . PHP_EOL;exit;

                /*                $data = "<?php\r\nreturn " . var_export($config, true) . ";\r\n?>";*/

//                file_put_contents($path, $data);
            }else{
                echo $dates . ':时间不匹配' . PHP_EOL;
            }
        }

    }

    public function test(  )
    {
        $sql = "select * from ds_jyzx limit 1";
        $res = $this->read($sql);
        echo '<pre>';
            var_dump($res);
        echo '</pre>';
        exit;
    }


}

$model = new UpdatePrice($argv);
$model->update_all($argv);
