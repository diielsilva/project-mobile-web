<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showIndexPage()
    {
        if (isset($_COOKIE['user']) && !Session::exists('user')) {
            Session::put('user', $_COOKIE['user']);
            Session::put('state', $_COOKIE['state']);
            Session::put('telephone', $_COOKIE['telephone']);
            return redirect()->route('home_page');
        } else if (Session::exists('user')) {
            return redirect()->route('home_page');
        } else {
            return view('index');
        }
    }


    public function showSignUpPage()
    {
        if (isset($_COOKIE['user']) && !Session::exists('user')) {
            Session::put('user', $_COOKIE['user']);
            Session::put('state', $_COOKIE['state']);
            Session::put('telephone', $_COOKIE['telephone']);
            return redirect()->route('home_page');
        } else if (Session::exists('user')) {
            return redirect()->route('home_page');
        } else {
            return view('sign_up');
        }
    }


    public function showLoginPage()
    {
        if (isset($_COOKIE['user']) && !Session::exists('user')) {
            Session::put('user', $_COOKIE['user']);
            Session::put('state', $_COOKIE['state']);
            Session::put('telephone', $_COOKIE['telephone']);
            return redirect()->route('home_page');
        } else if (Session::exists('user')) {
            return redirect()->route('home_page');
        } else {
            return view('login');
        }
    }

    public function showHomePage()
    {
        if (Session::exists('user')) {
            $post = new Post();
            $res = $post->orderBy('id', 'desc')->get();
            return view('home', compact('res'));
        } else {
            return redirect()->route('index');
        }
    }

    public function loginUser(Request $request)
    {
        $user = new User();
        $result = $user->where('username', '=', $request->username)->where('password', '=', sha1($request->password))->get(['username', 'state', 'telephone']);

        if (sizeof($result) == 0) {
            $request->session()->flash('error', 'Usuário ou Senha Incorreto(a)!');
            return redirect()->route('login_page');
        } else {
            Session::put('user', $result[0]['username']);
            Session::put('telephone', $result[0]['telephone']);
            Session::put('state', $result[0]['state']);
            if ($request->remember != null) {
                setcookie('user', $request->username, time() + 604800, '/');
                setcookie('state', $result[0]['state'], time() + 604800, '/');
                setcookie('telephone', $result[0]['telephone'], time() + 604800, '/');
            }

            return redirect()->route('home_page');
        }
    }

    public function saveUserDatabase(Request $request)
    {

        try {
            $user = new User();
            $user->id = null;
            $user->username = $request->username;
            $user->password = sha1($request->password);
            $user->state = $request->state;
            $newTelephone = null;
            $orderTelephone = str_split($request->telephone);
            $newTelephone = '(' . $orderTelephone[0] . $orderTelephone[1] . ')' . ' ' . $orderTelephone[2] . $orderTelephone[3] . $orderTelephone[4] . $orderTelephone[5] . $orderTelephone[6] . '-' . $orderTelephone[7] . $orderTelephone[8] . $orderTelephone[9] . $orderTelephone[10];
            $user->telephone = $newTelephone;
            $result = $user->save();

            if ($result == true) {
                $request->session()->flash('success', 'Usuário Cadastrado com Sucesso!');
            } else {
                $request->session()->flash('error', 'Erro ao Cadastrar Usuário, Tente Novamente!');
            }
        } catch (Exception $ex) {
            $request->session()->flash('error', 'Usuário já Cadastrado!');
        }

        return redirect()->route('sign_up');
    }

    public function logoutUser()
    {

        if (Session::exists('user')) {
            Session::flush();
        }

        if (isset($_COOKIE['user'])) {
            setcookie('user', null, -1, '/');
            setcookie('state', null, -1, '/');
            setcookie('telephone', null, -1, '/');
        }

        return redirect()->route('index');
    }

    public function showStorePostPage()
    {
        if (Session::exists('user')) {
            return view('store_post');
        } else {
            return redirect()->route('index');
        }
    }

    public function storePostDatabase(Request $request)
    {
        try {
            if ($request->file('image') != null && $request->file('image')->isValid()) {
                $validExtensions = ["jpg", "jpeg", "png", "bmp"];
                $passTest = false;

                foreach ($validExtensions as $extension) {
                    if ($extension == $request->file('image')->extension()) {
                        $passTest = true;
                    }
                }

                if ($passTest == true) {
                    $nameImage = uniqid() . '.' . $request->file('image')->extension();
                    $confirmUpload = $request->file('image')->storeAs('images', $nameImage);

                    if ($confirmUpload == true) {
                        $post = new Post();
                        $post->title = $request->title;
                        $post->description = $request->description;
                        $post->photo = $nameImage;
                        $post->postedby = Session::get('user');
                        $post->datePost = date('Y:m:d');
                        $post->state = Session::get('state');
                        $result = $post->save();

                        if ($result == true) {
                            $request->session()->flash('success', 'Post cadastrado com sucesso!');
                            return redirect()->route('page_store');
                        } else {
                            $request->session()->flash('error', 'Erro ao cadastrar publicação, tente novamente!');
                            return redirect()->route('page_store');
                        }
                    } else {
                        $request->session()->flash('error', 'Erro ao fazer upload, tente novamente!');
                        return redirect()->route('page_store');
                    }
                } else {
                    $request->session()->flash('error', 'Arquivo inválido, só permitimos arquivos JPG, JPEG, PNG e BMP!');
                    return redirect()->route('page_store');
                }
            }
        } catch (Exception $ex) {
            $request->session()->flash('error', 'Erro ao cadastrar publicação, verifique o limite de caracteres (400)');
            return redirect()->route('page_sotre');
        }
    }

    public function showMyPosts(Request $request)
    {
        if (Session::exists('user')) {
            $post = new Post();
            $res = $post->where('postedby', '=', Session::get('user'))->orderBy('id', 'desc')->get();


            if (sizeof($res) > 0) {
                return view('show_MyPosts', compact('res'));
            } else {

                return view('show_MyPosts', compact('res'));
            }
        } else {
            return redirect()->route('index');
        }
    }

    public function deleteMyPost(Request $request, $id, $file)
    {
        if (Session::exists('user')) {
            $post = new Post();

            if ($file != null) {
                $filePath = public_path('storage\images\\' . $file);
                unlink($filePath);
            }

            $result = $post->where('id', '=', $id)->delete();

            if ($result == 1) {
                $request->session()->flash('success', 'Publicação excluída com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro ao excluir publicação!');
            }

            return redirect()->route('show_myPosts');
        } else {
            return redirect()->route('index');
        }
    }

    public function showEditPage($id)
    {
        if (Session::exists('user')) {
            return view('page_edit', compact('id'));
        } else {
            return redirect()->route('index');
        }
    }

    public function orderByState(Request $request)
    {
        if (Session::exists('user')) {
            $post = new Post();
            $res = $post->where('state', '=', $request->state)->orderby('id', 'desc')->get();

            return view('home_ordered', compact('res'));
        } else {
            return redirect()->route('index');
        }
    }

    public function updatePostDatabase(Request $request, $id)
    {
        if (Session::exists('user')) {
            $post = new Post();
            $editPost = $post->find($id);
            $editPost->title = $request->title;
            $editPost->description = $request->description;
            $result = $editPost->save();

            if ($result == true) {
                $request->session()->flash('success', 'Post editado com sucesso!');
                return redirect()->route('show_myPosts');
            } else {
                $request->session()->flash('error', 'Erro ao editar post, tente novamente!');
                return redirect()->route('show_myPosts');
            }
        } else {
            return redirect()->route('index');
        }
    }

    public function detailsPost($id)
    {
        if (Session::exists('user')) {
            $post = new Post();
            $res = $post->where('posts.id', '=', $id)->join('users', 'posts.postedby', '=', 'users.username')->get(['posts.id', 'posts.title', 'posts.description', 'posts.photo', 'posts.postedby', 'posts.datePost', 'posts.state', 'users.telephone']);
            return view('details_post', compact('res'));
        } else {
            return redirect()->route('index');
        }
    }

    public function detailsUser()
    {
        if (Session::exists('user')) {
            $user = new User();
            $res = $user->where('username', '=', Session::get('user'))->get(['id', 'username', 'state', 'telephone']);
            return view('details_user', compact('res'));
        } else {
            return redirect()->route('index');
        }
    }

    public function showEditUserPage()
    {
        if (Session::exists('user')) {
            return view('edit_user');
        } else {
            return redirect()->route('index');
        }
    }

    public function updateUser(Request $request)
    {
        if (Session::exists('user')) {
            $user = new User();
            $idUser = $user->where('username', '=', Session::get('user'))->get();
            $editUser = $user->find($idUser[0]['id']);
            $newTelephone = null;
            $orderTelephone = str_split($request->telephone);
            $newTelephone = '(' . $orderTelephone[0] . $orderTelephone[1] . ')' . ' ' . $orderTelephone[2] . $orderTelephone[3] . $orderTelephone[4] . $orderTelephone[5] . $orderTelephone[6] . '-' . $orderTelephone[7] . $orderTelephone[8] . $orderTelephone[9] . $orderTelephone[10];
            $editUser->telephone = $newTelephone;
            $res = $editUser->save();

            if ($res == true) {
                $request->session()->flash('success', 'Usuário alterado com sucesso!');
                return redirect()->route('edit_page');
            } else {
                $request->session()->flash('error', 'Erro ao alterar usuário, tente novamente!');
                return redirect()->route('edit_page');
            }
        } else {
            return redirect()->route('index');
        }
    }
}
