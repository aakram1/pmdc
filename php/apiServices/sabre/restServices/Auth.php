<?php
include_once '/app/php/apiServices/sabre/configuration/ApiConfig.php';
class Auth {
    
    private $config;
    
    public function __construct() {
        $this->config = ApiConfig::getInstance();
    }
    
    public function callForToken() {
        $ch = curl_init($this->config->getRestProperty("environment")."/v2/auth/token");
        $headers = array(
            'Authorization : Basic '.$this->buildCredentials(),
            'Accept : */*',
            'Content-Type : application/x-www-form-urlencoded'
        );
        $vars = "grant_type=client_credentials";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        echo $result;
        return json_decode($result);
    }
    
    private function buildCredentials() {
        $credentials = $this->config->getRestProperty("formatVersion").":".
                $this->config->getRestProperty("userId").":".
                $this->config->getRestProperty("group").":".
                $this->config->getRestProperty("domain");
        echo $credentials;
        $secret = base64_encode($this->config->getRestProperty("clientSecret"));
        return base64_encode(base64_encode($credentials).":".$secret);
    }
}

?>