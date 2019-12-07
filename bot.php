<?php

include "vk_api.php"; 


const VK_KEY = "c78a03d784fad8d5e8f778e89d2cf0d9c2dc674ce2b65d9e2fe65a1e4d5d77284b477ea14b5ab245856dd";  // Токен сообщества
const ACCESS_KEY = "31b354a6";  // Тот самый ключ из сообщества 
const VERSION = "5.81"; // Версия API VK


$vk = new vk_api(VK_KEY, VERSION); 
$data = json_decode(file_get_contents('php://input')); 

if ($data->type == 'confirmation') { 
    exit(ACCESS_KEY); 
}
$vk->sendOK(); 


// ====== Наши переменные ============
$id = $data->object->from_id; // Узнаем ID пользователя, кто написал нам
$message = $data->object->text; // Само сообщение от пользователя
$date = date("d.m.Y  H:i");
// ====== *************** ============

if ($data->type == 'message_new') {



        if ($message == '!бот') {

            $vk->sendMessage($id, "Привет :-)");
            
        }

        if ($message == '!дата') {

            $vk->sendMessage($id, $date);
            
        }



    }