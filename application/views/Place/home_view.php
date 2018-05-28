<?php
  $data = $admin->row();
  $dataPlace = $place->row();
?>

<!-- <!- - Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>index</small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">

        <div class="col-md-3">
          <!-- Profile Image -->
         <div class="box box-success">
           <div class="box-body box-profile">
             
             <ul class="list-group list-group-unbordered">
               <li class="list-group-item">
                 <i class="fa fa-at" title="e-mail"></i><span class="pull-right" id="emailtxt"><?php echo $data->admin_email?></span>
               </li>
               <li class="list-group-item">
                 <i class="fa fa-phone" title="No. Handphone"></i><span class="pull-right" id="telptxt"><?php //echo $data->no_telp?>12345</span>
               </li><br>
               <a href="#" data-toggle="modal" data-target="#Modaledit" class="btn btn-primary btn-block"><b>Edit</b></a>
               <br>
               <li class="list-group-item">
                 <i class="fa fa-user" title="Username"></i><span class="pull-right" id="usernametxt"><?php echo $data->admin_login?></span>
               </li>
               <li class="list-group-item">
                 <i class="fa fa-lock" title="Password"></i><span class="pull-right">******</span>
               </li>
             </ul>

             <!-- <a href="#" data-toggle="modal" data-target="#Modaledit" class="btn btn-primary btn-block"><b>Edit</b></a> -->
             <button onclick="setUsername()" data-toggle="modal" data-target="#Modaleditakun" class="btn btn-warning btn-block"><b>Edit Account</b></button>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>

       <style>
       .cst-textarea {
           height: 220px !important;
           resize: none;
           }
           input[type=number]::-webkit-inner-spin-button,
           input[type=number]::-webkit-outer-spin-button {
             -webkit-appearance: none;
             margin: 0;
           }
       </style>

       <div class="col-md-9">
       <!-- Default box -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Data Profil Admin</h3>

          </div>
          <form id="formUpdateNama" class="form-horizontal ">
          <div class="box-body">
             <div class="form-group col-md-12">
                <label for="instansi" class="col-sm-2 control-label">Name :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data->admin_name  ?>">
                </div>
              </div>
              <div class="form-group col-md-12">
                  <label for="nip" class="col-sm-2 control-label">Role :</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('role_name');  ?>" disabled>
                  </div>
              </div>


              <center>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i> Save</button>
                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</button>
              </center>

          </div>
        </form>
          <div class="box-footer">
            <small>Last Update: <?php echo $data->updated_at?></small>
          </div>

          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
     <div class="col-md-9">
       <!-- Default box -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Place Details</h3>

          </div>
          <form id="formUpdatePlace" class="form-horizontal ">
          <div class="box-body">
             <div class="form-group col-md-12">
                <label for="instansi" class="col-sm-2 control-label">Place Name :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nameUpdate" name="nameUpdate" value="<?php echo $dataPlace->name  ?>">
                </div>
              </div>
              <div class="form-group col-md-12">
                  <label for="nip" class="col-sm-2 control-label">Category :</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="categoryUpdate" name="categoryUpdate" value="<?php echo $dataPlace->category_name  ?>" disabled>
                  </div>
              </div>
              <div class="form-group col-md-12">
                  <label for="nip" class="col-sm-2 control-label">Address :</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="addressUpdate" name="addressUpdate" value="<?php echo $dataPlace->address  ?>">
                  </div>
              </div>
              <div class="form-group col-md-12">
                  <label for="nip" class="col-sm-2 control-label">Phone Number :</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="phoneNumberUpdate" name="phoneNumberUpdate" value="<?php echo $dataPlace->phone_number  ?>">
                  </div>
              </div>
              <div class="form-group col-md-12">
                  <label for="nip" class="col-sm-2 control-label">Description :</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="descritionUpdate" name="descriptionUpdate" value="<?php echo $dataPlace->description ?>">
                  </div>
              </div>


              <center>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i> Save</button>
                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</button>
              </center>

          </div>
        </form>
          <div class="box-footer">
            <small>Last Update: <?php echo $dataPlace->updated_at?></small>
          </div>

          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Edit -->
<div class="modal fade" id="Modaledit" role="dialog">

  <div class="modal-dialog" role="document">

  <div class="modal-content">

  <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>

  <h4 class="modal-title">Edit Profile</h4>
  </div>
        <div class="modal-body">
          <!--form start-->
          <div id="alert" class="alert hidden" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span id="alertTitle" class="sr-only">Error:</span>
            <span id="alertBody">Enter a valid email address</span>
          </div>
          <form id="formUpdateProfile" enctype="multipart/form-data">
          <div class="form-group">
            <label for="email">Email<font color="red">*</font></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $data->admin_email?>" placeholder="Masukkan Email" required>
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

  <!-- Modal edit akun -->

  <!-- Modal Edit -->
  <div class="modal fade" id="Modaleditakun" role="dialog">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>

    <h4 class="modal-title">Edit Profile</h4>
    </div>
          <div class="modal-body">
            <!--form start-->
            <div id="alert" class="alert hidden" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span id="alertTitle" class="sr-only">Error:</span>
              <span id="alertBody">Enter a valid email address</span>
            </div>
            <form id="form3" enctype="multipart/form-data">

            <div class="form-group">
              <label for="usn">Username<font color="red">*</font></label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $data->admin_login?>" disabled>
            </div>
            <div class="form-group">
              <label for="pwd1">Password Lama<font color="red">*</font></label>
              <input type="password" class="form-control" id="password" name="password" value=""  required>
            </div>
            <div class="form-group">
              <label for="pwd2">Password Baru<font color="red">*</font></label><small>Kosongkan jika tidak diubah</small>
              <input type="password" class="form-control" id="new_password" name="new_password" value="">
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

  <!-- end Modal Akun -->

 
  <!-- end modal -->

  <script type="text/javascript">
var id_admin;
$('#formUpdateProfile').submit(function(){
          
            var form = $('#formUpdateProfile')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);
            formData.append('id',id_admin);
            $.ajax({
              url: '<?php echo base_url("place/Home/updateProfile");?>',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              success: function(data){
                alert(data);
                if(data=="berhasil"){
                $('#Modaledit').modal('hide');
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

  $('#formUpdateNama').submit(function(){
          
            var form = $('#formUpdateNama')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);
            formData.append('id',id_admin);
            $.ajax({
              url: '<?php echo base_url("place/Home/updateNama");?>',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              success: function(data){
                // alert(data);
                if(data=="berhasil"){
                $('#formUpdateNama')[0].reload();
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

   $('#formUpdatePlace').submit(function(){
          
            var form = $('#formUpdatePlace')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);
            formData.append('id',id_admin);
            $.ajax({
              url: '<?php echo base_url("Place/Home/updatePlace");?>',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              success: function(data){
                // alert(data);
                if(data=="berhasil"){
               $('#formUpdatePlace')[0].reload();
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

      $('#form3').submit(function(){
         var form = $('#form3')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);
            formData.append('id',id_admin);
            $.ajax({
              url: '<?php echo base_url("Region/Home/update2");?>',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              success: function(data){
                alert(data);
                if(data=="berhasil"){
                 $('#form3')[0].reset();
                    $('#Modaleditakun').modal('toggle');
                    $('#Modaleditakun').modal('hide');
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






</script>
