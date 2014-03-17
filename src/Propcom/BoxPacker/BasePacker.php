<?php
namespace Propcom\BoxPacker;

/**
* A class that provides a base for packing functionality
*/
abstract class BasePacker implements Packer
{
	/**
	 * Adds an item to be packed
	 * @return $this
	 */
	abstract public function addItem(Item $item);

	/**
	 * Adds a box for items to be packed into
	 * @return $this
	 */
	abstract public function addBox(Box $box);

	/**
	 * Does the packing
	 * @return PackedBox[] An array of PackedBox objects
	 */
	abstract public function pack();

	/**
	 * Adds multiple items to be packed
	 * @param Item[]
	 * @return $this
	 */
	public function addItems(array $items)
	{
		foreach ($items as $item) {
			if ( ! ($item instanceof Item)) {
				throw new UnexpectedValueException("Item is not an instance of \Propcom\BoxPacker\Item");
			}

			$this->addItem($item);
		}

		return $this; // For chaining
	}

	/**
	 * Adds multiple boxes for items to be packed into
	 * @param Box[]
	 * @return $this
	 */
	public function addBoxes(array $boxes)
	{
		foreach ($boxes as $box) {
			if ( ! ($box instanceof Box)) {
				throw new UnexpectedValueException("Box is not an instance of \Propcom\BoxPacker\Box");
			}

			$this->addBox($item);
		}

		return $this; // For chaining
	}

}
