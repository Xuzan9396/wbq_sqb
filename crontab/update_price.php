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

        $todaySql = "select * from ds_date order by id desc limit 1";
        $todayRes = $this->read($todaySql,[],1);

        if($res && $todayRes){
            $date_time = strtotime(date('Y-m-d',$res['date']));
            $time = strtotime(date('Y-m-d'));
            if($date_time >= $time){
                echo $dates . '已经最新了' . PHP_EOL;
                exit;

            }

                $everyday_rose = 0.001;
                $everyday_rose_price = $todayRes['price']+0.001;


                $sql = "insert into ds_date (price,date) values ($everyday_rose_price, $time)";
                $this->write($sql);

                $times = time();
                $todaySql = "insert into ds_date_today(price,`date`) values ($everyday_rose_price, $times)";
                $this->write($todaySql);

                $sql_update = "update ds_jyzx set danjia = danjia+$everyday_rose , qian = danjia * cbt  where zt = 0";
                $this->write($sql_update);

                echo $dates.  'success' . PHP_EOL;exit;

        }

    }

    public function test(  )
    {
        $path = "../APP/Conf/system.php";
        $config = include $path;


        $everyday_rose = isset($config['everyday_rose']) ? floatval($config['everyday_rose']) : 0.01;
        $config['draw_low_price'] = $config['draw_low_price'] + $everyday_rose;
        $config['draw_high_price'] = $config['draw_high_price'] + $everyday_rose;
        echo '<pre>';
            var_dump($config['draw_low_price'], $config['draw_high_price']);
        echo '</pre>';
        exit;
    }

}

$model = new UpdatePrice($argv);
$model->update_all($argv);
