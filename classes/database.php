<?php

const SETTINGS = [
    "db" => [
        "user" => "ID328350_more4help",
        "password" => "more4help", 
        "host" => "ID328350_more4help.db.webhosting.be", #ID328350_more4help.db.webhosting.be
        "dbname" => "ID328350_more4help"
    ]
];

class DB
{
    private static $_instance = null;
    private $_pdo;
    private $_query;
    private $_error = false;
    private $_results;
    private $_count = 0;

    private function __construct()
    { #conn met database
        try {
            $this->_pdo = new PDO('mysql:host=' . SETTINGS['db']['host'] . ';dbname=' . SETTINGS['db']['dbname'], SETTINGS['db']['user'], SETTINGS['db']['password']);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = array())
    {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) { # kijkt of er iets bij is gekomen
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            # Als query opgeslagen -> executen
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ); # we gebruiken dit om de waarde van de kolom te gebruiken.
                $this->_count = $this->_query->rowCount(); 
            }else {
                $this->_error = true; 
             }
        }

        return $this;
    }

    private function action($action, $table, $where = array()) {
        if (count($where) === 3) { #field operator and value
            $operators = array('=', '<','>','>=','<=');
    
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];
    
            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                
                if (!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }
    #dit is een short cut om het bovenste makkelijker te maken om niet telkens $action te schrijven
    public function get($table, $where) {
        return $this->action('SELECT *',$table, $where); #pak alles wat de tabel gebruikt 
    }
    #Hetzelfde als bij select alleen met delete
    public function delete($table, $where) {
        return $this->action('SELECT *',$table, $where);
    }

    public function error() {
        return $this->_error;
    }

    public function count() {
        return $this->_count;
    }

    // # insert informatie naar database
    public function insert($table, $fields = array()) {
        $keys = array_keys($fields);
        $values = null;
        $x = 1;
        # vraagteken = string
        foreach($fields as $field) {
            $values .= "?";
            #zodat er kommas zijn bij elke vraagteken
            if($x < count($fields)) {
                $values .= ', ';
            }
            $x++;
        };

        #student verandert naar {$table}
        $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

        if($this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }
    // # update info in database
    // public function update($table, $id, $fields) {
    //     $set = '';
    //     $x = 1;

    //     #UITKOMST ALS JE ga TESTen MOET ZIJN: password = ?
    //     foreach($fields as $name => $value) {
    //         $set .= "{$name} = ?";
    //         if($x < count($fields)) {
    //               $set .= ', ';
    //         }
    //         $x++;
    //     }

    //     $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

    //     if(!$this->query($sql, $fields)->error()) {
    //         return true;
    //     }

    //     return false;

    // }

    public function results()
    {
        return $this->_results;
    }

    public function First()
    {
        return $this->results()[0];
    }
}