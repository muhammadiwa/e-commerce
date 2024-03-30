  <!-- latest jquery-->
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
  <!-- Bootstrap js-->
  <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

  <!-- feather icon js-->
  <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
  <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
  <!-- scrollbar js-->
  <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
  <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
  <!-- Sidebar jquery-->
  <script src="{{ asset('assets/js/config.js') }}"></script>
  <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
  <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  
  {{-- scripts includes --}}
  @yield('scripts')
  {{--end scripts includes --}}

   <!-- Template js-->
   <script src="{{ asset('assets/js/script.js') }}"></script>
   <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>
   <!-- login js-->

   /** Toastr */
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   /** SweetAlert2 */
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error!');
        @endforeach
    @endif
   </script>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-item', function(event){
                event.preventDefault();
                const deleteUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                      $.ajax({
                          url: deleteUrl,
                          type: 'DELETE',

                          success: function(response){
                            if(response.code == 200){
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                )
                                location.reload();
                            }else if(response.code == 500){
                                Swal.fire(
                                    'Error!',
                                    response.message,
                                    'error'
                                )
                            }
                          },
                          error: function(xhr, status, error) {
                            var errorMessage = JSON.parse(xhr.responseText); // Parse pesan kesalahan dari respons JSON
                                Swal.fire(
                                    'Cant Delete!',
                                    errorMessage.message, // Gunakan hanya pesan kesalahan dari respons JSON
                                    'error' // tambahkan parameter 'error' untuk menampilkan ikon error
                                )
                          }
                              // window.location.href = url;
                      });
                    }
                });
            });
        });
    </script>
   
   <!-- DataTable -->
