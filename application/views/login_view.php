<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh; margin: 0;">
  <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
    <div class="text-center mb-4">
      <i class="bi bi-person-circle" style="font-size: 50px; color: #6c757d;"></i>
      <?php
$pesan=$this->session->flashdata('pesan');
	if ($pesan=="")
	{
		echo "";	
	}
	else
	{

	?>
	
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <button type="button" class="btn btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
  </button>
  
<?php echo $pesan; ?>                        
	</div>
	
<?php
	}
?>
      <h4>Halaman Login</h4>
    </div>
    <form nama="formlogin" id="formlogin" method="post" action="<?php echo base_url('halaman/proseslogin'); ?>">
      <div class="mb-3">
        <label for="Username" class="form-label">Username</label>
        <input type="text" class="form-control" id="Username" placeholder="Masukkan username" name="Username">
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="Password" class="form-control" id="Password" placeholder="Masukkan password" name="Password">
      </div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="rememberMe" value="">
          <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div> 
        <a href="#" class="text-decoration-none">Forgot Password?</a>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>js/scripts.js"></script>
       	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script language="javascript">
        	function proseslogin()
			{
				var Username=$('#Username').val();
				if(Username=="")
				{
					alert("Username masih kosong");
					$('#Username').focus();
					return false;
				}	
				
				var Password=$('#Password').val();
				if(Password=="")
				{
					alert("Password masih kosong");
					$('#Password').focus();
					return false;
				}	
			}
        </script>
</body>
</html>
