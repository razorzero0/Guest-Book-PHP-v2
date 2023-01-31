</div>
</div>

<!-- jQuery -->
<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="assets/js/custom.min.js"></script>
<script>
    //when file loaded for first time, fadeout this loader
    $(window).load(function() {
        $(".preloader").fadeOut("slow");
    });
</script>

<script type="text/javascript">
    //when page scrolled to end of page
    //call function loadMoreData
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var last_id = $(".post-id:last").attr("id");
            loadMoreData(last_id);
            clearInterval(a)
        } else {

        }
    });

    //loadMoreData is function to load data from database with ajax method
    //loadMoreData will call when page scrolled to end of the page
    function loadMoreData(last_id) {
        $.ajax({
                url: 'komentar/loadMoreData.php?last_id=' + last_id,
                type: "get",
                beforeSend: function() {
                    $(".preloader").show();
                }
            })
            .done(function(data) {
                //show data
                $("#post-data").append(data);
                $(".preloader").fadeOut("slow");
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }
</script>

<script>
    $(document).ready(function() {
        $("#submitKomentar").click(function(e) {
            e.preventDefault();
            var data = $('.form-data').serialize();
            $.ajax({
                type: 'POST',
                url: "komentar/addKomentar.php",
                data: data,
                success: function(response) {
                    $('#komentar').val('')
                    $('#post-data').load('komentar/data.php');
                }
            });
        });
    });
</script>
<script>
    const a = setInterval(() => {
        $('#post-data').load('komentar/data.php');
    }, 1000)
</script>
</body>

</html>