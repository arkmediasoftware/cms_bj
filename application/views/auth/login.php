
<div class="login-form">
  <div class="alert alert-danger" role="alert" style="display:none;"></div>
	<form id="login-form" method="post" action="<?php echo base_url()?>auth/login">
    <div class="form-group">
      <input type="text" class="form-control login-field" name="username" id="username" placeholder="Username" required />
      <label class="login-field-icon fui-user" for="username"></label>
    </div>

    <div class="form-group">
      <input type="password" class="form-control login-field" name="password" id="password" placeholder="Password" required />
      <label class="login-field-icon fui-lock" for="password"></label>
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
    <a class="login-link" href="#">Lost your password?</a>
</form>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $("#login-form").validate();
  $("#login-form").ajaxForm({
    dataType:'json',
    success: function(data){
      if(data.status == 'failed') {
        $(".alert").html(data.message).slideDown('slow');
      } else {
        $(".alert").slideUp('slow');
        location.reload();
      }
    }
  });
  
})
</script>
