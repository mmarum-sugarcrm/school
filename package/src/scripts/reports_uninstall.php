<?php
// Copyright 2018 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.
require_once('custom/ProfM/Install/ReportInstaller.php');

use Sugarcrm\Sugarcrm\custom\ProfM\Install\ReportInstaller;

$reports = new ReportInstaller();

$reports->uninstall();
