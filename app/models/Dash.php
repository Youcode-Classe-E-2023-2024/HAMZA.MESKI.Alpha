<?php 
class Dash {
    private $db; 

    public function __construct() {
        $this->db = new Database();
    }

    // register user
    public function insertAdderName($adder_name) {
        // query
        $this->db->query('INSERT INTO notifications(adder_name) VALUES(:adder_name)');
        // bind values
        $this->db->bind(':adder_name', $adder_name);
        // execute 
        $this->db->execute();
    }

    // get all users 
    public function getAllAdders($adder_name) {
        // $adder_name = 'jack';
        $this->db->query("SELECT * FROM notifications WHERE adder_name != :adder_name");
        $this->db->bind(':adder_name', $adder_name);
        $userNames = $this->db->resultSet();

        return $userNames;
    }

    public function getNotifications($excludedAdderNames) {
        // $excludedAdderNames is an array of names to exclude
        // Example: $excludedAdderNames = ['jack', 'john', 'alice'];
    
        $placeholders = implode(', ', array_fill(0, count($excludedAdderNames), '?'));
    
        $this->db->query("SELECT * FROM notifications WHERE id NOT IN ($placeholders)");
        
        foreach ($excludedAdderNames as $index => $name) {
            $this->db->bind(($index + 1), $name);
        }
    
        $userNames = $this->db->resultSet();
    
        return $userNames;
    }
    
    public function markRead($notif_id, $user_id) {
        // query
        $this->db->query('INSERT INTO seen_notifications(notification_id, user_id) VALUES(:notif_id, :user_id)');
        // bind values
        $this->db->bind(':notif_id', $notif_id);
        $this->db->bind(':user_id', $user_id);
        // execute 
        $this->db->execute();
    }

    public function selectMarkRead() {
        // $adder_name = 'jack';
        $this->db->query("SELECT DISTINCT notification_id, user_id FROM seen_notifications");
        // $this->db->bind(':adder_name', $adder_name);
        $userNames = $this->db->resultSet();

        return $userNames;
    }
}