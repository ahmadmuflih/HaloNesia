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
              <h3 class="box-title">Place Admin List HaloNesia</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="box-header">
              <h3 class="box-title">Region Admin List HaloNesia</h3>
              <button type="button" class='pull-right btn btn-primary btn-sm' data-toggle="modal" data-target="#myModal" href='#'><i class="fa fa-plus"></i> Add Admin</button>
            </div>
           
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Place</th>
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

    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>

    <h4 class="modal-title">Add Admin Place</h4>
    </div>
          <div class="modal-body">
            <!--form start-->
            
            <form id="form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="region">Place<font color="red">*</font></label>
              <select class="form-control" name="placeAdd" id="placeAdd">
                <option value="def" selected disabled>- Select Place-</option>
                <?php

                  foreach ($place->result() as $row) {
                    echo "<option value='$row->id_place'>$row->name - $row->category_name</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nama">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="namaAdd" name="namaAdd" placeholder="Input Your Name" required>
            </div>
            <div class="form-group">
              <label for="nama">Username<font color="red">*</font></label>
              <input type="text" class="form-control" id="userAdd" name="userAdd" placeholder="Input Username" required>
            </div>
            <div class="form-group">
              <label for="nama">Email<font color="red">*</font></label>
              <input type="text" class="form-control" id="emailAdd" name="emailAdd" placeholder="Input Address" required>
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

      <h4 class="modal-title">Edit Admin</h4>
      </div>
            <div class="modal-body">
              <!--form start-->
              <form id="formEdit" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama">Username<font color="red">*</font></label>
              <input type="text" minlength="6" class="form-control" id="usernameEdit" name="usernameEdit" placeholder="Input Name" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama<font color="red">*</font></label>
              <input type="text" class="form-control" id="namaEdit" name="namaEdit" placeholder="Input Address" required>
            </div>
            <div class="form-group">
              <label for="username">Email<font color="red">*</font></label>
              <input type="number" class="form-control" id="emailEdit" name="emailEdit" placeholder="Input Phone Number" required>
            </div>
            <div class="form-group">
              <label for="region">Place<font color="red">*</font></label>
               <input type="text" class="form-control" id="placeEdit" name="placeEdit" placeholder="Input Description" required>
            </div>
              <div class="form-group">
              <label for="username">Category</label>
              <input type="number" step="any" class="form-control" id="category" name="category" placeholder="Latitude of Location">
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
                  ajax: {"url": "<?php echo base_url("Region/placeadmin/json");?>", "type": "POST"},
                  columns: [
                      {
                          "data": "id",
                          "orderable": false
                      },
                      {"data": "username",
                      "defaultContent":" <strong><font color='red'><i> Admin not set </i>  </font></strong> "},
                      {"data": "name"},
                      {"data": "email"},
                      {"data": "place"},
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
  });

  $('#form').submit(function(){
            
            
            var form = $('#form')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);
            $.ajax({
              url: '<?php echo base_url("Region/placeAdmin/insert");?>',
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
                // location.reload();
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
//   $('#formEdit').submit(function(){
          
//             var form = $('#formEdit')[0]; // You need to use standart javascript object here
//             var formData = new FormData(form);
//             formData.append('id',id_place);
//             $.ajax({
//               url: '<?php echo base_url("Region/placeAdmin/update");?>',
//               data: formData,
//               type: 'POST',
//               // THIS MUST BE DONE FOR FILE UPLOADING
//               contentType: false,
//               processData: false,
//               success: function(data){
//                 alert(data);
//                 if(data=="berhasil"){
//                 $('#myModal2').modal('hide');
//                 reload_table();
//                 }
//               },
//             error: function(jqXHR, textStatus, errorThrown)
//             {
//         console.log(jqXHR);
//         console.log(textStatus);
//         console.log(errorThrown);
//         alert('gagal');
//       }
//             })
          
//             return false;
//         });
//  function edit(id){
//   id_place = id;
//    $.ajax({
//         url : "<?php echo site_url('Region/placeAdmin/getPlace')?>",
//         type: "POST",
//         data: {'id':id},
//         dataType: "JSON",
//         success: function(data)
//         {
//           $('#usernameEdit').val(data.admin_login);
//           $('#namaEdit').val(data.admin_name);
//           $('#emailEdit').val(data.admin_email);
//           $('#descriptionEdit').val(data.description);
//           $('#latEdit').val(data.latitude);
//           $('#longEdit').val(data.longitude);
//           $('#myModal2').modal('show');
//         },
//             error: function (jqXHR, textStatus, errorThrown)
//             {
//               console.log(jqXHR);
//         console.log(textStatus);
//         console.log(errorThrown);
//             }
//       });
//  }
  function reload_table()
{
    $('#mytable').DataTable().ajax.reload(null,false); //reload datatable ajax
}

 function hapus(username){
 if(confirm('This will delete an Admin from selected place, Are you still want to delete this admin?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Region/placeadmin/delete')?>",
            type: "POST",
            data: {'id':username},
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