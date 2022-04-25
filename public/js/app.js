$(document).ready(function () {
    $("#confirmPassword").keyup(function () {
        var password = $('#newPassword').val();
        var passwordConfirmation = $('#confirmPassword').val();
        if (passwordConfirmation.length == password.length && passwordConfirmation == password) {
            $('#confirmation').text('Password Confirmed');
            $('#confirmation').append('<span id="verify" class="md md-verified-user"></span>');
        } else {
            $('#confirmation').text('Password Confirmation Does Not Match');
            $('#confirmation').append('<span id="verify" class="text-danger md md-error"></span>');
        }
    });

    $("#btnImage").click(function () {
        $('#selectFile').trigger('click');
    });

    $('#selectFile').change(function () {
        var forminput = document.getElementById('selectFile');
        var fr = new FileReader();
        fr.readAsDataURL(forminput.files[0]);
        fr.onloadend = function (e) {
            var bin = e.target.result;
            var img = document.getElementById('imgFile');
            img.src = bin;
        }
    });

    $("#btnUserImage").click(function () {
        $('#selectPhoto').trigger('click');
    });

    $('#selectPhoto').change(function () {
        var forminput = document.getElementById('selectPhoto');
        var fr = new FileReader();
        fr.readAsDataURL(forminput.files[0]);
        fr.onloadend = function (e) {
            var bin = e.target.result;
            var img = document.getElementById('imgPhoto');
            img.src = bin;
        }
    });

    $("#admin").on('click', function () {
        $('#staff').removeClass('hidden');
        $('#departmentDiv').addClass('hidden');
    });
    $("#staff").on('click', function () {
        $('#staff').removeClass('hidden');
        $('#departmentDiv').addClass('hidden');
    });
    $("#teacher").on('click', function () {
        $('#staff').addClass('hidden');
        $('#departmentDiv').removeClass('hidden');
    });
    $("#student").on('click', function () {
        $('#staff').addClass('hidden');
        $('#departmentDiv').removeClass('hidden');
    });

    $("#btnStaffImage").click(function () {
        $('#staffimg').trigger('click');
    });
    $('#staffimg').change(function () {
        var forminput = document.getElementById('staffimg');
        var fr = new FileReader();
        fr.readAsDataURL(forminput.files[0]);
        fr.onloadend = function (e) {
            var bin = e.target.result;
            var img = document.getElementById('imgStaffPhoto');
            img.src = bin;
        }
    });

    $('#faculty').change(function () {
        if ($('#teacher').is(':checked')) {
            $('#department').removeAttr('disabled');
        } else if ($('#student').is(':checked')) {
            $('#department').removeAttr('disabled');
        } else {
            $('#department').attr('disabled', true);
            $('#department').append('<option></option>');
        }
    });

    $('#admin').click(function () {
        $('.fatherName').addClass('hidden');
        $('.degree').addClass('hidden');
        $('.class').addClass('hidden');
        $('.school').addClass('hidden');
        $('.graduationYear').addClass('hidden');
        $('.KankorNo').addClass('hidden');
        $('.manager').removeClass('hidden');
        $('.page-access-permission').removeClass('hidden');
        $('.positions').removeClass('hidden');
    });
    $('#staff').click(function () {
        $('.fatherName').addClass('hidden');
        $('.degree').addClass('hidden');
        $('.class').addClass('hidden');
        $('.school').addClass('hidden');
        $('.graduationYear').addClass('hidden');
        $('.KankorNo').addClass('hidden');
        $('.manager').removeClass('hidden');
        $('.page-access-permission').removeClass('hidden');
        $('.positions').removeClass('hidden');
    });
    $('#teacher').click(function () {
        $('.fatherName').removeClass('hidden');
        $('.degree').removeClass('hidden');
        $('.class').addClass('hidden');
        $('.school').addClass('hidden');
        $('.graduationYear').addClass('hidden');
        $('.KankorNo').addClass('hidden');
        $('.manager').addClass('hidden');
        $('.page-access-permission').addClass('hidden');
        $('.positions').addClass('hidden');
    });
    $('#student').click(function () {
        $('.fatherName').removeClass('hidden');
        $('.class').removeClass('hidden');
        $('.school').removeClass('hidden');
        $('.graduationYear').removeClass('hidden');
        $('.KankorNo').removeClass('hidden');
        $('.degree').addClass('hidden');
        $('.manager').addClass('hidden');
        $('.page-access-permission').addClass('hidden');
        $('.positions').addClass('hidden');
    });

    $('#facultyT').change(function () {
        $('#departmentT').removeAttr('disabled');
    });
    $('#department').change(function () {
        $('#class').removeAttr('disabled');
    });
    $('#facultyS').change(function () {
        $('#departmentS').removeAttr('disabled');
    });
    $('#departmentS').change(function () {
        $('#class').removeAttr('disabled');
    });

    $(document).on('click', 'a[data-role=EditFacultyDepartment]', function () {
        var id = $(this).data('id');
        var dpID = $('#' + id).children('td[data-target=departmentID]').text();
        var departmentName = $('#' + id).children('td[data-target=departmentName]').text();
        var regdate = $('#' + id).children('td[data-target=regdate]').text();

        $('#dpID').val(dpID);
        $('#departmentName').val(departmentName);
        $('#departmentDate').val(regdate);
    });

    $(document).on('click', 'a[data-role=EditClass]', function () {
        var id = $(this).data('id');
        var className = $('#' + id).children('td[data-target=className]').text();
        var facultyName = $('#' + id).children('td[data-target=facultyName]').text();
        var departmentName = $('#' + id).children('td[data-target=departmentName]').text();
        var semester = $('#' + id).children('td[data-target=semester]').text();

        $('#classID').val(id);
        $('#className').val(className);
        $('#faculty-Name').text('Faculty Name: ' + facultyName);
        $('#department-Name').text('Department Name: ' + departmentName);
        $('#semesterNo').text('Semester: ' + semester);
    });

    $('#faculty-class').change(function () {
        $('#department-class').removeAttr('disabled');
    });
    $('#faculty-classes').change(function () {
        $('#department-classes').removeAttr('disabled');
    });


    $(document).on('click', 'a[data-role=edit-attr]', function () {
        var id = $(this).data('id');
        var firstName = $('#' + id).children('td[data-target=firstName]').text();
        var lastName = $('#' + id).children('td[data-target=lastName]').text();
        var attYear = $('#' + id).children('td[data-target=attYear]').text();
        var attMonth = $('#' + id).children('td[data-target=attMonth]').text();
        var attday = $('#' + id).children('td[data-target=attday]').text();
        var attr = $('#' + id).children('td[data-target=attr]').text();

        var fullName = firstName + ' ' + lastName;
        if (attr == 1) {
            $("#Present").prop("checked", true);
        } else if (attr == 2) {
            $("#Sick").prop("checked", true);
        } else if (attr == 3) {
            $("#Necessary").prop("checked", true);
        } else {
            $("#Absences").prop("checked", true);
        }
        $('#stName').text('Current Staff Name: ' + fullName);
        $('#year').val(attYear);
        $('#month').text('Month');
        $('#month').append(': ' + attMonth);
        $('#day').text('Day');
        $('#day').append(': ' + attday);
        $('#dataID').val(id);
        $('.staffATTR').modal('toggle');
    });

    $(document).on('click', 'a[data-role=edit-staff-salary]', function () {
        var id = $(this).data('id');
        var firstName = $('#' + id).children('td[data-target=firstName]').text();
        var lastName = $('#' + id).children('td[data-target=lastName]').text();
        var amount = $('#' + id).children('td[data-target=amount]').text();
        var salaryDate = $('#' + id).children('td[data-target=salaryDate]').text();
        var bonus = $('#' + id).children('td[data-target=bonus]').text();
        var Absences = $('#' + id).children('td[data-target=Absences]').text();
        var pay = $('#' + id).children('td[data-target=pay]').text();
        var fullName = firstName + ' ' + lastName;
        if (pay == 1) {
            $("#payd").prop("checked", true);
        } else {
            $("#notpayd").prop("checked", true);
        }
        $('#sName').text('Current Staff Name: ' + fullName);
        $('#amounts').val(amount);
        $('#salaryDates').val(salaryDate);
        $('#bonuses').val(bonus);
        $('#absencesv').text('Absences');
        $('#absencesv').append(': ' + Absences);
        $('#dataID').val(id);
        $('.StaffSalary').modal('toggle');
    });

    $(document).on('click', 'a[data-role=edit-teacher-attr]', function () {
        var id = $(this).data('id');
        var firstName = $('#' + id).children('td[data-target=firstName]').text();
        var lastName = $('#' + id).children('td[data-target=lastName]').text();
        var attYear = $('#' + id).children('td[data-target=attYear]').text();
        var attMonth = $('#' + id).children('td[data-target=attMonth]').text();
        var attday = $('#' + id).children('td[data-target=attday]').text();
        var attr = $('#' + id).children('td[data-target=attr]').text();

        var fullName = firstName + ' ' + lastName;
        if (attr == 1) {
            $("#Present").prop("checked", true);
        } else if (attr == 2) {
            $("#Sick").prop("checked", true);
        } else if (attr == 3) {
            $("#Necessary").prop("checked", true);
        } else {
            $("#Absences").prop("checked", true);
        }
        $('#stName').text('Current Teacher Name: ' + fullName);
        $('#year').val(attYear);
        $('#month').text('Month');
        $('#month').append(': ' + attMonth);
        $('#day').text('Day');
        $('#day').append(': ' + attday);
        $('#dataID').val(id);
        $('.TATTR').modal('toggle');
    });

    $(document).on('click', 'a[data-role=edit-teacher-salary]', function () {
        var id = $(this).data('id');
        var firstName = $('#' + id).children('td[data-target=firstName]').text();
        var lastName = $('#' + id).children('td[data-target=lastName]').text();
        var amount = $('#' + id).children('td[data-target=amount]').text();
        var salaryDate = $('#' + id).children('td[data-target=salaryDate]').text();
        var bonus = $('#' + id).children('td[data-target=bonus]').text();
        var Absences = $('#' + id).children('td[data-target=Absences]').text();
        var pay = $('#' + id).children('td[data-target=pay]').text();
        var fullName = firstName + ' ' + lastName;
        if (pay == 1) {
            $("#payd").prop("checked", true);
        } else {
            $("#notpayd").prop("checked", true);
        }
        $('#tName').text('Current Teacher Name: ' + fullName);
        $('#amounts').val(amount);
        $('#salaryDates').val(salaryDate);
        $('#bonuses').val(bonus);
        $('#absencesv').text('Absences');
        $('#absencesv').append(': ' + Absences);
        $('#dataID').val(id);
        $('.tSalary').modal('toggle');
    });

    $(document).on('click', 'a[data-role=edit-subject]', function () {
        var id = $(this).data('id');
        var subjectName = $('#' + id).children('td[data-target=subjectName]').text();
        $('#editSubject').val(subjectName);
        $('#subjectID').val(id);
        $('.subject').modal('toggle');
    });

    $(document).on('click', 'a[data-role=updated]', function () {
        var id = $(this).data('id');
        var currentRow = $(this).closest("tr");
        var fullName = currentRow.find("td:eq(0)").text();
        var facultyName = currentRow.find("td:eq(1)").text();
        var departmentName = currentRow.find("td:eq(2)").text();
        var className = currentRow.find("td:eq(3)").text();
        var subname = currentRow.find("td:eq(4)").text();
        var day = currentRow.find("td:eq(5)").text();
        var starttime = currentRow.find("td:eq(6)").text();
        var Endtime = currentRow.find("td:eq(7)").text();

        $('#TeacherName').text('Teacher: ');
        $('#TeacherName').append(fullName);
        $('#fName').text('Faculty: ');
        $('#fName').append(facultyName);
        $('#dName').text('Department: ');
        $('#dName').append(departmentName);
        $('#cName').text('Class: ');
        $('#cName').append(className);
        $('#sName').text('Subject: ');
        $('#sName').append(subname);
        $('#dayName').text('Day: ');
        $('#dayName').append(day);
        $('#sTime').text('StartTime: ');
        $('#sTime').append(starttime);
        $('#eTime').text('End Time: ');
        $('#eTime').append(Endtime);
        $('#dataID').val(id);
        $('.EditSchedules').modal('toggle');
    });

    $(document).on('click', 'a[data-role=EditGraduation]', function () {
        var id = $(this).data('id');
        var currentRow = $(this).closest("tr");
        var fullName = currentRow.find("td:eq(0)").text();
        var facultyName = currentRow.find("td:eq(1)").text();
        var departmentName = currentRow.find("td:eq(2)").text();
        var graduation = currentRow.find("td:eq(3)").text();

        $('#GStudentName').text('Student: ');
        $('#GStudentName').append(fullName);
        $('#GFacultyName').text('Faculty: ');
        $('#GFacultyName').append(facultyName);
        $('#GDepartmentName').text('Department: ');
        $('#GDepartmentName').append(departmentName);
        $('#GDate').text('Graduation Date: ');
        $('#GDate').append(graduation);

        $('#dataID').val(id);
        $('.EditSchedules').modal('toggle');
    });

    $(document).on('click', 'a[data-role=edit-student-attr]', function () {
        var id = $(this).data('id');
        var firstName = $('#' + id).children('td[data-target=firstName]').text();
        var lastName = $('#' + id).children('td[data-target=lastName]').text();
        var attYear = $('#' + id).children('td[data-target=attYear]').text();
        var attMonth = $('#' + id).children('td[data-target=attMonth]').text();
        var attday = $('#' + id).children('td[data-target=attday]').text();
        var currentRow = $(this).closest("tr");
        var attr = currentRow.find("td:eq(5)").text();
        var fullName = firstName + ' ' + lastName;
        if (attr == 1) {
            $("#Presents").prop("checked", true);
        } else if (attr == 2) {
            $("#Sicks").prop("checked", true);
        } else if (attr == 3) {
            $("#Necessarys").prop("checked", true);
        } else {
            $("#Absencess").prop("checked", true);
        }
        $('#stName').text('Current Student Name: ' + fullName);
        $('#years').val(attYear);
        $('#month').text('Month');
        $('#month').append(': ' + attMonth);
        $('#day').text('Day');
        $('#day').append(': ' + attday);
        $('#dataID').val(id);
        $('.TATTR').modal('toggle');
    });

    $(document).on('click', 'a[data-role=editFess]', function () {
        var id = $(this).data('id');
        var fullName = $('#' + id).children('td[data-target=fullName]').text();
        var facultyName = $('#' + id).children('td[data-target=facultyName]').text();
        var amount = $('#' + id).children('td[data-target=amount]').text();
        var mounth = $('#' + id).children('td[data-target=mounth]').text();
        var paydate = $('#' + id).children('td[data-target=paydate]').text();
        var payment = $('#' + id).children('td[data-target=payment]').text();

        $('#Ffaculty').text('Faculty: ' + facultyName);
        $('#stName').text('Student: ' + fullName);
        $('#FAmount').text('Amount: ' + amount);
        $('#Fmount').text('Mount: ' + mounth);
        $('#paydates').val(paydate);
        if (payment == 1) {
            $('#pay').attr('checked', true)
        } else {
            $('#pay').attr('checked', false)
        }
        $('#dataID').val(id);
        $('.TATTR').modal('toggle');
    });

    $(document).on('click', 'a[data-role=updated-Student-Schedule]', function () {
        var id = $(this).data('id');
        var currentRow = $(this).closest("tr");
        var fullName = currentRow.find("td:eq(0)").text();
        var facultyName = currentRow.find("td:eq(1)").text();
        var departmentName = currentRow.find("td:eq(2)").text();
        var className = currentRow.find("td:eq(3)").text();
        var subname = currentRow.find("td:eq(4)").text();
        var day = currentRow.find("td:eq(5)").text();
        var starttime = currentRow.find("td:eq(6)").text();
        var Endtime = currentRow.find("td:eq(7)").text();

        $('#StudentNames').text('Student: ');
        $('#StudentNames').append(fullName);
        $('#SfName').text('Faculty: ');
        $('#SfName').append(facultyName);
        $('#SdName').text('Department: ');
        $('#SdName').append(departmentName);
        $('#ScName').text('Class: ');
        $('#ScName').append(className);
        $('#SsName').text('Subject: ');
        $('#SsName').append(subname);
        $('#SdayName').text('Day: ');
        $('#SdayName').append(day);
        $('#SsTime').text('StartTime: ');
        $('#SsTime').append(starttime);
        $('#SeTime').text('End Time: ');
        $('#SeTime').append(Endtime);
        $('#SdataID').val(id);
        $('.SEditSchedules').modal('toggle');
    });

    $('.DELETEUser').on('click', function () {
        var id = $('.Delete').val();
        Swal.fire({
            title: 'Are you sure?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (id == 1) {
                    Swal.fire(
                        'This is the main user. You can not delete this user',
                        '',
                        'info'
                    );
                } else {
                    $('.delete_form').submit();
                }
            }
        });
    });

    $('.DELETE').on('click', function () {
        var id = $('.Delete').val();
        Swal.fire({
            title: 'Are you sure?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('.delete_form').submit();
            }
        });
    });

    $('.DELETEStaff').on('click', function () {
        var id = $('.userID').text();
        Swal.fire({
            title: 'Are you sure?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (id == 1) {
                    Swal.fire(
                        'This is the main user. You can not delete this user',
                        '',
                        'info'
                    );
                } else {
                    $('.delete_form').submit();
                }
            }
        });
    });

    $(".btn-homework").click(function () {
        $('.select-homework').trigger('click');
    });

});