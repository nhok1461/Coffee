<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use Socialite;
use App\SocialProvider;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function getIndex(){
      $slide = Slide::all();
      //return view('page.trangchu',['slide'=>$slide]);
      $new_product = Product::where('new',1)->paginate(4);
      $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
      return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoaiSp($type)
    {
      $sp_theoloai = Product::where('id_type',$type)->get();
      $loai = ProductType::all();
      $lsp = ProductType::where('id',$type)->first();
      return view('page.loai_sanpham',compact('sp_theoloai','loai','lsp'));
    }
    public function getChitiet(Request $req){
      $sanpham = Product::where('id',$req->id)->first();
      $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
      return view('page.chitietsanpham',compact('sanpham','sp_tuongtu'));
    }

    public function getLienhe(){
      return view('page.lienhe');
    }

    public function getGioithieu(){
      return view('page.gioithieu');
    }

    public function getKhuyenmai(){
      return view('page.khuyenmai');
    }

    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
      $users = Auth::user();
        return view('page.dat_hang',['dat_hang'=>$users]);
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');

    }

    public function getLogin(){
        return view('page.dangnhap');
    }
    public function getSignin(){
        return view('page.dangki');
    }

    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);

            if(Auth::attempt($credentials)){

            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }

    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req){
       $product=Product::where('name','like','%' .$req->key.'%')->orWhere('unit_price',$req->key)->get();
       $loai=ProductType::all();
       return view('page.search',compact('product','loai'));
   }
   public function redirectToProvider($providers){
    return Socialite::driver($providers)->redirect();
}

public function handleProviderCallback($providers){
    try{
      $socialUser=Socialite::driver($providers)->user();
  }
  catch(\Exception $e){
      return redirect()->route('trang-chu')->with(['flash_level'=>'danger','flash_message'=>"Đăng nhập không thành công"]);
  }
  $socialProvider=SocialProvider::where('provider_id',$socialUser->getId())->first();
  if(!$socialProvider){
      $user=User::where('email',$socialUser->getEmail())->first();
      if($user){
       return redirect()->route('trang-chu')->with(['flash_level'=>'danger','flash_message'=>"Email đã có người sử dụng"]);
   }
   else{
       $user=new User();
       $user->email=$socialUser->getEmail();
       $user->full_name=$socialUser->getName();
       $image=explode('?',$socialUser->getAvatar());
       $user->avatar=$image[0];
       $user->save();
   }
   $provider=new SocialProvider();
   $provider->provider_id=$socialUser->getId();
   $provider->provider=$providers;
   $provider->email=$socialUser->getEmail();
   $provider->save();
}
else{
  $user=User::where('email',$socialUser->getEmail())->first();
}
Auth()->login($user);
return redirect()->route('trang-chu')->with(['flash_level'=>'success','flash_message'=>"Đăng nhập thành công"]);
}
public function send(Request $req){
    $this->validate($req,[
        'name'=>'required',
        'email'=>'required|email',
        'message'=>'required'
    ]);

    $data=array(
        'name'=>$req->name,
        'email'=>$req->email,
        'message'=>$req->message
    );
    Mail::to('nhok1461@gmail.com')->send(new SendMail($data));
    return back()->with('success','Cảm ơn đã góp ý');
}
public function getInfo()
{
  $users = Auth::user();
  return view('page.thongtin',['thongtin'=>$users]);
}

public function getInfo1()
{
    $users = Auth::user();
    $bill_detail=BillDetail::all();
    return view('page.thongtin1',['thongtin1'=>$bill_detail]);
}

public function postInfo(Required $request){
  $this->validate($request,[
      'full_name' => 'required|min:3',
  ],
  [
      'full_name.required'=>'Bạn chưa nhập tên',
      'full_name.min' =>'Tên người dùng phải có ít nhất 3 ký tự',
  ]);
  $users = Auth::user();
  $users->full_name= $request->full_name;
  $users->address= $request->address;
  $users->phone= $request->phone;
  $users->password= $request->password;
  if(isset($request->changePass ))
  {
      $this->validate($request,[
          'full_name' => 'required|min:3',
          'email' => 'required|email',
          'password'=>'required|min:3',
      ],[
          'full_name.required'=>'Bạn chưa nhập tên',
          'full_name.min' =>'Tên người dùng phải có ít nhất 3 ký tự',
          'password.required' =>'Bạn chưa nhập mật khẩu',
          'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
      ]);

      $users->password= bcrypt($request->password);
  }
  $users->save();
  return redirect()->back()->with('thongbao',' Sửa thành công');
}
}
