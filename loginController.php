<?php ?>
<!DOCTYPE HTML>
<html>
    <head>
        <style>
            /* To center align table class */
            div.errorMsg 
            {
                margin:0;
                position:absolute;
                top:43%;
                left:50%;
                -ms-transform:translate(-50%, -50%);
                transform:translate(-50%, -50%);
                color:red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
<?php
// To send to entity if validation is successful
include ("user.php");
// File 'connectDB.php' for connecting to database
include ("dbFunctions.php");

class loginController {

    // Variables
    private $userid;
    private $password;

    // Contructor
    public function __construct($userid, $password) {
        $this->userid = $userid;
        $this->password = $password;
    }

    // Deconstructor
    public function __destruct() {
        
    }

    function validateInput() {
        // Variables
        $userid = $this->userid;
        $password = $this->password;

        // Check if either input is null
        if ($userid != '' && $password != '') {
            // Variable
            global $link;

            // Query the database for user
            $sql = "SELECT * FROM user WHERE userID = '$userid' AND password = '$password'";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            $row = mysqli_fetch_array($result);
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['fName'] = $row['fName'];
            $_SESSION['lName'] = $row['lName'];
            $_SESSION['userImage'] = $row['userImage'];
            $_SESSION['userType'] = $row['userType'];

            // Stay on login page if no user found
            if (empty($row)) {
                echo "<div class=errorMsg>Incorrect login details</div>";
            } else {
                $login = new User();
                $login->goToPage();
            }
        } else {
            // If there is empty input
            echo "<div class=errorMsg>Please enter input into empty fields</div>";
        }
    }

}
?>
    </body>
</html>