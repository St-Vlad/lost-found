<?php

namespace Project\Models;

use Core\Model;

class AdminFind extends Model
{
    public function getAllFinds(){
        $stmt = parent::$pdo->query("SELECT `find_id`, `user_id`, `title`, `additional_info`, `place_of_find`, 
                                    `post_date`, `approved`, `image` FROM `finds`");
        $result = [];
        $i = 0;
        while($row = $stmt->fetch()){
            $result[$i]['find_id'] = $row['find_id'];
            $result[$i]['user_id'] = $row['user_id'];
            $result[$i]['title'] = $row['title'];
            $result[$i]['additional_info'] = $row['additional_info'];
            $result[$i]['place_of_find'] = $row['place_of_find'];
            $result[$i]['post_date'] = $row['post_date'];
            $result[$i]['approved'] = $row['approved'];
            $result[$i]['image'] = base64_encode($row['image']);
            $i++;
        }
        return $result;
    }

    public function getFindById($id)
    {
        $stmt = parent::$pdo->prepare("SELECT `find_id`, `user_id`, `title`, `additional_info`, `place_of_find`, 
                                    `post_date`, `approved`, `image` FROM `finds` WHERE `finds`.`find_id` = :find_id");
        $stmt->execute([':find_id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function deleteFindById($id){
        $stmt = parent::$pdo->prepare("DELETE FROM `finds` WHERE `finds`.`find_id` = :find_id");
        $stmt->execute([':find_id' => $id]);
        header("Location: /admin/finds");
    }
}