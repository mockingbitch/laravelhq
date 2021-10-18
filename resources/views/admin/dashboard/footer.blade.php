<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Dashboard</b>
    </div>
    <strong>Copy right &copy; <a href="https://facebook.com/jarvis.ejr">Jarvis Phong Trần</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/template/admin/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="/template/admin/jquery/jquery.validate.min.js"></script>
<script src="/template/admin/jquery/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/admin/js/main.js"></script>
<!-- Page specific script -->

<script>
$(function () {
  // $.validator.setDefaults({
  //   submitHandler: function () {
  //     alert( "Form successful submitted!" );
  //   }
  // });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
$(document).on('click', '.deleteBtn, .fa-trash', function () {
    let id = $(this).attr('index');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin/menus/destroy/' + id,
        type: 'DELETE',
        success:function(response) {
            window.location.reload()
            
        }
    })
})
});
</script>
@yield('footer')
</body>
</html>
