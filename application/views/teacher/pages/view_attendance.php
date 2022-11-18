<div class="card-body border border-top-0 mb-2">
   <div class="row mb-4">
      <h4 class="fw-bold"><i class="fa-solid fa-calendar-check"></i> View Attendance</h4>
   </div>
   <hr>
    <div class="row">
            <div class="card-content table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="fw-bold">
                        <tr>
                            <td>Number</td>
                            <td>Date</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        <?php foreach($attendance as $i):?>
                        <tr>
                            <td style="white-space: nowrap; width: 1%;"><?=$count++?></td>
                            <td><?=$i->date?></td>
                            <td style="white-space: nowrap; width: 1%;">
                                <a href="<?=base_url('teacher/edit_attendance/'.$this->uri->segment(3)."/".$this->uri->segment(4)."/$i->attendanceID")?>" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$i->attendanceID?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
    </div>


</div>

<?php foreach($attendance as $i):?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$i->attendanceID?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">
        <h5 class="modal-title" id="exampleModalLabel">Danger: Continue Delete Record?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?=form_open("Teacher/delete_attendance/".$this->uri->segment(3)."/".$this->uri->segment(4)."/$i->attendanceID")?>
      <div class="modal-body">
         Want to delete this record forever?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete Record</button>
      </div>
      <?=form_close();?>
    </div>
    

  </div>

</div>
<?php endforeach; ?>
