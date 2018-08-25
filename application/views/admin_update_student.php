

<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Fill the form carefully</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="<?php echo base_url(); ?>welcome/updatestudentrecord" method="post" role="form">
                <div class="col-xs-6"><br>
                	<input type="text" name="id" value=<?php echo $result->id; ?> hidden>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name"  class="form-control" value=<?php echo $result->first_name;?> required />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name"  class="form-control" value=<?php echo $result->last_name;?> required />
                    </div>
                    <div class="form-group">
                        <label>Sex</label>
                        <select  class="form-control" name="sex">
                            <option value="Female" <?php if($result->sex == 'Female') echo 'selected'; ?> >Female</option>
                            <option value="Male" <?php if($result->sex == 'Male') echo 'selected'; ?> >Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="number" min='7' max='10' name="grade" class="form-control" placeholder="7" value=<?php echo $result->grade;?> required />
                    </div>
                </div>
                <div class="col-xs-6"><br>
                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" name="section" class="form-control" placeholder="A" value=<?php echo $result->section;?> required />
                    </div>
                    <div class="form-group">
                        <label>Family Phone Number</label>
                        <input type="text" name="family_phone_number" class="form-control" value=<?php echo $result->family_phone_number;?> />
                    </div>
                    <div class="form-group">
                        <label>Kebele</label>
                        <input type="text" name="kebele" class="form-control" value=<?php echo $result->kebele;?> />
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

