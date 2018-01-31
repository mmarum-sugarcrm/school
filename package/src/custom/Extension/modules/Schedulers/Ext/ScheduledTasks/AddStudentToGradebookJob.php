<?php

function AddStudentToGradebookJob($job)
{
    if (!empty($job->data))
    {
        $GLOBALS['log']->fatal('Adding student to gradebook');
        return true;
    }

    return false;
}