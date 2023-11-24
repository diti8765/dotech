<?php
  include('header.php');
  if(isset($_SESSION['email'])){
  include('../includes/connection.php');
 

  // Find total feedbacks
  $query = "select * from feedback";
  $query_run = mysqli_query($connection,$query);
  $total_feedback = mysqli_num_rows($query_run);

  // Poor Feedback percentage
  $query = "select * from feedback where rating = 'Poor'";
  $query_run = mysqli_query($connection,$query);
  $poor_feedback = mysqli_num_rows($query_run);
  $poor_feedback_percentage = round(($poor_feedback / $total_feedback) * 100,2);

  // Good Feedback percentage
  $query = "select * from feedback where rating = 'Good'";
  $query_run = mysqli_query($connection,$query);
  $good_feedback = mysqli_num_rows($query_run);
  $good_feedback_percentage = round(($good_feedback / $total_feedback) * 100,2);

  // Excellent Feedback percentage
  $query = "select * from feedback where rating = 'Excellent'";
  $query_run = mysqli_query($connection,$query);
  $Excellent_feedback = mysqli_num_rows($query_run);
  $Excellent_feedback_percentage = round(($Excellent_feedback / $total_feedback) * 100,2);

 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Dashboard</title>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#view_users").click(function(){
          $("#action_div").load("view_users.php");
        });

        $("#edit_users").click(function(){
          $("#action_div").load("edit_users.php");
        });

        $("#edit_menu").click(function(){
          $("#action_div").load("edit_menu.php");
        });
      });
    </script>
  </head>
  <body style="background:url('images/08.jpg') no-repeat;">
    <br><br><br>
    <div class="row" style="margin-left:15px;margin-right:15px;">

      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <h3>Feedback</h3>
          </div>
          <div class="card-body">
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $poor_feedback_percentage . '%'; ?>;" aria-valuenow="<?php echo $poor_feedback_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $poor_feedback_percentage . '%'; ?></div>
            </div> <br>
            <div class="progress">
              <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $good_feedback_percentage . '%'; ?>;" aria-valuenow="<?php echo $good_feedback_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $good_feedback_percentage . '%'; ?></div>
            </div> <br>
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $Excellent_feedback_percentage . '%'; ?>;" aria-valuenow="<?php echo $Excellent_feedback_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $Excellent_feedback_percentage . '%'; ?></div>
            </div>
          </div>
          <div class="card-footer">
            Poor(red)___Good(blue)___Excellent(green)
           
          </div>
        </div>
      </div>
      <br>
     
      <div class="col-md-5">
        <h3><u>Quick Actions</u></h3> <br>
        <button class="btn btn-block btn-primary" id="view_users">View users</button> <br>
        <button class="btn btn-block btn-danger" id="edit_users">Delete user</button> <br>
        <button class="btn btn-block btn-success" id="edit_menu">Edit menu</button> <br>
      
      </div>
      <div class="col-md-12" style="background:whitesmoke;" id="action_div">

      </div>
    </div>
  
  </body>
</html>
<?php }
else{
  header('location:../index.php');
}
