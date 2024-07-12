<?php

  class Validator {

    public function skipChars($input) {
      return quotemeta(trim($input));
    }
    
    public function checkLen($input) {
      if (strlen($input) <= 0) {
        return false;
      } else {
        return true;
      }
    }

    public function checkEmail(string $email, bool $sanitize = false) {
      if ($sanitize == true) {
        filter_var($email, FILTER_SANITIZE_EMAIL);
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email";
      }
    }

    public function checkPassword($password) {
      if (strlen("$password") < 8) {
        echo "Please Write Strong Password";
      }
    }

    public function filteringURL($url) {
      if (isset($url) && !empty($url)) {

        $url = filter_var($url, FILTER_SANITIZE_STRING);
        return $url;
      } else {
        header("HTTP/1.1 403");
        exit();
      }
      
    }

    public function filterInput($input, $datetype) {
      switch ($datetype) {
        case 'string':
          $input = filter_var($input, FILTER_SANITIZE_STRING);
          break;
        case 'int' || 'integer':
          $input = filter_var($input, FILTER_SANITIZE_NUMBER_INT);
          break;
        case 'float':
          $input = filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT);
          break;
        case 'email':
          $input = filter_var($input, FILTER_SANITIZE_EMAIL);
          break;
      } 
    }
  }

  $valid = new Validator();