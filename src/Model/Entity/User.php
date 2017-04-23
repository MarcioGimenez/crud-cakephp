<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Inflector;

class User extends Entity
{
	protected $_accessible = [
		'*' => true,
		'id' => false
		];
	public function _setPassword($password)
	{
		$hasher = new DefaultPasswordHasher;
		return $hasher->hash($password);
	}
	protected function _setName($name)
	{
		if(!$this->properties['url']){
			$this->set('url',Inflector::slug($name));
		}
		return $name;
	}	
}