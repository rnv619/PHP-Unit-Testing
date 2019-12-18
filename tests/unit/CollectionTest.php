<?php

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /**
     * @test
     */
    public function empty_initiated_colletion_returned_no_items()
    {
        $collection = new \App\Support\Collection;

        $this->assertEmpty($collection->get());
    }

    /**
     * @test
     */
    public function count_is_correct_for_items_pass()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /**
     * @test
     */
    public function match_count_of_items()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three', 'four'
        ]);

        $this->assertCount(4, $collection->get());
    }

    /**
     * @test
     */
    public function collection_is_instance_of_interator_aggregate()
    {
        $collection = new \App\Support\Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /**
     * @test
     */
    public function collection_can_be_iterated()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $items = [];

        foreach($collection as $item)
        {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
    }
}