<?php

function get_public_folder()
{
    //dd(URL::current());
  if(URL::current()=="http://127.0.0.1:8000")
    {
        return '';
    }else
    {
        return '/public';
    }  
}