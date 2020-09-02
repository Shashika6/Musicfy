<?php

include 'Genre.php';

class UserRegister extends CI_Model {

    public function genreList() {
        $this->load->database();

        $res = $this->db->get('genre_list');
        $genreList = array();
        foreach ($res->result() as $row) {
            $genreList[] = new Genre($row->genreName, $row->genreID);
        }

        return $genreList;
    }

    public function registerUser($data) {
        $this->load->database();



        $res = $this->db->insert('user_details', $data);
        return $res;
    }

    public function getNoofID($username) {


        $this->load->database();

        $this->db->select('userID');
        $this->db->where('userName', $username);
        $query = $this->db->get('user_details');

        $row = $query->row();

        $userID = $row->userID;


        $userData = array(
            'userID' => $userID
        );

        return $userData;
    }

    public function insertFavorite($favoList, $userID) {
        $this->load->database();

        $round = count($favoList);
        foreach ($favoList as $listItem) {

            $insertArray = array(
                'genreID' => $listItem,
                'userID' => $userID
            );

            $this->db->insert('user_favorites', $insertArray);

            unset($insertArray);
        }
    }

    public function signin($loginInfo) {

        $this->load->database();
        $this->db->select('userName,password');
        $this->db->from('user_details');
        $this->db->where('userName', $loginInfo['userName']);
        $query = $this->db->get();

        $encriptPass = $query->row_array();




        if (!empty($query) && password_verify($loginInfo['password'], $encriptPass['password'])) {
            // if this username exists, and the input password is verified using password_verify


            return true;
        } else {
            return false;
        }
    }

    public function loginUser($username) {
        $this->load->database();

        $this->db->select('firstName,lastName,email,imageUrl,password,userID');
        $this->db->where('userName', $username);
        $query = $this->db->get('user_details');

        $row = $query->row();
        $fName = $row->firstName;
        $lName = $row->lastName;
        $email = $row->email;
        $imgUrl = $row->imageUrl;
        $userID = $row->userID;


        $userData = array(
            'firstName' => $fName,
            'lastName' => $lName,
            'email' => $email,
            'imageUrl' => $imgUrl,
            'userID' => $userID
        );

        return $userData;
    }

    public function checkUser($username) {
        $this->load->database();

        $this->db->select('userID');
        $this->db->where('userName', $username);
        $query = $this->db->get('user_details');

        $rowNo = $query->num_rows();

        if ($rowNo > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getImageUrl($username) {

        $this->load->database();

        $this->db->select('imageUrl');
        $this->db->where('userName', $username);
        $query = $this->db->get('user_details');

        $row = $query->row();
        $img = $row->imageUrl;

        return $img;
    }

}
