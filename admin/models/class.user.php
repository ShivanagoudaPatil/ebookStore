<?php

class user {

    var $db;

    function __construct(){
        $this->db = new ezSQLMysql();
    }

    function login($username, $password){

        if($username){
            $sql    = "select * from user WHERE username = '{$username}' and password = '{$password}'";
            $user   = $this->db->get_row($sql, ARRAY_A);
        }
        return $user;
    }

    function addUser($userType, $firstName, $lastName, $username, $password, $email, $phone, $address){

        $username  = $this->db->escape($username);
        $firstName  = $this->db->escape($firstName);
        $lastName  = $this->db->escape($lastName);
        $password  = $this->db->escape($password);
        $email  = $this->db->escape($email);
        $phone  = $this->db->escape($phone);
        $address  = $this->db->escape($address);

        $sessionkey = md5($password);

        $sql = "INSERT INTO user (username, password, first_name, last_name, address, email, phone, role) VALUES ('{$username}', '{$password}', '{$firstName}', '{$lastName}', '{$address}', '{$email}', '{$phone}', '{$userType}')";

        if($this->db->query($sql)){
            return true;
        }
        return false;
    }

    function getUser($username){

        if($username){
            $sql    = "select * from user WHERE username = '{$username}'";
            $user   = $this->db->get_row($sql, ARRAY_A);
        }
        return $user;
    }

    function getCustomer($role){

        $sql = "select * from user WHERE username != 'admin' AND role = '{$role}'";
        return $this->db->get_results($sql, ARRAY_A);

    }

    function getPaintings($uid,$pid){

        if($pid){
            $sql = "select * from `paintings` INNER JOIN category ON paintings.cat_id = category.cat_id WHERE paintings.pid='{$pid}' AND paintings.status='approved'";
            return $this->db->get_row($sql, ARRAY_A);
        }
        else{
            $sql = "select * from `paintings` INNER JOIN `user` ON paintings.uid = user.id INNER JOIN category ON paintings.cat_id = category.cat_id WHERE paintings.uid='{$uid}'";
            return $this->db->get_results($sql, ARRAY_A);
        }
    }

    function getPaintingsArtist($uid){

        $sql = "select * from `paintings` INNER JOIN category ON paintings.cat_id = category.cat_id WHERE paintings.uid='{$uid}'";
        return $this->db->get_results($sql, ARRAY_A);

    }

    function getPendingPaintings(){

        $sql = "select * from `paintings` INNER JOIN `user` ON paintings.uid = user.id INNER JOIN category ON paintings.cat_id = category.cat_id WHERE paintings.status='pending'";
        return $this->db->get_results($sql, ARRAY_A);
    }

    function getAllPaintings(){

        $sql = "select * from `paintings` INNER JOIN `user` ON paintings.uid = user.id INNER JOIN category ON paintings.cat_id = category.cat_id WHERE paintings.status!='pending'";
        return $this->db->get_results($sql, ARRAY_A);
    }

    public function createImgName($img)
    {
        date_default_timezone_set('Asia/Kolkata');
        $uniqueName = date('dmYHis');
        $imgName = basename($img['name']);
        return $uniqueName . "_" . $imgName;
    }

    function uploadImg($file){

        $target_dir = "../upload/";
        $imgName = $this->createImgName($file);

        $target_file = $target_dir . $imgName;
        $uploadOk = 1;
        $error = "";
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($file['tmp_name']);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error .= "File is not an image. ";
                $uploadOk = 0;
            }
        }
        if($imageFileType != "jpg"  && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "JPG"  && $imageFileType != "PNG" && $imageFileType != "JPEG"
            && $imageFileType != "GIF" ) {
            $error .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error .= "Sorry, your file was not uploaded.";
            return $error;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                return ["suceess", $imgName];
            } else {
                $error .= "other error";
                return ["error", $error];
            }
        }
    }

    function addPainting($pid, $uid, $name, $detail, $img, $amount, $type, $catId,$estimate = NULL, $increment, $startDate, $endDate, $action){

        $name  = $this->db->escape($name);
        $detail  = $this->db->escape($detail);
        $img  = $this->db->escape($img);
        $amount  = $this->db->escape($amount);
        $type  = $this->db->escape($type);
        $catId = $this->db->escape($catId);
        $estimate  = $this->db->escape($estimate);
        $increment  = $this->db->escape($increment);
        $startDate  = $this->db->escape($startDate);
        $endDate  = $this->db->escape($endDate);

        if($action == 'add')
            $sql = "INSERT INTO paintings(uid, name, details, img, amount, type, cat_id, estimate, increment, start_date, end_date) VALUES ('{$uid}', '{$name}', '{$detail}', '{$img}', '{$amount}', '{$type}', '{$catId}', '{$estimate}', '{$increment}', '{$startDate}', '{$endDate}')";
        elseif($action == 'edit')
            $sql = "UPDATE paintings SET uid='{$uid}',name='{$name}',details='{$detail}',img='{$img}',type='{$type}',cat_id='{$catId}',amount='{$amount}',estimate='{$estimate}', increment='{$increment}',start_date='{$startDate}',end_date='{$endDate}' WHERE pid= '{$pid}'";

        if($this->db->query($sql)){
            return true;
        }
        return false;
    }

    function getCategory($id = NULL){

        if($id){
            $sql = "select * from category where cat_id = '{$id}'";
            return $this->db->get_row($sql, ARRAY_A);
        }else{
            $sql    = "select * from category";
            return $this->db->get_results($sql, ARRAY_A);
        }
    }

    function getPaintingByCategory($type){
        if($type == "sale")
            $sql    = "select * from category where cat_id IN (select DISTINCT cat_id from paintings WHERE paintings.type='sale' AND paintings.status='approved')";
        elseif($type == "bid")
            $sql    = "select * from category where cat_id IN (select DISTINCT cat_id from paintings WHERE paintings.type='bid' AND paintings.status='approved')";

        return $this->db->get_results($sql, ARRAY_A);
    }

    function getBidPainting($pid= NULL, $uid= NULL){

        if($uid) {
            $sql = "select * from paintings INNER JOIN bidding ON paintings.pid = bidding.pid
                    INNER JOIN user ON paintings.uid = user.id 
                    INNER JOIN user as parent ON bidding.uid = parent.id 
                    INNER JOIN category ON paintings.cat_id = category.cat_id
                    WHERE user.id='{$uid}' ";
            return $this->db->get_results($sql, ARRAY_A);
        }
        elseif($pid) {
            $sql = "select * from paintings INNER JOIN user ON paintings.uid = user.id INNER JOIN category ON paintings.cat_id = category.cat_id WHERE paintings.pid='{$pid}' ";
            return $this->db->get_row($sql, ARRAY_A);
        }
        else {
            $sql = "select * from paintings INNER JOIN user ON paintings.uid = user.id WHERE paintings.type='bid' AND paintings.status='approved'";
            return $this->db->get_results($sql, ARRAY_A);
        }
    }

    function addBid($pid, $uid, $bid_value){

        $bid_value  = $this->db->escape($bid_value);

        $sql = "INSERT INTO bidding (pid, uid, amount) VALUES ('{$pid}', '{$uid}', '{$bid_value}')";

        if($this->db->query($sql)){
            return true;
        }
        return false;
    }

    function getBidding($pid, $limit = NULL){

        $sql = $limit ? "select * from bidding INNER JOIN user ON bidding.uid=user.id WHERE pid='{$pid}' ORDER BY bid DESC LIMIT 3" : "select * from bidding INNER JOIN user ON bidding.uid=user.id  WHERE pid='{$pid}' ORDER BY bid DESC";
        return $this->db->get_results($sql, ARRAY_A);

    }

    function getSalePainting($pid= NULL, $uid= NULL){

        if($uid) {
            $sql = "select * from paintings INNER JOIN sale ON paintings.pid = sale.pid
                    INNER JOIN user ON paintings.uid = user.id 
                    INNER JOIN user as parent ON sale.uid = parent.id 
                    INNER JOIN category ON paintings.cat_id = category.cat_id
                    WHERE user.id='{$uid}' ";
            return $this->db->get_results($sql, ARRAY_A);
        }
        elseif($pid) {
            $sql = "select * from paintings INNER JOIN `user` ON paintings.uid = `user`.id INNER JOIN category ON paintings.cat_id = category.cat_id WHERE paintings.pid='{$pid}' ";
            return $this->db->get_row($sql, ARRAY_A);
        }
        else {
            $sql = "select * from paintings INNER JOIN user ON paintings.uid = user.id WHERE paintings.type='sale' AND paintings.status='approved'";
            return $this->db->get_results($sql, ARRAY_A);
        }
    }

    function addSale($pid, $uid){

        $sql = "INSERT INTO sale (uid, pid, status) VALUES ('{$uid}', '{$pid}', 'pending')";

        if($this->db->query($sql)){
            return true;
        }
        return false;
    }

    function getSale($pid=NULL, $uid=NULL){

        if($pid && $uid) {
            $sql = "select * from sale WHERE pid='{$pid}' AND uid='{$uid}'";
            return $this->db->get_row($sql, ARRAY_A);
        }
        else {
            $sql = "select * from sale INNER JOIN user ON sale.uid=user.id  WHERE pid='{$pid}' ORDER BY sid DESC";
            return $this->db->get_results($sql, ARRAY_A);
        }
    }

    function changePaintingStatus($pid, $status){

        if($status == 'approve')
            $sql = "UPDATE paintings SET status='approved' WHERE pid='{$pid}'";
        else
            $sql = "UPDATE paintings SET status='disapprove' WHERE pid='{$pid}'";

        if($this->db->query($sql)){
            return true;
        }
        return false;
    }

    function deletePainting($pid){

        $sql = "DELETE FROM `paintings` WHERE pid = '{$pid}'";

        if($this->db->query($sql)){
            return true;
        }
        return false;
    }
}