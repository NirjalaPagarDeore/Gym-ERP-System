<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Members Attendance</h4>
            
          </div>
                

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                     <div class="card">
                
                <div class="card-body">
                  <h4 class="fw-bold mb-0">Todays Date <?php echo date('d/m/Y'); ?></h4>
                  <div class="table-responsive text-nowrap">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                         
                        
                           <th> Name</th>
                          
                          <th>Login Time</th>
                        <th>Logout Time</th>
                        </tr>
                      </thead>
                   <tbody>
<?php 
$stmt = $pdo->prepare("
    SELECT 
        m.*,
        s.login_time,
        s.logout_time
    FROM members m
    LEFT JOIN member_sessions s 
        ON m.id = s.member_id 
        AND s.session_date = CURDATE()
    WHERE m.delete_status = 0
");
$stmt->execute();
$members = $stmt->fetchAll();

$i = 1;
foreach ($members as $key) {

$loginChecked  = $key['login_time']  ? 'checked' : '';
$logoutChecked = $key['logout_time'] ? 'checked' : '';

$loginTime  = $key['login_time']  ? date("h:i A", strtotime($key['login_time']))  : '--';
$logoutTime = $key['logout_time'] ? date("h:i A", strtotime($key['logout_time'])) : '--';
?>
<tr>
    <td><strong><?= $i++; ?></strong></td>

    <td><strong><?= $key['name']; ?></strong></td>

    <!-- LOGIN -->
    <td>
        <input type="checkbox"
               class="login-check"
               data-id="<?= $key['id']; ?>"
               <?= $loginChecked; ?>>
        <strong id="login_time_<?= $key['id']; ?>"><?= $loginTime; ?></strong>
    </td>

    <!-- LOGOUT -->
    <td>
        <input type="checkbox"
               class="logout-check"
               data-id="<?= $key['id']; ?>"
               <?= $logoutChecked; ?>>
        <strong id="logout_time_<?= $key['id']; ?>"><?= $logoutTime; ?></strong>
    </td>
</tr>
<?php } ?>
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
document.querySelectorAll('.login-check').forEach(cb => {
    cb.addEventListener('change', function(){
        let member_id = this.dataset.id;

        if(this.checked){
            fetch("attendance.php", {
                method: "POST",
                headers: {"Content-Type":"application/json"},
                body: JSON.stringify({
                    member_id: member_id,
                    action: "login"
                })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById("login_time_"+member_id).innerText = data.login_time;
                document.querySelector(`.logout-check[data-id="${member_id}"]`).checked = false;
            });
        }
    });
});

document.querySelectorAll('.logout-check').forEach(cb => {
    cb.addEventListener('change', function(){
        let member_id = this.dataset.id;

        if(this.checked){
            fetch("attendance.php", {
                method: "POST",
                headers: {"Content-Type":"application/json"},
                body: JSON.stringify({
                    member_id: member_id,
                    action: "logout"
                })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById("logout_time_"+member_id).innerText = data.logout_time;
                document.querySelector(`.login-check[data-id="${member_id}"]`).checked = false;
            });
        }
    });
});
</script>
