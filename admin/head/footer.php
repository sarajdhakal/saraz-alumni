</div>
</div>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>
<script src="assets/plugins/datatables/datatables.search.js"></script>
<script src="assets/js/script.js"></script>
<script>
    $(document).ready(function() {
        var table = $("#dataTable").DataTable();

        $("#searchInput").on("keyup", function() {
            table.search(this.value).draw();
        });
    });
</script>


</body>

</html>