<?php

	/*
	 *
	 *	LiftKit MVC PHP Framework
	 *
	 */


	namespace LiftKit\Collection;

	use ArrayAccess;
	use Countable;
	use Iterator;


	/**
	 * Class Collection
	 *
	 * @package LiftKit\Collection
	 */
	class Collection implements ArrayAccess, Countable, Iterator
	{
		protected $items = array();


		public function __construct ($array = array())
		{
			$this->items = (array) $array;
		}


		public function toArray ()
		{
			return $this->items;
		}


		public function & getAll ()
		{
			return $this->items;
		}


		public function count ()
		{
			return count($this->items);
		}


		public function current ()
		{
			return current($this->items);
		}


		public function key ()
		{
			return key($this->items);
		}


		public function next ()
		{
			return next($this->items);
		}


		public function rewind ()
		{
			return reset($this->items);
		}


		public function valid ()
		{
			return key($this->items) !== null;
		}


		public function offsetExists ($offset)
		{
			return isset($this->items[$offset]);
		}


		public function offsetGet ($offset)
		{
			return $this->items[$offset];
		}


		public function & offsetSet ($offset, $value)
		{
			if (is_null($offset)) {
				$this->items[] = $value;
			} else {
				$this->items[$offset] = $value;
			}
		}


		public function offsetUnset ($offset)
		{
			unset($this->items[$offset]);
		}
	}
