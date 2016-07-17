<?php
class ApiConfig {
    
    private $restConfig;
    private static $instance = null;
    
    private function __construct() {
        $this->restConfig = parse_ini_file("RestConfig.ini");
    }
    
    public static function getInstance() {
        if (SACSConfig::$instance === null) {
            SACSConfig::$instance = new SACSConfig();
        }
        return SACSConfig::$instance;
    }
    
    public function getRestProperty($propertyName) {
        return $this->restConfig[$propertyName];
    }
}
?>