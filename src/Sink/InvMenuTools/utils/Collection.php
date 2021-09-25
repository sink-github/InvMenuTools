<?php

namespace Sink\InvMenuTools\utils;

class Collection {

    protected array $data = [];

    public function getAll(): array{
        return $this->data;
    }

    public function exists($id): bool{
        return isset($this->data[$id]);
    }

    public function get($id, mixed $default = []){
        return $this->data[$id] ?? $default;
    }

    public function set($id, $value): void{
        $this->data[$id] = $value;
    }

    public function remove($id): void{
        if($this->exists($id)){
            unset($this->data[$id]);
        }
    }

}