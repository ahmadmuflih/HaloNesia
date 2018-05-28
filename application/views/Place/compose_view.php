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
              <h3 class="box-title">Make a Post HaloNesia</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <<!-- h3><b>Berisi Form untuk membuat postingan pada place ini.</b></h3> -->
            <form id="form" class="dropzone" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Title<font color="red">*</font></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Category (Optional)</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category">
              </div>
              <div class="form-group">
                <label for="exampleTextarea">Post<font color="red">*</font></label>
                <textarea class="form-control" id="postContent" name="postContent" rows="3"></textarea>
              </div>
              <!-- div class="form-group">
                <label for="exampleInputFile">Upload Image</label>
                <input type="file" class="form-control-file" id="file" name="file" aria-describedby="fileHelp" multiple>
                <small id="fileHelp" class="form-text text-muted">Make sure your file extension is .jpg, .jpeg, or .png.</small>
              </div> -->

               <!-- <div class="dropzone-previews"></div> -->

              <div id="previews">
              
              </div>

              <span class="btn btn-danger fileinput-button">
                <span>add filees</span>

              </span>
              <!-- <div class="dropzone">

              <div class="dz-message">
               <h3> Klik atau Drop gambar disini</h3>
              </div>

            </div> -->


            
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
  //   Dropzone.autoDiscover = false;

  //     var foto_upload= new Dropzone(".dropzone",{
  //     url: "<?php echo base_url('place/compose/proses_upload') ?>",
  //     maxFilesize: 2,
  //     method:"post",
  //     acceptedFiles:"image/*",
  //     paramName:"userfile",
  //     dictInvalidFileType:"Type file ini tidak dizinkan",
  //     addRemoveLinks:true,
  //     autoProcessQueue: false,
  //     });
  // $('#form').submit(function(){
            
  //            foto_upload.processQueue();
  //           var form = $('#form')[0]; // You need to use standart javascript object here
  //           var formData = new FormData(form);
  //           $.ajax({
  //             url: '<?php echo base_url("place/compose/insert");?>',
  //             data: formData,
  //             type: 'POST',
  //             // THIS MUST BE DONE FOR FILE UPLOADING
  //             contentType: false,
  //             processData: false,
  //             success: function(data){
  //               alert(data);
  //               if(data=="berhasil"){
  //               $('#form')[0].reset();
  //               // $('#myModal').modal('hide');
  //                // location.reload();
                  
                    
                   
  //               }
  //             },
  //                 error: function(jqXHR, textStatus, errorThrown)
  //                 {
  //             console.log(jqXHR);
  //             console.log(textStatus);
  //             console.log(errorThrown);
  //             alert('gagal');
  //           }
  //           })
          
  //           return false;
  //       });



Dropzone.options.form = { // The camelized version of the ID of the form element

  // The configuration we've talked about above
  url: "<?php echo base_url('place/compose/insert') ?>",
     uploadMultiple: true,
  maxFiles: 6,
    parallelUploads: 10000,
  acceptedFiles:"image/*",
  paramName:"userfile",
  autoProcessQueue: false,
  dictInvalidFileType:"Type file ini tidak dizinkan",
  addRemoveLinks:true,
  clickable: ".fileinput-button",
  previewsContainer: "#previews",

  // The setting up of the dropzone
  init: function() {
    var myDropzone = this;

    // First change the button to actually tell Dropzone to process the queue.
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
        e.preventDefault();
        e.stopPropagation();
      myDropzone.processQueue();
       // window.location.reload();
       alert('berhasil');
       window.location.reload();
    });

    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
    // of the sending event because uploadMultiple is set to true.
    this.on("sendingmultiple", function() {
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.

    });
    this.on("successmultiple", function(files, response) {
      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.

    });
    this.on("errormultiple", function(files, response) {
      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error

    });
  }

}


      //Event ketika Memulai mengupload
      // foto_upload.on("sending",function(a,b,c){
      //   a.token=Math.random();
      //   c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
      // });
</script>