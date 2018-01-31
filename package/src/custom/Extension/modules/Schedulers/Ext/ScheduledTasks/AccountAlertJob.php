<?php

function AccountAlertJob($job)
{
    if (!empty($job->data))
    {
//        $bean = BeanFactory::getBean('Accounts', $job->data);
//
//        $emailObj = new Email();
//        $defaults = $emailObj->getSystemDefaultEmail();
//        $mail = new SugarPHPMailer();
//        $mail->setMailerForSystem();
//        $mail->From = $defaults['email'];
//        $mail->FromName = $defaults['name'];
//        $mail->Subject = from_html($bean->name);
//        $mail->Body = from_html("Email alert that '{$bean->name}' was saved");
//        $mail->prepForOutbound();
//        $mail->AddAddress('example@sugar.crm');
//
//        if($mail->Send())
//        {
//            //return true for completed
//            return true;
//        }
        $GLOBALS['log']->fatal('Executing the before save hook!');
        return true;
    }

    return false;
}