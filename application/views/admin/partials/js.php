    <!-- JQUERY -->
    <script src=<?= base_url().'assets/js/jquery.min.js' ?>></script>
    <!-- Popper.JS -->
    <script src=<?= base_url().'assets/js/popper.min.js' ?>></script>
    <!-- Bootstrap JS -->
    <script src=<?= base_url().'assets/js/bootstrap.min.js' ?>></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src=<?= base_url().'assets/js/jquery.mCustomScrollbar.concat.min.js' ?>></script>
    <script src=<?= base_url().'assets/js/paginathing.js' ?>></script>
    <script>
    $(document).ready(function (){
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function (){
            $('#sidebar, #navbar').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
    </script>
</body>
</html>