<?php

class Answers extends DatabaseConnexion
{

    private int $id;
    private string $contentAnswer;
    private int $note;
    private string $created_at;
    private string $updated_at;
    private int $idQuestion;

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
    public function getContentAnswer(): string
    {
        return $this->contentAnswer;
    }

    /**
     * @return int
     */
    public function getIdQuestion(): int
    {
        return $this->idQuestion;
    }

    /**
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
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
     * @param string $contentAnswer
     */
    public function setContentAnswer(string $contentAnswer): void
    {
        $this->contentAnswer = $contentAnswer;
    }

    /**
     * @param int $idQuestion
     */
    public function setIdQuestion(int $idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }

    /**
     * @param int $note
     */
    public function setNote(int $note): void
    {
        $this->note = $note;
    }

    public function getAnswerForQuestions(){
        $answers = $this->db->prepare("SELECT * FROM answer WHERE id_question = ?");
        $answers->bindValue(1, $this->idQuestion);
        $answers->execute();
        return $answers->fetchAll();
    }

    public function getAnswerForCategoryName($category_name){
        $query = $this->db->prepare("SELECT a.* FROM answer a 
                                            INNER JOIN questions q 
                                            ON q.id = a.id_question
                                            INNER JOIN category c
                                            ON c.id = q.id_category
                                            WHERE c.category_name LIKE ?");
        $query->bindValue(1, "%$category_name%");
        $query->execute();
        return $query->fetchAll();
    }

    public function selectAnswerFromQuestionForGrid(){
        $query = $this->db->prepare("SELECT a.* 
                                            FROM answer a
                                            INNER JOIN grid_answer ga
                                            ON ga.id_answer = a.id
                                            WHERE a.id_question = ?");
        $query->bindValue(1, $this->getIdQuestion());
        $query->execute();
        return $query->fetch();
    }

    public function getAnswerScoreForOneAxis($id_axis){
        $query = $this->db->prepare("SELECT SUM(a.note) as total_score
                                            FROM answer a 
                                            INNER JOIN grid_answer ga
                                            ON ga.id_answer = a.id
                                            INNER JOIN questions q
                                            ON q.id = a.id_question
                                            INNER JOIN category c
                                            ON c.id = q.id_category
                                            WHERE ga.id_grid = ? AND c.id_axis = ?");
        $query->bindValue(1, $_GET['id']);
        $query->bindValue(2, $id_axis);
        $query->execute();
        return $query->fetch();
    }
}