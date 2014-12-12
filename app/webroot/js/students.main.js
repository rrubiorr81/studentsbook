var Student = {
    urlAjaxRequestPhoneNumber: "",
    urlAjaxRequestNewStudent:"",
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
            }

        });
    }
};


$(function() {

    $('#student').on('change',  function()
    {
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
