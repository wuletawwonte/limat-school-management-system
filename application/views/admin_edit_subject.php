

<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Fill the form carefully</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="<?php echo base_url(); ?>welcome/editsubjectrecord" method="post" role="form">
                <div class="col-xs-6"><br>
                	<input type="text" name="id" value=<?php echo $result->id; ?> hidden>
                    <div class="form-group">
                        <label>Subject Title</label>
                        <input type="text" name="title"  class="form-control" value=<?php echo $result->title;?> required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Edit</button>
                    </div>
            </form>
        </div>
        <div class="box-footer">

        </div><!-- /.box-header -->
    </div>
</section><!-- /.content -->

