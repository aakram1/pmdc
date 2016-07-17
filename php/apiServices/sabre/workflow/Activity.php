<?php
interface Activity {
	// each request is an activity we need to run
    function run(&$sharedContext);
}
?>