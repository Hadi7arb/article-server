<?php 
abstract class Model{

    protected static string $table;
    protected static string $primary_key = "id";

    public static function find(mysqli $mysqli, int $id){
        $sql = sprintf("Select * from %s WHERE %s = ?", 
                        static::$table, 
                        static::$primary_key);
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli){
        $sql = sprintf("Select * from %s", static::$table);
        
        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()){
            $objects[] = new static($row); 
        }

        return $objects; 
    }

    public static function create(array $data): ?static {
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), "?"));
    $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", static::$table, $columns, $placeholders);

    $stmt = static::$connection->prepare($sql);
    
    $types = str_repeat("s", count($data)); // 
    $query->bind_param($types, ...array_values($data));
    $query->execute();

    if ($query->affected_rows > 0) {
        $id = static::$connection->insert_id;
        return static::find(static::$connection, $id);
    }

    return null;
    }

    public function update(): bool {
    $props = get_object_vars($this);
    unset($props[static::$primary_key]); 

    $setClause = implode(", ", array_map(fn($col) => "$col = ?", array_keys($props)));
    $sql = sprintf("UPDATE %s SET %s WHERE %s = ?", static::$table, $setClause, static::$primary_key);

    $query = static::$connection->prepare($sql);

    $types = str_repeat("s", count($props)) . "i";
    $params = array_merge(array_values($props), [$this->{static::$primary_key}]);

    $stmt->bind_param($types, ...$params);
    return $query->execute();
    }


    public static function delete(int $id) {

    $sql = sprintf("DELETE FROM %s WHERE %s = ?", static::$table, static::$primary_key);
    $query = static::$connection->prepare($sql);

    $query->bind_param("i", $id);
    return $stmt->execute();
    }
    public static function getByCategoryId(mysqli $mysqli, int $categoryId): array {
        $sql = sprintf("SELECT * FROM %s WHERE category_id = ?", static::$table);
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();

        $result = $stmt->get_result();
        $objects = [];
        while ($row = $result->fetch_assoc()) {
            $objects[] = new static($row);
        }
        return $objects;
    }
    

}



