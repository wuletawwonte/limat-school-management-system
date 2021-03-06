


<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?php echo base_url(); ?>welcome/addstudentform" class="btn btn-primary pull-left">Add New</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
	                foreach($result as $list){ ?>
                    <tr>
                        <td>
                            <?php echo $list->id; ?>
                        <td>
                        	<a href="<?php echo base_url(); ?>welcome/viewstudentdetails/<?php echo $list->id; ?>"><?php echo $list->first_name.' '.$list->last_name; ?></a>
                        </td>
                        <td><?php echo $list->grade; ?></td>
                        <td><?php echo $list->section; ?></td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="<?php echo base_url(); ?>welcome/updatestudentform/<?php echo $list->id; ?>">Update</a> |
                            <a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>welcome/deletestudent/<?php echo $list->id; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer with-border text-center">
            <p><?php echo $links; ?></p>
        </div>
    </div><!-- /.box -->
</section><!-- /.content -->