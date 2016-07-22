<?php
include_once 'SharedContext.php';
class ApiRequests {
	
    // Add api calls here
    private $sharedContext;
    private $startActivity;
    
    public function ApiRequests(&$startActivity) {
        $this->startActivity = $startActivity;
    }
    
    public function runWorkflow() {
        $this->sharedContext = new SharedContext();
        $next = $this->startActivity;
        $next->run($this->sharedContext);
        return $this->sharedContext;
    }
}