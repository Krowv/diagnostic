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

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string $category_name
     */
    public function setCategoryName(string $category_name): void
    {
        $this->category_name = $category_name;
    }

    /**
     * @param int $id_axis
     */
    public function setIdAxis(int $id_axis): void
    {
        $this->id_axis = $id_axis;
    }

    public function getCategoryNames(){
        $query = $this->db->prepare('SELECT * FROM category');
        $query->execute();
        return $query->fetchAll();
    }

    public function selectCategoryByAxis(){
        $query = $this->db->prepare("SELECT * FROM category WHERE id_axis = ?");
        $query->bindValue(1, $this->id_axis);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCategoryByAxisName($name_axis){
        $query = $this->db->prepare("SELECT * FROM category c
                                            INNER JOIN axis a 
                                            ON a.id = c.id_axis
                                            WHERE a.axis_name LIKE ?");
        $query->bindValue(1, "%$name_axis%");
        $query->execute();
        return $query->fetchAll();
    }


}