<?php
class Admin
{
    private $_id;
    private $_login;
    private $_pass;
    
    // CONSTRUCTEUR
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    
    // HYDRATATION
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if(method_exists($this, $method))
                $this->$method($value);
        }
    }
    
    // GETTERS
    public function id()
    {
        return $this->_id;    
    }   
    public function login()
    {
        return $this->_login;     
    }   
    public function pass()
    {
        return $this->_pass;    
    }   
    
    // SETTERS
    public function setId($id)
    {
        $id = (int) $id;
        
        if($id > 0)
            $this->_id = $id;
    }
    public function setLogin($login)
    {
        if(is_string($login))
            $this->_login = $login;
    }
    public function setPass($pass)
    {
        $this->_pass = $pass;
    }
}