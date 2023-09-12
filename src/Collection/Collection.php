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
			if ($array instanceof Iterator) {
				$array = iterator_to_array($array);
			}

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


		#[\ReturnTypeWillChange]
		public function count ()
		{
			return count($this->items);
		}


		#[\ReturnTypeWillChange]
		public function current ()
		{
			return current($this->items);
		}


		#[\ReturnTypeWillChange]
		public function key ()
		{
			return key($this->items);
		}


		#[\ReturnTypeWillChange]
		public function next ()
		{
			return next($this->items);
		}


		#[\ReturnTypeWillChange]
		public function rewind ()
		{
			return reset($this->items);
		}


		#[\ReturnTypeWillChange]
		public function valid ()
		{
			return key($this->items) !== null;
		}


		#[\ReturnTypeWillChange]
		public function offsetExists ($offset)
		{
			return isset($this->items[$offset]);
		}


		#[\ReturnTypeWillChange]
		public function & offsetGet ($offset)
		{
			return $this->items[$offset];
		}


		#[\ReturnTypeWillChange]
		public function offsetSet ($offset, $value)
		{
			if (is_null($offset)) {
				$this->items[] = $value;
			} else {
				$this->items[$offset] = $value;
			}
		}


		#[\ReturnTypeWillChange]
		public function offsetUnset ($offset)
		{
			unset($this->items[$offset]);
		}
	}
