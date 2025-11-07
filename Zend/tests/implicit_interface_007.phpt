--TEST--
Implicit interface with multiple methods
--FILE--
<?php

implicit interface Repository {
    public function save(object $entity): void;
    public function find(int $id): ?object;
    public function delete(int $id): bool;
}

class UserRepository {
    public function save(object $entity): void {
        echo "Saving...\n";
    }

    public function find(int $id): ?object {
        return null;
    }

    public function delete(int $id): bool {
        return true;
    }
}

class IncompleteRepository {
    public function save(object $entity): void {
        echo "Saving...\n";
    }
    // Missing find and delete methods
}

$complete = new UserRepository();
$incomplete = new IncompleteRepository();

var_dump($complete instanceof Repository);
var_dump($incomplete instanceof Repository);

?>
--EXPECT--
bool(true)
bool(false)
