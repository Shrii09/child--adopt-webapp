<?php
session_start();
if (isset($_SESSION['ocas-user_id']) && !empty($_SESSION['ocas-user_id']) &&
    isset($_SESSION['ocas-user_name']) && !empty($_SESSION['ocas-user_name']) &&
    isset($_SESSION['ocas-user_account']) && $_SESSION['ocas-user_account'] == 'admin')
    {
        //setting cokies for the user type to be used when user is loged in
    $cookie_name = "adminId";
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
            <h3 class="page-header">Dashboard</h3>
        </div>
        <div class="col-md-4">
        <ul class="list-group">
                    <li class="active list-group-item"><a data-toggle="tab" href="#dwMenu">Department Workers</a></li>
                    <li class="list-group-item"><a data-toggle="tab" href="#adoptersMenu">Adopters</a></li>
                    <li class="list-group-item"><a data-toggle="modal" data-target="#profileModal" href="#"><i class="fas fa-user-circle"></i> &nbsp; My Profile</a></li>
                    <li class="list-group-item"><a class="logoutBtn" href="#">Logout</a></li>
                </ul>
        </div>
        <div class="col-md-8 tab-content" style="position:relative; padding-top:10px; height:70vh; overflow-y:auto; border:1px solid rgba(0,0,0,0.2); border-radius:5px;">
        <div class="tab-pane fade in active" id="dwMenu">
            <button data-toggle="modal" data-target="#addDW" class="btn btn-md btn-default">
                <i class="fas fa-plus-circle"></i> Add Department Worker
            </button>
            <br class="clear"/>
            <table id="" class="table table-striped table-responsive table-hover">
                <tbody>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Options</th>
                </tr>
                </tbody>
                <tbody class="items">
                <tr>
                <td>Id</td>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Gender</td>
                    <td>Telephone</td>
                    <td>Email</td>
                    <td>
                        <button title="Delete" data-toggle="modal" class="btn btn-xs btn-default" data-target="#myModal">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button title="Update" data-toggle="modal" class="btn btn-xs btn-default" data-target="#myModal">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
<div id="adoptersMenu" class="tab-pane detail fade">
            <br class="clear"/>
            <table id="" class="table table-striped table-responsive table-hover">
                <tbody>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Residence</th>
                    <th>Nationality</th>
                    <th>Options</th>
                </tr>
                </tbody>
                <tbody class="items">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Gender</td>
                    <td>Telephone</td>
                    <td>Email</td>
                    <td>Residence</td>
                    <td>Nationality</td>
                    <td>
                        <button title="Delete" data-toggle="modal" class="btn btn-xs btn-default" data-target="#myModal">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
</div>
<div id="appMenu" class="tab-pane detail fade">errer</div>
        </div>
    </div>
</div>


<!-- Sample Modal that any one can use-->
<div id="profileModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send an Inquiry to the administrator</h4>
            </div>
            <div class="modal-body">
            <form id="profileForm" class="profileForm" data-id="<?php echo $_SESSION['ocas-user_id'];?>">
				<div class="input-group">
                <span class="input-group-addon">Full name</span>
					<input name="name" type="text" class="full_names form-control" placeholder="Your Full name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Email</span>
					<input name="email" type="email" class="email form-control" placeholder="email address" required>
				</div>
                <br>
                 <Button type="submit" class="continue btn btn-default">Save &nbsp; <span class="fas fa-save"> </span></Button>
                </form>
                </div>
        </div>
    </div>
</div>
<!-- End of my modal-->
<!-- Add DW  Modal that any one can use-->
<div id="addDW" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Departmanet Worker</h4>
            </div>
            <div class="modal-body">
            <form id="addDWform" class="addDWform">
				<div class="input-group">
                <span class="input-group-addon">Name</span>
					<input name="name" type="text" class="name form-control" placeholder="Name" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Username</span>
					<input name="username" type="text" class="username form-control" placeholder="username" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Gender</span>
					<select name="gender" class="gender form-control">
                        <option selected value="0">Select a gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Telephone</span>
					<input name="telephone" type="text" class="telephone form-control" placeholder="Telephone" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Email</span>
					<input name="email" type="email" class="email form-control" placeholder="Email" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Password</span>
					<input name="password" type="password" class="password form-control" placeholder="Password" required>
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
<div id="updateDW" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Department Worker</h4>
            </div>
            <div class="modal-body">
            <form id="updateDWForm" class="addDWform">
				<div class="input-group">
                <span class="input-group-addon">Name</span>
					<input name="name" type="text" class="name form-control" placeholder="Name" required>
				</div>
                <br>
                
                <div class="input-group">
                <span class="input-group-addon">Gender</span>
					<select name="gender" class="gender form-control">
                        <option selected value="0">Select a gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Telephone</span>
					<input name="telephone" type="text" class="telephone form-control" placeholder="Telephone" required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Email</span>
					<input name="email" type="email" class="email_address form-control" placeholder="Email" required>
				</div>
                <br>
                              

			    <Button type="submit" class="continue btn btn-default">Submit & save &nbsp; <span class="fas fa-paper-plane"> </span></Button>
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
<?php
include './inc/footer.php';
?>
<script src="./js/console.js"></script>