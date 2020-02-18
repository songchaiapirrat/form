<?php include "header.php"; ?>

 

       <!-- Begin Page Content -->
        <div class="container-fluid">
      
        <div class="row">
       
          <div class="col-md-12 col-lg-12 mb-5">
          <img src="img/in.png" width="300px;">
            
          
            <form action="check_login.php"  method="post" class="p-5 bg-white" >
			
			<div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">เข้าสู่ระบบ FMS <sub>Form</sub>
         
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
                  <input type="submit" value="เข้าสู่ระบบ" class="btn btn-primary text-white px-4 py-2">&nbsp;&nbsp;
				  <a href="login_admin.php" class="btn btn-danger text-white px-4 py-2" > สำหรับเจ้าหน้าที่ </a>
                </div>
              </div>

  
            </form>
          </div>

          
            
            
          </div>
        </div>






    <?php include"footer.php";?>