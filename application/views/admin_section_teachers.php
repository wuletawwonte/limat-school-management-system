


<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">

            <div class="col-xs-6">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Section Title</td>
                            <td><?php echo $section->title; ?></td>
                        </tr>
                        <tr>
                            <td>Grade</td>
                            <td><?php echo $section->grade; ?></td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td><?php echo $section->name; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>


<!--             <a href="<?php echo base_url(); ?>welcome/addsectionform" class="btn btn-primary pull-left">Add New</a>
 -->    
		</div>
        <div class="box-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Subject Id</th>
                        <th>Subject Title</th>
                        <th>Teacher</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($result as $list) { ?>
                    <tr>
                        <td><?php echo $list['id']; ?></td>
                        <td><?php echo $list['title']; ?></td>
                        <td>
                        	<?php 
                        		foreach($subject_teachers as $subject_teacher) {
                        			if($list['id'] == $subject_teacher['subject_id']) {
                        				foreach($teachers as $teacher) {
                        					if($subject_teacher['teacher_id'] == $teacher['id']) { 
                        						echo $teacher['first_name'].' '.$teacher['last_name'];
                        					}
                        				}
                        			} else {
                        				echo "<mark>Not Available</mark>";
                        			}
                        		}
                        	?>
                        </td>
                        <td>
                            <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>welcome/updatesectionform/<?php echo $list['id']; ?>">Change</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->