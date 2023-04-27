<?php
$title = "Page d'accueil";
include("component/header.php");
include("entity/Database.php");
include ("entity/Questions.php");
include ("entity/Answers.php");
include ("entity/Category.php");
require ("entity/Grid.php");
$questions = new Questions;
$questions_competences_array = $questions->getQuestionsForCompetences();
$questions_reactivity_array = $questions->getQuestionsForReactivite();
$questions_numerique_array = $questions->getQuestionsForNumerique();
$answer = new Answers;
$category = new Category();
if(isset($_POST['send_form'])){
    $grid = new Grid;
    $grid->insert_form($_POST, $_GET['grid_number'], $_POST['companie_name']);

}
?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <body>
    <div class="d-flex justify-content-center align-items-center">
        <h1 class="my-4">Diagnostic</h1>
    </div>
    <main>
        <section class="display_category">
            <div class="item_category" id="skill_bloc">
                <div class="bloc_img" style="max-height: 300px; max-width: 300px" alt="">
                    <img src="assets/competence.jpg" style="max-width: 100%">
                </div>
                <div class="bloc_title">
                    Compétence
                </div>
            </div>
            <div class="item_category" id="reactivity_bloc">
                <div class="bloc_img" style="max-height: 300px; max-width: 300px" alt="">
                    <img src="assets/reactivite.png" style="max-width: 100%">
                </div>
                <div class="bloc_title">
                    Réactivité
                </div>
            </div>
            <div class="item_category" id="numeric_bloc">
                <div class="bloc_img" style="max-height: 300px; max-width: 300px; background-color: white" alt="" >
                    <img src="assets/numerique.jpg" style="max-width: 100%">
                </div>
                <div class="bloc_title">
                    Numérique
                </div>
            </div>
        </section>
        <section class="container">
            <form action="" method="POST">
                <div class="text-center">
                    <label for="companie_name">Nom de l'entreprise</label>
                    <br>
                    <input type="text" name="companie_name" id="companie_name">
                </div>
                <br>
                <div class="competence_side dnone " id="skills">
                    <h2 class="text-center mt-4">Compétences</h2>
                    <?php
                    $category->setIdAxis(1);
                    foreach ($category->selectCategoryByAxis() as $selectCategoryByAxi) {
                        ?>
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="mb-0"><?= $selectCategoryByAxi['category_name']?></h4>
                            </div>
                            <div class="card-body">
                                <?php
                                $questions->setIdCategory($selectCategoryByAxi['id']);
                                foreach ($questions->getQuestionFromCategoryWithIdAxis($category->getIdAxis()) as $questionsForCompetence) {
                                    ?>
                                    <div class="form-group mb-4">
                                        <h5><?= $questionsForCompetence['question_content'] ?></h5>
                                        <?php
                                        $answer->setIdQuestion($questionsForCompetence['id']);
                                        foreach ($answer->getAnswerForQuestions() as $answerForQuestion) {
                                            ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question<?= $questionsForCompetence['id']?>" id="a<?= $answerForQuestion['id']?>" value="<?= $answerForQuestion['id']?>">
                                                <label class="form-check-label" for="a<?= $answerForQuestion['id']?> "><?= $answerForQuestion['content_answer']?></label>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="reactivite_side dnone" id="reactivity">
                    <h2 class="text-center mt-4">Réactivité</h2>
                    <?php
                    $category->setIdAxis(2);
                    foreach ($category->selectCategoryByAxis() as $selectCategoryByAxi) {
                        ?>
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="mb-0"><?= $selectCategoryByAxi['category_name']?></h4>
                            </div>
                            <div class="card-body">
                                <?php
                                $questions->setIdCategory($selectCategoryByAxi['id']);
                                foreach ($questions->getQuestionFromCategoryWithIdAxis($category->getIdAxis()) as $questionsForCompetence) {
                                    ?>
                                    <div class="form-group mb-5">
                                        <h5><?= $questionsForCompetence['question_content'] ?></h5>
                                        <?php
                                        $answer->setIdQuestion($questionsForCompetence['id']);
                                        foreach ($answer->getAnswerForQuestions() as $answerForQuestion) {
                                            ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question<?= $questionsForCompetence['id']?>" id="a<?= $answerForQuestion['id']?>" value="<?= $answerForQuestion['id']?>">
                                                <label class="form-check-label" for="a<?= $answerForQuestion['id']?> "><?= $answerForQuestion['content_answer']?></label>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="numeric_side dnone" id="numeric">
                    <h2 class="text-center mt-4">Numérique</h2>
                    <?php
                    $category->setIdAxis(3);
                    foreach ($category->selectCategoryByAxis() as $selectCategoryByAxi) {
                        ?>
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="mb-0"><?= $selectCategoryByAxi['category_name']?></h4>
                            </div>
                            <div class="card-body">
                                <?php
                                $questions->setIdCategory($selectCategoryByAxi['id']);
                                foreach ($questions->getQuestionFromCategoryWithIdAxis($category->getIdAxis()) as $questionsForCompetence) {
                                    ?>
                                    <div class="form-group mb-5">

                                        <h5><?= $questionsForCompetence['question_content'] ?></h5>
                                        <?php
                                        $answer->setIdQuestion($questionsForCompetence['id']);
                                        foreach ($answer->getAnswerForQuestions() as $answerForQuestion) {
                                            ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question<?= $questionsForCompetence['id']?>" id="a<?= $answerForQuestion['id']?>" value="<?= $answerForQuestion['id']?>">
                                                <label class="form-check-label" for="a<?= $answerForQuestion['id']?> "><?= $answerForQuestion['content_answer']?></label>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="text-center">
                    <input type="submit" name="send_form" class="btn btn-primary" value="Envoyer">
                </div>
            </form>
        </section>
    </main>
    </body>
    <script>
        document.getElementById("skill_bloc").addEventListener("click", function(){
            if (document.getElementById("skills").classList.length === 1){
                document.getElementById("skills").classList.add("dnone")
            }
            document.getElementById("skills").classList.remove("dnone")
            document.getElementById("reactivity").classList.add("dnone")
            document.getElementById("numeric").classList.add("dnone")
        })

        document.getElementById("reactivity_bloc").addEventListener("click", function(){
            console.log("B");
            document.getElementById("reactivity").classList.remove("dnone")
            document.getElementById("skills").classList.add("dnone")
            document.getElementById("numeric").classList.add("dnone")
        })

        document.getElementById("numeric_bloc").addEventListener("click", function(){
            console.log("c");
            document.getElementById("numeric").classList.remove("dnone")
            document.getElementById("skills").classList.add("dnone")
            document.getElementById("reactivity").classList.add("dnone")
        })

    </script>
<?php
include("component/footer.php");