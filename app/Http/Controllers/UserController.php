<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $request;
    private $repository;
    
    public function __construct(Request $request, User $content)
    {
        
        $this->request = $request;
        $this->repository = $content;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // GET ALL DATA
        $contents = $this->repository->orderBy('name', 'ASC')->get();

        // RETURN VIEW WITH DATA
        return view('pages.users.index')->with([
            'contents' => $contents,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET ALL DATA
        return view('pages.users.create');
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
        $data['password'] = Hash::make($data['password']);

        // SEND DATA
        $insertTable = $this->repository->create($data);

        if($insertTable){
            isset($data['photo']) ? $data['photo']->move(public_path('storage/usuarios'), $insertTable->id . '.jpg') : null;
        }

        // REDIRECT AND MESSAGES
        return redirect()
                ->route('users.index')
                ->with('message', 'Usuário adicionado com sucesso.');

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
        return view('pages.users.edit')->with(['content' => $content]);
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

        // Formata Senha
        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        // STORING NEW DATA
        $update = $content->update($data);

        if($update){
            isset($data['photo']) ? $data['photo']->move(public_path('storage/usuarios'), $id . '.jpg') : null;
        }

        // REDIRECT AND MESSAGES
        return redirect()
            ->route('gifts.edit', $id)
            ->with('message', 'Usuário atualizado com sucesso.');

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
            ->route('users.index')
            ->with('message', 'Usuário <b>'. $content->name . '</b> '. $message .' com sucesso.');

    }
}
