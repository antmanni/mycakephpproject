<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/*
 * Movies model 
 *
 * Created by: antmanni
 *
 * @property |\Cake\ORM\Assocation\BelongsTo $Directors
 * 
 * @method \App\Model\Entity\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Post newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Post[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post findOrCreate($search, callable $callback = null, $options = [])
 */

class MoviesTables extends Table {


	/*
	 * Initialize method
	 *
	 * @param array $config The configuration fot the table.
	 * @return void
	 */

	public function initialize(array $config) {

		parent::initialize($config);

		$this->setTable('movies');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');

		$this->addBehavior('timestamp');

		//$this->hadOne('Directors');
		
		$this->belongsTo('Directors', [
            'classname' => 'movies',
            'foreignKey' => 'director'
        ]);
        
	}

	/*
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
 	
	public function validationDefault(Validator $validator) {

		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->scalar('name')
			->maxLength('name', 255)
			->requirePresence('name', 'create')
			->notEmpty('name');

		$validator
			->integer('year')
			->maxLength('year', 4)
			->requirePresence('year', 'create')
			->notEmpty('year');

		$validator 
			->integer('rating')
			->requirePresence('rating', 'create')
			->notEmpty('rating');


		return $validator;
	}


	/*
	 * Return a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */

	public function buildRuler(RulesChecker $rules) {

		$rules->add($rules->ecistsIn(['director'], 'Directors'));

		return $rules;
	}


}