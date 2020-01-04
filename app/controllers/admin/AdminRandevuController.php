<?php

class AdminRandevuController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Sentry::getUser()->hasAnyAccess(['system', 'randevu.index'])) {
            $list = Randevu::all();
            return View::make('admin.randevu.index', array('list' => $list));
        } else {
            return Redirect::to('/admin')->withErrors(array(Lang::get('user.noaccess')));
        }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        if (Sentry::getUser()->hasAnyAccess(['system', 'randevu.index'])) {
            $list = Randevu::find($id);
            $settings   =   Settings::find(1);
            $settings   =   json_decode($settings->data);
            return View::make('admin.randevu.show', array('list' => $list,'settings'=>$settings));
        } else {
            return Redirect::to('/admin')->withErrors(array(Lang::get('user.noaccess')));
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function randevuInsert()
    {
        try {
            $Input = Input::except('_token', '_method');
            //return $Input;
            //echo $Input['start_date']."<br/>";
            //print_r(Input::all());exit;
            $start_date = $Input['start_date'].' '.$Input['start_time'];
            $end_date   = $Input['end_date'].' '.$Input['end_time'];
            $startDate  = new DateTime($start_date);
            $endDate    = new DateTime($end_date);

            $randevu = new Randevu();
            $randevu->user_id                   = Sentry::getUser()->id;
            $randevu->staff                     = $Input['staff'];
            $randevu->branch                    = $Input['branch'];
            $randevu->name_surname              = $Input['name_firstname'];
            $randevu->phone                     = $Input['phone'];
            $randevu->number_people             = $Input['number_of_people'];
            $randevu->action_to_be_taken        = $Input['process'];
            $randevu->start_date                = $startDate->format('Y-m-d H:i:s');
            $randevu->end_date                  = $endDate->format('Y-m-d H:i:s');
            $randevu->color                     = $Input['color'];
            $randevu->number_of_appointments    = str_random(10);
            if($randevu->save())
            {
                return Response::json(array('success' => true,'ids'=>$randevu->id), 200);
                //return json_encode('status'=>'true','ids'=>$randevu->lastInsertId);
            }
        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function randevuList()
    {
        $data = array();
        //$data[] = array('title'=>'Vivamus non','start'=>'2015-11-04 03:00','end'=>'2015-11-06 04:00','className'=>'red');
        $list   =   Randevu::all();
        foreach ($list as $randevu) {
            $data[] = array('ids'=>$randevu->id,'title'=>$randevu->name_surname,'start'=>$randevu->start_date,'end'=>$randevu->end_date,'className'=>$randevu->color);
        }
        echo json_encode($data);
    }

    public function randevuDelete()
    {
        //return Input::get('ids');exit;
        $id =   Input::get('ids');
        //echo $id;exit;
        if (Request::isMethod('post')) {
            $randevu = Randevu::find($id);
            //echo "<pre>";
            //print_r($randevu);exit;
            if ($randevu->delete()) {
                return Response::json(array('success' => true), 200);
            }
        }
    }

    public function randevuDateUpdate()
    {
        //echo Input::get('start_date')."<br>";
        $startDate  = new DateTime(Input::get('start_date'));
        $endDate    = new DateTime(Input::get('end_date'));

        try {
            $Input = Input::except('_token', '_method');
            //return $Input;
            //echo $Input['start_date']."<br/>";
            $startDate  = new DateTime($Input['start_date']);
            $endDate    = new DateTime($Input['end_date']);

            $randevu = Randevu::find(Input::get('ids'));
            $randevu->start_date    = $startDate->format('Y-m-d H:i:s');
            $randevu->end_date      = $endDate->format('Y-m-d H:i:s');
            if($randevu->save())
            {
                return Response::json(array('success' => true), 200);
                //return json_encode('status'=>'true','ids'=>$randevu->lastInsertId);
            }
        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function randevuDetails()
    {
        if (Request::isMethod('post')) {
            try
            {
                //return Input::get('ids');exit;
                $randevu    =   Randevu::find(Input::get('ids'));
                if($randevu->count()>0)
                {
                    //echo "<pre>";
                    //print_r($randevu);
                    return Response::json(array(
                        'success'           =>  true,
                        'name_surname'      =>  $randevu->name_surname,
                        'phone'             =>  $randevu->phone,
                        'number_people'     =>  $randevu->number_people,
                        'action_to_be_taken'=>  $randevu->action_to_be_taken,
                        'transaction'       =>  $randevu->transaction,
                        'branch'            =>  $randevu->branch,
                        'staff'             =>  $randevu->staff,
                        'completion'        =>  $randevu->completion,
                        'amount'            =>  $randevu->amount,
                        'discount'          =>  $randevu->discount,
                        'total'             =>  $randevu->total
                    ), 200);
                }
            } catch (Exception $e)
            {
                return $e->getMessage();
            }
        }
    }

    public function randevuUpdate()
    {
        try {
            $Input = Input::except('_token', '_method');
            //return $Input;
            //echo $Input['start_date']."<br/>";
            //print_r(Input::all());exit;

            $randevu = Randevu::find($Input['ids']);
            $randevu->user_id                   = Sentry::getUser()->id;
            $randevu->staff                     = $Input['staff'];
            $randevu->branch                    = $Input['branch'];
            $randevu->name_surname              = $Input['name_firstname'];
            $randevu->phone                     = $Input['phone'];
            $randevu->number_people             = $Input['number_of_people'];
            $randevu->action_to_be_taken        = $Input['process'];
            $randevu->transaction               = $Input['transaction'];
            $randevu->amount                    = $Input['amount'];
            $randevu->discount                  = $Input['discount'];
            $randevu->total                     = $Input['total'];
            $randevu->completion                = true;

            if($randevu->save())
            {
                return Response::json(array('success' => true,'ids'=>$randevu->id), 200);
                //return json_encode('status'=>'true','ids'=>$randevu->lastInsertId);
            }
        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

}
