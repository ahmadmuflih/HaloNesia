<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Category
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
              <button type="button" class='pull-right btn btn-primary btn-sm' data-toggle="modal" data-target="#myModal" href='#'><i class="fa fa-plus"></i> Add Category</button>
              <br><br>
              <div class="col-md-2">
                <!-- <label for="sort"><small>Sort by Instansi :</small></label> -->
                      <select class="form-control input-sm" id="sort1" name="sort" placeholder="Sort">
                        <option value="def" selected disabled>-Sort by Region-</option>
                        <option value="0">All</option>
                        <?php
                          foreach ($region->result() as $row) {
                            echo "<option value='$row->id'>$row->region_code - $row->region_name</option><br>";
                          }
                        ?>
                      </select>
                </div>
                <div class="col-md-2">
                  <!-- <label for="sort"><small>Sort by Instansi :</small></label> -->
                        <select class="form-control input-sm" id="sort2" name="sort" placeholder="Sort">
                          <option value="def" selected disabled>-Sort by Category-</option>
                          <option value="0">All</option>
                          <?php
                          foreach ($category->result() as $row) {
                            echo "<option value='$row->id'>$row->category_code - $row->category_name</option><br>";
                          }
                        ?>
                        </select>
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Region</th>
                  <th>Category</th>
                  <th>Action</th>
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
<div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>

    <h4 class="modal-title">Add Region Category</h4>
    </div>
          <div class="modal-body">
            <!--form start-->
            
            <form id="form" enctype="multipart/form-data">
            
            <div class="form-group">
              <label for="sort">Region<font color="red">*</font></label>
              <select class="form-control input-sm" id="region" name="region" placeholder="Sort" required="">
                        <option value="0" selected disabled>-Select Region-</option>
                        <?php
                          foreach ($region->result() as $row) {
                            echo "<option value='$row->id'>$row->region_code - $row->region_name</option><br>";
                          }
                        ?>
                      </select>
            </div>
            <div class="form-group">
              <label for="sort">Category<font color="red">*</font></label>
              <select class="form-control input-sm" id="category" name="category" placeholder="Sort" required="">
                        <option value="0" selected disabled>-Select Category-</option>
                        <?php
                          foreach ($category->result() as $row) {
                            echo "<option value='$row->id'>$row->category_code - $row->category_name</option><br>";
                          }
                        ?>
                      </select>
            </div>
            <!--end form-->
            <button type="submit" class="btn btn-primary" id="submit" style="float:right">Submit</button>
          </form>
            <!--end form-->
          </div>
          <div class="modal-footer">
            <!--button type="button" class="btn btn-default" data-dismiss="modal">Close</button-->
          </div>

        </div>

      </div>

    </div>
    <!-- end modal -->

    <!-- Modal edit-->
  <div class="modal fade" id="myModal2" role="dialog">

      <div class="modal-dialog" role="document">

      <div class="modal-content">

      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>

      <h4 class="modal-title">Edit Region Category</h4>
      </div>
            <div class="modal-body">
              <!--form start-->
              
              <form id="formEdit" enctype="multipart/form-data">
            
            <div class="form-group">
              <label for="sort">Region<font color="red">*</font></label>
              <select class="form-control input-sm" id="regionEdit" name="regionEdit" placeholder="Sort" disabled required="">
                        <option value="0" selected disabled>-Select Region-</option>
                        <?php
                          foreach ($region->result() as $row) {
                            echo "<option value='$row->id'>$row->region_code - $row->region_name</option><br>";
                          }
                        ?>
                      </select>
            </div>
            <div class="form-group">
              <label for="sort">Category<font color="red">*</font></label>
              <select class="form-control input-sm" id="categoryEdit" name="categoryEdit" placeholder="Sort" required="">
                        <option value="0" selected disabled>-Select Category-</option>
                        <?php
                          foreach ($category->result() as $row) {
                            echo "<option value='$row->id'>$row->category_code - $row->category_name</option><br>";
                          }
                        ?>
                      </select>
            </div>
            <!--end form-->
            <button type="submit" class="btn btn-primary" id="submit" style="float:right">Submit</button>
          </form>
              <!--end form-->
            </div>
            <div class="modal-footer">
              <!--button type="button" class="btn btn-default" data-dismiss="modal">Close</button-->
            </div>

          </div>

        </div>

      </div>
      <!-- end modal edit -->
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
                  ajax: {"url": "<?php echo base_url("Super/regioncategory/json");?>", "type": "POST","data":{
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
                      {"data": "region"},
                      {"data": "category"},
                      {"data": "view"},
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
              
  
  $('#form').submit(function(){
            
            
            var form = $('#form')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);
            $.ajax({
              url: '<?php echo base_url("Super/regioncategory/insert");?>',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              success: function(data){
                alert(data);
                if(data=="berhasil"){
                $('#form')[0].reset();
                $('#myModal').modal('hide');
                reload_table();
                }
              },
                  error: function(jqXHR, textStatus, errorThrown)
                  {
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
              alert('gagal');
            }
            })
          
            return false;
        });
  $('#formEdit').submit(function(){
          
            var form = $('#formEdit')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);
            formData.append('id',id_reg_category);
            $.ajax({
              url: '<?php echo base_url("Super/regioncategory/update");?>',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              success: function(data){
                alert(data);
                if(data=="berhasil"){
                $('#myModal2').modal('hide');
                reload_table();
                }
              },
            error: function(jqXHR, textStatus, errorThrown)
            {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert('gagal');
      }
            })
          
            return false;
        });
  function reload_table()
{
    $('#mytable').DataTable().ajax.reload(null,false); //reload datatable ajax
}
function edit(id){
  id_reg_category = id;
   $.ajax({
        url : "<?php echo site_url('Super/regioncategory/getCategory')?>",
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
          $('#regionEdit').val(data.id_region);
          $('#categoryEdit').val(data.id_category);
          $('#myModal2').modal('show');
        },
            error: function (jqXHR, textStatus, errorThrown)
            {
              console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
            }
      });
 }
 function hapus(id){
 if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Super/regioncategory/delete')?>",
            type: "POST",
            data: {'id':id},
            success: function(data)
            {
              alert(data);
              if(data=="berhasil")
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Failed! Make sure this Category doesn\'t have relationship to other tables');
            }
        });

    }
}
$('#sort1').change(function() {
    if(id_region!=$('#sort1').val()){
        id_region = $('#sort1').val();
        loadData();
      }
    });
  $('#sort2').change(function() {
    if(id_category!=$('#sort2').val()){
        id_category = $('#sort2').val();
        loadData();
      }
    });
</script>