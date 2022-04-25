$(document).ready(function () {
    $('#search-user').keyup(function () {
        var query = $(this).val();
        $('#user-data').html('');
        $.ajax({
            url: '../controller/Ajax/searchUserController.php',
            type: 'POST',
            data: {search: query},
            success: function (data) {
                $('#user-data').html(data);
            }
        });
    });

    $('#search-staff').keyup(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/searchStaffController.php',
            type: 'POST',
            data: {search: query},
            success: function (data) {
                $('#staff-data').html(data);
            }
        });
    });

    $('#faculty').change(function () {
        if ($('#teacher').is(':checked') || $('#student').is(':checked')) {
            var query = $(this).val();
            $.ajax({
                url: '../controller/Ajax/getDepartmentController.php',
                type: 'POST',
                data: {faculty: query},
                success: function (data) {
                    $('#department').html(data);
                }
            });
        }
    });

    $('#department').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/classController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#class').html(data);
            }
        });
    });

    $('#search-teacher').keyup(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/searchTeacherController.php',
            type: 'POST',
            data: {search: query},
            success: function (data) {
                $('#teacher-data').html(data);
            }
        });
    });

    $('#facultyT').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getDepartmentController.php',
            type: 'POST',
            data: {faculty: query},
            success: function (data) {
                $('#departmentT').html(data);
            }
        });
    });

    $('#search-student').keyup(function () {
        var query = $(this).val();
        $.ajax({
            url : '../controller/Ajax/searchStudentController.php',
            type  : 'POST',
            data    : {search:query},
            success   : function(data){
                $('#student-data').html(data);
            }
        });
    });

    $('#facultyS').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getDepartmentController.php',
            type: 'POST',
            data: {faculty: query},
            success: function (data) {
                $('#departmentS').html(data);
            }
        });
    });
    $('#departmentS').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/classController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#class').html(data);
            }
        });
    });

    $('#search-faculty').keyup(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/searchFacultyController.php',
            type: 'POST',
            data: {search: query},
            success: function (data) {
                $('#faculty-data').html(data);
            }
        });
    });

    $('#search-class').keyup(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/searchClassController.php',
            type: 'POST',
            data: {search: query},
            success: function (data) {
                $('#class-data').html(data);
            }
        });
    });

    $('#faculty-class').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getDepartmentController.php',
            type: 'POST',
            data: {faculty: query},
            success: function (data) {
                $('#department-class').html(data);
            }
        });
    });

    $('#faculty-classes').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getDepartmentController.php',
            type: 'POST',
            data: {faculty: query},
            success: function (data) {
                $('#department-classes').html(data);
            }
        });
    });

    $('#search-Staff-Salary').keyup(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/searchStaffSalaryController.php',
            type: 'POST',
            data: {search: query},
            success: function (data) {
                $('#staff-data').html(data);
            }
        });
    });

    $('#staffName').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getStaffAttrController.php',
            type: 'POST',
            data: {query: query},
            success: function (data) {
                $('#absences').val(data);
            }
        });
    });

    $('#staffNames').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getStaffAttrController.php',
            type: 'POST',
            data: {query: query},
            success: function (data) {
                $('#absencess').val(data);
            }
        });
    });

    $('#teacherName').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getTeacherAttrController.php',
            type: 'POST',
            data: {query: query},
            success: function (data) {
                $('#absences').val(data);
            }
        });
    });

    $('#teacherNames').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getTeacherAttrController.php',
            type: 'POST',
            data: {query: query},
            success: function (data) {
                $('#absencess').val(data);
            }
        });
    });

    $('#faculty-Schedule').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getDepartmentController.php',
            type: 'POST',
            data: {faculty: query},
            success: function (data) {
                $('#department-Schedule').removeAttr('disabled');
                $('#department-Schedule').html(data);
            }
        });
    });

    $('#department-Schedule').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getClassScheduleController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#class-Schedule').removeAttr('disabled');
                $('#class-Schedule').html(data);
            }
        });
    });

    $('#editfaculty-Schedule').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getDepartmentController.php',
            type: 'POST',
            data: {faculty: query},
            success: function (data) {
                $('#editdepartment-Schedule').removeAttr('disabled');
                $('#editdepartment-Schedule').html(data);
            }
        });
    });

    $('#editdepartment-Schedule').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getClassScheduleController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#editclass-Schedule').removeAttr('disabled');
                $('#editclass-Schedule').html(data);
            }
        });
    });

    $('#GFaculty').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/graduationController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#GDepartment').removeAttr('disabled');
                $('#GDepartment').html(data);
            }
        });
    });

    $('#EditGFaculty').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/graduationController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#EditGDepartment').removeAttr('disabled');
                $('#EditGDepartment').html(data);
            }
        });
    });

    $('#ExamFaculty').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/graduationController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#ExamDepartment').removeAttr('disabled');
                $('#ExamDepartment').html(data);
            }
        });
    });

    $('#ExamDepartment').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getClassScheduleController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#ExamClass').removeAttr('disabled');
                $('#ExamClass').html(data);
            }
        });
    });

    $(document).on('click', 'a[data-role=examDetails]', function(){
        var query = $(this).data('id');
        $.ajax({
            url: '../controller/Ajax/ExamController.php',
            type: 'POST',
            data: {exam: query},
            success: function (data) {
                const result = JSON.parse(data);
                for (i = 0; i < result.length; i++){
                    if (result[i].image != "default.png"){
                        $('.ExamImage').attr("src", '../public/Storage/Student/' + result[i].image);
                    }else {
                        $('.ExamImage').attr("src", '../public/images/' + result[i].image);
                    }
                    $('.StudentName').text(result[i].SfirstName + " " + result[i].SlastName);
                    $('.TeacherName').text(result[i].firstName + " " + result[i].lastName);
                    $('.Faculty').text(result[i].facultyName);
                    $('.Department').text(result[i].departmentName);
                    $('.Class').text(result[i].className);
                    $('.Subject').text(result[i].subname);
                    $('.ExamDate').text(result[i].examyDate);
                    if (result[i].examlevel == 1){ $('.ExamType').text('Semi Final Exam');}
                    else { $('.ExamType').text('Final Exam');}
                    $('.ExamChance').text(result[i].examChanse);
                    $('.ExamScour').text(result[i].examscour);
                }

            }
        });
    });

    $('#FacultyName').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/graduationController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#DepartmentName').removeAttr('disabled');
                $('#DepartmentName').html(data);
            }
        });
    });

    $('#DepartmentName').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getClassScheduleController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#ClassName').removeAttr('disabled');
                $('#ClassName').html(data);
            }
        });
    });

    $('#ClassName').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/StudentController.php',
            type: 'POST',
            data: {student: query},
            success: function (data) {
                $('#SName').removeAttr('disabled');
                $('#SName').html(data);
            }
        });
    });

    $('#Sfaculty-Schedule').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/graduationController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#Sdepartment-Schedule').removeAttr('disabled');
                $('#Sdepartment-Schedule').html(data);
            }
        });
    });

    $('#Sdepartment-Schedule').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getClassScheduleController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#Sclass-Schedule').removeAttr('disabled');
                $('#Sclass-Schedule').html(data);
            }
        });
    });

    $('#editSfaculty-Schedule').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/graduationController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#Seditdepartment-Schedule').removeAttr('disabled');
                $('#Seditdepartment-Schedule').html(data);
            }
        });
    });

    $('#Seditdepartment-Schedule').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getClassScheduleController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#Seditclass-Schedule').removeAttr('disabled');
                $('#Seditclass-Schedule').html(data);
            }
        });
    });

    $('#HomeworkFaculty').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/getDepartmentController.php',
            type: 'POST',
            data: {faculty: query},
            success: function (data) {
                $('#HomeworkDepartment').removeAttr('disabled');
                $('#HomeworkDepartment').html(data);
            }
        });
    });

    $('#HomeworkDepartment').change(function () {
        var query = $(this).val();
        $.ajax({
            url: '../controller/Ajax/classController.php',
            type: 'POST',
            data: {department: query},
            success: function (data) {
                $('#HomeworkClass').removeAttr('disabled');
                $('#HomeworkClass').html(data);
            }
        });
    });

    $('.answer').click(function () {
        var answer = $(this).val();
        var AnswerID = $('.AnswerID').val();
        var Student = $('.Student').val();
        var SubjectID = $('.SubjectID').val();
        $.ajax({
            url: '../controller/Ajax/CheckExamController.php',
            type: 'POST',
            data: {
                answer: answer,
                AnswerID: AnswerID,
                Student: Student,
                SubjectID: SubjectID
            },
            success: function (data) {
            }
        });
    });
    $('.answer').click(function () {
        var radioName = $(this).attr("name"); //Get radio name
        $(":radio[name='"+radioName+"']").attr("disabled", true);
        var numberOfCheckedRadio = $('input:radio:checked').length
        var total = $('.total').text();
        if (numberOfCheckedRadio == total){
            window.history.back();
        }
    });

    $('.TeacherAttendance').click(function () {
        var attendance = $(this).val();
        var currentRow = $(this).closest("tr");
        var TeacherID = currentRow.find("td:eq(3)").text();

        $.ajax({
            url: '../controller/createTeacherAttendanceController.php',
            type: 'POST',
            data: {
                TeacherName: TeacherID,
                attendance: attendance
            },
            success: function (data) {
            }
        });
    });
    $('.TeacherAttendance').click(function () {
        var currentRow = $(this).closest("tr");
        var AllTeacher = currentRow.find("td:eq(4)").text();
        var radioName = $(this).attr("name"); //Get radio name
        $(":radio[name='"+radioName+"']").attr("disabled", true);
        var numberOfCheckedRadio = $('input:radio:checked').length
        if (numberOfCheckedRadio == AllTeacher){
            location.reload();
        }
    });

    $('.StudentAttendance').click(function () {
        var attendance = $(this).val();
        var currentRow = $(this).closest("tr");
        var StudentID = currentRow.find("td:eq(3)").text();

        $.ajax({
            url: '../controller/createStudentAttendanceController.php',
            type: 'POST',
            data: {
                StudentName: StudentID,
                attendance: attendance
            },
            success: function (data) {
            }
        });
    });
    $('.StudentAttendance').click(function () {
        var currentRow = $(this).closest("tr");
        var AllStudent = currentRow.find("td:eq(4)").text();
        var radioName = $(this).attr("name"); //Get radio name
        $(":radio[name='"+radioName+"']").attr("disabled", true);
        var numberOfCheckedRadio = $('input:radio:checked').length
        if (numberOfCheckedRadio == AllStudent){
            location.reload();
        }
    });
});