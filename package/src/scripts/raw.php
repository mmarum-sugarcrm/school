<?php
// Copyright 2018 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

function get_custom()
{

    $default_reports[] = array('Contacts', $lang_strings['DEFAULT_REPORT_TITLE_5'], '{"display_columns":[{"name":"date_modified","label":"Last Modified","table_key":"self"},{"name":"full_name","label":"Contact Name","table_key":"self"},{"name":"phone_work","label":"Office Phone","table_key":"self"},{"name":"name","label":"Account Name","table_key":"Contacts:accounts"},{"name":"alt_address_country","label":"Alternate Address Country","table_key":"self"},{"name":"full_name","label":"Assigned to","table_key":"Contacts:assigned_user_link"}],"summary_columns":[],"filters_def":{"Filter_1":{"operator":"AND","0":{"name":"do_not_call","table_key":"self","qualifier_name":"equals","input_name0":["no"]}}},"group_defs":[],"order_by":[],"module":"Contacts","report_name":"' . $lang_strings['DEFAULT_REPORT_TITLE_5'] . '","report_type":"tabular","chart_type":"none","full_table_list":{"self":{"value":"Contacts","module":"Contacts","label":"Contacts","children":{"accounts":"accounts","reports_to_link":"reports_to_link","team_link":"team_link","created_by_link":"created_by_link","modified_user_link":"modified_user_link","assigned_user_link":"assigned_user_link"}},"Contacts:accounts":{"label":"Account","link_def":{"relationship_name":"accounts_contacts","name":"accounts","link_type":"one","label":"Account","table_key":"Contacts:accounts","bean_is_lhs":0},"parent":"self","optional":0,"module":"Accounts","name":"Contacts > Accounts"},"Contacts:reports_to_link":{"label":"Reports To","link_def":{"relationship_name":"contact_direct_reports","name":"reports_to_link","link_type":"one","label":"Reports To","table_key":"Contacts:reports_to_link","bean_is_lhs":0},"parent":"self","optional":1,"module":"Contacts","name":"Contacts > Contacts"},"Contacts:team_link":{"label":"Teams","link_def":{"relationship_name":"contacts_team","name":"team_link","link_type":"one","label":"Teams","table_key":"Contacts:team_link","bean_is_lhs":0},"parent":"self","optional":1,"module":"Teams","name":"Contacts > Teams"},"Contacts:created_by_link":{"label":"Created by User","link_def":{"relationship_name":"contacts_created_by","name":"created_by_link","link_type":"one","label":"Created by User","table_key":"Contacts:created_by_link","bean_is_lhs":0},"parent":"self","optional":1,"module":"Users","name":"Contacts > Users"},"Contacts:modified_user_link":{"label":"Modified by User","link_def":{"relationship_name":"contacts_modified_user","name":"modified_user_link","link_type":"one","label":"Modified by User","table_key":"Contacts:modified_user_link","bean_is_lhs":0},"parent":"self","optional":1,"module":"Users","name":"Contacts > Users"},"Contacts:assigned_user_link":{"label":"Assigned to User","link_def":{"relationship_name":"contacts_assigned_user","name":"assigned_user_link","link_type":"one","label":"Assigned to User","table_key":"Contacts:assigned_user_link","bean_is_lhs":0},"parent":"self","optional":1,"module":"Users","name":"Contacts > Users"}}}','tabular');

    return $default_reports;
}

function create_default_reports($is_upgrade = false, $reportlist = array())
{


    foreach ($default_reports as $report) {
        if (!empty($reportlist) && !in_array($report[1], $reportlist)) {
            continue;
        }

        $saved_report = BeanFactory::newBean('Reports');
        if ($is_upgrade) {
            $report_id = $saved_report->retrieveReportIdByName($report[1]);
            if (!empty ($report_id))
                continue;
        }
        if ($report[3] == 'tabular') {
            $result = $saved_report->save_report(-1, 1, $report[1], $report[0], $report[3], $report[2], 1, '1', 'none');
        }
        else {
            $result = $saved_report->save_report(-1, 1, $report[1], $report[0], $report[3], $report[2], 1, '1', $report[4]);
        }
    }

}
