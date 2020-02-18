<?php include "header.php"; ?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>


    <!-- Begin Page Content -->
        <div class="container-fluid">
    
      
        <div class="row">
       
          <div class="col-md-12 col-lg-12 mb-5">
          <img src="img/in.png" width="300px;">
            
          
            <form action="check_login_admin.php"  method="post" class="p-5 bg-white">
			
			<div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">เข้าสู่ระบบ <span class="style1">สำหรับเจ้าหน้าที่</span></label>
         
                </div>
              </div>
			  
			  

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Username</label>
                  <input type="text" name="Username" id="member_user" class="form-control" placeholder="Username" required>
                </div>
              </div>
			  
              <div class="row form-group">
                <div class="col-md-6">
                  <label class="font-weight-bold" for="email">Password</label>
                  <input type="password" name="Password" id="member_pass" class="form-control" placeholder="Password" required>
                </div>
              </div>


             

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="เข้าสู่ระบบ" class="btn btn-primary text-white px-4 py-2">
				 
                </div>
              </div>

  
            </form>
          </div>

          
            
            
          </div>
        </div>






    <?php include"footer.php";?>