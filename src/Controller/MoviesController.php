<?php


namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class MoviesController extends AppController {
	

	/*
	 * Index method
	 * @return \Cake\Http\Response|void
	 */
	public function index() {

		$this->paginate = [
			'contain' => ['Directors']
		];

		$movies = $this->paginate($this->Movies);


		$this->set(compact('movies'));
		$this->set('_serialize', ['movies']);
	}

	/*
	 * View method
	 * @param string|null $id Movie id.
	 * @return \Cake\Http\Reponse|void
	 * @throw \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function view($id = null) {

		$movie = $this->Movies->get($id, [
			'contain' => []
		]);

		$this->set('movie', $movie);
	}

	/*
	 * Add method
	 * @return \Cake\Http\Response|null Redirect on succesful add, renders view otherwise.
	 */
	public function add() {

		$movie = $this->Movies->newEntity();
		$this->set('directors', $this->Movies->Directors->find('list'));

		if ($this->request->is('post')) {
			$movie = $this->Movies->patchEntity($movie, $this->request->getData());
			if ($this->Movies->save($movie)) {
				$this->Flash->success(__('The movie has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Error: could not save movie. Please check your parameters.'));
		}
		$this->set(compact('movie'));

	}

	/*
	 * Delete method
	 * @param string|null $id Movie id
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {

		$this->request->allowMethod(['post', 'delete']);
		$movie = $this->Movies->get($id);
		if ($this->Movies->delete($movie)) {
			$this->Flash->success(__('Movie succesfully deleted'));
		} else {
			$this->Flash->error(__('Error: could not delete movie. Please try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	/*
	 * Edit method
	 * @param string|null $id Movie id
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {

		$movie = $this->Movies->get($id, [
			'contain' => []
		]);
		if ($this->request->id(['patch', 'post', 'put'])) {
			$movie = $this->Movies->patchEntity($movie, $this->request->getData());
			if ($this->Movies->save($movie)) {
				$this->Flash->succes(__('Movie succesfully edited.'));
			} else {
				$this->Flash->error(__('Error: could not edit movie. Please try again'));
			}

			return $this->redirect(['action' => 'index']);
		}
	}

	public function findDirectorName($movies) {

		foreach ($movies as $movie) {
			
		}

	}

}

