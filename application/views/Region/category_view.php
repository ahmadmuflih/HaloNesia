<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Category
        <small>index</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <style media="screen">
      .cstbutton{
        margin-right: 10px !important;
      }
    </style>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      
            <div class="box-header">
              <h3 class="box-title">Category List HaloNesia</h3>
             
            </div>
            <div class="box-body">
            <!-- <h3><b>Berisi List Category dari region ini, hanya berupa datatables tanpa create, update dan delete</b></h3> -->
            
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Region Code</th>
                  <th>Category Name</th>
                  
                </tr>
                </thead>
              

              </table>
            
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->

  


    <!-- end modal -->


<script type="text/javascript">
var id_category='0',id_reg_category, id_region='0';
  $(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
              {
                  return {
                      "iStart": oSettings._iDisplayStart,
                      "iEnd": oSettings.fnDisplayEnd(),
                      "iLength": oSettings._iDisplayLength,
                      "iTotal": oSettings.fnRecordsTotal(),
                      "iFilteredTotal": oSettings.fnRecordsDisplay(),
                      "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                      "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                  };
              };
              loadData();
              });
            function loadData(){
              $('#mytable').DataTable().destroy();
              $("#mytable").DataTable({
                  initComplete: function() {
                      var api = this.api();
                      $('#mytable_filter input')
                              .off('.DT')
                              .on('keyup.DT', function(e) {
                                  if (e.keyCode == 13) {
                                      api.search(this.value).draw();
                          }
                      });
                  },
                  oLanguage: {
                      sProcessing: "loading..."
                  },
                  processing: true,
                  serverSide: true,
                  ajax: {"url": "<?php echo base_url("Region/category/json");?>", "type": "POST","data":{
                  "id_region":id_region,
                  "id_category":id_category,
                }},
                  "columnDefs": [
      {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
      },
      ],
                  columns: [
                      {
                          "data": "id",
                          "orderable": false
                      },
                      {"data": "code"},
                      {"data": "category"},
                      // {"data": "view"},
                  ],
                  order: [[1, 'asc']],
                  rowCallback: function(row, data, iDisplayIndex) {
                      var info = this.fnPagingInfo();
                      var page = info.iPage;
                      var length = info.iLength;
                      var index = page * length + (iDisplayIndex + 1);
                      $('td:eq(0)', row).html(index);
                  }
              });
            }
  
</script>