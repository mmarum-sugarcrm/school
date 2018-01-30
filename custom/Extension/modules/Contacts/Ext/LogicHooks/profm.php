<?php

$hook_array['after_save'][] = Array(
    //Processing index. For sorting the array.
    1,

    //Label. A string value to identify the hook.
    'after_save add student to gradebook',

    //The PHP file where your class is located.
    'custom/modules/Contacts/after_save_class.php',

    //The class the method is in.
    'after_save_class',

    //The method to call.
    'after_save_method'
);

?>
