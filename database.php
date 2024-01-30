<?php

class Database
{
    private $conn;

    public function __construct($host, $port, $dbname, $user, $password)
    {
        $conn_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
        $this->conn = pg_connect($conn_string);

        if (!$this->conn) {
            die("Connection failed: " . pg_last_error());
        }
    }

    public function getAllUsers()
    {
        $result = pg_query($this->conn, "SELECT * FROM employees");
        $employees = array();
    
        while ($row = pg_fetch_assoc($result)) {
            $employees[] = $row;
        }
    
        return $employees;
    }
    

    public function createUser($name, $email)
    {
        $query = "INSERT INTO employees (name, email) VALUES ('$name', '$email')";
        $result = pg_query($this->conn, $query);

        return $result ? "Record created successfully" : "Error creating record: " . pg_last_error($this->conn);
    }

    public function updateUser($id, $newName, $newEmail)
    {
        $query = "UPDATE employees SET name='$newName', email='$newEmail' WHERE id=$id";
        $result = pg_query($this->conn, $query);

        return $result ? "Record updated successfully" : "Error updating record: " . pg_last_error($this->conn);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM employees WHERE id=$id";
        $result = pg_query($this->conn, $query);

        return $result ? "Record deleted successfully" : "Error deleting record: " . pg_last_error($this->conn);
    }

    public function closeConnection()
    {
        pg_close($this->conn);
    }
}
?>
