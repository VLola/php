<?php
        $page = 1;
        $score = 0;

        // Подсчет баллов за прошлую страницу
        if(isset($_POST['bSubmit'])){
            if(isset($_POST['pScore'])) {
                $score = $_POST['pScore'];
            }
            $page = $_POST['bSubmit'];
            if($page == 2){
                if(isset($_POST['Quest_1']) && $_POST['Quest_1'] == 'yes') $score += 1;
                if(isset($_POST['Quest_2']) && $_POST['Quest_2'] == 'yes') $score += 1;
                if(isset($_POST['Quest_3']) && $_POST['Quest_3'] == 'yes') $score += 1;
                if(isset($_POST['Quest_4']) && $_POST['Quest_4'] == 'yes') $score += 1;
                if(isset($_POST['Quest_5']) && $_POST['Quest_5'] == 'yes') $score += 1;
                if(isset($_POST['Quest_6']) && $_POST['Quest_6'] == 'yes') $score += 1;
                if(isset($_POST['Quest_7']) && $_POST['Quest_7'] == 'yes') $score += 1;
                if(isset($_POST['Quest_8']) && $_POST['Quest_8'] == 'yes') $score += 1;
                if(isset($_POST['Quest_9']) && $_POST['Quest_9'] == 'yes') $score += 1;
                if(isset($_POST['Quest_10']) && $_POST['Quest_10'] == 'yes') $score += 1;
            }
            else if($page == 3){
                if(isset($_POST['Quest_1_1']) && $_POST['Quest_1_1'] == 'on' && isset($_POST['Quest_1_2']) && $_POST['Quest_1_2'] == 'on') $score += 3;
                if(isset($_POST['Quest_2_2']) && $_POST['Quest_2_2'] == 'on' && isset($_POST['Quest_2_3']) && $_POST['Quest_2_3'] == 'on') $score += 3;
                if(isset($_POST['Quest_3_3']) && $_POST['Quest_3_3'] == 'on' && isset($_POST['Quest_3_4']) && $_POST['Quest_3_4'] == 'on') $score += 3;
                if(isset($_POST['Quest_4_4']) && $_POST['Quest_4_4'] == 'on' && isset($_POST['Quest_4_1']) && $_POST['Quest_4_1'] == 'on') $score += 3;
                if(isset($_POST['Quest_5_1']) && $_POST['Quest_5_1'] == 'on' && isset($_POST['Quest_5_2']) && $_POST['Quest_5_2'] == 'on') $score += 3;
                if(isset($_POST['Quest_6_2']) && $_POST['Quest_6_2'] == 'on' && isset($_POST['Quest_6_3']) && $_POST['Quest_6_3'] == 'on') $score += 3;
                if(isset($_POST['Quest_7_3']) && $_POST['Quest_7_3'] == 'on' && isset($_POST['Quest_7_4']) && $_POST['Quest_7_4'] == 'on') $score += 3;
                if(isset($_POST['Quest_8_4']) && $_POST['Quest_8_4'] == 'on' && isset($_POST['Quest_8_1']) && $_POST['Quest_8_1'] == 'on') $score += 3;
                if(isset($_POST['Quest_9_1']) && $_POST['Quest_9_1'] == 'on' && isset($_POST['Quest_9_2']) && $_POST['Quest_9_2'] == 'on') $score += 3;
                if(isset($_POST['Quest_10_2']) && $_POST['Quest_10_2'] == 'on' && isset($_POST['Quest_10_3']) && $_POST['Quest_10_3'] == 'on') $score += 3;
            }
            else if($page == 4){
                if(isset($_POST['Quest_1']) && $_POST['Quest_1'] == '2') $score += 5;
                if(isset($_POST['Quest_2']) && $_POST['Quest_2'] == '5') $score += 5;
                if(isset($_POST['Quest_3']) && $_POST['Quest_3'] == '0') $score += 5;
                if(isset($_POST['Quest_4']) && $_POST['Quest_4'] == '3') $score += 5;
                if(isset($_POST['Quest_5']) && $_POST['Quest_5'] == '3') $score += 5;
                if(isset($_POST['Quest_6']) && $_POST['Quest_6'] == '4') $score += 5;
                if(isset($_POST['Quest_7']) && $_POST['Quest_7'] == '1') $score += 5;
                if(isset($_POST['Quest_8']) && $_POST['Quest_8'] == '6') $score += 5;
                if(isset($_POST['Quest_9']) && $_POST['Quest_9'] == '4') $score += 5;
                if(isset($_POST['Quest_10']) && $_POST['Quest_10'] == '1') $score += 5;
            }
        }

        function AddQuestion($numberQuestion, $page, $name){
            echo "<p>$name</p>";
            if($page == 3){
                echo "<input type='text' name='Quest_{$numberQuestion}'>";
            }
        }

        function AddQuestPageTwo($numberQuestion, $numberQuest, $answer){
            echo "<input type='checkbox' name='Quest_{$numberQuestion}_{$numberQuest}'>$answer</input>";
        }

        function AddQuestPageOne($numberQuestion, $answer, $value){
            echo "<input type='radio' name='Quest_{$numberQuestion}' value='$value'>$answer</input>";
        }

        function AddQuestions($page){
            $array = array("4 - 2 =", "7 - 2 =", "4 - 4 =", "8 - 5 =", "6 - 3 =", "5 - 1 =", "6 - 5 =", "8 - 2 =", "7 - 3 =", "3 - 2 =");
            $arrayOneAnswers = array([2, 3, 5, 1], [7, 5, 6, 3], [1, 5, 0, 7], [4, 5, 8, 3], [3, 2, 8, 4], [5, 4, 3, 1], [2, 6, 1, 11], [1, 5, 8, 6], [4, 5, 6, 1], [2, 1, 4, 5]);
            $arrayTwoAnswers = array([2, 2, 5, 1], [7, 5, 5, 3], [1, 5, 0, 0], [3, 5, 8, 3], [3, 3, 8, 4], [5, 4, 4, 1], [2, 6, 1, 1], [6, 5, 8, 6], [4, 4, 6, 1], [2, 1, 1, 5]);
            $arrayOneValues = array(["yes", "no", "no", "no"], ["no", "yes", "no", "no"], ["no", "no", "yes", "no"], ["no", "no", "no", "yes"], ["yes", "no", "no", "no"], ["no", "yes", "no", "no"], ["no", "no", "yes", "no"], ["no", "no", "no", "yes"], ["yes", "no", "no", "no"], ["no", "yes", "no", "no"]);
            for($i = 1; $i < 11; $i++){
                AddQuestion($i, $page, $array[$i - 1]);
                echo "<div>";
                for($j = 1; $j < 5; $j++){
                    if($page == 1) AddQuestPageOne($i, $arrayOneAnswers[$i - 1][$j - 1], $arrayOneValues[$i - 1][$j - 1]);
                    if($page == 2) AddQuestPageTwo($i, $j, $arrayTwoAnswers[$i - 1][$j - 1]);
                }
                echo "</div>";
            }
        }

        if($page == 1 || $page == 2|| $page == 3) AddQuestions($page);

        if($page == 4) {
            echo "<p>Congratulation: your score $score!</p>";
        }

        echo "<input type='text' name='pScore' value='$score' style='display: none'>";

            ?>