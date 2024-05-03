<?php
include './inc/header.php';
?>
<div class="container content dash">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">Adopter Dashboard</h3>
        </div>
        <div class="col-md-4">
        <ul class="list-group">
                    <li class="active list-group-item"><a data-toggle="tab" href="#adoptionsMenu">Adoptions</a></li>
                    <li class="list-group-item"><a data-toggle="tab" href="#childMenu">Children</a></li>
                    <li class="list-group-item"><a data-toggle="tab" href="#profileMenu">My Profile</a></li>
                    <li class="list-group-item"><a class="logout" href="#">Logout</a></li>
                </ul>
        </div>
        <div class="col-md-8" style="position:relative; height:70vh; overflow-y:auto; border:1px solid rgba(0,0,0,0.2); border-radius:5px;">
        <table id="adoptionsMenu" class="fade in active table table-responsive table-hover table- bordered">
                <thead>
                <tr>
                    <td>Titles</td>
                    <td>Titles</td>
                    <td>Titles</td>
                    <td>Titles</td>
                </tr>
</thead>
                <tbody class="items">
                <tr>
                    <td>Titles</td>
                    <td>Titles</td>
                    <td>Titles</td>
                    <td><button data-toggle="modal" class="btn btn-default" data-target="#myModal">Modal</button></td>
                </tr>
                </tbody>
</table>
<div id="childMenu" class="detail fade">errer</div>
<div id="profileMenu" class="detail fade">errer</div>
        </div>
    </div>
</div>


<!-- Sample Modal that any one can use-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send an Inquiry to the administrator</h4>
            </div>
            <div class="modal-body">
            <form id="sendInqForm" class="sendInqForm">
				<div class="input-group">
                <span class="input-group-addon">Name</span>
					<input name="name" type="text" class="name form-control" placeholder="Your Name." required>
				</div>
                <br>
                <div class="input-group">
                <span class="input-group-addon">Email</span>
					<input name="email" type="email" class="email form-control" placeholder="Title of the announcement." required>
				</div>
                <br>
                <div class="input-group">
					<span class="input-group-addon">Request/ Message</span>
					<textarea name="request" class="request form-control" placeholder="You can write your message here..." required></textarea>
				</div>
				<br>

			    <Button type="submit" class="continue btn btn-default">Send to Library Admin &nbsp; <span class="fa fa-envelope"> </span></Button>
                </form>
                </div>
        </div>
    </div>
</div>
<!-- End of my modal-->

<?php
include './inc/footer.php';
?>