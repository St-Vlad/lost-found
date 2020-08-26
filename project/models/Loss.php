<?php

namespace Project\Models;

use Core\Model;

class Loss extends Model
{
    private $userId;
    private $title;
    private $additionalInfo;
    private $placeOfLose;
    private $reward;
    private $file;

    public function __construct($title, $additionalInfo, $reward, $placeOfLose, $file)
    {
        parent::__construct();
        $this->title = $title;
        $this->additionalInfo = $additionalInfo;
        $this->placeOfLose = $placeOfLose;
        $this->reward = $reward;
        $this->file = $file;
        $this->userId = $_SESSION['user_id'];
    }

    public function addLoss(){
        $obj = parent::$pdo->prepare("INSERT INTO `losses`(`title`, `additional_info`, `place_of_lose`, `reward`, `user_id`, `image`) 
                                                VALUES (:title, :additionalInfo, :placeOfLose, :reward, :user_id, :image)");
        $obj->execute([':title' => $this->title, ':additionalInfo' => $this->additionalInfo, ':placeOfLose' => $this->placeOfLose,
           ':reward' => $this->reward, 'user_id' => $this->userId,':image' => $this->file]);
        return true;
    }
}