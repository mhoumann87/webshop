<?php

class User {

    protected $userName;
    protected $userStreet;
    protected $userHouseNo;
    protected $userApt;
    protected $userPostcode;
    protected $userCity;
    protected $userPhone;
    protected $userMail;
    protected $userPassword;
    
    function __construct($name, $street, $no, $apt, $post, $city, $phone, $mail, $pass) {

        $this->userName = $name;
        $this->userStreet = $street;
        $this->userHouseNo = $no;
        $this->userApt = $apt;
        $this->userPostcode = $post;
        $this->userCity = $city;
        $this->userName = $phone;
        $this->userMail = $mail;
        $this->userPassword = $pass;

    }
}