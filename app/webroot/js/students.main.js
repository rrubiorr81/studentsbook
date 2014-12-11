var Student = {
    urlAjaxRequestPhoneNumber: "",
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
    }
};


$(function() {

    $('#student').on('change',  function()
    {
        Student.loadPhoneNumber();
    });

});
