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
        $request->validate([
            'computer_name' => 'required|max:50',
            'model' => 'required|max:100',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date_format:Y-m-d H:i:s',
            'urgency' => 'required|in:low,Medium,High',
            'status' => 'required|in:Open,In progress,Resolved',
        ]);

        Issues::create($request->all());
        return redirect()->route('issuse.index')->with('success', 'Da them thanh cong');
    }

    public function edit($id)
    {
        $issues = Issues::findOrFail($id);
        $computers = Computers::all();
        return view('issues.edit', compact('issues', 'computers'));
    }

    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu đầu vào (validation)
        $request->validate([
            'computer_name' => 'required|max:50',
            'model' => 'required|max:100',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date_format:Y-m-d H:i:s',
            'urgency' => 'required|in:low,Medium,High',
            'status' => 'required|in:Open,In progress,Resolved',
        ]);

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
