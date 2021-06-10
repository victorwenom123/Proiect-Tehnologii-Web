<?php

class Compare extends Controller
{
    public function index()
    {
        
        $this->view('compare/compare',[]);
    }

    public function result()
    {
        
        $this->view('compare/results',[]);
    }
   

}