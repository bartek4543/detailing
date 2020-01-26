<?php
namespace App\Models;
use CodeIgniter\Model;
helper('filesystem');
class GalleryModel extends Model{
    var $photoArray = array();
    function __construct(){
        $this->photoArray = get_filenames('obrazki/', FALSE);
}
    function givePhotos(){
        return json_encode($this->photoArray);
    }
}
