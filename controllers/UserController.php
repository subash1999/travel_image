<?php
require_once "BaseController.php";
require_once "../models/User.php";
require_once "../models/TravelImage.php";

class UserController extends BaseController{
    function getAllUsers(){
        $user = new User();
        $users = [];
        $result = $user->getAllUsers();
        while($row = $result->fetch_assoc()){
            array_push($users,$row);
        }
        
        return $users;
    }
    function getNewAdditions()
    {
        $travel_image = new TravelImage();
        return $travel_image->newImages();
    }
}