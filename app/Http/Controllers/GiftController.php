<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GiftController extends Controller
{
    protected $request;
    private $repository;
    
    public function __construct(Request $request, Gift $content)
    {
        
        $this->request = $request;
        $this->repository = $content;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET ALL DATA
        return view('pages.gifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // GET FORM DATA
        $data = $request->all();
        
        // SEND DATA
        $insertTable = $this->repository->create($data);

        if($insertTable){
            isset($data['photo']) ? $data['photo']->move(public_path('storage/presentes'), $insertTable->id . '.jpg') : null;
        }

        // REDIRECT AND MESSAGES
        return redirect()
                ->route('dashboard')
                ->with('message', 'Presente adicionado com sucesso.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET ALL DATA
        $content = $this->repository->find($id);

        // VERIFY IF EXISTS
        if(!$content) return redirect()->back();

        // GENERATES DISPLAY WITH DATA
        return view('pages.gifts.edit')->with(['content' => $content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function take($id)
    {
        // GET ALL DATA
        $content = $this->repository->find($id);

        // VERIFY IF EXISTS
        if(!$content) return redirect()->back();

        // Salva
        $content->take_by = Auth::id();
        $content->take_at = now();
        $content->save();

        // Show de bolaaa
        return redirect()
            ->route('dashboard', $id)
            ->with('message', 'Perfeiito, você escolheu levar <span class="text-bolder text-primary">' . $content->name . '</span>🥰, nos vemos no chá!');
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
        // VERIFY IF EXISTS
        if(!$content = $this->repository->find($id))
        return redirect()->back();

        // GET FORM DATA
        $data = $request->all();
        
        // STORING NEW DATA
        $update = $content->update($data);

        if($update){
            isset($data['photo']) ? $data['photo']->move(public_path('storage/presentes'), $id . '.jpg') : null;
        }

        // REDIRECT AND MESSAGES
        return redirect()
            ->route('gifts.edit', $id)
            ->with('message', 'Presente atualizado com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // GET DATA
        $content = $this->repository->find($id);

        // STORING NEW DATA
        if($content->status == 1){
            $this->repository->where('id', $id)->update(['status' => 0]);
            $message = 'desabilitado';
        } else {
            $this->repository->where('id', $id)->update(['status' => 1]);
            $message = 'habilitado';
        }
        

        // REDIRECT AND MESSAGES
        return redirect()
            ->route('dashboard')
            ->with('message', 'Presente <b>'. $content->name . '</b> '. $message .' com sucesso.');

    }
}
