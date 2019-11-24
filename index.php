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
                <h2>Choose your file</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="link" placeholder="Enter link here" <?php if(isset($_POST['link'])):?> value="<?php echo $_POST['link'];?>" <?php endif;?>/>
                    </div>
                    <?php if(isset($_POST['link'])):?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="decision" placeholder="Yes/No"/>
                    </div>
                  <?php endif;?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>


                <?php if(isset($_POST['decision']) && strtolower($_POST['decision']) == 'yes'):?>
                <h2>Content of file</h2>
                <?php

                    $text = file_get_contents($_POST['link']);
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
                    $words_counter = 0;
                    for($i = 0; $i<count($words); $i++){
                      if(strlen($words[$i]) != 1){
                        $words_counter++;
                      }
                    }
                    echo $words_counter;
                }else{
                    echo "<p>Lack of file.</p>";
                }if($text){

                }else{
                    echo "<p>Lack of file.</p>";
                }
                ?>
                <h2>Number of punctuation marks in the file</h2>
                <?php
                if($text){
                    $punctuation_counter = 0;
                    for($i = 0; $i < strlen($text); $i++){
                      if($text[$i] == '?' || $text[$i] == '.' ){
                           $punctuation_counter++;
                       }
                    }
                    echo $punctuation_counter;
                }else{
                    echo "<p>Lack of file.</p>";
                }
                ?>
                <h2>Number of sentences in the file</h2>
				<?php
                if($text){
                    $sentences_counter = 0;
                    $sentences = array();
                    for($i = 0; $i < count($words); $i++){
                       if(preg_match('/[a-z]\./', $words[$i]) || preg_match('/[a-z]\?/', $words[$i]) || preg_match('/[a-z]\!/', $words[$i])){
                           array_push($sentences, $words[$i]);
                       }
                    }
                    for($i = 1; $i < count($sentences); $i++){
                       if((preg_match('/[a-z]\./', $sentences[$i]) && preg_match('/[a-z]\./', $sentences[$i - 1])) || (preg_match('/[a-z]\?/', $sentences[$i]) && preg_match('/[a-z]\?/', $sentences[$i - 1])) || (preg_match('/[a-z]\!/', $sentences[$i]) && preg_match('/[a-z]\!/', $sentences[$i - 1]))){
                           $sentences_counter++;
                       }
                    }
                    echo $sentences_counter;
                }else{
                    echo "<p>Lack of file.</p>";
                }
                ?>
                <h2>Report on the use of consonants and vowel</h2>
                <?php
				               if($text){
                         $letters = array( 'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'w', 'x', 'z');
					             $specific_letter_counter_consonants = 0;
                    $lower_text = strtolower($text);
                    for($j = 0; $j < count($letters); $j++){

                        for($i = 0; $i < strlen($text); $i++){
                            if($text[$i] == $letters[$j]){
                                $specific_letter_counter_consonants++;
                            }
                        }
                    }
                    echo  "consonants" ." -> " . $specific_letter_counter_consonants . "<br>";

                    $letters = array( 'a', 'e', 'i', 'o', 'u', 'y');
                  $specific_letter_counter_vowel = 0;
               $lower_text = strtolower($text);
               for($j = 0; $j < count($letters); $j++){

                   for($i = 0; $i < strlen($text); $i++){
                       if($text[$i] == $letters[$j]){
                           $specific_letter_counter_vowel++;
                       }
                   }
               }
               echo  "vowel" ." -> " . $specific_letter_counter_vowel . "<br>";
                }else{
                    echo "<p>Lack of file.</p>";
                }
	               ?>
                <!-- SAVE IN STATYSTYKI.TXT-->
				<?php
                $file = fopen("statystyki.txt", 'w');
                fputs($file, "Number of letters in the file\n $letter_counter \nNumber of words in the file\n $words_counter \nNumber of punctuation marks in the file\n $punctuation_counter \nNumber of sentences in the file\n $sentences_counter
                \n Numbers of consonants in the file\n $$specific_letter_counter_consonants\nNumbers of vowels in the file\n$specific_letter_counter_vowel \n ");
                //deleting file
                fclose($file);
                unlink("statystyki.txt");
                ?>

               <?php endif;?>
            </div>
        </div>
    </div>
    <footer class="container-fluid">
        <p>Project by Damian Krzemiński, Piotr Urban and Patryk Kaźmierczak</p>
    </footer>
</body>
</html>
