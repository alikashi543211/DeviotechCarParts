<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PlansTranslation;
use App\Models\Language;
use Astrotomic\Translatable\Validation\RuleFactory;
use App\Models\Category;

class PlanController extends Controller
{
    public function index()
    {
        $plan = Plan::all();
        return view('admin.plan.list', get_defined_vars());
    }

    public function add()
    {
        $languages=Language::all();
        return view('admin.plan.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $rule_factory = RuleFactory::make([
            '%name%' => '',
            '%description%' => '',
            'interval'=>'required',
            'amount'=> "required|numeric",
            'subscription_type'=> "required",
        ]);
        $data = $this->validate($req, $rule_factory);
        


        if (is_null($id))
        {
            $plan = new Plan();
            $plan->fill($data)->save();
        }
        else
        {

            $plan=Plan::find($id);
            $plan->fill($data)->save();
            return redirect()->route('admin.plan.list')->with('success', 'Plan Update Successfully');

        }
        return redirect()->route('admin.plan.list')->with('success', 'Plan Added Successfully');
    }

     public function edit($id)
    {
        $plan = Plan::find($id);
        $languages=Language::all();
        return view('admin.plan.edit', get_defined_vars());
    }

    public function delete($id)
    {
        Plan::find($id)->delete();
        return redirect()->route('admin.plan.list')->with('success', 'SubCategory Deleted');
    }
}
