<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container-fluid">
        <div class="row-content">
           <div class="col-sm-4">
                <h1>Project</h1>

                <h2>Content of file</h2>
                <?php

                    $text = file_get_contents("https://s3.zylowski.net/public/input/4.txt?fbclid=IwAR1bA1GI3A8Qb12qWVo3ygfxm0gqaIhbhnKpkCEuxSYfFsGagcgR8n2CA4k");
                    echo $text;

                ?>
                <h2>Number of letters in the file</h2>
                <?php
                $letter_counter = 0;
                if($text){
                    for($i = 0; $i < strlen($text); $i++){
                       if(preg_match('/[a-z]/', $text[$i]) || preg_match('/[A-Z]/', $text[$i])){
                           $letter_counter++;
                    }
                  }
                    echo $letter_counter;
                }else{
                    echo "<p>Lack of file.</p>";
                }
                ?>
                <h2>Number of words in the file</h2>
                <?php
                if($text){
                    $words = explode(' ', $text);
                    $words_counter = count($words);
                    echo $words_counter;
                }else{
                    echo "<p>Lack of file.</p>";
                }if($text){

                }else{
                    echo "<p>Lack of file.</p>";
                }
                ?>
                <h2>Number of punctuation marks in the file</h2>
<<<<<<< HEAD
				<?php
=======
                <?php
>>>>>>> 5b561c08b714980759146778d8393fa2b19aa297
                if($text){
                    $punctuation_counter = 0;
                    for($i = 0; $i < strlen($text); $i++){
                       if($text[$i] == '.' || $text[$i] == ',' || $text[$i] == ':' || $text[$i] == ';' || $text[$i] == '"' || $text[$i] == '(' || $text[$i] == ')' || $text[$i] == '?' || $text[$i] == '!' || $text[$i] == '-' || $text[$i] == "'"){
                           $punctuation_counter++;
                       }
                    }
                    echo $punctuation_counter;
                }else{
                    echo "<p>Lack of file.</p>";
                }
                ?>
                <h2>Number of sentences in the file</h2>
<<<<<<< HEAD
				<?php
=======
                <?php
>>>>>>> 5b561c08b714980759146778d8393fa2b19aa297
                if($text){
                    $sentences_counter = 0;
                    for($i = 0; $i < count($words); $i++){
                       if(preg_match('/[a-z]\./', $words[$i]) || preg_match('/[a-z]\?/', $words[$i]) || preg_match('/[a-z]\!/', $words[$i])){
                           $sentences_counter++;
                       }
                    }
                    echo $sentences_counter;
                }else{
                    echo "<p>Lack of file.</p>";
                }
                ?>
                <h2>Report on the use of letters A-Z</h2>
                <?php
                if($text){
                    $letters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'w', 'x', 'y', 'z');
                    $lower_text = strtolower($text);
                    for($j = 0; $j < count($letters); $j++){
                        $specific_letter_counter = 0;
                        for($i = 0; $i < strlen($text); $i++){
                            if($text[$i] == $letters[$j]){
                                $specific_letter_counter++;
                            }
                        }
                        echo $letters[$j] . " -> " . $specific_letter_counter . "<br>";
                    }
                }else{
                    echo "<p>Lack of file.</p>";
                }
                ?>
                <!-- SAVE IN STATYSTYKI.TXT-->
				<?php
                $file = fopen("statystyki.txt", 'w');
                fputs($file, "Number of letters in the file\n $letter_counter \nNumber of words in the file\n $words_counter \nNumber of punctuation marks in the file\n $punctuation_counter \nNumber of sentences in the file\n $sentences_counter\n");
                //deleting file
                fclose("statystyki.txt");

                ?>
            </div>
        </div>
    </div>
    <footer class="container-fluid">
        <p>Project by Damian Krzemiński, Piotr Urban and Patryk Kaźmierczak</p>
    </footer>
</body>
</html>
