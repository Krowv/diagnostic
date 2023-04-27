<?php
require("entity/Database.php");
require("entity/Grid.php");
$grid = new Grid;
$grid->setId($_GET['id']);
$title = $grid->getGridById();
include("entity/Axis.php");
include("component/header.php");
require("entity/Category.php");
require("entity/Questions.php");
require("entity/Answers.php");
$category = new Category;
$axis = new Axis;
$questions = new Questions;
$answer = new Answers;
?>
    <header class="text-center">
        <h1>Résultats</h1>
    </header>
    <section class="text-center">
        <a href="./index.php">Retour</a>
    </section>
    <br>
    <main class="container text-center">
        <?php foreach ($axis->getAllAxis() as $thisAxis) { ?>
            <div class="accordion" id="accordion<?= $thisAxis['axis_name'] ?>">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $thisAxis['axis_name'] ?>">
                        <?php
                        $score = $answer->getAnswerScoreForOneAxis($thisAxis['id']);
                        ?>
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $thisAxis['axis_name'] ?>" aria-expanded="true" aria-controls="collapse<?= $thisAxis['axis_name'] ?>">
                            <?= $thisAxis['axis_name'] . " ( " . $score['total_score'] . " ) " ?>
                        </button>
                    </h2>
                    <input type="hidden" name="" id="axe<?= $thisAxis['id']?>" value="<?= $score['total_score']?>">
                    <div id="collapse<?= $thisAxis['axis_name'] ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $thisAxis['axis_name'] ?>" data-bs-parent="#accordion<?= $thisAxis['axis_name'] ?>">
                        <div class="accordion-body">
                            <?php foreach ($category->getCategoryByAxisName($thisAxis['axis_name']) as $category_name) { ?>
                                <h3><?= $category_name['category_name'] ?></h3>
                                <?php foreach ($questions->getQuestionsFromCategory($category_name['category_name']) as $questions_content) { ?>
                                    <h4><?= $questions_content['question_content'] ?></h4>
                                    <?php
                                    $answer->setIdQuestion($questions_content['id']);
                                    $answer_for_the_question = $answer->selectAnswerFromQuestionForGrid();
                                    ?>
                                    <p><?= $answer_for_the_question['content_answer'] ?></p>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
    </main>
    <footer>
        <div style="width: 500px; margin: auto">
            <canvas id="myChart"></canvas>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        const ctx = document.getElementById('myChart');
        //On récupère le contenu des divs cachées
        const reactivite = document.getElementById('axe1').value;
        const competences = document.getElementById('axe2').value;
        const numerique = document.getElementById('axe3').value;
        //On récupère le plus grand nombre de points
        const max = Math.max(reactivite, competences, numerique);
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Axe réactivité', 'Axe compétences', 'Axe numérique'],
                datasets: [{
                    label: 'Score',
                    data: [reactivite, competences, numerique],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    r: {
                        suggestedMin: 0,
                        suggestedMax: 50
                    }
                },
            }
        });
    </script>
<?php
include("component/footer.php");

