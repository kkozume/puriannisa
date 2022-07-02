<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterUser implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ketika logout kemudian berada di halaman login
        if(!session()->get('id')){
            return redirect()->to('/auth');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

//admin >> routing >> filter/middleware >> controller