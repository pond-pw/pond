<?php

namespace Pond\Account;

class Storage
{
    private \SQLite3 $db;

    public function __construct(\SQLite3 $SQLite3)
    {
        $this->db = $SQLite3;
    }

    public function save(Account $account) : void
    {
        $sql = "INSERT INTO accounts (id,username,password) VALUES(:id,:username,:password)";


        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $account->getId());
        $statement->bindValue(':username', $account->getCredentials()->getUsername());
        $statement->bindValue(':password', $account->getCredentials()->getPassword());

        $successfullyAdded = $this->db->exec($statement);
        if($successfullyAdded) {
            return;
        }
        CouldNotSaveAccount::throwFromErrorCode($this->db->lastErrorCode(), $this->db->lastErrorMsg());
    }


}
