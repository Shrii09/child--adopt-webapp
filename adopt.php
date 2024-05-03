<?php
session_start();
if (isset($_SESSION['ocas-user_id']) && !empty($_SESSION['ocas-user_id']) &&
    isset($_SESSION['ocas-user_name']) && !empty($_SESSION['ocas-user_name']) &&
    isset($_SESSION['ocas-user_account']) && $_SESSION['ocas-user_account'] == 'adopter')
    {
        //setting cokies for the user type to be used when user is loged in
    $cookie_name = "adopter";
    $cookie_value = $_SESSION['ocas-user_id'];
//set for 30 day most probably a month
    if (!isset($_COOKIE[$cookie_name])) {
        setcookie($cookie_name, $cookie_value, time() + (66400 * 30), "/");
    }
}

?>
<?php
include './inc/header.php';
?>
<div class="container content">

    <div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Meet the children.</h3>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
    <p style="width:100%;" class="pull-left">The children served by the system/ this website are in need of families. All of them dream of having a permanent family that will always be there for them, a family to give them a lifetime of love. Here are the profiles of some of our children.</p>
    </div>
    </div>
    <br/>
    <div id="childList" class="row team">
        
    </div>
</div>

<?php
include './inc/footer.php';
?>