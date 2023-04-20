<?php

$todoList = [
    [
        'text'=>'Fare da mangiare',
        'done'=> true
    ],
    [
        'text'=>'Fare la spesa',
        'done'=> false
    ],
    [
        'text'=>'Fare i compiti',
        'done'=> true
    ],
    [
        'text'=>'Uscire con gli amici',
        'done'=> false
    ],
    
];

if(isset($_POST['newTodo'])){
    $new_todo = ['text' => $_POST["newTodo"]];
    $todoList[] = $new_todo;
    
}

header('Content-Type: application/json');
echo json_encode($todoList);