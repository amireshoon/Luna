<?php

class luna {
    
    protected $front;
    protected $front_path;

    public function __construct() {
        // cons
    }

    public function render() {
        
    }

    public function with($args) {
        return $this;
    }

    public function view($viewfile) {
        $this->set_front($viewfile);
        return $this;
    }

    public function page($pagefile) {
        $this->set_front($pagefile);
        return $this;
    }

    /**
     * Validates front file and load front data
     * 
     * @since 1.0
     * @param string front path
     * @return bool
     * @throws exception
     */
    private function set_front($front) {
        $this->front_path = $front;
        $handle = fopen($this->front_path, "r");

        if (!is_resource($handle))
            throw new Exception("There is no such file in {$this->front_path}", 1);
            
        $this->front = fread($handle, filesize($this->front_path));

        fclose($handle);
        
        return true;
    }
}
