<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Fill the form carefully</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="<?php echo base_url(); ?>welcome/createsectionrecord" method="post" role="form">
                <div class="col-xs-6"><br>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="number" name="grade" min="7" max="10" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" maxlength=1 name="name"  class="form-control" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-footer">

        </div><!-- /.box-header -->
    </div>
</section><!-- /.content -->

