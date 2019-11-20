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
                <h2>Number of sentences in the file</h2>
                <h2>Report on the use of letters A-Z</h2>
                <!-- SAVE IN STATYSTYKI.TXT-->
            </div>
        </div>
    </div>
    <footer class="container-fluid">
        <p>Project by Damian Krzemiński, Piotr Urban and ...</p>
    </footer>
</body>
</html>
