<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts
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
              <h3 class="box-title">Post List HaloNesia</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>No</th>
                   <th>Place</th>
                  <th>Post Author</th>
                  <th>Post Title</th>
                  <th>Post Category</th>
                  <th>Content</th>
                  <th>Images</th>
                  <th>Action</th>
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
              <label for="nama">Post Title<font color="red">*</font></label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Input Title" required>
            </div>
            <div class="form-group">
              <label for="username">Post category</label>
              <input type="text" class="form-control" id="category" name="category" placeholder="Input Category" required>
            </div>
            <div class="form-group">
              <label for="region">Content<font color="red">*</font></label>
               <textarea class="form-control" id="postContent" name="postContent" rows="3"></textarea>
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
                  ajax: {"url": "<?php echo base_url("Region/posts/json");?>", "type": "POST"},
                  columns: [
                      {
                          "data": "id",
                          "orderable": false
                      },
                      {"data": "name"},
                      {"data": "author"},
                      {"data": "title"},
                      {"data": "category"},
                      {"data": "content"},
                      {"data": "image"},
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
                // reload_table();
                location.reload();
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
              url: '<?php echo base_url("Region/Posts/update");?>',
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
        url : "<?php echo site_url('Region/posts/getPost')?>",
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
          $('#title').val(data.post_title);
          $('#category').val(data.post_category);
          $('#postContent').val(data.post_content);
        
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

 function hapus(username){
 if(confirm('This will delete a Selected Post, Are you still want to delete this Post?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Region/posts/delete')?>",
            type: "POST",
            data: {'id':username},
            success: function(data)
            {
              alert(data);
              if(data=="berhasil")
                reload_table();
              // location.reload();
              reload
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Failed! Make sure this region doesn\'t have relationship to other tables!');
            }
        });

    }
}
  </script>


<script type="text/javascript">

</script>