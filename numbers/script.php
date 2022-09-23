<?php
interface INumbers
{
    public function add(int $number): void;
    public function remove(int $number): void;
    public function clear(): void;
    public function count(int $number = null): int;
    public function exists(int $number): bool;
    public function toStr(string $sep = " - "): string;
}

$data = [];
class NumbersSimple implements INumbers{
    public function __construct()
    {
      $this->clear();
    }

    public function add(int $number): void
    {
        $this->data[] = $number;
    }

    public function remove(int $number): void
    {

    }

    public function clear(): void
    {

    } 

    public function count(int $number = null): int
    {
        if(!$number){
          return count($this->data);
        }
    }

    public function exists(int $number): bool
    {
        foreach ($this->data as $val){
          if ($val == $number){
            return true;
          }
        }
    }

    public function toStr(string $sep = " - "): string
    {

    }
}


?>