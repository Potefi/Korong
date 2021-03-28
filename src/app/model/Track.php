<?php


namespace app\model;


use db\Database;

class Track
{
    private $productId;
    private $numberOfTrack;
    private $title;
    private $length;

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }
    /**
     * @param mixed $productId
     */
    public function setProductId($productId): void
    {
        $this->productId = $productId;
    }
    /**
     * @return mixed
     */
    public function getNumberOfTrack()
    {
        return $this->numberOfTrack;
    }
    /**
     * @param mixed $numberOfTrack
     */
    public function setNumberOfTrack($numberOfTrack): void
    {
        $this->numberOfTrack = $numberOfTrack;
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }
    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }
    /**
     * @param mixed $length
     */
    public function setLength($length): void
    {
        $this->length = $length;
    }
}