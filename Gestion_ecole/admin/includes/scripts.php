  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- page core css-->
  <link rel="stylesheet" type="text/css" href="public/css/jquery.dataTables.css">   
  <link rel="stylesheet" type="text/css" href="public/js/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="public/js/datatables.css">
  <link rel="stylesheet" href="public/fontawesome-free/css/fontawesome.min.css">
  <link rel="stylesheet" href="public/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="public/bootstrap/js/bootstrap.min.css">
  <link rel="stylesheet" href="public/assets/bootstrap/css/bootstrap.min.css"> 
  <!-- public CSS Files -->
  <link href="public/assets/aos/aos.css" rel="stylesheet">
  <link href="public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/assets/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/assets/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="public/assets/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <script src="public/assets/aos/aos.js"></script>
  <script src="public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/glightbox/js/glightbox.min.js"></script>
  <script src="public/assets/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/assets/php-email-form/validate.js"></script>
  <script src="public/assets/purecounter/purecounter.js"></script>
  <script src="public/assets/swiper/swiper-bundle.min.js"></script>
  <script src="public/assets/typed.js/typed.min.js"></script>
  <script src="public/assets/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="public/assets/js/main.js"></script>

    <title>Document</title>
  <!-- Bootstrap core JavaScript-->
  <!-- Bootstrap core JavaScript-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

  <script src="public/js/script.js"></script>
  <script src="public/jquery/jquery.min.js"></script>
  <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="public/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="public/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="public/chart.js/Chart.min.js"></script>
  <script src="public/datatables/jquery.dataTables.min.js"></script>
  <script src="public/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="public/js/demo/chart-area-demo.js"></script>
  <script src="public/js/demo/chart-pie-demo.js"></script>
  <script src="public/js/sweetalert.min.js"></script>
  <script src="public/js/demo/datatables-demo.js"></script>  
  <script type="text/javascript" charset="utf8" src="public/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="public/js/dataTables.js"></script>
  <script type="text/javascript" src="public/js/datatables.min.js"></script>
  <script>
        $(document).ready(function() {
          $('#dataTable').DataTable();
        });
  </script>
  <?php
      if(isset($_SESSION['status']) && $_SESSION['status'] != '')
      {
        ?>
        <script>
         swal({
          title: "<?php echo $_SESSION['status']; ?>",
          // text: "You clicked the button!",
          icon:  "<?php echo $_SESSION['status_code']; ?>",
          button: "OK Done!",
        });
       </script>
  <?php
        unset($_SESSION['success']);
      }
      ?>
    <script src="public/js/custom.js"></script>