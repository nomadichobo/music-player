<?php
  class Account {

    private $errorArray;

    public function __construct() {
      $this->errorArray = array();
    }

    public function register($username, $firstName, $lastName, $email, $email2, $password, $password2) {
      $this->validateUsername($username);
      $this->validateFirstName($firstName);
      $this->validateLastName($lastName);
      $this->validateEmails($email, $email2);
      $this->validatePasswords($password, $password2);

      if(empty($this->errorArray)){
        //Insert into database
        return true;
      } else {
        return false;
      }
    }

    public function getError($error) {
      if(!in_array($error, $this->errorArray)){
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function validateUsername($username) {
      if(strlen($username) > 25 || strlen($username) < 5) {
        array_push($this->errorArray, Constants::$usernameLength);
        return;
      }

      //TODO: check if username exists
    }
    
    private function validateFirstName($firstName) {
      if(strlen($firstName) > 25 || strlen($firstName) < 2) {
        array_push($this->errorArray, Constants::$firstNameLength);
        return;
      }
    }
    
    private function validateLastName($lastName) {
      if(strlen($lastName) > 25 || strlen($lastName) < 2) {
        array_push($this->errorArray, Constants::$lastNameLength);
        return;
      }
    }
    
    private function validateEmails($email, $email2) {
      if($email != $email2) {
        array_push($this->errorArray, Constants::$emailDoNotMatch);
        return;
      }

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($this->errorArray, Constants::$emailInvalid);
        return;
      }

      //TODO: check if email exists
    }
    
    private function validatePasswords($password, $password2) {
      if($password != $password2) {
        array_push($this->errorArray, Constants::$emailDoNotMatch);
        return;
      }

      // Check if password i alpha numerical
      if(preg_match('/[^A-Za-z0-9]/', $password)) {
        array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
        return;
      }

      if(strlen($password) > 30 || strlen($password) < 5){
        array_push($this->errorArray, Constants::$passwordLength);
        return;
      }
    }
  }
?>