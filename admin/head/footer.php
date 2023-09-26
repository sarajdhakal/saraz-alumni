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

<script>$(document).ready(function () {
    // Function to animate the counters
    function animateCounter(counterElement, endValue) {
        let current = 1;
        const step = Math.ceil(endValue / 400); // Increased the step for a slower animation

        const counterInterval = setInterval(function () {
            if (current >= endValue) {
                clearInterval(counterInterval);
                current = endValue;
            }
            counterElement.text(current);
            current += step;
        }, 50); // Increased the interval for a slower animation
    }

    // Call the animation function for each counter on page load
    $('.counter').each(function () {
        const endValue = parseInt($(this).data('end'));
        animateCounter($(this), endValue);
    });
});</script>
</body>

</html>