<?php


namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class MoviesController extends AppController {
	

	/*
	 * Index method
	 * @return \Cake\Htttp\Response|void
	 */
	public function index() {

		$movies = $this->paginate($this->Movies);

		$query = $this->Movies->find('all')->contain(['Directors']);
		debug($query);die;

		$this->set(compact('movies'));
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

}

