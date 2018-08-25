


<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Create Subject</h3>
        </div>
        <div class="box-body">
            <div class="col-xs-5">
                <form action="<?php echo base_url(); ?>welcome/createsubjectrecord" method="post">
                    <div class="form-group has-feedback">
                        <label for="title">Subject Title</label>
                        <input type="text" name="title" class="form-control" required />
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary pull-right">Create</button>
                        </div><!-- /.col -->
                    </div>
                </form>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->