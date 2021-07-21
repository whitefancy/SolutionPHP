<?php

/**
 *  redisdrive.class.php
 * php redis 操作类
 **/
class Redis
{
    //默认生存时间
    public $expire = 60 * 60 * 12; /*60*60*24*/
    //连接是否成功
    public $redis;
    //连接redis服务器ip
    public $ip = '192.168.2.118';
    //端口
    public $port = 6379;
    //密码
    private $password = null;
    //数据库
    public $dbindex = 0;
    /**
     * @var Singleton
     */
    private static $instance;

    /**
     * 通过懒加载获得实例（在第一次使用的时候创建）
     */
    public static function getInstance(): Redis
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }


    /**
     * 防止实例被克隆（这会创建实例的副本）
     */
    private function __clone()
    {
    }

    /**
     * 防止反序列化（这将创建它的副本）
     */
    private function __wakeup()
    {
    }
    /**
     * 自动连接到redis缓存
     */
    /**
     * 不允许从外部调用以防止创建多个实例
     * 要使用单例，必须通过 Singleton::getInstance() 方法获取实例
     */
    private function __construct()
    {
        //判断php是否支持redis扩展
        if (extension_loaded('redis')) {
            //实例化redis
            if ($this->redis = new redis()) {
                //ping连接
                if (!$this->ping()) {
                    $this->redis = false;
                } else {
                    echo "connected 1";
                    //连接通后的数据库选择和密码验证操作
                    $this->redis->select($this->dbindex);
                    $this->redis->auth($this->password);
                }
            } else {
                $this->redis = false;
            }
        } else {
            $this->redis = false;
            echo "connected 2";
        }
    }

    /**
     * ping redis 的连通性
     */
    public function ping()
    {
        if ($this->redis->connect($this->ip, $this->port)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 检测redis键是否存在
     */
    public function exists($key)
    {
        if ($this->redis->exists($key)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取redis键的值
     */
    public function get($key)
    {
        if ($this->exists($key)) {
            return json_decode($this->redis->get($key), true);
        } else {
            return false;
        }
    }

    /**
     * 带生存时间写入key
     */
    public function setex($key, $value, $expire)
    {
        return $this->redis->setex($key, $expire, json_encode($value));
    }

    /**
     * 设置redis键值
     */
    public function set($key, $value)
    {
        if ($this->redis->set($key, json_encode($value))) {
            return $this->redis->expire($key, $this->expire);
        } else {
            return false;
        }
    }

    /**
     * 获取key生存时间
     */
    public function ttl($key)
    {
        return $this->redis->ttl($key);
    }

    /**
     *删除key
     */
    public function del($key)
    {
        return $this->redis->del($key);
    }

    /**
     * 清空所有数据
     */
    public function flushall()
    {
        return $this->redis->flushall();
    }

    /**
     * 获取所有key
     */
    public function keys()
    {
        return $this->redis->keys('*');
    }

}