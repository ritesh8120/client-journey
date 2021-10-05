</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
    $(document).ready(function() {
        $('.fggroup').change(function() {
            var fggroup = $(this).val();
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                dataType: "html",
                url: 'changefggroup',
                data: {
                    fggroup: fggroup,
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                }
            });
        });
        $('.levels').change(function() {
            var audience = $(this).val();
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                dataType: "html",
                url: 'changelevel',
                data: {
                    audience: audience,
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                }
            });
        });

        $('.connenction').change(function() {
            var audience = $(this).val();
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                dataType: "html",
                url: 'changeconnection',
                data: {
                    audience: audience,
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                }
            });
        });

        $('.reply').change(function() {
            var audience = $(this).val();
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                dataType: "html",
                url: 'changereply',
                data: {
                    audience: audience,
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                }
            });
        });
    });
</script>
</body>

</html>