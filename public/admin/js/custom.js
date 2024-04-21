$(document).ready(function(){

  var table = new DataTable('#poems', {
    language: {
        url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
    },
});
var table = new DataTable('#articals', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});
var table = new DataTable('#channels', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});
var table = new DataTable('#categories', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});

var table = new DataTable('#courses', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});
var table = new DataTable('#certificates', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});
var table = new DataTable('#qualifications', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});
var table = new DataTable('#experiences', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});
var table = new DataTable('#designs', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});
var table = new DataTable('#images', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});

var table = new DataTable('#files', {
  language: {
      url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/ar.json',
  },
});
$(function() {
  $('#enddatepicker').datepicker(
    {
      autoclose: true,
      language: 'ar',
      format: 'yyyy/mm/dd' // you can change the date format if needed
  }
  );
  $('#startdatepicker').datepicker(
    {
      autoclose: true,
      language: 'ar',
      format: 'yyyy/mm/dd' // you can change the date format if needed
  }
  );
  $('#datepicker').datepicker(
    {
      autoclose: true,
      language: 'ar',
      format: 'yyyy/mm/dd' // you can change the date format if needed
  }
  );
  $('#datepickerqualification').datepicker(
    {
      autoclose: true,
      language: 'ar',
      format: 'yyyy/mm/dd' // you can change the date format if needed
  }
  );
  $('#fromdatepicker').datepicker(
    {
      autoclose: true,
      language: 'ar',
      format: 'yyyy/mm/dd' // you can change the date format if needed
  }
  );
  $('#todatepicker').datepicker(
    {
      autoclose: true,
      language: 'ar',
      format: 'yyyy/mm/dd' // you can change the date format if needed
  }
  );

  $('#designdatepicker').datepicker(
    {
      autoclose: true,
      language: 'ar',
      format: 'yyyy/mm/dd' // you can change the date format if needed
  }
  );

  $('#imagedatepicker').datepicker(
    {
      autoclose: true,
      language: 'ar',
      format: 'yyyy/mm/dd' // you can change the date format if needed
  }
  );
});


     //update course status
     $(document).on("click",".updateCourseStatus",function(){
      var status = $(this).children("i").attr("status");
      var course_id = $(this).attr("course_id");
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'post',
              url: '/admin/update-course-status',
              data: {status:status,course_id:course_id},
              success: function(resp){
                  if(resp['status']==0){
                    Swal.fire({
                      title: 'الدورة مغلقة',
                  
                      showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      },
                      confirmButtonText: 'تأكيد', 
                    }),
                    $("#course-"+course_id).html("<i style='font-size: 25px;color:#007DFE;' class='nav-icon fas fa-lock' status='Inactive'></i>"),
                    $("#state-"+course_id).html("<span status='Inactive'>مغلق</span>")
                  }else if(resp['status']==1){
                    Swal.fire({
                      title: 'الدورة متاحة',
                      showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      },
                      confirmButtonText: 'تأكيد', 
                    }),
                    $("#course-"+course_id).html("<i style='font-size: 25px;color:#007DFE;' class='nav-icon fas fa-lock-open' status='Active'></i>"),
                    $("#state-"+course_id).html("<span status='Active'>متاح</span>")
                  }
              },error:function(){
                alert('Error');
              }
              
            });
      })


        //update file status
     $(document).on("click",".updateFileStatus",function(){
      var status = $(this).children("i").attr("status");
      var file_id = $(this).attr("file_id");
      
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'post',
              url: '/admin/update-file-status',
              data: {status:status,file_id:file_id},
              success: function(resp){
                  if(resp['status']==0){
                    Swal.fire({
                      title: 'غير مسموح بالنشر',
                  
                      showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      },
                      confirmButtonText: 'تأكيد', 
                    }),
                    $("#file-"+file_id).html("<i style='font-size: 25px;color:#007DFE;' class='nav-icon fas fa-lock' status='Inactive'></i>"),
                    $("#state-"+file_id).html("<span status='Inactive'>غير منشورة</span>")
                  }else if(resp['status']==1){
                    Swal.fire({
                      title: 'تم السماح بالنشر',
                      showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      },
                      confirmButtonText: 'تأكيد', 
                    }),
                    $("#file-"+file_id).html("<i style='font-size: 25px;color:#007DFE;' class='nav-icon fas fa-lock-open' status='Active'></i>"),
                    $("#state-"+file_id).html("<span status='Active'>منشورة</span>")
                  }
              },error:function(){
                alert('Error');
              }
              
            });
      });


         //update consultation status
     $(document).on("click",".updateConsultationStatus",function(){
      var status = $(this).children("i").attr("status");
      var consultation_id = $(this).attr("consultation_id");
      
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'post',
              url: '/admin/update-consultation-status',
              data: {status:status,consultation_id:consultation_id},
              success: function(resp){
                  if(resp['status']==0){
                    $("#consultation-"+consultation_id).html("<i style='font-size: 25px;color:#007DFE;' class='nav-icon fa fa-square-o' status='Inactive'></i>"),
                    $("#state-"+consultation_id).html("<span status='Inactive'>غير مقروءة</span>")
                  }else if(resp['status']==1){
                    $("#consultation-"+consultation_id).html("<i style='font-size: 25px;color:#007DFE;' class='nav-icon fas fa-check-square' status='Active'></i>"),
                    $("#state-"+consultation_id).html("<span status='Active'>مقروءة</span>")
                  }
              },error:function(){
                alert('Error');
              }
              
            });
      });

    
      $("document").ready(function(){
        setTimeout(function() {
          $("#message_id").fadeOut(1000, function() {
              $(this).remove();
          });
      }, 3000);
    });

    $(document).ready(function() {
      $('#summernote').summernote();
    });

    $(document).ready(function() {
      $('#summernoteArtical').summernote();
    });
    
        // When the span is clicked, trigger the file input click event
        $('#text_input_span_id').click(function () {
          $("#image").trigger('click');
      });

      // When the text input is clicked, trigger the file input click event
      $('#text_input_id').click(function () {
          $("#image").trigger('click');
      });

      $("#image").change(function () {
        $('#text_input_id').val(this.files[0].name);
    });
      // Display file name in text input when file is selected
      $("#file_url").change(function () {
          $('#text_input_id').val(this.files[0].name);
      });

       // When the span is clicked, trigger the file input click event
       $('#text_input_span_id').click(function () {
        $("#file_url").trigger('click');
    });

    // When the text input is clicked, trigger the file input click event
    $('#text_input_id').click(function () {
        $("#file_url").trigger('click');
    });

    // Display file name in text input when file is selected
    $("#file_url").change(function () {
        $('#text_input_id').val(this.files[0].name);
    });

        $(document).on("click",".confirmDelete",function(){
        var module = $(this).attr('module');
        var categ = $(this).attr('categ');
        var moduleid = $(this).attr("moduleid");
        Swal.fire({
          title: 'هل أنت متأكد من عملية الحذف ؟',
          text: "لن تتمكن من التراجع عن هذا !",
          icon: 'error',
          showCancelButton: true,
          cancelButtonText: "إغلاق",      
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'نعم، احذفه!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'تم الحذف!',
              "تم حذف "+ categ+ " الخاص بك",
              'status'
            )
            window.location="/admin/delete-"+module+"/"+moduleid;
          }
        })
    });

});