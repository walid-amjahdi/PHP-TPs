<?php
class PropertyTest
{
    private array $data = [];
    public int $declared = 1;
    private int $hidden = 2;

    public function __set(string $name, mixed $value): void
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get(string $name): mixed
    {
        echo "Getting '$name'\n";
        return $this->data[$name] ?? null;
    }
}

$obj = new PropertyTest();
$obj->a = 1;
echo $obj->a . PHP_EOL;
