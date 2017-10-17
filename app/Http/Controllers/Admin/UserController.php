<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserPermistion;
use Auth;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class UserController extends Controller
{
    public function getUserControl()
    {
        return view('admin.modules.user.control');
    }

    public function getUserAdd()
    {
        $group = DB::table('sk_user_groups')->select('*')->get()->toArray();
        return view('admin.modules.user.add', ['group' => $group]);
    }

    public function postUserAdd(UserAddRequest $request)
    {
        $user = new User;
        $user->username = $request->txtusername;
        $user->fullname = $request->txtFullname;
        $user->email = $request->txtEmail;
        $user->phone = $request->txtPhone;
        $user->password = bcrypt($request->txtPass);
        $user->group_id = $request->selGroup;
        $user->created_at = new DateTime();
        $user->save();
        return redirect()->route('getUserList')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Thêm  thành viên thành công']);
    }

    public function getUserList()
    {
        $data = DB::table('sk_users')->join('sk_user_groups', 'sk_users.group_id', '=', 'sk_user_groups.id')->select('sk_users.*', 'sk_user_groups.name as usergroup_name')->get();
        return view('admin.modules.user.list', ['data' => $data]);
    }

    public function getUserDel($id)
    {
        $user_curent_login = Auth::user()->id;
        $user_delete = User::find($id);
        if ($id == 1 || ($user_curent_login != 1 && $user_delete['group_id'] == 1)) {
            return redirect()->route('getUserList')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Không đủ quyền xóa người này!']);
        } else {
            $user_delete->delete($id);
            return redirect()->route('getUserList')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Xóa thành công!']);
        }
    }

    public function getUserEdit($id)
    {
        $data = DB::table('sk_users')->select('*')->where('sk_users.id', $id)->first();
        $group = DB::table('sk_user_groups')->select('*')->get()->toArray();
        if ((Auth::user()->id != 1) && ($id == 1 || ($data->group_id == 1 && Auth::user()->id != $id))) {
            return redirect()->route('getUserList')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Không đủ quyền sửa người này!']);
        }

        return view('admin.modules.user.edit', ['data' => $data, 'group' => $group]);
    }

    public function postUserEdit(Request $request, $id)
    {
        // DÙNG TRỰC TIẾP REQUEST KHÔNG TẠO FILE REQUEST
        $user = User::find($id);
        if ($request->txtPass) {
            $this->validate($request, [
                'txtRePass' => 'same:txtPass',
                'txtEmail' => 'email'
            ],
                [
                    'txtRePass.same' => 'Nhập lại mật khẩu không đúng!',
                    'txtEmail.email' => 'Không đúng định dạng email'
                ]);
            $user->password = bcrypt($request->txtPass);
        }
        $user->group_id = $request->selGroup;
        $user->updated_at = new DateTime();
        $user->email = $request->txtEmail;
        $user->fullname = $request->txtFullname;
        $user->save();
        return redirect()->route('getUserList')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Cập nhập  thành viên thành công']);

    }

    /*
     *
     * ===============================
     *           USER GROUPS
     * ===============================
     *
     */
    public function getUserGroup()
    {

        $data = UserGroup::select('*')->get()->toArray();
        return view('admin.modules.user.group.group', ['data' => $data]);
    }

    public function getGroupAdd()
    {
              
        $per = UserPermistion::select('*')->get()->toArray();
        return view('admin.modules.user.group.add', ['per' => $per]);
    }

    public function postGroupAdd(Request $request)
    {
         $usergroup = new UserGroup;
         $usergroup->name = $request->txtname;
        if ($request->txtname) {
            $this->validate($request, [
                'listper' => 'required'
            ],
            [
                'listper.required' => 'Vui lòng chọn permistion!'                  
            ]);
          $usergroup->permistion_list = json_encode($request->listper);  
        }
        $usergroup->created_at = new DateTime();
        $usergroup->save();
         return redirect()->route('getUserGroup')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Create User Group Sussess']);

    }

    public function getGroupEdit($id)
    {
        $data = UserGroup::select('*')->where('sk_user_groups.id', $id)->first();
        $per = UserPermistion::select('*')->get()->toArray();
        if ((Auth::user()->id != 1 && $id == 1)) {
            return redirect()->route('getUserGroup')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Không đủ quyền sửa group này!']);
        }        
        return view('admin.modules.user.group.edit', ['data' => $data,'per' => $per]);
    }
    public function postGroupEdit(Request $request,$id)
    {
        $usergroup =  UserGroup::find($id);
         $usergroup->name = $request->txtname;
        if ($request->txtname) {
            $this->validate($request, [
                'listper' => 'required'
            ],
            [
                'listper.required' => 'Vui lòng chọn permistion!'                  
            ]);
          $usergroup->permistion_list = json_encode($request->listper);  
        }
        $usergroup->updated_at = new DateTime();
        $usergroup->save();
        return redirect()->route('getUserGroup')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Cập nhập  UserGroup thành công']);
    }

    public function getGroupDel($id)
    {
        $user_curent_login = Auth::user()->id;
        $user = User::select('id')->where('group_id', $id)->get()->toArray();    
        $group_delete = UserGroup::find($id);    
        if ($id == 1 || $user_curent_login != 1 || !empty($user)) {
            return redirect()->route('getUserGroup')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Bạn không phải SAdmin or Vẫn còn thành viên trong group!']);
        } else {
            $group_delete->delete($id);
            return redirect()->route('getUserGroup')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Xóa thành công!']);
        }
    }

    /*
     *
     * ===============================
     *           USER PERMISTION
     * ===============================
     *
     */
    public function getUserPer()
    {
        $user_curent_login = Auth::user()->id;
        if ($user_curent_login != 1) {
            return redirect()->route('getUserControl')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Bạn không có quyền truy cập module này!']);
        }
        $data = UserPermistion::select('*')->get()->toArray();
        return view('admin.modules.user.roles.roles', ['data' => $data]);
    }

    public function getPerAdd()
    {
        $user_curent_login = Auth::user()->id;
        if ($user_curent_login != 1) {
            return redirect()->route('getUserControl')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Bạn không có quyền truy cập module này!']);
        }
        $group = UserPermistion::select('*')->where('parent_id', 0)->get()->toArray();
        return view('admin.modules.user.roles.add', ['group' => $group]);
    }

    public function postPerAdd(Request $request)
    {
        $user_curent_login = Auth::user()->id;
        if ($user_curent_login != 1) {
            return redirect()->route('getUserControl')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Bạn không có quyền truy cập module này!']);
        }
        $UserPermistion = new UserPermistion;
        $UserPermistion->name = $request->txtname;
        $UserPermistion->routes = $request->txtroute;
        if ($request->selGroup) {
            $UserPermistion->parent_id = $request->selGroup;
        } else {
            $UserPermistion->parent_id = 0;
        }
        $UserPermistion->save();
        return redirect()->route('getUserPer')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Thêm  Permistion thành công']);
    }

    public function getPerEdit($id)
    {
        $user_curent_login = Auth::user()->id;
        if ($user_curent_login != 1) {
            return redirect()->route('getUserControl')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Bạn không có quyền truy cập module này!']);
        }
        $data = UserPermistion::select('*')->where('id', $id)->get()->first()->toArray();
        $group = UserPermistion::select('*')->where('parent_id', 0)->get()->toArray();
        return view('admin.modules.user.roles.edit', ['group' => $group, 'data' => $data]);
    }

    public function postPerEdit(Request $request, $id)
    {
        $user_curent_login = Auth::user()->id;
        if ($user_curent_login != 1) {
            return redirect()->route('getUserControl')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Bạn không có quyền truy cập module này!']);
        }
        $UserPermistion = UserPermistion::find($id);

        $UserPermistion->name = $request->txtname;
        $UserPermistion->updated_at = new DateTime();
        $UserPermistion->routes = $request->route;
        if ($request->selGroup) {
            $UserPermistion->parent_id = $request->selGroup;
        } else {
            $UserPermistion->parent_id = 0;
        }
        $UserPermistion->save();
        return redirect()->route('getUserPer')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Cập nhập  Permistion thành công']);
    }

    public function getPerDel($id)
    {
        $user_curent_login = Auth::user()->id;
        if ($user_curent_login != 1) {
            return redirect()->route('getUserControl')->with(['flash_level' => 'alert-danger', 'flash_mesage' => 'Bạn không có quyền truy cập module này!']);
        }
        $per_delete = UserPermistion::Find($id);
        if ($per_delete) {
            if ($per_delete['parent_id'] == 0) {
                $per_parent = UserPermistion::select('*')->where('parent_id', $id)->get()->toArray();
                if ($per_parent) {
                    foreach ($per_parent as $items) {
                        $item = UserPermistion::find($items['id']);
                        $item->delete($items['id']);
                    }
                }
                $per_delete->delete($id);
            } else {
                $per_delete->delete($id);
            }
            return redirect()->route('getUserPer')->with(['flash_level' => 'alert-success', 'flash_mesage' => 'Xoá Permistion thành công']);
        }
    }
}
