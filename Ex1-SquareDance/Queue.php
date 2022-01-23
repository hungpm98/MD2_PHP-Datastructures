<?php
include_once 'Dance.php';

class Queue
{
    public $male;
    public $female;

    const MALE = 'MALE';
    const FEMALE = 'FEMALE';

    public function __construct()
    {
        $this->male = new SplQueue();
        $this->female = new SplQueue();
    }

    public function addGender($gender)
    {

        if ($gender->gender === 'MALE') {
            $this->male->enqueue($gender);
        } else {
            $this->female->enqueue($gender);
        }
    }

    public function pairDance()
    {
        while (!$this->male->isEmpty() || !$this->female->isEmpty()) {
            if ($this->male->isEmpty()) {
                return  count($this->female). ' Đang đợi bạn Nữ';
            }
            if ($this->female->isEmpty()) {
                return count($this->male). ' Đang đợi bạn Nam';
            }
            echo 'Cặp ' . $this->male->dequeue()->getName() . ' và ' . $this->female->dequeue()->getName() . "<br>";
        }
        echo 'Đã hết cặp';

    }
}

$people = new Dance('A','MALE');
$people1 = new Dance('B','MALE');
$people2 = new Dance('C','MALE');
$people3 = new Dance('D','FEMALE');
$people4 = new Dance('E','FEMALE');
$people5 = new Dance('F','FEMALE');
$people6 = new Dance('G','FEMALE');

$peoples = new Queue();
$peoples->addGender($people);
$peoples->addGender($people1);
$peoples->addGender($people2);
$peoples->addGender($people3);
$peoples->addGender($people4);
$peoples->addGender($people5);
$peoples->addGender($people6);

print_r($peoples->pairDance());
