     <?php 
     ob_start();
     require_once '../library/lib.php';
     require_once '../classes/crud.php';

     $lib=new Lib;
     $crud=new Crud;

     $lib->check_login2();

       if (isset($_GET['id'])) {
       $crud->delete($_GET['id'],'report','view-diagnose.php');
     }


     ?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tables</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php $lib->msg();?></h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Headache</th>
                                        <th>High Temperature</th>
                                        <th>Vomiting</th>
                                        <th>Blood Stool</th>
                                        <th>Cold</th>
                                        <th>Abdominal Pain</th>
                                        <th>Sweating</th>
                                        <th>Rash</th>
                                        <th>Result</th>
                                        <th>Advice</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $user=$crud->displayOne('user',$_SESSION['id']);
                                 $qt=$crud->displayAllSpecificWithOrder('report','user_id',$user['id'],'id','desc');

                                 $c=1;
                                 if ($qt) {

                                     foreach($qt as $r){
                                        ?>
                                        <tr>
                                           <td><?php echo $c++; ?></td>
                                           <td>
                                            <?php
                                            if ($r['hd']=='1') {
                                             echo "Yes";
                                         } else {
                                          echo "No";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                    <?php
                                    if ($r['ht']=='1') {
                                     echo "Yes";
                                 } else {
                                  echo "No";
                              }
                              ?>
                          </td>
                          <td>
                            <?php
                            if ($r['vm']=='1') {
                             echo "Yes";
                         } else {
                          echo "No";
                      }
                      ?>
                  </td>
                  <td>
                    <?php
                    if ($r['bs']=='1') {
                     echo "Yes";
                 } else {
                  echo "No";
              }
              ?>
          </td>
          <td>
            <?php
            if ($r['cd']=='1') {
             echo "Yes";
         } else {
          echo "No";
      }
      ?>
  </td>
  <td>
    <?php
    if ($r['ap']=='1') {
     echo "Yes";
 } else {
  echo "No";
}
?>
</td>
<td>
    <?php
    if ($r['st']=='1') {
     echo "Yes";
 } else {
  echo "No";
}
?>
</td>
<td>
    <?php
    if ($r['rs']=='1') {
     echo "Yes";
 } else {
  echo "No";
}
?>
</td>
<td><?php echo $r['result']; ?></td>
<td><?php echo $r['advice']; ?></td>
<td><?php echo $r['date']; ?></td>

</tr>
<?php
}

} else {
  echo "<tr><td colspan='12'><center>No report at the moment</center</td></tr>";
}
?>

</tbody>
<tfoot>
    <tr>
        <th>S/N</th>
        <th>Headache</th>
        <th>High Temperature</th>
        <th>Vomiting</th>
        <th>Blood Stool</th>
        <th>Cold</th>
        <th>Abdominal Pain</th>
        <th>Sweating</th>
        <th>Rash</th>
        <th>Result</th>
        <th>Advice</th>
        <th>Date</th>
    </tr>
</tfoot>
</table>
</div>

</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include 'inc/footer.php'; ?>
<script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
         $('#zero_config').DataTable();
     </script>

 </body>

 </html>