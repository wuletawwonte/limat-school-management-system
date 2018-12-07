<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Student Details</h3>
        </div>
        <div class="box-body">
            <div class="col-xs-6">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td><?php echo $result->first_name; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><?php echo $result->last_name; ?></td>
                        </tr>
                        <tr>
                            <td>Sex</td>
                            <td><?php echo $result->sex; ?></td>
                        </tr>
                        <tr>
                            <td>Kebele</td>
                            <td><?php echo $result->kebele; ?></td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>                        	
                            	<?php foreach($subjects as $subject) {
	                        		if($subject['id'] == $result->subject) {
	                        			echo $subject['title'];
	                        		}
                        		} ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->