<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computers;
use App\Models\Issues;
use PHPUnit\Runner\Baseline\Issue;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issues::with('computer')->paginate(5);
        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        $computers = Computers::all();
        return view('issues.create', compact('computers'));
    }

    public function store(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (validation)
        $request->validate(
            [
                'computer_id' => 'required',
                'reported_by' => 'required|max:50',
                'reported_date' => 'required|date',
                'description' => 'required',
                'urgency' => 'required',
                'status' => 'required'
            ]
        );
        Issues::create($request->all());
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công');
    }

    public function edit($id)
    {
        $issue = Issues::findOrFail($id);
        $computers = Computers::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu đầu vào (validation)
        $request->validate(
            [
                'computer_id' => 'required',
                'reported_by' => 'required|max:50',
                'reported_date' => 'required|date',
                'description' => 'required',
                'urgency' => 'required',
                'status' => 'required'
            ]
        );

        $issues = Issues::find($id);

        // Cập nhật thông tin
        $issues->update($request->all());

        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Duoc cap nhat thanh cong');
    }

    public function destroy($id)
    {
        $issues = Issues::findOrFail($id);
        $issues->delete();

        return redirect()->route('issues.index')->with('success', 'Xóa thành công!');
    }
}
