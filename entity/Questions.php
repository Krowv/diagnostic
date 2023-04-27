<?php

class Questions extends Databaseconnexion
{
    private int $id;
    private string $content;
    private string $created_at;
    private string $updated_at;
    private int $id_category;
    public PDO $db;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
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
     * @return int
     */
    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
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
     * @param int $id_category
     */
    public function setIdCategory(int $id_category): void
    {
        $this->id_category = $id_category;
    }

    public function getQuestions(){
        $questions = $this->db->prepare("SELECT * FROM questions");
        $questions->execute();
        return $questions->fetchAll();
    }

    public function getQuestionsForCompetences(){
        $questions = $this->db->prepare("SELECT distinct q.*
                                                FROM questions q
                                                INNER JOIN category c
                                                ON c.id = q.id_category
                                                INNER JOIN axis a 
                                                ON a.id = c.id_axis
                                                WHERE c.id_axis = 1");
        $questions->execute();
        return $questions->fetchAll();
    }

    public function getQuestionFromCategoryWithIdAxis($id_axis){
        $questions = $this->db->prepare("SELECT distinct q.*
                                                FROM questions q
                                                INNER JOIN category c
                                                ON c.id = q.id_category
                                                INNER JOIN axis a 
                                                ON a.id = c.id_axis
                                                WHERE c.id_axis = ? AND q.id_category = ?");
        $questions->bindValue(1, $id_axis);
        $questions->bindValue(2, $this->id_category);
        $questions->execute();
        return $questions->fetchAll();
    }

    public function getQuestionsFromCategory($category_name){
        $questions = $this->db->prepare("SELECT q.* 
                                                FROM questions q 
                                                INNER JOIN category c 
                                                ON c.id = q.id_category
                                                WHERE c.category_name LIKE ?");
        $questions->bindValue(1, "%$category_name%");
        $questions->execute();
        return $questions->fetchAll();
    }

    public function getQuestionsForReactivite(){
        $questions = $this->db->prepare("SELECT distinct q.*
                                                FROM questions q
                                                INNER JOIN category c
                                                ON c.id = q.id_category
                                                INNER JOIN axis a 
                                                ON a.id = c.id_axis
                                                WHERE c.id_axis = 2");
        $questions->execute();
        return $questions->fetchAll();
    }

    public function getQuestionsForNumerique(){
        $questions = $this->db->prepare("SELECT distinct q.*
                                                FROM questions q
                                                INNER JOIN category c
                                                ON c.id = q.id_category
                                                INNER JOIN axis a 
                                                ON a.id = c.id_axis
                                                WHERE c.id_axis = 3");
        $questions->execute();
        return $questions->fetchAll();
    }

    public function countQuestionsByCategory(){
        $query = $this->db->prepare("SELECT * FROM questions where id_category = ?");
        $query->bindValue(1, $this->id_category);
        $query->execute();
        $query = $query->fetchAll();
        return count($query);
    }

    public function selectCategoryFromQuestion(){
        $query = $this->db->prepare("SELECT category_name FROM category WHERE id = ?");
        $query->bindValue(1, $this->id_category);
        $query->execute();
        $category_name = $query->fetch();
        return $category_name['category_name'];
    }
}