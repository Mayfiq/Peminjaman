
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
<!-- Include SweetAlert CSS and JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    </script>
    <script>
    $(document).ready(function(){
        $(document).on('click','.add_product',function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            //console.log(name+price); untuk mengecek agar data yang dimasukkan berhasil
            $.ajax({
                url:"{{ route('add.product') }}",
                method:'POST',
                data:{name:name,price:price},
                success:function(res){
                    if(res.status=='success'){
                        $('#addModal').modal('hide');
                        $('#addproductform')[0].reset();
                        $('.table').load(location.href+' .table');
                    Command: toastr["success"]("Data berhasil", "Success")

                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                    }
                },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index, value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });

                }
            });
        })
        
        //show update value update form
        $(document).on('click','.update_product_form', function(){
            let id  = $(this).data('id');
            let name  = $(this).data('name');
            let price  = $(this).data('price');
            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);

        });

        //update proses system
          $(document).on('click','.update_product',function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();
            //console.log(name+price); untuk mengecek agar data yang dimasukkan berhasil
            $.ajax({
                url:"{{ route('update.product') }}",
                method:'POST',
                data:{up_id:up_id,up_name:up_name,up_price:up_price},
                success:function(res){
                    if(res.status=='success'){
                        $('#updateModal').modal('hide');
                        $('#updateproductform')[0].reset();
                        $('.table').load(location.href+' .table');
                    }
                },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index, value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });

                }
            });
        })
            //PAGINATION
           $(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1]
    product(page)
    })

function product(page) {
    $.ajax({ 
        url: "/pagination/paginate-data?page=" + page,
        success: function(res) {
            $('.table-data').html(res);
        }
    })
}
    $(document).on('keyup',function(e){
        e.preventDefault();
        let search_string = $('#search').val();
        // console.log(search_string);
        $.ajax({
            url:"{{ route('search.product') }}",
            method:'GET',
            data:{search_string:search_string},
            success:function(res){
                $('.table-data').html(res);
                if(res.status=='nothing_found'){
                    $('.table-data').html('<span class="text-danger">'+'Nothing Found'+'</span>');
                }
            }
        });
    })
        
        
    });
    </script>
    
    <script>
  $(document).on('click', '.delete_product', function (e) {
    e.preventDefault();
    let product_id = $(this).data('id');

    // Use SweetAlert for confirmation
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to delete this product!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        // User clicked 'Yes', proceed with the deletion
        $.ajax({
          url: "{{ route('delete.product') }}",
          method: 'POST',
          data: { product_id: product_id },
          dataType: 'json',
          success: function (res) {
            if (res.status === 'success') {
              // Refresh the table after successful deletion
              $('.table').load(location.href + ' .table');

              // Show a success message using SweetAlert
              Swal.fire({
                title: 'Deleted!',
                text: 'The product has been deleted.',
                icon: 'success',
                timer: 2000,
                timerProgressBar: true,
              });
            }
          },
          error: function (xhr, status, error) {
            // Handle the error response from the server
            console.error(error);

            // Show an error message using SweetAlert
            Swal.fire({
              title: 'Error!',
              text: 'Failed to delete the product.',
              icon: 'error',
              timer: 2000,
              timerProgressBar: true,
            });
          }
        });
      }
    });
  });
</script>

    <script>
   $(document).ready(function() {
    $('.burger').click(function() {
        $('.nav-links').slideToggle();
    });

    // Handle window resize event
    $(window).resize(function() {
        if ($(window).width() > 768) {
            $('.nav-links').removeAttr('style');
        }
    });
});

</script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")

    @endif

</script> --}}