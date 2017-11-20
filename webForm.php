<?php
if(isset($_POST['submit'])){

    //collect form data
    $name = $_POST['zipName'];
    $template = $_POST['templateName'];    
    $title = $_POST['templateTitle'];
    $keywords = $_POST['keywords'];


    /* all required fields
    if($name ==''){
        $error[] = 'zipfile name is required';
    }

    if($template ==''){
        $error[] = 'template name is required';
    }

    if($title ==''){
        $error[] = 'template title name is required';
    }

    if($keywords ==''){
        $error[] = 'minimum 5 keywords needed';
    }

    //check for a valid email address
    //if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         //$error[] = 'Please enter a valid email address';
    //}   */

    //if no errors carry on
    if(!isset($error)){

        # Title of the CSV
        $Content = "zipfile name, template name, template title, keywords\n";

        //set the data of the CSV
        $Content .= "$name, $template, $title, $keywords\n";

        # set the file name and create CSV file
        $FileName = "ContributorName_BatchNumber".".csv";
        header('Content-Type: application/csv'); 
        header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
        echo $Content;
        exit();
    }
}

//if their are errors display them
if(isset($error)){
    foreach($error as $error){
        echo "<p style='color:#ff0000'>$error</p>";
    }
}
?> 

<html>
<form action='' method='post'>
<p><label>zip filename</label><br><input type='text' name='zipName' value=''></p> 
<p><label>template filename</label><br><input type='text' name='templateName' value=''></p> 
<p><label>title</label><br><input type='text' name='templateTitle' value=''></p> 
<p><label>keywords</label><br><input type='text' name='keywords' value=''></p> 
<p><input type='submit' name='submit' value='Submit'></p></form>
</html>