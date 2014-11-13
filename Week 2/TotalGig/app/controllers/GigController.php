<?php

class GigController extends BaseController{

    public function index(){
        //Show a listing of gigs
        $gig = Gig::all();
        return View::make('index', compact('gig'));
    }

    public function create(){
        //Show the create gig form.
        if(Auth::check()){
            return View::make('create');
        }
        return View::make('failure');
    }

    public function handleCreate(){
        //Handle create form submission

        $data = Input::all();
        $rules = array(
            'gig_name' => 'min:2',
            'client_name' => 'min:2',
            'phone' => array('regex:/\d{3}([ .-])?\d{3}([ .-])?\d{4}|\(\d{3}\)([ ])?\d{3}([.-])?\d{4}|\(\d{3}\)([ ])?\d{3}([ ])?\d{4}|\(\d{3}\)([.-])?\d{3}([.-])?\d{4}|\d{3}([ ])?\d{3}([ .-])?\d{4}/'),
            'email' => 'email'
        );

        $validator = Validator::make($data, $rules);

        if($validator->passes()){
            $gig = new Gig;
            $gig->gig_name = Input::get('gig_name');
            $gig->client_name = Input::get('client_name');
            $gig->phone = Input::get('phone');
            $gig->email = Input::get('email');
            $gig->gig_date = Input::get('gig_date');
            $gig->employee1 = Input::get('employee1');
            $gig->employee2 = Input::get('employee2');
            $gig->employee3 = Input::get('employee3');
            $gig->save();

            if(Input::get('employee1') != null ){
                if(Input::get('employee1') == 1){
                    Mail::send('users.mails.gig', array('username'=>'Daniel', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                        $message->to('DanCarrollPhotos@outlook.com', 'Daniel Carroll')->subject('Youve Been Booked');
                    });
                }elseif(Input::get('employee1') == 2){
                    Mail::send('users.mails.gig', array('username'=>'Daniel2', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                        $message->to('HeadShotBoom@live.com', 'Daniel Carroll')->subject('Youve Been Booked');
                    });
                }elseif(Input::get('employee1') == 3){
                        Mail::send('users.mails.gig', array('username'=>'Daniel3', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                            $message->to('DCarroll@fullsail.edu', 'Daniel Carroll')->subject('Youve Been Booked');
                        });
                }else{

                }
            }

            if(Input::get('employee2') != null ){
                if(Input::get('employee2') == 1){
                    Mail::send('users.mails.gig', array('username'=>'Daniel', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                        $message->to('DanCarrollPhotos@outlook.com', 'Daniel Carroll')->subject('Youve Been Booked');
                    });
                }elseif(Input::get('employee2') == 2){
                    Mail::send('users.mails.gig', array('username'=>'Daniel2', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                        $message->to('HeadShotBoom@live.com', 'Daniel Carroll')->subject('Youve Been Booked');
                    });
                }elseif(Input::get('employee2') == 3){
                    Mail::send('users.mails.gig', array('username'=>'Daniel3', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                        $message->to('DCarroll@fullsail.edu', 'Daniel Carroll')->subject('Youve Been Booked');
                    });
                }else{

                }
            }

            if(Input::get('employee3') != null ){
                if(Input::get('employee3') == 1){
                    Mail::send('users.mails.gig', array('username'=>'Daniel', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                        $message->to('DanCarrollPhotos@outlook.com', 'Daniel Carroll')->subject('Youve Been Booked');
                    });
                }elseif(Input::get('employee3') == 2){
                    Mail::send('users.mails.gig', array('username'=>'Daniel2', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                        $message->to('HeadShotBoom@live.com', 'Daniel Carroll')->subject('Youve Been Booked');
                    });
                }elseif(Input::get('employee3') == 3){
                    Mail::send('users.mails.gig', array('username'=>'Daniel3', 'gig_name'=>Input::get('gig_name'), 'gig_date'=>Input::get('gig_date'), 'client_name'=>Input::get('client_name'), 'email'=>Input::get('email'), 'phone'=>Input::get('phone')), function($message){
                        $message->to('DCarroll@fullsail.edu', 'Daniel Carroll')->subject('Youve Been Booked');
                    });
                }else{

                }
            }

            return Redirect::to('/')->with('message', 'Gig Created Successfully.');
        }

        return Redirect::to('/create')->withErrors($validator);
    }

    public function edit(Gig $gig){
        //Show the edit gig form
        if(Auth::check()){
            return View::make('edit', compact('gig'));
        }
        return View::make('failure');
    }

    public function handleEdit(){
        //Handle edit form submission
        $gig = Gig::findOrFail(Input::get('id'));
        $data = Input::all();
        $rules = array(
            'gig_name' => 'min:2',
            'client_name' => 'min:2',
            'phone' => array('regex:/\d{3}([ .-])?\d{3}([ .-])?\d{4}|\(\d{3}\)([ ])?\d{3}([.-])?\d{4}|\(\d{3}\)([ ])?\d{3}([ ])?\d{4}|\(\d{3}\)([.-])?\d{3}([.-])?\d{4}|\d{3}([ ])?\d{3}([ .-])?\d{4}/'),
            'email' => 'email'
        );

        $validator = Validator::make($data, $rules);

        if($validator->passes()){
            $gig->gig_name = Input::get('gig_name');
            $gig->client_name = Input::get('client_name');
            $gig->phone = Input::get('phone');
            $gig->email = Input::get('email');
            $gig->gig_date = Input::get('gig_date');
            $gig->employee1 = Input::get('employee1');
            $gig->employee2 = Input::get('employee2');
            $gig->employee3 = Input::get('employee3');
            $gig->save();

            return Redirect::to('/')->with('message', 'Gig Edited.');
        }

        return Redirect::to('/edit/' . $gig->id)->withErrors($validator);
    }

    public function delete(Gig $gig){
        //Show delete confirmation page.
        if(Auth::check()){
            return View::make('delete', compact('gig'));
        }
        return View::make('failure');
    }

    public function handleDelete(){
        //Handle delete confirmation
        $id = Input::get('gig');
        $gig = Gig::findOrFail($id);
        $gig->delete();

        return Redirect::to('/')->with('message', 'Gig Deleted.');
    }


}