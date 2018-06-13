<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Directors Model
 *
 * @method \App\Model\Entity\Director get($primaryKey, $options = [])
 * @method \App\Model\Entity\Director newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Director[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Director|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Director|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Director patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Director[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Director findOrCreate($search, callable $callback = null, $options = [])
 */
class DirectorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('directors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');


        $this->belongsTo('Movies', [
            'classname' => 'Movies',
            'foreignKey' => 'director_name'
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('birthdate')
            ->requirePresence('birthdate', 'create')
            ->notEmpty('birthdate');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
