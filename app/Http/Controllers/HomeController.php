<?php

namespace App\Http\Controllers;

use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\CarPartAdvertisement;
use App\Models\CarTrim;
use App\Models\ScrapYardAdvertisement;
use App\Models\SellerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Review;
use App\Models\User;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Setting;
use Config;
use App;

class HomeController extends Controller
{

    public function home(Request $req)
    {
        // dd(session('site_locale'));
        $testimonial_list=Testimonial::where('status',true)->get();
        $blog_list=Blog::where('visibility','showed')
            ->orderBy('id','desc')
            ->take(3)
            ->get();
        $scrapYardAdvertisements = ScrapYardAdvertisement::where('status','2')
            ->take(8)
            ->get();
        $carPartAdvertisements = CarPartAdvertisement::where('status','2')
            ->take(8)
            ->get();
        $maker = CarMake::all();
        $models = CarModel::all();
        $trims = CarTrim::all();
        return view('front.home', get_defined_vars());
    }

    public function blogs()
    {
        $blog_list=Blog::where('visibility','showed')->paginate(12);
        return view('front.blog',get_defined_vars());
    }

    public function blogDetail($slug = null)
    {
        $blog=Blog::where('slug',$slug)->first();
        return view('front.blog_detail',get_defined_vars());
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function about()
    {
        $testimonial_list=Testimonial::where('status',true)->get();
        return view('front.about',get_defined_vars());
    }

    public function faq()
    {
        $faq_list=Faq::where('status',true)->get();
        return view('front.faq',get_defined_vars());
    }

    public function termConditions()
    {
        return view('front.terms');
    }

    public function privacyPolicy()
    {
        return view('front.privacy');
    }

    public function search(Request $req)
    {
        $carAdvertisement = collect();
        $scrapYard = collect();
        $noCarParts=false;
        $noScrapYards=false;

        $all_carpart=CarPartAdvertisement::where("status",2)->with('carPartImages','carMake','carModel','carTrim')->paginate(15);
        $all_scrapyard = ScrapYardAdvertisement::where("status",2)->with('scrapYardImages')->paginate(15);

        $carAdvertisement=CarPartAdvertisement::where("status",2)->with('carPartImages','carMake','carModel','carTrim');
        if ($req->make!='all' && $req->make!=null)
        {
            $carAdvertisement->where('car_make_id',$req->make);
        }
        if ($req->model!='all' && $req->model!=null)
        {
            $carAdvertisement->where('car_model_id',$req->model);
        }
        if ($req->trim!='all' && $req->trim!=null)
        {
            $carAdvertisement->where('car_trim_id',$req->trim);
        }
        if ($req->price!='all' && $req->price!=null)
        {
            $price=explode("-",$req->price);
            $min_price=$price[0];
            $max_price=$price[1];
            $carAdvertisement->where('price','>=',$min_price)
                ->where('price','<=',$max_price);
        }

        $scrapYard = ScrapYardAdvertisement::where("status",2)->with('scrapYardImages');
        if ($req->make!='all' && $req->make!=null)
        {
            $scrapYard->where('car_make_id',$req->make);
        }
        if ($req->model!='all' && $req->model!=null)
        {
            $scrapYard->where('car_model_id',$req->model);
        }
        if ($req->trim!='all' && $req->trim!=null)
        {
            $scrapYard->where('car_trim_id',$req->trim);
        }
        if ($req->price!='all' && $req->price!=null)
        {
            $price=explode("-",$req->price);
            $min_price=$price[0];
            $max_price=$price[1];
            $scrapYard->where('price','>=',$min_price)
                ->where('price','<=',$max_price);
        }
        if(isset($req->type) && $req->type==2)
        {
            if($req->sort==1)
            {
               $carAdvertisement->orderBy('created_at','desc');
            }
            elseif($req->sort==2)
            {
               $carAdvertisement->orderBy('created_at','asc');
            }
            elseif($req->sort==3)
            {
               $carAdvertisement->orderBy('price','asc');
            }
            elseif($req->sort==4)
            {
               $carAdvertisement->orderBy('price','desc');
            }

        }
        if(isset($req->type) && $req->type==1)
        {
            if($req->sort==1)
            {
               $scrapYard->orderBy('created_at','desc');
            }
            elseif($req->sort==2)
            {
               $scrapYard->orderBy('created_at','asc');
            }
            elseif($req->sort==3)
            {
               $scrapYard->orderBy('price','asc');
            }
            elseif($req->sort==4)
            {
               $scrapYard->orderBy('price','desc');
            }

        }
        $carParts = $carAdvertisement->paginate(15);
        $scrapYards = $scrapYard->paginate(15);
        if(count($carParts)==0)
        {
            $noCarParts=true;
            $carParts=$all_carpart;
        }
        if(count($scrapYards)==0)
        {
            $noScrapYards=true;
            $scrapYards=$all_scrapyard;
        }
        $maker = CarMake::all();
        $models = CarModel::all();
        $trims = CarTrim::all();
        return view('front.search', get_defined_vars());
    }

    public function filtration(Request $req)
    {
        $carAdvertisement = CarPartAdvertisement::where("status",2)->with('carPartImages');
        if ($req->manual_make!='all' && $req->manual_make!=null)
        {
            $carAdvertisement->where('car_make_id',$req->manual_make);
        }
        if ($req->manual_model!='all' && $req->manual_model!=null)
        {
            $carAdvertisement->where('car_model_id',$req->manual_model);
        }
        if ($req->manual_trim!='all' && $req->manual_trim!=null)
        {
            $carAdvertisement->where('car_trim_id',$req->manual_trim);
        }

        $scrapYard = ScrapYardAdvertisement::where("status",2)->with('scrapYardImages');
        if ($req->manual_make!='all' && $req->manual_make!=null)
        {
            $scrapYard->where('car_make_id',$req->manual_make);
        }
        if ($req->manual_model!='all' && $req->manual_model!=null)
        {
            $scrapYard->where('car_model_id',$req->manual_model);
        }
        if ($req->manual_trim!='all' && $req->manual_trim!=null)
        {
            $scrapYard->where('car_trim_id',$req->manual_trim);
        }
        $carParts = $carAdvertisement->paginate(15);
        $scrapYards = $scrapYard->paginate(15);

        return view('ajax.search.search', get_defined_vars())->render();
    }

    public function detail($slug = null)
    {
        $category = getCategory($slug);
        $title = getTitle($slug);
        $is_carpart=true;

        $data = CarPartAdvertisement::where('slug',$slug)->first();
        if($data!=null)
        {
            $similar_list = CarPartAdvertisement::where('user_id',$data->user_id)->where("status",'2')->orderBy('id','desc')->take(4)->get();
        }
        if(is_null($data))
        {
            $is_carpart=false;
            $data = ScrapYardAdvertisement::where('slug',$slug)->first();

            $similar_list = ScrapYardAdvertisement::where('user_id',$data->user_id)->where("status",'2')->orderBy('id','desc')->take(4)->get();
        }
        $seller = seller($data->user_id);
        $average_star=Review::where('seller_id',$seller->user_id)
            ->avg('stars') ?? 0;
        $average_star=ceil($average_star);
        $total_reviews=Review::where('user_id',$seller->user->id)
            ->count();
        $five_star=Review::where('user_id',$seller->user->id)
            ->where('stars','5')->count();
        $four_star=Review::where('user_id',$seller->user->id)
        ->where('stars','4')->count();
        $three_star=Review::where('user_id',$seller->user->id)
            ->where('stars','3')->count();
        $two_star=Review::where('user_id',$seller->user->id)
        ->where('stars','2')->count();
        $one_star=Review::where('user_id',$seller->user->id)
        ->where('stars','1')->count();

        if($total_reviews!=0)
        {
            $three_star_percent=$three_star/$total_reviews*100;
            $four_star_percent=$four_star/$total_reviews*100;
            $five_star_percent=$five_star/$total_reviews*100;
            $one_star_percent=$one_star/$total_reviews*100;
            $two_star_percent=$two_star/$total_reviews*100;
        }else
        {
            $average_star=0;
            $three_star_percent=0;
            $four_star_percent=0;
            $five_star_percent=0;
            $one_star_percent=0;
            $two_star_percent=0;
        }

        return view('front.detail',get_defined_vars());
    }

    public function sellerProfile($id,Request $req)
    {
        $seller = seller($id);

        $scrapYardAdvertisements = ScrapYardAdvertisement::where('status','2')
            ->where('user_id',$seller->user_id)
            ->orderBy('id','desc')
            ->take(4)
            ->get();

        $carPartAdvertisements = CarPartAdvertisement::where('status','2')
            ->where('user_id',$seller->user_id)
            ->orderBy('id','desc')
            ->take(4)
            ->get();
        if(isset($req->reviews))
        {
            $review_list=Review::where('seller_id',$seller->user->id)
                ->get();
        }else
        {
            $review_list=Review::
                where('seller_id',$seller->user_id)
                ->take(4)->get();

        }

        $total_reviews=Review::where('seller_id',$seller->user_id)
            ->count();
        $average_star=Review::where('seller_id',$seller->user_id)
            ->avg('stars') ?? 0;
        // dd($one_star,$five_star);
        $average_star=ceil($average_star);
        $five_star=Review::where('seller_id',$seller->user_id)
            ->where('stars','5')
            ->count();
        $four_star=Review::where('seller_id',$seller->user_id)
            ->where('stars','4')
            ->count();
        $three_star=Review::where('seller_id',$seller->user_id)
            ->where('stars','3')
            ->count();
        $two_star=Review::where('seller_id',$seller->user_id)
            ->where('stars','2')
            ->count();
        $one_star=Review::where('seller_id',$seller->user_id)
            ->where('stars','1')
            ->count();

        if($total_reviews!=0)
        {
            $three_star_percent=$three_star/$total_reviews*100;
            $four_star_percent=$four_star/$total_reviews*100;
            $five_star_percent=$five_star/$total_reviews*100;
            $one_star_percent=$one_star/$total_reviews*100;
            $two_star_percent=$two_star/$total_reviews*100;
        }else
        {
            $average_star=0;
            $three_star_percent=0;
            $four_star_percent=0;
            $five_star_percent=0;
            $one_star_percent=0;
            $two_star_percent=0;
        }

        return view("front.seller_profile",get_defined_vars());
    }

    public function saveReview(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'review' => 'required',
            'stars' => 'required'
        ]);
        $review=Review::create([
            'name' => $req->name,
            'email'=> $req->email,
            'subject'=>$req->subject,
            'review'=>$req->review,
            'user_id'=>auth()->user()->id,
            'seller_id'=>$req->user_id,
            'stars'=>$req->stars,
            'is_approved'=>1,
        ]);

        return redirect()->back()->with('success', 'Review Submitted Successfully');
    }

}
