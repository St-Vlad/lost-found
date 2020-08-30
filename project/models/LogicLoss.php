<?php

namespace Project\Models;

use Core\Model;

class LogicLoss extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addLoss(Loss $loss){
        $obj = parent::$pdo->prepare("INSERT INTO `losses`(`title`, `additional_info`, `place_of_lose`, 
                                                `reward`, `user_id`, `image`) 
                                                VALUES (:title, :additionalInfo, :placeOfLose, 
                                                :reward, :user_id, :image)");
        $obj->execute([':title' => $loss->getTitle(),
                       ':additionalInfo' => $loss->getAdditionalInfo(),
                       ':placeOfLose' => $loss->getPlaceOfLose(),
                       ':reward' => $loss->getReward(),
                       'user_id' => $loss->getUserId(),
                       ':image' => $loss->getImage()]);
        return true;
    }
}