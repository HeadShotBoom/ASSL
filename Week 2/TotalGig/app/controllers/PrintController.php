<?php
class PrintController extends BaseController
{
    public function printgig(Gig $gig){
        if(Auth::check()) {
            $pdf = PDF::loadView('contract', compact('gig'));
            return $pdf->download('Client_Contract.pdf');
        }
        return View::make('failure');
    }
}