(function () {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        }
    })

              
   // Binds to the global ajax scope          
    $( document ).ajaxStart(function() {           
      $( ".spinner" ).removeClass('hidden');          
    });            
             
    $( document ).ajaxComplete(function() {            
      $( ".spinner" ).hide();         
    });            
 
    function load(this1)
    {
      //alert('asdasd');
      this1.disabled=true; 
      this1.innerHTML='<i class="fa fa-spinner fa-spin"></i> adding…';
    }
    ////////////////// globel add button /////////////
    $(document).on('click','.addBtn', function (e, value) {
        // console.log(e);
        e.preventDefault();
        load(this);
        var $this = $(this);
      
        var AddForm = $('#add-form');
        var formData = new FormData(AddForm[0]);
     
        $.ajax({
            contentType: false,
            processData: false,
            method: "POST",
            dataType: 'json',
            url: AddForm.attr('action'),
            data: formData,
            success: function (result) {
                if(result.status == 'success'){
                swal({title: "success", text: result.data, type: "success"}, function () {
                    location.reload(true);
                });
                } else {
                swal('wrong', result.data, 'error');
                }
            },
            error: function(){
                alert('Internal Server Error.');
            }
            
        });
    });
    
     //////////////// delete with ajax ....modal delete
    $('.btndelet').click(function (e) {
        e.preventDefault();
        // console.log(11111)
        var txt = $('#template-modal').html(); // from master file
        var url = $(this).attr('data-url');
        txt = txt.replace(new RegExp('{url}', 'g'), url);
        $('#delete-modal .modal-dialog').html(txt);
        $('#delete-modal').modal('show');
        // console.log('deleting');
        // e.preventDefault()
    });

   
  


})(); 
