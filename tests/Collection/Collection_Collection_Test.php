<?php


	require_once(__DIR__ . '/../bootstrap.php');

	use LiftKit\Collection\Collection;



	class Collection_Collection_Test extends PHPUnit_Framework_TestCase
	{
		/**
		 * @var Collection
		 */
		protected $collection;


		public function setUp ()
		{
			$this->collection = new Collection();
		}


		public function testInsertAsNextIndex()
		{
			$this->collection[] = 1;
			$this->collection[] = 2;

			$this->assertEquals($this->collection->toArray(), array(1, 2));
		}


		public function testInsertWithKey ()
		{
			$this->collection['a'] = 1;
			$this->collection['b'] = 2;

			$this->assertEquals(
				$this->collection->toArray(),
				array(
					'a' => 1,
					'b' => 2,
				)
			);
		}


		public function testCount ()
		{
			$this->collection[] = 1;
			$this->collection[] = 2;

			$this->assertEquals(count($this->collection), 2);
		}


		public function testSetUnset ()
		{
			$this->collection['test'] = 1;

			$this->assertEquals(
				$this->collection->toArray(),
				array(
					'test' => 1,
				)
			);

			unset($this->collection['test']);

			$this->assertEquals(
				$this->collection->toArray(),
				array()
			);
		}


		public function testOverwrite ()
		{
			$this->collection['test'] = 1;
			$this->collection['test'] = 2;

			$this->assertEquals(
				$this->collection->toArray(),
				array('test' => 2)
			);
		}


		public function testExists ()
		{
			$this->collection['test'] = 1;

			$this->assertTrue(isset($this->collection['test']));
		}


		public function testNotExists ()
		{
			$this->collection['test'] = 1;

			$this->assertFalse(isset($this->collection['nonexistent']));
		}


		public function testGetAllUnset ()
		{
			$this->collection['a'] = 1;
			$this->collection['b'] = 2;

			$items = & $this->collection->getAll();

			unset($items['b']);

			$this->assertEquals(
				$this->collection->toArray(),
				array('a' => 1)
			);
		}


		public function testGetAllOverwrite ()
		{
			$this->collection['a'] = 1;
			$this->collection['b'] = 2;

			$items = & $this->collection->getAll();

			$items['b'] = 1;

			$this->assertEquals(
				$this->collection->toArray(),
				array('a' => 1, 'b' => 1)
			);
		}


		public function testIterate ()
		{
			$this->collection['a'] = 1;
			$this->collection['b'] = 2;

			$items = array();

			foreach ($this->collection as $key => $value) {
				$items[$key] = $value;
			}

			$this->assertEquals(
				$this->collection->toArray(),
				$items
			);
		}
	}