<?php

App::uses('AclRouter', 'AclManager.Lib');
/**
 * Acl Manager
 *
 * A CakePHP Plugin to manage Acl
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Frédéric Massart - FMCorz.net
 * @copyright     Copyright 2011, Frédéric Massart
 * @link          http://github.com/FMCorz/AclManager
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * List of AROs (Class aliases)
 * Order is important! Parent to Children
 */
Configure::write('AclManager.aros', array('Group', 'User'));

/**
 * Limit used to paginate AROs
 * Replace {alias} with ARO alias
 * Configure::write('AclManager.{alias}.limit', 3)
 */
// Configure::write('AclManager.Role.limit', 3);

/**
 * Routing Prefix
 * Set the prefix you would like to restrict the plugin to
 * @see Configure::read('Routing.prefixes')
 */
// Configure::write('AclManager.prefix', 'admin');

/**
 * Ugly identation?
 * Turn off when using CSS
 */
Configure::write('AclManager.uglyIdent', true);
				
/**
 * Actions to ignore when looking for new ACOs
 * Format: 'action', 'Controller/action' or 'Plugin.Controller/action'
 */
Configure::write('AclManager.ignoreActions', array('isAuthorized'));

/**
 * List of ARO models to load
 * Use only if AclManager.aros aliases are different than model name
 */
// Configure::write('AclManager.models', array('Group', 'Customer'));

/**
 * END OF USER SETTINGS
 */

Configure::write("AclManager.version", "1.2.5");
if (!is_array(Configure::read('AclManager.aros'))) {
	Configure::write('AclManager.aros', array(Configure::read('AclManager.aros')));
}
if (!is_array(Configure::read('AclManager.ignoreActions'))) {
	Configure::write('AclManager.ignoreActions', array(Configure::read('AclManager.ignoreActions')));
}
if (!Configure::read('AclManager.models')) {
	Configure::write('AclManager.models', Configure::read('AclManager.aros'));
}

/*
 * The model name used for the user role (typically 'Role' or 'Group')
 */
Configure :: write('acl.aro.role.model', 'Group');

/*
 * The primary key of the role model
 *
 * (can be left empty if your primary key's name follows CakePHP conventions)('id')
 */
Configure :: write('acl.aro.role.primary_key', '');

/*
 * The foreign key's name for the roles
 *
 * (can be left empty if your foreign key's name follows CakePHP conventions)(e.g. 'role_id')
 */
Configure :: write('acl.aro.role.foreign_key', '');

/*
 * The model name used for the user (typically 'User')
 */
Configure :: write('acl.aro.user.model', 'User');

/*
 * The primary key of the user model
 *
 * (can be left empty if your primary key's name follows CakePHP conventions)('id')
 */
Configure :: write('acl.aro.user.primary_key', '');

/*
 * The name of the database field that can be used to display the role name
 */
Configure :: write('acl.aro.role.display_field', 'name');

/*
 * You can add here role id(s) that are always allowed to access the ACL plugin (by bypassing the ACL check)
 * (This may prevent a user from being rejected from the ACL plugin after a ACL permission update)
 */
Configure :: write('acl.role.access_plugin_role_ids', array());

/*
 * You can add here users id(s) that are always allowed to access the ACL plugin (by bypassing the ACL check)
 * (This may prevent a user from being rejected from the ACL plugin after a ACL permission update)
 */
Configure :: write('acl.role.access_plugin_user_ids', array(1));

/*
 * The users table field used as username in the views
 * It may be a table field or a SQL expression such as "CONCAT(User.lastname, ' ', User.firstname)" for MySQL or "User.lastname||' '||User.firstname" for PostgreSQL
 */
Configure :: write('acl.user.display_name', "User.username");

/*
 * Indicates whether the presence of the Acl behavior in the user and role models must be verified when the ACL plugin is accessed
 */
Configure :: write('acl.check_act_as_requester', true);