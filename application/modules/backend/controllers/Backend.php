<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * CodeIgniter-HMVC
 *
 * @package    CodeIgniter-HMVC
 * @author     N3Cr0N (N3Cr0N@list.ru)
 * @copyright  2019 N3Cr0N
 * @license    https://opensource.org/licenses/MIT  MIT License
 * @link       <URI> (description)
 * @version    GIT: $Id$
 * @since      Version 0.0.1
 * @filesource
 *
 */

class Backend extends Backend_Controller
{
    //
    public $CI;

    /**
     * An array of variables to be passed through to the
     * view, layout,....
     */
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
    public function index()
    {
        // Example
        $this->render_page('welcome/dashboard',$this->data);
    }

    public function post_backend()
    {
        $backend_value = $this->input->post('backend_value');

        $response = array();

        if(!empty($backend_value) && $backend_value=='yes')
        {
            $response['status'] = 'success';
            $response['message'] = 'backend operation successful';
            $response['view'] = '<p>Backend section</p>';
        }else{
            $response['status'] = 'error';
            $response['message'] = 'backend operation failed.';
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        // return $this->output
                    // ->set_content_type('application/json')
                    // ->set_output(json_encode($response));


    }
}
