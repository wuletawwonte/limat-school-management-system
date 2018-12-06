

<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Fill the form carefully</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="<?php echo base_url(); ?>welcome/updatesectionrecord" method="post" role="form">
                <div class="col-xs-6"><br>
                	<input type="text" name="id" value=<?php echo $result->id; ?> hidden>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="number" name="grade"  class="form-control" value=<?php echo $result->grade;?> required />
                    </div>
                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" maxlength=1 name="name"  class="form-control" value=<?php echo $result->name;?> required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
            </form>
        </div>
        <div class="box-footer">

        </div><!-- /.box-header -->
    </div>
</section><!-- /.content -->

