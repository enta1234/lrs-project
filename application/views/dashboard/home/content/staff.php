  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Staff
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">จัดการเจ้าหน้าที่</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php 
                print_r($Officer);
               ?>
            <table id="table" data-sort-name="officer_id" data-sort-order="desc">
    <thead>
        <tr>
            <th data-field="officer_id" data-sortable="true">Item ID</th>
            <th data-field="officer_name" data-sortable="true">Item Name</th>
            <th data-field="officer_lastname" data-sortable="true">Item Price</th>
        </tr>
    </thead>
</table>
            </div>
            <!-- ./box-body -->
          </div>
          <!-- ./ box -->
        </div>
        <!-- ./ col-left -->
      </div>
      <!-- ./ row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->