<?php
namespace Propcom\BoxPacker;

/**
* A box that has been packed with items
*/
interface PackedBox
{
	/**
	 * Get box used
	 * @return Box
	 */
	public function getBox();

	/**
	 * Get items packed
	 * @return ItemList
	 */
	public function getItems();

	/**
	 * Get packed weight
	 * @return int weight in grams
	 */
	public function getWeight();

}
