<?php 
session_start();
include '../assets/constant/config.php';

?>
<?php include ('app/check_login.php'); ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" style="padding-left: 2rem;">
           <!--  <img
                          src="../assets/img/logo/lmslogo.png"
                          alt="user-avatar"
                         
                          height="150"
                          width="150"
                         
                        /> -->
                        <strong style="height: 50px;
                          width : 50px; font-size: 30;" class="text-uppercase">Bodytone</strong>
         
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->



            <li class="menu-item active">
              <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>


            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-bookmarks"></i>
                <div data-i18n="Form Layouts">Membership Plans</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_plans.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_plans.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
              
              </ul>
            </li>


              <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Form Layouts">Members</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_customer.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_customer.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>



               <li class="menu-item">
              <a href="manage_attendance.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Attendance</div>
              </a>
              
            </li>



             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Form Layouts">Trainer</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_trainer.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_trainer.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>


             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-plus"></i>
                <div data-i18n="Form Layouts">Assets Category</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_category.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_category.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>


             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Assets</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_assets.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_assets.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>


                 <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Report</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="member_report.php" class="menu-link">
                    <div data-i18n="Vertical Form">Member Report</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="assets_report.php" class="menu-link">
                    <div>Assets Report</div>
                  </a>
                </li>
               
              </ul>
            </li>



            <!-- frontend start -->


            <strong class="text-danger" style="padding-left: 4rem;
    font-size: 20;">Frontend</strong>


           <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Form Layouts">Services</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_service.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_service.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>


             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Form Layouts">Blog</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_blog.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_blog.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>


             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div data-i18n="Form Layouts">Gallery</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_gallery.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_gallery.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>



             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Form Layouts">Class</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_class.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_class.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>



           <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Form Layouts">Testimonial</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_testimonial.php" class="menu-link">
                    <div data-i18n="Vertical Form">Add</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="manage_testimonial.php" class="menu-link">
                    <div>Manage</div>
                  </a>
                </li>
               
              </ul>
            </li>

            


             <li class="menu-item">
              <a href="manage_contact.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-phone"></i>
                <div data-i18n="Form Layouts">Contact</div>
              </a>
            
            </li>


            <li class="menu-item">
              <a href="manage_comment.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-phone"></i>
                <div data-i18n="Form Layouts">Feedback</div>
              </a>
             
            </li>


          
            





          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" >
              <!-- Search -->
               <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                   <h4 class="fw-bold mt-2 ">Admin Dashboard</h4>
                </div>
              </div> 
              <!-- /Search -->
             

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
            

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <?php if(isset($_SESSION['user_id'])){ ?>

                      <img src="../assets/img/avatars/<?php echo $_SESSION['photo']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                       <?php }else{?>
<img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                <?php  } ?>
                    </div>
                 
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                                <?php if(isset($_SESSION['user_id'])){ ?>

                      <img src="../assets/img/avatars/<?php echo $_SESSION['photo']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                       <?php }else{?>
<img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                <?php  } ?>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">
<?php if(isset($_SESSION['user_id'])){
echo $_SESSION['name'];
} ?>
                            </span>
                            <!-- <small class="text-muted">Admin</small> -->
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>

                     <li>
                      <a class="dropdown-item" href="change_pw.php">
                        <i class="bx bx-lock me-2"></i>
                        <span class="align-middle">Change Password</span>
                      </a>
                    </li>

                    <li>
                      <a class="dropdown-item" href="update_profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                   
                   
                 
                    <li>
                      <a class="dropdown-item" href="../logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

<?php if(isset($_SESSION['success'])){?>
           <div class="bs-toast toast fade show bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
                        <div class="toast-header">
                          <i class="bx bx-bell me-2"></i>
                          <div class="me-auto fw-semibold">  <?php echo $_SESSION['success']; ?></div>
                        
                          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                      
                      </div>

                      <?php
                      unset($_SESSION['success']);

                       } ?>



                       <?php if(isset($_SESSION['error'])){?>
           <div class="bs-toast toast fade show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000">
                        <div class="toast-header">
                          <i class="bx bx-bell me-2"></i>
                          <div class="me-auto fw-semibold">  <?php echo $_SESSION['error']; ?></div>
                        
                          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                      
                      </div>

                      <?php
                      unset($_SESSION['error']);

                       } ?>

                      <script>
document.addEventListener("DOMContentLoaded", function(){
    var toastEl = document.querySelector('.toast');
    if (toastEl) {
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    }
});
</script>