  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        History Of Register
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ผู้ที่เคยสมัครทั้งหมด</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <div id="toolbar">
                <select class="form-control">
                  <option value="">Export Basic</option>
                  <option value="all">Export All</option>
                  <option value="selected">Export Selected</option>
                </select>
              </div>
              <table id="tablehistoryregister" 
                data-toolbar="#toolbar"
                data-search="true"
                data-show-export="true"
                data-icons-prefix="fa"
                data-icons="icons"
                data-sort-name="registers_timeregister" 
                data-sort-order="desc" 
                data-pagination="true" 
                data-side-pagination="client"
                data-page-size="20"
                data-page-list="[10, 20, 50, 100, 200]"
                ></table>
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