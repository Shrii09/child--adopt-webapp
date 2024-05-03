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
<div class="container content profile" data-id="<?php echo $_GET['id']; ?>">

    <div class="row">
    <div class="col-md-12">
        <a href="./adopt.php"class=""><i class="fas fa-angle-double-left"> </i> &nbsp; Back to the children.</a>
    </div>
    <div class="col-md-12">
        <h3 class="page-header allNames"></h3>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <img src="./img/default.png" class="imageEdit img img-responsive img-thumbnail">
    <br/>
    <h4 class="dob"></h4>
   
    <h4 class="idNumber"></h4>
    
    <h4 class="updated"></h4>
    
    <h4 class="gender"></h4>
</div>
    <div class="col-md-8">
    <h4 class="page-header">
        About:
    </h4>
    <br/>
    <p class="about"></p>
    <a data-toggle="modal" data-target="#adoptModal" class="AdoptBtn btn btn-lg btn-default" href="#">Adopt</a>
    </div>
    </div>
    <br/>
    
    
    </div>
</div>

<?php
include './inc/footer.php';
?>
<script>
    $(function(){
        var custum_id = $('.profile').attr("data-id");
        var formsSettings = {
            "type": "GET",
            "dataType": "json",
            "url": "api/child/" + custum_id
        };

        $.ajax(formsSettings).success(function (response) {
          
            if (response.status == 'failed' || response.status == 'error') {
                notify("Failed to get department worker data", "warning");

            } else if (response.status == 'success') {
                console.log(JSON.stringify(response));
                var appendData = "";
                $.each(response.data, function (key, value) {
                  $('.allNames').html(value.first_name +' '+value.middle_name+' '+value.last_name);
                  $('.imageEdit').attr("src","./uploads/"+value.user_image);
                  $('.dob').html("Date of Birth: "+value.date_of_birth);
                  $('.idNumber').html("Id no: "+value.id);
                  $('.updated').html("Updated: "+value.date_added);
                  $('.gender').html("Gender: "+value.sex);
                  $('.about').html(value.about);
                  $('.AdoptBtn').attr('data-id',value.id);

                  //Updated: 4/20/201
                });
                $(".AdoptBtn").click(function (e) {
                    e.preventDefault();
                    var id = $(this).attr("data-id");
                    //Apply(id);
                }); 
            }

        });
    });

 function Apply(child_id) {
        var myId = $('.active-account').attr("data-id");
        if (!myId){
            window.location.href='./account.php';
        }
        var formdata = {
            "adopter_id": myId,
            "child_id": child_id,
        };

        console.log(JSON.stringify(formdata));
        var formSettings = {
            "type": "POST",
            //"dataType": "json",
            "data": formdata,
            "url": "api/adopt",
        };

        $.ajax(formSettings).success(function (response) {
            if (response.status == 'failed' || response.status == 'error') {
                console.log(JSON.stringify(response));
                notify("Failed to save data, please try again :" + JSON.stringify(response), "warning");
            } else if (response.status == 'success') {

                //thisApp.get_dw();
                console.log(JSON.stringify(response));
                notify("Child Application has been submitted", "success");
                setTimeout(function () {
                    window.location.href='./dash.php';
                }, 2000);

            } else {

            }

        }).error(function(response){
            console.log(JSON.stringify(response));
        });
    }
</script>