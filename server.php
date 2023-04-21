<?php


// invio dei dati
if (file_exists('database.json')) {
    // Ritorno il file .json in stringa.
    $string = file_get_contents('database.json');
    // Prendo il file json e lo converto in valore PHP
    $todoList = json_decode($string, true);
}else {
    $todoList = [];
}



if (isset($_POST['newTodo'])) {
    // aggunta dei dati new task
    $new_todo = ['text' => $_POST["newTodo"], 'done'=> false];
    $todoList[] = $new_todo;
    // Scrivo i dati nel file
    $myString = json_encode($todoList);
    file_put_contents('database.json', $myString);
    
} elseif (isset($_POST['toggleindex'])) {
    //aggunta nel todo il done testo barrato
    $todoindex = $_POST['toggleindex'];
    $todoList[$todoindex]['done'] = !$todoList[$todoindex]['done'];
    $myString = json_encode($todoList);
    file_put_contents('database.json', $myString);

}

header('Content-Type: application/json');
echo json_encode($todoList);