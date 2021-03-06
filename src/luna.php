<?php

class luna {
    
    protected $front;
    protected $front_path;
    protected $front_args;
    protected $render_args;

    public function __construct() {
        // cons
    }

    public function render($return = true) {
        foreach ($this->front_args as $key => $value) {
            
            if (empty($value) || !key_exists(trim($value), $this->render_args))
                continue;

            $this->front = str_replace('{'.$value.'}', $this->render_args[trim($this->front_args[$key])], $this->front);
        }
        if ($return)
            return $this->front;

        echo $this->front;
    }

    public function with($args) {
        $this->front_args = $this->get_between($this->front, '{', '}');
        $this->render_args = $args;
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

    /**
     * Gets string between two string
     * 
     * @since 1.0
     * @param string context
     * @param string start delimiter
     * @param string end delimiter
     * @return array
     */
    private function get_between($str, $start, $end) : array {
        $contents = array();
        $startDelimiterLength = strlen($start);
        $endDelimiterLength = strlen($end);
        $startFrom = $contentStart = $contentEnd = 0;
        while (false !== ($contentStart = strpos($str, $start, $startFrom))) {
            $contentStart += $startDelimiterLength;
            $contentEnd = strpos($str, $end, $contentStart);

            if (false === $contentEnd)
                break;
            
            $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
            $startFrom = $contentEnd + $endDelimiterLength;
        }

        return $contents;
    }
}
