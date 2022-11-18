<div class="wrapper">
<div class="body-overlay"></div>
<!-- Sidebar  -->
<nav id="sidebar" class="bg-dark">
   <div class="sidebar-header bg-dark d-flex flex-wrap">

      <img class="rounded-circle me-2" width="40px" height="40px" src="<?=base_url('uploads/')?><?=$_SESSION['avatar']?>" alt="">
      <h3 class="text-underline text-light mt-2">
         <span><?=substr($_SESSION['fname'],0,1)?>. <?=$_SESSION['lname']?></span>
      </h3>
   </div>
   <ul class="list-unstyled components">
      <li  class="<?php if($this->uri->segment(1)=="profile"){echo "active";}?>">
         <a href="<?=base_url('security/profile')?>" class="dashboard"><i class="material-icons">account_circle</i><span>Profile</span></a>
      </li>
      <li  class="<?php if($this->uri->segment(2)=="Security"){echo "active";}?>">
         <a href="<?=base_url('Security')?>" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
      </li>
      <li  class="">
         <a href="<?=base_url('security/facial_recognition')?>"><i class="material-icons">photo_camera</i><span>Facial Recognition</span></a>
      </li>
      <li  class="">
         <a href="<?=base_url('Logout')?>"><i class="material-icons">logout</i><span>Logout</span></a>
      </li>
   </ul>
</nav>
