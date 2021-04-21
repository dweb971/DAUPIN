            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
   <!-- jQuery -->

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
    $("form").submit(function(e) {
      e.preventDefault();
      var name=$("input[name='name']").val();
      var email=$("input[name='email']").val();

       $(".data-table tbody").append("<tr data-name='"+name+"' data-email='"+email+"'><td>"+name+"</td><td>"+email+"</td><td><button class='btn btn-danger btn-lg btn-delete mr-3' type='button'>Delete</button><button class='btn btn-info btn-lg btn-edit' type='button'>Edit</button></td></tr>");

       $("input[name='']").val("");
    });

    $('body').on('click','.btn-delete',function() {
      $(this).parents('tr').remove();
    });

    $('body').on('click','.btn-edit',function() {
      var name=$(this).parents('tr').attr('data-name');
      var email=$(this).parents('tr').attr('data-email');

      $(this).parents('tr').find('td:eq(0)').html("<input name='edit_text' value='"+name+"'>");
      $(this).parents('tr').find('td:eq(1)').html("<input name='edit_email' value='"+email+"'>");

      $(this).parents('tr').find('td:eq(2)').prepend("<button type='button' class='btn btn-info btn-lg btn-update mr-3'>Update</button>");
      $(this).hide()
    });

    $('body').on('click','.btn-update',function() {
      var name=$(this).parents('tr').find("input[name='edit_text']").val();
      var email=$(this).parents('tr').find("input[name='edit_email']").val();

      $(this).parents('tr').find('td:eq(0)').text(name);
      $(this).parents('tr').find('td:eq(1)').text(email);

      $(this).parents('tr').attr('data-name',name);
      $(this).parents('tr').attr('data-email',email);

      $(this).parents('tr').find('.btn-edit').show();
      $(this).parents('tr').find('.btn-update').remove();


    })

   
    </script>
</body>

</html>