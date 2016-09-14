<?php 

class Application implements ArrayAccess
{
	/**
	 * @var array
	 */
	protected $container;

	public function offsetGet($offset) {
		if(!isset($this->container[$offset])){
			return null;
		} 

		$binding = $this->container[$offset];
		return $this->resolve($binding);
	}

	public function offsetSet($offset, $value) {
		if(is_null($offset)) {
			$this->container[] = $value;
			return;
		}

		$this->container[$offset] = $value;
	}

	public function offsetUnset($offset) {
		unset($this->container[$offset]);
	}

	public function offsetExists($offset) {
		return isset($this->container[$offset]);
	}

	public function __get($binding) {
		return isset($this->container[$binding]) ? 
			$this->resolve($this->container[$binding]) :
			null;
	}

	public function __set($binding, $resolver) {
		$this->container[$binding] = $resolver;
	}

	protected function resolve($binding) {
		return is_callable($binding) ?
			call_user_func($binding) :
			$binding;
	}  
}