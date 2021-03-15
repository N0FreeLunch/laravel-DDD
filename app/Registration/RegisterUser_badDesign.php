<?php
class RegisterUser
{
  protected $name;
  protected $username;
  protected $isAdmin = false;
  protected $isPremierMember = false;

  public function setName($name) {
    $this -> name = $name;
  }

  public function makeAdmin() {
    $this -> username = $username;
  }

  public function getUserAttributes() {
    return [
        'name' => ucfirst($this->name),
        'username' = $this => ucfirst($this -> name),
        'isAdmin' => $this -> isAdmin == false ? "NO" : "YES",
        'isPremierMember' => $this -> isPremierMember == false ? "NO" : "YES"
    ];
  }

  public function registerUser() {
    $user = new User($this -> name, $this -> username, $this -> isAdmin, $this -> isPremierMember);
    return $user;
  }
}
