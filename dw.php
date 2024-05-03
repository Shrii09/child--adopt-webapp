<?php
session_start();
if (isset($_SESSION['ocas-user_id']) && !empty($_SESSION['ocas-user_id']) &&
    isset($_SESSION['ocas-user_name']) && !empty($_SESSION['ocas-user_name']) &&
    isset($_SESSION['ocas-user_account']) && $_SESSION['ocas-user_account'] == 'department_worker')
    {
        //setting cokies for the user type to be used when user is loged in
    $cookie_name = "department_worker";
    $cookie_value = $_SESSION['ocas-user_id'];
//set for 30 day most probably a month
    if (!isset($_COOKIE[$cookie_name])) {
        setcookie($cookie_name, $cookie_value, time() + (66400 * 30), "/");
    }
}
else {
    $_SESSION = array();
    session_destroy();
    header("location:./admin-login.php");
}
?>
<?php
include './inc/header.php';
?>
<div class="container content dash">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">Department Worker Dashboard</h3>
        </div>
        <div class="col-md-4">
        <ul class="list-group">
                    <li class="active list-group-item"><a data-toggle="tab" href="#myAppMenu">Assigned Applications</a></li>
                    <li class="list-group-item"><a data-toggle="tab" href="#pendingAppMenu">Pending Applications</a></li>
                    <li class="list-group-item"><a data-toggle="tab" href="#childMenu">Children</a></li>
                    <li class="list-group-item"><a data-toggle="modal" data-target="#profileModal" href="#"><i class="fas fa-user-circle"></i> &nbsp; My Profile</a></li>
                    <li class="list-group-item"><a class="logoutBtn" href="#">Logout</a></li>
                </ul>
        </div>
        <div class="col-md-8 tab-content" style="position:relative; padding-top:10px; height:70vh; overflow-y:auto; border:1px solid rgba(0,0,0,0.2); border-radius:5px;">
        <div class="tab-pane fade in active" id="myAppMenu">
            <table class="table table-striped table-responsive table-hover">
                <tbody>
                <tr>
                    <th>Id</th>
                    <th>Adopter</th>
                    <th>Child</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Update</th>
                </tr>
                </tbody>
                <tbody class="items">
                <tr>
                </tr>
                </tbody>
            </table>
            </div>

    <div class="tab-pane fade in" id="pendingAppMenu">
            <table class="table table-striped table-responsive table-hover">
                <tbody>
                <tr>
                    <th>Id</th>
                    <th>Adopter</th>
                    <th>Child</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Update</th>
                </tr>
                </tbody>
                <tbody class="items">
                <tr>
                </tr>
                </tbody>
            </table>
            </div>

    <div class="tab-pane fade in" id="childMenu">
    <button data-toggle="modal" data-target="#addChild" class="btn btn-default"><i class="fas fa-plus-circle"></i> &nbsp; Add Child</button>
    <br class="clear"/>
            <table class="table table-striped table-responsive table-hover">
                <tbody>
                <tr>
                    <th>Id</th>
                    <th>Names</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>date_added</th>
					<th>Adopted</th>
                    <th>Options</th>
                </tr>
                </tbody>
                <tbody class="items">
                <tr>
                </tr>
                </tbody>
            </table>
            </div>

        </div>
    </div>
</div>

<!-- App Modal -->
<div id="appModal" style="" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adoption Application</h4>
            </div>
            <div class="modal-body">
            <div id="appForm" class="row appForm" data-id="<?php echo $_SESSION['ocas-user_id'];?>">
				
               
        
                 
                </div>
                
                </div>
        </div>
    </div>
</div>

<!-- Sample Modal that any one can use-->
<div id="profileModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile</h4>
            </div>
            <div class="modal-body">
            <form id="profileForm" class="profileForm" data-id="<?php echo $_SESSION['ocas-user_id'];?>">
				<div class="input-group">
                <span class="input-group-addon">Full name</span>
					<input name="name" type="text" class="name form-control" placeholder="Your Full name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Gender</span>
					<select name="" class="gender form-control">
                        <option value="0">Select your gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Email</span>
					<input name="email" type="email" class="email form-control" placeholder="email address" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Telephone</span>
					<input name="email" type="text" class="telephone form-control" placeholder="Telephone" required>
				</div>
                <br>
                 <Button type="submit" class="continue btn btn-default">Save &nbsp; <span class="fas fa-save"> </span></Button>
                </form>
                <form class="changePasswordDw" id="changePasswordDw">
                    <h3>Change Password</h3>
                    <div class="input-group">
                    <span class="input-group-addon">Password</span>
                        <input name="password" type="password" class="password form-control" placeholder="New Password" required>
                    </div>
                    <br>
                    <Button type="submit" class="btn btn-default">Change Password &nbsp; <span class="fas fa-asterisk"> </span></Button>
                </form>
                <form class="changeImageDw" id="changeImageDw" method="post" enctype="multipart/form-data">
                    <h3>Change Image</h3>
                    <img src="" class="img img-responsive img-thumbnail">
                    <div class="input-group">
                    <span class="input-group-addon">Image</span>
                        <input name="user_image" id="user_image" type="file" class="user_image form-control" placeholder="New Image" required>
                    </div>
                    <br>
                    <Button type="submit" class="btn btn-default">Update Image &nbsp; <span class="fas fa-upload"> </span></Button>
                </form>
                </div>
        </div>
    </div>
</div>
<!-- End of my modal-->
<!-- Add DW  Modal that any one can use-->
<div id="addChild" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Child</h4>
            </div>
            <div class="modal-body">
            <form id="addChildform" class="addChildform">
				<div class="input-group">
                <span class="input-group-addon">First Name</span>
					<input name="name" type="text" class="first_name form-control" placeholder="First Name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Middle Name</span>
					<input name="name" type="text" class="middle_name form-control" placeholder="Middle Name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Last Name</span>
					<input name="name" type="text" class="last_name form-control" placeholder="Last Name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Gender</span>
					<select name="" class="sex form-control">
                        <option value="0">Select your gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Date of Birth</span>
					<input name="name" type="date" class="date_of_birth form-control" placeholder="Date of Birth" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">About</span>
					<textarea name="about" class="about form-control" placeholder="About" required></textarea>
				</div>
                <br>            

			    <Button type="submit" class="continue btn btn-default">Submit & save &nbsp; <span class="fas fa-paper-plane"> </span></Button>
                </form>
                </div>
        </div>
    </div>
</div>
<!-- End of my modal-->

<!-- Update DW  Modal that any one can use-->
<div id="updateChild" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Department Worker</h4>
            </div>
            <div class="modal-body">
            <form id="updateChildForm" class="updateChildForm">
            <div class="input-group">
                <span class="input-group-addon">First Name</span>
					<input name="name" type="text" class="first_name form-control" placeholder="First Name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Middle Name</span>
					<input name="name" type="text" class="middle_name form-control" placeholder="Middle Name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Last Name</span>
					<input name="name" type="text" class="last_name form-control" placeholder="Last Name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Gender</span>
					<select name="" class="sex form-control">
                        <option value="0">Select your gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Date of Birth</span>
					<input name="name" type="date" class="date_of_birth form-control" placeholder="Date of Birth" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">About</span>
					<textarea name="about" class="about form-control" placeholder="About" required></textarea>
				</div>
                <br> 
                              

			    <Button type="submit" class="continue btn btn-default">Submit & save &nbsp; <span class="fas fa-paper-plane"> </span></Button>
                </form>
                <form class="changeImageChild" id="changeImageChild" method="post" enctype="multipart/form-data">
                    <h3>Change Image</h3>
                    <img src="" class="img img-responsive img-thumbnail">
                    <div class="input-group">
                    <span class="input-group-addon">Image</span>
                        <input name="user_image" id="" type="file" class="user_image form-control" placeholder="New Image" required>
                    </div>
                    <br>
                    <Button type="submit" class="btn btn-default">Update Image &nbsp; <span class="fas fa-upload"> </span></Button>
                </form>
                </div>
        </div>
    </div>
</div>
<!-- End of my modal-->
<?php
include './inc/footer.php';
?>
<script src="./js/dw.js"></script>