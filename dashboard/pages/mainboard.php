<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>EcoCycle Dashboard</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


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
    <?php include "reward.php"; ?>
    </div>


    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

</body>
<script src="../assets/js/deshboardA.js"></script>

<script>
   
</script>


<script>
     $(document).ready(function () {
            $(".nav-link").on("click", function (e) {
                e.preventDefault();

                let pageUrl = $(this).attr("href");
                let pageTitle = $(this).data("title");

                // Load page dynamically inside #main-content
                $("#main-content").load(pageUrl);

                // Change URL without reloading the page
                window.history.pushState({ path: pageUrl }, pageTitle, pageUrl);
                document.title = pageTitle + " | EcoCycle";
            });

            // Handle back/forward buttons
            window.onpopstate = function (event) {
                if (event.state && event.state.path) {
                    $("#main-content").load(event.state.path);
                }
            };
        });
</script>
</html>