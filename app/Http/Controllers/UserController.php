<?php

namespace App\Http\Controllers;


use App\Models\PlanTutor;
// use App\Models\PlanTutor\PlanTutor as PlanTutorPlanTutor;
use App\Models\Token;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    // Se crea una sesión de pagos
    function checkout(Request $request) {
        $stripe = new \Stripe\StripeClient(
        'sk_test_51JQ3trHvwd3WEbLborDFPGDu50hbBpk5v285lFxq77hjo0YyIGMPUAIyIpPiAxTOMg12iyKTv4nW8FEvqQyMoiRO00Li6NKpB2'
        );
        // dd($request);
        $check = $stripe->checkout->sessions->create([
            'success_url' => 'http://127.0.0.1:8000/success?id='.$request->plan,
            'cancel_url' => 'http://127.0.0.1:8000/plan',
            'line_items' => [
            [
                'price' => $request->precio,
                'quantity' => 1,
            ],
            ],
            'mode' => 'subscription',

            'customer' => auth()->user()->stripe_id,
        ]);
        // dd($check->url);
        // return redirect($check->url);
        //Plan y precio --> "$request->plan" ; customer en la tabla user --> "stripe_id"
        //Enviar el metodo update a una funcion de verificacion en success
        return redirect($check->url);
      }
    //   Permite mostrar los planes que se tienen registrados en la cuenta de stripe
      function plan(){
        $stripe = new \Stripe\StripeClient(
            'sk_test_51JQ3trHvwd3WEbLborDFPGDu50hbBpk5v285lFxq77hjo0YyIGMPUAIyIpPiAxTOMg12iyKTv4nW8FEvqQyMoiRO00Li6NKpB2'
          );
          $plan = $stripe->customers->retrieve(
              'cus_OFb3knq9mlhCha',
              []
            );

            if($plan->metadata->plan!=null){
                return view('pruebas/plan',['plan' => $plan->metadata->plan]);
            }
            $plans = $stripe->products->all(['limit' => 3]);
            // dd($plans);
        return view('pruebas/plans',['plans' => $plans]);
      }

      function success(Request $request){
        $stripe = new \Stripe\StripeClient(
            'sk_test_51JQ3trHvwd3WEbLborDFPGDu50hbBpk5v285lFxq77hjo0YyIGMPUAIyIpPiAxTOMg12iyKTv4nW8FEvqQyMoiRO00Li6NKpB2'
          );
        $stripe->customers->update(
            auth()->user()->stripe_id,
            ['metadata' => ['plan' => $request->id]]
        );
        switch ($request->id) {
            case "Plan Free": $precio = 0; $time="+ 1 month"; $plan = 1; break;
            case "Plan Standard": $precio = 50; $time="+ 6 month"; $plan = 2; break;
            case "Plan Premium": $precio = 80; $time="+ 12 month"; $plan = 3; break;
        }
        $fecha = date('Y-m-d');
        $planTutor = new PlanTutor();
        $planTutor->plan_id = $plan;
        $planTutor->tutor_id = auth()->user()->id;
        $planTutor->activo = 1;
        $planTutor->fecha_inicio = $fecha;
        $planTutor->fecha_fin = date("Y-m-d",strtotime($fecha.$time));
        $planTutor->save();
        return redirect()->to('/plan');
      }
}
