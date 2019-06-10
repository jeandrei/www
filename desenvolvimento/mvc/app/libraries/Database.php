<?php
/*
PDO exemplo
                CONEXÃO
primeiro precisamos criar um dsn (Database Source Name).
que é um texto com os dados do banco de dados
$host = 'localhost';
$user = 'root';
$password = '123456';
$dbname = 'database';

Set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

Agora cria uma instância PDO
$pdo = new($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

                QUERY
$status = 'admin';
$sql = 'SELECT * FROM users WHERE status = :status';
$stmt = $pdo->prepare($sql);
$stmt->execut(['status' => $status]);
$users = stmt->fechAll(); *mais de um resultado*
foreach($users as user){
    echo $user['name'] . '<br>';
}

se quiser trazer como objeto para imprimir
echo $user->name ao invés de  echo $user['name']
Na linha após a criação do objeto pdo adicionamos
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
assim podemos imprimir como objeto exemplo
foreach($users as user){
    echo $user->name . '<br>';
}


                INSERT
$name = 'Karen Williams';
$email = 'kwills@gmail.com';
$status = 'guest';

$sql = 'INSERT INTO users(name, email, status) VALUES (:name, :email, :status)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $name, 'email' => $email, 'status' => $status]);
echo 'Added User';



*/

/*
* PDO Database Class
* Connect to database
* Create prepare statements
* Bind values
* Return rows and results
*/

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; //database handler
    private $stmt; // statement
    private $error;

    public function __construct(){
        //Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}


?>