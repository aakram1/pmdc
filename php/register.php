<?php

// dbname: pmdcregister
// table-name: UserInfo
// DB, DBUSER, DBPASS, DBSERVER, USERS

// require common code
    require_once("php/inc/common.inc"); 


/* check table for username- inherited username */

// username and password sent from form
$username=$_POST['username'];
$password=$_POST['password'];

// To protect from MySQL injection 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

    // try finding username
    $sql = "SELECT * FROM USERS WHERE username='$username'";
                   
//$result = mysql_query($sql);
//if (!isset($result))

// put this in a function? So that result can be outputted on the current page. 

// if username is not found
if (!mysql_query($sql))
  {
// then insert username into table and...  
mysql_query("INSERT INTO USERS (username, password) VALUES ('$username', '$password')");
// redirect user to the successful login page
// redirect("menu.php");
  }
  // else tell user already exists (how? popup / new page / reload this page? / redirect to login and tell username taken 
echo "Username already exists";

    // if we found a row, remember user and redirect to portfolio
    if (mysql_num_rows($result) == 1)
    {
        // grab row
        $row = mysql_fetch_array($result);

        // cache uid in session
        $_SESSION["uid"] = $row["uid"];

        // redirect to portfolio
        redirect("index.php");
    }

    // else report error
    else
        apologize("Invalid username and/or password!");


// if failure, insert into new row, username/password


// store unique id in a variable - session


// redirect to user's page

?>
