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

$pass = (new Password)->generate(13, $small_letters, $big_letters, $special_chars, $numbers);
$pass2 = (new Password)->generate(13, $small_letters, $special_chars);



class passwordTest
{
    public $testedPassword;
    public function __construct()
    {
        $this->testedPassword = '';
    }
    public function setPassword(string $password): passwordTest
    {
        $this->testedPassword = $password;
        return $this;
    }

    public static function lenghtTest(string $password): bool
    {
        if (strlen($password) < 14) {
            echo "lenght test: failed";
            return false;
        } else {
            echo "lenght test: ok";
            return true;
        }
    }

    public static function complexityTest(string $password, string...$parameters)
    {

        for ($i = 0; $i < strlen($password); $i++) {
            for ($x = 0; $x < strlen($parameters[$x]); $x++){

                if (str_contains($parameters[$i], $password[$i])) {
                    //echo $i.". Run: $password[$i]\n";
    
                    }
    
                }
            }

        }
    }
}
passwordTest::complexityTest($pass2->password, $small_letters, $big_letters, $numbers, $special_chars);