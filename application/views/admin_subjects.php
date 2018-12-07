


<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?php echo base_url(); ?>welcome/addsubjectform" class="btn btn-primary pull-left">Add New</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Subject id</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
	                foreach($result as $list){ ?>
                    <tr>
                        <td><?php echo $list->id; ?></td>
                        <td><?php echo $list->title; ?></td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="<?php echo base_url(); ?>welcome/editsujectform/<?php echo $list->id; ?>">Edit</a> |
                            <a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>welcome/deletesubject/<?php echo $list->id; ?>">Delete</a>
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