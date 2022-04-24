<?php
include_once('../layouts/header.php');
include_once('../controller/facultyController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Create New User</strong>
                <div class="tools">
                    <div class="btn-group">
                        <a class="btn btn-floating-action btn-primary" href="users.php"><i class="md md-reply-all"></i></a>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <img id="imgPhoto" class="width-3 img-circle" src="../public/images/default.png" alt=""/><br><br>
                <div class="row">
                    <button id="btnUserImage" class="btn btn-primary">Choose Photo</button>
                </div>
                <br>
                <form class="form" method="POST" action="../controller/createUserController.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-head style-primary">
                                    <header>User Details</header>
                                </div>
                                <div class="card-body floating-label">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="hidden" type="file" name="photo" id="selectPhoto">
                                                    <input type="email" id="email" class="form-control" name="email"
                                                           value="">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select id="level" class="form-control" name="statue" required>
                                                        <option value=""></option>
                                                        <option value="0">Deactivated</option>
                                                        <option value="1">Active</option>
                                                    </select>
                                                    <label for="level">Status</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" id="password" class="form-control"
                                                       name="password" required>
                                                <label for="email">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12"><label>User Level</label></div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Administrator</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="radio" id="admin" name="level" value="0">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Staff</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="radio" id="staff" name="level" value="1">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Teacher</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="radio" id="teacher" name="level" value="2">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Student</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="radio" id="student" name="level" value="3">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div>
                        </div>
                        <div class="col-md-4 page-access-permission">
                            <div class="card">
                                <div class="card-head style-primary">
                                    <header>Page Access Permission</header>
                                </div>
                                <div class="card-body floating-label">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Admin</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" name="admin" value="8">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Finance</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" name="finance" value="3">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>HR</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" name="hr" value="4">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>logistic</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" name="logistic" value="1">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-head style-primary">
                                    <header>Page Management Permission</header>
                                </div>
                                <div class="card-body floating-label">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Visit</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" name="visit" value="1">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Create</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" name="create" value="3">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Edit</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" name="edit" value="4">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>Delete</span>
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" name="delete" value="8">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <div class="card">
                                    <div class="card-head style-primary">
                                        <header>Staff Details</header>
                                    </div>
                                    <div class="card-body floating-label">
                                        <img id="imgStaffPhoto" class="width-3 img-circle"
                                             src="../public/images/default.png" alt=""/><br><br>
                                        <div class="row">
                                            <button type="button" id="btnStaffImage" class="btn btn-primary">Choose
                                                Photo
                                            </button>
                                        </div>
                                        <br>
                                        <input type="file" name="image" id="staffimg" class="hidden">
                                        <div>
                                            <label class="radio-inline radio-styled">
                                                <input type="radio" name="gendre" value="0" checked><span>Male</span>
                                            </label>
                                            <label class="radio-inline radio-styled">
                                                <input type="radio" name="gendre" value="1"><span>Female</span>
                                            </label>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <select name="faculty" class="form-control" id="faculty">
                                                            <option value=""></option>
                                                            <?php while ($row = mysqli_fetch_assoc($faculty)) { ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="faculty">Faculty</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 manager">
                                                    <div class="form-group">
                                                        <span>Manager</span>
                                                        <div class="checkbox checkbox-styled">
                                                            <label>
                                                                <input type="checkbox" id="manager" name="manager" value="1">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 hidden" id="departmentDiv">
                                                    <div class="form-group">
                                                        <select name="department" class="form-control" id="department" disabled></select>
                                                        <label for="department">Department</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 class hidden">
                                                    <div class="form-group">
                                                        <select name="class" class="form-control" id="class" disabled>
                                                            <option value=""></option>
                                                        </select>
                                                        <label for="class">Class</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="firstName" class="form-control" id="first">
                                                    <label for="first">First Name</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="lastName" class="form-control" id="last">
                                                    <label for="last">Last Name</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 fatherName hidden">
                                                <div class="form-group">
                                                    <input type="text" name="fatherName" class="form-control" id="fatherName">
                                                    <label for="last">Father Name</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 degree hidden">
                                                <div class="form-group">
                                                    <input type="text" name="degree" class="form-control" id="degree">
                                                    <label for="last">Degree</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 school hidden">
                                                <div class="form-group">
                                                    <input type="text" name="school" class="form-control" id="school">
                                                    <label for="School">school</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 graduationYear hidden">
                                                <div class="form-group">
                                                    <select name="graduationYear" class="form-control" id="graduationYear">
                                                        <?php
                                                        $begin = date("Y") - 25;
                                                        $end = date("Y") - 20;
                                                        for ($i = $end; $i >= $begin; $i--) {
                                                            echo "<option>" . $i . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="graduationYear">Graduation Year</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 KankorNo hidden">
                                                <div class="form-group">
                                                    <input type="text" name="KankorNo" class="form-control" id="KankorNo">
                                                    <label for="KankorNo">Kankor No</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="hometown" class="form-control" id="homet">
                                                    <label for="homet">Hometown</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="livesin" class="form-control" id="live">
                                                    <label for="live">Lives in</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Birthday</label><br>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <select name="year" class="form-control" id="years">
                                                            <?php
                                                            $begin = date("Y") - 35;
                                                            $end = date("Y") - 18;
                                                            for ($i = $end; $i >= $begin; $i--) {
                                                                echo "<option>" . $i . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="years">Year</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <select name="month" class="form-control" id="months">
                                                            <?php
                                                            for ($i = 1; $i <= 12; $i++) {
                                                                echo "<option>" . $i . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="months">Month</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <select name="day" class="form-control" id="days">
                                                            <?php
                                                            for ($i = 1; $i <= 31; $i++) {
                                                                echo "<option>" . $i . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="days">Day</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="nic" class="form-control" id="nics">
                                                    <label for="nics">Identity</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="phone" class="form-control" id="phones">
                                                    <label for="phones">Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 positions hidden">
                                                <div class="form-group">
                                                    <input type="text" name="position" class="form-control"
                                                           id="positions">
                                                    <label for="positions">Position</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="regdates">Registration</label>
                                                    <input type="date" name="regdate" class="form-control"
                                                           id="regdates">

                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--end .row -->
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
