 <h1 class="page-header"><?=$title?></h1>
<div class="row">
<div class="col-md-12">
<form method="POST" action="<?=base_url('backend/dashboard/editUser')?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="user_email"  name="user_email" value="<?=$user->user_email?>" placeholder="Enter email">
  </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="user_password" name="user_password" value="" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="firstname">First name</label>
    <input type="text" class="form-control" id="user_firstname" name="user_firstname" value="<?=$user->user_firstname?>" placeholder="Password">
  </div>
    <div class="form-group">
    <label for="firstname">Last name</label>
    <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?=$user->user_lastname?>" placeholder="Password">
  </div>
<input type="hidden" name="user_id" value="<?=$user->user_id?>"/>

  <button type="submit" class="btn btn-default">Update</button>
</form>
</div>
</div>