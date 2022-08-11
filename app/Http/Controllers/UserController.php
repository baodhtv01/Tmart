<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    #region admin
    //admin user index
    public function indexAdmin()
    {
        //get all users role is admin in table many to many with role
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        return view('admin.user.admin.index', compact('users'));
    }
    #endregion

    #region user
    //user index
    public function indexUser()
    {
        //get all users role is user in table many to many with role
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        return view('admin.user.index', compact('users'));
    }
    //user create
    public function create()
    {
        return view('admin.user.add');
    }
    //user store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'username' => 'required|string|max:255|unique:users',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'phone' => $request->phone,
        ]);
        $user->roles()->attach($request->role);
        return redirect()->back()->with('success', 'Tạo tài khoản thành công');
    }
    //user lock
    public function lock($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('success', 'Khóa tài khoản thành công');
    }
    //user unlock
    public function unlock($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'Mở khóa tài khoản thành công');
    }
    //user info
    public function info($id)
    {
        $user = User::find($id);
        $locale = Location::where('id', $user->id)->first();
        return view('admin.user.info', compact('user'));
    }
    //user change avatar
    public function changeAvt(Request $request, $id)
    {
        if($request->avatar != null){
            $user = User::find($id);
            //upload avatar
            $nameFile = $this->_upload_file($request->avatar, 'users');
            $user->avatar = $nameFile;
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật ảnh đại diện thành công');
        }
        return redirect()->back();
    }
    //user change Info
    public function changeInfomation(Request $request, $id)
    {
        $user = User::find($id);
        if($request == null){
            return redirect()->back();
        }
        if($request->name != null){
            $user->name = $request->name;
        }
        if($request->email != null){
            $user->email = $request->email;
        }
        if($request->phone != null){
            $user->phone = $request->phone;
        }
        $user->save();
        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }
    //change password
    public function changePassword()
    {
        return view('admin.user.change');
    }
    public function changePasswordStore(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);
        //check old password
        if(!Hash::check($request->oldPass, auth()->user()->password)){
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
        }
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Cập nhật mật khẩu thành công');
    }
//    destroy
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->back()->with('success', 'Xóa tài khoản thành công');
    }
    #endregion

    #region myFunction
    //function upload image
    protected function _upload_file($file,$folder_name)
    {
        //get file name
        $name = $file->getClientOriginalName();
        //get file extension
        $extension = $file->getClientOriginalExtension();
        //check file extension
        if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
            return redirect()->back()->with('error', 'Only jpg, jpeg and png files are allowed');
        }
        //get file size
        $size = $file->getSize();
        //check file size less than 2MB redirect error
        if ($size > 2097152) {
            return redirect()->back()->with('error', 'File size must be less than 2MB');
        }
        //old name
        $oldName = $file->getClientOriginalName();
        //random name + times created
        $fileName = Str::random(10) . time() . '.' . $extension;
        //if not exist folder uploads
        if (!file_exists('uploads')) {
            mkdir('uploads');
        }
        //create folder by month and year
        $folder = $folder_name. '/' . date('m-Y');
        if (!file_exists('uploads/' . $folder)) {
            mkdir('uploads/' . $folder, 0777, true);
        }
        //move file to storage
        $file->move('uploads/' . $folder, $fileName);
        $path = 'uploads/' . $folder . '/' . $fileName;
        return $path;
    }
    //upload multiple image
    protected function _upload_multiple_file($files,$folder_name)
    {
        $file_name = [];
        foreach ($files as $file) {
            $file_name[] = $this->_upload_file($file,$folder_name);
        }
        return $file_name;
    }
    #endregion

}
