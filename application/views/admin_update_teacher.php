


<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Fill the form carefully</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="<?php echo base_url(); ?>welcome/updateteacherrecord" method="post" role="form">
                <div class="col-xs-6"><br>
                	<input type="text" name="id" value=<?php echo $result->id; ?> hidden>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name"  class="form-control" value=<?php echo $result->first_name; ?> required />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name"  class="form-control" value=<?php echo $result->last_name; ?> required />
                    </div>
                    <div class="form-group">
                        <label>Sex</label>
                        <select  class="form-control" name="sex">
                            <option value="Female" <?php if($result->sex == 'Female') echo 'selected'; ?> >Female</option>
                            <option value="Male" <?php if($result->sex == 'Male') echo 'selected'; ?> >Male</option>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label>Kebele</label>
                        <input type="text" name="kebele" class="form-control" value=<?php echo $result->kebele; ?> />
                    </div>
                </div>
                <div class="col-xs-6"><br>

                    <div class="form-group">
                        <label>Subject</label>
                        <select  class="form-control" name="subject">
                            <?php foreach($subjects as $row) { ?>
	                            <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $result->subject) echo 'selected'; ?> ><?php echo $row['title']; ?></option>
	                        <?php  } ?>
                        </select>
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

