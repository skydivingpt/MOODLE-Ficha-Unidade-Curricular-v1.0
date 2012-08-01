<?php


defined('MOODLE_INTERNAL') || die();

function fuc_supports($feature) {
    switch($feature) {
        case FEATURE_MOD_INTRO:         return true;
        default:                        return null;
    }
}

function fuc_add_instance(stdClass $fuc, mod_fuc_mod_form $mform = null) {
    global $DB;   
	$fuc->timecreated = time();
return $DB->insert_record('fuc', $fuc);	
}


function fuc_update_instance(stdClass $fuc, mod_fuc_mod_form $mform = null) {
    global $DB;

    $fuc->timemodified = time();
    $fuc->id = $fuc->instance;

    # You may have to add extra stuff in here #

    return $DB->update_record('fuc', $fuc);
}

function fuc_delete_instance($id) {
    global $DB;

    if (! $fuc = $DB->get_record('fuc', array('id' => $id))) {
        return false;
    }

    # Delete any dependent records here #

    $DB->delete_records('fuc', array('id' => $fuc->id));

    return true;
}


function fuc_user_outline($course, $user, $mod, $fuc) {

    $return = new stdClass();
    $return->time = 0;
    $return->info = '';
    return $return;
}

function fuc_user_complete($course, $user, $mod, $fuc) {
}


function fuc_print_recent_activity($course, $viewfullnames, $timestart) {
    return false;  //  True if anything was printed, otherwise false
}


function fuc_get_recent_mod_activity(&$activities, &$index, $timestart, $courseid, $cmid, $userid=0, $groupid=0) {
}


function fuc_print_recent_mod_activity($activity, $courseid, $detail, $modnames, $viewfullnames) {
}


function fuc_cron () {
    return true;
}

function fuc_get_participants($fucid) {
    return false;
}

function fuc_get_extra_capabilities() {
    return array();
}

function fuc_scale_used($fucid, $scaleid) {
    global $DB;

    /** @example */
    if ($scaleid and $DB->record_exists('fuc', array('id' => $fucid, 'grade' => -$scaleid))) {
        return true;
    } else {
        return false;
    }
}

function fuc_scale_used_anywhere($scaleid) {
    global $DB;

    /** @example */
    if ($scaleid and $DB->record_exists('fuc', array('grade' => -$scaleid))) {
        return true;
    } else {
        return false;
    }
}

function fuc_grade_item_update(stdClass $fuc) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    /** @example */
    $item = array();
    $item['itemname'] = clean_param($fuc->name, PARAM_NOTAGS);
    $item['gradetype'] = GRADE_TYPE_VALUE;
    $item['grademax']  = $fuc->grade;
    $item['grademin']  = 0;

    grade_update('mod/fuc', $fuc->course, 'mod', 'fuc', $fuc->id, 0, null, $item);
}
function fuc_update_grades(stdClass $fuc, $userid = 0) {
    global $CFG, $DB;
    require_once($CFG->libdir.'/gradelib.php');

    /** @example */
    $grades = array(); // populate array of grade objects indexed by userid

    grade_update('mod/fuc', $fuc->course, 'mod', 'fuc', $fuc->id, 0, $grades);
}

function fuc_get_file_areas($course, $cm, $context) {
    return array();
}


function fuc_pluginfile($course, $cm, $context, $filearea, array $args, $forcedownload) {
    global $DB, $CFG;

    if ($context->contextlevel != CONTEXT_MODULE) {
        send_file_not_found();
    }

    require_login($course, true, $cm);

    send_file_not_found();
}


function fuc_extend_navigation(navigation_node $navref, stdclass $course, stdclass $module, cm_info $cm) {
}

function fuc_extend_settings_navigation(settings_navigation $settingsnav, navigation_node $fucnode=null) {
}
