<?php

class Grid extends Database
{
    private int $id;
    private int $id_user;
    private string $grid_number;
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
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
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
    public function getGridNumber(): string
    {
        return $this->grid_number;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
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
     * @param string $grid_number
     */
    public function setGridNumber(string $grid_number): void
    {
        $this->grid_number = $grid_number;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getAllGrid(){
        $query = $this->db->prepare("SELECT * FROM grid");
        $query->execute();
        return $query->fetchAll();
    }

    public function insert_form(Array $array_of_value, $grid_number, string $companie_name): void
    {
        $query = $this->db->prepare("INSERT INTO grid(companie_name, grid_number) VALUES(?,?)");
        $query->bindValue(1, $companie_name);
        $query->bindValue(2, $grid_number);
        $query->execute();

        $grid_id = $this->db->lastInsertId();
        foreach (array_keys($array_of_value) as $items) {
            if ($items != "send_form" && $items != "companie_name"){
                $query = $this->db->prepare("INSERT INTO grid_answer(id_grid, id_answer) VALUES (?,?)");
                $query->bindValue(1, $grid_id);
                $query->bindValue(2, $_POST[$items]);
                $query->execute();
            }
        }
        /*$query = $this->db->prepare('INSERT INTO grid(grid_number) VALUES(?)');
        $query->bindValue(1, "000001");
        $query->execute();*/

    }

    public function searchLastGridNumber(){
        $query = $this->db->prepare("SELECT grid_number FROM grid ORDER BY grid_number DESC LIMIT 1");
        $query->execute();
        $query = $query->fetch();
        return $query['grid_number'];
    }

    public function getGridById(){
        $query = $this->db->prepare("SELECT companie_name FROM grid WHERE ID = ?");
        $query->bindValue(1, $this->getId());
        $query->execute();
        $query = $query->fetch();
        return $query['companie_name'];
    }

}