<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\EchangeOrder;

use App\Events\SendMail;

class EchangeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = EchangeOrder::orderby('created_at', 'desc')->get();
        return view('admin.requests.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf|max:10240',
            'etude_id' => 'required|exists:etude,id',
            'user_id' => 'required',
        ]);
        
        if ($validator->fails()){
            $script = "<script>
            setTimeout(function() {
                alert('Quelque chose c\'est mal passé. Merci d\'essayer plus tard.');
            }, 500);
            </script>";
            return redirect()->back()->with('fail', $script);
        }
        try{
            $pdf = $request->file('file');
            $name = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move('files/requests', $name);

            $result = EchangeOrder::create([
                'file' => 'files/requests/'.$name, 
                'user_id' => $request->user_id, 
                'etude_id' => $request->etude_id, 
                'status' => 'En attente'
            ]);

            $script = "<script>
                    setTimeout(function() {
                        alert('Demande envoyée avec succès, nous vous tiendrons informé par email.');
                    }, 500);
                </script>";
            return redirect()->back()->with('success', $script);
        }catch (\Exception $e) {
            $script = "<script>
            setTimeout(function() {
                alert('Quelque chose c\'est mal passé. Merci d\'essayer plus tard.');
            }, 500);
            </script>";
            return redirect()->back()->with('fail', $script);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $order = EchangeOrder::findOrFail($id);
            $order->update([
                'status' => $request->status
            ]);

            //send email to client of status
            $data = [];
            $data['sujet'] = $request->status == 'Rejeté' ? 'Demande d\'échange refusée - '.$order->etude->title : 'Demande d\'échange acceptée';
            $data['email'] = $order->user->email;
            $data['name'] = $order->user->fname .' '. $order->user->lname;
            $data['status'] = $order->status;
            $data['study'] = $order->etude->title;
            $data['price'] = $order->etude->prix;
            $data['studylink'] = $order->etude->file;
            $data['message'] = "Nous espérons que ce message vous trouvera bien. Nous souhaitons vous informer que, malheureusement, votre récente demande de commande d'échange a été rejetée. Nous comprenons que cette nouvelle puisse être décevante et nous tenons à vous assurer que nous avons soigneusement examiné votre demande.";
            event(new SendMail($data));

            return back();
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
