<?php
namespace Propcom\BoxPacker;

/**
* Provides packing functionality
*/
interface Packer
{
	/**
	 * Adds an item to be packed
	 * @return $this
	 */
	public function addItem(Item $item);

	/**
	 * Adds a box for items to be packed into
	 * @return $this
	 */
	public function addBox(Box $box);

	/**
	 * Does the packing
	 * @return PackedBox[] An array of PackedBox objects
	 */
	public function pack();

}
