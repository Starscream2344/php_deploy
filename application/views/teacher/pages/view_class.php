<div class="card-body border border-top-0 mb-2">
      <div class="row">
        <div class="card-content table-responsive">
            <table class="table table-bordered">
                <thead class="fw-bold">
                    <tr>
                        <td colspan="2" class="text-center">
                            <h5 class="fw-bold">Class Schedules</h5>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($schedule_subject as $i):?>
                    <tr class="text-center">
                        <td class="fw-semibold"><?=$i->weekday?></td>
                        <td><?=$i->schedule_start?>-<?=$i->schedule_end?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>


         <div class="row">

               <div class="card-content table-responsive mb-2 p-2">
                  <table class="table">
                     <thead>
                        <tr class="fw-bold">
                           <td>Number</td>
                           <td>School ID</td>
                           <td>Firstname</td>
                           <td>Middlename</td>
                           <td>Lastname</td>
                           <td>Year/Grade level</td>
                           <td></td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $count = 1?>
                        <?php if(!$students):?>
                           <tr>
                              <td colspan="6" class="text-center">No Student..</td>
                           </tr>
                        <?php endif;?>
                        <?php foreach($students as $i): ?>
                        <tr>
                            <td><?=$count++?></td>
                            <td><?=$i->userID?></td>
                            <td><?=$i->fname?></td>
                            <td><?=$i->mname?></td>
                            <td><?=$i->lname?></td>
                            <td><?=$i->grade_title?></td>
                        </tr>
                        <?php endforeach;?>
                     </tbody>
                  </table>
               </div>

         </div>

      </div>
   </div>
</div>