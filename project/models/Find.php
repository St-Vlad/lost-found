<?php

namespace Project\Models;

use Core\Model;

class Find extends Model
{
    private $userId;
    private $title;
    private $additionalInfo;
    private $placeOfFind;
    private $file;

    public function __construct($title, $additionalInfo, $placeOfFind, $file)
    {
        parent::__construct();
        $this->title = $title;
        $this->additionalInfo = $additionalInfo;
        $this->placeOfFind = $placeOfFind;
        $this->file = $file;
        $this->userId = $_SESSION['user_id'];
    }

    public function addFind(){
        $obj = parent::$pdo->prepare("INSERT INTO `finds`(`title`, `additional_info`, `place_of_find`, `user_id`, `image`) 
                                                VALUES (:title, :additionalInfo, :placeOfFind, :user_id, :image)");
        $obj->execute([':title' => $this->title, ':additionalInfo' => $this->additionalInfo, ':placeOfFind' => $this->placeOfFind,
            'user_id' => $this->userId,':image' => $this->file]);
        return true;
    }
}