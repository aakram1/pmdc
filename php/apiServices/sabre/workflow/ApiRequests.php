<?php
include_once 'SharedContext.php';
class ApiRequests {
	
    // Add api calls here
    private $sharedContext;
    private $startActivity;
    
    public function Workflow(&$startActivity) {
        $this->startActivity = $startActivity;
    }
    
    public function runWorkflow() {
        $this->sharedContext = new SharedContext();
        $next = $this->startActivity;
        echo "run workflow";
        while($next) {
            $next = $next->run($this->sharedContext);
            echo "in loop";
        }
        return $this->sharedContext;
    }
}