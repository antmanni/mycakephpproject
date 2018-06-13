<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use \Cake\Collection\Collection;

/*
 * Movie Entity 
 *
 * Created by: antmanni 
 * 
 * @property int $id
 * @property string $name
 * @property int $year
 * @property string $director
 * @property int $rating
 *
 */

class Movie extends Entity {


	protected $_accessible = [
		'name' => true,
		'year' => true,
		'director' => true,
		'rating' => true

	];




}
