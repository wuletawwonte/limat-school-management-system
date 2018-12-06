<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Fill the form carefully</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="<?php echo base_url(); ?>welcome/createstudentrecord" method="post" role="form">
                <div class="col-xs-6"><br>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name"  class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name"  class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Sex</label>
                        <select  class="form-control" name="sex">
                            <option value="Female" selected>Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="number" min='7' max='10' name="grade" class="form-control" placeholder="7" required />
                    </div>
                </div>
                <div class="col-xs-6"><br>
                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" name="section" class="form-control" placeholder="A" required />
                    </div>
                    <div class="form-group">
                        <label>Family Phone Number</label>
                        <input type="text" name="family_phone_number" class="form-control" placeholder="09..." />
                    </div>
                    <div class="form-group">
                        <label>Kebele</label>
                        <input type="text" name="kebele" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                    </div>
            </form>
        </div>
        <div class="box-footer">

        </div><!-- /.box-header -->
    </div>
</section><!-- /.content -->

