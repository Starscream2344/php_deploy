<div class="main-content">
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card rounded card-stats">
         <div class="card-header">
            <div class="icon">
               <h1 class="fw-bold">Welcome back!</h1>
            </div>
         </div>
         <div class="card-content">
            <h4 class="text-primary text-center"><?=$_SESSION['fname']?> <?=$_SESSION['mname']?> <?=$_SESSION['lname']?></h4>
         </div>
         <div class="card-footer">
            <div class="stats">
               <i class="material-icons text-info">info</i>
               <!-- <a href="#pablo">See detailed Attendance</a> -->
            </div>
         </div>
      </div>
   </div>
</div>

<?php if($teach): ?>
<div class="card rounded p-2">

   <div class="row">
      <?php foreach($teach as $i): ?>
      <div class="col-sm-5 col-md-6 col-sm-6">
         <a href="<?=base_url("teacher/this_class/$i->subjectID/$i->sectionID")?>" class="text-decoration-none">
   
            <div class="card rounded shadow">
               <div class="bg-dark bg-gradient border-bottom p-2 rounded-top">
                  <h5 class="fw-bold text-light text-center text-truncate p-5"><?=$i->subject_name?></h5>
               </div>
               <div class="row p-2">
                  <p class="text-truncate text-decoration-underline fw-bold"><?=$i->section_name?>_<?=$i->subject_name?></p>
               </div>
            </div>
   
         </a>
      </div>
      <?php endforeach; ?>
   </div>


</div>
<?php else:?>
   <div class="card rounded p-2">
      <div class="container p-5">
         <div class="text-center fs-4">Currently not teaching a subject.</div>
      </div>
   </div>
<?php endif;?>


<?php if(isset($accountPass)):?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                  <i class="fa-solid fa-circle-exclamation text-warning"></i> Please Change Your Password
                </h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="fs-4">Change Password</div>
                  <div class="redirect my-4">
                     Please go to your profile settings to change your password.
                  </div>
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <a href="<?=site_url('Teacher_edit')?>"type="button" class="btn btn-primary">Go to Edit Profile Settings</a>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript" defer>
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
<?php endif;?>