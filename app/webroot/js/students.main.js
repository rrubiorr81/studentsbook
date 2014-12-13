var Student = {
    urlAjaxRequestPhoneNumber: "",
    urlAjaxRequestNewStudent:"",
    urlAjaxRequestEmail:"",
    loadingMessage: "loading...",
    addStudentMessages:{
        0: "",
        1: 'Student added successfully'
    },
    loadPhoneNumber: function(){
        var selected_student = $('#student').val();

        $.ajax({
            type: "POST",

            url: Student.urlAjaxRequestPhoneNumber + "/" + selected_student,
            data: { student_id: selected_student },
            success: function (data)
            {
                var parsed  = JSON.parse(data);
                console.dir(parsed.Phone['pnumber']);
                console.dir(parsed);
                $('#phone_div').html(parsed.Phone['pnumber']);
            }

        });
    },
    loadEmail: function(){
        var selected_student = $('#student').val();

        $.ajax({
            type: "POST",

            url: Student.urlAjaxRequestEmail + "/" + selected_student,
            data: { student_id: selected_student },
            success: function (data)
            {
                var parsed  = JSON.parse(data);
                /*console.dir(parsed);*/
                $('#email_div').html(parsed.Email['email']);

            }

        });
    },
    setNewStudent: function($form){
        var newStudentData = $form.serialize();
//        console.dir(newStudentData);
        $.ajax({
            type: "POST",
            url: Student.urlAjaxRequestNewStudent,
            data: { form_data: newStudentData },
            success: function (data)
            {
                var parsed  = JSON.parse(data);
                $('#form_addstudent').addClass('hide');
                $("#student").append('<option value=' + parsed.data.id_student + '>' + parsed.data.name + '</option>');
                $("#op_message").html(Student.addStudentMessages[parsed.result]).fadeIn(300).delay(2000).fadeOut(300);
                $form.find("input[type=text], input[type=email], textarea").val("");
            }

        });
    },
    setLoadingMessage: function(){
        $('#email_div').html(Student.loadingMessage);
        $('#phone_div').html(Student.loadingMessage);
    }
};


$(function() {

    $('#student').on('change',  function()
    {
        Student.setLoadingMessage();
        Student.loadEmail();
        Student.loadPhoneNumber();
    });

    $('#add_student').on('click',  function()
    {
//        Student.loadPhoneNumber();
        $('#form_addstudent').removeClass('hide');
    });

    $('#StudentIndexForm').on('submit',  function(e)
    {
        Student.setNewStudent($(this));
        e.preventDefault();
    });

});
