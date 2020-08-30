<?php

namespace Project\Models;

use Core\Model;

class Find
{
    private $userId;
    private $title;
    private $additionalInfo;
    private $placeOfFind;
    private $image;

    public function __construct($title, $additionalInfo, $placeOfFind, $image = null)
    {
        $this->title = $title;
        $this->additionalInfo = $additionalInfo;
        $this->placeOfFind = $placeOfFind;
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
    public function getPlaceOfFind()
    {
        return $this->placeOfFind;
    }

    /**
     * @param string $placeOfFind
     */
    public function setPlaceOfFind($placeOfFind)
    {
        $this->placeOfFind = $placeOfFind;
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