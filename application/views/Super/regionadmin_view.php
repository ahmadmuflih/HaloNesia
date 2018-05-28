<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Admin Region
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
              <h3 class="box-title">Region Admin List HaloNesia</h3>
              <button type="button" class='pull-right btn btn-primary btn-sm' data-toggle="modal" data-target="#myModal" href='#'><i class="fa fa-plus"></i> Add Admin</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Region Code</th>
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

    <h4 class="modal-title">Add Region Admin</h4>
    </div>
          <div class="modal-body">
            <!--form start-->
            
            <form id="form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama">Username<font color="red">*</font></label>
              <input type="text" minlength="6" class="form-control" id="user" name="user" placeholder="Input Username" required>
              <small class="form-text text-muted">Your password will be just the same as your username. You can change it later.</small>
            </div>
            <div class="form-group">
              <label for="nama">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Admin Name" required>
            </div>
            <div class="form-group">
              <label for="username">Email<font color="red">*</font></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Input Email" required>
            </div>
            <div class="form-group">
              <label for="region">Region<font color="red">*</font></label>
              <select class="form-control" name="region" id="region">
                <option value="def" selected disabled>- Select Region -</option>
                <?php

                  foreach ($region->result() as $row) {
                    echo "<option value='$row->id'>$row->region_code - $row->region_name</option>";
                  }
                ?>
              </select>
              <small class="form-text text-muted"><a href="<?php echo base_url()."super/region"?>"  >Add more region?</a></small>

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

      <h4 class="modal-title">Edit Region Admin</h4>
      </div>
            <div class="modal-body">
              <!--form start-->
              <form id="formEdit" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama">Username<font color="red">*</font></label>
              <input type="text" minlength="6" class="form-control" id="userEdit" name="userEdit" placeholder="Input Username" required>
            </div>
            <div class="form-group">
              <label for="nama">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="namaEdit" name="namaEdit" placeholder="Input Admin Name" required>
            </div>
            <div class="form-group">
              <label for="username">Email<font color="red">*</font></label>
              <input type="email" class="form-control" id="emailEdit" name="emailEdit" placeholder="Input Region Description" required>
            </div>
            <div class="form-group">
              <label for="region">Region<font color="red">*</font></label>
              <select class="form-control" name="regionEdit" id="regionEdit">
                <option value="def" selected disabled>- Select Region -</option>
                <?php

                  foreach ($region->result() as $row) {
                    echo "<option value='$row->id'>$row->region_code - $row->region_name</option>";
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
var id_admin;
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

              t = $("#mytable").dataTable({
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
                  ajax: {"url": "<?php echo base_url("Super/regionadmin/json");?>", "type": "POST"},
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
                      {"data": "username"},
                      {"data": "name"},
                      {"data": "email"},
                      {"data": "region"},
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
  });
  $('#form').submit(function(){
            
            
            var form = $('#form')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);
            $.ajax({
              url: '<?php echo base_url("Super/regionadmin/insert");?>',
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
            formData.append('id',id_admin);
            $.ajax({
              url: '<?php echo base_url("Super/regionadmin/update");?>',
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
  id_admin = id;
   $.ajax({
        url : "<?php echo site_url('Super/regionadmin/getRegion')?>",
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
          $('#userEdit').val(data.admin_login);
          $('#namaEdit').val(data.admin_name);
          $('#regionEdit').val(data.id_region);
          $('#emailEdit').val(data.admin_email);
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
            url : "<?php echo site_url('Super/regionadmin/delete')?>",
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
                alert('Failed! Make sure this region doesn\'t have relationship to other tables!');
            }
        });

    }
}
</script>