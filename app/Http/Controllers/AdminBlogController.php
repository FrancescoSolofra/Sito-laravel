<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData['title'] = "blog in Admin";
        $viewData["blog"] = Blog::all();
        return view('admin.blog.index')->with('viewData', $viewData);//Pagina prenente nella cartella view
    }

    public function store(Request $request){

        //Faccio la validazione dei campi
        Blog::validate($request);

        $newBlog = new Blog();//INSERT INTO Blogs
        $newBlog->setTitle($request->input('title'));
        $newBlog->setDescription($request->input('description'));
        //$newBlog->setPrice($request->input('price'));
        $newBlog->setImage("game.png"); //Vado a inserire l'immagine standard
        $newBlog->save(); //Salva i dati nella tabella del DB

        //Se ho selezionato una foto da inserire
        if($request->hasFile('image')){
            $imageName = "blog_".$newBlog->getId().".".$request->file('image')->extension();//metto blog_ affinche non prendi l'id delle immagini Product
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath()) //Copiare il file dalla sorgente al server
            );

            $newBlog->setImage($imageName);
            $newBlog->save();
        }

        return back(); //Ritorno alla pagina precedente

    }

    public function delete($id){

        //Cancello l'immagine del blog sul server
        $blog = blog::findOrFail($id);

            if(Storage::exists('public/'.$blog->getImage())){
                Storage::delete('public/'.$blog->getImage());
            }else{
                dd("il file img non esiste".$blog->getImage());
            }

            Blog::destroy($id);
            return back();
        }


    //Tutte le funzioni per fare Edit di un prodotto
    //Richiamare la pagina edit del prodotto
    public function edit($id){
        $viewData = [];
        $viewData['title'] = "Edit dell'articolo";
        $viewData['blog'] = Blog::findOrFail($id);
        return view('admin.blog.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id){

        //Faccio la validazione dei campi
        Blog::validate($request);

        $blog = Blog::findOrFail($id);
        $blog->setTitle($request->input('title'));
        $blog->setDescription($request->input('description'));
        //$blog->setPrice($request->input('price'));
        //Il campo immagine se non viene modificato non lo sotituisco

        //Se ho selezionato una foto da inserire
        if($request->hasFile('image')){
            $imageName = "blog_".$blog->getId().".".$request->file('image')->extension();//metto blog_ affinche non prendi l'id delle immagini Product
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath()) //Copiare il file dalla sorgente al server
            );

            $blog->setImage($imageName);
            $blog->save();
        }

        $blog->save();
        return redirect()->route('admin.blog.index');



    }
}
