<!-- Template JS File -->
<script src="<?php echo base_url('storage/assets/app/js/all-modules.js') ?>"></script>
<script src="<?php echo base_url('storage/assets/app/js/main.min.js') ?>"></script>
<script src="<?php echo base_url('storage/assets/app/js/custom.js') ?>"></script>

<script src="<?php echo base_url('storage/assets/lms/default-app/js/custom.js') ?>"></script>

<?php $this->load->view('lms/default-app/_layouts/plugins'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#ShowMenuMobile").click(function() {
            $("#mySidenav").addClass("show")
        });


        $("#bngst").click(function() {
            const id = $(this).data('id');
            const rederect = '<?= $courses['first_lesson'] ?>';
            $.ajax({
                url: '<?= base_url('user/Courses/add_courses'); ?>',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log('ok');
                    window.location.href = rederect;
                },
                error: function(data) {
                    alert(data);
                }
            });
        });

        $("#CloseMenuMobile").click(function() {
            $("#mySidenav").removeClass("show")
        });
    });
</script>
</body>

</html>