<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class Accounts_Save
{
    function QueueJob(&$bean, $event, $arguments)
    {
        require_once('include/SugarQueue/SugarJobQueue.php');

        //create the new job
        $job = new SchedulersJob();
        //job name
        $job->name = "Account Alert Job - {$bean->name}";
        //data we are passing to the job
        $job->data = $bean->id;
        //function to call
        $job->target = "function::AccountAlertJob";

        global $current_user;
        //set the user the job runs as
        $job->assigned_user_id = $current_user->id;

        //push into the queue to run
        $jq = new SugarJobQueue();
        $jobid = $jq->submitJob($job);
    }
}

?>