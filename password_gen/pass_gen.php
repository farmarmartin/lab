<?php
class Password
{
    public $password, $mixed;

    public function __construct()
    {
        $this->password = '';
        $this->mixed = '';

    }

    public function generate($lenght, ...$data){ // první parametr je délka hesla a poté už libovolné stringy znaků.

        for($i = 0; $i < $lenght; $i++){
            if($i < count($data)){
                $this->password .= $data[$i][rand(0, strlen($data[$i]) - 1)];
                $this->mixed .= $data[$i];
            }
            else{
                $this->password .= $this->mixed[rand(1, strlen($this->mixed) - 1)];
            }
        }
        str_shuffle($this->password);
        return $this;
    }
}

$small_letters = implode(range("a", "z"));
$big_letters = implode(range("A", "Z"));
$numbers = implode(range(0, 9));
$special_chars = "%$><*!()[]{}";

$pass = (new Password)->generate(9, $small_letters, $big_letters, $special_chars);
var_dump($pass->password);


class passworTest extends Password{
    public $testedPassword;
    public function __construct($lenght, $small_letters, $big_letters, $numbers, $special_chars){
        $this->testedPassword = (new Password)->generate()
    }
}