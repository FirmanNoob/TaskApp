<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InfoController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.kawalcorona.com/indonesia');
        
    }
    public function info(){
        $response = Http::withToken('IGQVJXaFpjWFdYVk5nN2NCa2xjaUF3RWVOb0FyTFNMRDhBRXZAkZAUNxYllhN1JOT1NMMlNnbWhCeG1tblE4Qm9KcUNKLV9veGY2VnpCb25YMldMdHo3WW1tNVo4TndYYURBWFRwT3NCMXk5eHROUDU5OQZDZD')->post('https://graph.instagram.com/17841405793187218?fields=id,username');
    }
}
