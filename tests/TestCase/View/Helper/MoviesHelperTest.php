<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\MoviesHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\MoviesHelper Test Case
 */
class MoviesHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\MoviesHelper
     */
    public $Movies;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Movies = new MoviesHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Movies);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
