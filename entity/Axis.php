<?php

class Axis extends DatabaseConnexion
{
    private int $id;
    private string $axis_name;
    private string $created_at;
    private string $updated_at;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAxisName(): string
    {
        return $this->axis_name;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param string $axis_name
     */
    public function setAxisName(string $axis_name): void
    {
        $this->axis_name = $axis_name;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAllAxis(): Array
    {
        $query = $this->db->prepare("SELECT * FROM axis");
        $query->execute();
        return $query->fetchAll();
    }

}