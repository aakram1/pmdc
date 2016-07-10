<?
    /****************************
     * Common Code
     ****************************/


    // display errors
    ini_set("display_errors", true);
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

    // requirements
    require_once("constants.inc");
    require_once("helpers.inc");

    // enable sessions
    session_start();

    // require authentication for most pages
    if (!preg_match("/(:?log(:?in|out)|register)\d*\.php$/", $_SERVER["PHP_SELF"]))
    {
        if (!isset($_SESSION["uid"]))
            redirect("login.php");
			}

    // connect to database server
    if (($connection = mysql_connect(DBSERVER, DBUSER, DBPASS)) === FALSE)
        apologize("Could not connect to database server: " . DBSERVER);

    // select database
    if (mysql_select_db(DB, $connection) == FALSE)
        apologize("Could not select database: " . DB);

?>
