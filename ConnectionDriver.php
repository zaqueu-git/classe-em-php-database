<?php
class ConnectionDriver
{
    private $dbServer;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public function __construct(string $dbServer, string $dbName, string $dbUser, string $dbPassword)
    {
        $this->dbServer = $dbServer;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
    }

    public function connectMySQL()
    {
        $dsn = 'mysql:dbname='. $this->dbName .';host=' . $this->dbServer;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ];

        return new PDO($dsn,$this->dbUser,$this->dbPassword, $options);
    }
}

