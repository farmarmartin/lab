<?php
class Password
{
    public $password, $mixed;

    public function __construct()
    {
        $this->password = '';
        $this->mixed = '';
    }

    public function generate($lenght, ...$data){                                    // první parametr je délka hesla a poté už libovolné stringy znaků
        for($i = 0; $i < $lenght; $i++){          
            if($i < count($data)){                                                  //připojování znaků do stringu, dokud nevytvoří heslo požadované délky
                $this->password .= $data[$i][rand(0, strlen($data[$i]) - 1)];
                $this->mixed .= $data[$i];
            }
            else{
                $this->password .= $this->mixed[rand(1, strlen($this->mixed) - 1)];
            }
        }
        str_shuffle($this->password);       //zamíchání hesla aby se předešlo předvídatelnosti
        return $this;
    }
}


class passwordTest
{
    public $testedPassword, $complexityPoints, $small_letters, $big_letters, $numbers, $special_chars;
    public function __construct()
    {
        $this->testedPassword = '';
        $this->complexityPoints = 0;
        $this->small_letters = implode(range("a", "z"));
        $this->big_letters = implode(range("A", "Z"));
        $this->numbers = implode(range(0, 9));
        $this->special_chars = "%$><*!()[]{}";
    }
    public function setPassword(string $password): passwordTest
    {
        $this->testedPassword = $password;
        return $this;
    }

    public function lenghtTest(): bool          //funkce checkne jestli je heslo dostatečně dlouhé
    {
        if (strlen($this->testedPassword) < 8) { //8 znaků se považuje jako minimum pro "bezpečné" heslo
            echo "lenght test: failed\n";
            return false;
        } else {
            echo "lenght test: ok\n";
            return true;
        }
    }

    public function containNum(): passwordTest      //checkuje jestli je v heslu číslo
    {
        for($i = 0; $i < strlen($this->testedPassword) - 1; $i++){
            if(str_contains($this->numbers, $this->testedPassword[$i])){
                $this->complexityPoints++;
                echo "  NUMBERS: OK\n";
                break;
            }
        }
        return $this;
    }

    public function containUppercase(): passwordTest       //checkuje velká písmena
    {
        for($i = 0; $i < strlen($this->testedPassword) - 1; $i++){
            if(str_contains($this->big_letters, $this->testedPassword[$i])){
                $this->complexityPoints++;
                echo "UPPERCASE: OK\n";
                break;
            }
        }
        return $this;
    }

    public function containLowercase(): passwordTest    //checkuje malá písmena
    {
        for($i = 0; $i < strlen($this->testedPassword) - 1; $i++){
            if(str_contains($this->small_letters, $this->testedPassword[$i])){
                $this->complexityPoints++;
                echo "LOWERCASE: OK\n";
                break;
            }
        }
        return $this;
    }

    public function containSpecChars(): passwordTest    //checkuje speciální znaky
    {
        for($i = 0; $i < strlen($this->testedPassword) - 1; $i++){
            if(str_contains($this->special_chars, $this->testedPassword[$i])){
                $this->complexityPoints++;
                echo "CHARS: OK\n";
                break;
            }
        }
        return $this;
    }
    public function result(): passwordTest
    {
        if($this->lenghtTest()){
            switch($this->complexityPoints){
                case 1:
                    echo "Heslo není použitelné.\n";
                    break;
                case 2:
                    echo "Heslo není dostatečně komplexní.\n";
                    break;
                case 3:
                    echo "Heslo už se dá použít.\n";
                    break;
                case 4:
                    echo "Heslo je bezpečné.\n";
                    break;
            }
        }
        return $this;
    }
}

/**UKÁZKA 
 * ZDE
 */

$small_letters = implode(range("a", "z"));  //vytvoření vstupních stringů
$big_letters = implode(range("A", "Z"));
$numbers = implode(range(0, 9));
$special_chars = "%$><*!()[]{}"; //je jich víc, akorát jsem moc línej je hledat

$dumbestPass = (new Password)->generate(10, $small_letters);
$dumbPass = (new Password)->generate(10, $small_letters, $big_letters);
$averagePass = (new Password)->generate(10, $small_letters, $big_letters, $numbers);
$gigaExcelentPass = (new Password)->generate(10, $small_letters, $big_letters, $numbers, $special_chars);



$test = (new passwordTest)->setPassword($averagePass->password)->containLowercase()->containUppercase()->containNum()->containSpecChars()->result();