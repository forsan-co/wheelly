<?php 

class Application implements ArrayAccess
{
	/**
	 * @var array
	 */
	protected $container;

    /**
     * @param mixed $offset
     * @return mixed|null
     */
	public function offsetGet($offset) {
		if(!isset($this->container[$offset])){
			return null;
		} 

		$binding = $this->container[$offset];
		return $this->resolve($binding);
	}

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) {
		if(is_null($offset)) {
			$this->container[] = $value;
			return;
		}

		$this->container[$offset] = $value;
	}

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset) {
		unset($this->container[$offset]);
	}

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
		return isset($this->container[$offset]);
	}

    /**
     * @param $binding
     * @return mixed|null
     */
    public function __get($binding) {
		return isset($this->container[$binding]) ? 
			$this->resolve($this->container[$binding]) :
			null;
	}

    /**
     * @param $binding
     * @param $resolver
     */
    public function __set($binding, $resolver) {
		$this->container[$binding] = $resolver;
	}

    /**
     * @param $binding
     * @return mixed
     */
    protected function resolve($binding) {
		return is_callable($binding) ?
			call_user_func($binding) :
			$binding;
	}  
}