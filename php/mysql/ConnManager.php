<?php
namespace ScriptProject\Mysql;

require __DIR__ . "/Singleton.php";

class ConnManager
{
    use Singleton;

    const RETRY_TIMES = 3;
    
//    private $config;
    private $config = [
        "local" => [
            "host" => "",
            "dbname" => "",
            "user" => "",
            "password" => "git init",
        ],
    ];

    
    private $connections;

    public function getConnection($module)
    {
        if (!isset($this->config[$module])) {
            throw new \Exception();
        }

        $key = $this->config[$module]['host'] . $this->config[$module]['dbname'];
        if (!$this->connections[$key]) {
            $this->connections[$key] = $this->createConnection(
                $this->config[$module]['host'], 
                $this->config[$module]['dbname'], 
                $this->config[$module]['user'], 
                $this->config[$module]['password']
            );
        }
        return $this->connections[$key];
    }
    
    public function setConfig($config)
    {
        $this->config = $config;
    }

    private function createConnection($host, $dbname, $user, $pwd)
    {
        for ($i = self::RETRY_TIMES; $i > 0; $i--) {
            try {
                $pdo = new \PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pwd);
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (\Exception $e) {
                continue;
            }
        }
        throw $e;
    }
}