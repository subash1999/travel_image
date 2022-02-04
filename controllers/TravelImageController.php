<?php
require_once "BaseController.php";
require_once "../models/TravelImage.php";
require_once "../models/Post.php";


class TravelImageController extends BaseController
{
    function getAllRatings($image_id){
        $travel_image = new TravelImage();
        $ratings = [];
        $result = $travel_image->getAllRatingsOfImage($image_id);
        while($row = $result->fetch_assoc()){
            array_push($ratings,$row);
        }
        return $ratings;
    }

    function addRating($image_id,$rating){
        $travel_image = new TravelImage();
        $travel_image->addRating($image_id,$rating);
        Alert::setAlertMessage("Rating added successfully.");
        return true;
    }

    function deleteRating($image_rating_id){
        $travel_image = new TravelImage();
        $travel_image->deleteRating($image_rating_id);
        Alert::setAlertMessage("Rating deleted successfully.");
        return true;
    }
    function getTravelImageDetails($image_id)
    {
        $travel_image = new TravelImage();
        $result = $travel_image->getTravelImageDetails($image_id);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
        return null;
    }

    function getOtherImagesOfPost($post_id, $current_image_id){
        $post = new Post();
        $result = $post->getImagesOfPost($post_id);
        $images = [];
        while($row = $result->fetch_assoc()) {
            if($row["image_id"] != $current_image_id){
                array_push($images, $row);
            }
        }
        return $images;
    }

    function getRelatedTravelImages($image_id, $limit = 3)
    {
        $travel_image = new TravelImage();
        $result = $travel_image->getRelatedTravelImages($image_id,$limit);
        $images = [];
        while ($row = $result->fetch_assoc()) {
            array_push($images,$row);
            
        }
        return $images;
    }
}
