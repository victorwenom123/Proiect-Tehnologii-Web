<?php

class Recommendations extends Controller
{
    public function index()
    {
        
        $this->view('recommendations/recomandations',[]);
    }

    public function result()
    {
        
        $this->view('recommendations/recomandationsresults',[]);
    }

}