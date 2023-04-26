<?php

class Category extends DatabaseConnexion
{
    private int $id;
    private string $category_name;
    private string $created_at;
    private string $updated_at;
    private int $id_axis;

    public function __construct()
    {
        parent::__construct();
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->category_name;
    }

    /**
     * @return int
     */
    public function getIdAxis(): int
    {
        return $this->id_axis;
    }

    public function getCategoryNames(){
        $query = $this->db->prepare('SELECT * FROM category');
        $query->execute();
        return $query->fetchAll();
    }


}