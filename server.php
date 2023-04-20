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
    
];

if(isset($_POST['newTodo'])){
    $new_todo = ['text' => $_POST["newTodo"]];
    $todoList[] = $new_todo;
    $todoList[] = $_POST['newTodo'];
}

header('Content-Type: application/json');
echo json_encode($todoList);