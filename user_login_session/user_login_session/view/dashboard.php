<?php
namespace Mock;

use \Mock\Member;

if (! empty($_SESSION["userId"])) {
    require_once __DIR__ . './../class/Member.php';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["Firstname"])) {
        $displayName = ucwords($memberResult[0]["Firstname"]);
    } else {
        $displayName = $memberResult[0]["Email"];
    }
}
?>
<html>
<head>
<title>User Login</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div>
        <div class="dashboard">
            <div class="member-dashboard">Welcome <b><?php echo $displayName; ?></b>, You have successfully logged in!<br>
                Click to <a href="./logout.php" class="logout-button">Logout</a>
            </div>
            <div>
                <a href="">Property Form</a>
            </div>
        </div>
    </div>
</body>
</html>