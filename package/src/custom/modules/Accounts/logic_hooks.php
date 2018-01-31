<?php

$hook_array['before_save'][] = Array(
    1,
    'Queue Job Example',
    'custom/modules/Accounts/Accounts_Save.php',
    'Accounts_Save',
    'QueueJob'
);

?>