<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 26/11/18
 * Time: 18:43
 */

$postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

$action = $postData['action'];
unset($postData['action']);

switch ($action){
    case 'getComments':

        require_once __DIR__ . '/config.php';

        $read = new \CRUD\Read;
        $read->read('comments', "WHERE id < :last ORDER BY id DESC LIMIT 1", "last={$postData['last']}");

        if($read->getResult()){
            foreach($read->getResult() as $comment){
                $json['comments'][] = $comment;
            }
        } else {
            $json['comments'] = null;
        }

        break;
}

echo json_encode($json);