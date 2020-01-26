<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index($page)
	{
            if(!is_file(APPPATH.'/Views/'.$page.'.php')){
                throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
            }
            echo view('header');
            echo view($page);
            echo view('footer');
	}
        public function gallery(){
            $gallery = new \App\Models\GalleryModel();
            $data['photos'] = $gallery->givePhotos();
            echo view('header');
            echo view('gallery', $data);
            echo view('footer');
        }
        public function email(){
            
            $json = $this->request->getJSON(true);
            $email = \Config\Services::email();
            $email->setFrom($json['email'], $json['name']);
            $email->setTo('adres@email.com');
            $email->setSubject('Auto-detail');
            $email->setMessage($json['text']);
            $email->send();
            $this->response->setStatusCode(200);
            
        }


}
