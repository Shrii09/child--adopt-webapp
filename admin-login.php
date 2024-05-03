<?php
session_start();
if (isset($_SESSION['ocas-user_id']) && !empty($_SESSION['ocas-user_id']) &&
    isset($_SESSION['ocas-user_name']) && !empty($_SESSION['ocas-user_name']) &&
    isset($_SESSION['ocas-user_account']) && $_SESSION['ocas-user_account'] == 'admin')
    {
		header("location:./console.php");
}
else if (isset($_SESSION['ocas-user_id']) && !empty($_SESSION['ocas-user_id']) &&
    isset($_SESSION['ocas-user_name']) && !empty($_SESSION['ocas-user_name']) &&
    isset($_SESSION['ocas-user_account']) && $_SESSION['ocas-user_account'] == 'department_worker')
    {
		header("location:./dw.php");
}
else {
    $_SESSION = array();
    session_destroy();
}
?>
<?php
include './inc/header.php';
?>
<div class="container content account">
    <div class="row">
      <div class="col-md-6" style="height:90vh; ">
      <form class="adminLogin">
			<br/>
				<br/>
                <h3 class="text-left page-header">Login in to Admin Console</h3>
				<div class="input-group">
					<span class="input-group-addon">Login in as</span>
					<select name="" class="loginType form-control">
						<option value="1">System Admin</option>
						<option value="2">Department Worker</option>
					</select>
				</div>
				<br/>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input name="username" type="username" class="username form-control" placeholder="Username" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
					<input name="password" type="password" class="password form-control" placeholder="Password" required>
			</div>
			<br>
			<Button type="submit" class="continue btn btn-default">Login <span class="fa fa-angle-right"></span></Button>
			</form>
    </div> 
    
    </div> 
</div>

<?php
include './inc/footer.php';
?>
<script src="./js/sys_admin.js"></script>