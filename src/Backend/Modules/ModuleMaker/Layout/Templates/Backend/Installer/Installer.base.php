<?php

namespace Backend\Modules\{$camel_case_name}\Installer;

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the {$title} module
 *
 * @author {$author_name} <{$author_email}>
 */
class Installer extends ModuleInstaller
{
    public function install()
    {
        // import the sql
        $this->importSQL(dirname(__FILE__) . '/Data/install.sql');

        // install the module in the database
        $this->addModule('{$camel_case_name}');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, '{$camel_case_name}');

        $this->setActionRights(1, '{$camel_case_name}', 'Index');
        $this->setActionRights(1, '{$camel_case_name}', 'Add');
        $this->setActionRights(1, '{$camel_case_name}', 'Edit');
        $this->setActionRights(1, '{$camel_case_name}', 'Delete');{$install_extras}

        // add extra's
        $subnameID = $this->insertExtra('{$camel_case_name}', 'block', '{$camel_case_name}', null, null, 'N', 1000);
        $this->insertExtra('{$camel_case_name}', 'block', '{$camel_case_name}Detail', 'Detail', null, 'N', 1001);

{$backend_navigation}
    }
}
