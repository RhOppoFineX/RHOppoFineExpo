<?php
/**
*   Clase para realizar las operaciones en la base de datos.
*/
class Database
{
/**
*   Propiedades de la clase para manejar los datos necesarios al realizar las acciones respectivas.
*/
    private static $connection = null;
    private static $statement = null;
    private static $id = null;

/**
*   Método para establecer la conexión a la base de datos con manejo de excepciones del servidor.
*/
    private function connect()
    {
        // Credenciales para establecer la conexión con la base de datos.
        $server = 'localhost';
        $database = 'recursoshumanos';
        $username = 'root';
        $password = 'root123';
        try {
            @self::$connection = new PDO('mysql:host='.$server.'; dbname='.$database.'; charset=utf8', $username, $password);
        } catch(PDOException $error) {
            exit(self::getException($error->getCode(), $error->getMessage()));
        }
    }

/**
*   Método para anular la conexión con la base de datos y capturar la información de las excepciones en las sentencias SQL.
*/
    private function desconnect()
    {
        self::$connection = null;
        $error = self::$statement->errorInfo();
        if ($error[0] != '00000') {
            exit(self::getException($error[1], $error[2]));
        }
    }

/**
*   Método para ejecutar las siguientes sentencias SQL: insert, update y delete.
*   Se utiliza además para obtener el valor de la llave primaria del último registro insertado.
*
*   @return boolean true si la sentencia se ejecuta satisfactoriamente y false en caso contrario.
*
*   @param string $query sentencia SQL
*   @param array $values conjunto de valores
*/
    public static function executeRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        $state = self::$statement->execute($values);
        self::$id = self::$connection->lastInsertId();
        self::desconnect();
        return $state;
    }

/**
*   Método para obtener el resultado del primer registro de una sentencia SQL tipo SELECT.
*
*   @return array asociativo del registro si la sentencia SQL se ejecuta satisfactoriamente o null en caso contrario.
*
*   @param string $query sentencia SQL
*   @param array $values conjunto de valores
*/
    public static function getRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetch(PDO::FETCH_ASSOC);
    }

/**
*   Método para obtener todos los registros de una sentencia SQL tipo SELECT.
*
*   @return array asociativo de los registros si la sentencia SQL se ejecuta satisfactoriamente o null en caso contrario.
*
*   @param string $query sentencia SQL
*   @param array $values conjunto de valores
*/
    public static function getRows($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetchAll(PDO::FETCH_ASSOC);
    }

/**
*   Método para obtener el valor de la llave primaria del último registro insertado.
*
*   @return int si la sentencia SQL ha sido un insert o 0 en caso contrario.
*/
    public static function getLastRowId()
    {
        return self::$id;
    }

/**
*   Método para obtener el mensaje de error al ocurrir una excepción en las sentencias SQL.
*
*   @return string con el error personalizado a mostrar.
*
*   @param int $code código especifico del error.
*   @param string $message mensaje especifico del error.
*/
    private static function getException($code, $message)
    {
        switch ($code) {
            case 1045:
                $message = 'Autenticación desconocida';
                break;
            case 1049:
                $message = 'Base de datos desconocida';
                break;
            case 1054:
                $message = 'Nombre de campo desconocido';
                break;
            case 1062:
                $message = 'Dato duplicado, no se puede guardar';
                break;
            case 1146:
                $message = 'Nombre de tabla desconocido';
                break;
            case 1451:
                $message = 'Registro ocupado, no se puede eliminar';
                break;
            case 2002:
                $message = 'Servidor desconocido';
                break;
            default:
                $message = 'Ocurrió un problema, contacte al administrador :(';
        }
        return $message;
    }
}
?>
