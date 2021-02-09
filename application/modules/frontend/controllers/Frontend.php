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

class Frontend extends Frontend_Controller
{
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
        $this->render_page('welcome/frontend',$this->data);
    }


    public function get_frontend()
    {
        $frontend_value = $this->input->get('frontend_value');
        $response = array();

        if(!empty($frontend_value) && $frontend_value=='yes')
        {
            $response['status'] = 'success';
            $response['message'] = 'frontend operation successful';
            $response['view'] = '<p>Frontend section</p>';
            
        }else{
            $response['status'] = 'error';
            $response['message'] = 'frontend operation failed.';
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        // return $this->output
                    // ->set_content_type('application/json')
                    // ->set_output(json_encode($response));


    }
}
