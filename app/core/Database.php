
<?php

trait Database
{
    private function connect()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            return new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            $msg = $e->getMessage(); 
            error_log($msg);
            return false;
        }
    }

    public function query($query, $data = [])
    {
        $connection = $this->connect();
        if (!$connection) {
            return false;
        }

        try {
            $stmt = $connection->prepare($query);
            $stmt->execute($data);
            $rows = $stmt->fetchAll();
            return $rows ?: [];
        } catch (PDOException $e) {
            return false;
        }
    }
}