<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use App\Models\Subscription;
use App\Models\File;
use App\Models\Review;
use App\Models\Note;
use App\Models\Favourite;

class ProfileController extends BaseController{
    
    public function profile(){

    if(!Session::has('account_id')){
        return redirect('login');
    }

        $account = Account::find(Session::get('account_id'));
        $username = $account->username;
        $subscription = Subscription::where('account_id', Session::get('account_id'))->first();
        $plan = $subscription->sub_name;
        $reviews = Review::where('account_id', Session::get('account_id'))->get();
        $hasReview = $reviews->isEmpty();
        $notes = Note::where('account_id', Session::get('account_id'))->get();
        $favs = Favourite::where('account_id', Session::get('account_id'))->get();
            
        return view('profile')
            ->with('account', $account)
            ->with("username", $username)
            ->with("plan", $plan)
            ->with('review', $hasReview)
            ->with('notes', $notes)
            ->with('favs', $favs);  
    }

    public function uploadFile(Request $request)
    {
        $response = [];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $fileContent = file_get_contents($file->getRealPath());
            $userId = Session::get('account_id');

            try {
                File::create([
                    'file_name' => $fileName,
                    'file_size' => $fileSize,
                    'content' => $fileContent,
                    'account_id' => $userId,
                ]);

                $response['message'] = "Caricamento completato";
            } catch (\Exception $e) {
                $response['error'] = "Errore durante l'inserimento nel Database: " . $e->getMessage();
            }
        } else {
            $response['error'] = "Nessun file caricato.";
        }

        return response()->json($response);
    }
    public function library()
    {
        $user = Session::get('account_id');

        $files = File::where('account_id', $user)
                     ->orderBy('file_name')
                     ->limit(8)
                     ->get(['id', 'file_name']);

        return response()->json($files);
    }
    public function searchFiles(Request $request)
    {
        $query = $request->input('q', '');

        $files = File::join('accounts', 'files.account_id', '=', 'accounts.id')
                    ->where('file_name', 'LIKE','%'. $query . '%')
                    ->select('files.id', 'file_name')
                    ->limit(8)
                    ->get();

        return response()->json($files);
    }
    public function openFile($id)
    {
        $file = File::find($id);

        if (!$file) {
            return response("File not found.", 404);
        }

        $fileName = $file->file_name;
        $fileContent = $file->content;

        return response($fileContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $fileName . '"')
            ->header('Content-Length', strlen($fileContent));
    }
    public function deleteFile($id)
    {
        $file = File::find($id);

        if (!$file) {
            return response("File not found.", 404);
        }
        
        $file->delete();

        return response()->json([
            'success' => true,
            'message' => 'File deleted successfully.'
        ]);
    }
    public function storeReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'review_text' => 'required|string',
            'review_rating' => 'required|integer|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $review = new Review;
        $review->account_id = Session::get("account_id");
        $review->description = $request->input('review_text');
        $review->rating = $request->input('review_rating');
        $review->save();

        return redirect('/profile');
    }
    public function uploadNote(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'note_content' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $note = new Note;
        $note->titolo = $request->title;
        $note->account_id = Session::get('account_id');
        $note->contenuto = $request->note_content;
        $note->save();

        return redirect('/profile');

    }
    public function deleteNote($id){

        $note = Note::find($id);

        if (!$note) {
            return response("Note not found.", 404);
        }
        
        $note->delete();

        return redirect('/profile');
    }
    public function isFavourite($id) {
        $fav = Favourite::where('file_id', $id)->first();
    
        if ($fav) {
            return json_encode(['favourite' => true]);
        } else {
            return json_encode(['favourite' => false]);
        }
    }
    public function addToFavourite($id){
        $file = File::find($id);

        $ffile = new Favourite;
        $ffile->file_id = $file->id;
        $ffile->file_name = $file->file_name;
        $ffile->file_size = $file->file_size;
        $ffile->content = $file->content;
        $ffile->account_id = $file->account_id;
        $ffile->save();

        return response()->json(['message' => 'File aggiunto ai preferiti con successo']);
    }
    
    public function logout(){
        Session::forget('account_id');
        Session::flush();
        return redirect('home');
    }
}