<?php
echo $this->Html->script('students.main.js');
echo $this->Form->select('student', $students);
//echo Router::url(array('controller' => 'students', 'action' => 'index'));
?>

<div id="phone_div" style="color:red"></div>
<script>
    Student.urlAjaxRequestPhoneNumber = '<?=$urlAjaxRequestPhoneNumber ?>';
</script>