<?php
// timelime model
class Timeline
{
    public $db;
    private $stmt;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserData($userId)
    {
        // $query = "SELECT * FROM users WHERE email = :email";
       // return $this->db->query($query)->bind(":email", $email)->getSingle();
    
        return $this->db->query('SELECT *,
                            tweets.tweetID as tweetId,
                            tweets.status as status,
                            tweets.tweetImage as tweetImage,
                            tweets.likesCount as likesCount,
                            tweets.postedOn as postedOn,
                            users.user_id as userId,
                            users.username as username,
                            users.email as email,
                            users.screenName as screenName,
                            users.profileImage as profileImage,
                            users.profileCover as profileCover,
                            users.following as following,
                            users.followers as followers,
                            users.bio as bio,
                            users.country as country,
                            users.website as website
                            FROM tweets
                            INNER JOIN users
                            ON tweets.tweetBy = users.user_id
                            WHERE users.user_id = :userId ORDER BY tweets.postedOn DESC')->bind(':userId', $userId)->resultSet();
    }

    public function saveTweet($table, $fields = array())
    {
        $i = 1;
        $values = '';
        $columns ='';
        foreach ($fields as $key => $value) {
            $columns .= "{$key} ";
            $values .= " :{$key} ";
            if ($i < count($fields)) {
                $columns .= ", ";
                $values .= ", ";
            }
            $i++;
        };
        $query = "INSERT INTO {$table}({$columns}) VALUES ({$values})";
        $this->stmt = $this->db->query($query);
        foreach ($fields as $key => $value) {
            $this->stmt->bind(':' . $key, $value);
        }
        return $this->stmt->execute();
    }
}
