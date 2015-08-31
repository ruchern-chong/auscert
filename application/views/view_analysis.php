<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Course Analysis</h1>
                <h4><?php echo $course->courseName ?></h4>

                <h3>Users Enrolled</h3>
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>UserID</th>
                            <th>User Name</th>
                            <th>Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($courseUsers as $courseUser) { ?>
                                <tr>
                                    <td><?php echo $courseUser->userID?></td>
                                    <td><?php echo $courseUser->username?></td>
                                    <td><?php echo $courseUser->completion?></td>
                                </tr>
                            <?php }; ?>
                    </tbody>
                </table>

                <h3>Users Completed</h3>
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>UserID</th>
                        <th>User Name</th>
                        <th>Completion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    try {
                        foreach ($completedUsers as $completedUser) { ?>
                            <tr>
                                <td><?php echo $completedUser->userID ?></td>
                                <td><?php echo $completedUser->username ?></td>
                                <td><?php echo $completedUser->completion ?></td>
                            </tr>
                            <?php
                        };
                    } catch (exception $e) {
                        echo $completedUsers;
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">


            </div>
        </div>
    </div>
</div>




<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('#pageAdmin').removeAttr('href');
    });
</script>
</body>
</html>