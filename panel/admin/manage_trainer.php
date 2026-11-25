<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Manage Trainers</h4>
            <a class="btn btn-primary text-white" href="add_trainer.php"  style="margin-right: 20px;">Add</a>
          </div>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                     <div class="card">
                
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                         
                        
                           <th> Name</th>
                           <th>Phone</th>
                           <th>Assign Members</th>
                         
                          <th>Actions</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        $stmt = $pdo->prepare('SELECT * FROM trainers WHERE delete_status = 0 ');
                        $stmt ->execute();
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                        <tr>
                            <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i;?></strong>
                          </td>
                           <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['name'];?></strong>
                          </td>

                          
                             <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['phone'];?></strong>
                          </td>
                          

                           <td>

                            <strong   data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key['id'];?>"
                                  >
                                <?php
                                if($key['assign']==''){

                                  echo  "Not Assign Yet";

                                }else{
                                  $members = explode(",", $key['assign']);

foreach ($members as $member_id) {

    $stmtr = $pdo->prepare(
        "SELECT name FROM members 
         WHERE delete_status = 0 
         AND id = ?"
    );
    $stmtr->execute([$member_id]);
    $row = $stmtr->fetch();

    
        echo $row['name'] . "<br>";
   
}
                                }

?>


                                  </strong>
                          </td>
                         
                          <td>
                            <div class="">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editCategory('<?php echo $key['id'];?>', 'edit_trainer.php')"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >

                                <a class="dropdown-item" href="javascript:void(0);"  onclick="deleteCategory('<?php echo $key['id'];?>', 'app/trainer.php')"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                          
                        </tr>


                          <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $key['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Assign Trainer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="app/trainer.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $key['id'];?>">
       
       <div class="col-md-12">
  <select class="form-select select3" name="assign[]" multiple>
    <option value="">Select</option>
      <?php 

                        $stmt1 = $pdo->prepare('SELECT * FROM members WHERE delete_status = 0 and status = 1  ');
                        $stmt1 ->execute();
                        $cat1  =  $stmt1->fetchAll();
                        foreach ($cat1 as $key1) {
                         
                         ?>
    <option value="<?php echo $key1['id']; ?>" ><?php echo $key1['name']; ?></option>
  <?php } ?>
   
  </select>
  
</div>
      </div>
      <div class="modal-footer">
       
        <button type="submit" name="save" class="btn btn-primary">Save</button>
      </div>
       </form>
    </div>
  </div>
</div>

                      <?php $i++; } ?>
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
                  </div>
                </div>
               
              </div>
            </div>
        </div>

<?php include ('include/footer.php'); ?>
<script>
$(document).ready(function () {

  $('.modal').on('shown.bs.modal', function () {
    $(this).find('.select3').select2({
      dropdownParent: $(this),
      width: '100%'
    });
  });

});
</script>