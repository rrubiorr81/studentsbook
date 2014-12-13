<?php
echo $this->Form->select('student', $students, array('type' => 'file'));
//echo Router::url(array('controller' => 'students', 'action' => 'index'));
?>

<div id="phone_div" style="color:red"></div>
<div id="email_div" style="color:blue"></div>

<a id="add_student">Add Student</a>

<div id="form_addstudent" class="hide">
    <?php
    echo $this->Form->create('Student');
    echo $this->Form->input('name');
    echo $this->Form->input('phone_number');
	echo $this->Form->input('email');
    echo $this->Form->end('Save Student');
    ?>
</div>

<?php
echo $this->Html->script('students.main.js');
echo $this->Html->css('student.css');
?>

<script>
    Student.urlAjaxRequestPhoneNumber   = '<?=$urlAjaxRequestPhoneNumber?>';
    Student.urlAjaxRequestNewStudent    = '<?=$urlAjaxRequestNewStudent?>';
    Student.urlAjaxRequestEmail         = '<?=$urlAjaxRequestEmail?>';
</script>

<div id="op_message"></div>