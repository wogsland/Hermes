<?php
namespace Sizzle;

/**
 * This class is for database interaction with emails sent by customers.
 */
class EmailSent
{
    protected $id;
    protected $email_credential_id;
    protected $body;
    protected $recruiting_token_id;
    protected $from;
    protected $to;
    protected $cc;
    protected $bcc;
    protected $reply_to;
    protected $subject;
    protected $success;
    protected $error_message;
    protected $created;

    /**
     * This function constructs the class
     *
     * @param int $id - optional id of the email credentials
     */
    public function __construct($id = null)
    {
        if ($id !== null && (int) $id == $id) {
            $token = execute_query(
                "SELECT * FROM email_sent
                WHERE id = '$id'"
            )->fetch_object("Sizzle\EmailSent");
            if (is_object($token)) {
                foreach (get_object_vars($token) as $key => $value) {
                    $this->$key = $value;
                }
            }
        }
    }

    /**
     * This function gets a protected property
     *
     * @param string $var - the class property desired
     */
    public function __get($var)
    {
        if (isset($this->$var)) {
            return $this->$var;
        }
    }

    /**
     * This function creates an entry in the email_sent table
     *
     * @param array $details - information to insert
     *
     * @return int $id - id of inserted row or 0 on fail
     */
    public function create($details)
    {
        $id = 0;
        if (is_array($details) && isset($details['to'], $details['from'], $details['subject'],$details['body'], $details['email_credential_id'], $details['success'])
        ) {
            // details contains minimal subset

            // create list of columns & values
            $columns = '';
            $values = '';
            $keys = get_class_vars(get_class($this));
            foreach ($details as $key=>$value) {
                if (array_key_exists($key, $keys)) {
                    $columns .= ", `$key`";
                    $values .= ", '$value'";
                    $this->$key = $value;
                }
            }
            $columns = ltrim($columns, ', ');
            $values = ltrim($values, ', ');
            $query = "INSERT INTO email_sent ($columns) VALUES ($values)";
            $id = insert($query);
        }
        return $id;
    }
}
