<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Places
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
              <h3 class="box-title">Place List HaloNesia</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="box-header">
              <h3 class="box-title">Region Admin List HaloNesia</h3>
              <button type="button" class='pull-right btn btn-primary btn-sm' data-toggle="modal" data-target="#myModal" href='#'><i class="fa fa-plus"></i> Add Place</button>
            </div>
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Description</th>
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

    <h4 class="modal-title">Add Place</h4>
    </div>
          <div class="modal-body">
            <!--form start-->
            
            <form id="form" enctype="multipart/form-data">
             <div class="form-group">
              <div class="form-group">
                <label for="nama">Name<font color="red">*</font></label>
                <input type="text" class="form-control" id="namaAdd" name="namaAdd" placeholder="Input Place Name" required>
              </div>
              <div class="form-group">
              <label for="region">Category<font color="red">*</font></label>
              <select class="form-control" name="categoryAdd" id="categoryAdd">
                <option value="def" selected disabled>- Select Category -</option>
                <?php

                  foreach ($category->result() as $row) {
                    echo "<option value='$row->id'>$row->category_code - $row->category_name</option>";
                  }
                ?>
              </select>
            </div>
                <label for="nama">Address<font color="red">*</font></label>
                <input type="text" class="form-control" id="addressAdd" name="addressAdd" placeholder="Input Address" required>
              </div>
              <div class="form-group">
                <label for="username">Phone Number</label>
                <input type="number" step="any" class="form-control" id="phoneNumberAdd" name="phoneNumberAdd" placeholder="Input Phone Number">
              </div>
              <div class="form-group">
                <label for="username">Description<font color="red">*</font></label>
                <textarea class="form-control" id="descriptionAdd" name="descriptionAdd" placeholder="Input Place Description" required>
                </textarea>
              </div>

              <div class="form-group">
                <label for="username">Latitude</label>
                <input type="number" step="any" class="form-control" id="latAdd" name="latAdd" placeholder="Longitude of Location">
              </div>
              <div class="form-group">
                <label for="username">Longitude</label>
                <input type="number" step="any" class="form-control" id="longAdd" name="longAdd" placeholder="Longitude of Location">
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
    
    <!-- end modal -->

    <!-- Modal edit-->
  <div class="modal fade" id="myModal2" role="dialog">

      <div class="modal-dialog" role="document">

      <div class="modal-content">

      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>

      <h4 class="modal-title">Edit Place</h4>
      </div>
            <div class="modal-body">
              <!--form start-->
              <form id="formEdit" enctype="multipart/form-data">
              <div class="form-group">
              <label for="region">Category<font color="red">*</font></label>
              <select class="form-control" name="categoryEdit" id="categoryEdit">
                <option value="def" disabled>- Select Category -</option>
                <?php

                  foreach ($category->result() as $row) {
                    echo "<option value='$row->id'>$row->category_code - $row->category_name</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nama">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="namaEdit" name="namaEdit" placeholder="Input Name" required>
            </div>
            <div class="form-group">
              <label for="nama">Address<font color="red">*</font></label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Input Address" required>
            </div>
            <div class="form-group">
              <label for="username">Phone Number<font color="red">*</font></label>
              <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Input Phone Number" required>
            </div>
            <div class="form-group">
              <label for="region">Description<font color="red">*</font></label>
                <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" placeholder="Input Place Description" required>
                </textarea>
            </div>
              <div class="form-group">
              <label for="username">Latitude</label>
              <input type="number" step="any" class="form-control" id="latEdit" name="latEdit" placeholder="Latitude of Location">
            </div>
              <div class="form-group">
              <label for="username">Longitude</label>
              <input type="number" step="any" class="form-control" id="longEdit" name="longEdit" placeholder="Longitude of Location">
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
var id_place;
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
                  
                 ajax: {"url": "<?php echo base_url("Region/places/json");?>", "type": "POST"},
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
                      {"data": "categoryName"},
                      {"data": "name"},
                      {"data": "address"},
                      {"data": "phoneNumber"},
                      {"data": "description"},
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
              url: '<?php echo base_url("Region/places/insert");?>',
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
            formData.append('id',id_place);
            $.ajax({
              url: '<?php echo base_url("Region/places/update");?>',
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
  id_place = id;
   $.ajax({
        url : "<?php echo site_url('Region/places/getPlace')?>",
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
          $('#categoryEdit').val(data.id_reg_category);
          $('#namaEdit').val(data.name);
          $('#address').val(data.address);
          $('#phoneNumber').val(data.phone_number);
          $('#descriptionEdit').val(data.description);
          $('#latEdit').val(data.latitude);
          $('#longEdit').val(data.longitude);
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
            url : "<?php echo site_url('Region/places/delete')?>",
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