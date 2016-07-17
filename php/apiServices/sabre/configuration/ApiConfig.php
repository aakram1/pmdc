<?php
class ApiConfig {
    
    private $restConfig;
    private static $instance = null;
    
    private function __construct() {
        $this->restConfig = parse_ini_file("RestConfig.ini");
    }
    
    public static function getInstance() {
        if (ApiConfig::$instance === null) {
            ApiConfig::$instance = new ApiConfig();
        }
        return ApiConfig::$instance;
    }
    
    public function getRestProperty($propertyName) {
        return $this->restConfig[$propertyName];
    }
}
?>