<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
<link rel="stylesheet" href="../../assets/css/styles.min.css">
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <button class="btn btn-primary text-right btn-circle ml-1" onclick="goBack()"><i class="fas fa-long-arrow-alt-left text-white"></i></button>
    <div class="sidebar-brand-text mx-3"><span>CPLogistics</span></div>
</nav>
<script>
    function goBack() {
        window.history.back();
    }
</script>

<?php
$vit = $_POST["viticultor"];
echo '
<embed src="./pdf_core.php?v='.$vit.'" width="100%" height="90%" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">';
?>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="../../assets/js/script.min.js"></script>