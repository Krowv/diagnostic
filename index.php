<?php
$title = "Page d'accueil";
include("component/header.php");
include ("entity/DatabaseConnexion.php");
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
    $grid = new Grid
}
var_dump($_POST);
?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body>
    <div class="flex">
        <h1>Diagnostic</h1>
        <div>
            <p>options</p>
        </div>
    </div>

    <aside>
        <button>Créer une nouvelle grille</button>
        <br>
        <button>Supprimer la grille</button>
    </aside>
    <h2>Wendling Adhésif</h2>
    <p>L’entreprise Wendling Adhésifs et Équipements (ADEW) est une petite entreprise de 14 personnes opérant à l’international pour du commerce de gros et détail pour divers adhésifs et équipements d’impression et découpe de ces derniers. Depuis 1979, cette entreprise est dirigée de père en fils avec une base de clients fidèles.</p>
    <main>
        <section class="display_category">
            <div class="item_category" id="skill_bloc">
                <div class="bloc_img">
                    <img src="" alt="">
                </div>
                <div class="bloc_title">
                    Compétence
                </div>
            </div>
            <div class="item_category" id="reactivity_bloc">
                <div class="bloc_img">
                    <img src="" alt="">
                </div>
                <div class="bloc_title">
                    Réactivité
                </div>
            </div>
            <div class="item_category" id="numeric_bloc">
                <div class="bloc_img">
                    <img src="" alt="">
                </div>
                <div class="bloc_title">
                    Numérique
                </div>
            </div>
        </section>
        <section style="display: flex; flex-direction: row; justify-content: center">
            <form action="" method="POST">
                <div class="competence_side dnone mx-auto" id="skills" style="width: 90%">
                    <h2 class="text-center mt-4">Compétences</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Catégorie</th>
                                <th>Question</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($questions->getQuestionsForCompetences() as $questionsForCompetence) {
                            $questions->setIdCategory($questionsForCompetence['id_category']);
                            ?>
                            <td><?= $questions->selectCategoryFromQuestion()?></td>
                            <td><?= $questionsForCompetence['question_content']?></td>
                            <td>
                                <?php
                                $answer->setIdQuestion($questionsForCompetence['id']);
                                foreach ($answer->getAnswerForQuestions() as $answerForQuestion) {
                                 ?>
                                <label for="label<?= $answerForQuestion['id']?>"><?= $answerForQuestion['content_answer']?></label>
                                <input type="radio" name="question<?= $questionsForCompetence['id']?>" id="" value="<?= $answerForQuestion['note']?>">
                                <br>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="reactivite_side dnone mx-auto" id="reactivity">
                    <h2 class="text-center mt-4">Réactivité</h2>
                    <table class="table table-striped mx-auto">
                        <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Question</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($questions->getQuestionsForReactivite() as $questionsForCompetence) {
                            $questions->setIdCategory($questionsForCompetence['id_category']);
                            ?>
                            <td><?= $questions->selectCategoryFromQuestion()?></td>
                            <td><?= $questionsForCompetence['question_content']?></td>
                            <td>
                                <?php
                                $answer->setIdQuestion($questionsForCompetence['id']);
                                foreach ($answer->getAnswerForQuestions() as $answerForQuestion) {
                                    ?>
                                    <label for="label<?= $answerForQuestion['id']?>"><?= $answerForQuestion['content_answer']?></label>
                                    <input type="radio" name="question<?= $questionsForCompetence['id']?>" id="" value="<?= $answerForQuestion['note']?>">
                                    <br>
                                    <?php
                                }
                                ?>
                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="reactivite_side dnone mx-auto" id="numeric">
                    <h2 class="text-center mt-4">Numérique</h2>
                    <table class="table table-striped mx-auto">
                        <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Question</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($questions->getQuestionsForNumerique() as $questionsForCompetence) {
                            $questions->setIdCategory($questionsForCompetence['id_category']);
                            ?>
                            <td><?= $questions->selectCategoryFromQuestion()?></td>
                            <td><?= $questionsForCompetence['question_content']?></td>
                            <td>
                                <?php
                                $answer->setIdQuestion($questionsForCompetence['id']);
                                foreach ($answer->getAnswerForQuestions() as $answerForQuestion) {
                                    ?>
                                    <label for="label<?= $answerForQuestion['id']?>"><?= $answerForQuestion['content_answer']?></label>
                                    <input type="radio" name="question<?= $questionsForCompetence['id']?>" id="" value="<?= $answerForQuestion['note']?>">
                                    <br>
                                    <?php
                                }
                                ?>
                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <input type="submit" name="send_form" value="Envoyer">
            </form>
        </section>
        <!--<section id="competence" style="display: flex; flex-direction: row; justify-content: center">
            <form action="" method="POST">
                <div class="competence_side dnone" id="skills">
                    <h2>Compétences</h2>
                    <h4>Formations pour Apprendre à apprendre, changement de paradigme, "être à la page" (au-delà des compétences "justes" nécessaires)</h4>
                    <label for="q10">0</label>
                    <input type="radio" name="q1" id="q10" value="0">
                    <label for="q11">1</label>
                    <input type="radio" name="q1" id="q11" value="1">
                    <label for="q12">2</label>
                    <input type="radio" name="q1" id="q12" value="2">
                    <h4>Le co-développement (outil d'intelligence collective) existe-t-il dans l'entreprise ?</h4>
                    <label for="q20">0</label>
                    <input type="radio" name="q2" id="q20" value="0">
                    <label for="q21">1</label>
                    <input type="radio" name="q2" id="q21" value="1">
                    <label for="q22">2</label>
                    <input type="radio" name="q2" id="q22" value="2">
                    <h4>Les collaborateurs sont-ils amenés à partager leurs compétences et sous quelles formes ?</h4>
                    <label for="q30">0</label>
                    <input type="radio" name="q3" id="q30" value="0">
                    <label for="q31">1</label>
                    <input type="radio" name="q3" id="q31" value="1">
                    <label for="q32">2</label>
                    <input type="radio" name="q3" id="q32" value="2">
                    <h4>Le mentoring (fonctionnement en binôme) existe-t-il pour assurer le transfert de compétences ?</h4>
                    <label for="q40">0</label>
                    <input type="radio" name="q4" id="q40" value="0">
                    <label for="q41">1</label>
                    <input type="radio" name="q4" id="q41" value="1">
                    <label for="q42">2</label>
                    <input type="radio" name="q4" id="q42" value="2">
                    <h4>Les managers sont-ils aussi formateurs sur certains sujet pour l'entreprise entière ?</h4>
                    <label for="q50">0</label>
                    <input type="radio" name="q5" id="q50" value="0">
                    <label for="q51">1</label>
                    <input type="radio" name="q5" id="q51" value="1">
                    <label for="q52">2</label>
                    <input type="radio" name="q5" id="q52" value="2">
                    <h4>L'entreprise favorise-t-elle l'excellence technique ? (Principe 9 du Manifeste Agile)</h4>
                    <label for="q60">0</label>
                    <input type="radio" name="q6" id="q60" value="0">
                    <label for="q61">1</label>
                    <input type="radio" name="q6" id="q61" value="1">
                    <label for="q62">2</label>
                    <input type="radio" name="q6" id="q62" value="2">
                    <h4>Déployez vous les pratiques du "Faire Agile", c'est-à-dire une ou plusieurs des "méthodes" agiles ?</h4>
                    <label for="q70">0</label>
                    <input type="radio" name="q7" id="q70" value="0">
                    <label for="q71">1</label>
                    <input type="radio" name="q7" id="q71" value="1">
                    <label for="q72">2</label>
                    <input type="radio" name="q7" id="q72" value="2">
                    <h4>Votre entreprise promeut-elle un "état d'esprit agile" ?</h4>
                    <label for="q80">0</label>
                    <input type="radio" name="q8" id="q80" value="0">
                    <label for="q81">1</label>
                    <input type="radio" name="q8" id="q81" value="1">
                    <label for="q82">2</label>
                    <input type="radio" name="q8" id="q82" value="2">
                    <h4>Votre entreprise gère-t-elle humainement les compétences ?</h4>
                    <label for="q90">0</label>
                    <input type="radio" name="q9" id="q90" value="0">
                    <label for="q91">1</label>
                    <input type="radio" name="q9" id="q91" value="1">
                    <label for="q92">2</label>
                    <input type="radio" name="q9" id="q92" value="2">
                </div>
                <div class="reactivite_side dnone" id="reactivity">
                    <h2>Reactivite</h2>
                    <h4>Valeur supérieure utilisable livrée plus tôt (Fonction principale utilisable dès les premières versions)</h4>
                    <label for="q110">0</label>
                    <input type="radio" name="q11" id="q110" value="0">
                    <label for="q111">1</label>
                    <input type="radio" name="q11" id="q111" value="1">
                    <label for="q112">2</label>
                    <input type="radio" name="q11" id="q112" value="2">
                    <h4>Réactivité face aux impératifs prépondérants</h4>
                    <label for="q120">0</label>
                    <input type="radio" name="q12" id="q120" value="0">
                    <label for="q121">1</label>
                    <input type="radio" name="q12" id="q121" value="1">
                    <label for="q122">2</label>
                    <input type="radio" name="q12" id="q122" value="2">
                    <h4>Mesure de la vélocité de l'équipe (indicateur de suivi du travail d'une équipe de conception)</h4>
                    <label for="q130">0</label>
                    <input type="radio" name="q13" id="q130" value="0">
                    <label for="q131">1</label>
                    <input type="radio" name="q13" id="q131" value="1">
                    <label for="q132">2</label>
                    <input type="radio" name="q13" id="q132" value="2">
                    <h4>Les installations techniques et de gestion sont modernes (TIC/ERP/CRM)</h4>
                    <label for="q140">0</label>
                    <input type="radio" name="q14" id="q140" value="0">
                    <label for="q141">1</label>
                    <input type="radio" name="q14" id="q141" value="1">
                    <label for="q142">2</label>
                    <input type="radio" name="q14" id="q142" value="2">
                    <h4>Les équipes sont en capacité d'autonomiser une partie de leurs tâches</h4>
                    <label for="q150">0</label>
                    <input type="radio" name="q15" id="q150" value="0">
                    <label for="q151">1</label>
                    <input type="radio" name="q15" id="q151" value="1">
                    <label for="q152">2</label>
                    <input type="radio" name="q15" id="q152" value="2">
                    <h4>Les équipes s’inscrivent dans un cadre Agile Lean</h4>
                    <label for="q160">0</label>
                    <input type="radio" name="q16" id="q160" value="0">
                    <label for="q161">1</label>
                    <input type="radio" name="q16" id="q161" value="1">
                    <label for="q162">2</label>
                    <input type="radio" name="q16" id="q162" value="2">
                    <h4>Les mécanismes de livraison et de synchronisation sont matures</h4>
                    <label for="q160">0</label>
                    <input type="radio" name="q16" id="q160" value="0">
                    <label for="q161">1</label>
                    <input type="radio" name="q16" id="q161" value="1">
                    <label for="q162">2</label>
                    <input type="radio" name="q16" id="q162" value="2">
                    <h4>Les innovations produit tiennent compte de l'urgence climatique</h4>
                    <label for="q170">0</label>
                    <input type="radio" name="q17" id="q170" value="0">
                    <label for="q171">1</label>
                    <input type="radio" name="q17" id="q171" value="1">
                    <label for="q172">2</label>
                    <input type="radio" name="q17" id="q172" value="2">
                    <h4>Les processus internes sont remis en cause pour diminuer leur impact environnemental</h4>
                    <label for="q180">0</label>
                    <input type="radio" name="q18" id="q180" value="0">
                    <label for="q181">1</label>
                    <input type="radio" name="q18" id="q181" value="1">
                    <label for="q182">2</label>
                    <input type="radio" name="q18" id="q182" value="2">
                    <h4>Les parties prenantes sont sélectionnées en fonction de leur éthique vis-à-vis du développement durable</h4>
                    <label for="q190">0</label>
                    <input type="radio" name="q19" id="q190" value="0">
                    <label for="q191">1</label>
                    <input type="radio" name="q19" id="q191" value="1">
                    <label for="q192">2</label>
                    <input type="radio" name="q19" id="q192" value="2">
                    <h4>Veille stratégique</h4>
                    <label for="q200">0</label>
                    <input type="radio" name="q20" id="q200" value="0">
                    <label for="q201">1</label>
                    <input type="radio" name="q20" id="q201" value="1">
                    <label for="q202">2</label>
                    <input type="radio" name="q20" id="q202" value="2">
                </div>
                <div class="numerique dnone" id="numeric">
                    <h2>Numérique</h2>
                    <h4>Votre entreprise dégage t-elle une part de CA  par des produits ou services en ligne</h4>
                    <label for="q30">0</label>
                    <input type="radio" name="q30" id="q30" value="0">
                    <label for="q30">1</label>
                    <input type="radio" name="q30" id="q30" value="1">
                    <label for="q30">2</label>
                    <input type="radio" name="q30" id="q30" value="2">
                    <h4>La mise en place d’outils numériques a-t-elle permis d'optimiser les coûts, les délais et la qualité ?</h4>
                    <label for="q31">0</label>
                    <input type="radio" name="q31id="q31" value="0">
                    <label for="q31">1</label>
                    <input type="radio" name="q31" id="q31" value="1">
                    <label for="q31">2</label>
                    <input type="radio" name="q31" id="q31" value="2">
                    <h4>Comment les outils sont-ils intégrés dans les process de l’entreprise ?</h4>
                    <label for="q32">0</label>
                    <input type="radio" name="q32" id="q32" value="0">
                    <label for="q32">1</label>
                    <input type="radio" name="q32" id="q32" value="1">
                    <label for="q32">2</label>
                    <input type="radio" name="q32" id="q32" value="2">
                    <h4>Comment partagez-vous les données numériques avec les parties prenantes (clients, fournisseurs,…) ?</h4>
                    <label for="q33">0</label>
                    <input type="radio" name="q33" id="q33" value="0">
                    <label for="q33">1</label>
                    <input type="radio" name="q33" id="q33" value="1">
                    <label for="q33">2</label>
                    <input type="radio" name="q33" id="q33" value="2">
                    <h4>Mesurez-vous les impacts du numérique sur votre entreprise ?</h4>
                    <label for="q34">0</label>
                    <input type="radio" name="q34" id="q34" value="0">
                    <label for="q34">1</label>
                    <input type="radio" name="q34" id="q34" value="1">
                    <label for="q34">2</label>
                    <input type="radio" name="q34" id="q34" value="2">
                    <h4>Quel est l’impact du numérique sur la démarche RSE de l’entreprise ?</h4>
                    <label for="q35">0</label>
                    <input type="radio" name="q35" id="q35" value="0">
                    <label for="q35">1</label>
                    <input type="radio" name="q35" id="q35" value="1">
                    <label for="q35">2</label>
                    <input type="radio" name="q35" id="q35" value="2">
                    <h4>Existe-t-il des freins (stratégiques, financiers,…) à l’ investissement dans les outils numériques ?</h4>
                    <label for="q36">0</label>
                    <input type="radio" name="q36" id="q36" value="0">
                    <label for="q36">1</label>
                    <input type="radio" name="q36" id="q36" value="1">
                    <label for="q36">2</label>
                    <input type="radio" name="q36" id="q36" value="2">
                    <h4>L’entreprise dispose-t-elle : d’un site internet, d’un compte LinkedIn, d’une page Facebook, d’un compte Twitter,... ?</h4>
                    <label for="q37">0</label>
                    <input type="radio" name="q37" id="q37" value="0">
                    <label for="q37">1</label>
                    <input type="radio" name="q37" id="q37" value="1">
                    <label for="q37">2</label>
                    <input type="radio" name="q37" id="q37" value="2">
                    <h4>Comment utilisez-vous le numérique dans la relation client ? (nouveau modèle de vente, nouveau modèle d’échanges avec les clients, communauté, story, chat,...8</h4>
                    <label for="q38">0</label>
                    <input type="radio" name="q38" id="q38" value="0">
                    <label for="q38">1</label>
                    <input type="radio" name="q38" id="q38" value="1">
                    <label for="q38">2</label>
                    <input type="radio" name="q38" id="q38" value="2">
                    <h4>L’entreprise dispose-t-elle d’un community manager ?</h4>
                    <label for="q39">0</label>
                    <input type="radio" name="q39" id="q39" value="0">
                    <label for="q39">1</label>
                    <input type="radio" name="q39" id="q39" value="1">
                    <label for="q39">2</label>
                    <input type="radio" name="q39" id="q39" value="2">
                    <h4>Certains de vos collaborateurs sont-ils actifs sur les réseaux sociaux au nom de l’entreprise ?</h4>
                    <label for="q301">0</label>
                    <input type="radio" name="q301" id="q301" value="0">
                    <label for="q301">1</label>
                    <input type="radio" name="q301" id="q301" value="1">
                    <label for="q301">2</label>
                    <input type="radio" name="q301" id="q301" value="2">
                    <h4>Comment mesurez-vous et exploitez-vous les données issues du site de votre entreprise ?</h4>
                    <label for="q302">0</label>
                    <input type="radio" name="q302" id="q302" value="0">
                    <label for="q302">1</label>
                    <input type="radio" name="q302" id="q302" value="1">
                    <label for="q302">2</label>
                    <input type="radio" name="q302" id="q302" value="2">
                    <h4>Avez-vous observé chez vos concurrents des pratiques innovantes ?</h4>
                    <label for="q303">0</label>
                    <input type="radio" name="q303" id="q303" value="0">
                    <label for="q303">1</label>
                    <input type="radio" name="q303" id="q303" value="1">
                    <label for="q303">2</label>
                    <input type="radio" name="q303" id="q303" value="2">
                    <h4>Vos collaborateurs sont-ils équipés de nouveaux équipements numériques de travail (PC portable, tablette, smartphone,…) ? </h4>
                    <label for="q304">0</label>
                    <input type="radio" name="q304" id="q304" value="0">
                    <label for="q304">1</label>
                    <input type="radio" name="q304" id="q304" value="1">
                    <label for="q304">2</label>
                    <input type="radio" name="q304" id="q304" value="2">
                    <h4>L’arrivée des outils digitaux a-t-elle eu un impact sur les pratiques et la culture de l’entreprise ?</h4>
                    <label for="q305">0</label>
                    <input type="radio" name="q305" id="q305" value="0">
                    <label for="q305">1</label>
                    <input type="radio" name="q305" id="q305" value="1">
                    <label for="q305">2</label>
                    <input type="radio" name="q305" id="q305" value="2">
                    <h4>Comment vous êtes-vous approprié et comment avez-vous accompagné ces évolutions?</h4>
                    <label for="q306">0</label>
                    <input type="radio" name="q306" id="q306" value="0">
                    <label for="q306">1</label>
                    <input type="radio" name="q306" id="q306" value="1">
                    <label for="q306">2</label>
                    <input type="radio" name="q306" id="q306" value="2">
                    <h4>Les nouvelles possibilités technologiques ont-elles fait évoluer le modèle d’organisation de l’entreprise et/ou votre management, vers plus de collaboration avec des acteurs internes ou externes ?</h4>
                    <label for="q307">0</label>
                    <input type="radio" name="q307" id="q307" value="0">
                    <label for="q307">1</label>
                    <input type="radio" name="q307" id="q307" value="1">
                    <label for="q307">2</label>
                    <input type="radio" name="q307" id="q307" value="2">
                    <h4>Mobilisez-vous des outils de veille et mettez-vous en œuvre des modalités de curation et de partage de l’ information ?</h4>
                    <label for="q308">0</label>
                    <input type="radio" name="q308" id="q308" value="0">
                    <label for="q308">1</label>
                    <input type="radio" name="q308" id="q308" value="1">
                    <label for="q308">2</label>
                    <input type="radio" name="q308" id="q308" value="2">
                    <h4>Les fonctionnalités des outils sont-elles augmentées par la pratique de vos collaborateurs ?</h4>
                    <label for="q309">0</label>
                    <input type="radio" name="q309" id="q309" value="0">
                    <label for="q309">1</label>
                    <input type="radio" name="q309" id="q309" value="1">
                    <label for="q309">2</label>
                    <input type="radio" name="q309" id="q309" value="2">
                    <h4>Comment accompagnez-vous vos collaborateurs dans la transition numérique ?</h4>
                    <label for="q310">0</label>
                    <input type="radio" name="q310" id="q310" value="0">
                    <label for="q310">1</label>
                    <input type="radio" name="q310" id="q310" value="1">
                    <label for="q310">2</label>
                    <input type="radio" name="q310" id="q310" value="2">
                </div>
                <br>
                <input type="submit" value="envoyer">
            </form>
        </section>-->
        <section id="reactivite">
            reactivité
        </section>
        <section id="numerique">
            numérique
        </section>
    
        <section id="competenc">
    
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