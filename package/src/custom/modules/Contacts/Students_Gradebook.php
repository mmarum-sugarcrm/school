<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class Students_Gradebook
{
    function AddStudentToGradebook(&$bean, $event, $arguments)
    {
        $GLOBALS['log']->fatal('About to add a job to the queue');

        require_once('include/SugarQueue/SugarJobQueue.php');

        //create the new job
        $job = new SchedulersJob();
        //job name
        $job->name = "Add New Student to Gradebook Job - {$bean->name}";
        //data we are passing to the job
        $job->data = $bean->id;
        //function to call
        $job->target = "function::AddStudentToGradebookJob";

        global $current_user;
        //set the user the job runs as
        $job->assigned_user_id = $current_user->id;

        //push into the queue to run
        $jq = new SugarJobQueue();
        $jobid = $jq->submitJob($job);

        $GLOBALS['log']->fatal('Finished adding job to the queue');
    }
}

?>