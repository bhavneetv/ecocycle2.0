<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>EcoCycle Dashboard</title>
  
    <?php include "../includes/topInfo.php"; ?>
   

    <style>
        @import url('../assets/css/deshboard.css');
    </style>
</head>

<body class="gradient-bg min-h-screen text-white">
    <!-- Navigation -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Sidebar -->
    <?php include '../includes/sidebar.php'; ?>

    
    <div id="main-content">
    <?php include "pages/dashboard.php"; ?>
    </div>


    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

</body>
<script src="../assets/js/deshboardA.js"></script>
<script src="app.js"></script>
</html>