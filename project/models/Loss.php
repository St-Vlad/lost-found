<?php

namespace Project\Models;

use Core\Model;

class Loss
{
    private $userId;
    private $title;
    private $additionalInfo;
    private $placeOfLose;
    private $reward;
    private $image;

    public function __construct($title, $additionalInfo, $reward, $placeOfLose, $image)
    {
        $this->title = $title;
        $this->additionalInfo = $additionalInfo;
        $this->placeOfLose = $placeOfLose;
        $this->reward = $reward;
        $this->image = $image;
        $this->userId = $_SESSION['user_id'];
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param string $additionalInfo
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * @return string
     */
    public function getPlaceOfLose()
    {
        return $this->placeOfLose;
    }

    /**
     * @param string $placeOfLose
     */
    public function setPlaceOfLose($placeOfLose)
    {
        $this->placeOfLose = $placeOfLose;
    }

    /**
     * @return int
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * @param int $reward
     */
    public function setReward($reward)
    {
        $this->reward = $reward;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


}