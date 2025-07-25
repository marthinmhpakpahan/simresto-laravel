<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Leave;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class KaryawanController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $karyawans = User::where('role_id', 2)->where("status", 1)->get();

        return view('karyawan.index', [
            "title" => env("APP_NAME") . " - Manage karyawan",
            "page_title" => "Manage karyawan",
            "karyawans" => $karyawans,
            "user_id" => $user_id
        ]);
    }

    public function create(Request $request) {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                    'full_name' => 'required',
                    'username' => 'required',
                    'phone_no' => 'required',
                    'email' => 'required',
                    'photo' => 'required',
                    'identity_card' => 'required',
                    'password' => 'required',
                    'confirm_password' => 'required',
                    'salary' => 'required',
                    'joined_since' => 'required',
            ]);

            $result = User::create([
                'full_name' => $request->full_name,
                'username' => $request->username,
                'phone_no' => $request->phone_no,
                'email' => $request->email,
                'photo' => CommonFunction::uploadFiles($request->file('photo'), "PHOTO"),
                'identity_card' => CommonFunction::uploadFiles($request->file('identity_card'), "IDENTITY_CARD"),
                'password' => Hash::make($request->password),
                'salary' => $request->salary,
                'joined_since' => $request->joined_since,
            ]);

            if(!$result) {
                return back()->withInput()->with('failed','Gagal menambahkan karyawan!');
            }
            return redirect('/karyawan')->with('success', 'Berhasil menambahkan karyawan anda!');

        } else {
            return view('karyawan.create', [
                "title" => env("APP_NAME") . " - Manage karyawan",
                "page_title" => "Create Data karyawan",
                "user_id" => $user_id,
            ]);
        }
    }

    public function edit(Request $request, $karyawan_id) {
        $karyawan = User::where('id', $karyawan_id)->first();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                    'full_name' => 'required',
                    'username' => 'required',
                    'phone_no' => 'required',
                    'email' => 'required',
                    'salary' => 'required',
                    'joined_since' => 'required',
            ]);

            $karyawan->full_name = $request->full_name;
            $karyawan->username = $request->username;
            $karyawan->phone_no = $request->phone_no;
            $karyawan->email = $request->email;
            if($request->file("photo")) {
                $karyawan->photo = CommonFunction::uploadFiles($request->file('photo'), "PHOTO");
            }
            if($request->file("identity_card")) {
                $karyawan->identity_card = CommonFunction::uploadFiles($request->file('identity_card'), "IDENTITY_CARD");
            }
            $karyawan->salary = $request->salary;
            $karyawan->joined_since = $request->joined_since;
            $result = $karyawan->save();

            if(!$result) {
                return back()->withInput()->with('failed','Gagal menambahkan karyawan!');
            }
            return redirect('/karyawan')->with('success', 'Berhasil menambahkan karyawan anda!');

        } else {
            return view('karyawan.edit', [
                "title" => env("APP_NAME") . " - Manage karyawan",
                "page_title" => "Ubah Data Karyawan",
                "karyawan" => $karyawan
            ]);
        }
    }

    public function delete($karyawan_id) {
        $karyawan = User::where('id', $karyawan_id)->first();
        $karyawan->status = 0;
        $karyawan->save();
        return redirect('/karyawan')->with('success', 'Berhasil menghapus data karyawan!');
    }

    public function attendance() {
        $user_id = Auth::id();
        $attendance = Attendance::whereRaw('DATE(created_at) = ?', [date("Y-m-d")])->where('user_id', $user_id)->orderByDesc("created_at")->first();
        $attendances = Attendance::where('user_id', $user_id)->orderByDesc("created_at")->get();

        return view('karyawan.attendance', [
            "title" => env("APP_NAME") . " - Manage Attendance",
            "page_title" => "Manage Attendance",
            "user_id" => $user_id,
            "attendance" => $attendance,
            "attendances" => $attendances,
        ]);
    }

    public function validate_attendance(Request $request) {
        $user_id = Auth::id();
        $attendance = Attendance::where("user_id", $user_id)->whereRaw('DATE(created_at) = ?', [date("Y-m-d")])->orderByDesc("created_at")->first();
        date_default_timezone_set("Asia/Jakarta");
        if(!$attendance) {
            $result = Attendance::create([
                'user_id' => $user_id,
                'started_at' => date("Y-m-d H:i:s"),
                'started_path' => CommonFunction::uploadFiles($request->file('image'), "ATTENDANCE")
            ]);
        } else {
            $attendance->finished_at = date("Y-m-d H:i:s");
            $attendance->finished_path = CommonFunction::uploadFiles($request->file('image'), "ATTENDANCE");
            $attendance->save();
        }
        return redirect()->route('karyawan.attendance');
    }

    public function leave() {
        $user_id = Auth::id();
        $leaves = Leave::where("user_id", $user_id)->orderBy("created_at", "desc")->get();

        return view('karyawan.leave', [
            "title" => env("APP_NAME") . " - Manage Leave",
            "page_title" => "Manage Leave",
            "user_id" => $user_id,
            "leaves" => $leaves
        ]);
    }

    public function admin_leave() {
        $user_id = Auth::id();
        $leaves = Leave::where("status", "!=", "Ditolak")->orderBy("created_at", "desc")->get();

        return view('karyawan.admin-leave', [
            "title" => env("APP_NAME") . " - Manage Leave",
            "page_title" => "Manage Leave",
            "user_id" => $user_id,
            "leaves" => $leaves
        ]);
    }

    public function show($karyawan_id) {
        $user_id = Auth::id();
        $attendances = Attendance::where('user_id', $karyawan_id)->orderByDesc("created_at")->get();
        $karyawan = User::where("id", $karyawan_id)->first();

        return view('karyawan.show', [
            "title" => env("APP_NAME") . " - Manage Karyawan",
            "page_title" => "Manage Karyawan",
            "user_id" => $user_id,
            "karyawan" => $karyawan,
            "attendances" => $attendances,
        ]);
    }

    public function confirm_attendance($karyawan_id, $attendance_id) {
        $attendance = Attendance::where('id', $attendance_id)->first();
        $attendance->status = "Confirmed";
        $attendance->save();
        return redirect()->route('karyawan.show', $karyawan_id);
    }

    public function decline_attendance($karyawan_id, $attendance_id) {
        $attendance = Attendance::where('id', $attendance_id)->first();
        $attendance->status = "Ditolak";
        $attendance->save();
        return redirect()->route('karyawan.show', $karyawan_id);
    }

    public function create_leave(Request $request) {
        $user_id = Auth::id();
        $karyawan = User::where("id", $user_id)->first();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                'start_date' => 'required',
                'end_date' => 'required',
                'title' => 'required',
                'description' => 'required',
                'attachment' => 'required',
            ]);

            $result = Leave::create([
                'user_id' => $user_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'title' => $request->title,
                'description' => $request->description,
                'attachment' => CommonFunction::uploadFiles($request->file('attachment'), "LEAVE"),
                'status' => "Belum Diproses"
            ]);

            if(!$result) {
                return back()->withInput()->with('failed','Gagal menambahkan cuti!');
            }
            return redirect()->route("karyawan.leave")->with('success', 'Berhasil menambahkan cuti anda!');

        } else {
            return view('karyawan.create-leave', [
                "title" => env("APP_NAME") . " - Manage Karyawan",
                "page_title" => "Manage Karyawan",
                "user_id" => $user_id,
                "karyawan" => $karyawan,
            ]);
        }
    }

    public function leave_action($leave_id, $action) {
        $user_id = Auth::id();
        $user = User::where("id", $user_id)->first();
        $leave = Leave::where('id', $leave_id)->first();
        if($user->role_id == 1) {
            $leave->admin_id = $user_id;
        }
        $leave->status = $action;
        $leave->save();
        if($user->role_id == 1) {
            return redirect()->route('karyawan.admin_leave');
        } else {
            return redirect()->route('karyawan.leave');
        }
    }

    public function calendar() {
        $user_id = Auth::id();
        $custom_date = isset($_GET["date"]) ? $_GET["date"] : "";
        $current_date = date("Y-m-d");
        if($custom_date != "") {
            $str_date = strtotime($custom_date);
            $current_date = date("Y-m-d", $str_date);
        }
        $calendar = new Calendar($current_date);

        $attendances = Attendance::whereYear('created_at', '=', date("Y"))->whereMonth('created_at', '=', date("m"))->get();
        foreach($attendances as $attendance) {
            $calendar->add_event("<i class='fa fa-check'></i> " . $attendance->user->full_name, date('Y-m-d', strtotime($attendance->started_at)), 1, 'green');
        }
        
        $leaves = Leave::where("status", "Diterima")->get();
        foreach($leaves as $leave) {
            $date_range = CarbonPeriod::create($leave->start_date, $leave->end_date);
            foreach ($date_range as $date) {
                $calendar->add_event("<i class='fa fa-leaf'></i> " . $leave->user->full_name, $date->format('Y-m-d'), 1, 'red');
            }
        }

        return view('karyawan.calendar', [
            "title" => env("APP_NAME") . " - Manage Karyawan",
            "page_title" => "Manage Karyawan",
            "user_id" => $user_id,
            "calendar" => $calendar,
            "current_date" => $current_date
        ]);
    }
}
