<?php
use \Sizzle\EventLogger;
use \Sizzle\UserMilestone;

if (isset($_GET['uid']) && isset($_GET['key'])) {
    $user_id = (int) $_GET['uid'];
    $key = escape_string($_GET['key']);
    try {
        $rows_affected = update("UPDATE user SET activation_key = NULL WHERE id = '$user_id' AND activation_key = '$key' LIMIT 1");
        if ($rows_affected != 1) {
            throw new Exception('Update failed');
        }
        $event = new EventLogger($user_id, EventLogger::ACTIVATE_ACCOUNT);
        $event->log();
        $message = '<div>Your account is now active. You may now <a href="'.$app_root.'">Log in</a></div>';
        $UserMilestone = new UserMilestone($user_id, 'Confirm Email');
    } catch (Exception $e) {
        $message = '<div>Your account could not be activated. Please recheck the link or contact the system administrator.</div>';
    }
} else {
    $message = '<div>Your account could not be activated. Please recheck the link or contact the system administrator.</div>';
}

header('Location: '.$app_root.'?action=login');

?>
