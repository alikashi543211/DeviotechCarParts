<?php

use App\Models\SellerProfile;
use App\Models\Plan;
use App\Models\CarPartAdvertisement;
use App\Models\ScrapYardAdvertisement;
use App\Models\Language;
use App\Models\Setting;

function uploadFile($file, $path){
    $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move($path,$name);
    return $path.'/'.$name;
}

function seller($id=null){
    if(is_null($id)){
        return SellerProfile::where('user_id',auth()->user()->id)->first();
    }else{
    return SellerProfile::where('user_id',$id)->first();

    }
}

function getNDaysDates($days, $format = 'd/m')
{
    $m = date("m"); $de= date("d"); $y= date("Y");
    $dateArray = array();
    for($i=0; $i<=$days-1; $i++){
        $dateArray[] = '"' . date($format, mktime(0,0,0,$m,($de-$i),$y)) . '"';
    }
    $res=array_reverse($dateArray);
    $first=$res[0];
    $last=$res[sizeof($res)-1];
    $first=trim($first,'"');
    $last=trim($last,'"');
    return [$first,$last];
}

function plan_config(){
	$array=[];
	$buy_plan=Plan::where('status','active')->take(3)->get()->unique('subscription_type');
    for ($i=0;$i<count($buy_plan);$i++)
    {
        if ($buy_plan[$i]->subscription_type==1)
        {
            $plan_type='car_parts';
        }
        elseif ($buy_plan[$i]->subscription_type==2)
        {
            $plan_type='scrapeyard_parts';
        }
        elseif ($buy_plan[$i]->subscription_type==3)
        {
            $plan_type='ultimate';
        }
        $array[$plan_type]['amount']=['value'=>$buy_plan[$i]->amount,'currency'=>$buy_plan[$i]->currency];
        $array[$plan_type]['interval']='1 '.$buy_plan[$i]->interval;
        $array[$plan_type]['description']=$buy_plan[$i]->interval.' payment';
    }
    // dd($array);
    Config::set('cashier_plans.plans', $array);
    return $array;
}

function update_slugs(){
    $car_part=CarPartAdvertisement::all();
    $scrap_yard=ScrapYardAdvertisement::all();
    foreach($car_part as $part)
    {
        $part->slug=$part->id.'-'.$part->carMake->name.'-'.$part->carModel->name.'-carpart';
        $part->save();
    }
    foreach($scrap_yard as $scrap)
    {
        $scrap->slug=$scrap->id.'-'.$scrap->carMake->name.'-'.$scrap->carModel->name.'-scrapyard';
        $scrap->save();
    }
    return true;
}

function getCategory($slug)
{
    $array=explode("-",$slug);
    $cat=end($array);
    return $cat;
}

function getTitle($slug)
{
    // $array=explode("-",$slug);
    // $title=$array[1].' '.$array[2];
    // return ucfirst($title);
    return true;
}

function isCarPart($slug)
{
    $array=explode("-",$slug);
    $cat=end($array);
    if($cat=='carpart')
    {
        return true;
    }else
    {
        return false;
    }
}

function isScrapYard($slug)
{
    $array=explode("-",$slug);
    $cat=end($array);
    if($cat=='scrapyard')
    {
        return true;
    }else
    {
        return false;
    }
}



function get_locale()
{
    return Config::get('app.locale');
}

function siteSetting()
{
    if(session('site_locale'))
    {
        $short_code=session('site_locale');
    }else
    {
        $short_code="en";
    }
    $language=Language::where('short_code',$short_code)->first();
    $setting=Setting::where('language_id',$language->id)
            ->pluck('value', 'name')
            ->toArray();
    return $setting;
}

function fixSetting()
{
    $setting=Setting::all();
    $fix_setting=array();
    foreach($setting as $set)
    {
        if($set->language_id==null && $set->name!='fix_setting')
        {
          $fix_setting[$set->name]=$set->value;
        }
        
    }
    return $fix_setting;
}

function siteLanguage()
{
    if(session('site_locale'))
    {
        $short_code=session('site_locale');
    }else
    {
        $short_code="en";
    }
    $language=Language::where('short_code',$short_code)->first();
    return $language->name;
}

function languages()
{
    $languages=Language::all();
    return $languages;
}

function actual_slug($slug)
{
    $array=explode("-",$slug);
    foreach($array as $item)
    {
        if($item!='carpart')
        {
            $actual_slug[]=$item;
        }
    }
    return implode('-',$actual_slug);
}

function is_video($file)
{
    $file=explode(".",$file);
    $extension=end($file);
    if($extension=='mp4')
    {
        return true;
    }else
    {
        return false;
    }
}



