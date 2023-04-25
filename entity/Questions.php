<?php

class Questions extends Databaseconnexion
{
    private int $id;
    private string $content;
    private string $created_at;
    private string $updated_at;
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

    public function getQuestions(){
        $questions = $this->db->prepare("SELECT * FROM questions");
        $questions->execute();
        return $questions->fetchAll();
    }

    public function getQuestionsForCompetences(){
        $questions = $this->db->prepare("SELECT * FROM questions WHERE id_category = 1");
        $questions->execute();
        return $questions->fetchAll();
    }

    public function getQuestionsForReactivite(){
        $questions = $this->db->prepare("SELECT * FROM questions WHERE id_category = 2");
        $questions->execute();
        return $questions->fetchAll();
    }

    public function getQuestionsForNumerique(){
        $questions = $this->db->prepare("SELECT * FROM questions WHERE id_category = 3");
        $questions->execute();
        return $questions->fetchAll();
    }
}